      <div class="container-fluid internal_title"><strong>New Usage Resource Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="usage_entry_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/usage_resource_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Select Category: </span>
          <select id="usage_resour_secategory" name="category" class="form-control">
		  </select>
         
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Select Product: </span>
		  <select id="usage_resour_seproduct" name="product_id" class="form-control">
		  </select>
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">

		  <span class="input-group-addon">Use Amount: </span>
		  <input type="number" id="usage_amountid" name="amount" class="form-control" placeholder="Use Amount">

		</div>
       </div>
	   <div class="col-md-6">
       <div class="seperat1"></div>
			<!--<div class="radio">
				  <label>
					<input type="checkbox" name="checkKitchen" value="TRUE" checked>
					Active
				  </label>
			</div> -->
       <div class="seperat10"></div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Description: </span>
		  <textarea class="form-control tex_areasige" name="use_description"></textarea>
		</div>
       </div>
       </div>

       <div class="seperat15"></div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="usage_resou_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="usage_resour_entry_cencel"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>