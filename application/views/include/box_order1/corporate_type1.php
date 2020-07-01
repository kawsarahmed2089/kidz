 <div class="container-fluid internal_title"><strong>Corporate Information</strong></div>      
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
							  <th data-sort="string">Corporate Name</th>
							  <th data-sort="int">Address</th>
							  <th data-sort="string">Contac No</th>
							  <th data-sort="string">Contact Person</th>
							  <th data-sort="int">Email</th>
							  <th data-sort="int">Bank</th>
							  <th data-sort="int">Website</th>
							</tr>
						</thead>
					<input type="hidden" id="corporate_shoing" value="<?php echo base_url();?>index.php/site_controller/corporate_info_show" />
					<tbody id="corp_discc">
					<!-- Room Discription Table -->
					</tbody>

				   </table>
			  </div>
		  </div>
		  <div class="seperat3"></div>
			 <div class="row border_top">
				 <div class="col-md-6">Total: <span style="color: #004040;" id="total_corp"></span> </div>
				 <div class="col-md-6">|</div>
			 </div>
		  <div class="seperat3"></div>
			<div class="row border_top">
				<div class="seperat3"></div>
				 <div class="col-md-12">
					 <div class="btn-group btn-group-sm">
					 <input type="hidden" id="corp_del_link" value="<?php echo base_url();?>index.php/site_controller/corporate_info_delete" />
					 <input type="hidden" id="corp1_edi_link" value="<?php echo base_url();?>index.php/site_controller/corporate_info_edit_show" />
						  <button class="btn btn-default" id="corp_typ_entry" type="button" title="Add New Corporate Info" ><i class="fa fa-plus"></i></button>
						  <button class="btn btn-default" id="corporate_dele" type="button" title="Delete Corporate Info List" ><i class="fa fa-times"></i></button>
						  <button class="btn btn-default" id="corp_edite" type="button" title="Edite Corporate Info" ><i class="fa fa-pencil-square"></i></button>
					</div>
				 </div>
			 </div>
			 <div class="seperat3"></div>
			 <div class="row border_bottom border_top">
				 <div class="seperat3"></div>
				 <div class="col-md-9" id="corp_msage" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
				 <div class="col-md-3 text-right">
					 <div class="btn-group">
						<button type="button" id="corporate_info_close" class="btn btn-default" ><i class="fa fa-times"></i> Close</button>
					 </div>
					  <div class="seperat3"></div>
				 </div>
			 </div>
			 
      </div>