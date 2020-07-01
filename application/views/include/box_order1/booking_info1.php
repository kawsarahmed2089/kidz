 <div class="container-fluid internal_title"><strong>Booking Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
		<form role="form" id="booking_show_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_booking_log_shoing">
			<div class="seperat10"></div>
			<div class="row">
				<div class="col-md-4">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">Start Date : </span>
					<input id="bokin_stdate" type="date" name="start_date" class="form-control" />
				  </div>
				</div>
				
				<div class="col-md-4">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">End Date : </span>
					<input id="boking_enddate" type="date" name="end_date" class="form-control" />
				  </div>
				</div>
				<div class="col-md-4">
					<button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>
			</div>
			<div class="seperat10"></div>
		</form>
		
      <div class="row" id="my_table_room" style="">
      <div class="col-md-12 for_room_table" style="min-height:500px;">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">P. Name</th>
          <th data-sort="int">Cont. Number</th>
          <th data-sort="string"> Address </th>
		  <th data-sort="string"> P. Name </th>
		  <th data-sort="string">Total Money</th>
		  <th data-sort="string">S.Charge</th>
		  <th data-sort="string">Total Paid</th>
		  <th data-sort="string">Advance</th>
		  <th data-sort="string">Due</th>
		  <th data-sort="string">Total Person</th>
		  <th data-sort="string">Per Person Amount</th>
		  <th data-sort="string">Comment</th>
		  <th data-sort="string">Place</th>
		  <th data-sort="string">Time</th>
		  <th data-sort="string">Party Date</th>
		  <th data-sort="string">DOC</th>
		  <th data-sort="string">Creator</th>
        </tr>
        </thead>
        <input type="hidden" id="booking_show_link" value="<?php echo base_url();?>index.php/site_controller/booking_show" />
		<input type="hidden" id="booking_invoice_prints_link" value="<?php echo base_url();?>index.php/report_controller/booking_invoice_print_show/" />
        <tbody id="booking_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_booking"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="booking_del_link" value="<?php echo base_url();?>index.php/site_controller/booking_delete" />
         <input type="hidden" id="booking_edi_link" value="<?php echo base_url();?>index.php/site_controller/booking_edit_show" />
  <button class="btn btn-success" type="button" title="Add New Booking" id="new_booking_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_bookin" type="button" title="Delete Booking From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_booking_edit" type="button" title="Edit Booking" ><i class="fa fa-pencil-square"></i></button>
  <button class="btn btn-warning" id="new_party_invoice_printsa" type="button" title="Print Selected Party Invoice" ><i class="glyphicon glyphicon-print"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="boking_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="booking_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>