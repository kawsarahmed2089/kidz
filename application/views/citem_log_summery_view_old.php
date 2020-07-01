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
			<div id = "shop_address_test" style="font-size: 16px;">Catering Item Log Report</div>
			<?php if($this->uri->segment(3)!='mm' && $this->uri->segment(4)=='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Date: <?php echo $this->uri->segment(3); ?> </div>
			<?php }
			else if($this->uri->segment(3)!='mm' && $this->uri->segment(4)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Start Date: <?php echo $this->uri->segment(3);?>  End Date: <?php echo $this->uri->segment(4); ?></div>
			<?php }
			if($this->uri->segment(5)!='mm' && $this->uri->segment(5)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Store Name: <?php echo $this->uri->segment(5);?></div>
			<?php }
			
			/* if($this->uri->segment(5)!='' && $this->uri->segment(5)!='mm'){ ?>
			<div id = "shop_address_test" style="font-size: 13px;">Room Number: <?php echo $this->uri->segment(5);?> </div>
			<?php } */
			?>
	</div> <!--end of shop_title_box-->
	<!--<div style="padding: 5px;"> </div> -->
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td> No </td>
				<td > Item Name</td>
				<td > Store Name</td>
				<td > Quantity </td>
				<td > Unit Price </td>
				<td > Total ( Tk )</td>
				<td > Type</td>
				<td > Description</td>
				<td > Resposible Person </td>
				<td > Creator  </td>
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
				$total_amount = 0;
				foreach($item_log_summery_setups -> result() as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td> <?php echo $field -> item_name; ?> </td>
				<td> <?php echo $field -> store_name; ?> </td>
				
		        <td style="text-align:left"> <?php echo $field -> quantity; ?>  </td>
		        <td style = "text-align:right;">
					<?php 
					echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($field -> unit_buy_price, 2);
		        	?> 
		        </td>
		        <td style = " text-align:right;">
					<?php 
						$total = round($field -> unit_buy_price, 2)* round($field -> quantity, 2);
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total,2);
						$total_amount += $total;
					?> 
				</td>
				<td> <?php if($field -> purpose == 2){echo 'Damage'; }
							else if($field -> purpose==3){echo 'Lost';}

				?> </td>
				<td> <?php echo $field -> description; ?> </td> 				
				<td> <?php echo $field -> provider_name; ?> </td> 
				<td> <?php echo $field -> username; ?> </td> 
				<td> <?php echo $field -> doc; ?> </td> 
		    </tr>
			<?php
				$index++;
				endforeach;
			?>
			<tr>
				<td colspan=5 >  </td>
				<td > Total:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_amount, 2); ?>
				</td>
				<td >
				
				</td>
				
				<td>

				</td>
				<td >
				</td>
				<td colspan=2>
				</td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	</body>
</html>
