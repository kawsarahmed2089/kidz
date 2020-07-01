	<div class="container-fluid internal_title"><strong>POS Terminal</strong></div>      
      <div class="container-fluid internal_box2 internal_fistb">
      <!--
	  <div class="row">
      <div class="col-md-12">
      <div class="seperat10"></div>
        <div class="input-group input-group-sm max_width550">
      <input type="search" class="form-control">
       <span class="input-group-btn">
        <button title="Clear" class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
        <button class="btn btn-default" type="button"><i class="fa fa-search"></i> Find</button>
       </span>
        </div>
        <div class="seperat10"></div>
      </div>
      </div> -->
      <div class="seperat10"></div>
      <div class="row">
      <div class="col-md-12 for_room_table" style="height: 380px;">
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.js"></script>
		<style>
			/** Start: to style navigation tab **/
			.nav {
			  margin-bottom: 18px;
			  margin-left: 0;
			  list-style: none;
			}

			.nav > li > a {
			  display: block;
			}
			
			.nav-tabs{
			  *zoom: 1;
			}

			.nav-tabs:before,
			.nav-tabs:after {
			  display: table;
			  content: "";
			}

			.nav-tabs:after {
			  clear: both;
			}

			.nav-tabs > li {
			  float: left;
			}

			.nav-tabs > li > a {
			  padding-right: 12px;
			  padding-left: 12px;
			  margin-right: 2px;
			  line-height: 14px;
			}

			.nav-tabs {
			  border-bottom: 1px solid #ddd;
			}

			.nav-tabs > li {
			  margin-bottom: -1px;
			}

			.nav-tabs > li > a {
			  padding-top: 8px;
			  padding-bottom: 8px;
			  line-height: 18px;
			  border: 1px solid transparent;
			  -webkit-border-radius: 4px 4px 0 0;
				 -moz-border-radius: 4px 4px 0 0;
					  border-radius: 4px 4px 0 0;
			}

			.nav-tabs > li > a:hover {
			  border-color: #eeeeee #eeeeee #dddddd;
			}

			.nav-tabs > .active > a,
			.nav-tabs > .active > a:hover {
			  color: #555555;
			  cursor: default;
			  background-color: #ffffff;
			  border: 1px solid #ddd;
			  border-bottom-color: transparent;
			}
			
			li {
			  line-height: 18px;
			}
			
			.tab-content.active{
				display: block;
			}
			
			.tab-content.hide{
				display: none;
			}
			
			
			/** End: to style navigation tab **/
		</style>
		<div>
			<ul class="nav nav-tabs" id="table_info_li">

			</ul>	
		</div>
		
			<div id="myTabContent" class="tab-content">

			</div>
		</table>

        <input type="hidden" id="del_extra_servic_type_key" name="del_key" />
        <input type="hidden" id="del_extra_servic_type_link" value="<?php echo base_url();?>index.php/site_controller/type_extra_service_del" />
        <input type="hidden" id="show_extra_servic_type_link" value="<?php echo base_url();?>index.php/site_controller/type_extra_service_show" />
        <input type="hidden" id="show_extra_servic_type_edilink" value="<?php echo base_url();?>index.php/site_controller/type_extra_servic_edi_show" />
		<input type="hidden" id="specific_table_info_link" value="<?php echo base_url();?>index.php/site_controller/specific_table_order_info_show" />
		<input type="hidden" id="order_info_active_change_link" value="<?php echo base_url();?>index.php/site_controller/order_info_active_change" />
      </div>
      </div>
      <div class="seperat3"></div>

         <div class="seperat3"></div>
         <div class="row border_bottom border_top">
			 <div class="seperat3"></div>
			 <div class="col-md-9" id="typ_exservice" style="overflow:hidden;font-size:13px; line-height:30px;">
				<button type="button" id="open_sales_idpos" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-open"></i> Open Sales </button>
			 </div>
			 <div class="col-md-3 text-right">
			 <div class="btn-group">
			 <button type="button" id="close_pos_terminal" class="btn btn-danger btn-lg"><i class="fa fa-times"></i> Close</button>
			 </div>
			  <div class="seperat3"></div>
			 </div>
         </div>
         
       </div>



