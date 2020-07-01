<?php
if ($use_username) 
{
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$user_full_name = array(
	'name'	=> 'user_full_name',
	'id'	=> 'user_full_name',
	'value'	=> set_value('user_full_name'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$phone_no = array(
	'name'	=> 'phone_no',
	'id'	=> 'phone_no',
	'value'	=> set_value('phone_no'),
	'maxlength'	=> 20,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$user_address = array(
	'name'	=> 'user_address',
	'id'	=> 'user_address',
	'value'	=> set_value('user_address'),
	'maxlength'	=> 100,
	'size'	=> 50,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
$user_type = array(
	'name'  => 'user_type',
	'id'    => 'user_type',
	'value' => set_value('user_type'),
	'maxlength' => 7,
);
$assigned_shop = array(
	'name'  => 'assigned_shop',
	'id'    => 'assigned_shop',
	'value' => set_value('assigned_shop'),
	'maxlength' => 7,
);
?>

<?php 
		if($status != '' )
		{
        ?>
		<div class="form_field_seperator">
		     <?php 
		         if($status == "successful")
				 {
			 ?>
			     <div class = "successful_msg">
			    	 <p>Successful</p>
			     </div>
			 <?php 
				 }      
		     	 else if($status == "exists") 
				 {
			 ?>
			     <div class = "already_exists_msg">
			    	   <p>Already exists</p>
			     </div>  		
		     <?php
				 }
		   		 else if($status == "failed") 
				 {
		     ?>
		      
		         <div class = "failed_msg">
			    	  <p>Failed</p>      
			      </div>
			 <?php 
				 }
				 else
				 {
			 ?>  
				   <div class = "validation_msg">       
				   	     <p>User Name Already Exists!</p>
				   </div>	       
		 	   <?php
				 }
			 ?>         
       </div>
        <?php 
		}
		?>
				<div class="mid_box_top">
		    		<p>User registration</p>	
			    </div>
				<?php
					echo form_open($this->uri->uri_string());
					$js = 'onfocus="this.value=\'\'" ';
					?>                  
	                    	<?php
	                    	if(form_error($username['name']) || form_error($phone_no['name'])  || form_error($user_address['name']) || form_error($user_full_name['name']))
							{
							?>
		                    <div class="form_field_seperator">
					        	<div class = "validation_msg">
							    	  
							    	   	    <?php									
								    	   		echo form_error($username['name']); 
												echo form_error($phone_no['name']); 
												echo form_error($user_address['name']); 											
							    	   		?>
							    	  
							     </div>
					       </div>
		                    <?php
		                    }
							?>
		                    
		                    
		                    <?php   
							if( form_error($password['name']) || form_error($confirm_password['name']) || form_error($assigned_shop['name'])) 
							{
							?>
							
					        <div class="form_field_seperator">
					        	<div class = "validation_msg">
							    	  
							    	   		<?php										    	   	
											    echo form_error($password['name']); 											
												echo form_error($confirm_password['name']); 											
												echo form_error($assigned_shop['name']); 											
							    	   		?>
							     </div>
					       </div>
					        <?php
						    }
							?>


					<div class="form_field_seperator">
						<p>User Name: </p>
					    <?php 
							echo form_input($username); 
					    ?>
					</div>
					<div class="form_field_seperator">
						<p>Full Name: </p>
					    <?php 
							echo form_input($user_full_name); 
					    ?>
					</div>
					<div class="form_field_seperator">
						<p>Phone Number: </p>
					    <?php 
				 			echo form_input($phone_no);
					    ?>
					</div>
					<div class="form_field_seperator">
						    <p>User Type:</p>
						    <?php 
						    	$user_type = $this -> tank_auth -> get_usertype();
								if($user_type == 'admin')
								{
									$temp = array(
									 'manager' => 'Manager', 
									 'accountant' => 'Accountant',
									 'stockist' => 'Stockist',								
									 'seller' => 'Seller',
									 'waiter' => 'Waiter'
									 );
								}
								if($user_type == 'manager')
								{
									$temp = array(
									 'accountant' => 'Accountant',
									 'stockist' => 'Stockist',								
									 'seller' => 'Seller',
									 'waiter' => 'Waiter'
									 );
								}
								if($user_type == 'superadmin')
								{
									$temp = array(
									'superadmin' => 'Superadmin',
									'admin'   => 'Admin',		
									'manager' => 'Manager', 
									'accountant' => 'Accountant',
									'stockist' => 'Stockist',								
									'seller' => 'Seller',
									'waiter' => 'Waiter'
									 );
								}		
								echo form_dropdown('user_type', $temp,'','class="dropdown"');
							?>
				    </div>
					<div class="form_field_seperator">
						<p> Assigned Shop: </p>
					    <?php 
				 			echo form_dropdown('assigned_shop', $all_shop,'','class="dropdown"');  
					    ?>
					</div>
					<div class="form_field_seperator">
						<p>Password: </p>
					    <?php 
				 			echo form_password($password);
							//echo form_error($new_password['name']); 
							echo isset($errors[$password['name']])?$errors[$password['name']]:''; 
					    ?>
					</div>
					<div class="form_field_seperator">
						<p>Confirm Password: </p>
					    <?php 
				 			echo form_password($confirm_password);
							//echo form_error($confirm_new_password['name']);
							echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; 
					    ?>
					</div>
					<div class="form_field_seperator">
						<p>User Address: </p>
					    <?php 
				 			echo form_textarea($user_address);
					    ?>
					</div>
					<div class="form_field_seperator">
							<div class="button_controller">
								<?php
								    echo form_submit('submit', 'Submit',
								    'onclick="return confirm(\'Are you sure want to Add the New User ? \')"');
									echo form_reset('reset', 'Reset'); 
								?>
					        </div>
					</div> 
					
					
