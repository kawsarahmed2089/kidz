
 <div class="container-fluid internal_title"><strong>Extra Service Types</strong></div>      
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
          <th data-sort="string">Extra Service Name</th>
          <th data-sort="int">Extra Service Charge</th>
          <th data-sort="int">Extra Service Note</th>
          <th data-sort="int">Extra Service Status</th>
        </tr>
        </thead>
        <input type="hidden" id="del_extra_servic_type_key" name="del_key" />
        <input type="hidden" id="del_extra_servic_type_link" value="<?php echo base_url();?>index.php/site_controller/type_extra_service_del" />
        <input type="hidden" id="show_extra_servic_type_link" value="<?php echo base_url();?>index.php/site_controller/type_extra_service_show" />
        <input type="hidden" id="show_extra_servic_type_edilink" value="<?php echo base_url();?>index.php/site_controller/type_extra_servic_edi_show" />
        <tbody id="extra_servic_type_dis">
        <!-- extra_service_type Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span id="total_extra_servic_type" style="color: #004040;"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-sm">
         <button class="btn btn-default" type="button" id="add_extra_servic_type" title="Add New Type"><i class="fa fa-plus"></i></button>
         <button class="btn btn-default" type="button" id="del_extra_servic_type" title="Delete TYpe"><i class="fa fa-times"></i></button>
         <button class="btn btn-default" type="button" id="edi_extra_servic_type" title="Edite Type" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="typ_exservice" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" id="close_extra_servic_typ" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>



