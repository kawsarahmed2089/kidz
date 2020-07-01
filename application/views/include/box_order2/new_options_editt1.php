 

      <div class="container-fluid internal_title"><strong>New Options Edit</strong></div>
      
      <form role="form" id="prepar_option_edit_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/preperation_option_edit">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-lg">
       <span class="input-group-addon">Preparation Option: </span>
       <input required="required" id="prepar_optio_edii" autofocus="autofocus" type="text" name="optionName" class="form-control" placeholder="Preparation Option Name">
       </div>
       </div>
       </div>
		<input type="hidden" name="edi_key" id="prep_option_edi_key">
       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_optio_edittr"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_options_edit" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>