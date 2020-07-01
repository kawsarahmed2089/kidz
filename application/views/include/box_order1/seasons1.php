
 <div class="container-fluid internal_title"><strong>Seasons</strong></div>      
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
          <th data-sort="int">Seassion</th>
          <th data-sort="int">Period Start</th>
          <th data-sort="int">Period End</th>
          <th data-sort="int">Discount</th>
          <th data-sort="int">Status</th>
        </tr>
        </thead>
        
        <input type="hidden" id="del_sission_link" value="<?php echo base_url();?>index.php/site_controller/seassion_del" />
        <input type="hidden" id="show_sission_link" value="<?php echo base_url();?>index.php/site_controller/seassion_show" />
        <input type="hidden" id="show_sission_edilink" value="<?php echo base_url();?>index.php/site_controller/session_edi_show" />
        
        <tbody id="season_dis">
        <!-- Room Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span id="total_session" style="color: #004040;"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-sm">
          <button id="seasion_add" class="btn btn-default" type="button" title="Add New Sission"><i class="fa fa-plus"></i></button>
          <button id="seasion_del" class="btn btn-default" type="button" title="Delete Sission"><i class="fa fa-times"></i></button>
          <button id="seasion_edi" class="btn btn-default" type="button" title="Edite Sission" ><i class="fa fa-pencil-square"></i></button>
         </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="seion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" id="m_seassion_close" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
</div>

