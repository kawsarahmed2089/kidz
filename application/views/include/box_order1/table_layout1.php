 <div class="container-fluid internal_title"><strong>Table Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Name</th>
          <th data-sort="int">Number</th>
          <th data-sort="string">Capacity</th>
          <th data-sort="string">Active</th>
		  <th data-sort="string">Status</th>
        </tr>
        </thead>
        <input type="hidden" id="tavle_show_link" value="<?php echo base_url();?>index.php/site_controller/tavle_show" />
        <tbody id="tavle_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_tavles"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
        <div class="btn-group btn-group-lg">
			<input type="hidden" id="tavle_del_link" value="<?php echo base_url();?>index.php/site_controller/tavle_delete" />
			<input type="hidden" id="tavle_edi_link" value="<?php echo base_url();?>index.php/site_controller/tavle_edit_show" />
		  <button class="btn btn-success btn_first" type="button" title="Add New Table" id="new_tavle_entr" ><i class="fa fa-plus"></i></button>
		  <button class="btn btn-danger" type="button" title="Delete Table From List" id="delete_tavle" ><i class="fa fa-times"></i></button>
		  <button class="btn btn-primary" id="new_tavle_edit" type="button" title="Edit Table" ><i class="fa fa-pencil-square"></i></button>
		  <button class="btn btn-warning" id="new_tavle_split" type="button" title="Split Table" >
			<i class="fa fa-magic"></i></button>
			<button class="btn btn-info" id="new_tavle_join" type="button" title="Join Table" >
			<i class="fa fa-steam"></i></button>
			
			<button class="btn btn-primary" id="new_tavle_design" type="button" title="Table Design" >
			<i class="fa fa-recycle"></i></button>
		</div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="tavle_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="tavle_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>