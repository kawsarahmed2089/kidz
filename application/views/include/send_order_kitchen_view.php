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
			<div id = "shop_title_test"> Invoice </div>
		</div><!--end of shop_title_box-->
		<div id = "invoice_details_header">	
			<div id = "inv_details_one">
				<div id = "left_div"> 	
					<h2> Customer Name </h2>
					<div class ="dot2">:</div>
					<p><?php echo "kawsar"; ?></p>
					<h2> Contact No </h2>
					<div class ="dot2">:</div>
					<p > <?php echo "01715928034";?> </p>
					<h2>Address:</h2>	<div class ="dot2">:</div>
					<p>
						<?php
							echo 'IT Lab';
						?>
					</p>	
				</div>  <!--end of left div-->			
			</div><!--end of inv_details_one-->
			<div id = "inv_details_two"> 
				<div id = "right_div"> 
					<h2>Invoice ID:</h2>
					<div class ="dot2">:</div>
					<p><?php echo $invoice_id; ?></p>
					<h2>Invoice Creator</h2>	
					<div class ="dot2">:</div>
					<p> <?php echo "kawsar"; ?></p>
					<h2>Date</h2>	
					<div class ="dot2">:</div>
					<p> <?php echo "2015-02-04"; ?></p>
				</div>
			</div><!--end of inv_details_two-->
		</div> <!--end of invoice_details_header-->	
		
<?php
		if($product_info!= '') 
		{
?>
			 <div class="mid_box_top">
			   <p> Listed Products</p>
			 </div>
			<div class="CSSTableGenerator" style="">
				 <table >	
					<tr>
						<td > No </td>
						<td >Product Name</td>
						<td >Unit Price</td>
						<td >Quantity</td>
						<td >Prep. Option</td>
						<td >Prep. Comment</td>
						<td >Total</td>
					</tr>
					<?php
						$i=1; 
						foreach ($product_info as $field):
					?>
					<tr>
						<td style="width:5%">
							<?php 
									echo $i ;	
							?> 
						</td> 
						<!--td style="text-align:left;width:45%;">
							<?php 
								echo $field['product_name'].'</br>';
							?> 
						</td-->
						<td style="text-align:left;width:30%;">
							<?php 
								echo '<h1 style="height:13px;font-size:12px;font-weight:normal;margin:0px;">'.$field['product_name'].'</h1>';
							?>
						</td>
						
						<td style = "text-align:right;width:9%; ">
							<?php 
								echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $field['sale_price'], 2);
							?> 
						</td>
						<td style = "text-align:right;width:8%">
							<?php 
								echo $field['quantity'].' '.$field['unitName'];
							?>
						</td>
						<td style = "text-align:left;width:23%">
							<?php 
								echo $field['option_name'];
								/* if($field -> discount_type == 1) echo "%";
								else if($field -> discount_type == 1) echo "tk"; */
							?>
						</td>
						<td style = "text-align:right;width:8%">
							<?php 
								echo $field['prep_comment'];
								/* if($field -> discount_type == 1) echo "%";
								else if($field -> discount_type == 1) echo "tk"; */
							?>
						</td>
						<td style = "text-align:right;width:9%">
							<?php 
							echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round(( $field['total']), 2);
							?> 
						</td>
						
						
					</tr>
					<?php
						  $i++;
						  endforeach;
					?>	
					<tr>
						<td colspan = 7 style = "text-align:left; font-size:10px;"> 
							<?php
								echo '<big style = "font-size: 11px; font-weight:bold;"> In Word: </big>';
								echo $number_to_text." TAKA ONLY";
							?>  
						</td>
					</tr>
				</table>		
			</div> <!--	End of CSSTableGenerator DIV-->		
<?php  
		}
?>
		
		
		
		
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