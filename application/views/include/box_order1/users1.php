<div class="container-fluid internal_title"><strong>Users Information</strong></div>      
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
									  <th data-sort="string">Name</th>
									  <th data-sort="int">User Type</th>
									  <th data-sort="string">Address</th>
									  <th data-sort="string">Contact</th>
								</tr>
							</thead>
							<input type="hidden" value="<?php //echo base_url();?>index.php/site_controller/user_show" />
							<tbody >
							<!-- Room Discription Table -->
							</tbody>

					   </table>
				  </div>
			  </div>
			  <div class="seperat3"></div>
				 <div class="row border_top">
					 <div class="col-md-6">Total: <span style="color: #004040;" ></span> </div>
					 <div class="col-md-6">|</div>
				 </div>
			  <div class="seperat3"></div>
				<div class="row border_top">
						<div class="seperat3"></div>
						 <div class="col-md-12">
						 <div class="btn-group btn-group-sm">
						 <input type="hidden" value="<?php //echo base_url();?>index.php/site_controller/user_delete" />
						 <input type="hidden" value="<?php //echo base_url();?>index.php/site_controller/user_edit_show" />
							  <button class="btn btn-default btn_first" type="button" title="Add New User" ><i class="fa fa-plus"></i></button>
							  <button class="btn btn-default" type="button" title="Delete User List" ><i class="fa fa-times"></i></button>
							  <button class="btn btn-default" type="button" title="Edite User" ><i class="fa fa-pencil-square"></i></button>
						</div>
						 </div>
				 </div>
				 <div class="seperat3"></div>
				 <div class="row border_bottom border_top">
					 <div class="seperat3"></div>
					 <div class="col-md-9" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
					 <div class="col-md-3 text-right">
						 <div class="btn-group">
							<button type="button" class="btn btn-default" ><i class="fa fa-times"></i> Close</button>
						 </div>
						  <div class="seperat3"></div>
					 </div>
				 </div>
				 
       </div>