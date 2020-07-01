<?php
    /*
			$clien_nameor_room = "";
			if($order_place == 0){ $clien_nameor_room = 'Place:Table - '.$table_number; }
			else if($order_place == 1){ $clien_nameor_room = 'Place: Bar'; }
			else if($order_place == 2){ $clien_nameor_room = 'Place:Room - '.$room_number; }
			else if($order_place == 3){ $clien_nameor_room = 'Place:Take Away'; }
			else if($order_place == 4){ $clien_nameor_room = 'Place:Reception'; }
	*/
?>
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	
	<link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_invoice_style.css" type="text/css"/>
</head>
	<body onload="window.print()"> 
		<div id= "main_container_body_main">
			<div id= "main_container_body_main2" style ="width: 219px;">


		<div id= "main_container_body" style="padding-bottom: 2px;">
			<div class ="pos_top_header_second">
				<!--<div class ="pos_top_header_second_left" style="width:50%;">Waiter : <?php //echo $waiter; ?></div>-->
				<div class ="pos_top_header_second_middle" style="width:50%;"> Creator: <?php echo $invoice_creator; ?></div>
				
			</div>
			<div class ="pos_top_header_second" style="background:;">
				<!--
				<div class ="pos_top_header_second_left_two" style="width:50%;">Customer : <?php //echo $customer_name; ?></div>
				<div class ="pos_top_header_second_middle" style="width:50%;">ID : <?php //if($client_id!= 0){echo $client_id;}else{ echo "0012314";}?></div>
				-->
				<div id ="pos_top_header_second_right" style="width:59%;">Date : <?php echo date('d-m-Y',strtotime($invoice_doc)); ?></div>
				<div id ="pos_top_header_second_right" style="width:40%;">Invoice ID: <?php echo $invoice_id; ?></div>
			</div>
			<div id ="pos_top_header_thired">
			<?php
				if($product_info!= '') 
				{
			?>
				<div class="CSSTableGenerator" style="width:100%;margin:0px auto;float:left">
					<table >	
						<tr>
							<!-- <td  style="font-size:10px; padding:0;margin:0;">Guest No</td> -->
							<td  style="font-size:10px; padding:0;margin:0;">SN</td>
							<td  style="font-size:10px; padding:0;margin:0;">P.Name</td>
							<td  style="font-size:10px; padding:0;margin:0;">Qty</td>
							<td  style="font-size:10px; padding:0;margin:0;">Rate</td>
							<td  style="font-size:10px; padding:0;margin:0;">Total</td>
						</tr>
						<?php $i=1;$total = 0;
							foreach ($product_info as $field):
						?>
						<tr>
							<td style="width:1%">
								<?php 
										//echo $field['guest_number'];
										echo $i;
								?> 
							</td>
							<td style="text-align:left; padding:0;margin:0;">
								<?php 
									echo '<h1 style="height:auto;font-size:11px;font-weight:bold;margin:0px;">'.$field['product_name'].'</h1>'.$field['option_name'];
								?>
							</td>
							<td style="width:14%;text-align:center;">
								<?php 
									echo $field['quantity'].' '.$field['unitName'];
								?> 
							</td>
							<td style = "text-align:right;width:8%">
							<?php
								echo $field['sale_price'];
							?>
							</td>
							<td style = "text-align:right;width:6%">
							<?php 
								echo $field['sale_price']*$field['quantity'];
								$total = $total + ($field['sale_price']*$field['quantity']);
							?>
							</td>
						</tr>
						<tr></tr>
						<?php
						$i++;
							endforeach;
						?>	
						<!--<div height="29"></div> -->
						<tr>	
							<th colspan="4">Total Price: </th>
							<th><?php echo $total;?></th>
						</tr>
						<tr>	
							<th colspan="4">Grand Total: </th>
							<th><?php echo ($total_amount+ $service_charge) - $discount_amount;?></th>
						</tr>
					</table>	
				</div>
				<?php  
					}
				?>
			</div>

		</div> <!--End of main container body -->
	</div>
		</div> <!--End of main container body -->
	</body>
</html>	
