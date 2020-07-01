      <div class="container-fluid internal_title"><strong>New Booking Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb" style="overflow: scroll;">
       <form role="form" id="booking_entry_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/booking_save">
       <div class="seperat10"></div>
       <div class="row">
       <div class="col-md-4">
		<div class="input-group input-group-md">
		  <span class="input-group-addon">Person Name: </span>
		  <input type="text" id="person_bok_nam" name="personName"  required="required" class="form-control" placeholder="Person Name">
		</div>
       </div>
	   <div class="col-md-4">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Total Amount: </span>
			  <input type="number" name="total_amount_main" min="0" required="required" id="" class="form-control" placeholder="Total Amount">
			</div>
	   </div>
	   <div class="col-md-4">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Grand Total: </span>
			  <input type="number" name="total_amount" min="0" required="required" id="" class="form-control" placeholder="Grand Amount">
			</div>
	   </div>
       </div>
	   <div class="seperat10"></div>
       <div class="row">
		   <div class="col-md-4">
		   <div class="input-group input-group-md">

			  <span class="input-group-addon">Contact Number: </span>
			  <input type="text" name="contact_number" class="form-control" placeholder="Contact Number">

			</div>
		   </div>
		   <div class="col-md-4">
				<div class="input-group input-group-md">
				  <span class="input-group-addon">Discount: </span>
				  <input type="number" name="discount_amount" min="0" id="" class="form-control" placeholder="Discount">
				</div>
		   </div>
		   <div class="col-md-4">
				<div class="input-group input-group-md">
				  <span class="input-group-addon">Advance Payment: </span>
				  <input type="number" name="advance_amount" min="0" id="" class="form-control" placeholder="Advance Payment">
				</div>
		   </div>
	   </div>
	   <div class="seperat10"></div>
		<div class="row">
			<div class="col-md-4">

			  <div class="input-group input-group-md">
			  <span class="input-group-addon">Booking Place: </span>
			  <select name="booking_place" class="form-control"  required="required" > 
					<option value="">Select Booking Place</option>
					<option value="1">Blue Diamond Hall</option>
					<option value="2">Sapphire Conference Hall</option>
					<option value="3">Restaurant</option>
					<option value="4">Sky View Hall</option>
			  </select>
			</div>
			</div>
			<div class="col-md-4">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Hall Rent: </span>
			  <input type="number" name="hall_rent" min="0" required="required" id="" class="form-control" placeholder="Hall Rent">
			</div>
			</div>
			<div class="col-md-4">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Due Amount: </span>
			  <input type="number" name="due_amount" min="0" required="required" id="" class="form-control" placeholder="Due Amount">
			</div>
			</div>
       </div>
	   
       <div class="seperat10"></div>
       <div class="row">
		   <div class="col-md-6">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Total Person: </span>
			  <input type="number" name="total_person" min="0" required="required" id="" class="form-control" placeholder="Total Person">
			</div>
		   </div>
		   <div class="col-md-6">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Plate Per Person: </span>
			  <input type="number" name="plate_per_person" min="0" required="required" id="" class="form-control" placeholder="Plate Per Person">
			</div>
		   </div>
       </div>
       <div class="seperat10"></div>
       <div class="row">
		   <div class="col-md-6">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Booking Date: </span>
			  <input type="date" name="booking_date" id="" class="form-control">
			</div>		   
		   </div>
		   <div class="col-md-6">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Booking Time: </span>
			  <select name="booking_time" class="form-control">
				<option value="">Select Booking Time</option>
				<option value="Breakfast">Breakfast</option>
				<option value="Lunch">Lunch</option>
				<option value="Dinner">Dinner</option>
				<option value="Full Day">Full Day</option>
			  </select>
			</div>
		   </div>
       </div>
	   <div class="seperat10"></div>
	   <div class="row">
		   <div class="col-md-6">
			<div class="input-group input-group-md">
			  <span class="input-group-addon">Programme Name: </span>
			  <input type="text" name="programme_name" id="" class="form-control">
			</div>		   
		   </div>
		   <div class="col-md-6">
				<div class="input-group input-group-md">
				  <span class="input-group-addon">Service Charge: </span>
				  <input type="number" name="service_charge" id="" class="form-control">
				</div>
		   </div>
       </div>
       <div class="seperat10"></div>
       <div class="row">
		   <div class="col-md-6">
				<div class="input-group input-group-md">
			   <span class="input-group-addon">Address:</span>
			   
			   <textarea name="address" class="form-control" style="height: 60px;"></textarea>
			   </div>
		   </div>
		   <div class="col-md-3">
				<input type="button" id="add_booking_itemm_mmenu" class="btn btn-info btn-lg" value="Add Item Menu">
		   </div>
			<div class="col-md-3">
				<input type="button" id="add_booking_other_mmenu" class="btn btn-primary btn-lg" value="Add Others">
			</div>
       </div>
	   <div class="seperat10"></div>
		<div class="row">
			   <div class="col-md-8">
			   <div class="input-group input-group-md">
			   <span class="input-group-addon">Comment:</span>
			   <textarea name="comment" class="form-control" style="height: 60px;"></textarea>
			   </div>
			   </div>
			   <div class="col-md-4">
			   </div>
       </div>
	   <div class="seperat10"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="bokin_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="booking_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>