<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>  <?php echo $this->tank_auth->get_hotel_name();?> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/style_main.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/invoice_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	<style>
		.CSSTableGenerator tr:first-child td {
			vertical-align: top;
		}
		.CSSTableGenerator td,.CSSTableGenerator tr:first-child td,.CSSTableGenerator tr td:last-child {
			border-width: 1px;
		}
		.CSSTableGenerator tr:first-child td{ color: #000;}
		.CSSTableGenerator tr:last-child td:last-child{ border-width: 1px;}
		#shop_title_box{
			margin-bottom: -16px;
			height: auto;
		}
	</style>
</head>
<!--<body onload="javascript:window.print()">-->
<body onload="window.print()">
<?php 
	$segment_3 = $this->uri->segment(3);
	$segment_4 = $this->uri->segment(4);
	$segment_5 = $this->uri->segment(5);
	$segment_6 = $this->uri->segment(6);
?>
<div id ="main_invoice">
	<div id = "invoice">
		<div id="shop_title_box">			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_hotel_name();?> </div>
			<div id = "shop_address_test"> <?php echo $this->tank_auth->get_shopaddress();?></div>			
			<div id = "shop_title_test"> Transaction List </div>
			<?php if($segment_3!='mm' && $segment_3 == $segment_4){ ?>
				<div id = "shop_address_test"> <?php echo 'Date: '.$segment_3;?></div>		
			<?php }
			else if($segment_3!='mm' && $segment_4 == 'mm'){ ?>
				<div id = "shop_address_test"> <?php echo 'Date: '.$segment_3;?></div>	
			<?php }
			else if($segment_3!='mm' && $segment_4 != 'mm' && $segment_3 != $segment_4){ ?>
				<div id = "shop_address_test"> <?php echo 'Start Date: '.$segment_3.' , End Date: '.$segment_4;?></div>	
			<?php }
			if($segment_5!='mm'){ ?>
				<div id = "shop_address_test"> <?php echo 'Transaction Type: '.$segment_5;?></div>
			<?php } 
			if($segment_6!='mm'){ ?>
				<div id = "shop_address_test"> <?php echo 'Transaction Purpose: '.urldecode($segment_6);?></div>
			<?php } ?>
			
		</div><!--end of shop_title_box-->
<!--end of invoice_details_header-->	
		
