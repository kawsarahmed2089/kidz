      <div class="container-fluid internal_title"><strong>New Expense Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="expense_entry_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/expense_save">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Service Provider Name: </span>
		  <input type="text" id="provider_nam" name="proName" class="form-control" placeholder="Provider Name">
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Purpose: </span>
		  <input type="text" name="purpose" class="form-control" placeholder="Purpose">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Amount: </span>
		  <input type="number" name="amount" min="0" required="required" id="exp_amount" class="form-control" placeholder="Amount">
		</div>
       </div>
       
       <div class="col-md-6">
       </div>
       
       </div>
	   <div class="seperat15"></div>
		<div class="row">
			   <div class="col-md-2">
			   <div class="seperat5"></div>
			   Comment:
			   </div>
			   <div class="col-md-10">
			   <textarea name="comment" class="form-control tex_areasige"></textarea>
			   </div>
       </div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="expen_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="expens_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>