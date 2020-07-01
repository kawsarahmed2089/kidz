  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Invoice And Realize Summery</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
      
		<form role="form" id="invrealize_report_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/report_controller/invoice_and_realize_shoing/">
		<div class="row" style="margin: 10px;">
			<div class="col-md-10">
				<div class="col-md-4">
					<label for="serto_stdate">Date : </label>
				</div>
				<input class="col-md-8" id="invre_stdate" type="date" name="start_date"/>  <br /><br />
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
			 <div class="col-md-9" id="servto_aion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
			 <div class="col-md-3 text-right">
			 <div class="btn-group">
			 <button type="button" class="btn btn-danger btn-lg" id="invoice_realize_frm_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>