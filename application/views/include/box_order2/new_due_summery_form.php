  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Due Summery</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" style="margin: 10px;">
		<form role="form" id="due_summer_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/report_controller/due_summery_shoing/">
			<label for="duee_stdate">Start Date : </label>
			<input id="duee_stdate" type="date" name="start_date"/>  <br /><br />
			<label for="duee_enddate">End Date : </label>
			<input id="duee_enddate" type="date" name="end_date"/> <br /><br />
      </div>
	  <input type="hidden" id="all_clients_order_due_show_link" value="<?php echo base_url();?>index.php/site_controller/show_all_client_order_due">
	  <div class="row" style="margin: 10px;">
			<div class="input-group input-group-lg">
			<span class="input-group-addon">Select Client : </span>
			<select id="due_summe_honor_client" name="client_id" class="form-control">
			</select>
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
			 <div class="col-md-9" id="entert_aion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
			 <div class="col-md-3 text-right">
			 <div class="btn-group">
			 <button type="button" class="btn btn-danger btn-lg" id="due_summ_form_info_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>