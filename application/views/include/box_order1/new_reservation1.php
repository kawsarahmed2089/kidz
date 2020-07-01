
	  <div class="container-fluid internal_title"><strong>New Reservation</strong></div>
      <form role="form" id="reservation_fromg" enctype="multipart/form-data" method="POST" action="<?php //echo base_url();?>index.php/reservation_controller/reservation_entry">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-sm">
       <span class="input-group-addon"> Client Name: </span>
       <input required="required" id="resClientName" name="resClientName" autofocus="autofocus" type="text" class="form-control" placeholder="Client Name">
       </div>
       </div>
       
       </div>
       <div class="seperat15"></div>
       
       <div class="row">
          <div class="col-md-6">
          
           <div class="input-group input-group-sm">
           <span class="input-group-addon"> Reservation Start: </span>
           <input required="required" id="reserv_from_date" name="startDate" type="text" class="form-control" placeholder="Pick Date">
           </div>
           
          </div>

          
          <div class="col-md-6">
          
           <div class="input-group input-group-sm">
           <span class="input-group-addon"> Reservation End: </span>
           <input required="required" id="reserv_to_date" name="endDate" type="text" class="form-control" placeholder="Pick Date">
           </div>
          
          </div>

       </div>
       
       <div class="row">
       
       <div class="col-md-12"><hr style="margin: 10px auto;" /></div>

       </div>
       <div class="row">
       <div class="col-md-8">       
       <div class="input-group input-group-sm">
       <span class="input-group-addon"> Room Quantity: </span>
	   <input type="hidden" name="quant_rom_link" id="quant_rom_link" value="<?php echo base_url();?>index.php/site_controller/reservation_his_show">
       <input required="required" name="roomResQuantity" id="quant_rom" type="number" min="0" class="form-control" placeholder="Room Quantity">
	 
	   </div>
       </div>
	   </div>
		  <span class="input-group-btn">
			<div class="btn btn-default"  title="Enter Room History" type="button" id="room_reser_ne">enter</div>
          </span>
				

				



       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_session"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_reservation" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>