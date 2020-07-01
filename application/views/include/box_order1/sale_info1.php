<div class="container-fluid internal_title"><strong>Sale Information</strong></div>
	
      <div class="container-fluid internal_box2 internal_fistb">
		<div style="height: auto; overflow-y : scroll;">
			<div class="col-md-7 for_room_table" style="min-height:100px;height:auto;">
				<div class="row">
					<div class="col-md-12">
						   <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
								<thead style="cursor: Pointer;">
									<tr>
									  <th><button type="button" id="room_map_id_pos_term" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-map-marker"></i> Room Map</button></th>
									  
									  <th><button type="button" id="order_bill_id" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-check"></i> Order Bill</button></th>
									  <th><button type="button" id="open_sales_id" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-open"></i> Open Sales</button></th>
									  <th><button type="button" id="new_product_sale_id" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i> New Product</button></th>
									</tr>
								</thead>

						   </table>
					</div>
				</div>
			
			
			  <div class="row">
			  <input type="hidden" id="link_for_products_specific_order" value="<?php echo base_url();?>index.php/site_controller/show_products_on_specific_order"/>
				  <div class="col-md-12 for_room_table">
					   <table id="tabl_movable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<thead style="cursor: default;">
								<tr>
								  <th data-sort="int">No.</th>
								  <th data-sort="int">Product</th>
								  <th data-sort="string">Prep.</th>
								  <th data-sort="string">Prep. Comment</th>
								  <th data-sort="int">Qty</th>
								  <th data-sort="string">Guest No.</th>
								  <th data-sort="string">Total</th>
								</tr>
							</thead>
						<input type="hidden" name="order_selected" id="order_selected_vaue"/>
						<input type="hidden" id="current_order_show_link" value="<?php echo base_url();?>index.php/site_controller/current_order_show" />
						<input type="hidden" id="specific_product_show_link" value="<?php echo base_url();?>index.php/site_controller/specific_product_show" />
						<input type="hidden" id="order_produc_del_link" value="<?php echo base_url();?>index.php/site_controller/order_produc_del_link" />
						<input type="hidden" id="cancel_order_link_id" value="<?php echo base_url();?>index.php/site_controller/cancel_order_link" />
						<input type="hidden" id="product_show_codewise" value="<?php echo base_url();?>index.php/site_controller/product_show_codewise" />
						<input type="hidden" id="specific_product_search" value="<?php echo base_url();?>index.php/site_controller/specific_product_search" />
						<tbody id="order_details_dis_produc">
						<!-- Room Discription Table -->
						</tbody>

					   </table>
					   
				  </div>
			  </div>
				
				<div class="seperat3"></div>
			  	<div class="row">
				  <div class="col-md-12">
					   <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;">
							<thead style="cursor: default;">
								<tr>
								  
								  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								  <th><button type="button" id="order_remov_id" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-remove"></i></button></th>
								  <input type="hidden" id="order_details_edit_show_id" value="<?php echo base_url();?>index.php/site_controller/order_details_edit_show" />
								  <input type="hidden" id="temp_prep_option_show_edit_link" value="<?php echo base_url();?>index.php/site_controller/temp_prepar_option_show_on_edited" />
								  <th><button type="button" id="order_editting_id" class="btn btn-primary btn-lg"><i class="fa fa-pencil-square"></i></button></th>
								 
								  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								 
								</tr>
							</thead>
					   </table>
				  </div>
				</div>
					<div class="seperat3"></div>
					<div class="row border_top" style="height:auto;">
                    
                    <div class="col-md-4">
                    <div class="seperat10"></div>
                    <button type="button" id="close_order_sale_info" class="btn btn-danger btn-lg btn-block"><i class="glyphicon glyphicon-star-empty"></i>Close</button>
                                            <button type="button" id="send_order_to_kitchid" class="btn btn-success btn-lg btn-block">Send to Kitchen</button>
                    

                    </div>
                    
                    <div class="col-md-4">
                    <div class="seperat10"></div>
                    <button type="button" id="close_with_invoic" class="btn btn-primary btn-lg btn-block"></i>Close With Invoice</button>
                    <button type="button" id="generate_money_receipt" class="btn btn-default btn-lg btn-block"></i>Sale Proceed</button>

                    
                    
                    </div>
                    
                    <div class="col-md-4">
                    <div class="seperat10"></div>

                        <button type="button" id="cancel_order_id" class="btn btn-warning btn-lg btn-block"></i>Cancel Order</button>
                       <button type="button" id="cancel_order_reason" class="btn btn-info btn-lg btn-block"></i>Cancel Reason</button>
                    
                    </div>
                    
                    <input type="hidden" id="value_href_send_order_to_kitchen" value="<?php echo base_url();?>index.php/report_controller/send_order_to_kitchen/">
                    <input type="hidden" id="value_href_money_receipt" value="<?php echo base_url();?>index.php/report_controller/generate_money_receipt/">
                    <input type="hidden" id="value_href_invoice" value="<?php echo base_url();?>index.php/report_controller/generate_invoice/">
                    
                    

