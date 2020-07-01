<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Dbm_Model extends CI_model{
	   
	   function other_show($select,$from,$key,$id){
	      $this->db->select($select);
          $this->db->from($from);
          $this->db->where($key, $id); 
          $this->db->limit(1,0);
          $query = $this->db->get();
          $vlue="";
          foreach ($query->result() as $row){
             $vlue=$row->$select;
          }
          
          if($vlue!="" || $vlue!=null){
            return $vlue;
          }else{
            return 'None';
          } 
                
       }
    
    
	   function exception_show($select,$from,$key,$id){
	      $this->db->select($select);
          $this->db->from($from);
          $this->db->where($key, $id); 
          $this->db->limit(1,0);
          $query = $this->db->get();
          $vlue="";
          foreach ($query->result() as $row){
             $vlue=$row->$select;
          }
          
          if($id<0)
            $vlue=$id;
          
          switch ($vlue) {
             case ($vlue==null):
                 return "None";
                 break;
             case ($vlue==""):
                 return "None";
                 break;
             case ($vlue<0):
                 return "All Types";
                 break;
             default:
                 return $vlue;
        }         
          
                        
       }
    


	   function other_all_show($from,$key,$id,$key2='',$id2='',$key3='',$id3=''){
	      $this->db->select('*');
          $this->db->from($from);
          $this->db->where($key, $id); 
		  if($key2!=''){
		  $this->db->where($key2, $id2); 
		  }
		  if($key3!=''){
		  $this->db->where($key3, $id3); 
		  }
         // $this->db->limit(1,0);
          $query = $this->db->get();
          $vlue="";
          /* foreach ($query->result() as $row){
             $vlue=$row->$select;
          } */
          
          if($query!="" || $query!=null){
            return $query;
          }else{
            return 'None';
          } 
                
       }
	   function specific_booking_log_shoing(){
	   
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			if($end_date == ''){
				$end_date = $start_date.' 24:59:59';
			}
			else{
				$end_date = $end_date.' 24:59:59';
			}
			$start_date = $start_date.' 00:00:00';
	      $this->db->select('*');
          $this->db->from('restaurant_booking');
          $this->db->where('restaurant_booking.DOC >= "'.$start_date.'"'); 
		  $this->db->where('restaurant_booking.DOC <= "'.$end_date.'"'); 
          $query = $this->db->get();
            return $query;
       }
	   function show_all_party_due_list(){
	   
	      $this->db->select('*');
          $this->db->from('restaurant_booking');
          $this->db->where('restaurant_booking.due > ',0); 
		  //$this->db->where('restaurant_booking.DOC <= "'.$end_date.'"'); 
          $query = $this->db->get();
            return $query;
       }
	   
	    function show_all_clients_due_list(){
	   
	      $this->db->select('order_info.*,order_reference_table.grand_total');
          $this->db->from('order_info,order_reference_table');
          $this->db->where('order_info.paid_amount < order_reference_table.grand_total');
		  $this->db->where('(order_info.order_type = 0 OR order_info.order_type = 1)');
		  $this->db->where('order_info.order_id = order_reference_table.order_id');
		  $this->db->where('order_info.running != "running"');
		  $this->db->group_by('order_info.order_id');
		  $this->db->order_by('order_info.doc','desc');
          $query = $this->db->get();
            return $query;
        }
	    function show_all_clients_due_individually(){
	   
	      $this->db->select('order_info.*');
		  $this->db->select_sum('order_reference_table.grand_total');
          $this->db->from('order_info,order_reference_table');
          $this->db->where('order_info.paid_amount < order_reference_table.grand_total');
		  $this->db->where('(order_info.order_type = 0 OR order_info.order_type = 1)');
		  $this->db->where('order_info.order_id = order_reference_table.order_id');
		  $this->db->where('order_info.running != "running"');
		  $this->db->group_by('order_info.client_id');
		  $this->db->order_by('order_info.doc','desc');
          $query = $this->db->get();
            return $query;
        }
	    function show_specific_clients_due_list($order_id){
	   
	      $this->db->select('order_info.*,order_reference_table.grand_total');
          $this->db->from('order_info,order_reference_table');
          //$this->db->where('order_info.paid_amount < order_reference_table.grand_total');
		  $this->db->where('order_info.order_id',$order_id);
		  //$this->db->where('order_info.order_type = 0 OR order_info.order_type = 1');
		  $this->db->where('order_info.order_id = order_reference_table.order_id');
		  $this->db->group_by('order_info.order_id');
          $query = $this->db->get();
            return $query;
        }
		
	    function show_specific_stuff_due_list($user,$month_id){
			
			$start_date = $month_id.'-01';
			$end_date = $month_id.'-31';
			$this->db->select('stuff_info.*');
			$this->db->select_sum('order_reference_table.grand_total');
			$this->db->select_sum('order_info.paid_amount');
			$this->db->from('order_info,stuff_order_info,stuff_info,order_reference_table');
			$this->db->where('order_info.doc >= "'.$start_date.'"');
			$this->db->where('order_info.doc <= "'.$end_date.'"');
			$this->db->where('order_info.order_type = 3');
			$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
			$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
			$this->db->where('order_reference_table.order_id = order_info.order_id');
			$this->db->where('stuff_order_info.stuff_info_id = "'.$user.'"');
			$query = $this->db->get();
            return $query;
        }
		
	   function current_temp_prep_option($product_id,$order_id){
	      $this->db->select('temp_preparation_option.*,prep_options.option_name');
          $this->db->from('temp_preparation_option,prep_options');
          $this->db->where('temp_preparation_option.product_id',$product_id); 
		  $this->db->where('temp_preparation_option.order_id',$order_id); 
		  $this->db->where('temp_preparation_option.sale_details_id',0); 
		  $this->db->where('temp_preparation_option.pre_option_id = prep_options.prep_options_id'); 
          $query = $this->db->get();
          $vlue="";
          if($query!="" || $query!=null){
            return $query;
          }else{
            return 'None';
          }     
       }
	function current_temp_prep_option_onedit($order_details_selected){
	      $this->db->select('temp_preparation_option.*,prep_options.option_name');
          $this->db->from('temp_preparation_option,prep_options');
		  $this->db->where('temp_preparation_option.sale_details_id',$order_details_selected);
		  $this->db->where('temp_preparation_option.pre_option_id = prep_options.prep_options_id'); 
          $query = $this->db->get();
            return $query;
       }
	   function order_info_show_on_receipt($order_id){
	      $this->db->select('order_info.*,order_reference_table.*,users.username');
          $this->db->from('order_info,users,order_reference_table');
          $this->db->where('order_info.order_id',$order_id);
		  $this->db->where('order_info.order_id = order_reference_table.order_id');
		  $this->db->where('users.id = order_info.creator'); 
          $query = $this->db->get();
            return $query;
                
       }
	   
	   function show_products_on_specific_order($order_id){
		  $this->db->select('order_details.quantity,product_info.product_name,order_details.sale_prices AS sale_price,product_unit_name.unitName,order_info.comments,product_info.product_id,order_details.order_details_id,order_details.guest_number,order_info.order_id,order_info.service_charge,order_info.paid_amount,order_info.discount_amount,order_details.prep_comment,order_reference_table.discount_type,order_reference_table.discounts_value,order_reference_table.service_type,order_reference_table.service_value');
		  $this->db->from('order_details,product_info,order_info,product_unit_name,order_reference_table');
		  $this->db->where('order_info.order_id',$order_id);
		  $this->db->where('order_details.order_id = order_info.order_id');
		  $this->db->where('order_details.product_id = product_info.product_id');
		  $this->db->where('product_info.unit_name = product_unit_name.unit_name_id');
		  $this->db->where('order_reference_table.order_id = order_info.order_id');
		  $this->db->order_by('order_details.guest_number', "asc");
		  $this->db->group_by('order_details.order_details_id');
		  $query = $this->db->get();
		  $vlue="";
		  if($query!="" || $query!=null){
			return $query;
		  }else{
			return 'None';
		  }
	   }
	
	function specific_order_info_for_update($order_id){
		$this->db->select('*');
		$this->db->from('order_info');
		$this->db->where('order_info.order_id',$order_id);
		$this->db->join('entertainment_order_info','entertainment_order_info.order_info_id = order_info.order_id','left');
		$this->db->join('stuff_order_info','stuff_order_info.order_info_id = order_info.order_id','left');
		$query = $this->db->get();
		return $query;
	}
	   	
	function generate_invoice($order_id){
		  $this->db->select('order_details.quantity,order_details.guest_number,product_info.product_name,order_details.sale_prices AS sale_price,product_unit_name.unitName,order_info.comments,product_info.product_id,order_details.order_details_id,order_info.order_id,order_info.service_charge,order_info.paid_amount,order_info.discount_amount,order_details.prep_comment,order_info.client_id,order_info.order_type,order_info.order_place,order_info.room_number,order_info.waiter,order_info.running,users.username,order_reference_table.discount_type,order_reference_table.discounts_value,order_reference_table.service_type,order_reference_table.service_value');
		  $this->db->from('order_details,product_info,order_info,users,product_unit_name,order_reference_table');
		  $this->db->where('order_info.order_id',$order_id);
		  $this->db->where('order_details.order_id = order_info.order_id');
		  $this->db->where('users.id = order_info.creator');
		  $this->db->where('product_info.unit_name = product_unit_name.unit_name_id');
		  $this->db->where('order_details.product_id = product_info.product_id');
		  $this->db->where('order_reference_table.order_id = order_info.order_id');
		  //$this->db->group_by('order_details.product_id');
		  $this->db->group_by('order_details.order_details_id');
		  $query = $this->db->get();
		  $vlue="";
		  if($query!="" || $query!=null){
			return $query;
		  }else{
			return 'None';
		  } 	
	}
	   
	function send_order_to_kitchen($order_id){
		  $this->db->select('order_details.quantity,product_info.product_name,order_details.sale_prices AS sale_price ,product_unit_name.unitName,order_info.comments,product_info.product_id,order_details.order_details_id,order_details.guest_number,order_info.order_id,order_details.prep_comment,order_info.client_id,order_info.order_place,order_info.room_number,users.username');
		  $this->db->from('order_details,product_info,order_info,users,product_unit_name');
		  $this->db->where('order_info.order_id',$order_id);
		  $this->db->where('order_details.order_id = order_info.order_id');
		  $this->db->where('users.id = order_info.creator');
		  $this->db->where('product_info.unit_name = product_unit_name.unit_name_id');
		  $this->db->where('product_info.show_in_kitchen = "YES"');
		  $this->db->where('order_details.product_id = product_info.product_id');
		  //$this->db->group_by('order_details.product_id');
		  $this->db->group_by('order_details.order_details_id');
		  $query = $this->db->get();
		  $vlue="";
		  if($query!="" || $query!=null){
			return $query;
		  }else{
			return 'None';
		  }
	}
	   function get_option_name($product_id,$order_id,$sale_details_id){
		  $this->db->select('prep_options.option_name');
		  $this->db->from('temp_preparation_option,prep_options');
		  $this->db->where('temp_preparation_option.pre_option_id = prep_options.prep_options_id');
		  $this->db->where('temp_preparation_option.order_id',$order_id);
		  $this->db->where('temp_preparation_option.product_id',$product_id);
		  $this->db->where('temp_preparation_option.sale_details_id',$sale_details_id);
		  $query = $this->db->get();
		  $vlue="";
		  if($query!="" || $query!=null){
		  $option="";
			$row=$query->result_array();
			foreach($row as $row){
			$option=$row['option_name'].', '.$option;
			}
			return $option;
		  }else{
			return 'None';
		  } 
				
	   }
	   



		 function convert_number_to_words( $number )
		 {
		    $hyphen      = '-';
		    $conjunction = ' AND ';
		    $separator   = ', ';
		    $negative    = 'NEGATIVE ';
		    $decimal     = ' POINT ';
		    $dictionary  = array(
		        0                   => 'ZERO',
		        1                   => 'ONE',
		        2                   => 'TWO',
		        3                   => 'THREE',
		        4                   => 'FOUR',
		        5                   => 'FIVE',
		        6                   => 'SIX',
		        7                   => 'SEVEN',
		        8                   => 'EIGHT',
		        9                   => 'NINE',
		        10                  => 'TEN',
		        11                  => 'ELEVEN',
		        12                  => 'TWELVE',
		        13                  => 'THIRTEEN',
		        14                  => 'FOURTEEN',
		        15                  => 'FIFTEEN',
		        16                  => 'SIXTEEN',
		        17                  => 'SEVENTEEN',
		        18                  => 'EIGHTEEN',
		        19                  => 'NINETEEN',
		        20                  => 'TWENTY',
		        30                  => 'THIRTY',
		        40                  => 'FOURTY',
		        50                  => 'FIFTY',
		        60                  => 'SIXTY',
		        70                  => 'SEVENTY',
		        80                  => 'EIGHTY',
		        90                  => 'NINETY',
		        100                 => 'HUNDRED',
		        1000                => 'THOUSAND',
		        1000000             => 'MILLION',
		        1000000000          => 'BILLION',
		        1000000000000       => 'TRILLION',
		        1000000000000000    => 'QUADRILLION',
		        1000000000000000000 => 'QUINTILLION'
		    );
		   
		    if (!is_numeric($number)) {
		        return false;
		    }
		   
		    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		        // overflow
		        trigger_error(
		            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		            E_USER_WARNING
		        );
		        return false;
		    }
		
		    if ($number < 0) {
		        return $negative . $this -> convert_number_to_words(abs($number));
		    }
		   
		    $string = $fraction = null;
		   
		    if (strpos($number, '.') !== false) {
		        list($number, $fraction) = explode('.', $number);
		    }
		   
		    switch (true) {
		        case $number < 21:
		            $string = $dictionary[$number];
		            break;
		        case $number < 100:
		            $tens   = ((int) ($number / 10)) * 10;
		            $units  = $number % 10;
		            $string = $dictionary[$tens];
		            if ($units) {
		                $string .= $hyphen . $dictionary[$units];
		            }
		            break;
		        case $number < 1000:
		            $hundreds  = $number / 100;
		            $remainder = $number % 100;
		            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
		            if ($remainder) {
		                $string .= $conjunction . $this -> convert_number_to_words($remainder);
		            }
		            break;
		        default:
		            $baseUnit = pow(1000, floor(log($number, 1000)));
		            $numBaseUnits = (int) ($number / $baseUnit);
		            $remainder = $number % $baseUnit;
		            $string = $this -> convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		            if ($remainder) {
		                $string .= $remainder < 100 ? $conjunction : $separator;
		                $string .= $this -> convert_number_to_words($remainder);
		            }
		            break;
		    }
		   
		    if (null !== $fraction && is_numeric($fraction)) {
		        $string .= $decimal;
		        $words = array();
		        foreach (str_split((string) $fraction) as $number) {
		            $words[] = $dictionary[$number];
		        }
		        $string .= implode(' ', $words);
		    }
		   
		    return $string;
		}
	   
	function pacage_product($ids){

					$this->db->select('product_name,category_name,product_info.product_id,package_info_id,package_info.quantity');
					$this->db->from('product_info,product_category,package_info');
					$this->db->where('product_info.category = product_category.category_id');
					$this->db->where('product_info.product_id = package_info.product_id');
					$this->db->where('package_id', $ids);
					$query = $this->db->get();
	        
			return $query;
	   }
	   
	function add_restaurant_bill_to_invoice_and_service_token($service_token,$grand_total,$paid_amount,$discount_amount,$order_selected){
    $res_date = '';
    $roomNo = '';
    $discount_rate=0;
    $rates_room=0;
    $total_amount=0;
    $discounts=0;
    $room_rate=0;
    $real_amount=0;
	$mysql_insert = 0;
		if($service_token!= 0 && $service_token!= ''){
			if($grand_total > $paid_amount){
			//echo "1";
			$this->db->select('reservation_new.client_id');
			$this->db->from('reservation_new');
			$this->db->where('reservation_id',$service_token);
			$client_id = $this->db->get();
			$client_id = $client_id->row_array();
			
			$datad = array('client_id'=>$client_id['client_id'],'reservation_id'=>$service_token,'payment_amount'=>$paid_amount,'status'=>0,'userID'=>$this->tank_auth->get_user_id());
				if($paid_amount > 0){
				$this->db->insert('payment_history',$datad);
				$mysql_insert = mysql_insert_id();
				
				if($discount_amount > 0){
				$discount_data = array('client_id'=>$client_id['client_id'],'reservation_id'=>$service_token,'discount_amount'=>$discount_amount,'status'=>0,'userID'=>$this->tank_auth->get_user_id());
				$this->db->insert('discount_client',$discount_data);
				
				$dttaa = array('discount_id'=>mysql_insert_id());
				$this->db->where('order_id',$order_selected);
				$this->db->update('order_reference_table',$dttaa);
				}
				}
				else if($discount_amount > 0){
				$discount_data = array('client_id'=>$client_id['client_id'],'reservation_id'=>$service_token,'discount_amount'=>$discount_amount,'status'=>0,'userID'=>$this->tank_auth->get_user_id());
				$this->db->insert('discount_client',$discount_data);
				
				$dttaa = array('discount_id'=>mysql_insert_id());
				$this->db->where('order_id',$order_selected);
				$this->db->update('order_reference_table',$dttaa);
				}
			}
			else{
				$this->db->where('order_id',$order_selected);
				$service_row = $this->db->get('order_details');
				$service_row = $service_row->result_array();
				foreach($service_row as $row){
				//echo $row['service_in_room_id'];
					$this->db->where('serv_room_id',$row['service_in_room_id']);
					$this->db->delete('service_in_room');
				}
			}
		}

/*         if($paid_amount>0){
		//$pay_amount = 1;
				$pay_data1=array(
				  'serviceToken'=>$service_token,
				  'purpose'=>'Restaurant Bill ('.$discount_amount.'&#2547 Discount)',
				  'amount'=>$paid_amount,
				  'sub_or_add'=>1
				);
                
                $this->accounts_in_out(2,1,$paid_amount,$service_token);
		} */
        return $mysql_insert;
	}

