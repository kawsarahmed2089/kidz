<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/invoice_style.css" type="text/css"/>
</head>
<body>
	<div id="shop_title_box" style="margin-left:0px ;padding:0; width: 98%;">			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_shopname(); ?>  </div>
			<div id = "shop_address_test">  <?php echo $this->tank_auth->get_shopaddress(); ?></div>			
			<div id = "shop_title_test" style="font-size: 17px;"> <?php echo $this->tank_auth->get_hotel_name();?> Invoice Details</div>
			<div id = "shop_address_test" style="font-size: 16px;">Room Credit Report</div>
			<?php if($this->uri->segment(3)!='mm' && $this->uri->segment(4)=='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Date: <?php echo $this->uri->segment(3); ?> </div>
			<?php }
			else if($this->uri->segment(3)!='mm' && $this->uri->segment(4)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Start Date: <?php echo $this->uri->segment(3);?>  End Date: <?php echo $this->uri->segment(4); ?></div>
			<?php }
			if($this->uri->segment(5)!='' && $this->uri->segment(5)!='mm'){ ?>
			<div id = "shop_address_test" style="font-size: 13px;">Room Number: <?php echo $this->uri->segment(5);?> </div>
			<?php }
			?>
	</div> <!--end of shop_title_box-->
	<!--<div style="padding: 5px;"> </div> -->
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td> No </td>
				<td > invoice ID</td>
				<td > Client Name </td>
				<td > Total  ( Tk ) </td>
				<td > Paid ( Tk )</td>
				<td > Due ( Tk )</td>
				<td > Order Type </td>
				<td > Date  </td>
			</tr>
		
			<?php
				$index = 1;
				$total_sale = 0;
				$total_complimentary = 0;
				$total_entertainment = 0;
				$total_stuff = 0;
				$total_normal = 0;
				$total_receivable = 0;
				$total_received = 0;
				foreach($room_credit_summery_setups -> result() as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td> <a href="<?php echo base_url();?>report_controller/generate_invoice/<?php echo $field -> order_id;?>"><?php echo $field -> order_id; ?></a> </td>
				
		        <td style="text-align:left"> <?php echo $field -> client_name; ?>  </td>
		        <td style = "text-align:right;">
					<?php 
					$grand_total = ($field->total_amount+$field->service_charge)-$field->discount_amount;
					echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($grand_total, 2);
						$total_sale += $grand_total;
		        	?> 
		        </td>
		        <td style = " text-align:right;">
					<?php 
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($field->paid_amount,2);
						$total_received += $field -> paid_amount;
					?> 
				</td>
				<td style = " text-align:right;">
					<?php 
						$duee = $grand_total- $field->paid_amount;
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($duee,2);
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
				<td> <?php echo $field -> doc; ?> </td> 
		    </tr>
			<?php
				$index++;
				endforeach;
			?>
			<tr>
				<td >  </td>
				<td > Total Sale:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_sale, 2); ?>
				</td>
				<td >
				
				</td>
				
				<td>
					Total Received:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_received, 2); ?>
				
				</td>
				<td >Total Due:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_sale-$total_received, 2); ?>
				
				</td>
				<td colspan=3>
					<!--Total Receivable: -->
					<?php //echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_receivable , 2); ?>
					
				</td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	</body>
</html>
