
 <div class="container-fluid internal_title"><strong>Stay List Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
			  
			  <div class="row myfilter_box1">
				  <div class="col-md-12 for_room_table" style="height: 412px; overflow-y: auto; overflow-x: hidden;">
					   <table id="stay_tables" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<thead style="cursor: default;">
								<tr>
						           <th data-sort="int">Invoice No</th>
						           <th data-sort="string">Client Name</th>
						           <th data-sort="int">Contact No</th>
                                   <th data-sort="int">CheckIn Date</th>
                                   <th data-sort="int">CheckIn Time</th>
								   <th data-sort="int">Rooms</th>
                                   <th data-sort="int">Balance</th>
                                   <th data-sort="string">Status</th>
								</tr>
							</thead>
       <input type="hidden" class="roomStayListLink" value="<?php echo base_url();?>index.php/site_controller/showStayList" />
							<tbody id="stayListDis">
							<!-- Room Discription Table -->
							</tbody>

					   </table>
				  </div>
			  </div>
			  <div class="seperat3"></div>
				 <div class="row border_top">
					 <div class="col-md-6">Total: <span style="color: #004040;" class="totalStay"></span> </div>
					 <div class="col-md-6">|</div>
				 </div>

				 <div class="seperat3"></div>
				 <div class="row border_bottom border_top">
					 <div class="seperat3"></div>
					 <div class="col-md-9" style="overflow:hidden;font-size:13px; line-height:30px;">
                     <!--<button id="check_out_box" type="button" class="btn btn-warning btn-sm"><i class="fa fa-check-square"></i> Check Out</button>-->
                     </div>
					 <div class="col-md-3 text-right">
						 <div class="btn-group">
							<button id="stayInfo_close" type="button" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
						 </div>
						  <div class="seperat3"></div>
					 </div>
				 </div>
				 
       </div>