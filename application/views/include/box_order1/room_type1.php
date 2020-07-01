
 <div class="container-fluid internal_title"><strong>Room Types</strong></div>      
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
          <th data-sort="string">#</th>
          <th data-sort="string">Type Name</th>
          <th data-sort="int">Min Adults</th>
          <th data-sort="int">Max Adults</th>
          <th data-sort="int">Min Children</th>
          <th data-sort="int">Max Children</th>
          <th data-sort="string">Description</th>
        </tr>
        </thead>
        <input type="hidden" id="del_types_key" name="del_key" />
        <input type="hidden" id="del_types_link" value="<?php echo base_url();?>index.php/site_controller/types_del" />
        <input type="hidden" id="show_types_link" value="<?php echo base_url();?>index.php/site_controller/type_room_show" />
        <input type="hidden" id="show_types_edilink" value="<?php echo base_url();?>index.php/site_controller/type_room_edi_show" />
        <tbody id="type_dis">
        <!-- Room Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span id="total_types" style="color: #004040;"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-sm">
         <button class="btn btn-default" type="button" id="add_room_typeso" title="Add New Type"><i class="fa fa-plus"></i></button>
         <button class="btn btn-default" type="button" id="del_room_typeso" title="Delete TYpe"><i class="fa fa-times"></i></button>
         <button class="btn btn-default" type="button" id="edi_room_typeso" title="Edite Type" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="typ_rommsg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" id="close_room_typ" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>



