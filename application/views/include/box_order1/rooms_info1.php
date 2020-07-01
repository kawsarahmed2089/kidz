 <div class="container-fluid internal_title"><strong>Rooms</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="roomTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">#</th>
          <th data-sort="string">Type</th>
          <th data-sort="int">Number</th>
          <th data-sort="string">Status</th>
          <th data-sort="string">Name</th>
        </tr>
        </thead>
        <input type="hidden" id="room_show_link" value="<?php echo base_url();?>index.php/site_controller/room_show" />
        <tbody id="room_discrip">
        <!-- Room Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_room"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-sm">
         <input type="hidden" id="room_del_link" value="<?php echo base_url();?>index.php/site_controller/room_delete" />
         <input type="hidden" id="room_edi_link" value="<?php echo base_url();?>index.php/site_controller/room_edit_show" />
  <button class="btn btn-default" type="button" title="Add New Room" id="new_room" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-default" type="button" title="Delete Room List" id="delete_room" ><i class="fa fa-times"></i></button>
  <button class="btn btn-default" id="new_room_edit" type="button" title="Edite Room" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="room_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-default" id="room_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>