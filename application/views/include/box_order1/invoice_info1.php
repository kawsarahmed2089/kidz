 <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Invoice Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
	<input type="hidden" id="all_users_show_link" value="<?php echo base_url();?>index.php/site_controller/all_users_show" />
	<input type="hidden" id="all_waiters_show_link" value="<?php echo base_url();?>index.php/site_controller/all_waiters_show" />
      
		<form role="form" id="invoice_entry_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_invoices_shoing">
        <div class="seperat10"></div>
        <div class="row">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon">Start Date : </span>
            <input id="invoice_stdate" type="date" name="start_date" class="form-control" />
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-addon">End Date : </span>
            <input id="invoice_enddate" type="date" name="end_date" class="form-control" />
          </div>
        </div>
        </div>
        <div class="seperat10"></div>
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="input_username_for_inv">
          <div class="input-group">
            <span class="input-group-addon">Select Username : </span>
            <select id="select_userforinvoice" name="username"class="form-control"></select>
          </div>
        </div>
        
        <div class="col-md-8"  id="input_waitername">
          <div class="input-group">
            <span class="input-group-addon">Select Waiter Name : </span>
            <select id="select_waiterforinvoice" name="waitername"class="form-control"></select>
          </div>
        </div>
        <div class="col-md-2"></div>
        </div>
        <div class="seperat10"></div>
        <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
        <div class="col-md-5"></div>
        </div>
        
        
<!--
			<span id="input_username_for_inv">
			<label for="select_userforinvoice"> Select Username : </label><select id="select_userforinvoice" name="username"class="form-control"></select>
			</span>
			<span id="input_waitername">
			<label for="select_waiterforinvoice"> Select Waiter Name : </label><select id="select_waiterforinvoice" name="waitername"class="form-control"></select>
			</span>
-->

            
		</form>
      
	  
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="invoiceTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">No.</th>
          <th data-sort="string">Name</th>
		  <th data-sort="string">Client ID</th>
		  <th data-sort="string">Room</th>
		  <th data-sort="string">Order Type</th>
          <th data-sort="string">Amount</th>
		  <th data-sort="string">Discount</th>
		  <th data-sort="string">Service Charge</th>
		  <th data-sort="string">Grand Total</th>
		  <th data-sort="string">Paid Amount</th>
		  <th data-sort="string">Creator</th>
		  <th data-sort="string">Doc</th>
        </tr>
        </thead>
        <input type="hidden" id="invoice_show_link" value="<?php echo base_url();?>index.php/site_controller/invoice_show" />
        <tbody id="invoice_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_product"></span> </div>
     <div class="col-md-6">|</div>
	        <div class="col-md-12">
				<div class="btn-group btn-group-lg">
					<input type="hidden" id="invoicelist_print_link" value="<?php echo base_url();?>index.php/report_controller/prin_invoice_list/">
				
				<button class="btn btn-warning" id="edit_selected_invoice" type="button" title="Edit The Selected Invoice" ><i class="fa fa-pencil-square"></i></button>
				  <button class="btn btn-primary" id="print_invoice_list" type="button" title="Print All Invoice List" ><i class="glyphicon glyphicon-print"></i></button>
				</div>
			</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">

         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="product_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="invoice_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>