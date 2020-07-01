<!DOCTYPE html>
<html lang="en">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
	  <meta property="og:site_name" content="Hover.css"/>
	  <meta property="og:title" content="Hover.css - A collection of CSS3 powered hover effects" />
   
      
	  <link rel="icon" href="<?php echo base_url(); ?>/assets/element_image/favicon.ico"  type="image/x-icon"/>
      <title><?php echo $this->tank_auth->get_hotel_name();?></title>
      <!--all CSS-->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	  <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>assets/my.css" rel="stylesheet" type="text/css">
	  
	  	<link href="<?php echo base_url(); ?>assets/css/demo-page.css" rel="stylesheet" media="all">
		<link href="<?php echo base_url(); ?>assets/css/hover.css" rel="stylesheet" media="all">
	  
		<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" media="all">
		<!-- <link href="<?php //echo base_url(); ?>assets/css/select/select2.min.css" rel="stylesheet"> -->
	    <script src="<?php echo base_url(); ?>assets/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/sweetalert.css"/>
	  <!-- For Data Table Css-->
      <!--all CSS-->
   </head>
   <body class="f_body" id="f_body">
   <div class="npbox" id="np"></div>
   <!-- Menue -->
   
      <!-- Box level 3 -->
      <div class="box_3_back" id="bb3"></div>
      <div class="box_3" id="for_box3">
      <div class="box_3_title" id="for_box3_title"> &nbsp;&nbsp;<span id="for_b3title"></span><div class="box3_cross" id="cross3"><i class="fa fa-times"></i></div></div>
      <div class="box_3_cotent">
      <div class="box_3_cotent_in">

	  			<div class="new_category_entry" id="new_category_entry1">
				<?php include ('box_order2/new_category_entry1.php'); ?>
				</div>
				<div class="new_unitname_entry" id="new_unitname_entry1">
				<?php include ('box_order3/new_unitname_entry1.php'); ?>
				</div>
				<div class="new_options_entry" id="add_service_charg">
					<?php include ('box_order2/add_service_charg1.php'); ?>
				</div>
				<div class="new_options_entry" id="add_office_discount_carge">
					<?php include ('box_order2/add_office_discount_carge.php'); ?>
				</div>
				<div class="new_options_entry" id="add_payment_carge">
					<?php include ('box_order2/add_payment_charge.php'); ?>
				</div>
				<div class="new_product_entry" id="new_catering_log_entr1">
					<?php include ('box_order3/new_catering_log_entr1.php'); ?>
				</div>
				<div class="new_product_entry" id="new_booking_item_entr1">
					<?php include ('box_order3/new_booking_item_entr1.php'); ?>
				</div>
				<div class="new_product_entry" id="new_booking_other_entr1">
					<?php include ('box_order3/new_booking_other_entr1.php'); ?>
				</div>
				<div class="new_product_entry" id="booking_other_menu_edit1">
					<?php include ('box_order3/booking_other_menu_edit1.php'); ?>
				</div>
				<div class="new_product_entry" id="new_booking_item_edit1">
					<?php include ('box_order3/new_booking_item_edit1.php'); ?>
				</div>
      </div>
      </div>
      </div>
   <!-- Box level 3 -->

   
   
   <!-- Box level 2 -->
      <div class="box_2_back" id="bb2"></div>
      <div class="box_2" id="for_box2">
      <div class="box_2_title" id="for_box2_title"> &nbsp;&nbsp;<span id="for_b2title"></span><div class="box2_cross" id="cross2"><i class="fa fa-times"></i></div></div>
      <div class="box_2_cotent">
      <div class="box_2_cotent_in">
      
			<div class="new_product_entry" id="new_product_entry1">
				<?php include ('box_order2/new_product_entry1.php'); ?>
			</div>
			<div class="new_category_entry" id="new_category_edit1">
				<?php include ('box_order2/new_category_edit1.php'); ?>
			</div>
			<div class="new_package_entry" id="new_package_entry1">
				<?php include ('box_order2/new_package_entry1.php'); ?>
			</div>
			<div class="new_product_entry" id="new_product_edit1">
				<?php include ('box_order2/new_product_edit1.php'); ?>
			</div>
			<div class="add_new_sale_info" id="add_new_sale_order_info1">
				<?php include ('box_order2/add_new_sale_order_info1.php'); ?>
			</div>
			<div class="add_new_sale_info" id="update_new_sale_order_info1">
				<?php include ('box_order2/update_new_sale_order_info1.php'); ?>
			</div>
			<div class="new_table_entry" id="new_table_entry1">
				<?php include ('box_order2/new_table_entry1.php'); ?>
			</div>
			<div class="new_table_entry" id="new_table_edit1">
				<?php include ('box_order2/new_table_edit1.php'); ?>
			</div>
			<div class="new_table_entry" id="new_table_join1">
				<?php include ('box_order2/new_table_join1.php'); ?>
			</div>
			<div class="new_options_entry" id="new_options_entry1">
				<?php include ('box_order2/new_options_entry1.php'); ?>
			</div>
			<div class="new_options_entry" id="new_options_editt1">
				<?php include ('box_order2/new_options_editt1.php'); ?>
			</div>
			<div class="quantity_prep_entry" id="quantity_prep_entry1">
				<?php include ('box_order2/quantity_prep_entry1.php'); ?>
			</div>
			<div class="quantity_prep_entry" id="quantity_prep_editt1">
				<?php include ('box_order2/quantity_prep_editt1.php'); ?>
			</div>
			<div class="expense_entry" id="expense_entry1">
				<?php include ('box_order2/expense_entry1.php'); ?>
			</div>
			<div class="expense_entry" id="expense_edit1">
				<?php include ('box_order2/expense_edit1.php'); ?>
			</div>
			<div class="booking_entry" id="booking_entry1"  style="overflow-y: scroll;">
				<?php include ('box_order2/booking_entry1.php'); ?>
			</div>
			<div class="booking_entry" id="booking_edits1"  style="overflow-y: scroll;">
				<?php include ('box_order2/booking_edits1.php'); ?>
			</div>
			<div class="expense_entry" id="stuff_entry1">
				<?php include ('box_order2/stuff_entry1.php'); ?>
			</div>
			<div class="expense_entry" id="stuff_edit1">
				<?php include ('box_order2/stuff_edit1.php'); ?>
			</div>
			<div class="expense_entry" id="entertain_entry1">
				<?php include ('box_order2/entertain_entry1.php'); ?>
			</div>
			<div class="expense_entry" id="entertain_edit1">
				<?php include ('box_order2/entertain_edit1.php'); ?>
			</div>
			<div class="stock_entry" id="stock_entry1">
				<?php include ('box_order2/stock_entry1.php'); ?>
			</div>
			<div class="stock_entry" id="catering_entry1">
				<?php include ('box_order2/catering_entry1.php'); ?>
			</div>
			<div class="catering_edit1" id="catering_edit1">
				<?php include ('box_order2/catering_edit1.php'); ?>
			</div>
			<div class="catering_log_view" id="catering_log1">
				<?php include ('box_order2/catering_log1.php'); ?>
			</div>
			<div class="stock_entry" id="usage_resource_entr1">
				<?php include ('box_order2/usage_resource_entr1.php'); ?>
			</div>
			<div class="new_options_entry" id="cancel_order_reason1">
				<?php include ('box_order2/add_order_cancel_reason.php'); ?>
			</div>
			<div class="new_caash_entry" id="new_cashbox_entry1">
				<?php include ('box_order2/new_cashbox_entry1.php'); ?>
			</div>
			<div class="new_caash_edit" id="new_cashbox_edit1">
				<?php include ('box_order2/new_cashbox_edit1.php'); ?>
			</div>
			<div class="order_bill_entry" id="order_bill_entry1">
				<?php include ('box_order2/order_billl_entry1.php'); ?>
			</div>
			<div class="new_entertainment_form" id="report_summ_form_view1">
				<?php include ('box_order2/report_summ_form_view1.php'); ?>
			</div>
			<div class="new_entertainment_form" id="expens_summ_form_view1">
				<?php include ('box_order2/expens_summ_form_view1.php'); ?>
			</div>
			<div class="open_sales_id" id="open_sales_id1">
				<?php include ('box_order2/open_sales_id1.php'); ?>
			</div>
			<div class="new_entertainment_form" id="new_entertainment_form">
				<?php include ('box_order2/new_entertainment_form.php'); ?>
			</div>
			<div class="new_entertainment_form" id="new_stuf_summery_form">
				<?php include ('box_order2/new_stuf_summery_form.php'); ?>
			</div>
			<div class="new_entertainment_form" id="new_due_summery_form">
				<?php include ('box_order2/new_due_summery_form.php'); ?>
			</div>
			<div class="new_entertainment_form" id="new_room_credit_from1">
				<?php include ('box_order2/new_room_credit_from1.php'); ?>
			</div>
			<div class="new_entertainment_form" id="catering_item_log_from1">
				<?php include ('box_order2/catering_item_log_from1.php'); ?>
			</div>
			<div class="new_compliment_form" id="new_complmen_summery_form">
				<?php include ('box_order2/new_complmen_summery_form.php'); ?>
			</div>
			<div class="new_servtoken_form" id="new_servtoken_form">
				<?php include ('box_order2/new_servtoken_form.php'); ?>
			</div>
			<div class="new_servtoken_form" id="invoice_reali_form1">
				<?php include ('box_order2/invoice_realize_form.php'); ?>
			</div>
			<div class="new_invoiceid_form" id="new_invoiceid_form">
				<?php include ('box_order2/new_invoiceid_form.php'); ?>
			</div>
			<div class="new_table_split" id="table_split1">
				<?php include ('box_order2/table_split1.php'); ?>
			</div>
			<div class="salary_entry" id="salary_entry1">
				<?php include ('box_order2/salary_entry1.php'); ?>
			</div>
			<div class="salary_entry" id="salary_edite1">
				<?php include ('box_order2/salary_edite1.php'); ?>
			</div>
			<div class="booking_entry" id="transaction_entry1">
				<?php include ('box_order2/transaction_entry1.php'); ?>
			</div>
			<div class="new_compliment_form" id="product_sale_log_from1">
				<?php include ('box_order2/product_sale_log_from1.php'); ?>
			</div>

      </div>
      </div>
      </div>
   <!-- Box level 2 -->
   
   
      <!-- Box level 1 -->
      <div class="box1" id="mybox">
      <div class="box_title" id="box_title"><span id="for_wtitle"></span><div id="cross" class="box_cross"><i class="fa fa-times"></i></div></div>
      <div class="box_content">
      <div class="in_conbox" id="in_boxcon">  
         <!-- for box content-->

	<!---------------  END Alarming Menu  ------------->
      
			<div class="pos_terminal" id="pos_terminal1">
				Pos Terminal
				<?php include ('box_order1/pos_terminal1.php'); ?>
			</div>
			<div class="sale_info" id="sale_info1">
				<?php include ('box_order1/sale_info1.php'); ?>
			</div>
			<div class="invoice_info" id="invoice_info1">
				<?php include ('box_order1/invoice_info1.php'); ?>
			</div>
			<div class="product_info" id="product_info1">
				<?php include ('box_order1/product_info1.php'); ?>
			</div>
			<div class="package_products" id="package_products1">
				<?php include ('box_order1/package_products1.php'); ?>
			</div>
			<div class="product_catagories" id="product_catagories1">
				<?php include ('box_order1/product_catagories1.php'); ?>
			</div>
			<div class="table_layout" id="table_layout1">
				<?php include ('box_order1/table_layout1.php'); ?>
			</div>
			<div class="preparation_options" id="preparation_options1">
				<?php include ('box_order1/preparation_options.php'); ?>
			</div>
			<div class="expense_system" id="expense_system1">
				<?php include ('box_order1/expense_system1.php'); ?>
			</div>
			<div class="stock_system" id="stock_system1">
				<?php include ('box_order1/stock_system1.php'); ?>
			</div>
			<div class="cash_boxes" id="catering_items1">
				<?php include ('box_order1/catering_items1.php'); ?>
			</div>
			<div class="stock_system" id="usage_resource1">
				<?php include ('box_order1/usage_resource1.php'); ?>
			</div>
			<div class="cash_boxes" id="cash_boxes1">
				<?php include ('box_order1/cash_boxes1.php'); ?>
			</div>
			<div class="order_cancl_reason" id="order_cancl_raeson1">
				<?php include ('box_order1/order_cancl_raeson1.php'); ?>
			</div>
			<div class="login_form1" id="login_form1">
				<?php include ('box_order1/login_form1.php'); ?>
			</div>
			<div class="report_info" id="report_info1">
				<?php include ('box_order1/report_info1.php'); ?>
			</div>
			<div class="salary_info" id="salary_log1">
				<?php include ('box_order1/salary_log1.php'); ?>
			</div>
			<div id="stay_list1" class="stay_list">
			  <?php include ('box_order1/stay_list1.php'); ?> 
			</div>
			<div id="stuff_setup1" class="expense_system">
			  <?php include ('box_order1/stuff_setup1.php'); ?> 
			</div>
			<div id="entertain_setup1" class="expense_system">
			  <?php include ('box_order1/entertain_setup1.php'); ?> 
			</div>
			<div class="booking_info" id="booking_info1">
				<?php include ('box_order1/booking_info1.php'); ?>
			</div>
			<div class="booking_info" id="credit_transactions1">
				<?php include ('box_order1/credit_transactions1.php'); ?>
			</div>
			<div id="tavle_designs1" class="tavle_designs">
			  <?php include ('box_order1/tavle_designs.php'); ?> 
			</div>
      <!-- for box content-->
      </div>
      </div>
      </div>
       <!-- Box level 1 -->







   <!-- Menue -->
   <!-- Secound Menue -->
   
 <div class="container-fluid" id="scond_menue">
 <div class="row">
	 <div class="col-md-12">
		<h1><?php echo $this->tank_auth->get_hotel_name();?> POS</h1>
	 </div>
 </div>
 <div class="row">
 <div class="col-md-12">
 <div class="btn-group btn-group-lg for_1button">
	<div class="item_menu_main">
	<div class="item_menu">
		<div class="sales_item">
		

		
		
		
		
		
			<h3>Sales</h3>
			<div><img class="arrow_img2" src="<?php echo base_url();?>assets/element_image/left-arrow-key.png"></div>
			<button id="pos_terminal" title="POS Terminal" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/pos.png"></button>
			<button id="invoice_info" title="Invoice Info" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/invoice_info.png"></button><br />
			<button id="report_infos" title="Reports" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/report_info.png"></button>
			<button id="credit_transactions" title="Credit Transactions" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/credit_transactions.png"></button>
		</div>
		<div class="sales_item">
			<h3>Catalogue</h3>
			<button id="product_catagories" title="Prooduct Catagories" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/product_categories.png"></button>
			<button id="product_info" title="Products" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/products.png"></button><br />
			<button id="package_products" title="Package Products" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/package_products.png"></button>
			<button id="table_layout" title="Table Layout" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/tables.png"></button>
			<div><img class="arrow_img" src="<?php echo base_url();?>assets/element_image/left-arrow-key.png"></div>
		</div>
		
		<div class="sales_item" id="right-side">
			<h3>Hostelry</h3>
			<div class="right-show">
				<button id="preparation_options" title="Preparation Options" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/preparation.png"></button>
				<button id="expense_entry" title="Expense Show" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/expense_entry.png"></button>
			</div>
			<div class="right-hiden">
				<button id="salary_log" title="Salary Log" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/salary_log.png"></button>
				<button id="booking_info" title="Booking Info" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/booking_info.png"></button>
				
				<button id="entertain_info" title="Booking Info" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/entertainment.png"></button> 
			</div>

			<div class="right-show">
				<button id="stock_system" title="Stock Show" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/stock_view.png"></button>
				<button id="cashbox_system" title="Cash Box" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/cash_box.png"></button>
			</div>
			<div class="right-hiden">
				<button id="order_cancl_raeson" title="Order Cancel Reason" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/cancel_reason.png"></button>
				<button id="stuff_setup" title="Stuff Setup" type="button" class="hvr-bounce-to-right"><img src="<?php echo base_url();?>assets/element_image/stuff_setup.png"></button>
			</div>
		</div>
	</div>
	</div>
	 </div>
	</div>
  </div>
	<div class="row">
	<div class="col-md-12">
	<input type="hidden" id="logout_link" value="<?php echo base_url();?>index.php/auth/logout">
	<input type="hidden" id="refresh_link" value="<?php echo base_url();?>index.php/site_controller/main_site">
	<input type="hidden" id="user_type_link" value="<?php echo $user_type;?>">
	<input type="hidden" id="user_access_auth_link" value="<?php echo base_url().'index.php/site_controller/check_access_auth';?>">
	<input type="hidden" id="base_url_link" value="<?php echo base_url();?>index.php/">

	<div id="logout_id" class="logout_id" title="Logout"><img src="<?php echo base_url();?>assets/element_image/logout2.png"/></div>
	<div id="refresh_id" class="logout_id" title="Refresh"><img src="<?php echo base_url();?>assets/element_image/refresf.png"/></div>
  	<script>
		/*  $(function(){
			 $('input[type=text],textarea').keyboard();
			 $('input[type=number], input[type=password]')
				.keyboard({
					layout : 'num',
					restrictInput : true, // Prevent keys not in the displayed keyboard from being typed in
					preventPaste : true,  // prevent ctrl-v and right click
					autoAccept : true
				})
				.addTyping();
		}); */ 
		
	</script>
  
  
  
  
  
  


 </div>
 </div>
   <div class="scripts_div">
	  <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.js"></script>
	  <!--<script src="<?php //echo base_url(); ?>assets/js/select/select2.full.js"></script> -->
      <script src="<?php echo base_url(); ?>assets/for_ajax.js"></script>
	  <script src="<?php echo base_url(); ?>assets/my.js"></script>
	  <script src="<?php echo base_url(); ?>assets/js/datetimepicker_css.js"></script>
	  
      <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.filtertable.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
	  
	  <!-- select2 -->
	  
	  
	  
	  
	  
	  
	  	<!-- jQuery & jQuery UI + theme (required) -->
		
	<!--<link href="<?php //echo base_url(); ?>assets/css/for_keyboard/jquery-ui.min.css" rel="stylesheet"> -->
	
	<!-- keyboard widget css & script (required) -->
	<link href="<?php echo base_url(); ?>assets/css/for_keyboard/keyboard.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/for_keyboard/jquery.keyboard.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/for_keyboard/demo.js"></script>

   </div>

   </body>
</html>