      <div class="container-fluid internal_title"><strong>New Table Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="room_table_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/table_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Table Name: </span>
          <input type="text" id="tavle_nam" name="tavleName" class="form-control" placeholder="Table Name">
         
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Table Number: </span>
		  <input type="number" id="tavle_number" name="tavlenumber" class="form-control" placeholder="Table Number">
		</div>
       </div>
	   	<div class="col-md-6">
			<div class="seperat1"></div>
			<div class="radio">
				  <label>
					<input type="checkbox" name="checkKitchen" value="TRUE" checked>
					Active
				  </label>
			</div>
			<div class="seperat10"></div>
		</div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Capacity: </span>
		  <input type="number" id="tavle_capacity" name="capacity" class="form-control" placeholder="Table Capacity">

		</div>
       </div>
	   <div class="col-md-6">
			<div class="input-group input-group-lg">
			  <span class="input-group-addon">Border Radius: </span>
			  <input type="number" name="border_radius" class="form-control" placeholder="Border Radius">
			</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Font Color: </span>
		  <input type="color" name="font_color" class="form-control">

		</div>
       </div>
	   <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Background Color: </span>
		  <input type="color" name="back_color" class="form-control">

		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">

		  <span class="input-group-addon">Border Width: </span>
		  <input type="number" name="border_width" class="form-control">

		</div>
       </div>
	   <div class="col-md-6">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Border Color: </span>
		  <input type="color" name="border_color" class="form-control">

		</div>
       </div>
       </div>
       <div class="seperat15"></div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="tavle_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="tavle_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>