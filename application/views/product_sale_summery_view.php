<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> <?php echo $this->tank_auth->get_hotel_name();?> </title>
	<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/invoice_style.css" type="text/css"/>
</head>
<body>
	<div id="shop_title_box" style="margin-left:0px ;padding:0; width: 98%;">			
			<div id = "shop_title_test"> <?php echo $this->tank_auth->get_shopname(); ?>  </div>
			<div id = "shop_address_test">  <?php echo $this->tank_auth->get_shopaddress(); ?></div>			
			<div id = "shop_title_test" style="font-size: 17px;"> Product Sale Summery</div>
			<?php if($this->uri->segment(3)!='mm' && $this->uri->segment(4)=='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(3))); ?> </div>
			<?php }
			else if($this->uri->segment(3)!='mm' && $this->uri->segment(4)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Start Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(3)));?>  End Date: <?php echo date('d-m-Y',strtotime($this->uri->segment(4))); ?></div>
			<?php }
			if($this->uri->segment(5)!='mm' && $this->uri->segment(5)!='mm'){ ?>
				<div id = "shop_title_test" style="font-size: 13px;"> Product Name: <?php if(isset($sale_log[0]->product_name))echo $sale_log[0]->product_name;?></div>
			<?php } ?>
	</div> <!--end of shop_title_box-->
	<!--<div style="padding: 5px;"> </div> -->
	<div class="CSSTableGenerator"  style="margin:10px 0px;padding:0; width: 98%;">
		<table>
			<tr>
				<td > No </td>
				<td > Item Name</td>
				<td > Quantity </td>
				<td > Date</td>
			</tr>
		
			<?php
				$index      = 1;
				$total_qnty = 0;
				foreach($sale_log as $field):
			?>
			<tr>
				<td> <?php echo $index; ?> </td>
				<td style="text-align:left;"> <?php echo $field->product_name; ?> </td>
				<td> <?php echo $field->qnty.' '.$field->unitName;?> </td>
				<td> <?php echo date('d-m-Y',strtotime($field->doc)); ?> </td>
			</tr>
			<?php
			    $field->qnty = $field->qnty*1;
			    $total_qnty = $total_qnty + $field->qnty;
				$index++;
				endforeach;
			?>
			<tr>
			    <td> </td>
				<td> </td>
				<td> Total Quantity: <?php echo $total_qnty; ?> </td>
				<td> </td>
			</tr>
		</table>		
	</div> <!--End of CSSTableGenerator DIV-->
	</body>
</html>
