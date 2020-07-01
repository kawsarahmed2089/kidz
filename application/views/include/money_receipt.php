
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	
	<link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_invoice_style.css" type="text/css"/>
	
	<style>
		.pos_top_header_fourth_right,.pos_top_header_fourth_left{
			font-size: 12pt;font-weight: normal;
		}
		.pos_top_header_second{
			font-size: 12pt;
		}
		.CSSTableGenerator td{
			font-size: 12pt;
		}
	</style>
	
</head>
	<body onload="window.print()"> 
		<div id= "main_container_body_main">
			<div id="main_container_body_main2" style ="width: 302px;">


		<div id= "main_container_body">
			<div id ="pos_top_header">
				<div id ="pos_top_header_left"> <img style="height:140px;" src="<?php echo base_url();?>/assets/element_image/hlounge.jpg"/></div>
				<!-- <div id ="pos_top_header_right"></div> -->
			</div>
			<div id ="pos_top_header">
				<div class ="pos_top_header_second_left" style="width:100%;text-align:center;">Mobile: 019 75-19 38 19<br><span style="font-size:13px;">Address: Road #1, Block-E, Uposhohor, Sylhet</span></div>
			</div>
			<div class ="pos_top_header_second" style="margin-top:5px;">
				<div class ="pos_top_header_second_left" style="width:40%;">Inv ID: <?php echo $invoice_id; ?></div>
				<div class ="pos_top_header_second_middle" style="width:60%;float: right;"> Creator: <?php echo $invoice_creator; ?></div>
				<div id ="pos_top_header_second_right" style="width:99%;">Date : <?php echo date('d-m-Y h:i:s',strtotime($invoice_dom)); ?></div>
			</div>
			<div class ="pos_top_header_second" style="background:;">
				<div class ="pos_top_header_second_left_two" style="width: 95%;">Customer : <?php echo $customer_name; ?></div>
				<div class ="pos_top_header_second_middle" style="width:4%;float: right;"><!-- ID : <?php if($client_id!= 0){echo $client_id;}else{ echo "01314";}?>--></div>
			</div>
			<div id ="pos_top_header_thired">
			<?php
				if($product_info!= '') 
				{
			?>
				<div class="CSSTableGenerator" style="width:100%;margin:0px auto;float:left">
					<table >	
						<tr>
							<td > No </td>
							<!--<td >ID</td> -->
							<td >Product Name</td>
							<td >Unit Price</td>
							<td > Qty </td>
							<td >Total</td>
						</tr>
						<?php $i=1;
							foreach ($product_info as $field):
						?>
						<tr>
							<td style="width:5%">
								<?php 
										echo $i ;	
								?> 
							</td> 
							<!-- <td style="width:2%"> <?php //echo $field['product_id'];?> </td> -->
							<td style="text-align:left;">
								<?php 
									echo '<h1 style="height:auto;font-size:12pt;font-weight:normal;margin:0px;">'.$field['product_name'].'</h1>';
								?>
							</td>
							<td style="width:14%;">
								<?php 
									echo round( $field['sale_price'], 2);
								?>
							</td>
							<td style="width:20%;text-align:right;">
								<?php 
									echo $field['quantity'].''.$field['unitName'];
								?> 
							</td>
							<td style="width:16%;text-align:right;border-right:0px solid black;">
								<?php 
									echo ' &#2547;'.round(( $field['total']), 2);
								?> 
							</td>
						</tr>
						<?php
						$i++;
							endforeach;
						?>	
						
						<tr>
							<td colspan="6" style="text-align:left;"> <b><?php echo $number_to_text; ?> Taka Only.</b></td>
						</tr>
					</table>	
				</div>
				<?php  
					}
				?>
			</div>

			<div id ="pos_top_header_fourth">
				<div class ="pos_top_header_fourth_left"> Total Amount </div>
				<div class ="pos_top_header_fourth_right"> <?php echo ' &#2547;'.$total_amount; ?></div>
				<?php if($discount_amount > 0){?>
				<div class ="pos_top_header_fourth_left"> Discount </div>
				<div class ="pos_top_header_fourth_right"> <?php echo ' &#2547;'.$discount_amount; 
				if($discount_type == 1){
					echo " (".$discounts_value."%)";
				}
				?></div>
				<?php } 
				if($service_charge > 0){
				?>
				<div class ="pos_top_header_fourth_left"> Service Charge </div>
				<div class ="pos_top_header_fourth_right"> <?php echo ' &#2547;'.$service_charge; 
				if($service_type == 1){
					echo " (".$service_value."%)";
				}
				?></div>
				<?php } ?>
				<div class ="pos_top_header_fourth_left"> Grand Total </div>
				<?php $grand_tot=($total_amount+$service_charge)-$discount_amount;?>
				<div class ="pos_top_header_fourth_right"> <?php echo ' &#2547;'.$grand_tot; ?></div>
				<div class ="pos_top_header_fourth_left"> Paid </div>
				<div class ="pos_top_header_fourth_right"> <?php echo ' &#2547;'.$paid_amount; ?></div>
			</div>
			<div class ="pos_top_header_fotter" style="margin-top: 5px;"> Thanks From Kidzvilla!!</div>
			<div class ="pos_top_header_fotter" style="width: 49.5%;float:left;text-align: left;margin-top: 20px;"><b> RCO </b></div>
			<div class ="pos_top_header_fotter" style="width: 49.5%;float:right;text-align: right;margin-top: 20px;"><b>Guest Sig</b></div>
			<div style="border-top: 1px solid gray; width: 100%; height: 1px; float:left;"> </div>
			
			<div class ="pos_top_header_fotter" style="background:;">Developed By : <b>IT Lab Solutions Ltd.</b> Call: +88 018 4248 5222</div>
		</div> <!--End of main container body -->
	</div>
		</div> <!--End of main container body -->
		
		
		
		<!--
		<div id= "main_container_body_main">
			<div id= "main_container_body_main2" style ="width: 302px;">
            <center style="text-align:center;">------------------------------------------------------</center>

		<div id= "main_container_body" style="padding-bottom: 2px;">
		        <h4 style="padding:0px;margin:0px; text-align:center;">Kitchen Receipt</h4>
			<div class ="pos_top_header_second">
				<div class ="pos_top_header_second_left" style="width:40%;">Waiter : <?php if($waiter != 'All Types')echo $waiter; ?></div>
				<div class ="pos_top_header_second_middle" style="width:60%;"> Creator: <?php echo $invoice_creator; ?></div>
				
			</div>
			<?php
			    /*
                			$clien_nameor_room = "";
                			if($order_place == 0){ $clien_nameor_room = 'Place:Table - '.$table_number; }
                			else if($order_place == 1){ $clien_nameor_room = 'Place: Bar'; }
                			else if($order_place == 2){ $clien_nameor_room = 'Place:Room - '.$room_number; }
                			else if($order_place == 3){ $clien_nameor_room = 'Place:Take Away'; }
                			else if($order_place == 4){ $clien_nameor_room = 'Place:Reception'; }
            
			?>
			<div class ="pos_top_header_second" style="background:;">
				<div class ="pos_top_header_second_left_two" style="width:50%;">Customer : <?php echo $customer_name; ?></div>
				<div class ="pos_top_header_second_middle" style="width:50%;"><?php echo $clien_nameor_room; ?></div>
				<div id ="pos_top_header_second_right" style="width:96%;">Date : <?php echo date('d-m-Y h:i:s',strtotime($invoice_dom)); ?></div>
				<!--<div id ="pos_top_header_second_right" style="width:40%;"></div> -->
			</div>
			<div id ="pos_top_header_thired">
			<?php
				if($product_info!= '') 
				{
			?>
				<div class="CSSTableGenerator" style="width:100%;margin:0px auto;float:left">
					<table >	
						<tr>
							<td  style="font-size:10px; padding:0;margin:0;">Guest No</td>
							<td  style="font-size:10px; padding:0;margin:0;">Product Name</td>
							<td  style="font-size:10px; padding:0;margin:0;">Quantity</td>
							<td  style="font-size:10px; padding:0;margin:0;">Comment</td>
						</tr>
						<?php $i=1;
							foreach ($product_info as $field):
						?>
						<tr>
							<td style="width:5%">
								<?php 
										echo $field['guest_number'];
								?> 
							</td>
							<td style="text-align:left; padding:0;margin:0;">
								<?php 
									echo '<h1 style="height:auto;font-size:11px;font-weight:bold;margin:0px;">'.$field['product_name'].'</h1>'.$field['option_name'];
								?>
							</td>
							<td style="width:14%;text-align:right;">
								<?php 
									echo $field['quantity'].' '.$field['unitName'];
								?> 
							</td>
							<td style = "text-align:right;width:8%">
							<?php 
								echo $field['prep_comment'];
							?>
							</td>
						</tr>
						<tr></tr>
						<?php
						$i++;
							endforeach;
						?>	
						<!--<div height="29"></div> -->
					</table>	
				</div>
				<?php  
					}
					*/
				?>
			</div>

		</div> 
	</div>
		</div> 
		-->
	</body>
</html>	
