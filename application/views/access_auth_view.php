<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
	<title> <?php echo $this->tank_auth->get_shopname();?> : Restaurant Management </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/style_main.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php if($this->uri->segment(4) == 'success'){?>
		
	<?php } ?>
	<?php
		$temp_user_type = array(
					base_url().'index.php/auth/access_auth/' => 'Select User Type',
					base_url().'index.php/auth/access_auth/superadmin' => 'Superadmin',
					base_url().'index.php/auth/access_auth/admin'   => 'Admin',		
					base_url().'index.php/auth/access_auth/manager' => 'Manager', 
					base_url().'index.php/auth/access_auth/accountant' => 'Accountant',
					base_url().'index.php/auth/access_auth/stockist' => 'Stockist',								
					base_url().'index.php/auth/access_auth/seller' => 'Seller',
					base_url().'index.php/auth/access_auth/waiter' => 'Waiter'
					);
	?>
	
	<div class="mid_box_top">
		<p> User Access Authentication</p>
	</div>

	<?php
		echo form_open('auth/create_access_authentication');
	?>	
	<div class="form_field_seperator">
	    <p>Select User Type:</p>
	    <?php
			echo form_dropdown('user_type_mmm', $temp_user_type,$this->uri->segment(3), 
	 		'onchange="document.location.href=this.options[this.selectedIndex].value;" class="dropdown"');
        ?>
    </div>
		<div class="form_field_seperator">
			<p></p><h5> Select Options For : </h5> <h2> <?php echo $this->uri->segment(3);?></h2><br />
			<input type="hidden" name="user_type" value="<?php echo $this->uri->segment(3);?>">
		</div>
		<?php 
		if($this->uri->segment(3)){
		if($access_info->num_rows() > 0){ ?>
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:30px; width: 60%;">
		<table>
			<tr>
				<td > No </td>
				<td > Module Name</td>
				<td > Access Or Not</td>
				<td > Change Status </td>
			</tr>
		
			<?php
				$index = 1;
				foreach($access_info->result() as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td style="text-align:left;"> <?php 
					if($field->module_name == 'pos_terminal') echo 'Pos Terminal';
					else if($field->module_name == 'invoice_info') echo 'Invoice Info';
					else if($field->module_name == 'report_infos') echo 'Reports';
					else if($field->module_name == 'credit_transactions') echo 'Credit Transactions';
					else if($field->module_name == 'product_catagories') echo 'Product Categories';
					else if($field->module_name == 'product_info') echo 'Product Info';
					else if($field->module_name == 'package_products') echo 'Package Products';
					else if($field->module_name == 'table_layout') echo 'Tables';
					else if($field->module_name == 'preparation_options') echo 'Preparation Options';
					else if($field->module_name == 'expense_entry') echo 'Expense Entry';
					else if($field->module_name == 'stock_system') echo 'Stock System';
					else if($field->module_name == 'cashbox_system') echo 'Cashbox';
					else if($field->module_name == 'salary_log') echo 'Salary Log';
					else if($field->module_name == 'booking_info') echo 'Booking Info';
					else if($field->module_name == 'entertain_info') echo 'Entertainment Info';
					else if($field->module_name == 'order_cancl_raeson') echo 'Order Cancl Reason';
					else if($field->module_name == 'stuff_setup') echo 'Stuff';
					?> 
				</td>
				<td> <?php if($field->value == 1){echo 'Yes';}else echo 'No'; ?> </td>
				
		        <td style="text-align:left"> <input class="checkbox1" type="checkbox" name='module[<?php echo $field->access_auth_id;?>]' <?php if($field->value == 1){echo 'checked="checked" ';}?> >
				<input type="hidden" name="myvalue[<?php echo $index;?>]" value="<?php echo $field->access_auth_id;?>">
				</td>			
		    </tr>
			<?php
				$index++;
				endforeach;
			?>
			<tr>
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
		<?php } 
		}
		?>
	
				<div class="form_field_seperator">
					<button type="button" id="uncheckc_id">Unchecked All</button>
					<button type="button" id="checkc_id">Checked All</button>
					<div class="button_controller_two">
						<?php
						    echo form_submit('submit', 'Submit');
							echo form_reset('reset', 'Reset'); 
						?>
			        </div>
				</div> 
		<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
				
	<script>
		$(document).ready(function() {
			$('#checkc_id').click(function(event) {  //on click 
				if(!this.checked) { // check select status
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = true;  //select all checkboxes with class "checkbox1"               
					});
				}else{
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = false; //deselect all checkboxes with class "checkbox1"                       
					});         
				}
			});
		 $('#uncheckc_id').click(function(event) {  //on click 
				if(this.checked) { // check select status
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = true;  //select all checkboxes with class "checkbox1"               
					});
				}else{
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = false; //deselect all checkboxes with class "checkbox1"                       
					});         
				}
			});
			
		});
	</script>

</body>
</html>
