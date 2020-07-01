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
</head>
<body onload="javascript:window.print()">
<div id ="main_invoice">
	<div id = "invoice">
		<div id="shop_title_box">			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_hotel_name();?> </div>
			<div id = "shop_address_test"> <?php echo $this->tank_auth->get_shopaddress();?></div>			
			<div id = "shop_title_test"> Cash Box </div>
		</div><!--end of shop_title_box-->
					<?php
						$i=1; 
						//print_r($cashbox_info);
						foreach ($cashbox_info as $field):
					?>
		<div id = "invoice_details_header">	
			<div id = "inv_details_one">
				<div id = "left_div"> 	
					<h2> User Name </h2>
					<div class ="dot2">:</div>
					<p><?php echo $field['creator']; ?></p>
					<h2>Date</h2>	
					<div class ="dot2">:</div>
					<p> <?php echo $field['DOC']; ?></p>
					<!--<h2>Address:</h2>	<div class ="dot2">:</div>-->
				</div>  <!--end of left div-->			
			</div><!--end of inv_details_one-->
			<div id = "inv_details_two"> 
				<div id = "right_div"> 
					<h2>Cash Box ID:</h2>
					<div class ="dot2">:</div>
					<p><?php echo $field['cashbox_id']; ?></p>
				</div>
			</div><!--end of inv_details_two-->
		</div> <!--end of invoice_details_header-->	
		
		
		
		
		<!--div class="CSSTableGenerator" style="width:99%;margin-left:3px">
			<table >
				<tr>
					<td> S/N</td>
					<td> Product ID </td> 
					<td> Product Description  </td>
					<td> Unit Price </td>
					<td> Quantity  </td> 
					<td> Total Price </td>
				</tr>
	
			?>
				<tr>
					<td colspan = 6 style = "text-align:left; font-size:10px;"> 
						<?php
							echo '<big style = "font-size: 11px; font-weight:bold;"> In Word: </big>';
							echo $number_to_text;
						?>  
					</td>
				</tr>
			</table>		
		</div--> <!--End of CSSTableGenerator DIV-->
		<div id = "transaction_details">
			<div id= "t_left">
			</div><!--end of t_left div-->			
			<div id= "t_right"> 
				<div id = "left_portion">
					<div class = "title_name">Opening Cash</div>
					<div class ="dot">:</div>
					<div class = "title_name">Closing Cash</div>
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
					<div class = "title_result2">
						<?php
							echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$field['opening_cashbox'];?>
					</div>
					<div class = "title_result2">
						<?php echo '<big style = "font-size: 10px; font-weight:bold;"> &#2547; </big> '.$field['closing_cash']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['thousand']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['five_hundred']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['one_hundred']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['fifty']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['twenty']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['ten']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['five']; ?>
					</div>
					<div class = "title_result2">
						<?php echo $field['two']; ?>
					</div>
					<div class = "title_result2">
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
		<!--end of signature-->
	</div> <!--end of invoice-->
</div>
<!--
<div class="form_field_seperator">
	<?php
		echo anchor('expense_invoice_controller/print_pos_invoice/'.$invoice_id, img('images/print.png'),'class="print_link" target="_blank" title="Print Invoice"');
		$task = $this -> uri -> segment(3);
		if($task == 'old_invoice')
			echo anchor('report_controller/old_invoice',img('images/cancle_img.jpg'),'class="goback_link" ');
		else if($task == 'sale_report')
			echo anchor('report_controller/customer_sale_report',img('images/cancle_img.jpg'),'class="goback_link" ');
		else if($task == 'gate_pass')
			echo anchor('gate_pass_controller/finalize_gate_pass',img('images/cancle_img.jpg'),'class="goback_link" ');
		else echo anchor('sale_controller/my_sale/',img('images/cancle_img.jpg'),'class="goback_link" ');
	?>
</div>
-->

	</body>
</html>