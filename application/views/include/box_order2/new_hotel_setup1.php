
      <div class="container-fluid internal_title"><strong>New Hotel Setup</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="hotel_save_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/hotel_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Hotel Name: </span>
          <input type="text" class="form-control" name="hotel_name" placeholder="Hotel Name" required="required">
        </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Hotel Address:</span>
          <input type="text" name="hotel_address" class="form-control" placeholder="Hotel Address">
        </div>
       </div>
       </div>

       <div class="seperat15"></div>
       <div class="row">
         <div class="col-md-7">
         <div class="input-group input-group-sm">
          <span class="input-group-addon">Contact No:</span>
          <input type="text" name="hotel_contact" class="form-control" placeholder="Hotel Contact Number" required="required">
        </div>
         </div>
         
         <div class="col-md-5">
          <div class="input-group input-group-sm">
           <span class="input-group-addon">Hotel Star:</span>
          <input type="number" name="hotel_grade" class="form-control" placeholder="Hotel Star" min="0" max="25">
          </div>
         </div>
         
       </div>
        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="sve_htl_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="hotel_save_close" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>