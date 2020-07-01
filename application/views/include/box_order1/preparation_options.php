 <div class="container-fluid internal_title"><strong>Preparation Options</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <div class="row">
      <div class="col-md-12 for_room_table">
       <table id="prepa_optable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">Preparation Options</th>
        </tr>
        </thead>
		<input type="hidden" id="prepar_options_show_link" value="<?php echo base_url();?>index.php/site_controller/prepar_option_show" />
        <tbody id="prepar_optio_discriptt">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_prepar_optio"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="optionn_del_link" value="<?php echo base_url();?>index.php/site_controller/delete_prep_option" />
         <input type="hidden" id="prepoption_edi_link" value="<?php echo base_url();?>index.php/site_controller/prep_opt_edit_show" />
  <button class="btn btn-success btn_first" type="button" title="Add New Options" id="new_options_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" type="button" title="Delete Options From List" id="delete_opt_frmlist" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_prep_optio_edit" type="button" title="Edite Category" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="prepar_optio_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="prepar_optio_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>