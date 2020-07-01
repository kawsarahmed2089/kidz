  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Service Token Summery</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" style="margin: 10px;">
		<form role="form" id="servtoken_report_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/report_controller/servicetoken_summery_shoing/">
			<label for="serto_stdate">Start Date : </label>
			<input id="serto_stdate" type="date" name="start_date"/>  <br /><br />
			<label for="serto_enddate">End Date : </label>
			<input id="serto_enddate" type="date" name="end_date"/> <br /><br />
      </div>
	  <div class="row" style="margin: 10px;">
			<div class="input-group input-group-lg">
			<span class="input-group-addon">Service Token : </span>
			<input id="token_honor" type="number" name="service_token" class="form-control" placeholder="Service Token"/> <br />
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
			 <button type="button" class="btn btn-danger btn-lg" id="servto_form_info_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>