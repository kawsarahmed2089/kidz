      <form role="form" id="type_room" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/room_type_save">
      <div class="container-fluid internal_title"><strong>New Room Type</strong></div>
      
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-sm">
       <span class="input-group-addon">Name: </span>
       <input required="required" autofocus="autofocus" type="text" name="roomTypeName" id="roomTypeName" class="form-control" placeholder="Type Name">
       </div>
       </div>
       
       </div>
       <div class="seperat15"></div>
       <div class="row">
       
       <div class="col-md-6">
       <div class="input-group input-group-sm">
       <span class="input-group-addon">Min Adults: </span>
       <input name="min_adults" type="number" class="form-control" placeholder="" min="0">
       </div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-sm">
       <span class="input-group-addon">Min Children: </span>
       <input type="number" name="min_child" class="form-control" placeholder="" min="0">
       </div>

       </div>
       
       </div>
       
       <div class="seperat15"></div>
       <div class="row">
       
       <div class="col-md-6">
       <div class="input-group input-group-sm">
       <span class="input-group-addon">Max Adults: </span>
       <input type="number" name="max_adults" class="form-control" placeholder="" min="0">
       </div>

       </div>
       <div class="col-md-6">
       <div class="input-group input-group-sm">
       <span class="input-group-addon">Max Children: </span>
       <input type="number" name="max_child" class="form-control" placeholder="" min="0">
       </div>

       </div>
       
       </div>
       <div class="seperat15"></div>
        <div class="row">
       <div class="col-md-2">
       <div class="seperat5"></div>
       Discription:
       </div>
       <div class="col-md-10">
       <textarea class="form-control tex_areasige" name="roomTypeBasicDescription" ></textarea>
       </div>
       </div>

       
       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="typ_entry_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-default btn-sm" id="typ_entry_cencel"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>