      <div class="container-fluid internal_title"><strong>New Stock Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="stock_updatess_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/product_stock_update">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Select Product Name: </span>
		  <select id="sele_produc_name" name="proName" class="form-control">
		  </select>
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Quantity: </span>
		  <input type="text" name="quantitys" class="form-control" placeholder="Quantity">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="stock_updat_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="stocke_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>