     <div class="container-fluid internal_title"><strong>Edit The Cash Box</strong></div>
      
       <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="edicashbox_entry_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/cashbox_edite">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Opening Cash: </span>
		  <input type="number" id="openin_cash_edit" name="opening_cash" class="form-control" placeholder="Opening Cash">
		</div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">1000 * : </span>
		  <input type="number" id="thousand_cash_edi" name="thousand" class="form-control" >
		</div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">500 *: </span>
		  <input type="number" id="five_hundred_cash_edi" name="five_hundred_cash_edi" class="form-control" >
		</div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">100 *: </span>
		  <input type="number" id="one_hundred_cash_edi" name="one_hundred_cash_edi" class="form-control" >
		</div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">50 *: </span>
		  <input type="number" id="fifty_cash_edi" name="fifty_cash_edi" class="form-control" >
		</div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">20 *: </span>
		  <input type="number" id="twenty_cash_edi" name="twenty_cash_edi" class="form-control" >
		</div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">10 *: </span>
		  <input type="number" id="ten_cash_edi" name="ten_cash_edi" class="form-control" >
		</div>
       </div>
       </div>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">5 *: </span>
		  <input type="number" id="five_cash_edi" name="five_cash_edi" class="form-control" >
		</div>
       </div>
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">2 *: </span>
		  <input type="number" id="two_cash_edi" name="two_cash_edi" class="form-control" >
		</div>
       </div>
       </div>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">1 *: </span>
		  <input type="number" id="one_cash_edi" name="one_cash_edi" class="form-control">
		</div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
		  <span class="input-group-addon">Not Edit Future: </span>
		  <input type="checkbox" id="not_edit_fuure_check" name="future_edit" class="form-control">
		</div>
       </div>
       </div>

       <div class="seperat5"></div>
	   <div class="row">
       <div class="col-md-3">
	   <div class="input-group input-group-lg">
		<button href="#" id="equal_closing_cash" class="btn btn-warning btn-lg"><i class="glyphicon glyphicon-ok"></i> Equal To</button>
		</div>
	   </div>
	   <div class="col-md-8">
	   <div class="input-group input-group-lg">
	   <input type="number" id="closing_cash_edit" name="" class="form-control" readonly/>
	   </div>
	   </div>
	   </div>
	   <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-lg">
		  <span class="input-group-addon">Closing Cash: </span>
		  
		  <input type="number" id="closing_cash_valu" name="closing_cash" class="form-control">
		</div>
       </div>
       </div>
	  <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="edicash_box_entry_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <input type="hidden" id="edicashbox_id" name="cashbox_edi_key" />
	   <input type="hidden" id="edinot_future_id" name="edinot_future_id" />
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" class="btn btn-danger btn-lg" id="cashbox_edite_cencel"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>
  