<!--						<div class="col-md-12">
                        
                        
                        

							<th style="margin: 5px;"><button  style="margin: 5px; height: 70px;" type="button" id="close_order_sale_info" class="btn"><i class="glyphicon glyphicon-star-empty"></i>Close</button></th>
							<th style="margin: 5px;"><button  style="margin: 5px; height: 70px;" type="button" id="cancel_order_id" class="btn"></i>Cancel Order</button></th>
								  <th style="margin: 5px;"><button  style="margin: 5px; height: 70px;"type="button" id="cancel_order_reason" class="btn"></i>Cancel Reason</button></th>
								  <th style="margin: 5px;"><button  style="margin: 5px; height: 70px;"type="button" id="close_with_invoic" class="btn"></i>Close With Invoice</button></th>
								  <input type="hidden" id="value_href_invoice" value="<?php //echo base_url();?>index.php/report_controller/generate_invoice/">
								  <input type="hidden" id="value_href_money_receipt" value="<?php //echo base_url();?>index.php/report_controller/generate_money_receipt/">
								  <input type="hidden" id="value_href_send_order_to_kitchen" value="<?php //echo base_url();?>index.php/report_controller/send_order_to_kitchen/">
							<th style="margin: 5px;"><button  style="margin: 5px; height: 70px;"type="button" id="generate_money_receipt" class="btn"></i>Generate Receipt</button></th>
							<th style="margin: 5px;"><button style="margin: 5px; height: 70px;" type="button" id="send_order_to_kitchid" class="btn">Send to Kichen</button></th>

						</div>-->
					</div>
					       <div class="col-md-7 text-center" style="overflow:hidden;font-size:13px; line-height:30px;">
							   <div class="seperat5"></div>
							   <span id="msg_actio_order_prod"></span>
						   </div>
					<div class="seperat3"></div>
			  	
		
			
			</div>
			<div class="col-md-5">
				<div class="row">
					
					<div class="col-md-12">
					   <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;margin-top:5px;">
							<thead style="cursor: default;" id="curorder_info_show">
								
							</thead>
					   </table>
					   <!--<h3>Categories:</h3>-->
					</div>
					<?php /* ?>
				  	<div class="col-md-12">
					   <table class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;outline: 1px solid blue;display: inline-table;">
						
						<tbody id="catag_dis_on_sale_info">
							
							<!--<tr><td>Kabab</td></tr><tr><td>Kabab</td></tr><tr><td>Kabab</td></tr><tr><td>Kabab</td></tr>-->
						<!-- Room Discription Table -->
						</tbody>

					   </table>
					</div>
					<?php */ ?>
					<div class="col-md-12">
						<h3>Products:
							<!--<input type="text" name="product_code" id="product_code_onpro_dis" placeholder="Product Code"/>-->
							<input type="text" name="product_code" id="product_code_onpro_dis" placeholder="Product Search"/>
							<!--<button type="submit" class="btn btn-info btn-lg" id="submit_product_code">Submit</button>-->
						</h3>
						<div id="my_table_room">
						<div class="col-md-12 for_room_table" style="height: 520px;">
						   <table  id="roomTable" class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;outline: 1px solid blue;display: inline-table; margin-bottom:50px;">
							
							<thead id="header_for_product" style="cursor: default;">
									<tr>
									  <th data-sort="int">No.</th>
									  <th data-sort="int">Name</th>
									  <th data-sort="string">Category</th>
									  <th data-sort="int">Sale Price</th>
									  <!--<th data-sort="string">Cost Price</th> -->
									  <th data-sort="string">S.Kitchen</th>
									  <th data-sort="string">S.Amount</th>
									</tr>
							</thead>
							<tbody id="produc_dis_on_sale_info">
								
								
								<!--<tr><td>Kabab</td></tr><tr><td>Kabab</td></tr><tr><td>Kabab</td></tr><tr><td>Kabab</td></tr>-->
							<!-- Room Discription Table -->
							</tbody>

						   </table>
					   </div>
					   </div>
					</div>
			  </div>
			
			
			</div>
				 <div class="seperat3"></div>
				 <div class="row border_bottom border_top">
					 <div class="seperat3"></div>
					 <div class="col-md-12 text-right">
						 <div class="btn-group">
							<button type="button" id="sale_info1_close" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button><br />
						 </div>
						<div class="seperat3"></div>
					 </div>
				 </div>
		</div>
      </div>