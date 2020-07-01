  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Invoice ID Summery</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
		<form role="form" id="invid_report_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/report_controller/generate_invoice/">
	  <div class="row" style="margin: 10px;">
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Invoice ID : </span>
			<input id="inv_id_value" type="number" name="invoice_id" class="form-control" placeholder="Invoice ID"/> <br /><br />
		</div>
	  </div>
		<div class="seperat15"></div>
		<div class="row" style="margin: 10px;">
			<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Submit</button>
		</div>
		</form>
      
		<div class="seperat3"></div>
         <div class="row border_bottom border_top">
			 <div class="seperat3"></div>
			 <div class="col-md-9" id="invoice_aion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
			 <div class="col-md-3 text-right">
			 <div class="btn-group">
			 <button type="button" class="btn btn-danger btn-lg" id="invoiceid_form_info_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>