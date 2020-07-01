      <div class="container-fluid internal_title"><strong>New Item Log Entry</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="item_log_from2" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/item_log_save">

       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Purpose Name:</span>
          <select name="purposess" id="purposs_ids" class="form-control" required="required">
				<option value="">Select Purpose</option>
				<option value=1>Purchase</option>
				<option value=4>Add To Use</option>
				<option value=2>Damage</option>
				<option value=3>Lost</option>
		  </select>
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Quantity:</span>
          <input type="number" name="quantytys" class="form-control" placeholder="Quantity" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Responsible Person Name:</span>
          <input type="text" name="personss_name" class="form-control" placeholder="Person Name">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Description:</span>
          <textarea type="text" name="descriptons" class="form-control" placeholder="Description">
		  </textarea>
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
		<input type="hidden" name="item_key" id="log_item_id_ent">
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="item_log_entr_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="item_log_entr_close2" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>