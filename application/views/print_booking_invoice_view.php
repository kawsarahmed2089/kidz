<?php 
	$booking_plac = "";
	if($booking_setup['booking_place'] == 1){
			$booking_plac = 'Blue Diamond Hall';
		}
	else if($booking_setup['booking_place'] == 2){
			$booking_plac = 'Sapphire Conference Hall';
	}
	else if($booking_setup['booking_place'] == 3){
			$booking_plac = 'Restaurant';
	}
	else if($booking_setup['booking_place'] == 4){
			$booking_plac = 'Sky View Hall';
	}

?>
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
			<p class="font_size2" style="margin: 2px;">Email: info@kidzvillasylhet.com  <?php echo nbs(3);?> Website: www.kidzvillasylhet.com </p>
			<div style="width: 100%; height: 1px; border-bottom: 1px #DDDDDD solid;"></div>
			</div>
			<h3 class="text-center"><ins>Booking Form</ins></h3>
			</div>
			<div class="row">

				<div class="col-xs-8">
					<h4><b>Booking ID: <?php echo $booking_setup['booking_id'];?></b></h4>
						<p><b>Name:</b> <?php echo $booking_setup['person_name'];?></p> 
						<p><b>Address:</b> <?php echo $booking_setup['address'];?></p> 
						<p><b>Contact Number:</b> <?php echo $booking_setup['contact_number'];?></p> 
						<p><b>Hall Name:</b> <?php echo $booking_plac;?></p> 
						<p><b>Name of Programme:</b> <?php echo $booking_setup['programme_name'];?></p> 
						<p><b>Programme Date:</b> <?php 
							$dat = new DateTime($booking_setup['booking_date']);
							echo $dat->format('d/m/Y');?>
						</p> 
						<p><b>Programme Time:</b> <?php echo $booking_setup['booking_time'];?></p>
				</div>
				<div class="col-xs-4">
					<h4>Date: <?php echo date('d/m/Y');?></h4>
						<p><b>No. of Person:</b> <?php echo $booking_setup['total_person'];?></p> 
						<?php if($booking_setup['discount_amount'] > 0){ ?><p><b>Discount:</b> <?php echo '<big style = "font-size: 16px; font-weight:bold;"> &#2547;</big>'.$booking_setup['discount_amount'];?></p> <?php } 
						if($booking_setup['hall_rent'] > 0){ ?>
						<p><b>Hall Rent:</b> <?php echo '<big style = "font-size: 16px; font-weight:bold;"> &#2547;</big>'.$booking_setup['hall_rent'];?></p> <?php } ?>
						<p><b>Advance:</b> <?php if($booking_setup['advance'] > 0){?><?php echo '<big style = "font-size: 16px; font-weight:bold;"> &#2547;</big>'.$booking_setup['advance'];?></p><?php }else{ echo '<big style = "font-size: 16px; font-weight:bold;"> &#2547;</big>0';} ?>
						<?php if($booking_setup['advance'] > 0){?><p><b>Advance Date:</b>
						<?php 
							$dats = new DateTime($booking_setup['advance_date']);
							echo $dats->format('d/m/Y');
						?>
						</p> <?php } ?>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12">
					<h4><b>Menu Items : </b></h4>
						<table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<?php $i=1;if($booking_setup['item1']!='' || $booking_setup['item2']!=''){ ?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item1'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item2'];?> </td>
							</tr>
							<?php }
							if($booking_setup['item3']!='' || $booking_setup['item4']!=''){ ?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item3'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item4'];?> </td>
							</tr>
							<?php }
							if($booking_setup['item5']!='' || $booking_setup['item6']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item5'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item6'];?> </td>
							</tr>
							<?php }
							if($booking_setup['item7']!='' || $booking_setup['item8']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item7'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item8'];?> </td>
							</tr>
							<?php }
							if($booking_setup['item9']!='' || $booking_setup['item10']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item9'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item10'];?> </td>
							</tr>
							<?php }
							if($booking_setup['item11']!='' || $booking_setup['item12']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['item11'];?> </td><td> <?php echo $i++.'. '.$booking_setup['item12'];?> </td>
							</tr>
							<?php }
							?>
							<tr>
								<td> <?php echo $i++.'. ';?> </td><td> <?php echo $i++.'. ';?> </td>
							</tr>
						</table>
				</div>
			</div>
			<?php if($booking_setup['other1']!='' || $booking_setup['other2']!='' || $booking_setup['other3']!='' || $booking_setup['other4']!=''){?>
			<div class="row">
				<div class="col-xs-12">
					<h4><b>Other Items : </b></h4>
						<table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<?php $i=1;if($booking_setup['other1']!='' || $booking_setup['other2']!=''){ ?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other1'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other2'];?> </td>
							</tr>
							<?php }
							if($booking_setup['other3']!='' || $booking_setup['other4']!=''){ ?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other3'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other4'];?> </td>
							</tr>
							<?php }
							if($booking_setup['other5']!='' || $booking_setup['other6']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other5'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other6'];?> </td>
							</tr>
							<?php }
							if($booking_setup['other7']!='' || $booking_setup['other8']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other7'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other8'];?> </td>
							</tr>
							<?php }
							if($booking_setup['other9']!='' || $booking_setup['other10']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other9'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other10'];?> </td>
							</tr>
							<?php }
							if($booking_setup['other11']!='' || $booking_setup['other12']!=''){
							?>
							<tr>
								<td> <?php echo $i++.'. '.$booking_setup['other11'];?> </td><td> <?php echo $i++.'. '.$booking_setup['other12'];?> </td>
							</tr>
							<?php }
							?>
							<tr>
								<td> <?php echo $i++.'. ';?> </td><td> <?php echo $i++.'. ';?> </td>
							</tr>
						</table>
				</div>
			</div>
			<?php } ?>
			<div class="row">

				<div class="col-xs-4">
					<h4><b>Rate Per Plate:  <input type="number" style="width:80px;" value="<?php echo $booking_setup['per_person_amount'];?>" readonly></b></h4>
				</div>
				<div class="col-xs-4">
					<h4><b>Quantity: <input type="number" style="width:80px;" value="<?php echo $booking_setup['total_person'];?>" readonly></b></h4>
				</div>
				<div class="col-xs-3" style="margin-left:-10px;">
					<h4><b>Total: </b></h4>
					<h4><b>Discount: </b></h4>
					<h4><b>Grand Total: </b></h4>
					<h4><b>Advance: </b></h4>
					<h4><b>Total Paid: </b></h4>
					<h4><b>Balance: </b></h4>
				</div>
				<div class="col-xs-1" style="margin-left:-44px;">
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['total_amount_main']+$booking_setup['service_charge'];?>" readonly></b>
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['discount_amount'];?>" readonly></b>
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['total_money']+$booking_setup['service_charge'];?>" readonly></b>
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['advance'];?>" readonly></b>
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['total_paid'];?>" readonly></b>
					<b><input type="number" style="width:90px;line-height:24px;" value="<?php echo $booking_setup['due'];?>" readonly></b>
				</div>
			</div>
			<div class="row">
			<br />
				<p style="font-size: 18px; margin:10px 0px 10px 15px;" class="content">
					Balance will be paid on the same day as the Programme. Extra plates will be charged at the above agreed rate. One hour notice is necessary for food preparation if more than 10% extra plates are required.
				</p>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<br />
					<!--<h4><b>Checked by </b></h4> -->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<h4 style="text-decoration: underline;"><b>Guest's Signature </b></h4>
				</div>
				<div class="col-xs-6">
					<h4 style="text-align: right;"><b>Cashier's Signature </b></h4>
				</div>
				<br />
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h4 style="text-align:center;">---------------------------------------------------------------------------------------------------------------------</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h4><b>Office Use Only</b></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<h4><b style="float:left;line-height:20px;margin-top:12px;">Checked By </b><b><input type="text" style="width:170px;margin-right:150px;line-height:24px;float:right;" value="" ></b></h4>
				</div>
				<div class="col-xs-4">
					<h4><b><input type="text" style="width:170px;line-height:24px;" value="" ></b></h4>
				</div>
			</div>
<!--end of invoice_details_header-->	
				<div id="footer">
					
				</div>
		<!--end of signature-->
	</div> <!--end of invoice-->
</div>


	</body>
</html>