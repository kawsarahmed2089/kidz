 <div class="container-fluid internal_title"><strong>Product Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
  
			<div class="row">
			  <div class="col-md-12">
				  <div class="seperat10"></div>
					<div class="input-group input-group-sm max_width550">
						<input type="search" id="mynesearch" class="form-control" >
						<span class="input-group-btn">
							<button title="Clear" class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
							<button class="btn btn-default" type="button"><i class="fa fa-search"></i> Find</button>
						</span>
					</div>
					<div class="seperat10"></div>
			  </div>
			</div>
	  
	  
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="producTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Name</th>
          <th data-sort="int">Categories</th>
		  <th data-sort="int">Code</th>
          <th data-sort="string">Price</th>
          <th data-sort="string">Cost Price</th>
		  <th data-sort="string">S. Amount</th>
		  <th data-sort="string">Show in Kitchen</th>
        </tr>
        </thead>
        <input type="hidden" id="product_show_link" value="<?php echo base_url();?>index.php/site_controller/product_show" />
        <tbody id="product_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_product"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="product_del_link" value="<?php echo base_url();?>index.php/site_controller/product_delete" />
         <input type="hidden" id="product_edi_link" value="<?php echo base_url();?>index.php/site_controller/product_edit_show" />
  <button class="btn btn-success btn_first" type="button" title="Add New Product" id="new_product_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_productes" type="button" title="Delete Product From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_product_edit" type="button" title="Edite Product" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="product_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="product_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>