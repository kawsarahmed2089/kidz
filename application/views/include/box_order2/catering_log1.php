      <div class="container-fluid internal_title"><strong>View Item Log </strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat15"></div>
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="roomTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Item Name</th>
		  <th data-sort="string">Purpose</th>
          <th data-sort="int">Quantity</th>
		  <th data-sort="int">Responsible</th>
		  <th data-sort="int">Description</th>
		  <th data-sort="int">Creator</th>
		  <th data-sort="int">DOC</th>
          
        </tr>
        </thead>
        <input type="hidden" id="catering_log_show_link" value="<?php echo base_url();?>index.php/site_controller/catering_log_show" />
        <tbody id="catering_log_discrip">
        <!-- Catering Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_catering_log"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="cater_log_dele_link" value="<?php echo base_url();?>index.php/site_controller/catering_log_delete" />
         <input type="hidden" id="caterin_log_edi_link" value="<?php echo base_url();?>index.php/site_controller/catering_log_edit_show" />
  <button class="btn btn-success" type="button" title="Add New Item Log" id="new_catering_log_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-" id="catering_log_delete" type="button" title="Delete Item Log" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="catering_item_log_edit" type="button" title="Edit Item Log" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="itemlog_action_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="reset" class="btn btn-danger btn-lg" id="catering_log_cencel"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>