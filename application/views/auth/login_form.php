<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>




<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			  
			  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			  <title>Login Form of KidzVilla Restaurant Management Sysytem</title>
			  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login_form.css">
			  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		</head>
		<body>
		  <section class="container">
			<div class="login">
			  <h1>Please Login First</h1>
			  
			 <?php echo form_open($this->uri->uri_string()); ?>
			 
				<p><input type="text" name="login" value="" placeholder="Username or Email" onfocus="this.value=\'\'" ></p>
				<p><input type="password" name="password" value="" placeholder="Password" onfocus="this.value=\'\'" ></p>
				<?php 
                    if($try)
                    {
                  ?>
                        <div class = "wrong_messege_view"> *invalide username or password </div>
				   <?php
                    }
				  ?>
				<p class="remember_me">
				  <label>
					<input type="checkbox" name="remember_me" id="remember_me">
					Remember me on this computer
				  </label>
				</p>
				<p class="submit"><input type="submit" name="submit" value="Let Me In"></p>
			  
			</div>
			<?php echo form_close();?>
			<div class="login-help">
			  <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
			</div>
			<div id="copyright">
				<p>
					&copy;
					<b>POS </b>
					is Powered by
					<a target="blank" href="http://www.itlabsolutions.com">IT Lab Solutions.</a>
				</p>
	  		</div> <!-- end of copyright-->	
		  </section>
		</body>
</html>
