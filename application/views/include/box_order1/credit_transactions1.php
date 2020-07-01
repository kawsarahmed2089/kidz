 <div class="container-fluid internal_title"><strong>Credit Transactions</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
		<form role="form" id="transactio_shows_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_transactions_shoing">
			<div class="seperat10"></div>
			<div class="row">
				<div class="col-md-4">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">Start Date : </span>
					<input id="trans_stdate" type="date" name="start_date" class="form-control" />
				  </div>
				</div>
				
				<div class="col-md-4">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">End Date : </span>
					<input id="trans_enddate" type="date" name="end_date" class="form-control" />
				  </div>
				</div>
				<div class="col-md-4">
				<div class="input-group input-group-lg">
					<span class="input-group-addon">Transaction Type:  </span>
					<select name="transactio_type" class="form-control" id="id_transa_typee">
						<option value="">Select Type</option>
						<option value="in">Cash In</option>
						<option value="out">Cash Out</option>
					</select>
				</div>
				</div>
			</div>
			<div class="seperat10"></div>
			<div class="row">
				<div class="col-md-4">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">Select Purpose : </span>
					<select name="transactio_purpose" class="form-control" id="transact_purpose_id">
						<option value="">Select Purpose</option>
						<option value="Party">Party</option>
						<option value="Sale">Sale</option>
						<option value="Sale Due">Sale Due</option>
						<option value="Sale Return">Sale Return</option>
						<option value="Restaurant Expense">Restaurant Expense</option>
						<option value="Sent To Account">Sent To Account</option>
					</select>
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
       <table id="roomTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Transaction Type</th>
          <th data-sort="int">Transaction Amount</th>
          <th data-sort="string"> Transaction Date </th>
          <th data-sort="string">Purpose</th>
		  <th data-sort="string">Realize Date</th>
		  <th data-sort="string">Order/Expense/Booking ID</th>
		  <th data-sort="string">Creator</th>
		  <th data-sort="string">DOC</th>
        </tr>
        </thead>
        <input type="hidden" id="transaction_show_link" value="<?php echo base_url();?>index.php/site_controller/transaction_show" />
        <tbody id="transaction_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_transactio"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="transactio_del_link" value="<?php echo base_url();?>index.php/site_controller/transactions_delete" />
         <input type="hidden" id="transactio_edi_link" value="<?php echo base_url();?>index.php/site_controller/transaction_edit_show" />
		 <input type="hidden" id="transactio_printss_link" value="<?php echo base_url();?>index.php/report_controller/transaction_printt_show/" />
  <button class="btn btn-success" type="button" title="Add New Transaction" id="new_transaction_entr" ><i class="fa fa-plus"></i></button>
    <button class="btn btn-warning" id="new_transactions_printsa" type="button" title="Print Transactions" ><i class="glyphicon glyphicon-print"></i></button>
  <!--<button class="btn btn-danger" id="delet_transactio" type="button" title="Delete Transaction From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_transactio_edit" type="button" title="Edit Transaction" ><i class="fa fa-pencil-square"></i></button>-->
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="transactio_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="transactio_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>