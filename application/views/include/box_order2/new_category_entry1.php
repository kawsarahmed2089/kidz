 

      <div class="container-fluid internal_title"><strong>Add Category</strong></div>
      
      <form role="form" id="categor_entr_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/product_category_save">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-6">
		   <div class="input-group input-group-lg">
		   <span class="input-group-addon">Name: </span>
		   <input required="required" id="procate_nam" autofocus="autofocus" type="text" name="categoryName" class="form-control" placeholder="Category Name">
		   </div>
       </div>
       <div class="col-md-6">
		   <div class="seperat1"></div>
			<div class="radio">
				  <label>
					<input id="resour_category_id" type="checkbox" name="resource_category">
					Resource Category
				  </label>
			</div>
			<div class="seperat10"></div>
       </div>
       
       </div>
       <div class="seperat15"></div>
       <div class="row">
       
       <div class="col-md-6">
       <div class="input-group input-group-lg">
       <span class="input-group-addon">Font Color: </span>
		<input class="form-control"  type="color" name="font_color" value="66ff00"/>
       </div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-lg">
       <span class="input-group-addon">Back Color: </span>
       <input type="color" name="back_color" class="form-control" value="66ff00"/>
       </div>

       </div>
       
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-2">
       <div class="seperat5"></div>
       Discription:
       </div>
       <div class="col-md-10">
       <textarea class="form-control tex_areasige" name="catDescription" ></textarea>
       </div>
       </div>

       
       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_category_type"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_catgoBox" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>