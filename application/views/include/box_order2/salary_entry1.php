      <div class="container-fluid internal_title"><strong>New Salary Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="salary_entry_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/salary_entry_save">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Select Employee Name: </span>
		  <select id="sele_employee_name" name="employeeName" class="form-control">
		  </select>
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Salary Amount : </span>
		  <input type="text" name="salary_amount" class="form-control" placeholder="Salary Amount">

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
		  <input type="text" name="extra_amount" class="form-control" placeholder="Extra Allowance">

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
		  <input type="text" name="fine_amount" class="form-control" placeholder="Fine Amount">

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
		  <input type="month" name="salary_month" class="form-control">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="salary_entt_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="salary_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>