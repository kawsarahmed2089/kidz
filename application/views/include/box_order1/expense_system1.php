 <div class="container-fluid internal_title"><strong>Expense Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Provider Name</th>
          <th data-sort="int">Purpose</th>
          <th data-sort="string">Amount</th>
          <th data-sort="string">Comment</th>
		  <th data-sort="string">DOC</th>
        </tr>
        </thead>
        <input type="hidden" id="expense_show_link" value="<?php echo base_url();?>index.php/site_controller/expense_show" />
        <tbody id="expense_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_expen_amount"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="expense_dele_link" value="<?php echo base_url();?>index.php/site_controller/expens_delete" />
         <input type="hidden" id="expense_edi_link" value="<?php echo base_url();?>index.php/site_controller/expense_edit_show" />
  <button class="btn btn-success" type="button" title="Add New Expense" id="new_expense_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_expens" type="button" title="Delete Expense From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_expens_edit" type="button" title="Edit Expense" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="expens_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="expens_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>