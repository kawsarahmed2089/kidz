
<div class="container-fluid internal_title"><strong>Hotel Information</strong></div>      
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
									  <th data-sort="string">Hotel Name</th>
									  <th data-sort="string">Hotel Contact Address</th>
									  <th data-sort="int">Hotel Contact No</th>
									  <th data-sort="string">Hotel Grade</th>
								</tr>
							</thead>
							<input type="hidden" id="htl_sv_link" value="<?php echo base_url();?>index.php/site_controller/hotel_save_show" />
							<tbody id="htl_dis">
							<!-- Hotel Discription Table -->
							</tbody>

					   </table>
				  </div>
			  </div>
			  <div class="seperat3"></div>
				 <div class="row border_top">
					 <div class="col-md-6">Total: <span class="totla_htl" style="color: #004040;" ></span> </div>
					 <div class="col-md-6">|</div>
				 </div>
			  <div class="seperat3"></div>
				<div class="row border_top">
						<div class="seperat3"></div>
						 <div class="col-md-12">
						 <div class="btn-group btn-group-sm">
						 <input type="hidden" id="htl_del_link" value="<?php echo base_url();?>index.php/site_controller/hotel_delete" />
						 <input type="hidden" id="hotel_edi_link" value="<?php echo base_url();?>index.php/site_controller/hotel_edit_show" />
							  <button class="btn btn-default" id="new_hotel_setup" type="button" title="Add New Hotel" ><i class="fa fa-plus"></i></button>
							  <button class="btn btn-default" id="hotel_del" type="button" title="Delete Hotel Setup List" ><i class="fa fa-times"></i></button>
							  <button class="btn btn-default" id="htl_edi" type="button" title="Edite Hotel" ><i class="fa fa-pencil-square"></i></button>
						</div>
					  </div>
				 </div>
				 <div class="seperat3"></div>
				 <div class="row border_bottom border_top">
					 <div class="seperat3"></div>
					 <div class="col-md-9" id="msage_htl" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
					 <div class="col-md-3 text-right">
						 <div class="btn-group">
							<button type="reset" id="htl_show_close" class="btn btn-default" ><i class="fa fa-times"></i> Close</button>
						 </div>
						  <div class="seperat3"></div>
					 </div>
				 </div>
				 
       </div>