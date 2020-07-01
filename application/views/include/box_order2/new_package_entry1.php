      <div class="container-fluid internal_title"><strong>New Package Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
         <input type="hidden" id="select_link_for_packeg" value="<?php echo base_url();?>index.php/site_controller/product_packag_show" />
       <form role="form" id="room_packege_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/package_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Package Name: </span>
          <select class="form-control" name="package_nam" id="select_product_packag" required>
          </select>
          <!--<span class="input-group-btn">
          <button class="btn btn-default" title="Product Category Entry" type="button" id="product_catagorynew"><i class="fa fa-plus"></i></button>
          </span>-->
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Product Name: </span>
          <select class="form-control" name="product_name" id="select_product_name_for_package" required>
          </select>
       </div>
       
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Quantity: </span>
		  <input type="number" id="packag_quantit" name="quantity" class="form-control" required>

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>

	  <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="packag_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="packag_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>