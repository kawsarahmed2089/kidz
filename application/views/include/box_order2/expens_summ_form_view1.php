  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Expense Summery</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" style="margin: 10px;">
		<form role="form" id="expense_report_entry_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/report_controller/expense_summery_shoing/">
			<label for="expp_stdate">Start Date : </label>
			<input id="expp_stdate" type="date" name="start_date"/>  <br /><br />
			<label for="expp_enddate">End Date : </label>
			<input id="expp_enddate" type="date" name="end_date"/> 
      </div>
		<div class="row" style="margin-left: 10px;">
			<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Submit</button>
		</div>
		</form>
		<div class="seperat3"></div>
         <div class="row border_bottom border_top">
			 <div class="seperat3"></div>
			 <div class="col-md-6" id="expen_aion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
			 <div class="col-md-5 text-right">
			 <div class="btn-group">
			 <button type="button" class="btn btn-danger btn-lg" id="expens_form_info_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>