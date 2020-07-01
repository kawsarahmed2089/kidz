 

      <div class="container-fluid internal_title"><strong>Setup Seassion</strong></div>
      
      <form role="form" id="seassion_edifrom" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/seassion_edisv">
      <input type="hidden" id="session_edi_keys" name="edi_key" />
      <div class="container-fluid internal_box2 internal_fistb">
       <div class="seperat5"></div>
       
       <div class="row">
       
       <div class="col-md-12">
       <div class="input-group input-group-sm">
       <span class="input-group-addon"> Seassion Name: </span>
       <input required="required" id="seasonOfferName_edi" name="seasonOfferName" autofocus="autofocus" type="text" class="form-control" placeholder="Seassion Name">
       </div>
       </div>
       
       </div>
       <div class="seperat15"></div>
       
       <div class="row">
          <div class="col-md-6">
          
           <div class="input-group input-group-sm">
           <span class="input-group-addon"> Seassion Start: </span>
           <input required="required" id="startDate_edi" name="startDate" type="text" class="form-control" placeholder="Pick Date">
           </div>
           
          </div>

          
          <div class="col-md-6">
          
           <div class="input-group input-group-sm">
           <span class="input-group-addon"> Seassion End: </span>
           <input required="required" id="endDate_edi" name="endDate" type="text" class="form-control" placeholder="Pick Date">
           </div>
          
          </div>

       </div>
       
       <div class="row">
       
       <div class="col-md-12"><hr style="margin: 10px auto;" /></div>

       </div>
       
       <div class="row">
       <div class="col-md-8">       
       <div class="input-group input-group-sm">
       <span class="input-group-addon"> Seassion Discount: </span>
       <input required="required" id="roomRateDiscountPercent_edi" name="roomRateDiscountPercent" type="number" min="0" class="form-control" placeholder="Discount Rate">
       <span class="input-group-addon">
       <select>
	    <option value="persent">%</option>
	    <!--<option value="money">$</option>-->
        </select>
       </span>
       </div>
       </div>
       <div class="col-md-4">
       <div class="seperat5"></div>
       <strong>Status:</strong><span id="status_sesion"> Not Active</span>
       </div>
       </div>

       
       <div class="seperat15"></div>
        <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="msg_sessionedi"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="cencel_ediseassion" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Cencel</button>
       <div class="seperat5"></div>
       </div>

       </div>
       </div>
       
      </form>