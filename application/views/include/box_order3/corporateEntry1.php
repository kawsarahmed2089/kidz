id=
      <div class="container-fluid internal_title"><strong>New Corporate Setup</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="corp_setup_from2" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/corporate_save">

       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Corporate Name:</span>
          <input type="text" name="corpName" id="corpName_ent2" class="form-control" placeholder="Corporate Name" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Address:</span>
          <input type="text" name="corpAddress" class="form-control" placeholder="Address" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Contac No:</span>
          <input type="text" name="corpContactNo" class="form-control" placeholder="Contac No" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Contact Person:</span>
          <input type="text" name="corpContactPerson" class="form-control" placeholder="Contact Person" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Email:</span>
          <input type="email" name="corpEmailAddress" class="form-control" placeholder="Email" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Bank:</span>
          <input type="text" name="Bank" class="form-control" placeholder="Bank" required="required">
        </div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">Website:</span>
          <input type="text" name="corpWeb" class="form-control" placeholder="Website" required="required">
        </div>
       </div>
       </div>


      <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="sve_floor_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="corp_setup_close2" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>