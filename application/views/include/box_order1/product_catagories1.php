 <div class="container-fluid internal_title"><strong>Product Category Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Category Name</th>
          <th data-sort="string">Background Color</th>
          <th data-sort="string">Font Colour </th>
		  <th data-sort="string">Category Description </th>
		  <th data-sort="string">Res. Category</th>
        </tr>
        </thead>
        <tbody id="catego_discriptt">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_catego"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="catego_del_link" value="<?php echo base_url();?>index.php/site_controller/catagory_delete" />
         <input type="hidden" id="catego_edi_link" value="<?php echo base_url();?>index.php/site_controller/catagory_edit_show" />
  <button class="btn btn-success btn_first" type="button" title="Add New Category" id="new_categor_entr" ><i class="fa fa-plus-square"></i></button>
  <button class="btn btn-danger" type="button" title="Delete Category From List" id="delete_category" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_category_edit" type="button" title="Edite Category" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="catego_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="categor_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>