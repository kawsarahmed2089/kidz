	  <div class="container-fluid internal_title"><strong>New Booking Item Entry</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="bookin_other_enntr_from2" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/booking_other_menu_save">
		<input type="hidden" id="show_booking_item_menu_link" value="<?php echo base_url();?>index.php/site_controller/show_booking_item_menu_link">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 1:</span>
			<input type="text" name="item1" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 2:</span>
			<input type="text" name="item2" class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 3:</span>
          <input type="text" name="item3" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 4:</span>
          <input type="text" name="item4" class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 5:</span>
          <input type="text" name="item5" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Other 6:</span>
          <input type="text" name="item6" class="form-control"/>
        </div>
       </div>
	   <!-- <a href="#" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i></a> -->
       </div>
	   
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="item_log_entr_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="booking_item_other_entr_close2" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>