<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class login_controller extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->library('tank_auth');
			$this->output->set_header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->is_logged_in();
			$this -> load -> model('login_model');
			//$this -> load -> model('report_model');
			//$this -> load -> model('access_control_model');
		}

		public function is_logged_in()
		{
			$this->load->library('tank_auth');
			if(!$this->tank_auth->is_logged_in())
			{
				redirect('auth/login');
			}
		}

		public function index()
		{
			/*$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();
			$timezone = "Asia/Dhaka";
			date_default_timezone_set($timezone);
			$data['bd_date'] = date ('Y-m-d');
			$data[ 'sale_price_info' ] = $this -> report_model -> specific_date_sale_price_calculation(  $data['bd_date']  ,  $data['bd_date']  );
		    $data[ 'buy_price_info' ] = $this -> report_model -> specific_date_buy_price_calculation(  $data['bd_date']  ,  $data['bd_date'] );
		    $data[ 'cash_info' ] = $this -> report_model -> specific_date_cash_calculation( $data['bd_date']  ,  $data['bd_date']  );
		    $data[ 'purchase_info' ] = $this -> report_model -> specific_date_purchase_amount_calculation( $data['bd_date']  ,  $data['bd_date']  );
			$this -> load -> view('include/home', $data);*/
		
			redirect('site_controller/main_site');
		}
		
		/************************************
		* General User Information         **
		*************************************/
		function user_information()
		{
			$data['user_type'] = $this->tank_auth->get_usertype();

			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();
			$data['sale_status'] = '';
			$data['status'] = '';
			$data['user_info'] = $this -> login_model -> all_general_user();
			$data['specific_user'] = $this -> login_model -> specific_user( $this -> uri -> segment(3) );
			$data['alarming_level'] = $this -> report_model -> product_under_alarming_level();
			$data['tricker_content'] = 'tricker_registration_view';
			$data['main_content'] = 'user_information_view';
			$this -> load -> view('include/template', $data);
		}

	}