function update_restaurant_bill_to_invoice_and_service_token($service_token,$payment_history_id,$grand_total,$paid_amount,$discount_amount,$prev_grand_total,$prev_paid,$order_selected){
    $res_date = '';
    $roomNo = '';
    $discount_rate=0;
    $rates_room=0;
    $total_amount=0;
    $discounts=0;
    $room_rate=0;
    $real_amount=0;
		if($payment_history_id!=0 && $payment_history_id!=''){
		if($grand_total > $paid_amount){
		$data = array('payment_amount'=>$paid_amount);
		$this->db->where('payment_history_id',$payment_history_id);
		$this->db->update('payment_history',$data);
		}
		else{
		$this->db->where('payment_history_id',$payment_history_id);
		$this->db->delete('payment_history');
		}
		}
		else if($grand_total <= $paid_amount){
				$this->db->where('order_id',$order_selected);
				$service_row = $this->db->get('order_details');
				$service_row = $service_row->result_array();
				foreach($service_row as $row){
					$this->db->where('serv_room_id',$row['service_in_room_id']);
					$this->db->delete('service_in_room');
					//echo "dxjdfks sdfjklsdjkl";
				}
		}
		$this->db->where('order_id',$order_selected);
		$qquery = $this->db->get('order_reference_table');
		$disc = $qquery->row_array();
		
		if($disc['discount_id']!=0 && $disc['discount_id']!= ''){
					if($grand_total > $paid_amount){
						$dttaa = array('discount_amount'=>$discount_amount);
						$this->db->where('discount_id',$disc['discount_id']);
						$this->db->update('discount_client',$dttaa);
					}
					else{
						$this->db->where('discount_id',$disc['discount_id']);
						$this->db->delete('discount_client');
					}
					}
		else if($discount_amount > 0 && $grand_total > $paid_amount){
					$this->db->select('reservation_new.client_id');
					$this->db->from('reservation_new');
					$this->db->where('reservation_id',$service_token);
					$client_id = $this->db->get();
					$client_id = $client_id->row_array();
				$discount_data = array('client_id'=>$client_id['client_id'],'reservation_id'=>$service_token,'discount_amount'=>$discount_amount,'status'=>0,'userID'=>$this->tank_auth->get_user_id());
				$this->db->insert('discount_client',$discount_data);
				
				$dttaa = array('discount_id'=>mysql_insert_id());
				$this->db->where('order_id',$order_selected);
				$this->db->update('order_reference_table',$dttaa);
		}
		

		
		/*
        if($paid_amount>0){
		//$pay_amount = 1;
				$pay_data1=array(
				  'purpose'=>'Restaurant Bill ('.$discount_amount.'&#2547 Discount)',
				  'amount'=>$paid_amount,
				  'sub_or_add'=>1
				);
                
                //$this->accounts_in_out(2,1,$paid_amount,$service_token);
		}
		else{
		$pay_amount=0;
		        $pay_data1=array(
				  'purpose'=>'Restaurant Bill ('.$discount_amount.'&#2547 Discount)',
				  'amount'=>$grand_total,
				  'sub_or_add'=>0
				);
		}
		 $this->db->where('ID', $invoice_id); 
        $this->db->update('invoice_discrip', $pay_data1);  */
        //return mysql_insert_id();
}

	function specific_invoices_shoing($start_date,$end_date,$userid,$waiterid){

					
					$this->db->select('order_info.*,users.username,order_reference_table.grand_total,order_reference_table.discount_type,order_reference_table.discounts_value');
					$this->db->from('order_info,users,order_reference_table');
					$this->db->where('running = "finish"');
					//$this->db->or_where('running = "edit"');
					$this->db->where('order_info.creator = users.id');
					$this->db->where('order_info.order_id = order_reference_table.order_id');
					$this->db->group_by('order_info.order_id');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc >= "'.$start_date.'"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('doc <= "'.$end_date.'"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc <= "'.$start_date.'"');
					}
					if($userid!='' && $userid!='mm'){
						$this->db-> where('creator = "'.$userid.'"');
					}
					else if($waiterid!='' && $waiterid!='mm'){
						$this->db-> where('waiter = "'.$waiterid.'"');
					}
					$query = $this->db->get();
	        
			return $query;
	   }
	function specific_invoices_shoing_for_print($start_date,$end_date,$userid,$waiterid){

					$timezone = "Asia/Dhaka";
					date_default_timezone_set($timezone);
					if($start_date=='mm' && $end_date=='mm' && $userid=='mm' && $this->uri->segment(6)==''){
						$start_date=date('Y-m-d');
						$end_date=date('Y-m-d');
					}
					
					$this->db->select('order_info.*,users.username,order_reference_table.grand_total,order_reference_table.discount_type,order_reference_table.discounts_value');
					$this->db->from('order_info,users,order_reference_table');
					$this->db->where('running = "finish"');
					//$this->db->or_where('running = "edit"');
					$this->db->where('order_info.creator = users.id');
					$this->db->where('order_info.order_id = order_reference_table.order_id');
					$this->db->group_by('order_info.order_id');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc >= "'.$start_date.'"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('doc <= "'.$end_date.'"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc <= "'.$start_date.'"');
					}
					if($userid!='' && $userid!='mm'){
						$this->db-> where('creator = "'.$userid.'"');
					}
					else if($waiterid!='' && $waiterid!='mm'){
						$this->db-> where('waiter = "'.$waiterid.'"');
					}
					$query = $this->db->get();
			return $query;
	   }
	   
		function specific_date_order_due_paid($date){
			$this->db->select('*');
			$this->db->select_sum('restaurant_transaction.transaction_amount');
			$this->db->from('restaurant_transaction,order_info');
			$this->db->where('restaurant_transaction.purpose = "Sale Due" ');
			$this->db->where('restaurant_transaction.transaction_date = "'.$date.'" ');
			$this->db->where('restaurant_transaction.table_ref_id = order_info.order_id');
			$this->db->where('order_info.doc != "'.$date.'" ');
			$this->db->where('order_info.order_type = "0" '); 
			$this->db->group_by('order_info.order_id'); 
			$query = $this->db->get();
			return $query;
		}

	   function specific_expense_shoing($start_date,$end_date){

					$this->db->select('restaurant_expense.*,users.username');
					$this->db->from('restaurant_expense,users');
					$this->db->where('restaurant_expense.creator = users.id');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc >= "'.$start_date.'"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('doc <= "'.$end_date.'"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('doc <= "'.$start_date.'"');
					}
					$query = $this->db->get();
	        
			return $query;
	   }
	   function specific_cash_in_shoing($start_date,$end_date){

					$this->db->select_sum('restaurant_transaction.transaction_amount');
					$this->db->from('restaurant_transaction');
					//$this->db->where('restaurant_transaction.creator = users.id');
					$this->db->where('restaurant_transaction.transaction_type','in');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC >= "'.$start_date.' 00:00:00"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$end_date.' 24:59:59"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$start_date.' 24:59:59"');
					}
					$query = $this->db->get();
	        
			return $query->row_array();
	   }
	   function specific_cash_out_shoing($start_date,$end_date){

					$this->db->select_sum('restaurant_transaction.transaction_amount');
					$this->db->from('restaurant_transaction');
					//$this->db->where('restaurant_transaction.creator = users.id');
					$this->db->where('restaurant_transaction.transaction_type','out');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC >= "'.$start_date.' 00:00:00"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$end_date.' 24:59:59"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$start_date.' 24:59:59"');
					}
					$query = $this->db->get();
	        
			return $query->row_array();
	   }
	   function closing_cash_summery($start_date,$end_date){

					$this->db->select_max('cashbox_info.cashbox_id');
					$this->db->from('cashbox_info');
					//$this->db->where('restaurant_transaction.creator = users.id');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('cashbox_info.DOC >= "'.$start_date.' 00:00:00"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('cashbox_info.DOC <= "'.$end_date.' 24:59:59"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('cashbox_info.DOC <= "'.$start_date.' 24:59:59"');
					}
					$query = $this->db->get();
					$cash_id = $query->row_array();
						$this->db-> select('cashbox_info.closing_cash');
						$this->db-> where('cashbox_info.cashbox_id',$cash_id['cashbox_id']);
						$que = $this->db->get('cashbox_info');
						if($que->num_rows==0){
							$data['closing_cash'] = 0;
							return $data;
						}
						else{
							return $que->row_array();
						}
			
	   }
	   function total_withdrawal_cash_summery($start_date,$end_date){
					$this->db->select_sum('restaurant_transaction.transaction_amount');
					$this->db->from('restaurant_transaction');
					//$this->db->where('restaurant_transaction.creator = users.id');
					$this->db->where('restaurant_transaction.transaction_type','out');
					$this->db->where('restaurant_transaction.purpose','Sent To Account');
					if($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC >= "'.$start_date.' 00:00:00"');
					}
					if($end_date!='' && $end_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$end_date.' 24:59:59"');
					}
					elseif($start_date!='' && $start_date!='mm'){
						$this->db-> where('restaurant_transaction.DOC <= "'.$start_date.' 24:59:59"');
					}
					$query = $this->db->get();
	        
			return $query->row_array();
	   }
	   	function specific_date_sale_price_calculation( $start_date, $end_date )
		{
		$total_sale = 0;
								$this -> db -> select('total_amount');
								$this -> db -> select('discount_amount');
								$this -> db -> select('service_charge');
								$this -> db -> from('order_info');
									if($start_date!='' && $start_date!='mm'){
										$this->db-> where('doc >= "'.$start_date.'"');
									}
									if($end_date!='' && $end_date!='mm'){
										$this->db-> where('doc <= "'.$end_date.'"');
									}
									elseif($start_date!='' && $start_date!='mm'){
										$this->db-> where('doc <= "'.$start_date.'"');
									}
									$this->db -> where('order_info.running = "finish"');
									$query =$this->db -> get();
			foreach($query -> result() as $result):
					$total_sale = (($result -> total_amount+$result -> service_charge)-$result -> discount_amount)+$total_sale;
			endforeach;
			return $total_sale;
		}
		
		function specific_date_buy_price_calculation( $start_date, $end_date  )
		{

					$this -> db -> select( 'cost_price,quantity' );
					$this -> db -> from('order_info,order_details,product_info');
									if($start_date!='' && $start_date!='mm'){
										$this->db-> where('order_details.doc >= "'.$start_date.'"');
									}
									if($end_date!='' && $end_date!='mm'){
										$this->db-> where('order_details.doc <= "'.$end_date.'"');
									}
									elseif($start_date!='' && $start_date!='mm'){
										$this->db-> where('order_details.doc <= "'.$start_date.'"');
									}
									$this->db -> where('order_info.running = "finish"');
									$this->db -> where('order_info.order_id = order_details.order_id');
									$this->db -> where('order_details.product_id = product_info.product_id');
									
									$query = $this->db -> get();

			$total_buy=0;
			foreach($query -> result() as $result):
					$total_buy = $result -> cost_price * $result -> quantity + $total_buy;
			endforeach;
			return $total_buy;
		
		}
        
