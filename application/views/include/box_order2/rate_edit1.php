
      <div class="container-fluid internal_title"><strong>Rate Type Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="rate_edite_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/rate_edite">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-sm">
       
         <span class="input-group-addon">Type: </span>
          <select class="form-control" name="roomType" id="select_ediroom_type">
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" title="Room Type Entry" type="button" id="room_type_new_edi"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       <input type="hidden" id="rate_ediKey" name="rate_ediKey"  />
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Room Rate: </span>
          <input type="text" id="room_rate_edi" class="form-control" name="roomRate" placeholder="Room Rate" required="required">
        </div>
       
       </div>
       </div>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Rate Status: </span>
          <input type="text" id="rate_status_edi" class="form-control" name="roomRateStatus" placeholder="Rate Status" required="required">
        </div>
       
       </div>
       </div>

        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="edi_floor_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="rate_edite_close" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>