      <div class="container-fluid internal_title"><strong>New Table Joining</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="table_join_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/tavle_joining">
       <div class="seperat5"></div>
      <div class="row">
      <div class="col-md-12 for_room_table">
       <table id="roomTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
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
        <tbody id="tavle_discr_for_joining">
        <!-- Product Discription Table -->
        </tbody>

       </table>
      </div>
      </div>

       <div class="seperat15"></div>

      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="tavle_joini_msge"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="tavle_joinin_cencel"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>