function accounts_in_out($purpuse_id,$purpuse_type,$amount,$serviceToken=null){
    $this->load->library('tank_auth');
    if($serviceToken!=null){
        $data=array(
              'purpuse_id'=>$purpuse_id,
              'purpuse_type'=>$purpuse_type,
              'amount'=>abs($amount),
              'serviceToken'=>$serviceToken,
              'userID'=>$this->tank_auth->get_user_id()
           );
        $this->db->insert('account_table', $data); 
		return mysql_insert_id();
    }else{
        $data1=array(
              'purpuse_id'=>$purpuse_id,
              'purpuse_type'=>$purpuse_type,
              'amount'=>abs($amount),
              'userID'=>$this->tank_auth->get_user_id()
           );
        $this->db->insert('account_table', $data1); 
		return mysql_insert_id();
    }
}

	function check_already_exist($table_name,$field_name,$value,$field_name2='',$value2=''){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($field_name,$value);
		if($field_name2==''){ $this->db->where($field_name2,$value2); }
		$query = $this->db->get();
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	
	function catering_log_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$store_name = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			$end_date = $end_date.' 60:60:60';
			
			/* $this->db->select('catering_log.*,catering_info.*,users.username,user_full_name');
			$this->db->from('catering_log,catering_info,users');
			$this->db->where('catering_log.item_id = catering_info.catering_id');
			$this->db->where('catering_log.creator = users.id');
			$this->db->where('((catering_log.purpose = 2) OR (catering_log.purpose = 3))');

			if($start_date!='mm' && $start_date!=''){
			$this->db->where('catering_log.doc >= "'.$start_date.'"');
			$this->db->where('catering_log.doc <= "'.$end_date.'"');
			}
			if($store_name!='mm' && $store_name!=''){
			$this->db->where('catering_info.store_name = "'.$store_name.'"');
			}
			$this->db->group_by('catering_log.catering_log_id');
			$que = $this->db->get();
			return $que; */
			
			$this->db->select('catering_info.*');
			$this->db->from('catering_log,catering_info');
			$this->db->where('catering_log.item_id = catering_info.catering_id');
			if($start_date!='mm' && $start_date!=''){
			$this->db->where('catering_log.doc >= "'.$start_date.'"');
			$this->db->where('catering_log.doc <= "'.$end_date.'"');
			}
			if($store_name!='mm' && $store_name!=''){
			$this->db->where('catering_info.store_name = "'.$store_name.'"');
			}
			$this->db->group_by('catering_log.item_id');
			$que = $this->db->get();
			return $que;
	}
	
	function product_sale_summery_shoing(){
			$json_response = array();
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$product_id = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			    $end_date = $start_date;
			}
			
			$this->db->select('order_info.*,SUM(order_details.quantity) AS qnty,product_info.product_name,unitName');
			$this->db->from('order_info,order_details,product_info,product_unit_name');
			$this->db->where('order_info.order_id = order_details.order_id');
			
			$this->db->where('order_details.product_id = product_info.product_id');
			$this->db->where('product_unit_name.unit_name_id = product_info.unit_name');
			
			if($start_date!='mm' && $start_date!=''){
			    $this->db->where('order_info.doc >= "'.$start_date.'"');
			    $this->db->where('order_info.doc <= "'.$end_date.'"');
			}
			if($product_id!='mm' && $product_id!=''){
			    $this->db->where('order_details.product_id = "'.$product_id.'"');
			}
			$this->db->group_by('order_details.product_id');
			$que = $this->db->get();
			if($que->num_rows() > 0){
			    return $que->result();
			}
			else{
			    return FALSE;
			}
			
	}
	
	function get_item_total_log($catering_id,$purpose){
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			$store_name = $this->uri->segment(5);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			$end_date = $end_date.' 60:60:60';
			
			$this->db->select('catering_log.provider_name,catering_log.quantity AS sin_quantity');
			//$this->db->select_sum('catering_log.quantity');
			$this->db->from('catering_log');
			$this->db->where('catering_log.purpose',$purpose);
			$this->db->where('catering_log.item_id',$catering_id);

			if($start_date!='mm' && $start_date!=''){
			$this->db->where('catering_log.doc >= "'.$start_date.'"');
			$this->db->where('catering_log.doc <= "'.$end_date.'"');
			}
			//$this->db->group_by('catering_log.catering_log_id');
			$que = $this->db->get();
			$row = $que->result_array();
			
			$des = '';
			$quantity = 0;
			$i=0;
			foreach($row as $row){
				if($purpose == 0){
					if($i==0){$des=$des.' Purchase: ';}
				$des=$des.$row['provider_name'].': '.$row['sin_quantity'].','; 
				}
				else if($purpose == 2){
					if($i==0){$des=$des.' Damage: ';}
				$des=$des.$row['provider_name'].': '.$row['sin_quantity'].','; 
				}
				else if($purpose == 3){
					if($i==0){$des=$des.' Lost: ';}
				$des=$des.$row['provider_name'].': '.$row['sin_quantity'].','; 
				}
				else if($purpose == 4){
					if($i==0){$des=$des.' Add to Use: ';}
				$des=$des.$row['provider_name'].': '.$row['sin_quantity'].','; 
				}
				//$quantity = $row['quantity'];
				$i++;
			}
			
			$descrip['descrip'] = $des;
			$descrip['quantity'] = $this->total_quantity_happen($catering_id,$purpose);
			
			return $descrip;
	}
	
	function get_prev_item_total($catering_id){
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			$end_date = $end_date.' 60:60:60';
			
			$this->db->select_sum('catering_log.quantity');
			$this->db->from('catering_log');
			if($start_date!='mm' && $start_date!=''){
			$this->db->where('catering_log.doc < "'.$start_date.'"');
			}
			$this->db->group_by('catering_log.item_id');
			$que = $this->db->get();
			$row = $que->row_array();
	}
	
	function total_quantity_happen($catering_id,$purpose){
			$start_date = $this->uri->segment(3);
			$end_date = $this->uri->segment(4);
			if($end_date=='' || $end_date=='mm'){
			$end_date = $start_date;
			}
			$end_date = $end_date.' 60:60:60';
			
			$this->db->select_sum('catering_log.quantity');
			$this->db->from('catering_log');
			$this->db->where('catering_log.item_id',$catering_id);
			$this->db->where('catering_log.purpose',$purpose);

			if($start_date!='mm' && $start_date!=''){
			$this->db->where('catering_log.doc >= "'.$start_date.'"');
			$this->db->where('catering_log.doc <= "'.$end_date.'"');
			}
			$this->db->group_by('catering_log.item_id');
			$que = $this->db->get();
			$row = $que->row_array();
			if(count($row) > 0){
			return $row['quantity'];
			}
			else{
				return 0;
			}
	}
	
	function transaction_entry($transaction_type,$amount,$date,$purpose,$table_ref_name,$table_ref_id){
	
		$data = array(
						'transaction_type'=>$transaction_type,
						'transaction_amount'=>$amount,
						'transaction_date' => $date,
						'purpose' => $purpose,
						'table_ref_name' => $table_ref_name,
						'table_ref_id' => $table_ref_id ,
						'creator' => $this->tank_auth->get_user_id()
					);
					
			$this->db->insert('restaurant_transaction',$data);
			return true;
	}
	function update_cashbox_in_transaction($amount,$in_or_out){
			$this->db->select_max('cashbox_id');
			$query = $this->db->get('cashbox_info');
			$cashbox_id = $query->row_array();
			if($in_or_out == 1){
			$sql = "update cashbox_info set closing_cash = closing_cash + ".$amount." where cashbox_id = ".$cashbox_id['cashbox_id'];
			}
			else if($in_or_out == 0){
			$sql = "update cashbox_info set closing_cash = closing_cash - ".$amount." where cashbox_id = ".$cashbox_id['cashbox_id'];
			}
			$que = $this->db->query($sql);
	}
	
	function update_transaction_cashbox_when_update_transaction($amount,$purpose,$table_ref_name,$table_ref_id,$type){
	
			$up_data = array('transaction_amount' => $amount);
			$this->db->select('restaurant_transaction.*');
			$this->db->from('restaurant_transaction');
			$this->db->where('purpose', $purpose);
			$this->db->where('table_ref_name', $table_ref_name);
			$this->db->where('table_ref_id', $table_ref_id);
			$quer = $this->db->get();
			$roo = $quer->row_array();
			$this->db->where('transaction_id', $roo['transaction_id']);
			$this->db->update('restaurant_transaction',$up_data);
			if($type == 'out'){
			$this->dbm_model->update_cashbox_in_transaction($roo['transaction_amount'],1);
			$this->dbm_model->update_cashbox_in_transaction($amount,0);
			}
			else if($type == 'in'){
			$this->update_cashbox_in_transaction($roo['transaction_amount'],0);
			$this->update_cashbox_in_transaction($amount,1);
			}
			
	}
	
	function transaction_show_in_cashbox($cashbox_id){
		$cashbox_id = $this->uri->segment(3);
		$this->db->where('cashbox_id',$cashbox_id);
		$quer = $this->db->get('cashbox_info');
		if($quer->num_rows() > 0){
			$rrow = $quer->row_array();
			$start_date = $rrow['DOC'];
			$end_date = $rrow['closing_date'];
			if($end_date == '0000-00-00 00:00:00'){
				$end_date = date('Y-m-d H:i:s',time());
				/* $en_date = explode(' ',$start_date);
				$end_date = $en_date[0].' 24:59:59'; */
			}
			//echo $end_date;
		
		$trans_type = 'mm';
		$purpose = 'mm';

            $json_response = array();
				$this->db->select('*');
				$this->db->from('restaurant_transaction');
				$this->db->where('restaurant_transaction.DOC > "'.$start_date.'"');
				$this->db->where('restaurant_transaction.DOC < "'.$end_date.'"');
				if($trans_type!='mm'){$this->db->where('transaction_type',$trans_type);}
				if($purpose!='mm'){$this->db->where('purpose',$purpose);}
				$this->db->where('purpose <>',"Party ");
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
               // $row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
                array_push($json_response,$row_array);
            }
		   $data['transaction_setup'] = $transaction_setup->result_array();
		   return $data['transaction_setup'];
		   //$this -> load -> view('print_transaction_view',$data);
		}
	}
				
			/*************************************************
			 *  Function to Backup The Running Database       *
			 * ************************************************/
			 function backup_database()
			 {
			 	$timezone = "Asia/Dhaka";
				date_default_timezone_set($timezone);
				$bd_date = date('Y-m-d');
				$this->load->dbutil();
				/* LIST All Database */
				/*$dbs = $this->dbutil->list_databases();
				foreach ($dbs as $db)
				{
					echo $db;
				}*/
			
				if ($this->dbutil->database_exists('new_hotel'))
				{
				  $prefs = array(
									'tables'      => array(),  // Array of tables to backup.
									//'ignore'      => array(),           // List of tables to omit from the backup
									'format'      => 'zip',             // gzip, zip, txt
									//'filename'    => 'test.sql',    // File name - NEEDED ONLY WITH ZIP FILES
									'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
									'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
									'newline'     => "\n"               // Newline character used in backup file
									);
					$backup =& $this->dbutil->backup($prefs);
					/***********************************************************************************
					 * Back up System For Windows  *
					 *******************************/
					
					//Load the file helper and write the file to your server 
					$path = "F:\\new_hotel_backup\\".$bd_date; // For Windows
					
				    if(!is_dir($path)) //create the folder if it's not already exists
				    {
				      mkdir($path,0700,TRUE);
				    } 
					$this->load->helper('file');
					write_file($path.'\\new_hotel.zip', $backup); // For Windows
					
					/*********** End Of Windows Backup **************************************************/
					
					
					/****************************
					 * Back up System For Linux *
					 ****************************/
					/* Load the file helper and write the file to your server */
					//chmod("/opt/lampp/htdocs/backup", 0700);
					/*
					$path = "/opt/lampp/htdocs/cashCarry/dataBase/".$bd_date; // For Linux
				    if(!is_dir($path)) //create the folder if it's not already exists
				    {
				      mkdir($path,0700,TRUE);
				    } 
					$this->load->helper('file');
					write_file($path.'/cash_carry.sql', $backup); // For Linux
					
					$prev_month = date("m",strtotime(date("Y-m-d", strtotime($bd_date)) . " -1 month"));
					$prev_year = date("Y",strtotime(date("Y-m-d", strtotime($bd_date)) . " -1 month"));
					$num_of_days = cal_days_in_month(CAL_GREGORIAN, $prev_month, $prev_year).'</br>';
					
					for($all_date = 1; $all_date < $num_of_days; $all_date++)
					{
						$temp_date = date("Y-m-d",strtotime($prev_year.'-'.$prev_month.'-'.$all_date));
						if (is_dir('/opt/lampp/htdocs/cashCarry/dataBase/'.$temp_date)) {
							unlink('/opt/lampp/htdocs/cashCarry/dataBase/'.$temp_date.'/cash_carry.sql');
							rmdir('/opt/lampp/htdocs/cashCarry/dataBase/'.$temp_date);
						}
					}
					/*********** End Of Windows Backup **************************************************/

					return true;
				}
				return false;
			 }


}