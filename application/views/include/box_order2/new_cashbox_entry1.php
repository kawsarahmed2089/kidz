	<div class="container-fluid internal_title"><strong>Cash Box Entry</strong></div>
      
      <form role="form" id="cash_box_entr_froms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/cash_box_entr_save">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-lg">
       <span class="input-group-addon">Opening Cash: </span>
       <input required="required" id="opening_valu" autofocus="autofocus" type="number" name="opening_cash" class="form-control">
       </div>
       </div>
       </div>

       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_cash_box_entr"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_cash_box_entry" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>