<?php
		if($transaction_setup!= '') 
		{
?>
			<div class="CSSTableGenerator" style="margin-top:16px;">
				<table >	
							<tr>
							  <td data-sort="int"><h4>S/N</h4></td>
							  <td data-sort="string"><h4>Transaction Type</h4></td>
							  <td data-sort="int"><h4> Amount </h4></td>
							  <td data-sort="string"><h4>Transaction Date</h4> </td>
							  <td data-sort="string"><h4>Purpose</h4></td>
							  <td data-sort="string"><h4>Realize Date</h4></td>
							  <td data-sort="string"><h4>ref ID</h4></td>
							  <td data-sort="string"><h4>Creator</h4></td>
							  <td data-sort="string"><h4>DOC</h4></td>
							</tr>
					<?php
						$i=1; 
						$total_cash_in = 0;
						$total_cash_out = 0;
						$total_sale = 0;
						$total_sale_due = 0;
						$total_sale_return = 0;
						$total_party = 0;
						$total_expense = 0;
						$total_send_to_account = 0;
						$total_stuff_due = 0;
						
						$this->load->model('dbm_model');
						foreach ($transaction_setup as $field):
						$real_date='';
						$order_id='';
						$creator=$this->dbm_model->exception_show('username','users','id',$field['creator']);
				if($field['purpose'] == 'Sale Due' || $field['purpose'] == 'Sale' || $field['purpose'] == 'Sale Return'){
					$real_date=$this->dbm_model->exception_show('doc','order_info','order_id',$field['table_ref_id']);
					$order_id=$field['table_ref_id'];
				}
				else if($field['purpose'] == 'Party'){
					$real_date=$this->dbm_model->exception_show('DOC','restaurant_booking','res_booking_id',$field['table_ref_id']);
					$order_id=$field['table_ref_id'];
					$total_party+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Restaurant Expense' || $field['purpose'] == 'Salary Expense'){
					$real_date = $field['transaction_date'];
					$order_id = $field['table_ref_id'];
					$total_expense+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Stuff Due'){
					$real_date = $field['table_ref_name'];
					$order_id = $field['table_ref_id'];
					$total_stuff_due+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Sent To Account'){
					$real_date = $field['transaction_date'];
					$order_id = $field['table_ref_id'];
					$total_send_to_account+=$field['transaction_amount'];
				}
				
				if($field['purpose'] == 'Sale'){
					$total_sale+=$field['transaction_amount'];
				}
				if($field['purpose'] == 'Sale Due'){
					$total_sale_due+=$field['transaction_amount'];
				}
				if($field['purpose'] == 'Sale Return'){
					$total_sale_return+=$field['transaction_amount'];
				}
				if($field['transaction_type'] == 'in'){
					$total_cash_in+= $field['transaction_amount'];
				}
				else if($field['transaction_type'] == 'out'){
					$total_cash_out+= $field['transaction_amount'];
				}
					?>
					<tr>
						<td style="width:6%">
							<?php 
									echo $i ;	
							?> 
						</td> 
						<td  style = "font-size:14px;width:3%; ">
							<?php 
								echo $field['transaction_type'];
							?>
						</td> 
						<td style="text-align:right;width:10%;">
							<?php 
								echo '<big style = "font-size: 7px;"> &#2547;</big> '.round(($field['transaction_amount']), 2);
							?>
						</td>
						
						<td style = "text-align:right;width:11%; ">
							<?php 
								echo $field['transaction_date'];
							?> 
						</td>
						<td style = "text-align:right;width:10%">
							<?php 
								echo $field['purpose'];
							?>
						</td>
						<td style = "text-align:right;width:12%">
							<?php 
							echo $real_date;
							?> 
						</td>
						<td style = "text-align:right;width:3%">
							<?php 
							echo $order_id;
							?> 
						</td>
						<td style = "text-align:right;width:11%">
							<?php 
							echo $creator;
							?> 
						</td>
						<td style = "text-align:right;width:19%">
							<?php 
							echo $field['DOC'];
							?> 
						</td>
						
						
					</tr>
					<?php
						  $i++;
						  endforeach;
					?>	
					<tr>
						<td colspan = 9 style = "text-align:center; font-size:15px;"> 
							<?php if($total_cash_in!=0){?>Total in: <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_cash_in;?>.00, </big> <?php } ?>
							<?php if($total_cash_out!=0){?>Total out: <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_cash_out;?>.00, </big> <?php } ?>
							<?php if($total_sale!=0){?>Total sale: <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_sale;?>.00, </big> <?php } ?>
							<?php if($total_sale_due!=0){?>Total sale due : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_sale_due;?>.00, </big> <?php } ?>
							<?php if($total_sale_return!=0){?>Total sale return : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_sale_return;?>.00, </big> <?php } ?>
							<?php if($total_party!=0){?>Total Party : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_party;?>.00, </big> <?php } ?>
							<?php if($total_expense!=0){?>Total Expense : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_expense;?>.00, </big> <?php } ?>
							<?php if($total_stuff_due!=0){?>Total Stuff : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_stuff_due;?>.00, </big> <?php } ?>
							<?php if($total_send_to_account!=0){?>Total Send Accounts : <big style = "font-size: 14px;font-weight: bold;"> &#2547; <?php echo $total_send_to_account;?>.00, </big> <?php } ?>
						</td>
					</tr>
				</table>		
			</div> <!--	End of CSSTableGenerator DIV-->		
<?php
		}
?>
		
		
		
		
		
				<div id="footer">
					
				</div>
		<!--end of signature-->
	</div> <!--end of invoice-->
</div>


	</body>
</html>