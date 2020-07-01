 <div class="container-fluid internal_title"><strong>All Stock Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Product Name</th>
          <th data-sort="int">Category</th>
          <th data-sort="string">Stock Amount</th>
        </tr>
        </thead>
        <input type="hidden" id="product_stock_show_link" value="<?php echo base_url();?>index.php/site_controller/product_stock_show" />
        <tbody id="stock_discripi">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_product_stoc"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="stocke_dele_link" value="<?php echo base_url();?>index.php/site_controller/stocke_delete" />
         <input type="hidden" id="stocke_edi_link" value="<?php echo base_url();?>index.php/site_controller/stocke_edit_show" />
  <button class="btn btn-success btn_first" type="button" title="Add New Stock" id="new_stoc_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-warning" id="usage_resource" type="button" title="Usage Resources" ><i class="fa fa-rebel"></i></button>
  <button class="btn btn-info" id="catering_items" type="button" title="Catering Items" ><i class="fa fa-spotify"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="expens_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="stock_system_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>