      <div class="container-fluid internal_title"><strong>New Product Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
         <input type="hidden" id="select_link_for_cat" value="<?php echo base_url();?>index.php/site_controller/product_catagory_show" />
		 <input type="hidden" id="select_link_for_unit_name" value="<?php echo base_url();?>index.php/site_controller/unit_name_show" />
		 <input type="hidden" id="select_link_for_service_typ_show" value="<?php echo base_url();?>index.php/site_controller/service_type_show" />
       <form role="form" id="room_product_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/product_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Category: </span>
          <select class="form-control" name="category_id" id="select_product_catagory">
		  
          </select>
          <span class="input-group-btn">
          <button class="btn btn-success" title="Product Category Entry" type="button" id="product_catagorynew"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Product Name: </span>
		  <input type="text" id="product_nam" name="proName" class="form-control" placeholder="Product Name">
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Product Code: </span>
		  <input type="text" name="proCode" class="form-control" placeholder="Product Code">
		</div>
       </div>
	   <div class="col-md-6">
	   </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Cost Price: </span>
		  <input type="number" id="cosPrice" name="cosPrice" class="form-control" placeholder="Cost Price">

		</div>
       </div>
	   <div class="col-md-6">
		   <div class="input-group input-group-lg">
		   
			 <span class="input-group-addon">Service Type: </span>
			  <select class="form-control" name="service_id" id="select_service_type" required="required">
			  
			  </select>
		   </div>
	   </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Sale Price: </span>
		  <input type="number" name="sale_price" min="0" required="required" id="salPrice" class="form-control" placeholder="Sale Price">
		</div>
       </div>
       
       <div class="col-md-6">
			<div class="seperat1"></div>
			<div class="radio">
				  <label>
					<input type="checkbox" name="pack_definition" id="checkKitchen"/>
					Package Definition
				  </label>
			</div>
       <div class="seperat10"></div>
       </div>
       
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Stock Amount: </span>
		  <input type="number" name="stock_amount" min="0" class="form-control" placeholder="Stock Amount">
		</div>
       </div>
       
       <div class="col-md-6">
       <div class="seperat1"></div>
			<div class="radio">
				  <label>
					<input type="checkbox" name="checkKitchen" id="checkKitchen" value="TRUE" checked>
					Show in Kitchen
				  </label>
			</div>
       <div class="seperat10"></div>
       </div>
       
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
		  <span class="input-group-addon">Unit Name: </span>
		  <select name="unit_name" class="form-control" id="unit_name_prod_entry" required>
		  </select>
		  <span class="input-group-btn">
			<button class="btn btn-default" title="Product Unit Name Entry" type="button" id="product_unitnameynew"><i class="fa fa-plus"></i></button>
          </span>
		</div>
		  
       </div>
       
       <div class="col-md-6">

       </div>
       
       </div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="product_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="product_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>