      <div class="container-fluid internal_title"><strong>Quantity Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="quantity_prepara_editt_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/quantity_prepara_update_save">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">

		  <span class="input-group-addon">Quantity: </span>
		  <input type="number" id="quantity_editt_prep_qua" name="quantity" class="form-control" placeholder="Quantity" min="0" required="required">
		  <!--<input type="hidden" name="order_selected" id="order_selected_value"/>
		  <input type="hidden" name="product_selected" id="product_selected_value"/> 
		  <input type="hidden" id="dele_temp_option_details" value="<?php echo base_url();?>index.php/site_controller/dele_temp_option_details"/>-->
		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
		<input type="hidden" name="edi_key" id="order_details_id_edi_key">
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Preparation Options: </span>
          <select class="form-control" name="option_id" id="select_prepar_opton_editt">
          </select>
		  <input type="hidden" id="temp_prep_option_save_onedit_link" value="<?php echo base_url();?>index.php/site_controller/temp_prep_option_save_onedit" />
		 <!-- 
		  <input type="hidden" id="temp_prep_option_show_link" value="<?php echo base_url();?>index.php/site_controller/temp_prepar_option_show" /> -->
          <span class="input-group-btn">
          <button class="btn btn-default btn-lg" title="Options Type Entry" type="button" id="prep_option_enty_onedit"><i class="fa fa-plus"></i></button>
          </span>
       </div>
       
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">

		  <span class="input-group-addon">Guest Number: </span>
		  <select name="guesttt_number" class="form-control" id="select_guest_numbe_editt">
		  </select>
		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-6">
		<div class="input-group input-group-lg">

		  <span class="input-group-addon">Comment: </span>
		  <input type="text" name="prep_comment" id="quan_prep_commnt_editt" class="form-control" placeholder="Comment">
		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_temp_optio_editt"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="quan_prepa_editt_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
		
       </div>

       </div>
	   <div class="row">
	   <h4>Preparation Options: </h4>
	   <div id="temp_prepar_optio_disc_editt">
		</div>
		<button type="button" id="temp_prep_option_remov_id_onedit" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-remove"></i></button>
		</div>
	   </form>

       </div>