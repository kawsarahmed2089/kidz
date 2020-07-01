      <div class="container-fluid internal_title"><strong>New Transaction Entry</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb" style="overflow: scroll;">
       <form role="form" id="transaction_entry_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/transaction_save">
       <div class="seperat10"></div>
       <div class="row">
       <div class="col-md-8">
		<div class="input-group input-group-lg">
		  <span class="input-group-addon">Transaction Purpose: </span>
		  <select id="transactio_purpose_nam" name="purposeName"  required="required" class="form-control">
			<option value="">Select Purpose</option>
			<option value="Credit Collection">Credit Collection</option>
			<option value="SendAccounts">Send To Accounts</option>
		  </select>
		</div>
       </div>
	   </div>
	   <div id="transactio_type_nam_id">
				   <div class="seperat10"></div>
				   <div class="row">
				   <div class="col-md-8">
						<div class="input-group input-group-lg">
						  <span class="input-group-addon">Credit Collection Type: </span>
						  <select id="transactio_type_nam" name="typeName" class="form-control">
							<option value="">Select Type</option>
							<option value="collect_party">Due Collection From Party</option>
							<option value="collect_client">Due Collection From Client</option>
							<option value="stuff_due">Stuff Due</option>
						  </select>
							<input type="hidden" id="party_due_list_show_link" value="<?php echo base_url();?>index.php/site_controller/show_all_party_due_list">
							<input type="hidden" id="client_due_list_show_link" value="<?php echo base_url();?>index.php/site_controller/show_all_clients_due_list">
						</div>
				   </div>
				   </div>
	   
			   <div id="transactio_client_nam_select_id">
					   <div class="seperat10"></div>
					   <div class="row">
					   <div class="col-md-8">
							<div class="input-group input-group-lg">
							  <span class="input-group-addon">Select Client: </span>
							  <select id="transactio_client_nam_select" name="orderName" class="form-control">
								<option value="">Select Client</option>
							  </select>
							  <input type="hidden" id="specific_order_due_show_link" value="<?php echo base_url();?>index.php/site_controller/show_specific_order_due">
							</div>
					   </div>
					   <div class="col-md-4">
					   Sent To Reception<input type="checkbox" checked="checked" name="reception">
					   </div>
					   </div>
			   </div>
			   <div id="transactio_party_nam_select_id">
					   <div class="seperat10"></div>
					   <div class="row">
					   <div class="col-md-8">
							<div class="input-group input-group-lg">
							  <span class="input-group-addon">Select Party: </span>
							  <select id="transactio_party_nam_select" name="partyName" class="form-control">
								<option value="">Select Party</option>
							  </select>
							  <input type="hidden" id="specific_booking_info_show_link" value="<?php echo base_url();?>index.php/site_controller/show_specific_party">
							</div>
					   </div>
					   </div>
			   </div>
			   <div id="transactio_stuffi_nam_select_id">
					   <div class="seperat10"></div>
					   <div class="row">
					   <div class="col-md-8">
							<div class="input-group input-group-lg">
							  <span class="input-group-addon">Select Month: </span>
							  <input type="month" name="stuff_month" id="stuffi_month_id"/>
							  <input type="hidden" id="specific_stuff_month_due_info_show_link" value="<?php echo base_url();?>index.php/site_controller/show_specific_stuff_month_due">
							</div>
					   </div>
					   </div>
					   <div class="seperat10"></div>
					   <div class="row">
					   <div class="col-md-8">
							<div class="input-group input-group-lg">
							  <span class="input-group-addon">Select Stuff: </span>
							  <select id="transactio_stuffi_nam_select" name="stuffName" class="form-control">
								<option value="">Select Stuff</option>
							  </select>
							</div>
					   </div>
					   </div>
			   </div>
			   			<div class="seperat10"></div>
					   <div class="row">
						    <div class="col-md-10">
								<div id="booking_summery_showw">
								</div>
							</div>
						</div>
	   </div>
	   <div id="transactio_amount_date_id">
					   <div class="row">
						   <div class="col-md-7">
							<div class="input-group input-group-lg"><?php $bd_date = date('Y-m-d');?>
							  <span class="input-group-addon">Transaction Date: </span>
							  <input type="date" name="transaction_date" id="trans_dtae" value="<?php echo $bd_date;?>" class="form-control hasDatepicker" required='required'>
							</div>		   
						   </div>
						   <div class="col-md-5">
								
						   </div>
					   </div>
		
					   <div class="seperat10"></div>
					   <div class="row">
						   <div class="col-md-7">
							<div class="input-group input-group-lg">
							  <span class="input-group-addon">Transaction Amount: </span>
							  <input type="number" name="transaction_amount" id="" class="form-control">
							</div>		   
						   </div>
						   <div class="col-md-5">
						   </div>
					   </div>
					   <div class="seperat10"></div>
					  <div class="row border_bottom border_top">
					   
					   <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
					   <div class="seperat5"></div>
					   <span id="transaction_entry_msge"></span>
					   </div>
					   <div class="col-md-5 text-right">
					   <div class="seperat5"></div>
					   <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
					   <button type="reset" class="btn btn-danger btn-lg" id="transaction_entry_cencel"><i class="fa fa-times"></i> Cancel</button>
					   <div class="seperat5"></div>
					   </div>

					   </div>
	   </div>

       </form>
       </div>