      <div class="container-fluid internal_title"><strong>New Room</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
         <input type="hidden" id="select_link1" value="<?php echo base_url();?>index.php/site_controller/room_type_show" />
       <form role="form" id="room_entry_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/room_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-sm">
       
         <span class="input-group-addon">Type: </span>
          <select class="form-control" name="roomType" id="select_room_type">
          </select>
          <span class="input-group-btn">
          <button class="btn btn-default" title="Room Type Entry" type="button" id="room_type_new"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-sm">
		  <span class="input-group-addon">Name: </span>
		  <input type="text" id="room_nam" name="roomName" class="form-control" placeholder="Room Name">
		</div>
       </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-sm">
		  <span class="input-group-addon">Number: </span>
		  <input type="number" name="roomCode" min="0" required="required" id="room_number" class="form-control" placeholder="Room Number">
		</div>
		<div class="seperat15"></div>
		<div><span><strong>Status: </strong>Available</span></div>
		<div class="seperat15"></div>
       </div>
       
       <div class="col-md-6">
       <div class="seperat1"></div>
       <div class="row">
       <div class="col-md-12">
		 <div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
			    Clean
			  </label>
			</div>
			<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			    Dirty
			  </label>
			</div>
       </div>
       </div>
       <div class="seperat10"></div>
       </div>
       
       </div>
       
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="room_entry_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-default btn-sm" id="room_entry_cencel"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>