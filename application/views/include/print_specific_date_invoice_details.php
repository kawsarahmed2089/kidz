<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $this->tank_auth->get_hotel_name();?> </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/invoice_style.css" type="text/css"/>
	<style>
		.CSSTableGenerator tr:first-child td {
			vertical-align: top;
		}
		.CSSTableGenerator td,.CSSTableGenerator tr:first-child td,.CSSTableGenerator tr td:last-child {
			border-width: 1px;
		}
		.CSSTableGenerator tr:first-child td{ color: #000;}
		.CSSTableGenerator tr:last-child td:last-child,.CSSTableGenerator tr:last-child td{ border-width: 1px;}
		#shop_title_box{
			//margin-bottom: -16px;
			height: auto;
		}
	</style>
</head>
<body onload="javascript:window.print()">
	<div id="shop_title_box" style="margin-left:0px ;padding:0; width: 98%;">			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_shopname(); ?>  </div>
			<div id = "shop_address_test">  <?php echo $this->tank_auth->get_shopaddress(); ?></div>			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_hotel_name();?> Invoice Details</div>
			<div id = "shop_address_test" style="font-size: 16px;">Date Wise Invoices</div>
			<?php if($this->uri->segment(3)!='mm' && $this->uri->segment(4)=='mm'){ ?>
				<div id = "shop_title_test"> Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(3))); ?> </div>
			<?php }
			else if($this->uri->segment(3)!='mm' && $this->uri->segment(4)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Start Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(3)));?>  End Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(4))); ?></div>
			<?php }
			if($this->uri->segment(5)!='' && $this->uri->segment(5)!='mm'){ ?>
			<div id = "shop_address_test" style="font-size: 13px;">Username: <?php echo $username; ?> </div>
			<?php }
			else if($this->uri->segment(6)!='' && $this->uri->segment(6)!='mm'){ ?>
			<div id = "shop_address_test" style="font-size: 13px;">Waiter Name: <?php echo $waitername; ?> </div>
			<?php } 
			?>
	</div> <!--end of shop_title_box-->
	<!--<div style="padding: 5px;"> </div> -->
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td> No </td>
				<td > invoice ID</td>
				<td > Customer Name </td>
				<td > Room </td>
				<td > Total  ( Tk ) </td>
				<td > Due  ( Tk ) </td>
				<td > Paid ( Tk )</td>
				<td > Order Type </td>
				<td > Order Creator  </td>
				<td > Date  </td>
			</tr>
		
			<?php
				$index = 1;
				$total_sale = 0;
				$total_complimentary = 0;
				$total_entertainment = 0;
				$total_normal = 0;
				$total_receivable = 0;
				$total_received = 0;
				$total_stuff = 0;
				foreach($all_invoice_id -> result() as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td> <?php echo $field -> order_id; ?> </td> 
				
		        <td style="text-align:left"> <?php echo $field -> client_name; ?>  </td>
				<td style="text-align:left"> <?php echo $field -> room_number; ?>  </td>
		        <td style = "text-align:right;">
					<?php 
					$grand_total = ($field->total_amount+$field->service_charge)-$field->discount_amount;
					echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($grand_total, 2);
						$total_sale += $grand_total;
		        	?> 
		        </td>
		        <td style = " text-align:right;">
					<?php 
						$due = $grand_total - $field->paid_amount;
						if($due >= 0){
							echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($due,2);
						}
						else{
							echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> 0.00';
						}
					?> 
				</td>
				<td style = " text-align:right;">
					<?php 
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($field->paid_amount,2);
						$total_received += $field -> paid_amount;
					?> 
				</td>
				<td> <?php if($field -> order_type==0)echo 'Normal'; 
							else if($field -> order_type==1){echo 'Complimentary'; 
							$total_complimentary = $total_complimentary+$grand_total;}
							else if($field -> order_type==2){echo 'Entertainment';
							$total_entertainment = $total_entertainment+$grand_total;
							}
							else if($field -> order_type==3){echo 'Stuff';
							$total_stuff = $total_stuff+$grand_total;
							}
				?> </td> 
				<td> <?php echo $field -> username; ?> </td> 
				<td> <?php echo $field -> doc; ?> </td> 
		    </tr>
			<?php
				$index++;
				endforeach;
				$total_due = $total_sale - ($total_complimentary+$total_entertainment+$total_received);
			?>
			<tr>
				<td  colspan=2> Total Sale:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_sale, 2); ?>
				</td>
				<td>Total Complimentary:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_complimentary, 2); ?>
				
				</td>
				<td colspan=2>Total Entertainment:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_entertainment, 2); ?>
				
				</td>
				<td >Total Stuff:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_stuff, 2); ?>
				</td>
				<td>
					Total Received:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_received, 2); ?>
				
				</td>
				<td colspan="2">
					Total Due:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_due, 2); ?>
				
				</td>
				<td></td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	</body>
</html>
