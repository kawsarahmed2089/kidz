<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_invoice_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/print_style.css" type="text/css"/>
			<style type="text/css">
				.title_name{width:120px;}
				#left_portion{width:130px;}
				#ri8_portion{
								min-height: 105px;
								width: 60px;
							}
			</style>
</head>
	<body onload="window.print()"> 
		<div id= "main_container_body_main">
			<div id="main_container_body_main2" style ="width: 302px;">

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
				//echo count($transaction_info);
				if(count($transaction_info) > 0){
				foreach ($transaction_info as $field):
				$real_date='';
				$order_id='';
				/* 	$creator=$this->dbm_model->exception_show('username','users','id',$field['creator']);
				if($field['purpose'] == 'Sale Due' || $field['purpose'] == 'Sale' || $field['purpose'] == 'Sale Return'){
					$real_date=$this->dbm_model->exception_show('doc','order_info','order_id',$field['table_ref_id']);
					$order_id=$field['table_ref_id'];
				} */
				if($field['purpose'] == 'Party'){
					/* $real_date=$this->dbm_model->exception_show('DOC','restaurant_booking','res_booking_id',$field['table_ref_id']);
					$order_id=$field['table_ref_id']; */
					$total_party+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Restaurant Expense' || $field['purpose'] == 'Salary Expense'){
					/* $real_date = $field['transaction_date'];
					$order_id = $field['table_ref_id']; */
					$total_expense+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Stuff Due'){
				/* 	$real_date = $field['table_ref_name'];
					$order_id = $field['table_ref_id']; */
					$total_stuff_due+=$field['transaction_amount'];
				}
				else if($field['purpose'] == 'Sent To Account'){
					/* $real_date = $field['transaction_date'];
					$order_id = $field['table_ref_id']; */
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
				
				endforeach;
				}
				?>
			
			
		<div id= "main_container_body">
			<div id="shop_title_box" style="text-align:center;">			
				<div id = "shop_title_test"> <?php echo $this->tank_auth->get_hotel_name();?> </div>
				<div id = "shop_address_test" style="font-size: 10px;"> <?php echo $this->tank_auth->get_shopaddress();?></div>			
				<div id = "shop_title_test"> Cash Box </div>
			</div>
			<?php
						$i=1; 
						//print_r($cashbox_info);
				foreach ($cashbox_info as $field):
				?>
			<div class ="pos_top_header_second">
				<div class ="pos_top_header_second_left" style="width:40%;"><h4>Cash Box ID: <?php  echo $field['cashbox_id'];  ?></h4> </div>
				<div class ="pos_top_header_second_middle" style="width:59%;"> <h4> User Name : <?php echo $field['creator']; ?></h4></div>
				<div id ="pos_top_header_second_right" style="width:95%;"><h4>Date : <?php echo $field['DOC']; ?></h4></div>
				
				
			</div>
			
		<div id = "transaction_details" style="width: 100%;">
			<!--<div id= "t_left">

			
			</div> -->
			<!--end of t_left div-->			
			<div id= "t_right"> 
				<div id = "left_portion">
					<div class = "title_name">Opening Cash</div>
					<div class ="dot">:</div>
					<div class = "title_name">Closing Cash</div>
					<div class ="dot">:</div>
					<div class = "title_name">Total Cash In</div>
					<div class ="dot">:</div>
					<div class = "title_name">Total Cash Out</div>
					<div class ="dot">:</div>
					<div class = "title_name">Total Sale</div>
					<div class ="dot">:</div>
					<div class = "title_name">Sale Due Received</div>
					<div class ="dot">:</div>
					<div class = "title_name">Stuff Due Received</div>
					<div class ="dot">:</div>
					<div class = "title_name">Total Expense</div>
					<div class ="dot">:</div>
					<div class = "title_name">Sale Return</div>
					<div class ="dot">:</div>
					<div class = "title_name">Sent To Accounts</div>
					<div class ="dot">:</div>
					<div class = "title_name">1000</div>
					<div class ="dot">:</div>
					<div class = "title_name">500</div>
					<div class ="dot">:</div>
					<div class = "title_name">100</div>
					<div class ="dot">:</div>
					<div class = "title_name">50</div>
					<div class ="dot">:</div>
					<div class = "title_name">20</div>
					<div class ="dot">:</div>
					<div class = "title_name">10</div>
					<div class ="dot">:</div>
					<div class = "title_name">5</div>
					<div class ="dot">:</div>
					<div class = "title_name">2</div>
					<div class ="dot">:</div>
					<div class = "title_name">1</div>
					<div class ="dot">:</div>
					
				</div>
				<div id = "ri8_portion" style="margin-top: 0px;">
					<div class = "title_result"> 
						<?php
							echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$field['opening_cashbox'];?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$field['closing_cash']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_cash_in; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_cash_out; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_sale; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_sale_due; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_stuff_due; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_expense; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_sale_return; ?>
					</div>
					<div class = "title_result"> 
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$total_send_to_account; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['thousand']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['five_hundred']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['one_hundred']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['fifty']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['twenty']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['ten']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['five']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['two']; ?>
					</div>
					<div class = "title_result"> 
						<?php echo $field['one']; ?>
					</div>

				</div> <!--END OF ri8_portion-->
			</div><!--end of t_right div-->			
		</div><!--end of transaction div-->		
					<?php
						  $i++;
						  endforeach;
					?>	
				<div id="footer">
				</div>
			
			<!--<div class ="pos_top_header_fotter"> Note: hell yeah!!</div> -->
			<div style="border-top: 1px solid gray; width: 100%; height: 1px; float:left;"> </div>
			
			<div class ="pos_top_header_fotter" style="background:;"> Software Developed By : <b>IT Lab Solutions</b></div>
			<!--
			<div class ="pos_top_header_fotter" style="background:;"> Call: 0088 018 4248 5222 | Web: www.itlabsolutions.com</div>
			-->
		</div> <!--End of main container body -->
	</div>
		</div> <!--End of main container body -->
	</body>
</html>	
