<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Report_model extends CI_model{
		
		private $hotel_id;
		function __construct()
		{
			$this -> hotel_id = $this -> tank_auth -> get_hotel_id();
		}
		/**********************
		 * Shop Information
		 * 23-11-2013
		 * Arafat Mamun
		 **********************/
		function shop_information($specific, $hotel_id)
		{
			if($specific) $this -> db -> where('hotel_id', $hotel_id);
			//$this -> db -> where('shop_status', 1);
			return $this -> db -> get('hotel_setup');
		}
		
		/*******************************
		 * System For vission Express
		 * Product Transfer Log
		 * 14-12-2013
		 * Arafat Mamun
		********************************/
		function product_transfer_log($selected_product_id, $selected_hotel_id, $transfer_mode, $start_date, $end_date)
		{
			$specific_product = '';
			if($selected_product_id != 'notSelected')
				$specific_product = 'AND product_id ='.$selected_product_id;

			
			$in_mode = '';
			$from_shop = '';
			$out_mode = '';
			$to_shop = '';
			if($transfer_mode == 'inProducts')
			{
				if($selected_hotel_id != 'notSelected')
				{
					$from_shop = 'AND from_shop='.$selected_hotel_id; //*
					$to_shop = 'AND from_shop ='.$selected_hotel_id;
				}
				$in_mode = 'AND to_shop ='.$this -> hotel_id;//*
				$out_mode = 'AND to_shop ='.$this -> hotel_id;
			}
			else if($transfer_mode == 'outProducts')
			{
				if($selected_hotel_id != 'notSelected')
				{
					$to_shop = 'AND to_shop ='.$selected_hotel_id;//*
					$from_shop = 'AND to_shop='.$selected_hotel_id;
				}
				$out_mode = 'AND from_shop ='.$this -> hotel_id;//*
				$in_mode = 'AND from_shop ='.$this -> hotel_id;
			}
			else
			{
				if($selected_hotel_id != 'notSelected')
					$from_shop = 'AND from_shop ='.$selected_hotel_id;
				$in_mode = 'AND to_shop ='.$this -> hotel_id;
				if($selected_hotel_id != 'notSelected')
					$to_shop = 'AND to_shop ='.$selected_hotel_id;
				$out_mode = 'AND from_shop ='.$this -> hotel_id;
			}
				
			$query = $this -> db -> query("
											SELECT  transfer_id, product_info.product_id,product_name,
													from_shop, transfered_from,
													transfered_to,to_shop , transfer_amount ,
													unit_buy_price, transferred_by, transfer_date
			
			
											FROM	product_info,(  SELECT  transfer_id, product_id,
																			from_shop, transfered_from,
																			shop_name as  transfered_to,
																			to_shop , transfer_amount ,
																			unit_buy_price, transferred_by, transfer_date
																	
																	FROM shop_setup,(	SELECT  transfer_id, product_id,
																								from_shop, shop_name as transfered_from,
																								to_shop , transfer_amount ,
																								unit_buy_price, transferred_by, transfer_date
																											
																						FROM 	product_transfer_log, shop_setup
																						WHERE   hotel_id = from_shop		 
																						AND     (transfer_date BETWEEN '".$start_date."' AND '".$end_date."')
																						".$specific_product."
																						".$out_mode."
																						".$to_shop."
																					) AS temp1
																	WHERE hotel_id = to_shop
																UNION
																	SELECT  transfer_id, product_id,
																			from_shop, shop_name as  transfered_from,
																			transfered_to,
																			to_shop , transfer_amount ,
																			unit_buy_price, transferred_by, transfer_date
																	
																	FROM shop_setup,(	SELECT  transfer_id, product_id,
																								from_shop, shop_name as transfered_to,
																								to_shop , transfer_amount ,
																								unit_buy_price, transferred_by, transfer_date
																											
																						FROM 	product_transfer_log, shop_setup
																						WHERE   hotel_id = to_shop	 
																						AND     (transfer_date BETWEEN '".$start_date."' AND '".$end_date."')
																						".$specific_product."
																						".$in_mode."
																						".$from_shop."
																					) AS temp2
																	WHERE hotel_id = from_shop
																) AS all_info
											WHERE product_info.product_id = all_info.product_id
											ORDER BY transfer_date asc
										");
			return $query;
		}
		/********************************
		 *  Get All Stock Info For Report *
		 * ******************************/
		 function get_all_stock_report()
		 {
					  $this -> db -> order_by("product_info.product_name", "asc");
			$query = $this -> db -> select('product_info.product_id, product_info.product_name,
												bulk_stock_info.stock_amount, sale_price_info.unit_sale_price,
												bulk_stock_info.bulk_unit_buy_price')
									 -> from('product_info, bulk_stock_info, sale_price_info')
									 -> where('bulk_stock_info.hotel_id', $this -> hotel_id)
									 -> where('product_info.product_id = bulk_stock_info.product_id')
									 -> where('product_info.product_id = sale_price_info.product_id')
									 -> where('bulk_stock_info.hotel_id = sale_price_info.hotel_id')
									 -> group_by('product_info.product_name')
		                  			 -> get();
			 return $query;
		 }
		 
		 
		 
		  /********************************************
		  *  All Buy Details Of AN Individual Product  *
		  *********************************************/
		  function fatch_all_buy_details( $product_id)
		  {
			$this -> db -> select('(((grand_total + transport_cost) / grand_total) * ( MAX( unit_buy_price ) ) ) as unit_buy_price, distributor_name, distributor_info.distributor_id,purchase_receipt_info.receipt_id,
								   receipt_date, SUM(purchase_quantity) AS purchase_quantity, purchase_creator');
			//$this -> db -> from('catagory_info,  company_info, product_info, purchase_info, stock_info, sale_price_info,  bulk_stock_info');
			$this -> db -> from('purchase_receipt_info, purchase_info,  distributor_info');
			$this -> db -> where('purchase_info.product_id = "'.$product_id.'"');
			//$this -> db -> where('bulk_stock_info.product_id = product_info.product_id');
			//$this -> db -> where('catagory_info.catagory_name = product_info.catagory_name');
			$this -> db -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id');
			//$this -> db -> where('product_info.product_id = purchase_info.product_id');
			$this -> db -> where('purchase_info.purchase_receipt_id = purchase_receipt_info.receipt_id');
			//$this -> db -> where('product_info.product_id = sale_price_info.product_id');
			$this -> db -> group_by('purchase_info.purchase_receipt_id');
			$query = $this -> db -> get();
			return $query;
		}
		/************************************************
		 *  Select Invoice ID of a Specific Date ********
		 * *********************************************/
		 function invoice_id_of_a_specific_date(  $start, $end )
		{
			$query = $this -> db -> select('invoice_id, invoice_doc, customer_name,grand_total,total_paid')
								 -> from('invoice_info,customer_info')
								 -> where('customer_info.customer_id = invoice_info.customer_id')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			return $query;
		}
		
		/**************************************************
		 * Calculate Sale Price of a Specific date     **
		  * *********************************************/
		function specific_date_sale_price_calculation( $start, $end )
		{
			/*foreach($query -> result() as $field):
				$invoice_id = $field -> invoice_id;
				$details = $this -> db -> select_sum( 'exact_sale_price')
									   -> from('sale_details')
									   -> where('invoice_id = "'.$invoice_id.'"')
									   -> get();
														   
				$data[ $invoice_id ] = $details;
				//$sale_price = 0;
			//	$buy_price = 0;
				//foreach($details -> result() as $calculate)
					//$sale_price += $calculate -> unit_sale_price;
				//endforeach;
			endforeach;
			if($query -> num_rows > 0) return $data;*/
			/****
			 * For Previous version
			 * 21-11-2013
			 * Arafat Mamun
			 * ********************/
			 
			/* $query = $this -> db -> select_sum( 'exact_sale_price')
								 -> from('sale_details,invoice_info')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								 -> where('invoice_info.invoice_id = sale_details.invoice_id' )
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get(); */
			$query = $this -> db -> select_sum( 'grand_total')
								 -> from('invoice_info')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								// -> where('invoice_info.invoice_id = sale_details.invoice_id' )
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			foreach($query -> result() as $result):
					$total_sale = $result -> grand_total;
			endforeach;
			return $total_sale;
			/************* END of For Previous version***************/
			
			/*******************
			 * For Link Traders
			 * 21-11-2013
			 * Arafat Mamun
			 *******************
			$query = $this -> db -> select_sum( 'product_sale_price')
								 -> from('gate_pass_details,gate_pass_info')
								 -> where('gate_pass_issue_date >= "'.$start.'"')
								 -> where('gate_pass_issue_date <= "'.$end.'"')
								 -> where('gate_pass_details.product_status', 4)
								 ->where('gate_pass_details.gate_pass_id = gate_pass_info.gate_pass_id' )
								 -> get();
			
			foreach($query -> result() as $result):
					$total_sale = $result -> product_sale_price;
			endforeach;
			return $total_sale;
			*/
		}
		
		
		/**************************************************
		 * Calculate Sale Price of a Specific date     **
		  * *********************************************/
		function specific_date_buy_price_calculation( $start, $end  )
		{
			/*
			foreach($query -> result() as $field):
				$invoice_id = $field -> invoice_id;
				$details = $this -> db -> select_sum( 'unit_buy_price')
														   -> from('sale_details')
														   -> where('invoice_id = "'.$invoice_id.'"')
														   -> get();
														   
				$data[ $invoice_id ] = $details;
				//$sale_price = 0;
			//	$buy_price = 0;
				//foreach($details -> result() as $calculate)
					//$sale_price += $calculate -> unit_sale_price;
				//endforeach;
			endforeach;
			if($query -> num_rows > 0) return $data;
			*/
			/* Previous */
			$query = $this -> db -> select( 'unit_buy_price,sale_quantity' )
								 -> from('sale_details,invoice_info')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								 -> where('invoice_info.invoice_id = sale_details.invoice_id' )
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			
		
			/*******************
			 * For Link Traders
			 * 21-11-2013
			 * Arafat Mamun
			 *******************
			$query = $this -> db -> select_sum( 'product_buy_price')
								 -> from('gate_pass_details,gate_pass_info')
								 -> where('gate_pass_issue_date >= "'.$start.'"')
								 -> where('gate_pass_issue_date <= "'.$end.'"')
								  -> where('gate_pass_details.product_status', 4)
								 ->where('gate_pass_details.gate_pass_id = gate_pass_info.gate_pass_id' )
								 -> get();
			*/
			$total_buy=0;
			foreach($query -> result() as $result):
					$total_buy = $result -> unit_buy_price * $result -> sale_quantity + $total_buy;
			endforeach;
			return $total_buy;
		
		}
		
		/******************************************
		* Calculate Cash of Specific date      **
		* *****************************************/
		function specific_date_cash_calculation( $start, $end )
		{
			/*$query = $this -> db -> select_sum( 'total_paid' )
								 -> from('invoice_info')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			foreach($query -> result() as $result):
					$total_cash = $result -> total_paid;
			endforeach;
			return $total_cash;
			*/
			
			$query = $this -> db -> query("
											SELECT SUM(temp_one.amount_paid) as total_paid
											FROM 
											(
												SELECT transaction_details.transaction_amount AS amount_paid,transaction_doc,customer_info.customer_id
												FROM customer_info,transaction_ref_details,transaction_details,invoice_info

												WHERE  transaction_ref_details.transaction_purpose = 'sale'
												AND invoice_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
												AND transaction_details.transaction_mode = 'cash'
												AND transaction_details.transaction_amount <> 0
												AND transaction_ref_details.ref_id = invoice_info.invoice_id
												AND invoice_info.customer_id = customer_info.customer_id
												AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
												AND transaction_details.transaction_doc >= '".$start."'
												AND transaction_details.transaction_doc <= '".$end."'
											) as temp_one		  		  
										");
				foreach($query -> result() as $result):
						$total_cash = $result -> total_paid;
				endforeach;
				return $total_cash;
			
			
			
		}
		/******************************************
		* Calculate Discount of Specific date      **
		* *****************************************/
		function specific_date_discount_calculation( $start, $end )
		{
			$query = $this -> db -> select_sum( 'discount' )
								 -> from('invoice_info')
								 -> where('invoice_doc >= "'.$start.'"')
								 -> where('invoice_doc <= "'.$end.'"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			$total_dicount = 0;
			foreach($query -> result() as $result):
					$total_dicount = $result -> discount;
			endforeach;
			return $total_dicount;
		}
		/***************************************************
		* Calculate Purchase Amount of Specific date      **
		* **************************************************/
		function specific_date_purchase_amount_calculation( $start, $end )
		{
			$query = $this -> db -> select( 'SUM( grand_total + transport_cost ) AS grand_total' )
								 -> from('purchase_receipt_info')
								 -> where('receipt_date >= "'.$start.'"')
								 -> where('receipt_date <= "'.$end.'"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			$grand_total = 0;
			foreach($query -> result() as $result):
					$grand_total = $result -> grand_total;
			endforeach;
			return $grand_total;
		}
		
		/***************************************************
		* Calculate Expence Amount of Specific date      **
		* **************************************************/
		function specific_date_expense_amount_calculation( $start, $end )
		{
			$query = $this -> db -> select_sum( 'expense_amount' )
								 -> from('expense_info')
								 -> where('expense_type != "Transport Cost For Purchase"')
								 -> where('expense_doc >= "'.$start.'"')
								 -> where('expense_doc <= "'.$end.'"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			foreach($query -> result() as $result):
					$expense_amount = $result -> expense_amount;
			endforeach;
			return $expense_amount;
		}
		
	    /***********************************************************
		**************Fatch All Purchase Receipt ID*****************
		************************************************************/
	    function all_purchase_receipt()
		{
			$this->db->order_by("receipt_id", "asc");
			$query = $this -> db -> select('receipt_id, distributor_name,distributor_info.distributor_id')
								 -> from('purchase_receipt_info, distributor_info')
								 -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			return $query;
		}
			
		/************************************************
		 *  Select Purchase Receipt ID of a Specific Date*
		 * **********************************************/
		function purchase_id_of_a_specific_date(  $start, $end )
		{
			$this -> db -> order_by("receipt_id", "asc");
			$query = $this -> db -> select('receipt_id, distributor_name, receipt_date,
											total_paid, receipt_creator, grand_total')
								 -> from('purchase_receipt_info, distributor_info')
								 -> where('receipt_date >= "'.$start.'"')
								 -> where('receipt_date <= "'.$end.'"')
								 -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			return $query;
		}
			
		/*************************************************
		  *  General Details OF a Purchase Receipt                  *
		  * ***********************************************/
		function specific_purchase_receipt_general( $receipt_id)
		{
			$query = $this -> db -> select('receipt_id, purchase_receipt_info.distributor_id, grand_total, receipt_creator, receipt_status, total_paid ,receipt_date ,
											distributor_name, user_full_name, username, transport_cost, gift_on_purchase')
								 -> from('purchase_receipt_info, distributor_info, users')
								 -> where('receipt_id = "'.$receipt_id.'"')
								 -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
								 -> where('purchase_receipt_info.receipt_creator = users.id')
								 -> where('purchase_receipt_info.hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			return $query;
		}
		/*************************************************
		*  Details of A Specific Purchase Receipt   *
		* ***********************************************/
		function specific_purchase_receipt( $receipt_id)
		{
		$this -> db -> order_by("product_name", "asc");
		$query = $this -> db -> select('product_name, purchase_info.product_id, purchase_quantity AS number_of_quantity,
									    purchase_id, unit_buy_price, purchase_expire_date')
							 -> from('purchase_info,product_info,purchase_receipt_info')
							 -> where('purchase_receipt_id = "'.$receipt_id.'"')
							 -> where('purchase_info.product_id = product_info.product_id')
							 -> where('purchase_info.purchase_receipt_id = purchase_receipt_info.receipt_id')
							 -> where('hotel_id', $this->tank_auth->get_hotel_id())
							 //-> group_by('product_info.product_id')
							 -> get();
		return $query;
		}
			  
		
		/***********************************
		 * Date wise Financial Statement *
		 * ********************************/
		function date_wise_financial_statement_calculation( $start ,  $end)
		{
			/*$query = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
												transaction_details.transaction_amount, transaction_details.transaction_mode, 
											if( transaction_details.transaction_mode = 'cash', transaction_ref_details.transaction_purpose, 
												cheque_reference_info.cheque_ref_purpose ) AS transaction_purpose,transaction_details.transaction_doc	
											FROM cheque_reference_info,transaction_details,cheque_info,transaction_ref_details

											WHERE transaction_details.transaction_doc >= '".$start."' AND transaction_details.transaction_doc <= '".$end."'
											AND if(transaction_details.transaction_mode = 'cheque',
											transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
											AND cheque_reference_info.cheque_id = cheque_info.cheque_id
											AND cheque_info.cheque_status = 'honored',transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id)	
										 ");
			return $query;*/

			$query = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,transaction_ref_details.ref_id,
											transaction_details.transaction_amount, transaction_details.transaction_mode, 
											transaction_ref_details.transaction_purpose,transaction_details.transaction_doc	
											
											FROM transaction_details,transaction_ref_details

											WHERE transaction_details.transaction_doc >= '".$start."' AND transaction_details.transaction_doc <= '".$end."'
											AND transaction_details.transaction_mode = 'cash'
											AND transaction_details.transaction_amount <> 0
											AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
											AND transaction_details.transaction_type = transaction_ref_details.transaction_type
										");
										
			$query2= $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
											transaction_details.transaction_amount, transaction_details.transaction_mode, 
											cheque_reference_info.cheque_ref_purpose,transaction_details.transaction_doc,cheque_reference_info.ref_id	
											
											FROM cheque_reference_info,transaction_details,cheque_info

											WHERE transaction_details.transaction_doc >= '".$start."' AND transaction_details.transaction_doc <= '".$end."'
											AND transaction_details.transaction_mode = 'cheque'
											AND transaction_details.transaction_amount <> 0
											AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
											AND cheque_reference_info.cheque_id = cheque_info.cheque_id
											AND cheque_info.cheque_status = 'honored'
											AND transaction_details.transaction_type = cheque_reference_info.transaction_type	
										");
								
			$query3 = array(
				'cash' => $query,
				'cheque' => $query2
			);						
													
			return $query3;
			
		}
		/*  payable_financial_statement */
		function payable_receivable_financial_statement( $start ,  $end)
		{	
			/*$query2= $this -> db -> select(' SUM(expense_amount) AS grand_total,SUM(total_paid) AS total_paid')
								 -> from('expense_info')
								 -> where('total_paid < expense_amount ')
								 //-> where('expense_type !=  "Transport Cost For Purchase" ')
								 -> where('expense_doc >= "'.$start.'"')
								 -> where('expense_doc <= "'.$end.'"')
								 -> get();*/
			/*$query_5= $this -> db -> select('SUM(expense_amount) AS grand_total')
								 -> from('expense_info')
								 -> where('expense_doc >= "'.$start.'"')
								 -> where('expense_doc <= "'.$end.'"')
								 -> get();
								 */
			/*$query_7 = $this -> db -> select('SUM(expense_amount) AS grand_total')
								 -> from('expense_info')
								 -> where('expense_type =  "Transport Cost For Purchase" ')
								 -> where('expense_doc >= "'.$start.'"')
								 -> where('expense_doc <= "'.$end.'"')
								 -> get();		
								 */							 													 
			/*$query = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS grand_total,SUM(purchase_receipt_info.total_paid) AS total_paid')
								 -> from('purchase_receipt_info')
								 -> where('purchase_receipt_info.receipt_status = "unpaid" ')
								 -> where('receipt_doc >= "'.$start.'"')
								 -> where('receipt_doc <= "'.$end.'"')
								 -> get();							 
			$query_6 = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS grand_total')
								   -> from('purchase_receipt_info')
								   -> where('receipt_doc >= "'.$start.'"')
								   -> where('receipt_doc <= "'.$end.'"')
								   -> get();	
								   		
			$query_4 = $this -> db -> select('SUM(gift_amount) AS grand_total,SUM(total_paid) AS total_paid')
								   -> from('gift_details')	
								   -> where('total_paid < gift_amount ')	
								   -> where('gift_doc >= "'.$start.'"')
								   -> where('gift_doc <= "'.$end.'"')
								   -> get();					 
				 					 			 
			$query_8 = $this -> db -> select('SUM(gift_amount) AS grand_total')
								   -> from('gift_details')	
								   -> where('gift_doc >= "'.$start.'"')
								   -> where('gift_doc <= "'.$end.'"')
								   -> get();					
								
			*/					   
					   	
			/*$query_3 = $this -> db -> select('SUM(grand_total) AS grand_total,SUM(total_paid) AS total_paid')
								   -> from('cashmemo_info')
								   -> where('total_paid < grand_total ')
								   -> where('cashmemo_info_doc >= "'.$start.'"')
								   -> where('cashmemo_info_doc <= "'.$end.'"')
								   -> get();	
			*/
			
			$query_3 = $this -> db -> select('SUM(grand_total) AS grand_total,SUM(total_paid) AS total_paid')
								   -> from('invoice_info')
								   -> where('total_paid < grand_total ')
								   -> where('invoice_doc >= "'.$start.'"')
								   -> where('invoice_doc <= "'.$end.'"')
								   -> get();


			//~ $query_12= $this -> db -> select('SUM(total_paid) AS total_investment')
								   //~ -> from('investment_info')
								   //~ -> get();
								   					   						   				 		//~ 
			$query_12= $this -> db ->  query("
												SELECT  temp_one.transaction_id,temp_one.transaction_doc,
												SUM(temp_one.transaction_amount) AS total_investment

												FROM 

												(
												SELECT 	transaction_details.transaction_id,transaction_doc,
												transaction_details.transaction_amount AS transaction_amount,transaction_mode,
												transaction_details.transaction_creator

												FROM transaction_details,cheque_reference_info,cheque_info
												WHERE cheque_reference_info.cheque_ref_purpose = 'investment'
												AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
												AND cheque_reference_info.cheque_id = cheque_info.cheque_id
												AND transaction_details.transaction_amount <> 0
												AND transaction_details.transaction_doc >=  '".$start."'
												AND transaction_details.transaction_doc <=  '".$end."'
														


												UNION 

												SELECT transaction_details.transaction_id,transaction_doc,
												transaction_details.transaction_amount AS transaction_amount,transaction_mode,
												transaction_details.transaction_creator

												FROM transaction_ref_details,transaction_details
												WHERE  transaction_ref_details.transaction_purpose = 'investment'
												AND transaction_details.transaction_amount <> 0
												AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
												AND transaction_details.transaction_doc >=  '".$start."'
												AND transaction_details.transaction_doc <=  '".$end."'
		

												) AS temp_one
												
											");
								   					   						   				 		
			$query_9 = $this -> db -> query("SELECT SUM( expense_info.expense_amount) AS total_expense_amount,
													SUM( CASE WHEN expense_type = 'Transport Cost For Purchase' THEN expense_amount END ) AS transport_cost, 
													SUM( CASE WHEN expense_type = 'Withdrawal' THEN expense_amount END ) AS total_withdrawal,
													SUM(CASE WHEN total_paid < expense_amount THEN expense_amount  END ) AS unpaid_grand_total,
													SUM(CASE WHEN total_paid < expense_amount THEN total_paid END ) AS total_paid_amount
												FROM expense_info
												WHERE expense_doc >= '".$start."'
												AND expense_doc <= '".$end."'
										    ");	
			$query_10 = $this -> db -> query("SELECT SUM(purchase_receipt_info.grand_total) AS total_purchase_amount,
													SUM( CASE WHEN purchase_receipt_info.receipt_status = 'unpaid'  THEN total_paid END ) AS total_paid_amount, 
													SUM( CASE WHEN purchase_receipt_info.receipt_status = 'unpaid'  THEN grand_total END ) AS unpaid_grand_total										
												FROM purchase_receipt_info
												WHERE receipt_date >= '".$start."'
												AND receipt_date <= '".$end."'
										    ");	 
			$query_11 = $this -> db -> query("SELECT SUM(gift_amount) AS total_gift_amount,
													SUM( CASE WHEN total_paid < gift_amount THEN gift_amount END ) - 
													SUM( CASE WHEN total_paid < gift_amount THEN total_paid END ) AS unpaid_gift_amount								
												FROM gift_details
												WHERE gift_doc >= '".$start."'
												AND gift_doc <= '".$end."'
										    ");	


			$query_13 = $this -> db -> query("SELECT SUM(loan_amount) AS total_loan_amount,
												    SUM( CASE WHEN (loan_mode = 1) THEN (total_paid) ELSE 0 END ) as payable_loan, 
												    SUM( CASE WHEN (loan_mode = 2) THEN (total_paid)  ELSE 0 END ) as receivable_loan 

												FROM loan_details_info

												WHERE doc >= '".$start."'
												AND doc <= '".$end."'
										    ");	


										    
										    		 						 
			$query_final = array(
				'sale' => $query_3,
				'updated_expense' => $query_9,
				'updated_purchase' => $query_10,
				'updated_gift' => $query_11,
				'investment' => $query_12,
				'loan_details' => $query_13
								
				//'gift' => $query_4,
				//'gift_total_amount' => $query_8,
				//'purchase_total_amount' => $query_6,
				//'purchase' => $query,
				//'expense' => $query2,
				//'expense_total_amount' => $query_5,
				//'purchase_total_amount_for_transport' => $query_7,
			);						
			return $query_final;							 
		}
		/****************************
		 * All Registered Customer  *
		 ****************************/
		function all_registerd_customer()
		{
			$query =  $this -> db -> order_by("customer_name", "asc")
								  -> select('*')
								  -> from('customer_info')
								  -> where('customer_mode = "registered"')
								  -> get();
			return $query;
		}
		function all_type_customer()
		{
			$query =  $this -> db -> order_by("customer_name", "asc")
								  -> select('*')
								  -> from('customer_info')
								  -> get();
			return $query;
		}
		function total_point_discount_datewise($start_date  ,  $end_date)
		{
		$endd=explode('-',$end_date);
		$dd=$endd[2]+1;
		$end_date=$endd[0].'-'.$endd[1].'-'.$dd;
		
					$query = $this -> db -> select_sum('point_discount')
								  -> from('invoice_info')
								  -> where('invoice_info.invoice_dom >= "'.$start_date.'"')
								  -> where('invoice_info.invoice_dom <= "'.$end_date.'"')
								  -> get();
					if($query->num_rows>0){
					$row=$query->row_array();
					return $row;
					}
					else {
					$row['point_discount']=0;
					return $row;
					}
			
		}
		
		/************************************
		 * All Distributor ******************
		 * **********************************/
		function distributor_info()
		{
			$this -> db -> order_by("distributor_name", "asc");
			return $this -> db -> get('distributor_info');
		}
		
		/******************************************
		 *  All Supply By a Specific Distributor  *
		 ******************************************/
		function supply_by_distributor( $distributor_id )
		{
			$this -> db -> order_by("product_name", "asc");
		    $query = $this -> db -> select('product_info.product_id, product_info.product_name, distributor_name,distributor_info.distributor_id,
											distributor_address, distributor_contact_no,
											bulk_stock_info.stock_amount, sale_price_info.unit_sale_price, bulk_stock_info.bulk_unit_buy_price')
								 -> from('product_info, bulk_stock_info, sale_price_info, purchase_info,purchase_receipt_info, distributor_info')
								 -> where('distributor_info.distributor_id = "'.$distributor_id.'"')
								 -> where('product_info.product_id = bulk_stock_info.product_id')
								 -> where('product_info.product_id = sale_price_info.product_id')
								 -> where('product_info.product_id = purchase_info.product_id')
								 -> where('purchase_info.purchase_receipt_id = purchase_receipt_info.receipt_id')
								 -> where('distributor_info.distributor_id = purchase_receipt_info.distributor_id')
								 -> group_by('product_info.product_id')
								 -> get();
			 return $query;
		}
		/******************************************
		 *  Invoice of a Specific Product         *
		 ******************************************/
		function invoice_of_specific_product( $product_id, $start_date, $end_date, $is_individual )
		{
			$this -> db -> order_by("invoice_doc","asc");
			if(!$is_individual)
			{
				$this -> db -> select('customer_name, invoice_doc,customer_contact_no, invoice_info.invoice_id,
								       count( stock_id ) as number_of_quantity');
				$this -> db -> from('invoice_info,sale_details,customer_info');
				$this -> db -> where('customer_info.customer_id = invoice_info.customer_id');
				$this -> db -> where('invoice_info.invoice_id = sale_details.invoice_id');
				$this -> db -> where('invoice_doc >= "'.$start_date.'"');
				$this -> db -> where('invoice_doc <= "'.$end_date.'"');
				$this -> db -> where('sale_details.stock_id = "'.$product_id.'"');
				$this -> db -> where('invoice_info.hotel_id', $this -> hotel_id);
				$this -> db -> where('sale_details.product_specification = "bulk"');
				$this -> db -> group_by('invoice_id');
				$query = $this -> db -> get();
				return $query;
			}
			else if( $is_individual)
			{
				$this -> db -> select('customer_name, invoice_doc,customer_contact_no, invoice_info.invoice_id,
								       count( sale_details.stock_id ) as number_of_quantity');
				$this -> db -> from('product_info, purchase_info, stock_info, sale_details,invoice_info,customer_info');
				$this -> db -> where('invoice_info.invoice_id = sale_details.invoice_id');
				$this -> db -> where('customer_info.customer_id = invoice_info.customer_id');
				$this -> db -> where('stock_info.stock_id = sale_details.stock_id');
				$this -> db -> where('stock_info.purchase_id = purchase_info.purchase_id');
				$this -> db -> where('product_info.product_id = purchase_info.product_id');
				$this -> db -> where('invoice_doc >= "'.$start_date.'"');
				$this -> db -> where('invoice_doc <= "'.$end_date.'"');
				$this -> db -> where('invoice_info.hotel_id', $this -> hotel_id);
				$this -> db -> where('product_info.product_id = "'.$product_id.'"');
				$this -> db -> where('sale_details.product_specification = "individual"');
				$this -> db -> group_by('invoice_id');
				$query = $this -> db -> get();
				return $query;
			}
		}
		/******************************
		 * Cash in bank ,, Cash in hand 
		 * ****************************/
		function cash_status_report_result_calculation($start_date,$end_date)
		{
			
								 
			$query = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND (transaction_type = 'ToBank' 
												OR transaction_type = 'in')
												AND  bank_book_doc >= '".$start_date."' 
												AND bank_book_doc <= '".$end_date."'
										");					 			
			$query_2 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND (transaction_type = 'FromBank' 
												OR transaction_type = 'out')
												AND  bank_book_doc >= '".$start_date."' 
												AND bank_book_doc <= '".$end_date."'
											");								 
		
			/*$query_3 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
												transaction_details.transaction_amount, transaction_details.transaction_mode, 
												transaction_ref_details.transaction_purpose,transaction_details.transaction_doc	
												
												FROM transaction_details,transaction_ref_details

												WHERE transaction_details.transaction_mode = 'cash'
												AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
												AND transaction_details.transaction_type = transaction_ref_details.transaction_type
										");
										
			$query_4 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
												transaction_details.transaction_amount, transaction_details.transaction_mode, 
												cheque_reference_info.cheque_ref_purpose,transaction_details.transaction_doc	
												
												FROM cheque_reference_info,transaction_details,cheque_info

												WHERE transaction_details.transaction_mode = 'cheque'	
												AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
												AND cheque_reference_info.cheque_id = cheque_info.cheque_id
												AND cheque_info.cheque_status = 'honored'
												AND transaction_details.transaction_type = cheque_reference_info.transaction_type	
											");	
			$query_5 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND  transaction_type = 'in'
											");	
											
			$query_6 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND  transaction_type = 'out'
											");	
			$query_7 = $this -> db -> query("SELECT bank_book_info.bank_id, bank_info.bank_name,
												SUM( CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) AS total_in, 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_out, 
												SUM(CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) - 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_amount
											FROM bank_info, bank_book_info
											WHERE bank_book_info.bank_id = bank_info.bank_id
											GROUP BY bank_book_info.bank_id
										    ");
									    																												
			$query = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND (transaction_type = 'FromBank' 
												OR transaction_type = 'in')
										");					 			
								 
								 			 
				
			$query_2 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND (transaction_type = 'ToBank' 
												OR transaction_type = 'out')
											");								 
		
			$query_3 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
												transaction_details.transaction_amount, transaction_details.transaction_mode, 
												transaction_ref_details.transaction_purpose,transaction_details.transaction_doc	
												
												FROM transaction_details,transaction_ref_details

												WHERE transaction_details.transaction_mode = 'cash'
												AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
												AND transaction_details.transaction_type = transaction_ref_details.transaction_type
										");
										
			$query_4 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
												transaction_details.transaction_amount, transaction_details.transaction_mode, 
												cheque_reference_info.cheque_ref_purpose,transaction_details.transaction_doc	
												
												FROM cheque_reference_info,transaction_details,cheque_info

												WHERE transaction_details.transaction_mode = 'cheque'	
												AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
												AND cheque_reference_info.cheque_id = cheque_info.cheque_id
												AND cheque_info.cheque_status = 'honored'
												AND transaction_details.transaction_type = cheque_reference_info.transaction_type	
											");		
			
			
			$query_5 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND  transaction_type = 'ToBank'
												WHERE  bank_book_doc >= '".$start_date."' 
												AND bank_book_doc <= '".$end_date."'
											");	
											
			$query_6 = $this -> db -> query("SELECT bank_book_info.bank_id,bank_info.bank_name,SUM(bank_book_info.amount) AS total_amount
												FROM bank_book_info,bank_info
												WHERE bank_info.bank_id = bank_book_info.bank_id 
												AND  transaction_type = 'out'
											");		
											 
			*/	

			$query_7 = $this -> db -> query("SELECT bank_book_info.bank_id, bank_info.bank_name,
												SUM( CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) AS total_in, 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_out, 
												SUM(CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) - 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_amount
											FROM bank_info, bank_book_info
											WHERE bank_book_info.bank_id = bank_info.bank_id
											AND  bank_book_doc >= '".$start_date."' 
											AND bank_book_doc <= '".$end_date."'
											GROUP BY bank_book_info.bank_id
										    ");
										    
			$query_8 = $this -> db -> query("SELECT bank_book_info.bank_id, bank_info.bank_name,
												SUM( CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) AS total_in, 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_out, 
												SUM(CASE WHEN transaction_type = 'ToBank' || transaction_type = 'in' THEN amount END ) - 
												SUM(CASE WHEN transaction_type = 'FromBank' || transaction_type = 'out' THEN amount END ) AS total_amount
												FROM bank_info, bank_book_info
												WHERE bank_book_info.bank_id = bank_info.bank_id
												AND  bank_book_doc >= '".$start_date."' 
												AND bank_book_doc <= '".$end_date."'
											");	
											
													
			$query_9 = $this -> db -> query("
											SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type, transaction_details.transaction_mode, 
											transaction_details.transaction_doc,
											SUM( CASE WHEN (transaction_type = 'in' OR transaction_type = 'FromBank' ) THEN transaction_amount END ) AS total_in,
											SUM( CASE WHEN (transaction_type = 'out' OR transaction_type = 'ToBank' ) THEN transaction_amount END ) AS total_out
											
											FROM transaction_details
											WHERE transaction_details.transaction_doc >= '".$start_date."' 
											AND transaction_details.transaction_doc <= '".$end_date."'
										");								
															    
	 
			$query_final = array(
				'InBank' => $query,
				'InBank_2' => $query_2,
				//'cash' => $query_3,
				//'cheque' => $query_4,
				//'extra_cash_in_purpose' => $query_5,
				//'extra_cash_out_purpose' => $query_6,
				'details_by_bank' => $query_7,
				'cash_in_bank' => $query_8,
				'total_in_out_cash_status' => $query_9
			);						
			return $query_final;	
		}
		/*transaction details by specific transaction id*/
		function specific_transaction_details($transaction_id)
		{
			$seg_3 = $this -> uri -> segment(3);
			$seg_4 = $this -> uri -> segment(4);
			$seg_5 = $this -> uri -> segment(5);
			$seg_6 = $this -> uri -> segment(6);
			$query = 0;$query_2 = 0;$query_3 = 0;			
			if($seg_3 == 'Cheque_Dishonor')
			{
				if($seg_6 == 'cash')
				{
					$seg_7 = $this -> uri -> segment(7);
					/*$query = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,cheque_reference_info.cheque_id, cheque_reference_info.cheque_ref_purpose,
														cheque_reference_info.transaction_amount,cheque_reference_info.cheque_ref_doc
													FROM cheque_reference_info,transaction_ref_details,cheque_info,transaction_details
													WHERE cheque_info.cheque_status = 'dishonored'
													AND transaction_ref_details.transaction_purpose = 'Cheque_Dishonor' 
													AND transaction_ref_details.ref_id = cheque_reference_info.cheque_id
													AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
													AND transaction_details.transaction_id = '".$transaction_id."'
											");*/
											
					$query = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,cheque_info.cheque_no, transaction_ref_details.transaction_purpose,
															transaction_details.transaction_amount,transaction_details.transaction_doc,transaction_details.transaction_mode,
															transaction_details.transaction_type
													FROM transaction_ref_details,cheque_info,transaction_details
													WHERE transaction_ref_details.ref_id = '".$seg_7."'
													AND transaction_details.transaction_id =  '".$transaction_id."'
													AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
													AND transaction_ref_details.transaction_purpose = 'Cheque_Dishonor'
													AND transaction_ref_details.ref_id = cheque_info.cheque_id
													AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
												");
				}
				else if($seg_6 == 'cheque')
				{
					$seg_7 = $this -> uri -> segment(7);
					/*$query = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,cheque_reference_info.cheque_id, 
													cheque_reference_info.cheque_ref_purpose,cheque_reference_info.transaction_amount,
													cheque_reference_info.cheque_ref_doc
													FROM cheque_reference_info,cheque_info,transaction_details
													WHERE cheque_info.cheque_status = 'dishonored'
													AND cheque_reference_info.cheque_id = '".$seg_7."'
													AND transaction_details.transaction_id =  '".$transaction_id."'
											");*/
											
					$query = $this -> db -> query("SELECT  
													transaction_details.transaction_id,cheque_reference_info.transaction_type,cheque_reference_info.cheque_ref_purpose AS transaction_purpose,
													cheque_reference_info.transaction_amount,transaction_details.transaction_doc,transaction_details.transaction_mode,
													(SELECT cheque_no FROM cheque_info
													 WHERE cheque_id = (SELECT DISTINCT cheque_reference_info.cheque_id												
																			FROM cheque_reference_info,cheque_info,transaction_details
																			WHERE  cheque_reference_info.ref_id = '".$seg_7."'
																			AND transaction_details.transaction_id = '".$transaction_id."'
																			AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																			AND  transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id)) AS normal_cheque_no,
													(SELECT  cheque_no FROM cheque_info 
													 WHERE cheque_id = (SELECT DISTINCT cheque_reference_info.ref_id												
																			FROM cheque_reference_info,cheque_info,transaction_details
																			WHERE  cheque_reference_info.ref_id = '".$seg_7."'
																			AND transaction_details.transaction_id = '".$transaction_id."'
																			AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																			AND  transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id)) AS dishonored_cheque_no
													FROM cheque_reference_info,cheque_info,transaction_details
													WHERE  cheque_reference_info.ref_id =  '".$seg_7."'
													AND transaction_details.transaction_id = '".$transaction_id."'
													AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
													AND  transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
													AND cheque_info.cheque_id = cheque_reference_info.cheque_id
												");						
				}					
			}
			if($seg_6 == 'cash' && $seg_3 != 'Cheque_Dishonor')
			{
			$query_2 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,transaction_ref_details.ref_id,
											transaction_details.transaction_amount, transaction_details.transaction_mode, 
											transaction_ref_details.transaction_purpose,transaction_details.transaction_doc	
											
											FROM transaction_details,transaction_ref_details

											WHERE transaction_details.transaction_mode = 'cash'
											AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
											AND transaction_details.transaction_type = transaction_ref_details.transaction_type
											AND transaction_details.transaction_id = '".$transaction_id."'
											AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
										");
			}
			if($seg_6 == 'cheque' && $seg_3 != 'Cheque_Dishonor')
			{
			$query_3 = $this -> db -> query("SELECT DISTINCT transaction_details.transaction_id,transaction_details.transaction_type,
											transaction_details.transaction_amount, transaction_details.transaction_mode, 
											cheque_reference_info.cheque_ref_purpose,transaction_details.transaction_doc	
											
											FROM cheque_reference_info,transaction_details,cheque_info

											WHERE transaction_details.transaction_mode = 'cheque'
											
											AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
											AND cheque_reference_info.cheque_id = cheque_info.cheque_id
											AND cheque_info.cheque_status = 'honored'
											AND transaction_details.transaction_type = cheque_reference_info.transaction_type	
											AND transaction_details.transaction_id = '".$transaction_id."'
											AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
										");
			}
			
			$query_final = array(
				'Cheque_Dishonor' => $query,
				'cash' => $query_2,
				'cheque' => $query_3
			);						
			return $query_final;
		}
		/* get_transaction_details_by_purpose */
		function get_transaction_details_by_purpose($ref_id,$purpose)
		{
			$query = 0;$query_2 = 0;$query_3 = 0;$query_4 = 0;
			if($purpose == 'sale' || $purpose == 'Cheque_Dishonor' )
			{
				$query = $this -> db -> query("SELECT DISTINCT customer_name,customer_contact_no
											  FROM invoice_info,transaction_ref_details,transaction_details, customer_info
											  WHERE invoice_info.invoice_id = transaction_ref_details.ref_id
											  AND invoice_info.customer_id = customer_info.customer_id
											  AND invoice_info.invoice_id = '".$ref_id."'
											  AND invoice_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											");
				
			}
			if($purpose == 'expense' || $purpose == 'Cheque_Dishonor' )
			{
				$query_2 = $this -> db -> query("SELECT DISTINCT service_provider_info.service_provider_name
											    FROM service_provider_info,transaction_ref_details,transaction_details,expense_info
												WHERE expense_info.expense_id = transaction_ref_details.ref_id
												AND expense_info.service_provider_id = service_provider_info.service_provider_id
												AND expense_info.expense_id = '".$ref_id."'
												AND expense_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											");
				
			}
			if($purpose == 'gift')
			{
				$query_3 = $this -> db -> query("SELECT DISTINCT distributor_info.distributor_name,distributor_info.distributor_contact_no
												FROM gift_details,distributor_info,transaction_ref_details,transaction_details
											    WHERE gift_details.gift_id = transaction_ref_details.ref_id
												AND gift_details.gift_from = distributor_info.distributor_id
											    AND gift_details.gift_id = '".$ref_id."'
											    AND gift_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											");
				
			}
			if($purpose == 'purchase' || $purpose == 'Cheque_Dishonor' )
			{
				$query_4 = $this -> db -> query("SELECT DISTINCT distributor_info.distributor_name,distributor_info.distributor_contact_no
												FROM purchase_receipt_info,transaction_ref_details,transaction_details,distributor_info
												WHERE purchase_receipt_info.receipt_id = transaction_ref_details.ref_id
												AND purchase_receipt_info.distributor_id= distributor_info.distributor_id
												AND purchase_receipt_info.receipt_id = '".$ref_id."'
												AND purchase_receipt_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											");
				
			}	
			$query_final = array(
				'sale' => $query,
				'expense' => $query_2,
				'gift' => $query_3,
				'purchase' => $query_4
			);						
			return $query_final;
		}
		/*************************************************
		 *  All Transaction with a Specific Distributor  *
		 *************************************************/
		function transaction_with_distributor( $distributor_id )
		{
			$this->db->order_by("receipt_id", "asc");
		    $query = $this -> db -> select('distributor_name, distributor_info.distributor_id, receipt_id,
											grand_total,total_paid,receipt_status,
											receipt_doc, receipt_creator')
								 -> from('purchase_receipt_info, distributor_info')
								 -> where('distributor_info.distributor_id = "'.$distributor_id.'"')
								 -> where('distributor_info.distributor_id = purchase_receipt_info.distributor_id')
								 -> where('purchase_receipt_info.hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			 return $query;
		}
		
		/****************************************************
		 * Select Random Products lower Then Alarming level *
		 ****************************************************/
		function product_under_alarming_level()
		{
			$this -> db -> select("product_info.product_name, product_info.product_id,stock_amount,alarming_stock,
								   bulk_unit_buy_price, unit_sale_price");		
			$this -> db -> from('product_info, bulk_stock_info, sale_price_info');
			$this -> db -> where('product_info.product_id = bulk_stock_info.product_id');
			$this -> db -> where('product_info.product_id = sale_price_info.product_id');
			$this -> db -> where('bulk_stock_info.hotel_id = sale_price_info.hotel_id');
			$this -> db -> where('sale_price_info.hotel_id', $this -> hotel_id);
			$this -> db -> where('stock_amount <= alarming_stock');
			$this -> db -> where('product_status = "active"');
			$this -> db -> order_by('alarming_stock','desc');
			//$this -> db -> order_by('product_info.product_id','random');
			//$this -> db -> limit(5);
			$query = $this -> db ->get();
			return $query;
		}
		
		/**********************************
		 * Get Best Seling Products       *
		 **********************************/
		function best_sale( $start_date , $end_date , $limit_level)
		{
			/* Will be working for only Bulk*/
			$this -> db -> order_by('COUNT( DISTINCT invoice_info.invoice_id )','desc');
			$this -> db -> select('product_info.product_id, product_info.product_name ,  COUNT( DISTINCT invoice_info.invoice_id ) AS total_quantity_sale');
			$this -> db -> from('product_info, invoice_info, sale_details, sale_price_info');
			
			$this -> db -> where('product_info.product_id = sale_details.product_id');
			$this -> db -> where('invoice_info.invoice_id = sale_details.invoice_id');
			$this -> db -> where('product_info.product_id = sale_price_info.product_id');
			$this -> db -> where('sale_price_info.hotel_id', $this -> hotel_id);
			$this -> db -> where('sale_details.product_specification = "bulk"');
			$this -> db -> where('invoice_doc >= "'.$start_date.'"');
			$this -> db -> where('invoice_doc <= "'.$end_date.'"');
			$this -> db -> where('product_status = "active"');
			
			$this -> db -> group_by('sale_details.product_id');
			
			$this -> db -> limit($limit_level);
			$query = $this -> db ->get();
			return $query;
		}
		/**********************************
		 * Slow   Seling Products       *
		 **********************************/
		function slow_sale( $start_date , $end_date , $limit_level)
		{
			/* Will be working for only Bulk*/
			$this -> db -> order_by('COUNT( DISTINCT invoice_info.invoice_id )','asc');
			$this -> db -> select('product_info.product_id, product_info.product_name , COUNT( DISTINCT invoice_info.invoice_id ) AS total_quantity_sale');
			$this -> db -> from('product_info, invoice_info, sale_details, sale_price_info');
			
			$this -> db -> where('product_info.product_id = sale_details.product_id');
			$this -> db -> where('invoice_info.invoice_id = sale_details.invoice_id');
			$this -> db -> where('product_info.product_id = sale_price_info.product_id');
			$this -> db -> where('sale_price_info.hotel_id', $this -> hotel_id);
			$this -> db -> where('sale_details.product_specification = "bulk"');
			$this -> db -> where('invoice_doc >= "'.$start_date.'"');
			$this -> db -> where('invoice_doc <= "'.$end_date.'"');
			$this -> db -> where('product_status = "active"');
			
			$this -> db -> group_by('sale_details.product_id');
			
			$this -> db -> limit($limit_level);
			$query = $this -> db ->get();
			return $query;
		}
		/********************************
		 *  Get All Stock Total Amount *
		 * ******************************/
		 function get_all_stock_amount()
		 {
			$query = $this -> db -> select( '(bulk_unit_buy_price *  stock_amount) AS stock_asset' )
								 -> from('bulk_stock_info')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			$stock = 0;
			foreach($query -> result() as $result):
					$stock += $result -> stock_asset;
			endforeach;
			return $stock;
		 }
		/**********************************************
		* Calculate Transport Cost for Purchase     **
		* ********************************************/
		function specific_date_transport_cost_calculation( $start, $end )
		{
			$query = $this -> db -> select_sum( 'expense_amount' )
								 -> from('expense_info')
								 -> where('expense_doc >= "'.$start.'"')
								 -> where('expense_doc <= "'.$end.'"')
								 -> where('expense_type = "Transport Cost For Purchase"')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 -> get();
			foreach($query -> result() as $result):
					$total_expense = $result -> expense_amount;
			endforeach;
			return $total_expense;
		}
		/*********************************************
		 * Stock Status on a Specific Date           *
		 *********************************************/
		function stock_status_on_specific_date( $query_date, $current_date )
		{
			$present_stock_amount = $this -> get_all_stock_amount();
			$purchase_amount = $this -> specific_date_purchase_amount_calculation( $query_date, $current_date );
			$sale_amount = $this -> specific_date_buy_price_calculation( $query_date, $current_date );
			//$transport_cost = $this -> specific_date_transport_cost_calculation( $query_date, $current_date );
			$result = ( $present_stock_amount + $sale_amount ) -  $purchase_amount;
			$result = round($result, 2);
			if($result == round($result, 0))
				$result = $result.'.00';
			else if(round($result, 1) == round($result, 2))
				$result = $result.'0';
			
			return $result;
		}
		/****************************************************************************************
		 * all cheque details by distributors/distributor, whome/who have transaction by cheque
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function all_distributor_whome_hv_transation_by_cheque($specific,$distributor_id)
		{        
			$this -> db -> order_by("distributor_name", "asc");
			$this -> db -> select('distributor_info.distributor_id,distributor_name,distributor_contact_no,distributor_info.distributor_id,cheque_info.cheque_id,
			                       cheque_info.cheque_type,cheque_account_no,cheque_account_name,cheque_info.cheque_amount,
			                       cheque_status,cheque_date,cheque_info.cheque_activate_date,
			                       cheque_no,cheque_bank_name,bank_info.bank_name' );
			//$this -> db -> from('distributor_info,cheque_info,bank_info');	 
			$this -> db -> from('distributor_info,cheque_reference_info,cheque_info,purchase_receipt_info,bank_info');	 
			$this -> db -> where('cheque_ref_purpose = "purchase"');
			$this -> db -> where('cheque_reference_info.ref_id  = purchase_receipt_info.receipt_id');
			$this -> db -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id');
			$this -> db -> where('cheque_reference_info.cheque_id = cheque_info.cheque_id');
			$this -> db -> where('cheque_info.my_bank = bank_info.bank_id');
			$this -> db -> where('cheque_info.hotel_id', $this->tank_auth->get_hotel_id());
			if($specific) $this -> db ->where('distributor_info.distributor_id',$distributor_id);
			$this -> db -> group_by('cheque_reference_info.cheque_id');
			return $this -> db -> get();
			
		}
		/****************************************************************************************
		 * all cheque details by customers/customer whome/who have transaction by cheque
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function all_customer_whome_hv_transation_by_cheque($specific,$customer_id)
		{
			$this -> db -> order_by("customer_info.customer_name", "asc");
			$this -> db -> select('invoice_info.invoice_id,customer_name,customer_contact_no,invoice_info.customer_id,cheque_info.cheque_id,
			                       cheque_info.cheque_type,cheque_account_no,cheque_account_name,cheque_info.cheque_amount,cheque_info.cheque_activate_date,
			                       cheque_reference_info.transaction_amount,cheque_status,cheque_date,
			                       cheque_no,cheque_bank_name,bank_info.bank_name');
			$this -> db -> from('cheque_reference_info,cheque_info,invoice_info,bank_info,customer_info');	 
			$this -> db -> where('cheque_ref_purpose = "sale"');
			$this -> db -> where('cheque_reference_info.ref_id  = invoice_info.invoice_id');
			$this -> db -> where('cheque_reference_info.cheque_id = cheque_info.cheque_id');
			$this -> db -> where('customer_info.customer_id = invoice_info.customer_id');
			$this -> db -> where('cheque_info.my_bank = bank_info.bank_id');
			$this -> db -> where('cheque_info.hotel_id', $this->tank_auth->get_hotel_id());
			if($specific) $this -> db ->where('customer_info.customer_id',$customer_id);
			$this -> db -> group_by('cheque_reference_info.cheque_id');
			return $this -> db -> get();
		}
		/****************************************************************************************
		 * all Service Provider information 
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function all_service_providers_information($specific,$service_provider_id)
		{
			$this -> db -> order_by("service_provider_name", "asc");
			$this -> db -> select('service_provider_name,service_provider_id,service_provider_type,service_provider_contact');
			$this -> db -> from('service_provider_info');	 
			if($specific) $this -> db ->where('service_provider_id',$service_provider_id);
			return $this -> db -> get();
		}
		/****************************************************************************************
		 * this will fatch all cheque details by mode(in/out/to bank/from bank)
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function fatch_cheque_details_by_mode($mode)
		{
			$this -> db -> select('cheque_info.cheque_id,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
								   cheque_info.cheque_amount,cheque_info.cheque_activate_date,
								   cheque_status,cheque_date,cheque_no,cheque_bank_name,bank_info.bank_name');
			$this -> db -> from('cheque_info,bank_info');	 
			$this -> db -> where('cheque_type = "'.$mode.'"');
			//$this -> db -> where('cheque_reference_info.cheque_id = cheque_info.cheque_id');
			$this -> db -> where('cheque_info.my_bank = bank_info.bank_id');
			$this -> db -> where('cheque_info.hotel_id', $this->tank_auth->get_hotel_id());
			return $this -> db -> get();
		}
		/****************************************************************************************
		 * this will fatch all cheque details by Status
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function fatch_cheque_details_by_status($status)
		{
			/*$this -> db -> select('cheque_info.cheque_id,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
									cheque_info.cheque_amount,cheque_info.cheque_activate_date,								  
									cheque_status,cheque_date,cheque_no,cheque_bank_name,bank_info.bank_name'
								);
			$this -> db -> from('cheque_info,bank_info');	 
			if($status =='dishonored' )
			{
				$this -> db -> where('cheque_status = "'.$status.'"');
				$this -> db -> or_where('cheque_status = "recovering"');	
			}
			else $this -> db -> where('cheque_status = "'.$status.'"');
			//$this -> db -> where('cheque_reference_info.cheque_id = cheque_info.cheque_id');
			$this -> db -> where('cheque_info.my_bank = bank_info.bank_id');
			$this -> db -> where('cheque_info.hotel_id', $this->tank_auth->get_hotel_id());*/
			
			if($status =='dishonored' )
			{
				return $this -> db -> query("
									SELECT cheque_info.cheque_id,cheque_info.cheque_activate_date,total_paid,							   
										   cheque_info.cheque_type,cheque_account_no,cheque_account_name,
										   cheque_info.cheque_amount,cheque_status,cheque_date,
										   cheque_no,cheque_bank_name,bank_info.bank_name
								   FROM cheque_info,bank_info
								   WHERE (cheque_status = '".$status."' OR cheque_status = 'recovering')
								  
								   AND cheque_info.my_bank = bank_info.bank_id
								   AND cheque_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
								 ");
				
			}
			else 
			{
				return $this -> db -> query("
								SELECT cheque_info.cheque_id,cheque_info.cheque_activate_date,total_paid,							   
									   cheque_info.cheque_type,cheque_account_no,cheque_account_name,
									   cheque_info.cheque_amount,cheque_status,cheque_date,
									   cheque_no,cheque_bank_name,bank_info.bank_name
							   FROM cheque_info,bank_info
							   WHERE cheque_status = '".$status."' 
							
							   AND cheque_info.my_bank = bank_info.bank_id
							   AND cheque_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
							 ");
			}
			
			//return $this -> db -> get();
		}
		/****************************************************************************************
		 * This will fatch all cheque details by a specific date/or date interval
		 * 
		 * Here if flag parameter is true, then the query will fetch data according to cheque_type
		 * Otherwise all_types of cheque
		 * 
		 * Section: Accounts & Report
		 * **************************************************************************************/
		function date_wise_cheque_details_calculation($flag,$cheque_type,$start_date, $end_date)
		{
			//$this -> db -> order_by("cheque_info.cheque_activate_date", "desc");
			$this -> db -> select('cheque_info.cheque_id,cheque_info.cheque_activate_date,								   
								   cheque_info.cheque_type,cheque_account_no,cheque_account_name,
								   cheque_info.cheque_amount,cheque_status,cheque_date,
								   cheque_no,cheque_bank_name,bank_info.bank_name'
								 );
								 
			$this -> db -> from('cheque_info,bank_info');
			$this -> db -> where('cheque_date >= "'.$start_date.'"');
			$this -> db -> where('cheque_date <= "'.$end_date.'"');
			if($flag)
				$this -> db -> where('cheque_info.cheque_type',$cheque_type);
			$this -> db -> where('cheque_info.my_bank = bank_info.bank_id');
			$this -> db -> where('cheque_info.hotel_id', $this->tank_auth->get_hotel_id());
			$this -> db -> order_by('cheque_info.cheque_type');
			return $this -> db -> get();
		}
		/************************************************************
		  * ----------------------Ledger Generation------------------
		  * 
		  * this will generate every possible ledgers----------------
		  * 
		  * 
		  * where 5 perameters were used and they are for
		  * 		$true_or_false ----- refers to date wise or not
		  * 		$true_or_false_two ----- refers to the query will be specific id based or not
		  *         $for_who_or_what --- refers to for whom/what purpose the ledger will be generated
		  *         $specific_id ----- refers to the specific id the query will perform on...........sometimes specific_id refers to 
		  * 						   diffrent transaction_purposes like purchase/sale/expense/cheque_dishonor/gift/investment/withdrawal etc....
		  *         $stard_date -------- start date of date wise search
		  *         $end_date -------- end date of date wise search
		  * 
		  * Section : Accounts
		  * ---------------------------------------------------------
		*************************************************************/
		function ledger_generation($true_or_false,$true_or_false_two,$for_who_or_what,$specific_id,$start_date,$end_date)
		{
			//echo $true_or_false.' '.$true_or_false_two.' '.$for_who_or_what.' '.$specific_id.' '.$start_date.' '.$end_date;
			if($true_or_false)
			{
				/*if($for_who_or_what == 'distributor')
				{
					/*$receipt_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS receipt_amount_ob')
											     -> from('purchase_receipt_info')
											     -> where('receipt_date < "'.$start_date.'"')
											     -> where('distributor_id',$specific_id)
											     -> get();
											     
					$paid_amount = $this -> db -> query("SELECT SUM(paid_ob_amount) as paid_ob_amount 
															FROM(SELECT DISTINCT transaction_id,distributor_info.distributor_id,distributor_info.distributor_name,
																transaction_details.transaction_amount AS paid_ob_amount
															 
																FROM transaction_receipt_info,transaction_details,purchase_receipt_info,distributor_info

																WHERE distributor_info.distributor_id = '".$specific_id."'
																AND transaction_details.transaction_type = 'out' 
																AND transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id
																AND transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id
																AND purchase_receipt_info.distributor_id = distributor_info.distributor_id
																AND transaction_details.transaction_doc  <'".$start_date."'
															  ) as temp_query
														");	
					
					$date_wise_total_payment = $this -> db -> query("SELECT transaction_id,transaction_receipt_id,transaction_reference_id,distributor_id,distributor_name,
																				   SUM(ta) AS total_payment_amount,transaction_mode, transaction_doc
																				  
																		   FROM(SELECT DISTINCT transaction_id,transaction_receipt_info.transaction_receipt_id,transaction_reference_id,
																		           distributor_info.distributor_id,distributor_name,
																				   transaction_details.transaction_amount AS ta,transaction_mode,
																				   transaction_details.transaction_doc
																				 
																					FROM transaction_receipt_info,transaction_details,purchase_receipt_info,distributor_info

																					WHERE  distributor_info.distributor_id = '".$specific_id."'
																					AND transaction_details.transaction_type = 'out' 
																					AND transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id
																					AND transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id
																					AND purchase_receipt_info.distributor_id = distributor_info.distributor_id 
																					AND transaction_details.transaction_doc >= '".$start_date."' 
																					AND transaction_details.transaction_doc <= '".$end_date."' 
																				) AS temp
																			GROUP BY transaction_doc
																		");	
					
					
					
					
					$date_wise_total_purchase = $this -> db -> select('receipt_id,SUM(grand_total) AS purchase_amount,distributor_info.distributor_name,receipt_date')
														   -> from('purchase_receipt_info,distributor_info')
														   -> where('purchase_receipt_info.distributor_id',$specific_id)
														   -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
														   -> group_by('receipt_date')
														   -> get();
					*/
					
					//~ $date_wise_total_purchase = $this -> db -> select('receipt_id,SUM(grand_total) AS purchase_amount,distributor_id,receipt_date')
														   //~ -> from('purchase_receipt_info')
														   //~ -> where('distributor_id',$specific_id)
														   //~ -> where('receipt_date >= "'.$start_date.'"')
														   //~ -> where('receipt_date <= "'.$end_date.'"')
														   //~ -> group_by('receipt_date')
														   //~ -> get();
														   																		     
					//~ $debit_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS final_debit_amount')
											   //~ -> from('purchase_receipt_info')
											   //~  -> where('distributor_id',$specific_id)
											   //~ -> where('receipt_date >= "'.$start_date.'"')
											   //~ -> where('receipt_date <= "'.$end_date.'"')
											   //~ -> get();		   	
						
					/*$my_ledger = $this -> db -> select('*')
											    -> from('purchase_receipt_info')
											   -> where('receipt_date >= "'.$start_date.'"')
											   -> where('receipt_date <= "'.$end_date.'"')
											   //-> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
											   -> where('distributor_id',$specific_id)
											   -> get();	
			
						
						
							
					$query_final = array(
						//'receipt_amount_ob' => $receipt_amount,
						//'paid_amount_before' => $paid_amount,
						//'date_wise_total_payment' => $date_wise_total_payment,
						//'date_wise_total_purchase' => $date_wise_total_purchase
						//'debit_amount' => $debit_amount
						'my_ledger' => $my_ledger
						
					);						
					return $query_final;	 
				}
				* */
				if($for_who_or_what == 'distributor')
				{
					$receipt_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS receipt_amount_ob')
											     -> from('purchase_receipt_info')
											     -> where('receipt_date < "'.$start_date.'"')
											     -> where('distributor_id',$specific_id)
											     -> where('hotel_id', $this->tank_auth->get_hotel_id())
											     -> get();
											     
					$paid_amount = $this -> db -> query("SELECT SUM(paid_ob_amount) as paid_ob_amount 
															FROM(SELECT DISTINCT transaction_id,distributor_info.distributor_id,distributor_info.distributor_name,
																transaction_details.transaction_amount AS paid_ob_amount
															 
																FROM transaction_receipt_info,transaction_details,purchase_receipt_info,distributor_info

																WHERE distributor_info.distributor_id = '".$specific_id."'
																AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																AND transaction_details.transaction_type = 'out' 
																AND transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id
																AND transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id
																AND purchase_receipt_info.distributor_id = distributor_info.distributor_id
																AND transaction_details.transaction_doc  <'".$start_date."'
															  ) as temp_query
														");	
					
					$date_wise_total_payment = $this -> db -> query("SELECT transaction_id,transaction_receipt_id,transaction_reference_id,distributor_id,distributor_name,
																				   SUM(ta) AS total_payment_amount,transaction_mode, transaction_doc
																				  
																		   FROM(SELECT DISTINCT transaction_id,transaction_receipt_info.transaction_receipt_id,transaction_reference_id,
																		           distributor_info.distributor_id,distributor_name,
																				   transaction_details.transaction_amount AS ta,transaction_mode,
																				   transaction_details.transaction_doc
																				 
																					FROM transaction_receipt_info,transaction_details,purchase_receipt_info,distributor_info

																					WHERE  distributor_info.distributor_id = '".$specific_id."'
																					AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																					AND transaction_details.transaction_type = 'out' 
																					AND transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id
																					AND transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id
																					AND purchase_receipt_info.distributor_id = distributor_info.distributor_id 
																					AND transaction_details.transaction_doc >= '".$start_date."' 
																					AND transaction_details.transaction_doc <= '".$end_date."' 
																				) AS temp
																			GROUP BY transaction_doc
																		");	
					
					$date_wise_total_purchase = $this -> db -> select('receipt_id,SUM(grand_total) AS purchase_amount,distributor_info.distributor_name,receipt_date')
														   -> from('purchase_receipt_info,distributor_info')
														   -> where('hotel_id', $this->tank_auth->get_hotel_id())
														   -> where('purchase_receipt_info.distributor_id',$specific_id)
														   -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
														   -> group_by('receipt_date')
														   -> get();

					
					//~ $date_wise_total_purchase = $this -> db -> select('receipt_id,SUM(grand_total) AS purchase_amount,distributor_id,receipt_date')
														   //~ -> from('purchase_receipt_info')
														   //~ -> where('distributor_id',$specific_id)
														   //~ -> where('receipt_date >= "'.$start_date.'"')
														   //~ -> where('receipt_date <= "'.$end_date.'"')
														   //~ -> group_by('receipt_date')
														   //~ -> get();
														   																		     
					//~ $debit_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS final_debit_amount')
											   //~ -> from('purchase_receipt_info')
											   //~  -> where('distributor_id',$specific_id)
											   //~ -> where('receipt_date >= "'.$start_date.'"')
											   //~ -> where('receipt_date <= "'.$end_date.'"')
											   //~ -> get();		   	
							
					$query_final = array(
						'receipt_amount_ob' => $receipt_amount,
						'paid_amount_before' => $paid_amount,
						'date_wise_total_payment' => $date_wise_total_payment,
						'date_wise_total_purchase' => $date_wise_total_purchase
						//'debit_amount' => $debit_amount
					);						
					return $query_final;	 
				}
				else if($for_who_or_what == 'customer')
				{
					$invoice_amount = $this -> db -> select('invoice_id,SUM(grand_total) AS invoice_amount,SUM(discount) AS temp_dis_amount,customer_id,invoice_doc')
											     -> from('invoice_info')
											     -> where('hotel_id', $this->tank_auth->get_hotel_id())
											     -> where('invoice_doc < "'.$start_date.'"')
											     -> where('customer_id',$specific_id)
											     -> get();
											     
					$paid_amount = $this -> db -> query("SELECT ta_one , ta_two
														   FROM(SELECT  SUM(transaction_details.transaction_amount) AS ta_one
																FROM customer_info,transaction_ref_details,transaction_details,invoice_info

																WHERE customer_info.customer_id = '".$specific_id."'
																AND transaction_ref_details.transaction_purpose = 'sale'
																AND transaction_details.transaction_mode = 'cash'
																AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																AND transaction_ref_details.ref_id = invoice_info.invoice_id
																AND invoice_info.customer_id = customer_info.customer_id
																AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
																AND transaction_details.transaction_doc < '".$start_date."'
															) as temp_one,
															(SELECT SUM(transaction_details.transaction_amount) AS ta_two
																FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info
															
																WHERE customer_info.customer_id = '".$specific_id."'
																AND cheque_ref_purpose = 'sale'
																AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																AND cheque_info.cheque_status = 'honored'
																AND cheque_reference_info.cheque_id = cheque_info.cheque_id
																AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
																AND cheque_reference_info.ref_id  = invoice_info.invoice_id
																AND customer_info.customer_id = invoice_info.customer_id
																AND cheque_info.my_bank = bank_info.bank_id
																AND transaction_details.transaction_doc < '".$start_date."'
														   ) as temp_two
														");	
					
					$date_wise_total_payment_cash = $this -> db -> query("SELECT  SUM(transaction_details.transaction_amount) AS amount_by_cash,transaction_doc,customer_name
																			FROM customer_info,transaction_ref_details,transaction_details,invoice_info

																			WHERE customer_info.customer_id = '".$specific_id."'
																			AND transaction_ref_details.transaction_purpose = 'sale'
																			AND transaction_details.transaction_mode = 'cash'
																			AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																			AND transaction_ref_details.ref_id = invoice_info.invoice_id
																			AND invoice_info.customer_id = customer_info.customer_id
																			AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
																			AND transaction_details.transaction_doc >= '".$start_date."' 
																			AND transaction_details.transaction_doc <= '".$end_date."' 
																			GROUP BY transaction_doc
																		");	
					
					$date_wise_total_payment_cheque = $this -> db -> query("SELECT SUM(transaction_details.transaction_amount) AS amount_by_cheque,transaction_doc,customer_name
																				FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info

																				WHERE customer_info.customer_id = '".$specific_id."'
																				AND cheque_ref_purpose = 'sale'
																				AND cheque_info.cheque_status = 'honored'
																				AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																				AND cheque_reference_info.cheque_id = cheque_info.cheque_id
																				AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
																				AND cheque_reference_info.ref_id  = invoice_info.invoice_id
																				AND customer_info.customer_id = invoice_info.customer_id
																				AND cheque_info.my_bank = bank_info.bank_id
																				AND transaction_details.transaction_doc >= '".$start_date."' 
																				AND transaction_details.transaction_doc <= '".$end_date."' 
																				GROUP BY transaction_doc
																		");	

					$date_wise_total_sale = $this -> db -> select('invoice_id,SUM(grand_total) AS invoice_amount, SUM(discount) AS dis_amount,customer_info.customer_name,invoice_doc')
														   -> from('invoice_info,customer_info')
														   -> where('invoice_info.customer_id',$specific_id)
														   -> where('hotel_id', $this->tank_auth->get_hotel_id())
														   -> where('invoice_doc >= "'.$start_date.'"')
														   -> where('invoice_doc <= "'.$end_date.'"')
														   -> where('invoice_info.customer_id = customer_info.customer_id')
														   -> group_by('invoice_doc')
														   -> get();
														   																		     
						   	
					//echo 'hi';		
					$query_final = array(
						'invoice_amount_ob' => $invoice_amount,
						'paid_amount_before' => $paid_amount,
						'date_wise_total_payment_cash' => $date_wise_total_payment_cash,
						'date_wise_total_payment_cheque' => $date_wise_total_payment_cheque,
						'date_wise_total_sale' => $date_wise_total_sale
					);						
					return $query_final;
				}
				else if($for_who_or_what == 'transaction_purpose')
				{
					//echo $specific_id;
					if($specific_id == 'purchase')
					{
						$query_by_cash = $this -> db -> select('distributor_info.distributor_id,distributor_name ,distributor_contact_no,receipt_id,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,receipt_date,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_ref_details.transaction_purpose AS name,transaction_details.transaction_receipt_id,
																   transaction_details.transaction_doc'
																)
													-> from('distributor_info,transaction_receipt_info,transaction_ref_details,transaction_details,purchase_receipt_info')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.transaction_purpose = "purchase" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = purchase_receipt_info.receipt_id')
													-> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id')
													-> where('transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id')
													//-> where('distributor_info.distributor_id = "'.$specific_id.'"')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> where('receipt_date >= "'.$start_date.'"')
													-> where('receipt_date <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select(' distributor_info.distributor_id,distributor_name ,distributor_contact_no,purchase_receipt_info.receipt_id,
																	   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,receipt_date,
																	   cheque_info.cheque_type,cheque_account_no,cheque_account_name,transaction_details.transaction_mode,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_reference_info.transaction_amount,cheque_reference_info.cheque_ref_purpose AS name,
																	   transaction_details.transaction_doc'
																  )	
														-> from('distributor_info,transaction_receipt_info,cheque_reference_info,transaction_details,cheque_info,bank_info,purchase_receipt_info')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_ref_purpose ="purchase"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_cheque_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_info.cheque_id = transaction_receipt_info.transaction_receipt_cheque_id')
														-> where('transaction_receipt_status = 1')
														-> where('cheque_reference_info.ref_id  = purchase_receipt_info.receipt_id')
														-> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
														-> where('transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														//-> where('distributor_info.distributor_id = "'.$specific_id.'"')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> where('receipt_date >= "'.$start_date.'"')
														-> where('receipt_date <= "'.$end_date.'"')
														-> get();
														
						$debit_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS final_debit_amount')
												   -> from('purchase_receipt_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> where('receipt_date >= "'.$start_date.'"')
												   -> where('receipt_date <= "'.$end_date.'"')
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'sale')
					{
						$query_by_cash = $this -> db -> select('customer_info.customer_id,customer_name ,customer_contact_no,invoice_id,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_ref_details.transaction_purpose AS name,
																   invoice_doc,transaction_details.transaction_doc'
																)
													-> from('customer_info,transaction_ref_details,transaction_details,invoice_info')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.transaction_purpose = "sale" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = invoice_info.invoice_id')
													-> where('invoice_info.customer_id = customer_info.customer_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													//-> where('customer_info.customer_id = "'.$specific_id.'"')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> where('invoice_doc >= "'.$start_date.'"')
													-> where('invoice_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('customer_info.customer_id, customer_name,customer_contact_no,invoice_id, transaction_details.transaction_id,
																  transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount, transaction_details.transaction_mode,
																   cheque_info.cheque_type,cheque_account_no,cheque_account_name, cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																   cheque_bank_name,bank_info.bank_name, invoice_doc,transaction_details.transaction_doc,cheque_ref_purpose AS name'
																  )	
														-> from('customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info')
														
														-> where('cheque_ref_purpose ="sale"')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('customer_info.customer_id = invoice_info.customer_id')
														-> where('cheque_reference_info.ref_id  = invoice_info.invoice_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														//-> where('customer_info.customer_id = "'.$specific_id.'"')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> where('invoice_doc >= "'.$start_date.'"')
														-> where('invoice_doc <= "'.$end_date.'"')
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(grand_total) AS final_debit_amount')
												   -> from('invoice_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> where('invoice_doc >= "'.$start_date.'"')
												   -> where('invoice_doc <= "'.$end_date.'"')
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'expense')
					{
						$query_by_cash = $this -> db -> select('expense_info.expense_id,service_provider_info.service_provider_name, expense_type,expense_amount,expense_details,transaction_details.transaction_id,
																   transaction_details.transaction_amount AS credit_amount, transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id, expense_doc,transaction_details.transaction_doc'
															   )
													-> from('expense_info,transaction_ref_details,transaction_details,service_provider_info')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.transaction_purpose = "expense" ')
													-> where('expense_info.service_provider_id = service_provider_info.service_provider_id')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = expense_info.expense_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> where('expense_doc >= "'.$start_date.'"')
													-> where('expense_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('expense_info.expense_id,expense_type,expense_amount,expense_details,service_provider_info.service_provider_name,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   expense_doc,transaction_details.transaction_doc'
																  )	
														-> from('expense_info,cheque_reference_info,transaction_details,cheque_info,bank_info,service_provider_info')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_ref_purpose ="expense"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('expense_info.service_provider_id = service_provider_info.service_provider_id')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = expense_info.expense_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> where('expense_doc >= "'.$start_date.'"')
														-> where('expense_doc <= "'.$end_date.'"')
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(expense_amount) AS final_debit_amount')
												   -> from('expense_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> where('expense_doc >= "'.$start_date.'"')
												   -> where('expense_doc <= "'.$end_date.'"')
												   -> where('expense_type <> "Transport Cost For Purchase"')
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'gift')
					{
						$query_by_cash = $this -> db -> select('gift_details.gift_id, gift_amount,gift_creator,distributor_name,gift_description,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,
																   gift_doc,transaction_details.transaction_doc'
															   )
													-> from('gift_details,transaction_ref_details,transaction_details,distributor_info')
													-> where('transaction_ref_details.transaction_purpose = "gift" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.ref_id = gift_details.gift_id')
													-> where('gift_details.gift_from = distributor_info.distributor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> where('gift_doc >= "'.$start_date.'"')
													-> where('gift_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('gift_details.gift_id, gift_amount,gift_creator,distributor_name,gift_description,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   gift_doc,transaction_details.transaction_doc'
																  )	
														-> from('gift_details,cheque_reference_info,transaction_details,cheque_info,bank_info,distributor_info')
														-> where('cheque_ref_purpose ="gift"')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = gift_details.gift_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('gift_details.gift_from = distributor_info.distributor_id')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> where('gift_doc >= "'.$start_date.'"')
														-> where('gift_doc <= "'.$end_date.'"')
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(gift_amount) AS final_debit_amount')
												   -> from('gift_details')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> where('gift_doc >= "'.$start_date.'"')
												   -> where('gift_doc <= "'.$end_date.'"')
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'investment')
					{
						$query_by_cash = $this -> db -> select('investment_id, investment_amount,investor_name, investment_doc,investment_details,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,transaction_details.transaction_doc'
															   )
													-> from('investment_info,transaction_ref_details,transaction_details,investor_info')
													-> where('transaction_ref_details.transaction_purpose = "investment" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.ref_id = investment_info.investment_id')
													-> where('investor_info.investor_id = investment_info.investor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> where('investment_doc >= "'.$start_date.'"')
													-> where('investment_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('investment_id, investment_amount,investor_name, investment_doc,investment_details,
																   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																   transaction_details.transaction_doc'
																  )	
														-> from('investment_info,cheque_reference_info,transaction_details,cheque_info,bank_info,investor_info')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_ref_purpose ="investment"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = investment_info.investment_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('investor_info.investor_id = investment_info.investor_id')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> where('investment_doc >= "'.$start_date.'"')
														-> where('investment_doc <= "'.$end_date.'"')
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(investment_amount) AS final_debit_amount')
												   -> from('investment_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> where('investment_doc >= "'.$start_date.'"')
												   -> where('investment_doc <= "'.$end_date.'"')
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'Withdrawal')
					{
						//echo 'hel';
						$query_by_cash = $this -> db -> select('investor_info.investor_id,investor_name,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,transaction_details.transaction_doc'
															   )
													-> from('transaction_ref_details,transaction_details,investor_info,investment_info')
													-> where('transaction_ref_details.transaction_purpose = "Witdrawal"')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.ref_id = investor_info.investor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('investor_info.investor_id,investor_name,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   transaction_details.transaction_doc'
																  )	
														-> from('cheque_reference_info,transaction_details,cheque_info,bank_info,investor_info')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_ref_purpose ="Witdrawal"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = investor_info.investor_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> get();
						
						/*$debit_amount ; = $this -> db -> select('SUM(investment_amount) AS final_debit_amount')
												   -> from('investment_info')
												   -> where('investment_doc >= "'.$start_date.'"')
												   -> where('investment_doc <= "'.$end_date.'"')
												   -> get();	*/		
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque
							//'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'Loan')
					{
						//echo 'hel';
						$query_by_cash = $this -> db -> select('  
																   loan_details_id, loan_mode,loan_details_info.loan_seeker_id,contact_no,loan_seeker_name,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,transaction_details.transaction_doc'
															   )
													-> from('transaction_ref_details,transaction_details,loan_details_info, loan_seeker_info')
													-> where('transaction_ref_details.transaction_purpose = "Loan"')
													-> where('transaction_details.transaction_mode = "cash" ')
													
													-> where('loan_details_info.loan_seeker_id = loan_seeker_info.loan_seeker_id')
													-> where('transaction_ref_details.ref_id = loan_details_info.loan_details_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
													-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
													-> get();
						$query_by_cheque = 	$this -> db -> select('    loan_details_id, loan_mode,loan_details_info.loan_seeker_id,contact_no,loan_seeker_name,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   transaction_details.transaction_doc'
																  )	
														-> from('cheque_reference_info,transaction_details,cheque_info,bank_info,loan_details_info, loan_seeker_info')
														-> where('cheque_ref_purpose ="Loan"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_mode = "cheque" ')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  =  loan_details_info.loan_details_id')
														-> where('loan_details_info.loan_seeker_id = loan_seeker_info.loan_seeker_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('transaction_details.transaction_doc >= "'.$start_date.'"')
														-> where('transaction_details.transaction_doc <= "'.$end_date.'"')
														-> get();
						
						/*$debit_amount = $this -> db -> select('SUM(loan_amount) AS final_debit_amount')
												   -> from('loan_details_info')
												   -> where('doc >= "'.$start_date.'"')
												   -> where('doc <= "'.$end_date.'"')
												   -> get();*/		
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque
							//'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
				}
			}
			else  // this portion will never get true but still keeping this......what if someday we need the code :P ---------------10-12-2013-----------
			{
				if($for_who_or_what == 'distributor')
				{
					$date_wise_total_payment = $this -> db -> query("SELECT transaction_id,transaction_receipt_id,transaction_reference_id,distributor_id,distributor_name,
																				   SUM(ta) AS total_payment_amount,transaction_mode, transaction_doc
																				  
																		   FROM(SELECT DISTINCT transaction_id,transaction_receipt_info.transaction_receipt_id,transaction_reference_id,
																		           distributor_info.distributor_id,distributor_name,
																				   transaction_details.transaction_amount AS ta,transaction_mode,
																				   transaction_details.transaction_doc
																				 
																					FROM transaction_receipt_info,transaction_details,purchase_receipt_info,distributor_info

																					WHERE  distributor_info.distributor_id = '".$specific_id."'
																					AND transaction_details.transaction_type = 'out' 
																					AND transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id
																					AND transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id
																					AND purchase_receipt_info.distributor_id = distributor_info.distributor_id 
																					AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																					GROUP BY transaction_details.transaction_doc
																				) AS temp
																			GROUP BY transaction_doc
																		");	
					
					$date_wise_total_purchase = $this -> db -> select('receipt_id,SUM(grand_total) AS purchase_amount,distributor_info.distributor_name,receipt_date')
														   -> from('purchase_receipt_info,distributor_info')
														   -> where('purchase_receipt_info.distributor_id',$specific_id)
														   -> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
														   -> where('hotel_id', $this->tank_auth->get_hotel_id())
														   -> group_by('receipt_date')
														   -> get();

					$query_final = array(
						'date_wise_total_payment' => $date_wise_total_payment,
						'date_wise_total_purchase' => $date_wise_total_purchase
					);						
					return $query_final;									 
				}
				else if($for_who_or_what == 'customer')
				{
					$date_wise_total_payment_cash = $this -> db -> query("SELECT  SUM(transaction_details.transaction_amount) AS amount_by_cash,transaction_doc,customer_name
																			FROM customer_info,transaction_ref_details,transaction_details,invoice_info

																			WHERE customer_info.customer_id = '".$specific_id."'
																			AND transaction_ref_details.transaction_purpose = 'sale'
																			AND transaction_details.transaction_mode = 'cash'

																			AND transaction_ref_details.ref_id = invoice_info.invoice_id
																			AND invoice_info.customer_id = customer_info.customer_id
																			AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
																			AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																			GROUP BY transaction_details.transaction_doc
																		");	
					
					$date_wise_total_payment_cheque = $this -> db -> query("SELECT SUM(transaction_details.transaction_amount) AS amount_by_cheque,transaction_doc,customer_name
																				FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info

																				WHERE customer_info.customer_id = '".$specific_id."'
																				AND cheque_ref_purpose = 'sale'
																				AND cheque_info.cheque_status = 'honored'
																				AND cheque_reference_info.cheque_id = cheque_info.cheque_id
																				AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
																				AND cheque_reference_info.ref_id  = invoice_info.invoice_id
																				AND customer_info.customer_id = invoice_info.customer_id
																				AND cheque_info.my_bank = bank_info.bank_id
																				AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
																				GROUP BY transaction_details.transaction_doc
																		");	

					$date_wise_total_sale = $this -> db -> select('invoice_id,SUM(grand_total) AS invoice_amount,customer_info.customer_name,invoice_doc')
														   -> from('invoice_info,customer_info')
														   -> where('invoice_info.customer_id',$specific_id)
														   -> where('invoice_info.customer_id = customer_info.customer_id')
														   -> where('hotel_id', $this->tank_auth->get_hotel_id())
														   -> group_by('invoice_doc')
														   -> get();
														   																		     
						   	
							
					$query_final = array(
						'date_wise_total_payment_cash' => $date_wise_total_payment_cash,
						'date_wise_total_payment_cheque' => $date_wise_total_payment_cheque,
						'date_wise_total_sale' => $date_wise_total_sale
					);						
					return $query_final;
				}
				else if($for_who_or_what == 'transaction_purpose')
				{
					if($specific_id == 'purchase')
					{
						$query_by_cash = $this -> db -> select('distributor_info.distributor_id,distributor_name ,distributor_contact_no,receipt_id,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,receipt_date,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_ref_details.transaction_purpose AS name,transaction_details.transaction_receipt_id,
																   transaction_details.transaction_doc'
																)
													-> from('distributor_info,transaction_receipt_info,transaction_ref_details,transaction_details,purchase_receipt_info')
													-> where('transaction_ref_details.transaction_purpose = "purchase" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = purchase_receipt_info.receipt_id')
													-> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_id')
													-> where('transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> get();
						$query_by_cheque = 	$this -> db -> select(' distributor_info.distributor_id,distributor_name ,distributor_contact_no,purchase_receipt_info.receipt_id,
																	   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,receipt_date,
																	   cheque_info.cheque_type,cheque_account_no,cheque_account_name,transaction_details.transaction_mode,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_reference_info.transaction_amount,cheque_reference_info.cheque_ref_purpose AS name,
																	   transaction_details.transaction_doc'
																  )	
														-> from('distributor_info,transaction_receipt_info,cheque_reference_info,transaction_details,cheque_info,bank_info,purchase_receipt_info')
														-> where('cheque_ref_purpose ="purchase"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('transaction_details.transaction_receipt_id = transaction_receipt_info.transaction_receipt_cheque_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_info.cheque_id = transaction_receipt_info.transaction_receipt_cheque_id')
														-> where('transaction_receipt_status = 1')
														-> where('cheque_reference_info.ref_id  = purchase_receipt_info.receipt_id')
														-> where('purchase_receipt_info.distributor_id = distributor_info.distributor_id')
														-> where('transaction_receipt_info.transaction_receipt_ref_id = purchase_receipt_info.distributor_id')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> get();
														
						$debit_amount = $this -> db -> select('SUM(purchase_receipt_info.grand_total) AS final_debit_amount')
												   -> from('purchase_receipt_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'sale')
					{
						$query_by_cash = $this -> db -> select('customer_info.customer_id,customer_name ,customer_contact_no,invoice_id,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_ref_details.transaction_purpose AS name,
																   invoice_doc,transaction_details.transaction_doc'
																)
													-> from('customer_info,transaction_ref_details,transaction_details,invoice_info')
													-> where('transaction_ref_details.transaction_purpose = "sale" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = invoice_info.invoice_id')
													-> where('invoice_info.customer_id = customer_info.customer_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> get();
						$query_by_cheque = 	$this -> db -> select('customer_info.customer_id, customer_name,customer_contact_no,invoice_id, transaction_details.transaction_id,
																  transaction_details.transaction_amount AS credit_amount,grand_total AS debit_amount, transaction_details.transaction_mode,
																   cheque_info.cheque_type,cheque_account_no,cheque_account_name, cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																   cheque_bank_name,bank_info.bank_name, invoice_doc,transaction_details.transaction_doc,cheque_ref_purpose AS name'
																  )	
														-> from('customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info')
														
														-> where('cheque_ref_purpose ="sale"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('customer_info.customer_id = invoice_info.customer_id')
														-> where('cheque_reference_info.ref_id  = invoice_info.invoice_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(grand_total) AS final_debit_amount')
												   -> from('invoice_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'expense')
					{
						$query_by_cash = $this -> db -> select('expense_info.expense_id, expense_type,expense_amount,transaction_details.transaction_id,expense_details,
																   transaction_details.transaction_amount AS credit_amount, transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id, expense_doc,transaction_details.transaction_doc'
															   )
													-> from('expense_info,transaction_ref_details,transaction_details')
													-> where('transaction_ref_details.transaction_purpose = "expense" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = expense_info.expense_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> get();
						$query_by_cheque = 	$this -> db -> select('expense_info.expense_id,expense_type,expense_amount,expense_details,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   expense_doc,transaction_details.transaction_doc'
																  )	
														-> from('expense_info,cheque_reference_info,transaction_details,cheque_info,bank_info')
														
														-> where('cheque_ref_purpose ="expense"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = expense_info.expense_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(expense_amount) AS final_debit_amount')
												   -> from('expense_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'gift')
					{
						$query_by_cash = $this -> db -> select('gift_details.gift_id, gift_amount,gift_creator,distributor_name,gift_description,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,
																   gift_doc,transaction_details.transaction_doc'
															   )
													-> from('gift_details,transaction_ref_details,transaction_details,distributor_info')
													-> where('transaction_ref_details.transaction_purpose = "gift" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													
													-> where('transaction_ref_details.ref_id = gift_details.gift_id')
													-> where('gift_details.gift_from = distributor_info.distributor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> get();
						$query_by_cheque = 	$this -> db -> select('gift_details.gift_id, gift_amount,gift_creator,distributor_name,gift_description,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   gift_doc,transaction_details.transaction_doc'
																  )	
														-> from('gift_details,cheque_reference_info,transaction_details,cheque_info,bank_info,distributor_info')
														-> where('cheque_ref_purpose ="gift"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = gift_details.gift_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('gift_details.gift_from = distributor_info.distributor_id')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(gift_amount) AS final_debit_amount')
												   -> from('gift_details')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'investment')
					{
						$query_by_cash = $this -> db -> select('investment_id, investment_amount,investor_name AS name, investment_doc,investment_details,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,transaction_details.transaction_doc'
															   )
													-> from('investment_info,transaction_ref_details,transaction_details,investor_info')
													-> where('transaction_ref_details.transaction_purpose = "investment" ')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_ref_details.ref_id = investment_info.investment_id')
													-> where('investor_info.investor_id = investment_info.investor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> get();
						$query_by_cheque = 	$this -> db -> select('investment_id, investment_amount,investor_name AS name, investment_doc,investment_details,
																   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose,
																   transaction_details.transaction_doc'
																  )	
														-> from('investment_info,cheque_reference_info,transaction_details,cheque_info,bank_info,investor_info')
														-> where('cheque_ref_purpose ="investment"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = investment_info.investment_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> where('investor_info.investor_id = investment_info.investor_id')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> get();
						
						$debit_amount = $this -> db -> select('SUM(investment_amount) AS final_debit_amount')
												   -> from('investment_info')
												   -> where('hotel_id', $this->tank_auth->get_hotel_id())
												   -> get();			
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
					else if($specific_id == 'Withdrawal')
					{
						$query_by_cash = $this -> db -> select('investor_info.investor_id,investor_name,
																   transaction_details.transaction_id, transaction_details.transaction_amount AS credit_amount, 
																   transaction_ref_details.transaction_purpose AS name,
																   transaction_details.transaction_type,transaction_details.transaction_mode,
																   transaction_details.transaction_receipt_id,transaction_details.transaction_doc'
															   )
													-> from('transaction_ref_details,transaction_details,investor_info,investment_info')
													-> where('transaction_ref_details.transaction_purpose = "Witdrawal"')
													-> where('transaction_details.transaction_mode = "cash" ')
													-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
													-> where('transaction_ref_details.ref_id = investor_info.investor_id')
													-> where('transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id')
													-> get();
						$query_by_cheque = 	$this -> db -> select('investor_info.investor_id,investor_name,
																	   transaction_details.transaction_id,transaction_details.transaction_amount AS credit_amount,
																	   transaction_details.transaction_mode,cheque_info.cheque_type,cheque_account_no,cheque_account_name,
																	   cheque_info.cheque_amount,cheque_status,cheque_date,cheque_no,
																	   cheque_bank_name,bank_info.bank_name,cheque_ref_purpose AS name,
																	   transaction_details.transaction_doc'
																  )	
														-> from('cheque_reference_info,transaction_details,cheque_info,bank_info,investor_info')
														-> where('cheque_ref_purpose ="Witdrawal"')
														-> where('cheque_info.cheque_status = "honored"')
														-> where('transaction_details.hotel_id', $this->tank_auth->get_hotel_id())
														-> where('transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id')
														-> where('cheque_reference_info.cheque_id = cheque_info.cheque_id')
														-> where('cheque_reference_info.ref_id  = investor_info.investor_id')
														-> where('cheque_info.my_bank = bank_info.bank_id')
														-> get();
						
						 /**$debit_amount = 0; 
						 = $this -> db -> select('SUM(investment_amount) AS final_debit_amount')
												   -> from('investment_info')
												   -> where('investment_doc >= "'.$start_date.'"')
												   -> where('investment_doc <= "'.$end_date.'"')
												   -> get();	*/		
								
						$query_final = array(
							'cash' => $query_by_cash,
							'cheque' => $query_by_cheque,
							//'debit_amount' => $debit_amount
						);						
						return $query_final;
					}
				}
			}
		}
		
		/***************************************************
		 * Customer Sale Report Details
		 * System for distributor requrement
		 * Show supplyer/company wise Sale to a customer
		 * 08-11-2013
		 * Arafat Mamun
		***************************************************/
		function customer_sale_report_distributor_wise( $customer_id )
		{
			$all_information = $this -> db -> query("
										   SELECT temp.distributor_name,temp.distributor_id,
										   SUM( temp.total_price ) AS total_price,
										   SUM( temp.grand_total ) AS grand_total,
										   SUM( temp.total_paid )  AS total_paid,
										   temp.invoice_id
										   FROM(
												SELECT distributor_info.distributor_name,distributor_info.distributor_id,
															   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
												FROM distributor_info, gate_pass_info,purchase_receipt_info, purchase_info,gate_pass_details,invoice_info
												WHERE invoice_info.customer_id = ".$customer_id."
												AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
												AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
												AND purchase_receipt_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
												AND purchase_info.product_id = gate_pass_details.product_id
												AND gate_pass_info.gate_pass_id = invoice_info.gate_pass_id
												AND gate_pass_details.gate_pass_id = gate_pass_info.gate_pass_id
												GROUP BY invoice_info.invoice_id
											   )AS temp
							
											GROUP BY temp.distributor_id
											ORDER BY temp.distributor_name
										");
			return $all_information;
			/*
			$all_information = $this -> db -> query("
							SELECT temp.distributor_name,temp.distributor_id,
								   SUM( temp.total_price ) AS total_price,
								   SUM( temp.grand_total ) AS grand_total,
								   SUM( temp.total_paid )  AS total_paid,
								   temp.invoice_id
							FROM( (  SELECT distributor_info.distributor_name,distributor_info.distributor_id,
										   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
									FROM distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info
									WHERE invoice_info.customer_id = ".$customer_id."
									AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
									AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
									AND purchase_info.product_id = sale_details.stock_id
									AND sale_details.invoice_id = invoice_info.invoice_id
									AND sale_details.product_specification = 'bulk'
									GROUP BY invoice_info.invoice_id
								  )
								UNION
								 (  SELECT distributor_info.distributor_name,distributor_info.distributor_id,
										   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
									FROM distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info,stock_info
									WHERE invoice_info.customer_id = ".$customer_id."
									AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
									AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
									AND purchase_info.purchase_id = stock_info.purchase_id
									AND stock_info.stock_id = sale_details.stock_id
									AND sale_details.invoice_id = invoice_info.invoice_id
									AND sale_details.product_specification = 'individual'
									GROUP BY invoice_info.invoice_id
								 ) 
								) AS temp
							
							GROUP BY temp.distributor_id
							ORDER BY temp.distributor_name
						");
			return $all_information;
			*/
			
			/*
			$this -> db -> order_by("distributor_name", "asc");
			$this -> db -> select('distributor_info.distributor_name,distributor_info.distributor_id,
								   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id');
			$this -> db -> from('distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info');
			$this -> db -> where('invoice_info.customer_id', $customer_id);
			$this -> db -> where('distributor_info.distributor_id = purchase_receipt_info.distributor_id' );
			$this -> db -> where('purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id' );
			$this -> db -> where('purchase_info.product_id = sale_details.stock_id');
			$this -> db -> where('sale_details.invoice_id = invoice_info.invoice_id');
			$this -> db -> where('sale_details.product_specification = "bulk"');
			$this -> db -> group_by('invoice_info.invoice_id');
			$all_bulk = $this -> db -> get();
			*/
			/*
			$this -> db -> order_by("distributor_name", "asc");
			$this -> db -> select('distributor_info.distributor_name,distributor_info.distributor_id,
								   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id');
			$this -> db -> from('distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info,stock_info');
			$this -> db -> where('invoice_info.customer_id', $customer_id);
			$this -> db -> where('distributor_info.distributor_id = purchase_receipt_info.distributor_id' );
			$this -> db -> where('purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id' );
			$this -> db -> where('purchase_info.purchase_id = stock_info.purchase_id');
			$this -> db -> where('stock_info.stock_id = sale_details.stock_id');
			$this -> db -> where('sale_details.invoice_id = invoice_info.invoice_id');
			$this -> db -> where('sale_details.product_specification = "individual"');
			$this -> db -> group_by('invoice_info.invoice_id');
			$all_individual = $this -> db -> get();
			*/
			/*
			$information['distributor_name_id'][''] ='';
			//~ $information['distributor_details']['']['total_price'] = '';
			//~ $information['distributor_details']['']['grand_total'] = '';
			//~ $information['distributor_details']['']['total_paid'] = '';
			foreach($all_bulk -> result() as $details):
				$information['distributor_name_id'][ $details -> distributor_id ] = $details -> distributor_name;
				$information['distributor_details'][$details -> distributor_name]['total_price'] = $details -> total_price;
				$information['distributor_details'][$details -> distributor_name]['grand_total'] = $details -> grand_total;
				$information['distributor_details'][$details -> distributor_name]['total_paid'] = $details -> total_paid;
			endforeach;
			/*
			foreach($all_individual -> result() as $details):
				$information['distributor_name_id'][ $details -> distributor_id ] = $details -> distributor_name;
				$information['distributor_details'][$details -> distributor_name]['total_price'] = $details -> total_price;
				$information['distributor_details'][$details -> distributor_name]['grand_total'] = $details -> grand_total;
				$information['distributor_details'][$details -> distributor_name]['total_paid'] = $details -> total_paid;
			endforeach;
			* */
			/*
			if( $all_individual -> num_rows() > 0 || $all_bulk -> num_rows() > 0)
			{
				sort($information['distributor_name_id']);   // sort array by assending order
				reset($information['distributor_name_id']); // set array pointer to the first node
			}
			return $information;

			//~ while(key($information['distributor_name']) !== NULL)
			//~ {
				//~ echo current($information['distributor_name']) . "/";
				//~ echo $information['distributor_wise_transaction'][ current($information['distributor_name']) ] [ 'total_price'] . "/-";
				//~ echo $information['distributor_wise_transaction'][ current($information['distributor_name']) ] [ 'grand_total']  . "/-";
				//~ echo $information['distributor_wise_transaction'][ current($information['distributor_name']) ] [ 'total_paid' ]  . "<br>";
				//~ next($information['distributor_name']);
			//~ }
			//~ 
			//~ foreach($all_individual -> result() as $details):
				//~ echo $details -> distributor_id;
				//~ echo '/'.$details -> distributor_name;
				//~ echo '/'.$details -> invoice_id;
				//~ echo '/'.$details -> total_price;
				//~ echo '/'.$details -> grand_total;
				//~ echo '/'.$details -> total_paid ."<br>";
			//~ endforeach;
			*/
			
		}
		/************************************
		* Specific Distributor Information 
		* 08-11-2013
		* Arafat Mamun
		* **********************************/
		function specific_distributor_info( $distributor_id )
		{
			$this -> db -> where('distributor_id', $distributor_id);
			return $this -> db -> get('distributor_info');
		}
		
		/***************************************************
		 * Distributor Wise Sale Details
		 * System for distributor requrement
		 * Show supplyer/company wise Sale to all customer
		 * 09-11-2013
		 * Arafat Mamun
		***************************************************/
		function distributor_wise_sale_report( $distributor_id )
		{
			$all_information = $this -> db -> query("
							SELECT temp.customer_name,temp.customer_id,
								   SUM( temp.total_price ) AS total_price,
								   SUM( temp.grand_total ) AS grand_total,
								   SUM( temp.total_paid )  AS total_paid,
								   temp.invoice_id
							FROM(
									SELECT customer_info.customer_name,customer_info.customer_id,
										   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
									FROM distributor_info, purchase_receipt_info, purchase_info,invoice_info,
										 customer_info,gate_pass_info,gate_pass_details
									WHERE purchase_receipt_info.distributor_id = ".$distributor_id."
									AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
									AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
									AND purchase_info.product_id = gate_pass_details.product_id
									AND gate_pass_info.gate_pass_id = invoice_info.gate_pass_id
									AND purchase_receipt_info.hotel_id = '".$this->tank_auth->get_hotel_id()."'
									AND gate_pass_details.gate_pass_id = gate_pass_info.gate_pass_id
									AND invoice_info.customer_id = customer_info.customer_id
									GROUP BY invoice_info.invoice_id
									) AS temp
							GROUP BY temp.customer_id
							ORDER BY customer_name
								 
						");
			return $all_information;
			/*
			$all_information = $this -> db -> query("
							SELECT temp.customer_name,temp.customer_id,
								   SUM( temp.total_price ) AS total_price,
								   SUM( temp.grand_total ) AS grand_total,
								   SUM( temp.total_paid )  AS total_paid,
								   temp.invoice_id
							FROM( (  SELECT customer_info.customer_name,customer_info.customer_id,
										   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
									FROM distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info,customer_info
									WHERE purchase_receipt_info.distributor_id = ".$distributor_id."
									AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
									AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
									AND purchase_info.product_id = sale_details.stock_id
									AND sale_details.invoice_id = invoice_info.invoice_id
									AND invoice_info.customer_id = customer_info.customer_id
									AND sale_details.product_specification = 'bulk'
									GROUP BY invoice_info.invoice_id
								  )
								UNION
								 (  SELECT customer_info.customer_name,customer_info.customer_id,
										   invoice_info.total_price,invoice_info.grand_total,invoice_info.total_paid,invoice_info.invoice_id
									FROM distributor_info, purchase_receipt_info, purchase_info,sale_details,invoice_info,stock_info,customer_info
									WHERE  purchase_receipt_info.distributor_id = ".$distributor_id."
									AND distributor_info.distributor_id = purchase_receipt_info.distributor_id
									AND purchase_receipt_info.receipt_id = purchase_info.purchase_receipt_id
									AND purchase_info.purchase_id = stock_info.purchase_id
									AND stock_info.stock_id = sale_details.stock_id
									AND sale_details.invoice_id = invoice_info.invoice_id
									AND invoice_info.customer_id = customer_info.customer_id
									AND sale_details.product_specification = 'individual'
									GROUP BY invoice_info.invoice_id
								 ) 
								) AS temp
							GROUP BY temp.customer_id
						");
			return $all_information;
			*/
		}
		/* ***************************************
		 * this will fatch all  transactions 
		 * of all customers 
		 * 
		 * Section: Accounts
		 * ***************************************/
		function fatch_all_customer_transactions()
		{
			$this -> db -> order_by('total_due', "DESC");
			$query = $this -> db -> select('invoice_id,invoice_info.customer_id,customer_name,customer_contact_no,SUM(grand_total - total_paid) As total_due')
								 -> from('invoice_info,customer_info')
								 -> where('customer_info.customer_id = invoice_info.customer_id')
								 -> where('hotel_id', $this->tank_auth->get_hotel_id())
								 //-> where('total_paid < grand_total')
								 -> group_by('invoice_id')
								 -> get();
			return $query;
		}
		/* *******************09-12-2013**********************
		 * this will fatch all  transactions with customers
		 * of all customers 
		 * 
		 * Section: Accounts
		 * ***************************************************/
		function transaction_with_customer($startDate, $endDate)
		{
			/*$paid_by_cash = $this -> db -> query("
													SELECT  SUM(transaction_details.transaction_amount) AS amount_by_cash,transaction_doc,customer_name,
															COUNT(transaction_details.transaction_id) AS no_of_transaction,customer_info.customer_id
														FROM customer_info,transaction_ref_details,transaction_details,invoice_info

														WHERE  transaction_ref_details.transaction_purpose = 'sale'
														AND transaction_details.transaction_mode = 'cash'
														AND transaction_details.transaction_amount <> 0

														AND transaction_ref_details.ref_id = invoice_info.invoice_id
														AND invoice_info.customer_id = customer_info.customer_id
														AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
														AND transaction_details.transaction_doc >= '".$startDate."'
														AND transaction_details.transaction_doc <= '".$endDate."'
														GROUP BY customer_id
												");
			$paid_by_cheque = $this -> db -> query("
													SELECT SUM(transaction_details.transaction_amount) AS amount_by_cheque,transaction_doc,customer_name,
															COUNT(transaction_details.transaction_id) AS no_of,customer_info.customer_id
																																			
														FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info

														WHERE cheque_ref_purpose = 'sale'
														AND cheque_info.cheque_status = 'honored'
														AND transaction_details.transaction_amount <> 0
														AND cheque_reference_info.cheque_id = cheque_info.cheque_id
														AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
														AND cheque_reference_info.ref_id  = invoice_info.invoice_id
														AND customer_info.customer_id = invoice_info.customer_id
														AND transaction_details.transaction_doc >= '".$startDate."'
														AND transaction_details.transaction_doc <= '".$endDate."'
														GROUP BY customer_id
												");
			*/
			
			$query = $this -> db -> query("
											SELECT  temp_one.customer_id,temp_one.customer_name,SUM(temp_one.amount_paid) as total_paid, SUM(temp_one.no_of) AS no_of_payment
												FROM 

												(
													SELECT  SUM(transaction_details.transaction_amount) AS amount_paid,transaction_doc,customer_name,
															COUNT(transaction_details.transaction_id) AS no_of,customer_info.customer_id
													FROM customer_info,transaction_ref_details,transaction_details,invoice_info

														WHERE  transaction_ref_details.transaction_purpose = 'sale'
														AND transaction_details.transaction_mode = 'cash'
														AND transaction_details.transaction_amount <> 0
														AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'		
														AND transaction_ref_details.ref_id = invoice_info.invoice_id
														AND invoice_info.customer_id = customer_info.customer_id
														AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
														AND transaction_details.transaction_doc >= '".$startDate."'
														AND transaction_details.transaction_doc <= '".$endDate."'
													GROUP BY customer_id

												UNION
													SELECT SUM(transaction_details.transaction_amount) AS amount_paid,transaction_doc,customer_name,
														COUNT(transaction_details.transaction_id) AS no_of,customer_info.customer_id
																																	
													FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info

														WHERE cheque_ref_purpose = 'sale'
														AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
														AND cheque_info.cheque_status = 'honored'
														AND transaction_details.transaction_amount <> 0
														AND cheque_reference_info.cheque_id = cheque_info.cheque_id
														AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
														AND cheque_reference_info.ref_id  = invoice_info.invoice_id
														AND customer_info.customer_id = invoice_info.customer_id
														AND transaction_details.transaction_doc >= '".$startDate."'
														AND transaction_details.transaction_doc <= '".$endDate."'
													GROUP BY customer_id
												) as temp_one

												GROUP BY temp_one.customer_id
												ORDER BY temp_one.customer_name
										 ");
			return $query;									
												
		}
		/* ***********************************************************
		 * this will fatch all  transactions with customers(specific)
		 * of all customers 
		 * 
		 * Section: Accounts
		 * ***********************************************************/
		function transaction_with_customer_details($customer_id,$startDate,$endDate)
		{
			$query = $this -> db -> query("
											SELECT  temp_one.customer_id,temp_one.customer_name,temp_one.amount_paid as total_paid,temp_one.transaction_doc

											FROM 

											(
											SELECT transaction_details.transaction_amount AS amount_paid,transaction_doc,customer_name,customer_info.customer_id
											FROM customer_info,transaction_ref_details,transaction_details,invoice_info

											WHERE  transaction_ref_details.transaction_purpose = 'sale'
											AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											AND transaction_details.transaction_mode = 'cash'
											AND transaction_details.transaction_amount <> 0
											AND invoice_info.customer_id = '".$customer_id."'
											AND transaction_ref_details.ref_id = invoice_info.invoice_id
											AND invoice_info.customer_id = customer_info.customer_id
											AND transaction_details.transaction_reference_id = transaction_ref_details.transaction_ref_details_id
											AND transaction_details.transaction_doc >= '".$startDate."'
											AND transaction_details.transaction_doc <= '".$endDate."'


											UNION
											SELECT transaction_details.transaction_amount AS amount_paid,transaction_doc,customer_name,customer_info.customer_id
																															
											FROM customer_info,cheque_reference_info,transaction_details,cheque_info,bank_info,invoice_info

											WHERE cheque_ref_purpose = 'sale'
											AND transaction_details.hotel_id = '".$this->tank_auth->get_hotel_id()."'
											AND invoice_info.customer_id = '".$customer_id."'
											AND cheque_info.cheque_status = 'honored'
											AND transaction_details.transaction_amount <> 0
											AND cheque_reference_info.cheque_id = cheque_info.cheque_id
											AND transaction_details.transaction_reference_id = cheque_reference_info.cheque_ref_id
											AND cheque_reference_info.ref_id  = invoice_info.invoice_id
											AND customer_info.customer_id = invoice_info.customer_id
											AND transaction_details.transaction_doc >= '".$startDate."'
											AND transaction_details.transaction_doc <= '".$endDate."'

											) as temp_one
											ORDER BY temp_one.customer_name
										");
			return $query;
		}
	}




















