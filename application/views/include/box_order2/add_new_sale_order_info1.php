      <div class="container-fluid internal_title"><strong>New Sale Info</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="new_order_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/order_save">
	   <div class="col-md-6">
       <div class="seperat5"></div>
	   	   
	   <div class="row">
       <div class="col-md-12">
		  <h4>Order Type: </h4>
<!--
		  <div id="ordertypeid" style="width: 200px;margin-left: 20px;">
			  <span class="radio"><input type="radio" name="order_type" value="0" checked="checked">Normal</span>
			  <span class="radio"><input type="radio" name="order_type" value="1">Complimentary</span>
			  <span class="radio"><input type="radio" name="order_type" value="2">Entertainment</span>
		  </div>
-->
          
          
         <div class="btn-group" data-toggle="buttons" id="ordertypeid" >
          <label class="btn btn-danger active">
            <input type="radio" name="order_type" value="0" checked=""/> Normal
          </label>
          <label class="btn btn-danger">
            <input type="radio" name="order_type" value="1"/> Complimentary
          </label>
          <label class="btn btn-danger">
            <input type="radio" name="order_type" value="2"/> Entertainment
          </label>
		  <label class="btn btn-danger">
            <input type="radio" name="order_type" value="3"/> Stuff
          </label>
        </div>
		  <!--
		  <select name="order_type" id="ordertypeid" class="form-control">
			<option value="0">Normal</option>
			<option value="1">Complimentary</option>
			<option value="2">Entertainment</option>
		  </select> -->
       </div>
	   </div>
	   	   
	   <div class="row">
       <div class="col-md-12">
		  <h4>Order Place: </h4>
          
        <div class="btn-group" data-toggle="buttons" id="orderplaceid" >
          <label class="btn btn-warning active">
            <input type="radio" name="order_place" value="0" checked=""/>Table
          </label>
          <label class="btn btn-warning">
            <input type="radio" name="order_place" value="1"/>Bar
          </label>
          <label class="btn btn-warning">
            <input type="radio" name="order_place" value="2"/>Room
          </label>
		  <label class="btn btn-warning">
            <input type="radio" name="order_place" value="4"/>Reception
          </label>
          <label class="btn btn-warning">
            <input type="radio" name="order_place" value="3"/>Take Away
          </label>
        </div>
          
<!--
		  <div id="orderplaceid" style="width: 200px;margin-left: 20px;">
			  <span class="radio"><input type="radio" name="order_place" value="0" checked="checked">Restaurant</span>
			  <span class="radio"><input type="radio" name="order_place" value="1">Bar</span>
			  <span class="radio"><input type="radio" name="order_place" value="2">Room</span>
			  <span class="radio"><input type="radio" name="order_place" value="3">Take Away</span>
		  </div>
-->
       </div>
	   </div>
	   <div id="tavlee_idorder">
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       <input type="hidden" id="staylist_selects" value="<?php echo base_url();?>index.php/site_controller/showStayList">
	   <input type="hidden" id="customer_details_show_link" value="<?php echo base_url();?>index.php/site_controller/CheckinCustomerDetails">
       <div class="input-group input-group-lg">
       
         <span class="input-group-addon">Table: </span>
          <select class="form-control" name="table_id" id="selectTavle">
          </select>
       </div>
       
       </div>
       </div>
	   </div>
	   <div class="seperat5"></div>
	   <div id="clientid_numorder">
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-lg bs-docs-example">
       
         <span class="input-group-addon">Client Id: </span>
          <select class="form-control tests1" name="servie_token" id="clientsid_token" onchange="change_client_name_value()">
          </select>


          <span class="input-group-btn">
          </span>
       </div>
       
       </div>
       </div>
	   </div>
	   	<div id="entetainment_numorder">
		   <div class="seperat15"></div>
		   <div class="row">
		   <div class="col-md-12">
			<div class="input-group input-group-lg">
			  <span class="input-group-addon">Entertainment Honor: </span>
			  <select id="entertai_honor" name="enter_honor" class="form-control" onchange="change_enterrtain_name_value()">
			  </select>
			  	   <input type="hidden" id="specificc_users_details_show_link" value="<?php echo base_url();?>index.php/site_controller/specific_users_details">
			</div>
		   </div>
		   </div>
	    </div>
		<div id="stuff_numorder">
		   <div class="seperat15"></div>
		   <div class="row">
		   <div class="col-md-12">
			<div class="input-group input-group-lg">
			  <span class="input-group-addon">Select Stuff: </span>
			  <select id="stuffse_honor" name="stuff_honor" class="form-control" onchange="change_stuff_name_value()">
			  </select>
			</div>
		   </div>
		   </div>
	    </div>
		
       
	   <div class="seperat15"></div>
	   <div class="row">
       <div class="col-md-12">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Waiter: </span>
		  <select name="waiter" id="waiterlistid" class="form-control">
		  </select>
		</div>
       </div>
	   </div>

	   </div>
	   
	   
	   
	   <div class="col-md-6">
	   			<div class="seperat15"></div>
	            <div class="row">
				   <div class="col-md-12">
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">Name: </span>
					  <input type="text" id="clientNxcvame_ord" name="clisdfentName" class="form-control" placeholder="Client Name">
					</div>
				   </div>
			    </div>
				<div class="seperat15"></div>

				<div id="contct_numorder">
				   <div class="row">
				   <div class="col-md-12">
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">Contact Number: </span>
					  <input type="text" id="clientcontac_num_ord" name="contact_number" class="form-control" placeholder="Client Contact Number">
					</div>
				   </div>
				   </div>
				</div>
				<div id="room_numorder">
				   <div class="seperat15"></div>
				   <div class="row">
				   <div class="col-md-12">
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">Room Number: </span>
					  <input type="text" id="inputroom_num_ord" name="room_number" class="form-control" placeholder="Room Number">
					</div>
				   </div>
				   </div>
				</div>

			    <div class="seperat15"></div>
			    <div class="row">
				   <div class="col-md-12">
				   <div class="input-group input-group-lg">
					  <span class="input-group-addon">Guest Quantity: </span>
					  <input type="number" name="guest_quantity" min="0" required="required" id="gusdfestorder" class="form-control" placeholder="Guest Quantity">
					</div>
				   </div>
			    </div>
				<div class="seperat15"></div>
				<div class="row">
				   <div class="col-md-12">
				   <div class="input-group input-group-lg">
					  <span class="input-group-addon">Comments: </span>
					  <input type="text" name="comments" id="commentsorder" class="form-control" placeholder="Comments" />
					</div>
				   </div>
				</div>
	   </div>

	   
	   

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="order_entry_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" id="after_order_save" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="cencel_ordersaleBox"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </form>
       </div>