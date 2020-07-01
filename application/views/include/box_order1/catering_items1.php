 <div class="container-fluid internal_title"><strong>All Catering Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Item Name</th>
		  <th data-sort="string">Store Name</th>
		  <th data-sort="string">Stock Amount</th>
		  <th data-sort="string">Unit Price</th>
          <th data-sort="int">Use Amount</th>
		  <th data-sort="int">Damage/Lost Amount</th>
		  <th data-sort="int">Creator</th>
		  <th data-sort="int">DOC</th>
          
        </tr>
        </thead>
        <input type="hidden" id="catering_stock_show_link" value="<?php echo base_url();?>index.php/site_controller/catering_stock_show" />
        <tbody id="catering_discripi">
        <!-- Catering Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_catering_stoc"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="caterin_dele_link" value="<?php echo base_url();?>index.php/site_controller/catering_delete" />
         <input type="hidden" id="caterin_edi_link" value="<?php echo base_url();?>index.php/site_controller/catering_edit_show" />
		 <input type="hidden" id="caterin_prntt_link" value="<?php echo base_url();?>index.php/site_controller/catering_item_print" />
  <button class="btn btn-success" type="button" title="Add New Item" id="new_catering_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-info" id="catering_log" type="button" title="View Item Log" ><i class="fa fa-search-minus"></i></button>
  <button class="btn btn-primary" id="catering_items_edit" type="button" title="Edit Item Name" ><i class="fa fa-pencil-square"></i></button>
  <button class="btn btn-warning" id="print_catering_list" type="button" title="Print All Catering List"><i class="fa fa-print"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="catering_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="catering_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>