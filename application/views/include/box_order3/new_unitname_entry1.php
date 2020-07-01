 

      <div class="container-fluid internal_title"><strong>Add Unit Name</strong></div>
      
      <form role="form" id="unitname_entr_from" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/unit_name_save">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-6">
		   <div class="input-group input-group-lg">
		   <span class="input-group-addon">Name: </span>
		   <input required="required" id="unite_nam" autofocus="autofocus" type="text" name="unitName" class="form-control" placeholder="Unit Name">
		   </div>
       </div>
       <div class="col-md-6">
       </div>
       
       </div>
       <div class="seperat15"></div>

       
       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_unite_type"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_unitentryBox" class="btn btn-default btn-lg"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>