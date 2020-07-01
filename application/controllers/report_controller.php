<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Report_controller extends CI_controller{
		public function __construct()
		{
			parent::__construct();
			$this->output->set_header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->is_logged_in();
			//$this -> load -> model('expense_invoice_model');
			//$this -> load -> model('product_model');
			$data['user_type'] = $this->tank_auth->get_usertype();
			//$this -> load -> model('my_variables_model');
			//$this -> load -> model('access_control_model');
			$this -> load -> model('report_model');
			$this -> load -> model('dbm_model');
			//$this -> load -> model('sale_model');
			$timezone = "Asia/Dhaka";
			date_default_timezone_set($timezone);
		}

		public function is_logged_in()
		{
			$this->load->library('tank_auth');
			if(!$this->tank_auth->is_logged_in())
			{
				redirect('auth/login');
			}
		}
		
		/*************************************** 
		 * Creating An Invoice for Print Purpose
		 ***************************************/
		function generate_invoice( $order_selected='',$finish_invoice='' )
		{
		
			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();
			$product_info = '';
			$bd_date = date('Y-m-d');
			$data['running'] = '';
			$ref_id = '';

			$this->load->model('dbm_model');
	  
			$order_info = $this->dbm_model->order_info_show_on_receipt($order_selected);
			foreach ($order_info->result() as $rw) {
			$data['invoice_id'] = $rw->order_id;
			$data['client_id'] = $rw->client_id;
			$data['contact_number'] = $rw->contact_number;
			$data['invoice_creator'] = $rw->username;
			$data['invoice_doc'] = $rw->doc;
			$data['customer_name'] = $rw->client_name;
			
			$data['discount_amount'] = $rw->discount_amount;
			$data['service_charge'] = $rw->service_charge;
			$data['paid_amount'] = $rw->paid_amount;
			$data['grand_total'] = $rw->grand_total;
			$data['order_type'] = $rw->order_type;
			$data['running'] = $rw->running;
			}
	  
			$product_info = $this->dbm_model->generate_invoice($order_selected);
			$total_amount=0;
			$product_inf=array();
			$row_array['discount_type'] = 0;
			$row_array['discounts_value'] = 0;
			
            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
				$row_array['order_id'] = $row->order_id;
				$row_array['order_details_id'] = $row->order_details_id;
                $row_array['product_name'] = $row->product_name;
				$row_array['unitName'] = $row->unitName;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['quantity'] = $row->quantity;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['discounts_value'] = $row->discounts_value;
				//$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['comments'] = $row->comments;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
				$row_array['prep_comment'] = $row->prep_comment;
				$row_array['total'] = $row->quantity * $row->sale_price;
				$row_array['option_name'] = $this->dbm_model->get_option_name($row->product_id,$row->order_id,$row->order_details_id);
				//print_r($row_array);
				$total_amount=$total_amount+$row_array['total'];
                array_push($product_inf,$row_array);
            }
			
			$data['discount_type'] = $row_array['discount_type'];
			$data['discounts_value'] = $row_array['discounts_value'];
			
					if($finish_invoice!= '' && $data['running']!='finish'){
					
						$grand_total = $total_amount+$data['service_charge'] - $data['discount_amount'];
					
						if($data['running']!='edit'){
						if($data['order_type'] != 1){
						$ref_id = $this->dbm_model->add_restaurant_bill_to_invoice_and_service_token($data['client_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$order_selected);
						}
						else if($data['order_type'] == 1 && $data['service_charge']>0){
						$grand_total = $data['service_charge'] - $data['discount_amount'];
						$ref_id = $this->dbm_model->add_restaurant_bill_to_invoice_and_service_token($data['client_id'],$row_array['service_charge'],$row_array['paid_amount'],$row_array['discount_amount'],$order_selected);
						}
						else if($data['order_type'] == 1 && $data['service_charge'] == 0){
							$grand_total = 0;
						}
								if($data['paid_amount']>0)
								{
									$this->dbm_model->transaction_entry('in',$row_array['paid_amount'],$bd_date,'Sale','order_info',$order_selected);
									$this->dbm_model->update_cashbox_in_transaction($row_array['paid_amount'],1);
								}
						$data3 = array('reference_table'=>'payment_history','ref_id'=>$ref_id,'grand_total'=>$grand_total);
						$this->db->where('order_id',$order_selected);
						$this->db->update('order_reference_table',$data3);
						
						$data['grand_total'] = $grand_total;
						}
						
						else if($data['running']=='edit'){
						
							$this->db->from('order_info,order_reference_table');
							$this->db->where('order_info.order_id = order_reference_table.order_id');
							//$this->db->where('order_reference_table.ref_id = payment_history.payment_history_id');
							$this->db->where('order_info.order_id',$order_selected);
							$query = $this->db->get();
							$roww = $query->row_array();
						/* print_r($roww); */
							if($roww['ref_id']!= 0 && $roww['ref_id']!= ''){
							$this->db->where('payment_history.payment_history_id',$roww['ref_id']);
							$amnt_paid = $this->db->get('payment_history');
							$amnt_paid = $amnt_paid->row_array();
							$roww['payment_amount'] = $amnt_paid['payment_amount'];
							}
							else{
							$roww['payment_amount'] = $roww['paid_amount'];
							}
							
							if($data['order_type'] != 1 ){
							if($data['client_id']!=0 && $data['client_id']!=''){
							$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
							}
							else if($data['order_type'] == 1 && $data['service_charge']>0){
							$grand_total = $data['service_charge'] - $data['discount_amount'];
							$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
							else if($data['order_type'] == 1 && $data['service_charge'] == 0){
								$grand_total = 0;
								$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
						
								$this->db->select_sum('transaction_amount');
								$this->db->where('table_ref_name','order_info');
								$this->db->where('table_ref_id',$order_selected);
								$this->db->where('transaction_type','in');
								$sum_paids = $this->db->get('restaurant_transaction');
								$sum_paid = $sum_paids->row_array();
							
 							if($roww['grand_total']==$grand_total && $roww['paid_amount'] == $sum_paid['transaction_amount']){

							}
							else if($roww['grand_total'] != $grand_total || $roww['paid_amount'] != $sum_paid['transaction_amount']){
								$data5 = array('grand_total'=>$grand_total);
								$this->db->where('reference_id',$roww['reference_id']);
								$this->db->update('order_reference_table',$data5);
								

								//echo $sum_paids->num_rows();
								//echo "dfgfd";
								if($sum_paid['transaction_amount'] > 0){
								if($sum_paid['transaction_amount'] < $row_array['paid_amount']){
									$late_amount = $row_array['paid_amount'] - $sum_paid['transaction_amount'];
									//echo $order_selected;
									$this->dbm_model->transaction_entry('in',$late_amount,$bd_date,'Sale Return','order_info', $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($late_amount,1);
								}
								else if($sum_paid['transaction_amount'] > $row_array['paid_amount']){
									$late_amount = $sum_paid['transaction_amount'] - $row_array['paid_amount'];
									//echo $order_selected;
									$this->dbm_model->transaction_entry('out',$late_amount,$bd_date,'Sale Return','order_info' , $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($late_amount,0);
								}
								}
								else if($sum_paid['transaction_amount'] < 1 || $sum_paids->num_rows() < 1){
									if($row_array['paid_amount']>0){
									//echo $order_selected;
									$this->dbm_model->transaction_entry('in',$row_array['paid_amount'],$bd_date,'Sale Return','order_info', $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($row_array['paid_amount'],1);
									}
								}
/*								
								$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],);
								
								$data4 = array('serviceToken' => $data['client_id'],'purpose'=>'Restaurant Bill ('.$data['discount_amount'].'&#2547 Discount)');*/
							}
							$data['grand_total'] = $grand_total;
						}
					
					$data_upp = array('running'=>'finish','total_amount'=>$total_amount);
					$this->db->where('order_id', $order_selected);
					$this->db->update('order_info', $data_upp);
					}
			
			
			$data['product_info'] = $product_inf;

			$data['total_amount'] = $total_amount;
			//if(!$data['total_price']) $temp_total_price = 1;
			//else $temp_total_price = $data['total_price'];
			//$data['discount'] = ( $data['show_discount'] * 100.00 ) / $temp_total_price;
			$data['invoice_id'] = $order_selected;
			/*if($data['discount'] > 0)
			{
				$data['nil_discount'] = ( 100.00 / ( 100.00 - $data['discount'] )); 
			}
			else*/ $data['nil_discount'] = 1;
			$data['number_to_text'] = $this -> dbm_model -> convert_number_to_words( $data['total_amount'] );
			
			
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$this -> load -> view('include/invoice_view', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		function print_pos_invoice( $order_selected='',$finish_invoice='' )
		{
		
			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();
			$product_info = '';
			$bd_date = date('Y-m-d');
			$data['running'] = '';
			$ref_id = '';

			$this->load->model('dbm_model');
	  
			$order_info = $this->dbm_model->order_info_show_on_receipt($order_selected);
			foreach ($order_info->result() as $rw) {
			$data['invoice_id'] = $rw->order_id;
			$data['client_id'] = $rw->client_id;
			$data['contact_number'] = $rw->contact_number;
			$data['invoice_creator'] = $rw->username;
			$data['invoice_doc'] = $rw->doc;
			$data['customer_name'] = $rw->client_name;
			
			$data['discount_amount'] = $rw->discount_amount;
			$data['service_charge'] = $rw->service_charge;
			$data['paid_amount'] = $rw->paid_amount;
			$data['grand_total'] = $rw->grand_total;
			$data['order_type'] = $rw->order_type;
			$data['running'] = $rw->running;
			}
	  
			$product_info = $this->dbm_model->generate_invoice($order_selected);
			$total_amount=0;
			$product_inf=array();
			
            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
				$row_array['order_id'] = $row->order_id;
				$row_array['order_details_id'] = $row->order_details_id;
                $row_array['product_name'] = $row->product_name;
				$row_array['unitName'] = $row->unitName;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['quantity'] = $row->quantity;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['discounts_value'] = $row->discounts_value;
				//$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['comments'] = $row->comments;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
				$row_array['prep_comment'] = $row->prep_comment;
				$row_array['total'] = $row->quantity * $row->sale_price;
				$row_array['option_name'] = $this->dbm_model->get_option_name($row->product_id,$row->order_id,$row->order_details_id);
				//print_r($row_array);
				$total_amount=$total_amount+$row_array['total'];
                array_push($product_inf,$row_array);
            }
			
			$data['discount_type'] = $row_array['discount_type'];
			$data['discounts_value'] = $row_array['discounts_value'];
			
			$data['product_info'] = $product_inf;

			$data['total_amount'] = $total_amount;
			//if(!$data['total_price']) $temp_total_price = 1;
			//else $temp_total_price = $data['total_price'];
			//$data['discount'] = ( $data['show_discount'] * 100.00 ) / $temp_total_price;
			$data['invoice_id'] = $order_selected;
			/*if($data['discount'] > 0)
			{
				$data['nil_discount'] = ( 100.00 / ( 100.00 - $data['discount'] )); 
			}
			else*/ $data['nil_discount'] = 1;
			$data['number_to_text'] = $this -> dbm_model -> convert_number_to_words( $data['total_amount'] );
			
			
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$this -> load -> view('include/print_invoice_view', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		
		function generate_money_receipt( $order_selected='' ,$finish_invoice = '')
		{
			$bd_date = date('Y-m-d');
			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();

			$this->load->model('dbm_model');
			$order_info = $this->dbm_model->order_info_show_on_receipt($order_selected);
			foreach ($order_info->result() as $rw) {
			$data['invoice_id'] = $rw->order_id;
			$data['client_id'] = $rw->client_id;
			$data['running'] = $rw->running;
			$data['order_place'] = $rw->order_place;
			$data['order_type'] = $rw->order_type;
			$data['room_number'] = $rw->room_number;
			$data['table_id'] = $rw->table_id;
			$data['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$rw->table_id);
			$data['invoice_creator'] = $rw->username;
			$data['invoice_doc'] = $rw->doc;
			$data['invoice_dom'] = $rw->dom;
			$data['waiter'] = $this->dbm_model->exception_show('username','users','id',$rw->waiter);
			$data['customer_name'] = $rw->client_name;
			}
			$product_info = $this->dbm_model->generate_invoice($order_selected);
			//print_r($product_info ->result());
			$total_amount=0;
			$product_inf=array();
			$row_array['discount_amount'] = 0;
			$row_array['service_charge'] = 0;
			$row_array['service_type'] = 0;
			$row_array['service_value'] = 0;
			$row_array['paid_amount'] = 0;
			$row_array['discount_type'] = 0;
			$row_array['discounts_value'] = 0;
			$row_array['advance_paid'] = 0;
            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
				$row_array['order_id'] = $row->order_id;
				$row_array['order_details_id'] = $row->order_details_id;
                $row_array['product_name'] = $row->product_name;
				$row_array['unitName'] = $row->unitName;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['quantity'] = $row->quantity;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['service_value'] = $row->service_value;
				$row_array['service_type'] = $row->service_type;
				$row_array['guest_number'] = $row->guest_number;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['discounts_value'] = $row->discounts_value;
				//$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['comments'] = $row->comments;
				$row_array['prep_comment'] = $row->prep_comment;
				$row_array['total'] = $row->quantity * $row->sale_price;
				$row_array['option_name'] = $this->dbm_model->get_option_name($row->product_id,$row->order_id,$row->order_details_id);
				//print_r($row_array);
				$total_amount=$total_amount+$row_array['total'];
                array_push($product_inf,$row_array);
            }
			
				if($finish_invoice!= '' && $data['running']!='finish'){
						
					
						$grand_total = $total_amount+$row_array['service_charge'] - $row_array['discount_amount'];
						$data['paid_amount'] = $row_array['paid_amount'] = $grand_total;
						$uData=array('paid_amount'=>$grand_total);
						$this->db->where('order_id', $order_selected);
						$this->db->update('order_info',$uData);
					
						if($data['running']!='edit'){
						if($data['order_type'] != 1){
						$ref_id = $this->dbm_model->add_restaurant_bill_to_invoice_and_service_token($data['client_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$order_selected);
						}
						else if($data['order_type'] == 1 && $row_array['service_charge']>0){
						$grand_total = $row_array['service_charge'] - $row_array['discount_amount'];
						$ref_id = $this->dbm_model->add_restaurant_bill_to_invoice_and_service_token($data['client_id'],$row_array['service_charge'],$row_array['paid_amount'],$row_array['discount_amount'],$order_selected);
						}
						else if($data['order_type'] == 1 && $row_array['service_charge'] == 0){
							$grand_total = 0;
						}
								if($data['paid_amount']>0)
								{
									$this->dbm_model->transaction_entry('in',$row_array['paid_amount'],$bd_date,'Sale','order_info',$order_selected);
									$this->dbm_model->update_cashbox_in_transaction($row_array['paid_amount'],1);
								}
						$data3 = array('reference_table'=>'payment_history','ref_id'=>$ref_id,'grand_total'=>$grand_total);
						$this->db->where('order_id',$order_selected);
						$this->db->update('order_reference_table',$data3);
						
						$data['grand_total'] = $grand_total;
						}
						
						else if($data['running']=='edit'){
						
							$this->db->from('order_info,order_reference_table');
							$this->db->where('order_info.order_id = order_reference_table.order_id');
							$this->db->where('order_info.order_id',$order_selected);
							$query = $this->db->get();
							$roww = $query->row_array();
							if($roww['ref_id']!= 0 && $roww['ref_id']!= ''){
							$this->db->where('payment_history.payment_history_id',$roww['ref_id']);
							$amnt_paid = $this->db->get('payment_history');
							$amnt_paid = $amnt_paid->row_array();
							$roww['payment_amount'] = $amnt_paid['payment_amount'];
							}
							else{
							$roww['payment_amount'] = $roww['paid_amount'];
							}
							
							if($data['order_type'] != 1 ){
							if($data['client_id']!=0 && $data['client_id']!=''){
							$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
							}
							else if($data['order_type'] == 1 && $data['service_charge']>0){
							$grand_total = $data['service_charge'] - $data['discount_amount'];
							$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
							else if($data['order_type'] == 1 && $data['service_charge'] == 0){
								$grand_total = 0;
								$this->dbm_model->update_restaurant_bill_to_invoice_and_service_token($data['client_id'],$roww['ref_id'],$grand_total,$row_array['paid_amount'],$row_array['discount_amount'],$roww['grand_total'],$roww['payment_amount'],$order_selected);
							}
						
								$this->db->select_sum('transaction_amount');
								$this->db->where('table_ref_name','order_info');
								$this->db->where('table_ref_id',$order_selected);
								$this->db->where('transaction_type','in');
								$sum_paids = $this->db->get('restaurant_transaction');
								$sum_paid = $sum_paids->row_array();
							
 							if($roww['grand_total']==$grand_total && $roww['paid_amount'] == $sum_paid['transaction_amount']){

							}
							else if($roww['grand_total'] != $grand_total || $roww['paid_amount'] != $sum_paid['transaction_amount']){
								$data5 = array('grand_total'=>$grand_total);
								$this->db->where('reference_id',$roww['reference_id']);
								$this->db->update('order_reference_table',$data5);

								if($sum_paid['transaction_amount'] > 0){
								if($sum_paid['transaction_amount'] < $row_array['paid_amount']){
									$late_amount = $row_array['paid_amount'] - $sum_paid['transaction_amount'];
									$this->dbm_model->transaction_entry('in',$late_amount,$bd_date,'Sale Return','order_info', $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($late_amount,1);
								}
								else if($sum_paid['transaction_amount'] > $row_array['paid_amount']){
									$late_amount = $sum_paid['transaction_amount'] - $row_array['paid_amount'];
									$this->dbm_model->transaction_entry('out',$late_amount,$bd_date,'Sale Return','order_info' , $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($late_amount,0);
								}
								}
								else if($sum_paid['transaction_amount'] < 1 || $sum_paids->num_rows() < 1){
									if($row_array['paid_amount']>0){
									$this->dbm_model->transaction_entry('in',$row_array['paid_amount'],$bd_date,'Sale Return','order_info', $order_selected);
				$this->dbm_model->update_cashbox_in_transaction($row_array['paid_amount'],1);
									}
								}
							}
							$data['grand_total'] = $grand_total;
						}
					
					$data_upp = array('running'=>'finish','total_amount'=>$total_amount);
					$this->db->where('order_id', $order_selected);
					$this->db->update('order_info', $data_upp);
					}
			
			
			$data['product_info'] = $product_inf;
			$data['discount_amount'] = $row_array['discount_amount'];
			$data['service_charge'] = $row_array['service_charge'];
			$data['service_type'] = $row_array['service_type'];
			$data['service_value'] = $row_array['service_value'];
			$data['paid_amount'] = $row_array['paid_amount'];
			$data['discount_type'] = $row_array['discount_type'];
			$data['discounts_value'] = $row_array['discounts_value'];
			$data['total_amount'] = $total_amount;

			$data['invoice_id'] = $order_selected;
			$data['nil_discount'] = 1;
			$data['number_to_text'] = $this -> dbm_model -> convert_number_to_words( $data['total_amount'] );
			
			
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$this -> load -> view('include/money_receipt', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		
		function send_order_to_kitchen( $order_selected='' )
		{
			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();

			$this->load->model('dbm_model');
			$order_info = $this->dbm_model->order_info_show_on_receipt($order_selected);
			foreach ($order_info->result() as $rw) {
			$data['invoice_id'] = $rw->order_id;
			$data['client_id'] = $rw->client_id;
			$data['order_place'] = $rw->order_place;
			$data['room_number'] = $rw->room_number;
			$data['total_amount'] = $rw->total_amount;
			$data['discount_amount'] = $rw->discount_amount;
			$data['service_charge'] = $rw->service_charge;
			$data['table_id'] = $rw->table_id;
			$data['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$rw->table_id);
			$data['invoice_creator'] = $rw->username;
			$data['waiter'] = $this->dbm_model->exception_show('username','users','id',$rw->waiter);
			$data['invoice_doc'] = $rw->doc;
			$data['customer_name'] = $rw->client_name;
			}
			$product_info = $this->dbm_model->send_order_to_kitchen($order_selected);
			$total_amount=0;
			$product_inf=array();
            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
				$row_array['order_id'] = $row->order_id;
				$row_array['order_details_id'] = $row->order_details_id;
                $row_array['product_name'] = $row->product_name;
				$row_array['unitName'] = $row->unitName;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['quantity'] = $row->quantity;
				$row_array['guest_number'] = $row->guest_number;
				//$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['comments'] = $row->comments;
				$row_array['prep_comment'] = $row->prep_comment;
				$row_array['total'] = $row->quantity * $row->sale_price;
				$row_array['option_name'] = $this->dbm_model->get_option_name($row->product_id,$row->order_id,$row->order_details_id);
				//print_r($row_array);
				$total_amount=$total_amount+$row_array['total'];
                array_push($product_inf,$row_array);

            }
			$data['product_info'] = $product_inf;
			$data['total_amount'] = $total_amount;
			//if(!$data['total_price']) $temp_total_price = 1;
			//else $temp_total_price = $data['total_price'];
			//$data['discount'] = ( $data['show_discount'] * 100.00 ) / $temp_total_price;
			$data['invoice_id'] = $order_selected;
			/*if($data['discount'] > 0)
			{
				$data['nil_discount'] = ( 100.00 / ( 100.00 - $data['discount'] )); 
			}
			else*/ $data['nil_discount'] = 1;
			$data['number_to_text'] = $this -> dbm_model -> convert_number_to_words( $data['total_amount'] );
			
			
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$this -> load -> view('include/send_order_kitchen_view2', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		
		function cashbox_print( $cash_selected='' )
		{
			$data['user_type'] = $this->tank_auth->get_usertype();
			$data['user_name'] = $this->tank_auth->get_username();

			$this->load->model('dbm_model');

			$this->db->where('cashbox_id',$cash_selected);
			$this->db->from('cashbox_info');
			$cashbox_info = $this->db->get();
			$total_amount=0;
			$cashbox_inf=array();
            foreach ($cashbox_info->result() as $row) {
                $row_array['cashbox_id'] = $row->cashbox_id;
				$row_array['opening_cashbox'] = $row->opening_cashbox;
				$row_array['thousand'] = $row->thousand;
                $row_array['five_hundred'] = $row->five_hundred;
                $row_array['one_hundred'] = $row->one_hundred;
				$row_array['fifty'] = $row->fifty;
				$row_array['twenty'] = $row->twenty;
				$row_array['ten'] = $row->ten;
				$row_array['five'] = $row->five;
				$row_array['two'] = $row->two;
				$row_array['one'] = $row->one;
				$row_array['closing_cash'] = $row->closing_cash;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
                array_push($cashbox_inf,$row_array);

            }
			$data['cashbox_info'] = $cashbox_inf;
			
			$data['transaction_info'] = $this->dbm_model->transaction_show_in_cashbox($cash_selected);

			$data['invoice_id'] = $cash_selected;
			$data['nil_discount'] = 1;
			$data['number_to_text'] = $this -> dbm_model -> convert_number_to_words($data['cashbox_info'][0]['closing_cash']);
			
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			//$this -> load -> view('include/print_cashbox_view', $data);
			$this -> load -> view('include/cash_box_view2', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		function prin_invoice_list()
		{
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$json_response = array();
			$this->load->model('dbm_model');
           // $this->load->model('order_setup');
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$username = $this->uri->segment(5);
			$waiterid = $this->uri->segment(6);
			//echo $waiterid;
            $order_setup = $this->dbm_model->specific_invoices_shoing_for_print($start_date,$end_date,$username,$waiterid);
            foreach ($order_setup->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['room_number'] = $row->room_number;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->username;//$this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
			if($username!='mm'){
			$data['username'] =$this->dbm_model->exception_show('username','users','id',$username);
			}
			else if($waiterid!=''){
			$data['waitername'] =$this->dbm_model->exception_show('stuff_name','stuff_info','stuff_id',$waiterid);
			}
			
           $data['all_invoice_id'] = $order_setup;
			$this -> load -> view('include/print_specific_date_invoice_details', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		
		function report_summery_shoing()
		{
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$data['total_sale'] = 0;
			$data['total_discount'] = 0;
			$data['paid_amount'] = 0;
			$data['service_amount'] = 0;
			$data['total_expense'] = 0;
			$data['sale_price_info'] = 0;
			$json_response = array();
			$this->load->model('dbm_model');
           // $this->load->model('order_setup');
			$data['start_date'] = $this->uri->segment(3);
			$data['end_date'] = $this->uri->segment(4);
			//echo $waiterid;
			if($data['start_date']==''){$data['start_date']='mm';}
			if($data['end_date']==''){$data['end_date']='mm';}
            $order_setup = $this->dbm_model->specific_invoices_shoing($data['start_date'],$data['end_date'],'mm','mm');
			$expense_setup = $this->dbm_model->specific_expense_shoing($data['start_date'],$data['end_date']);
			$data['Cash_in'] = $this->dbm_model->specific_cash_in_shoing($data['start_date'],$data['end_date']);
			$data['Cash_out'] = $this->dbm_model->specific_cash_out_shoing($data['start_date'],$data['end_date']);
			$data['Closing_cash'] = $this->dbm_model->closing_cash_summery($data['start_date'],$data['end_date']);
			$data['total_withdrawal'] = $this->dbm_model->total_withdrawal_cash_summery($data['start_date'],$data['end_date']);
			//print_r($data['Closing_cash']);
            
			foreach ($order_setup->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->username;
				
				$data['total_sale'] += $row->total_amount;
				$data['total_discount'] += $row->discount_amount;
				$data['paid_amount'] += $row->paid_amount;
				$data['service_amount'] += $row->service_charge;
				//$this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                //array_push($json_response,$row_array);
            }
			if($expense_setup!=''){
			foreach ($expense_setup->result() as $rw){
				$data['total_expense'] += $rw->amount;
			}
			}
			$data['sale_price_info'] = $this -> dbm_model -> specific_date_sale_price_calculation(  $data['start_date']  ,  $data['end_date']  );
			$data[ 'buy_price_info' ] = $this -> dbm_model -> specific_date_buy_price_calculation(  $data['start_date']  ,  $data['end_date'] );
			
           $data['all_invoice_id'] = $order_setup;
			$this -> load -> view('financial_statement_summery', $data);
			//$this -> load -> view('invoice_view', $data);
		}
		function print_financial_report(){
			$data['status'] = '';
			$data['discount_on'] = false;
			$data['sale_status'] = '';
			$data['total_sale'] = 0;
			$data['total_discount'] = 0;
			$data['paid_amount'] = 0;
			$data['service_amount'] = 0;
			$data['total_expense'] = 0;
			$data['sale_price_info'] = 0;
			$json_response = array();
			$this->load->model('dbm_model');
           // $this->load->model('order_setup');
			$data['start_date'] = $this->uri->segment(3);
			$data['end_date'] = $this->uri->segment(4);
			//echo $waiterid;
			if($data['start_date']==''){$data['start_date']='mm';}
			if($data['end_date']==''){$data['end_date']='mm';}
            $order_setup = $this->dbm_model->specific_invoices_shoing($data['start_date'],$data['end_date'],'mm','mm');
			$expense_setup = $this->dbm_model->specific_expense_shoing($data['start_date'],$data['end_date']);
			$data['Cash_in'] = $this->dbm_model->specific_cash_in_shoing($data['start_date'],$data['end_date']);
			$data['Cash_out'] = $this->dbm_model->specific_cash_out_shoing($data['start_date'],$data['end_date']);
			$data['Closing_cash'] = $this->dbm_model->closing_cash_summery($data['start_date'],$data['end_date']);
			$data['total_withdrawal'] = $this->dbm_model->total_withdrawal_cash_summery($data['start_date'],$data['end_date']);
			//print_r($order_setup->result());
            foreach ($order_setup->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->username;
				
				$data['total_sale'] += $row->total_amount;
				$data['total_discount'] += $row->discount_amount;
				$data['paid_amount'] += $row->paid_amount;
				$data['service_amount'] += $row->service_charge;
				//$this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                //array_push($json_response,$row_array);
            }
			foreach ($expense_setup->result() as $rw){
				$data['total_expense'] += $rw->amount;
			}
			$data['sale_price_info'] = $this -> dbm_model -> specific_date_sale_price_calculation(  $data['start_date']  ,  $data['end_date']  );
			$data[ 'buy_price_info' ] = $this -> dbm_model -> specific_date_buy_price_calculation(  $data['start_date']  ,  $data['end_date'] );
			
           $data['all_invoice_id'] = $order_setup;
			$this -> load -> view('print_financial_statement_summery', $data);
		}
		
	function expense_summery_shoing(){
			$json_response = array();
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			if($end_date==''){
			$end_date = $start_date;
			}
			$this->load->model('dbm_model');
			$this->db->select('restaurant_expense.*');
			$this->db->from('restaurant_expense');
			$this->db->where('restaurant_expense.doc >= "'.$start_date.' 00:00:00"');
			$this->db->where('restaurant_expense.doc <= "'.$end_date.' 23:59:59"');
			$expense_setups = $this->db->get();
            foreach ($expense_setups->result() as $row) {
				$row_array['restaurant_expense_id'] = $row->restaurant_expense_id;
                $row_array['providerName'] = $row->providerName;
                $row_array['purpose'] = $row->purpose;
				$row_array['amount'] = $row->amount;
                $row_array['comment'] = $row->comment;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->creator;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
			 echo json_encode($json_response);
			//echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		
	}
	
	function entertain_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$user = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->db->select('honor_name');
			$this->db->from('entertainment_info');
			$this->db->where('entertainment_info.entertainment_id = "'.$user.'"');
			$que=$this->db->get();
			if($que->num_rows()>0){
			$rr = $que->row_array();
			$data['username'] = $rr['honor_name'];
			}
			else $data['username'] = "All Types";
			
			
			$this->load->model('dbm_model');
			if($user != 'All'){
			$this->db->select('order_info.*,honor_name as username');
			}
			else{
				$this->db->select('order_info.order_id,order_info.client_name,order_info.client_name,order_type,order_info.doc,honor_name as username,SUM(order_info.total_amount) as total_amount, SUM(order_info.discount_amount) as  discount_amount ,SUM(order_info.service_charge) as service_charge,SUM(order_info.paid_amount) as paid_amount');
				//$this->db->select_sum('order_info.total_amount as total_amount, order_info.discount_amount as discount_amount,order_info.service_charge as service_charge,order_info.paid_amount AS paid_amount');
			}
			$this->db->from('order_info,entertainment_order_info,entertainment_info');
			if($start_date!='mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('order_info.order_type = 2');
			$this->db->where('entertainment_order_info.order_info_id = order_info.order_id');
			$this->db->where('entertainment_order_info.entertainment_user = entertainment_info.entertainment_id');
			if($user != 'mm' && $user != 'All' ){$this->db->where('entertainment_order_info.entertainment_user = "'.$user.'"');}
			else if($user == 'All' ){$this->db->group_by('entertainment_order_info.entertainment_user');}
			$data['entertainment_setups'] = $this->db->get();
			$this -> load -> view('entertainment_summery_view', $data);
			//echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		
	}
	
	function stuf_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$user = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->db->select('stuff_name');
			$this->db->from('stuff_info');
			$this->db->where('stuff_info.stuff_id = "'.$user.'"');
			$que=$this->db->get();
			if($que->num_rows()>0){
			$rr = $que->row_array();
			$data['username'] = $rr['stuff_name'];
			}
			else $data['username'] = "All Types";
			
			$this->load->model('dbm_model');
			if($user != 'All'){
			$this->db->select('order_info.*,stuff_name');
			$this->db->from('order_info,stuff_order_info,stuff_info,order_reference_table');
			if($start_date!='mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('order_info.order_type = 3');
			$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
			$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
			$this->db->where('order_reference_table.order_id = order_info.order_id');
			if($user != 'mm'){$this->db->where('stuff_order_info.stuff_info_id = "'.$user.'"');}
			$data['stuff_summery_setups'] = $this->db->get();
			}
			else if($user != 'mm' || $user == 'All'){
			$this->db->select('order_info.order_type,stuff_name,order_info.order_id,order_info.doc');
			$this->db->select_sum('order_info.paid_amount');
			$this->db->select_sum('order_info.total_amount');
			$this->db->select_sum('order_info.discount_amount');
			$this->db->select_sum('order_info.service_charge');
			$this->db->from('order_info,stuff_order_info,stuff_info,order_reference_table');
			if($start_date!='mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('order_info.order_type = 3');
			$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
			$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
			$this->db->where('order_reference_table.order_id = order_info.order_id');
			$this->db->group_by('stuff_order_info.stuff_info_id');
			$data['stuff_summery_setups'] = $this->db->get();
			}
			$this -> load -> view('stuff_summery_view', $data);
		
	}
	function due_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$user = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->db->select('order_info.*');
			$this->db->from('order_info');
			$this->db->where('order_info.client_id = "'.$user.'"');
			$que=$this->db->get();
			if($que->num_rows()>0){
			$rr = $que->row_array();
			$data['username'] = $rr['client_name'];
			}
			else $data['username'] = "All Types";
			
			$this->load->model('dbm_model');
			if($user != 'individual'){
			$this->db->select('order_info.*');
			$this->db->from('order_info,order_reference_table');
			if($start_date!='mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('(order_info.order_type = 0 OR order_info.order_type = 1)');
			//$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
			//$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
			$this->db->where('order_info.paid_amount < order_reference_table.grand_total');
			$this->db->where('order_reference_table.order_id = order_info.order_id');
			if($user != 'mm'){$this->db->where('order_info.client_id = "'.$user.'"');}
			$this->db->group_by('order_info.order_id');
			$data['client_due_summery_setups'] = $this->db->get();
			}
			else if($user != 'mm' || $user == 'individual'){
			$this->db->select('order_info.client_id,order_info.client_name,order_info.order_id,order_info.order_type,order_info.doc');
			$this->db->select_sum('order_info.paid_amount');
			$this->db->select_sum('order_info.total_amount');
			$this->db->select_sum('order_info.discount_amount');
			$this->db->select_sum('order_info.service_charge');
			$this->db->from('order_info,order_reference_table');
			if($start_date!='mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('order_info.paid_amount < order_reference_table.grand_total');
			$this->db->where('(order_info.order_type = 0 OR order_info.order_type = 1)');
			//$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
			//$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
			$this->db->where('order_reference_table.order_id = order_info.order_id');
			$this->db->group_by('order_info.client_name');
			$data['client_due_summery_setups'] = $this->db->get();
			}
			$this -> load -> view('client_due_summery_view', $data);
		
	}
	
	function room_credit_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$room = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->db->select('order_info.*');
			$this->db->from('order_info');
			$this->db->where('order_info.room_number = "'.$room.'"');
			if($start_date!='mm' && $start_date!=''){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$que = $this->db->get();
			$data['room_credit_summery_setups'] = $que;
			
			$this -> load -> view('room_credit_summery_view', $data);
		
	}
	
	function catering_log_summery_shoing(){
			$data['item_log_summery_setups'] = $this->dbm_model->catering_log_summery_shoing();
			
			$i=0;
			$item_log = array();
			//print_r($data['item_log_summery_setups']->result());
			foreach($data['item_log_summery_setups']->result() as $field){
				$row_array['item_name'] = $field->item_name;
				$row_array['store_name'] = $field->store_name;
				$row_array['stock_amount'] = $field->stock_amount;
				$row_array['current_use_amount'] = $field->current_use_amount;
				$row_array['unit_buy_price'] = $field->unit_buy_price;
				//$row_array['prev_quantity'] = $this->dbm_model->get_prev_item_total($field->catering_id);
				$row_array['purchase'] = $this->dbm_model->get_item_total_log($field->catering_id,0);
				$row_array['damage'] = $this->dbm_model->get_item_total_log($field->catering_id,2);
				$row_array['Lost'] = $this->dbm_model->get_item_total_log($field->catering_id,3);
				$row_array['Use'] = $this->dbm_model->get_item_total_log($field->catering_id,4);
				array_push($item_log,$row_array);
			}
			
			$data['item_log'] = $item_log;

			$this -> load -> view('citem_log_summery_view', $data);
	}
	
	function product_sale_summery_shoing(){
	        $data['sale_log'] = $this->dbm_model->product_sale_summery_shoing();
			
			//print_r($data['sale_log']->result());
			$this -> load -> view('product_sale_summery_view', $data);
	}
	
	function complementary_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$room_number = $this->uri->segment(5);
			$all_individual = $this->uri->segment(6);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->load->model('dbm_model');
			if($all_individual=='mm' || $all_individual==''){
			$this->db->select('order_info.*');
			$this->db->from('order_info');
			if($start_date != 'mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			$this->db->where('order_info.order_type = 1');
			if($room_number != 'mm'){$this->db->where('order_info.room_number = "'.$room_number.'"');}
			$data['complementary_setups'] = $this->db->get();
			}
			else{
				$this->db->select('order_info.order_type,order_info.client_name,order_info.order_id,order_info.doc,order_info.room_number');
				$this->db->select_sum('order_info.paid_amount');
				$this->db->select_sum('order_info.total_amount');
				$this->db->select_sum('order_info.discount_amount');
				$this->db->select_sum('order_info.service_charge');
				$this->db->from('order_info');
				if($start_date != 'mm'){
				$this->db->where('order_info.doc >= "'.$start_date.'"');
				$this->db->where('order_info.doc <= "'.$end_date.'"');
				}
				$this->db->where('order_info.order_type = 1');
				if($room_number != 'mm'){$this->db->where('order_info.room_number = "'.$room_number.'"');}
				$this->db->group_by('order_info.room_number');
				$data['complementary_setups'] = $this->db->get();
			}
			$this -> load -> view('complementary_summery_view', $data);
			//echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
	}
	function servicetoken_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$service_token = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			
			$this->load->model('dbm_model');
			$this->db->select('order_info.*');
			$this->db->from('order_info');
			if($start_date != 'mm'){
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			//$this->db->where('order_info.order_type = 1');
			if($service_token != 'mm'){$this->db->where('order_info.client_id = "'.$service_token.'"');}
			$data['service_setups'] = $this->db->get();
			$this -> load -> view('tokenwise_summery_view', $data);
			//echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		
	}
	function transaction_printt_show(){
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$trans_type = $this->uri->segment(5);
		$purpose = urldecode($this->uri->segment(6));
		//echo $purpose;

		if($start_date == 'mm'){
			$start_date = date('Y-m-d');
		}
		if($end_date == 'mm'){
			if($start_date != 'mm'){
				$end_date = $start_date;
			}
			else{ $end_date = date('Y-m-d'); }
		}
			if($end_date == 'mm'){$end_date = $start_date.' 23:59:59';}
			else{
			$end_date = $end_date.' 23:59:59';			
			}
			$start_date = $start_date.' 00:00:00';
			
            $json_response = array();
				$this->db->select('*');
				$this->db->from('restaurant_transaction');
				$this->db->where('restaurant_transaction.DOC > "'.$start_date.'"');
				$this->db->where('restaurant_transaction.DOC < "'.$end_date.'"');
				if($trans_type!='mm'){$this->db->where('transaction_type',$trans_type);}
				if($purpose!='mm'){$this->db->where('purpose',$purpose);}
				$this->db->order_by('restaurant_transaction.purpose','asc');
				$this->db->order_by('restaurant_transaction.DOC','desc');
				$transaction_setup = $this->db->get();
            foreach ($transaction_setup->result() as $row){
                
                $row_array['transaction_id'] = $row->transaction_id;
				$row_array['transaction_type'] = $row->transaction_type;
				$row_array['transaction_amount'] = $row->transaction_amount;
				$row_array['transaction_date'] = $row->transaction_date;
				$row_array['purpose'] = $row->purpose;
				$row_array['table_ref_name'] = $row->table_ref_name;
				$row_array['table_ref_id'] = $row->table_ref_id;
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
                $row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
                array_push($json_response,$row_array);
            }
		   $data['transaction_setup'] = $transaction_setup->result_array();
		   $this -> load -> view('print_transaction_view',$data);
	}
	
	function booking_invoice_print_show(){
	
		$booking_id = $this->uri->segment(3);
            $json_response = array();
				$this->db->select('*');
				$this->db->from('restaurant_booking');
				$this->db->where('restaurant_booking.res_booking_id',$booking_id);
				$this->db->join('restaurant_booking_menu','restaurant_booking.res_booking_id = restaurant_booking_menu.booking_id','left');
				$this->db->join('restaurant_booking_other','restaurant_booking.res_booking_id = restaurant_booking_other.booking_id','left');
				$transaction_setup = $this->db->get();
		   $data['booking_setup'] = $transaction_setup->row_array();
		  // print_r($data['booking_setup']);
		   $this -> load -> view('print_booking_invoice_view',$data);
	}
	
	function invoice_and_realize_shoing(){
		
			$json_response = array();
			$this->load->model('dbm_model');
			$start_date = $this->uri->segment(3);

			//echo $waiterid;
            $order_setup = $this->dbm_model->specific_invoices_shoing_for_print($start_date,'mm','mm','mm');
			
			$data['realize_setup'] = $this->dbm_model->specific_date_order_due_paid($start_date);
			
           /*  foreach ($order_setup->result() as $row){
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->username;
                array_push($json_response,$row_array);
            } */
			
			$data['all_invoice_id'] = $order_setup;
			
			$this -> load -> view('include/print_invoice_and_realize', $data);
	}
	
		function system_error()
		  {
			$this -> load -> view('system_error_view');
		  }
		
}