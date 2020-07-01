
<div class="container-fluid internal_title"><strong>Rate Type Information</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
		  <div class="row">
			  <div class="col-md-12">
				  <div class="seperat10"></div>
					<div class="input-group input-group-sm max_width550">
						<input type="search" class="form-control">
					   <span class="input-group-btn">
							<button title="Clear" class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
							<button class="btn btn-default" type="button"><i class="fa fa-search"></i> Find</button>
					   </span>
					</div>
					<div class="seperat10"></div>
			  </div>
		  </div>

		  <div class="row">
			  <div class="col-md-12 for_room_table">
				   <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
						<thead style="cursor: default;">
							<tr>
							  <th data-sort="int">#</th>
							  <th data-sort="string">Room Type</th>
							  <th data-sort="int">Room Rate</th>
							  <th data-sort="string">Room Rate Status</th>
							  <th data-sort="string">Creator</th>
							</tr>
						</thead>
					<input type="hidden" id="rate_shoing" value="<?php echo base_url();?>index.php/site_controller/room_rate_show" />
					<tbody id="rates_dis">
					<!-- Room Discription Table -->
					</tbody>

				   </table>
			  </div>
		  </div>
		  <div class="seperat3"></div>
			 <div class="row border_top">
				 <div class="col-md-6">Total: <span style="color: #004040;" id="total_rate" ></span> </div>
				 <div class="col-md-6">|</div>
			 </div>
		  <div class="seperat3"></div>
			<div class="row border_top">
				<div class="seperat3"></div>
				 <div class="col-md-12">
					 <div class="btn-group btn-group-sm">
					 <input type="hidden" id="rate1_del_link" value="<?php echo base_url();?>index.php/site_controller/room_rate_delete" />
					 <input type="hidden" id="rate1_edi_link" value="<?php echo base_url();?>index.php/site_controller/room_rate_edit_show" />
						  <button class="btn btn-default" id="room_rate_entry" type="button" title="Add New Room Rate" ><i class="fa fa-plus"></i></button>
						  <button class="btn btn-default" id="rate_dele"  type="button" title="Delete Room Rate List" ><i class="fa fa-times"></i></button>
						  <button class="btn btn-default" id="rate_edite" type="button" title="Edite Room Rate" ><i class="fa fa-pencil-square"></i></button>
					</div>
				 </div>
			 </div>
			 <div class="seperat3"></div>
			 <div class="row border_bottom border_top">
				 <div class="seperat3"></div>
				 <div class="col-md-9" id="msage_rate1" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
				 <div class="col-md-3 text-right">
					 <div class="btn-group">
						<button type="button" id="rate_type_close" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
					 </div>
					  <div class="seperat3"></div>
				 </div>
			 </div>
			 
      </div>