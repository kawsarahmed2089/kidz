<div class="container-fluid internal_title"><strong>Clients</strong></div>

<div class="container-fluid internal_box2 internal_fistb">
   <div class="row">
      <div class="col-md-12">
         <div class="seperat10"></div>
         <div class="input-group input-group-sm max_width550">
            <input type="search" class="form-control" >
            <span class="input-group-btn">
            <button title="Clear" class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i> Find</button>
            </span>
         </div>
         <div class="seperat10"></div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 for_room_table" style="height: 365px;">
         <table class="table table-bordered table-striped table-hover for_table_bold " style="background-color:#FFFFFF;">
            <thead style="cursor: default;">
               <tr class="">
                  <th data-sort="int">#</th>
                  <th data-sort="string">Name</th>
                  <th data-sort="string">Father Name</th>
                  <th data-sort="string">Mother Name</th>
                  <th data-sort="string">Birthday</th>
                  <th data-sort="string">Gender</th>
                  <th data-sort="int">Contact No</th>
                  <th data-sort="string">Email</th>
                  <th data-sort="string">Present Address</th>
                  <th data-sort="string">Parmanent Address</th>
                  <th data-sort="string">Nationality</th>
                  <th data-sort="string">Country</th>
                  <th data-sort="string">National id</th>
                  <th data-sort="string">Passport No</th>
                  <th data-sort="string">Corporate</th>
               </tr>
            </thead>
            
            <input type="hidden" id="clients_info_show_link" value="<?php echo base_url();?>index.php/site_controller/clients_info_show" />
            <input type="hidden" id="clients_info_edishow_link" value="<?php echo base_url();?>index.php/site_controller/edishow_clients_info" />
            <input type="hidden" id="clients_info_del_link" value="<?php echo base_url();?>index.php/site_controller/del_clients_info" />
            
             <tbody id="clients_info_dis">
               <!-- Room Discription Table -->
             </tbody>
         </table>
      </div>
   </div>
   <div class="seperat3"></div>
  <div class="row border_top">
      <div class="col-md-6">Total: <span id="total_client_show" style="color: #004040;"></span> </div>
      <div class="col-md-6">|</div>
   </div>
   <div class="seperat3"></div>
   <div class="row border_top">
      <div class="seperat3"></div>
      <div class="col-md-12">
         <div class="btn-group btn-group-sm">
            <button class="btn btn-default" id="add_new_client" type="button" title="Add New Client"><i class="fa fa-plus"></i></button>
            <button class="btn btn-default" id="del_new_client" type="button" title="Delete Client"><i class="fa fa-times"></i></button>
            <button class="btn btn-default" id="edit_new_client" type="button" title="Edit Client"><i class="fa fa-pencil-square"></i></button>
            <button class="btn btn-default" type="button" title="Print" ><i class="fa fa-print"></i></button>
         </div>
      </div>
   </div>
   <div class="seperat3"></div>
   <div class="row border_bottom border_top">
      <div class="seperat3"></div>
      <div class="col-md-9 show_msg_client_info" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
      <div class="col-md-3 text-right">
         <div class="btn-group">
            <button type="button" class="btn btn-default close_clien"><i class="fa fa-times"></i> Close</button>
         </div>
         <div class="seperat3"></div>
      </div>
   </div>
</div>
