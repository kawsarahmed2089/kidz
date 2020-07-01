<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo $this->tank_auth->get_hotel_name();?></title>
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
			<div id = "shop_title_test"> Catering List </div>
			<div id = "shop_address_test"> <?php echo 'Date: '.date('d-m-Y',strtotime($bd_date));?></div>	
		</div><!--end of shop_title_box-->
<!--end of invoice_details_header-->	
		
<?php
		if(count($catering_info)!= 0) 
		{
?>
			<div class="CSSTableGenerator" style="margin-top:16px;">
				<table >	
							<tr>
							  <td data-sort="int"><h4>S/N</h4></td>
							  <td data-sort="string"><h4>Item Name</h4></td>
							  <td data-sort="int"><h4> Stock Quantity</h4></td>
							  <td data-sort="string"><h4>Unit Price</h4> </td>
							  <td data-sort="string"><h4>Use Quantity</h4></td>
							  <td data-sort="string"><h4>Damage/Lost</h4></td>
							  <td data-sort="string"><h4>Creator</h4></td>
							  <td data-sort="string"><h4>DOC</h4></td>
							</tr>
			<?php 
				$i=1;
				foreach($catering_info as $field):?>
					<tr>
						<td style="width:6%">
							<?php 
									echo $i ;	
							?> 
						</td> 
						<td  style = "font-size:14px;width:3%; ">
							<?php 
								echo $field['item_name'];
							?>
						</td> 
						<td style="text-align:right;width:10%;">
							<?php 
								echo $field['stock_amount'];
							?>
						</td>
						
						<td style = "text-align:right;width:11%; ">
							<?php 
								echo '&#2547; '.$field['unit_buy_price'];
							?> 
						</td>
						<td style = "text-align:right;width:10%">
							<?php 
								echo $field['current_use_amount'];
							?>
						</td>
						<td style = "text-align:right;width:12%">
							<?php 
							echo $field['damage_lost'];
							?> 
						</td>
						<td style = "text-align:right;width:3%">
							<?php 
							echo $field['username'];
							?> 
						</td>
						<td style = "text-align:center;width:19%">
							<?php 
							echo date('d-m-Y',strtotime($field['catering_doc']));
							?> 
						</td>
						
						
					</tr>
					<?php
						  $i++;
						  endforeach;
					?>	
					<tr>
						<td colspan = 9 style = "text-align:center; font-size:15px;"> 
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