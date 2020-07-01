
 <div class="container-fluid internal_title"><strong>Table Design Setup</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
			   <input type="hidden" id="tableDesignSaveLink" value="<?php echo base_url();?>index.php/site_controller/table_design_save" />
			  <div class="row myfilter_box1">
				  <div class="col-md-12 for_room_table" style="height: 412px; overflow-y: auto; overflow-x: hidden;">
					   <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<!--
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
							-->
							
<!--<h1>Draggabilly - containment with vanilla JS</h1>
<div class="container">
  <div class="draggable"></div>
  <div class="draggable"></div>
  <div class="draggable"></div>
</div>

-->


							<div id="graphical_view" >
								<!-- Room Discription Table -->
								
								
							</div>

					   </table>
				  </div>
			  </div>
			  <div class="seperat3"></div>
				 <div class="row border_top">
					 <div class="col-md-6">Total: <span style="color: #004040;" id="totalgtable"></span> </div>
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
							<button type="button" class="btn btn-success btn-lg" id="save_table_graphs"><i class="fa fa-plus-square"></i> Save</button>
							<button id="tabldInfo_close" type="button" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
						 </div>
						  <div class="seperat3"></div>
					 </div>
				 </div>
				 
       </div>