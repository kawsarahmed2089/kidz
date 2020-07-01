  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Open Sale</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
	<input type="hidden" id="open_sales_info_swow" value="<?php echo base_url();?>index.php/site_controller/open_sale_order_info_show">
	
      <div class="row" style="margin: 10px;">
			<div id="myopensales" class="for_room_table">

			</div>
      </div>
		<div class="seperat3"></div>
         <div class="row border_bottom border_top">
			 <div class="seperat3"></div>
			 <div class="col-md-9" id="open_aion_msg" style="overflow:hidden;font-size:13px; line-height:30px;"></div>
			 <div class="col-md-3 text-right">
			 <div class="btn-group">
			 <button type="button" class="btn btn-danger btn-lg" id="open_sale_info_close"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
	</div>