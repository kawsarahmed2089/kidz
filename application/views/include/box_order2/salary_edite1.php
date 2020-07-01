      <div class="container-fluid internal_title"><strong>Salary Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="salary_edit_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/salary_edit">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Select Employee Name: </span>
		  <select id="sele_empname_edit" name="employeeName" class="form-control">
		  </select>
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Salary Amount : </span>
		  <input type="number" name="salary_amount" class="form-control" id="salar_amount" placeholder="Salary Amount" />

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Extra Allowance : </span>
		  <input type="number" name="extra_amount" class="form-control" id="extra_allow_edi" placeholder="Extra Allowance">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Fine Amount : </span>
		  <input type="number" name="fine_amount" class="form-control" id="fine_amoun_edi" placeholder="Fine Amount">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">

		  <span class="input-group-addon">Salary Month : </span>
		  <input type="month" name="salary_month" id="salary_mon_edi" class="form-control">
			<input type="hidden" id="salary_edit_keys" name="salary_edit_keys">
			<input type="hidden" id="acc_table_ref_id" name="account_table_ref_id">
		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="salary_edii_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="salary_edite_cencel"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>