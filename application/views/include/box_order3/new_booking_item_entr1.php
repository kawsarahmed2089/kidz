<?php $item_name = array(
						''=>'Select an Item',
						'Plain Polao'=>'Plain Polao',
						'Rice'=>'Rice',
						'Chicken Roast'=>'Chicken Roast',
						'Mixed Vagetable'=>'Mixed Vagetable',
						'Plain Daal'=>'Plain Daal',
						'Daal with Chicken'=>'Daal with Chicken',
						'Beef Bhuna'=>'Beef Bhuna',
						'Mutton Kurma'=>'Mutton Kurma',
						'Mutton Bhuna'=>'Mutton Bhuna',
						'Kabab'=>'Kabab',
						'Rui Fish'=>'Rui Fish',
						'Salad'=>'Salad',
						'Firni'=>'Firni',
						'Yogurt'=>'Yogurt',
						'Mineral Water'=>'Mineral Water',
						'Soft Drinks'=>'Soft Drinks'
						);
					
?>
	  <div class="container-fluid internal_title"><strong>New Booking Item Entry</strong></div>
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="bookin_item_enntr_from2" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/booking_item_menu_save">
		<input type="hidden" id="show_booking_item_menu_link" value="<?php echo base_url();?>index.php/site_controller/show_booking_item_menu_link">
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 1:</span>
          <!-- <input type="text" name="item1" class="form-control"/> -->
			<?php
		    	echo form_dropdown('item1', $item_name,'', 'class="form-control sel_box mybxt0"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 2:</span>
          <!-- <input type="text" name="item2" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item2', $item_name,'', 'class="form-control sel_box mybxt1"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 3:</span>
          <!-- <input type="text" name="item3" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item3', $item_name,'', 'class="form-control sel_box mybxt2"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 4:</span>
          <!--<input type="text" name="item4" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item4', $item_name,'', 'class="form-control sel_box mybxt3"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 5:</span>
          <!--<input type="text" name="item5" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item5', $item_name,'', 'class="form-control sel_box mybxt4"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 6:</span>
          <!--<input type="text" name="item6" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item6', $item_name,'', 'class="form-control sel_box mybxt5"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 7:</span>
          <!--<input type="text" name="item7" class="form-control"/> -->
		  <?php
		    	echo form_dropdown('item7', $item_name,'', 'class="form-control sel_box mybxt6"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 8:</span>
          <!--<input type="text" name="item8" class="form-control"/> -->
			<?php
		    	echo form_dropdown('item8', $item_name,'', 'class="form-control sel_box mybxt7"  onchange="disable_sel(this.value);" ');
		    ?>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 9:</span>
          <input type="text" name="item9" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 10:</span>
          <input type="text" name="item10" class="form-control"/>
        </div>
       </div>
       </div>
       <div class="seperat5"></div>
       <div class="row">
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 11:</span>
          <input type="text" name="item11" class="form-control"/>
        </div>
       </div>
       <div class="col-md-6">
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Item 12:</span>
          <input type="text" name="item12" class="form-control"/>
        </div>
       </div>
       </div>
	   
	   <div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span class="item_log_entr_msg"></span>
       </div>
       <div class="col-md-5 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
       <button type="reset" id="booking_item_menu_entr_close2" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>