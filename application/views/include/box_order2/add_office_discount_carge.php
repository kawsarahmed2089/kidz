	<div class="container-fluid internal_title"><strong>Discount Charge Entry</strong></div>
      
      <form role="form" id="discoun_chrge_entr_froms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/discoun_chrge_entr_save">
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       	   
		<div class="row">
			<div class="col-md-12">
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="">Discount Type: </span>
						<div class="btn-group" data-toggle="buttons" id="radio_check_discount" >
						  <label class="btn btn-danger btn-lg active" id="disnt_amount_check">
							<input type="radio" name="discount_type" value="0" checked="checked"/> Amount
						  </label>
						  <label class="btn btn-danger btn-lg" id="disnt_percent_check">
							<input type="radio" name="discount_type" value="1"/> Percentage
						  </label>
						</div>
				</div>
			</div>
		</div>
	   <div class="seperat15"></div>
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-lg">
       <span class="input-group-addon" id="kawsarr">Discount Amount: </span>
       <input required="required" id="discoun_charg_valu" autofocus="autofocus" name="discoun_charge" class="form-control">
       </div>
       </div>
       </div>

       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_discou_charg_entr"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_discount_chrge_entry" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>