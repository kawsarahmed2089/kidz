<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>

								<div class="mid_box_top">
									<p>Change Password</p>
								</div>
                                
								<?php 
									echo form_open($this->uri->uri_string()); 
									$js = 'onClick="clearMe(this)"';//onblur="returnMe(this)" onfocus="clearMe(this)"
								?>
								        <?php
										if(isset($errors[$old_password['name']])?$errors[$old_password['name']]:'' || form_error($new_password['name']) || form_error($confirm_new_password['name'])) 
										{
										?>
										
								      <div class="form_field_seperator">
								        	<div class = "validation_msg">
										    	  
										    	   		<?php
										    	   		 //echo form_error($old_password['name']); 
										    	   		 if(isset($errors[$old_password['name']])?$errors[$old_password['name']]:'')
														 {
														 
															echo '<p>'; echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; echo '</p>'; 
														 }
										    	   		 
														 	
														 echo form_error($new_password['name']); 
														 //echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; 
														 
														 echo form_error($confirm_new_password['name']); 
														 //echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; 
										    	   		?>
										    	  
										     </div>
								       </div>
								      <?php
										}
										else if($status != '')//if(isset($errors[$old_password['name']])?$errors[$old_password['name']]:'' || form_error($new_password['name']) !='' || form_error($confirm_new_password['name']) != '')
										{
										?>
					
											<div class="form_field_seperator">
									        	<div class = "successful_msg">
											    	   <p>Successful</p>
											     </div>
								      	 	</div>
								      	<?php
										} 
										?>
										
								        <div class="form_field_seperator">
											<p>Old password: </p>
										    <?php 	 
											    echo form_password($old_password); 				
											    //echo form_error($old_password['name']); 	
											    //echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; 
										    ?>
										</div>
										
										 <div class="form_field_seperator">
											<p>New password: </p>
										    <?php 
												echo form_password($new_password); 
												//echo form_error($new_password['name']); 
												echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; 
												
										    ?>
										 </div>
										
										<div class="form_field_seperator">
											<p>Confirm password: </p>
										    <?php 
												echo form_password($confirm_new_password); 
												//echo form_error($confirm_new_password['name']);
												echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; 
								         	?>
									    </div>
										      
										
										<div class="form_field_seperator">
											<div class="button_controller">
												<?php
												    echo form_submit('change', 'Change Password',
												    'onclick="return confirm(\'Are you sure want to Change Your Password ? \')"');
													echo form_reset('reset', 'Reset'); 
												    //echo form_close(); 
												?>
									        </div>
									   </div> 
									   
