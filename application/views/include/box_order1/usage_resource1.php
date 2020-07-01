 <div class="container-fluid internal_title"><strong>All Usage Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
	    <div class="row">
			<form role="form" id="use_resource_show_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_use_resource_shoing">
				<label for="usag_stdate">Start Date : </label>
				<input id="usag_stdate" type="date" name="start_date"/> 
				<label for="usag_enddate">End Date : </label><input id="usag_enddate" type="date" name="end_date"/>

				<input type="submit" name="submit" value="Submit" class="form-control"/>
			</form>
        </div>
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Product Name</th>
          <th data-sort="int">Category</th>
          <th data-sort="string">Use Amount</th>
		  <th data-sort="string">Description</th>
		  <th data-sort="string">Creator</th>
		  <th data-sort="string">DOC</th>
        </tr>
        </thead>
        <input type="hidden" id="usage_res_show_link" value="<?php echo base_url();?>index.php/site_controller/usage_resource_show" />
        <tbody id="usage_discripi">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_usage_stoc"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group">
         <input type="hidden" id="stocke_dele_link" value="<?php echo base_url();?>index.php/site_controller/stocke_delete" />
         <input type="hidden" id="stocke_edi_link" value="<?php echo base_url();?>index.php/site_controller/stocke_edit_show" />
  <button class="btn btn-success btn-lg btn_first" type="button" title="Add New Usage" id="usage_resource_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger btn-lg" id="delet_usage_resource" type="button" title="Delete Resources" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary btn-lg" id="usage_resou_edit" type="button" title="Edit Usage Resource" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="usage_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="usage_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>