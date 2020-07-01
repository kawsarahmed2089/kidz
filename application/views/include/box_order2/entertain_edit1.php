      <div class="container-fluid internal_title"><strong>New Entertainment Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="entertain_honor_edit_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/entertainment_edit">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Name: </span>
		  <input type="text" id="entertain_nam_edi" name="entertainName" class="form-control" placeholder="Entertainment Honor Name" required="required">
		  
		  <input type="hidden" name="edi_key" id="entertain_id_edi_key">
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Contact No.: </span>
		  <input type="text" id="entertain_contact_edi" name="contact" class="form-control" placeholder="Contact No">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Resignation: </span>
		  <input type="text" id="entertain_resignation_edi" name="resignation" class="form-control" placeholder="Resignation">
		</div>
       </div>
       
       <div class="col-md-6">
       </div>
       
       </div>
	   <div class="seperat15"></div>
		<div class="row">
				<div class="col-md-12">
				   <div class="input-group input-group-lg">
				   <span class="input-group-addon">Address: </span>
				   <textarea id="entertain_address_edi" name="address" class="form-control tex_areasige"></textarea>
				   </div>
				</div>
       </div>
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="entertain_edit_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="entertain_edit_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>