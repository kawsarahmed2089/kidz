
      <div class="container-fluid internal_title"><strong>New Room History </strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="sv_corp_room_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/sv_corp_room_rate">
		<table>
		<tr><th>#</th><th>Room Type</th><th>Room Number</th></tr>
		<div id="his_disrip">
		</div>
		</table>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-sm">
      
         <span class="input-group-addon">Room 1: </span>
          <select id="show_corp_select" class="form-control" name="corpID">
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" id="corporateEntry" title="Corporate Entry" type="button"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
	   <script type='text/javascript'> } </script>
       <div class="seperat15"></div>

       <div class="row">
       <div class="col-md-10">
       
       <div class="input-group input-group-sm">
       
         <span class="input-group-addon">Room Type: </span>
          <select class="form-control" name="roomTypeID" id="select_room_type_cor">
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" title="Room Type Entry" type="button" id="room_type_new_cor"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       
       <div class="col-md-2">
       
       <div class="input-group input-group-sm">
       <div class="seperat2"></div>
       <label title="Select For All Room Types">
        <input name="all_type" value="-5" type="checkbox"> All
       </label>

       </div>
       
       </div>
       
       
       </div>
       
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Corporate Room Rate: </span>
          <input type="number" id="rate_rooms" min="0" class="form-control" name="roomRate" placeholder="Corporate Room Rate" required="required">
          <span class="input-group-addon">
         <select>
	      <option value="persent">%</option>
	      <!--<option value="money">$</option>-->
          </select>
          </span>
        </div>
       
       </div>
       </div>
       
       <div class="seperat10"></div>
       <div class="row">
       <div class="col-md-12">
       
       <strong>Status:</strong> <span>Active</span>
       
       </div>
       </div>
       

        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="msg_corp_room"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="rom_his_cencel" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       
       

       </form>
       </div>