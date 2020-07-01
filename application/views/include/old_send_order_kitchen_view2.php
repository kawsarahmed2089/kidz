<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/POS_invoice_style.css" type="text/css"/>
</head>
	<body onload="window.print()"> 
		<div id= "main_container_body_main">
			<div id= "main_container_body_main2" style ="width: 219px;">


		<div id= "main_container_body" style="padding-bottom: 30px;">
			<div class ="pos_top_header_second">
				<div class ="pos_top_header_second_left" style="width:45%;">Inv ID : <?php echo $invoice_id; ?></div>
				<div class ="pos_top_header_second_middle" style="width:61%;"> Creator: <?php echo $invoice_creator; ?></div>
				<div id ="pos_top_header_second_right" style="width:39%;">Date : <?php echo date('d-m-Y',strtotime($invoice_doc)); ?></div>
			</div>
			<div class ="pos_top_header_second" style="background:;">
				<div class ="pos_top_header_second_left_two">Customer : <?php echo $customer_name; ?></div>
				<div class ="pos_top_header_second_middle" style="width:30%;">ID : <?php if($client_id!= 0){echo $client_id;}else{ echo "0012314";}?></div>
			</div>
			<div id ="pos_top_header_thired">
			<?php
				if($product_info!= '') 
				{
			?>
				<div class="CSSTableGenerator" style="width:100%;margin:0px auto;float:left">
					<table >	
						<tr>
							<td  style="font-size:10px; padding:0;margin:0;"> No </td>
							<td  style="font-size:10px; padding:0;margin:0;">Product Name</td>
							<td  style="font-size:10px; padding:0;margin:0;">Quantity</td>
							<td  style="font-size:10px; padding:0;margin:0;">Option</td>
							<td  style="font-size:10px; padding:0;margin:0;">Comment</td>
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
							<td style="text-align:left; padding:0;margin:0;">
								<?php 
									echo '<h1 style="height:auto;font-size:12px;font-weight:normal;margin:0px;">'.$field['product_name'].'</h1>'.;
								?>
							</td>
							<td style="width:14%;text-align:right;">
								<?php 
									echo $field['quantity'].' pcs';
								?> 
							</td>
							<td style = "text-align:left;width:23%; padding:0;margin:0;">
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
						</tr>
						<tr></tr>
						<?php
						$i++;
							endforeach;
						?>	
						<div height="29"></div>
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
