
 <div class="container-fluid internal_title"><strong>Corporate Room Rate</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row">
      <div class="col-md-12">
      <div class="seperat10"></div>
        <div class="input-group input-group-sm max_width550">
      <input type="search" class="form-control">
       <span class="input-group-btn">
        <button title="Clear" class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
        <button class="btn btn-default" type="button"><i class="fa fa-search"></i> Find</button>
       </span>
        </div>
        <div class="seperat10"></div>
      </div>
      </div>
      
      <div class="row">
      <div class="col-md-12 for_room_table">
       <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">#</th>
          <th data-sort="string">Corporate Name</th>
          <th data-sort="int">Room Type</th>
          <th data-sort="int">Room Rate</th>
          <th data-sort="int">Corporate Rate Status</th>
        </tr>
        </thead>
        <input type="hidden" id="show_corp_room_rate" value="<?php echo base_url();?>index.php/site_controller/show_corp_room_rate" />
        <input type="hidden" id="edishow_corp_room_rate" value="<?php echo base_url();?>index.php/site_controller/edishow_corp_room_rate" />
        <input type="hidden" id="del_corp_room_rate" value="<?php echo base_url();?>index.php/site_controller/del_corp_room_rate" />
        <tbody id="corp_room_rate_dis">
        <!-- Room Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span id="totl_corp_room_rate" style="color: #004040;"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-sm">
         <button class="btn btn-default" id="add_corporate_room" type="button"  title="Add New Corporate Room"><i class="fa fa-plus"></i></button>
         <button class="btn btn-default" id="del_corporate_room" type="button" title="Delete Corporate"><i class="fa fa-times"></i></button>
         <button class="btn btn-default" id="edi_corporate_room" type="button" title="Edite Corporate Room" ><i class="fa fa-pencil-square"></i></button>
         </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="msg_corp_room_rate" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" id="corpRate_close" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>



