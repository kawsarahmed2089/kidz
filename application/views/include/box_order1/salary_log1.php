 <div class="container-fluid internal_title"><strong>Salary Info</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
		<form role="form" id="salary_show_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/specific_salary_log_shoing">
			<div class="seperat10"></div>
			<div class="row">
				<div class="col-md-6">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">Start Date : </span>
					<input id="salarr" type="date" name="start_date" class="form-control" />
				  </div>
				</div>
				
				<div class="col-md-6">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">End Date : </span>
					<input id="salarr_enddate" type="date" name="end_date" class="form-control" />
				  </div>
				</div>
			</div>
			<div class="seperat10"></div>
			<div class="row">
				<div class="col-md-6">
				  <div class="input-group input-group-lg">
					<span class="input-group-addon">Select Username : </span>
					<select id="select_userforsalar" name="username"class="form-control"></select>
				  </div>
				</div>
				<div class="col-md-4">
					<button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
				</div>
			</div>
			<div class="seperat10"></div>

<!--
			<span id="input_username_for_inv">
			<label for="select_userforinvoice"> Select Username : </label><select id="select_userforinvoice" name="username"class="form-control"></select>
			</span>
			<span id="input_waitername">
			<label for="select_waiterforinvoice"> Select Waiter Name : </label><select id="select_waiterforinvoice" name="waitername"class="form-control"></select>
			</span>
-->
		</form>
		
      <div class="row" id="my_table_room">
      <div class="col-md-12 for_room_table">
       <table id="" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
        <thead style="cursor: default;">
        <tr>
          <th data-sort="int">ID</th>
          <th data-sort="string">E. Name</th>
          <th data-sort="int">Month / Year </th>
          <th data-sort="string">Salary </th>
          <th data-sort="string">Extra</th>
		  <th data-sort="string">Reduced</th>
		  <th data-sort="string">Total</th>
		  <th data-sort="string">Created</th>
		  <th data-sort="string">Creator</th>
        </tr>
        </thead>
        <input type="hidden" id="salary_show_link" value="<?php echo base_url();?>index.php/site_controller/salary_show" />
        <tbody id="salary_discrip">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>
      <div class="seperat3"></div>
     <div class="row border_top">
     <div class="col-md-6">Total: <span style="color: #004040;" id="total_salaryy"></span> </div>
     <div class="col-md-6">|</div>
     </div>
      <div class="seperat3"></div>
        <div class="row border_top">
        <div class="seperat3"></div>
         <div class="col-md-12">
         <div class="btn-group btn-group-lg">
         <input type="hidden" id="salary_del_link" value="<?php echo base_url();?>index.php/site_controller/salary_delete" />
         <input type="hidden" id="salary_edi_link" value="<?php echo base_url();?>index.php/site_controller/salary_edit_show" />
  <button class="btn btn-success btn_first" type="button" title="Add New Salary" id="new_salary_entr" ><i class="fa fa-plus"></i></button>
  <button class="btn btn-danger" id="delet_salary" type="button" title="Delete Salary From List" ><i class="fa fa-times"></i></button>
  <button class="btn btn-primary" id="new_salary_edit" type="button" title="Edit Salary" ><i class="fa fa-pencil-square"></i></button>
      </div>
         </div>
         </div>
         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
         <div class="seperat3"></div>
         <div class="col-md-9" id="sallr_action_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
         <div class="col-md-3 text-right">
         <div class="btn-group">
         <button type="button" class="btn btn-danger btn-lg" id="salry_info_close"><i class="fa fa-times"></i> Close</button>
         </div>
          <div class="seperat3"></div>
         </div>
         </div>
         
       </div>