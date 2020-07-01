
      <div class="container-fluid internal_title"><strong>Exra Service Type Edit</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="extr_ser_typ_edi_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/extra_ser_typ_edite">

	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       <input type="hidden" id="extr_ser_typ_ediKey" name="edi_key"  />
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Name:: </span>
          <input type="text" id="extr_ser_typ_edi" class="form-control" name="addServiceName" placeholder="Extra Service Name" required="required">
        </div>
       
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Charge: </span>
          <input type="text" id="extr_ser_charg_edi" class="form-control" name="addServiceCharge" placeholder="Extra Service Charge" required="required">
        </div>
       
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Note: </span>
          <input type="text" id="extr_ser_typ_not_edi" class="form-control" name="addServiceNote" placeholder="Extra Service Note">
        </div>
       
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Extra Service Status: </span>
          <input type="text" id="extr_sertyp_sts_edi" class="form-control" name="addServiceStatus" placeholder="Extra Service Status">
        </div>
       
       </div>
       </div>

        <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="edi_ext_ser_typ_edi_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="ext_ser_typ_edite_close" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>