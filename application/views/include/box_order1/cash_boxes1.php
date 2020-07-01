 <div class="container-fluid internal_title"><strong>Cash Box Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
	  	    <div class="row">
				<form role="form" id="cash_box_show_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_cash_box_shoing">
					<label for="cash_stdate">Start Date : </label>
						<input id="cash_stdate" type="date" name="start_date"/> 
					<label for="cash_enddate">End Date : </label>
						<input id="cash_enddate" type="date" name="end_date"/>

					<input type="submit" name="submit" value="Submit" class="form-control"/>
				</form>
			</div>
	  
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Opening Cash</th>
          <th data-sort="int">1000</th>
          <th data-sort="string">500</th>
          <th data-sort="string">100</th>
		  <th data-sort="string">50</th>
		  <th data-sort="string">20</th>
		  <th data-sort="string">10</th>
		  <th data-sort="string">5</th>
		  <th data-sort="string">2</th>
		  <th data-sort="string">1</th>
		  <th data-sort="string">Closing Cash</th>
		  <th data-sort="string">DOC</th>
		  <th data-sort="string">creator</th>
        </tr>
        </thead>
        <input type="hidden" id="cashbox_show_link" value="<?php echo base_url();?>index.php/site_controller/cash_box_show" />
        <tbody id="cashbox_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_cash_box"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="cashbox_del_link" value="<?php echo base_url();?>index.php/site_controller/cash_box_delete" />
         <input type="hidden" id="cashbox_edi_link" value="<?php echo base_url();?>index.php/site_controller/cashbox_edit_show" />
		 <input type="hidden" id="cashbox_print_link" value="<?php echo base_url();?>index.php/report_controller/cashbox_print/" />
  <button class="btn btn-success" type="button" title="Add New Cash" id="new_cashbox_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_cashboxeses" type="button" title="Delete Cash Box From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_cashbox_edit" type="button" title="Edit Cash Box" ><i class="fa fa-pencil-square"></i></button>
  <button class="btn btn-warning" id="new_cashbox_print" type="button" title="Print Cash Box" ><i class="glyphicon glyphicon-print"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="cash_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group btn-group-lg">
         <button type="button" class="btn btn-danger" id="cashbox_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>