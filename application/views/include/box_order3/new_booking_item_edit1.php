      <div class="container-fluid internal_title"><strong>New Booking Item Edit</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="bookin_item_enntr_froms3" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/booking_item_menu_save">
		<input type="hidden" id="show_booking_item_menu_links" value="<?php echo base_url();?>index.php/site_controller/show_booking_item_menu_link">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 1:</span>
          <input type="text" name="item1" id="iitemss1" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 2:</span>
          <input type="text" name="item2" id="iitemss2"  class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 3:</span>
          <input type="text" name="item3"  id="iitemss3" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 4:</span>
          <input type="text" name="item4" id="iitemss4"  class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 5:</span>
          <input type="text" name="item5"  id="iitemss5" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 6:</span>
          <input type="text" name="item6" id="iitemss6"  class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 7:</span>
          <input type="text" name="item7" id="iitemss7"  class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 8:</span>
          <input type="text" name="item8" id="iitemss8"  class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 9:</span>
          <input type="text" name="item9"  id="iitemss9" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 10:</span>
          <input type="text" name="item10" id="iitemss10"  class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 11:</span>
          <input type="text" name="item11"  id="iitemss11" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 12:</span>
          <input type="text" name="item12" id="iitemss12"  class="form-control"/>
        </div>
       </div>
       </div>
	   <input type="hidden" name="booking_id" id="menu_iitemss_id"/>
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
		<span class="item_log_entr_msg"></span>
		<a href="#" class="btn btn-primary btn-lg" id="show_other_menu"><i class="fa fa-plus-square"></i> Show Other Menu</a>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="booking_item_menu_edit_close2" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>