 <div class="container-fluid internal_title"><strong>Login Form</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
       <form role="form" id="login_pos_term_forms" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>index.php/site_controller/login_for_pos_terminal">
       <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Username: </span>
		  <input type="text" id="login_usernme" name="login" class="form-control" placeholder="Username">

		</div>
       </div>
       </div>
	   <div class="seperat15"></div>
       <div class="row">
       <div class="col-md-12">
       <div class="input-group input-group-lg">

		  <span class="input-group-addon">Password: </span>
		  <input type="password" id="login_userpasswrd" name="password" class="form-control" placeholder="Password">

		</div>
       </div>
	   <div class="col-md-6">
	   
	   </div>
       </div>
		<div class="seperat15"></div>
      <div class="row border_bottom border_top">
       
       <div class="col-md-6 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
       <div class="seperat5"></div>
       <span id="login_updat_msge"></span>
       </div>
       <div class="col-md-6 text-right">
       <div class="seperat5"></div>
       <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> Let Me In</button>
       <button type="reset" class="btn btn-danger btn-lg" id="login_form_info_close"><i class="fa fa-times"></i> Cancel</button>
       <div class="seperat5"></div>
       </div>

       </div>

       </form>
       </div>