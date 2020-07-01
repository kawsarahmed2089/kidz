<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>  <?php echo $this->tank_auth->get_hotel_name();?>  </title>
		<link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico"  type="image/x-icon"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/style_main.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/from_cash/table_style.css" type="text/css"/>
	</head>
	<body style="width: 790px;background: #ffffff;">
    <div class="mid_box_top">
		<p> Financial Statement  </p>
		<?php
			$seg_4= $this -> uri -> segment(3);
			if(!$seg_4)
			{
				
				echo form_open('report_controller/financial_statement_details_result_view');
					echo form_submit('submit', 'Details..', 'style="color:green;float:right;height:30px;margin:1px 2px 1px 0px"');
					echo form_hidden('start_date',$start_date);
					echo form_hidden('end_date',$end_date);
				echo form_close();
				
				echo form_open('report_controller/financial_report');
					echo form_submit('submit', 'Back', 'style="float:right;height:30px;margin:1px 2px 1px 0px"');
				echo form_close();

				echo anchor('report_controller/print_financial_report/'.$start_date.'/'.$end_date, img('images/print.png'),'class="mid_box_right_link" target="_blank" title="Print Financial Report"');
			}
			echo anchor('report_controller/print_financial_report/'.$start_date.'/'.$end_date, img(base_url().'assets/element_image/print.png'),'class="mid_box_right_link" target="_blank" title="Print Financial Report"');
		?>
	</div>
	
	<div class="form_field_seperator">
			<center>
				<div class ="financial__report">Financial Statement</div>
				
			
				<div class ="financial__report_2">
						Start Date : <?php echo date("d-m-Y", strtotime($start_date)).nbs(5); ?>
							End Date : <?php echo date("d-m-Y", strtotime($end_date)); ?>
				</div>
			</center>		
	</div>
	<?php
	if(!$seg_4)
	{
		$total_payable = 0;
		$total_receivable = 0;
		$temp_payable_1 =0; 
		$temp_payable_2 = 0;
		$temp_receivable_1 = 0;
		$temp_receivable_2 = 0;
		$expense_total_amount = 0;
		$purchase_total_amount = 0;
		$purchase_total_amount_for_transport = 0;
		$gift_total_amount = 0;
		//$total_withdrawal = 0;
		$total_investment = 0;
		$loan_payable = 0;
		$loan_receivable = 0;
		$cash_in_hand = 0;
		$salary_payable =0;
		$salary_receivable =0;
		//print_r($payable_receivable_financial_statement );
	}
	?>
	<div id = "mid_box_left" >
		<div class = "TitleBox">
			<p> Expense.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Total Expense.</div>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '; 
					$result = round($total_expense, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?>
			</div>		
	</div>	 <!--End of mid box left-->
	
	<div id = "mid_box_right" >
		<div class = "TitleBox">
			<p> Sale Summary.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Sale.</div>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round($total_sale, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?>
			</div>

			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Discount.</div>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '; 
					$result = round($total_discount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?>
			</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Total Service Charge.</div>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '; 
					//$provide_loan = $loan_receivable;
					$result = round($service_amount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?>
			</div>


			<div class = "Field_Container_Box" >
				<p style="text-indent:43px; margin-top:0px; font-size:12px;">Paid Amount.</p>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> '; 
					$result = round($paid_amount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?>
			</div>
	</div>	 <!--End of mid box left-->
	<!--cash in hand calculation-->
	<?php
		/* $total_in_amount = 0.00;
		$total_out_amount = 0.00;
		$temp_cash_in_hand_final_amount = 0.00;
		$temp_cash_in_bank_final_amount = 0.00;
		if($cash_status_report_info['total_in_out_cash_status'] -> num_rows() > 0 )
		{
			foreach($cash_status_report_info['total_in_out_cash_status'] -> result() as $field):	
				$total_in_amount = $field -> total_in;
				$total_out_amount = $field -> total_out;
			endforeach;						
									
			$total_in_amount = round($total_in_amount, 2);
			$total_out_amount = round($total_out_amount, 2);
			$temp_cash_in_hand_final_amount = round($total_in_amount - $total_out_amount, 2);
		}
	?>	

		

	<div id = "mid_box_left" >
		<div class = "TitleBox">
			<p>Investement.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Total Investment.</div>
					<?php 
						echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big>';
						$result = round($total_investment, 2);
						if($result == round($result, 0))
							$result = $result.'.00';
						else if(round($result, 1) == round($result, 2))
							$result = $result.'0';
						echo $result.'</div>'; 
					?> 
			</div>
	</div>	 <!--End of mid box left-->
	<?php */?>
	<div id = "mid_box_left" >
		<div class = "TitleBox">
			<p>Withdrawal.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller"> Total Withdrawal.</div>	
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big>';
					$result = round($total_withdrawal['transaction_amount'], 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?>
			</div>
	</div>	 <!--End of mid box rit-->
	 <!--End of mid box left-->	 <!--End of mid box rit-->
    <?php /* ?>
	<div id = "mid_box_left" >
		<div class = "TitleBox">
			<p>Purchase Summary.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Total Purchase.</div>
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round($purchase_total_amount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?> 
			</div>
				
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Transport Cost.</div>
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round($purchase_total_amount_for_transport, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?>  
			</div>
			<div class = "Field_Container_Box" >
				<p style="text-indent:43px; margin-top:0px; font-size:12px;">Total Amount.</p>
				<?php
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round(($purchase_total_amount + $purchase_total_amount_for_transport), 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>' ; */
				?><!--
			</div>
	</div>	--> <!--End of mid box rit-->
	
	<div id = "mid_box_left" >
		<div class = "TitleBox">
			<p>Cash Summary.</p>
		</div>
			<div class = "Field_Container_Box" >
				<div class = "purpose_controller">Cash In Hand.</div>
				<?php 
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$cash_in_hand = $Cash_in['transaction_amount'] - $Cash_out['transaction_amount'];
					$result = $Closing_cash['closing_cash'];//round($temp_cash_in_hand_final_amount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>' ;
				?> 
			</div>

			<div class = "Field_Container_Box" >
				<p style="text-indent:43px; margin-top:0px; font-size:12px;">Total Amount.</p>
				<?php	
					$tt_amount = $Closing_cash['closing_cash'];//$temp_cash_in_hand_final_amount + $temp_cash_in_bank_final_amount;	
					echo '<div class = "h8">'.nbs(6).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round($tt_amount, 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>' ;
				?>
			</div>
	</div>	 <!--End of mid box rit---------------------------------------------------------->
	
	<div id = "mid_box_left" style="width:98%;" >
		<div class = "TitleBox"  style = "width:100%; margin:0 0 0 4px;">
			<p>Brief Report.</p>
		</div>
	</div>
	
	<div id = "mid_box_left" >
		<div class = "Field_Container_Box" style="margin-top:2px;">
			<div class = "purpose_controller">Total Cash In.</div>
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big>';
					$result = round($Cash_in['transaction_amount'], 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?> 
		</div>		
		<div class = "Field_Container_Box" >		 
			<div class = "purpose_controller">Total Cash Out.</div>
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big>'; 
					$result = round($Cash_out['transaction_amount'], 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?> 
		</div>
		
			
	</div>	 <!--End of mid box left-->
	
	<div id = "mid_box_right" >
		<div class = "Field_Container_Box" style="margin-top:2px;" > 
			<div class = "purpose_controller"> Gross profit.</div>	
				<?php 
	 				echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					$result = round(($sale_price_info - $buy_price_info), 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?>
		</div>
		
		<div class = "Field_Container_Box" >		
			<div class = "purpose_controller"> Total Expense.</div>
				<?php 
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big> ';
					//$result = round(($expense_total_amount - $purchase_total_amount_for_transport), 2);
					$result = round(($total_expense), 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>';
				?>	
		</div>
				
		<div class = "Field_Container_Box" >		
			<div class = "purpose_controller"> Net profit.</div>	
				<?php 
				   // echo $sale_price_info .' dfgdssfs '. $buy_price_info;
				    $net_profit = round((($sale_price_info - $buy_price_info) - ( $total_expense) ),2);
					echo '<div class = "h8">'.nbs(10).'<big style = "font-size: 11px; font-weight:bold;"> &#2547; </big>';
					$result = round(($net_profit), 2);
					if($result == round($result, 0))
						$result = $result.'.00';
					else if(round($result, 1) == round($result, 2))
						$result = $result.'0';
					echo $result.'</div>'; 
				?>
	    </div>		
	</div>	 <!--End of mid box right-->
	</body>
</html>
