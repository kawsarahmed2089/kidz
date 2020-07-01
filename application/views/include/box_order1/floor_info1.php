
 <div class="container-fluid internal_title"><strong>Floor Information</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
			  <div class="row">
				  <div class="col-md-12">
					  <div class="seperat10"></div>
						<div class="input-group input-group-sm max_width550">
							<input type="search" class="form-control" >
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
						           <th data-sort="string">Floor Name</th>
						           <th data-sort="int">Floor Code</th>
								</tr>
							</thead>
                            <input type="hidden" id="floor_shoing" value="<?php echo base_url();?>index.php/site_controller/floor_show" />
                            <input type="hidden" id="floor_del_link" value="<?php echo base_url();?>index.php/site_controller/floor_del" />
                            <input type="hidden" id="floor_edi_link" value="<?php echo base_url();?>index.php/site_controller/floor_edite_show" />
							<tbody id="floor_dis">
							<!-- Room Discription Table -->
							</tbody>

					   </table>
				  </div>
			  </div>
			  <div class="seperat3"></div>
				 <div class="row border_top">
					 <div class="col-md-6">Total: <span id="total_floor" style="color: #004040;"></span> </div>
					 <div class="col-md-6">|</div>
				 </div>
			  <div class="seperat3"></div>
				<div class="row border_top">
						<div class="seperat3"></div>
						 <div class="col-md-12">
						 <div class="btn-group btn-group-sm">
							  <button class="btn btn-default" id="floor_setup" type="button" title="Add New Floor" ><i class="fa fa-plus"></i></button>
							  <button class="btn btn-default" id="floor_del" type="button" title="Delete Floor List" ><i class="fa fa-times"></i></button>
							  <button class="btn btn-default" id="floor_edit" type="button" title="Edite Floor" ><i class="fa fa-pencil-square"></i></button>
						</div>
						 </div>
				 </div>
				 <div class="seperat3"></div>
				 <div class="row border_bottom border_top">
					 <div class="seperat3"></div>
					 <div class="col-md-9" id="floor_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
					 <div class="col-md-3 text-right">
						 <div class="btn-group">
							<button id="floor_info_close" type="button" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
						 </div>
						  <div class="seperat3"></div>
					 </div>
				 </div>
				 
       </div>