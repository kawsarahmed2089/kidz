  <?php $bd_date = date('Y-m-d',time());?>
 <div class="container-fluid internal_title"><strong>Table Splitting</strong></div>      
    <div class="container-fluid internal_box2 internal_fistb">
	<form role="form" id="new_table_splited" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/tavle_splitting">
      <div class="row" style="margin: 10px;">
		   <div class="col-md-12">
			   <div class="input-group input-group-lg">
			   
				 <span class="input-group-addon">Select Table: </span>
				  <select class="form-control" name="table_id" id="tableselect_split">
				  </select>
				  <span class="input-group-btn">
				  </span>
			   </div>
		   
		   </div>
      </div>
	  <div class="row" style="margin: 10px;">
		   <div class="col-md-12">
			   <div class="input-group input-group-lg">
			   
				 <span class="input-group-addon">Number of Part: </span>
				  <input type="number" name="table_part" id="numbeerssofpart" class="form-control">
				  <span class="input-group-btn">
				  </span>
			   </div>
		   
		   </div>
      </div>
	  <!--
	  <div class="row" style="margin: 10px;">
		   <div class="col-md-12">
			   <div class="input-group input-group-lg">
			   
				 <span class="input-group-addon">New Table Names: </span>
				  <span id="new_tabble_name">
				  </span>
			   </div>
		   
		   </div>
      </div> -->
		<div class="seperat3"></div>
		  <div class="row border_bottom border_top">
		   
			   <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
			   <div class="seperat5"></div>
			   <span id="tavlee_split_msage"></span>
			   </div>
			   <div class="col-md-5 text-right">
			   <div class="seperat5"></div>
			   <button type="submit" id="tavle_split_save" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Save</button>
			   <button type="reset" class="btn btn-danger btn-lg" id="tabl_split_close"><i class="fa fa-times"></i> Cancel</button>
			   <div class="seperat5"></div>
			   </div>

		   </div>
		 </form>
	</div>