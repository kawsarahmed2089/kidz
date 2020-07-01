 <div class="container-fluid internal_title"><strong>Package Product Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Package Name</th>
		  <th data-sort="string">Product Name</th>
          <th data-sort="int">Categories</th>
          <th data-sort="string">Quantity</th>
        </tr>
        </thead>
        <input type="hidden" id="package_show_link" value="<?php echo base_url();?>index.php/site_controller/package_show" />
        <tbody id="package_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_package"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="product_package_del_link" value="<?php echo base_url();?>index.php/site_controller/product_package_delete" />

  <button class="btn btn-success" type="button" title="Add New Product To Package" id="new_package_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_productes_fpackage" type="button" title="Delete Product From Package" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_package_edit" type="button" title="Edit Package" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-8" id="package_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-4 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="package_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>