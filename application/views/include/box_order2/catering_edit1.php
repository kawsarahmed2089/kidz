      <div class="container-fluid internal_title"><strong>New Catering Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="catering_edit_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/catering_edit">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Item Name: </span>
		  <input type="text" id="item_catering_edi" name="itemss_namess" class="form-control" placeholder="Item Name"/>
		</div>
       </div>
       </div>
	   	<div class="seperat15"></div>
		<div class="row">
		   <div class="col-md-6">
			<div class="input-group input-group-lg">
			  <span class="input-group-addon">Store Name: </span>
				  <select id="item_catestore_edi" name="store_name" class="form-control" required="required">
					<option value="">Select Store Name</option>
					<option value="Restaurant">Restaurant</option>
					<option value="Kitchen">Kitchen</option>
					<option value="Store">Store</option>
				  </select>
			</div>
		   </div>
		   <div class="col-md-6">
		   </div>
		</div>
	   
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Unit Buy Price: </span>
		  <input type="text" id="item_unitt_edi" name="itemss_unit_price" class="form-control" placeholder="Unit Buy Price"/>
		</div>
       </div>
	   <div class="col-md-6">
	   </div>
       </div>
	   <div class="seperat15"></div>
		<input type="hidden" name="edi_key" id="catering_edi_key">
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="caterin_edit_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="catering_edit_cencel"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>