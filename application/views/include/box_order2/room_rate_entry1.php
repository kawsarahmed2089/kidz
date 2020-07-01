
      <div class="container-fluid internal_title"><strong>New Room Rate Setup</strong></div>
      <input type="hidden" id="select_link1_for_room_type" value="<?php echo base_url();?>index.php/site_controller/room_type_show" />
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="room_rate_setup_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/room_rate_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-sm">
       
         <span class="input-group-addon">Type: </span>
          <select class="form-control" name="roomTypeID" id="select_room_type">
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" title="Room Type Entry" type="button" id="room_type_new"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Room Rate:</span>
          <input type="text" name="roomRate" id="roomRate_ent" class="form-control" placeholder="Room Rate" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Room Rate Status:</span>
          <input type="text" name="roomRateStatus" class="form-control" placeholder="Room Rate Status" required="required">
        </div>
       </div>
       </div>

        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="sve_floor_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="roomrate_setup_close" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>