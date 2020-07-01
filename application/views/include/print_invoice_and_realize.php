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
	
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	  <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css">
	  <style>
	  p{font-size: 16px;}
	  </style>
</head>
<!--<body onload="javascript:window.print()">-->
<body>
<div id ="main_invoice">
	<div id = "invoice">
			<div class="row">

			<div class="col-xs-12">
			<button type="button" class="btn btn-success btn-sm pull-right hidden-print" onclick="print();"> <i class="fa fa-print"></i> Print </button>
			</div>
			</div>

			<div class="row all">
			<div class="col-xs-12 text-center">
			<h1 style="margin: 2px;"><?php echo $this->tank_auth->get_hotel_name();?></h1>
			<p class="font_size2" style="margin: 2px;"><?php echo $this->tank_auth->get_shopaddress();?></p>
			<p class="font_size2" style="margin: 2px;">Mobile: +88 <?php echo $this->tank_auth->get_hotel_contact();?></p>
			<p class="font_size2" style="margin: 2px;">Email: info@kidzvillasylhet.com <?php echo nbs(3);?> Website: www.kidzvillasylhet.com</p>
			<div style="width: 100%; height: 1px; border-bottom: 1px #DDDDDD solid;"></div>
			</div>
			<h3 class="text-center"><ins>Date Wise Invoices And Due Paid</ins></h3>
			<?php if($this->uri->segment(3)!='mm'){ ?>
				<h4 style="text-align: center;"> Date: <?php echo $this->uri->segment(3); ?> </h4>
			<?php } ?>
			</div>
	<!--<div style="padding: 5px;"> </div> -->
	<h3 style="margin-top:0px;margin-bottom:0px;text-decoration: underline;"> This Day's Invoices:</h3>
	<?php if($all_invoice_id -> num_rows() > 0){?>
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td> No </td>
				<td > invoice ID</td>
				<td >Customer Name </td>
				<td > Grand Total</td>
				<td > Due </td>
				
				<td > Total Paid </td>
				<td > Order Type </td>
				<td > Date  </td>
			</tr>
		
			<?php
				$index = 1;
				$total_sale = 0;
				$total_complimentary = 0;
				$total_entertainment = 0;
				$total_normal = 0;
				$total_due = 0;
				$total_receivable = 0;
				$total_received = 0;
				$total_stuff = 0;
				$total_stuff_due = 0;
				
				foreach($all_invoice_id -> result() as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td> <?php echo $field -> order_id; ?> </td> 
				
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
								$total_stuff_due = $total_stuff_due+$due;
							}
				?> 
				</td> 
				<td> <?php echo $field -> doc; ?> </td> 
		    </tr>
			<?php
				$index++;
				endforeach;
				$total_due = $total_sale - ($total_complimentary+$total_entertainment+$total_received);
			?>
			<tr>
				<td > Total Sale:
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
				<td >Total Stuff Due:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_stuff_due, 2); ?>
				</td>
				<td>
					Total Received:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_received, 2); ?>
				
				</td>
				<td>
					Total Due:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_due, 2); ?>
				
				</td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	<?php } ?>
	<h3 style="margin-top:0px;margin-bottom:0px;text-decoration: underline;"> Due Paid This Day:</h3>
	<?php if($realize_setup -> num_rows() > 0){?>
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td> No </td>
				<td > invoice ID</td>
				<td > Customer Name </td>
				<td > Room Number </td>
				<td > Total </td>
				<td > Due</td>
				<td > This Day Paid </td>
				<td > Paid </td>
				<td > Order Type </td>
				<td > Realize Date  </td>
			</tr>
		
			<?php
				$index = 1;
				//$total_sale = 0;
				//$total_complimentary = 0;
				//$total_entertainment = 0;
				//$total_normal = 0;
				//$total_due = 0;
				//$total_receivable = 0;
				$total_real_received = 0;
				//$total_stuff = 0;
				
				foreach($realize_setup -> result() as $field):
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
						//$total_sale += $grand_total;
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
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($field->transaction_amount,2);
						$total_real_received += $field -> transaction_amount;
					?> 
				</td>
				<td style = " text-align:right;">
					<?php 
						echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($field->paid_amount,2);
						//$total_received += $field -> paid_amount;
					?> 
				</td>
				<td> <?php if($field -> order_type==0)echo 'Normal'; 
							else if($field -> order_type==1){echo 'Complimentary'; 
							//$total_complimentary = $total_complimentary+$grand_total;
							}
							else if($field -> order_type==2){echo 'Entertainment';
							//$total_entertainment = $total_entertainment+$grand_total;
							}
							else if($field -> order_type==3){echo 'Stuff';
							//$total_stuff = $total_stuff+$grand_total;
							}
				?> </td> 
				<td> <?php echo $field -> doc; ?> </td> 
		    </tr>
			<?php
				$index++;
				endforeach;
				//$total_due = $total_sale - ($total_complimentary+$total_entertainment+$total_received);
			?>
			<tr>
				<!--<td  colspan=2> Total Sale:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_sale, 2); ?>
					
				</td>
				<td><!--Total Complimentary:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_complimentary, 2); ?>
					
				</td>
				<td colspan=2><!--Total Entertainment:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_entertainment, 2); ?>
					
				</td>
				<td ><!--Total Stuff:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round($total_stuff, 2); ?>
					
				</td>
				-->
				<td colspan="10">
					Total Received:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_real_received, 2); ?>
				
				</td>
				<!--
				<td>
					Total Due:
					<?php echo '<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '.round( $total_due, 2); ?>
					
				</td>
				
				<td></td>
				-->
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	<?php } ?>
	
		<div class="CSSTableGenerator"  style="float:right;margin:10px 16px;padding:0; width: 36%;">
			<table border=1>
				<tr>
					<td> <h4>Head</h4> </td>
					<td> <h4>Amount</h4> </td>
				</tr>
				<tr>
					<td> Total Sale </td>
					<td> <?php echo $total_sale;?> </td>
				</tr>
				<tr>
					<td> Total Complimentary </td>
					<td> <?php echo $total_complimentary;?> </td>
				</tr>
				<tr>
					<td> Total Entertainment </td>
					<td> <?php echo $total_entertainment;?> </td>
				</tr>
				<tr>
					<td> Total Stuff </td>
					<td> <?php echo $total_stuff;?> </td>
				</tr>
				<tr>
					<td> Total Stuff Due</td>
					<td> <?php echo $total_stuff_due;?> </td>
				</tr>
				<tr>
					<td> Total Received</td>
					<td> <?php echo $total_received;?> </td>
				</tr>
				<tr>
					<td> Total Due</td>
					<td> <?php echo $total_due;?> </td>
				</tr>
				<tr>
					<td> Total Realized</td>
					<td> <?php echo $total_real_received;?> </td>
				</tr>
			</table>
		</div>
	
	
	
	</body>
</html>
