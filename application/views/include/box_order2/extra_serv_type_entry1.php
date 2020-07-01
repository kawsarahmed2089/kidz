
      <div class="container-fluid internal_title"><strong>Extra Service Type Setup</strong></div>
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="extra_ser_type_setup_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/extra_service_type_save">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Name:</span>
          <input type="text" name="exServicTypName" id="exServicTypName" class="form-control" placeholder="Extra Service Name" required="required">
        </div>
       </div>
       </div>
       
       </div>
       </div>
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Charge:</span>
          <input type="text" name="exServicTypCharge" id="exServicTypCharge" class="form-control" placeholder="Extra Service Charge" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Note:</span>
          <input type="text" name="addServiceNote" class="form-control" placeholder="Extra Service Note">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Status:</span>
          <input type="text" name="addServiceStatus" class="form-control" placeholder="Extra Service Status">
        </div>
       </div>
       </div>


        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="sve_ser_typ_ent_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="extr_serv_typectr_close" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>