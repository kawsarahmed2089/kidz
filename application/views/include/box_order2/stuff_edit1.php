      <div class="container-fluid internal_title"><strong>New Stuff Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="stuff_edit_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/stuff_edit">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Name: </span>
		  <input type="text" id="stuff_nam_edi" name="stuffName" class="form-control" placeholder="Stuff Name" required="required">
		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Contact No.: </span>
		  <input type="text" name="contact" id="stuff_contact_edi" class="form-control" placeholder="Contact No">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Designation: </span>
		  <!-- <input type="text" name="resignation" id="stuff_resignation_edi" class="form-control" placeholder="Designation"> -->
		  	<select name="resignation" class="form-control" id="stuff_resignation_edi">
				<option value="Waiter">Waiter</option>
				<option value="Restaurant Manager">Restaurant Manager</option>
				<option value="IT Manager">IT Manager</option>
				<option value="Front Desk Manager">Front Desk Manager</option>
				<option value="RCO">RCO</option>
				<option value="Accountant">Accountant</option>
				<option value="Marketting Manager">Marketting Manager</option>
				<option value="Laptop Shop">Laptop Shop</option>
				<option value="Asst. Chef">Asst. Chef</option>
				<option value="Electritian">Electritian</option>
				<option value="R/S">R/S</option>
				<option value="Supervisor">Supervisor</option>
				<option value="Maintenance">Maintenance</option>
				<option value="Receptionist">Receptionist</option>
				<option value="Security Gaurd">Security Gaurd</option>
				<option value="Painty Boy">Painty Boy</option>
				<option value="Bell Boy">Bell Boy</option>
				<option value="Dish Wash">Dish Wash</option>
				<option value="Cleaner">Cleaner</option>
			</select>
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
				   <textarea name="address" id="stuff_address_edi" class="form-control tex_areasige"></textarea>
				   </div>
				</div>
       </div>
	   <input type="hidden" id="stuff_id_edi_key" name="edi_key"/>
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="stuffs_edite_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="stuffs_edit_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>