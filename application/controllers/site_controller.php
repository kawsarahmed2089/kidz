<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Site_controller extends CI_controller{
		public function __construct()
		{
	        parent::__construct();
			$this->load->library('tank_auth');
			$this->output->set_header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->is_logged_in();
			$this -> load -> model('site_model');
			$this -> load -> model('dbm_model');
			$this -> load -> model('access_control_model');
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
		// controlling home page
		function main_site(){
			$timezone = "Asia/Dhaka";
			date_default_timezone_set($timezone);
			$data['bd_date'] = date ('Y-m-d');
			$data['previous_date'] = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 30, date("y")));

			$data['user_type'] = $this -> tank_auth -> get_usertype();
			$data['user_name'] = $this -> tank_auth -> get_username();	
			$this -> load -> view('include/home', $data);
		}

/* ######################################################*/
/*              New For H Lounge Project                 */
/* ######################################################*/



function product_category_save(){

    if($this->input->post()){
        $categoryName = $this->input->post('categoryName');
		$catDescription = $this->input->post('catDescription');
		$back_color = $this->input->post('back_color');
		$font_color = $this->input->post('font_color');
		$resource_category = $this->input->post('resource_category');
        
        $this->load->model('product_category_setup');
        $product_category_setup = new Product_Category_Setup();
        $product_category_setup->category_name=$categoryName;
		$product_category_setup->category_discr=$catDescription;
		$product_category_setup->back_color=$back_color;
		$product_category_setup->font_color=$font_color;
		$product_category_setup->resource_category=$resource_category;
		$product_category_setup->creator=$this->tank_auth->get_user_id();
        $product_category_setup->save();
        
        echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
    }else{
        echo 'Error 404';
    }
	}

	function product_catagory_show(){
            $json_response = array();
            $this->load->model('product_category_setup');
            $product_categories = $this->product_category_setup->get();
           // $resultarry=array();
            foreach ($product_categories as $row) {
                $row_array['category_name']=$row->category_name;
                $row_array['category_id']=$row->category_id;
				$row_array['back_color']=$row->back_color;
				$row_array['font_color']=$row->font_color;
				$row_array['resource_category']=$row->resource_category;
				$row_array['category_discr']=$row->category_discr;
                array_push($json_response,$row_array);
                
                //echo '<option value="'.$valueres->category_id.'">'.$valueres->category_name.'</option>';
                
            }
            echo json_encode($json_response); 
	}
   
	function product_save(){

		if($this->input->post()){
			$category_id = $this->input->post('category_id');
			$proName = $this->input->post('proName');
			$proCode = $this->input->post('proCode');
			$cosPrice = $this->input->post('cosPrice');
			$sale_price = $this->input->post('sale_price');
			$stock_amount = $this->input->post('stock_amount');
			$unit_name = $this->input->post('unit_name');
			$service_type_id = $this->input->post('service_id');
			$checkKitchen = $this->input->post('checkKitchen');
			$pack_definition = $this->input->post('pack_definition');
			if($checkKitchen==true){$checkk='YES';}else{$checkk='NO';}
			
				$dataa = array('service_name'=>$proName,'service_typ_id'=>$service_type_id,'service_rate'=>$sale_price);
				$this->db->insert('services',$dataa);
				$service_insert_id = $this->db->insert_id();
			$this->load->model('product_setup');
			$product_setup = new Product_Setup();
			$product_setup->category=$category_id;
			$product_setup->product_name=$proName;
			$product_setup->product_code=$proCode;
			$product_setup->cost_price=$cosPrice;
			$product_setup->sale_price=$sale_price;
			$product_setup->package_definition=$pack_definition;
			$product_setup->stock_amount=$stock_amount;
			$product_setup->unit_name=$unit_name;
			$product_setup->show_in_kitchen=$checkk;
			$product_setup->service_insert_id=$service_insert_id;
			$product_setup->creator=$this->tank_auth->get_user_id();
			$product_setup->save();
			//print_r($product_setup);
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
		}
		
  function service_type_show(){
            $json_response = array();
            $this->db->from('service_typ');
			$service_typ = $this->db->get();
            foreach ($service_typ->result() as $row){
                $row_array['service_typ_id'] = $row->service_typ_id;
                $row_array['service_typ_name'] = $row->service_typ_name;
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
   
  function product_show(){
            $json_response = array();
            $this->load->model('product_setup');
			$this->load->model('dbm_model');
            $product_setups = $this->product_setup->get();
            foreach ($product_setups as $row){
                
                $row_array['product_id'] = $row->product_id;
                $row_array['product_name'] = $row->product_name;
				$row_array['product_code'] = $row->product_code;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['cost_price'] = $row->cost_price;
				$row_array['stock_amount'] = $row->stock_amount;
				$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['unitName'] = $this->dbm_model->other_show('unitName','product_unit_name','unit_name_id',$row->unit_name);
				$row_array['creator'] = $row->creator;
				$row_array['show_in_kitchen'] = $row->show_in_kitchen;
				$row_array['service_insert_id'] = $row->service_insert_id;
				$row_array['package_definition'] = $row->package_definition;
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
         
   }
   
	function product_delete(){
        if($this->input->post()){
    $del_key=$this->input->post('del_key');
    if($del_key!="")
	
	$this->db->from('services,product_info');
	$this->db->where('product_info.product_id',$del_key);
	$this->db->where('product_info.service_insert_id = services.service_id');
	$sqerv = $this->db->get();
	$sqerv = $sqerv->row_array();
	$this->db->where('service_id',$sqerv['service_id']);
	$this->db->delete('services');
	
    $this->load->model('product_setup');
    $product_setup = new Product_Setup();
    $product_setup->load($del_key);
    $product_setup->delete();
        
        echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted</span>'));
    }else{
        echo 'Error 404';
    }

	}
  function product_edit_show(){
    if($this->input->post()){
        $edi_key=$this->input->post('edi_key');
        $data = array();
        if($edi_key!="")
        $this->load->model('product_setup');
        $product_setup = new Product_Setup();
        $product_setup->load($edi_key);
        $data['product_setup'] = $product_setup;
		/* foreach($product_setup->result() as $row){
		$product_setup['unit_name'] = $this->dbm_model->exception_show('service','product_unit_name','unit_name_id',$row->unit_name);
		} */
		$product_setup->service_type = $this->dbm_model->exception_show('service_typ_id','services','service_id',$product_setup->service_insert_id);
        echo json_encode($product_setup);
  }else{
    echo 'Error 404';
  }
      
}

 function product_edite(){
       if($this->input->post()){
        $category_id=$this->input->post('category_id');
        $proName=$this->input->post('proName');
		$proCode=$this->input->post('proCode');
        $cosPrice=$this->input->post('cosPrice');
		$sale_price=$this->input->post('sale_price');
		$checkKitchen=$this->input->post('checkKitchen');
		$service_type_id = $this->input->post('service_id');
		$stock_amount=$this->input->post('stock_amount');
		$unit_name=$this->input->post('unit_name');
        $prod_edi_key = $this->input->post('prod_edi_key');
		$service_edi_key = $this->input->post('service_edi_key');
        if($checkKitchen==true){$checkk='YES';}
		else{$checkk="NO";}
		
		$dataa = array('service_name'=>$proName,'service_typ_id'=>$service_type_id,'service_rate'=>$sale_price);
				$this->db->where('service_id',$service_edi_key);
				$this->db->update('services',$dataa);
		
		
       $data = array(
               'category' => $category_id,
               'product_name' => $proName,
			   'product_code' => $proCode,
			   'sale_price' => $sale_price,
			   'stock_amount' => $stock_amount,
			   'unit_name' => $unit_name,
			   'show_in_kitchen' => $checkk,
               'cost_price' => $cosPrice
            );
      if($prod_edi_key!=""){
      $this->db->where('product_id', $prod_edi_key);
      $this->db->update('product_info', $data);
	  }
      echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
   }else{
    echo 'Error 404';
  }
      
}
    
  function catagory_edit_show(){
    if($this->input->post()){
        $edi_key=$this->input->post('edi_key');
        $data = array();
        if($edi_key!="")
        $this->load->model('product_category_setup');
        $product_category_setup = new Product_Category_Setup();
        $product_category_setup->load($edi_key);
        $data['product_category_setup'] = $product_category_setup;
        echo json_encode($product_category_setup);
  }else{
    echo 'Error 404';
  }
      
}

 function product_category_edite(){
      if($this->input->post()){
        $category_id=$this->input->post('category_id');
        $proName=$this->input->post('proName');
        $cosPrice=$this->input->post('cosPrice');
		$sale_price=$this->input->post('sale_price');
		$checkKitchen=$this->input->post('checkKitchen');
		$stock_amount=$this->input->post('stock_amount');
        $cat_edi_key=$this->input->post('cat_edi_key');
		$resource_category=$this->input->post('resource_category');

       $data = array(
               'category_name' => $this->input->post('categoryName'),
			   'back_color' => $this->input->post('back_color'),
			   'font_color' => $this->input->post('font_color'),
			   'category_discr' => $this->input->post('catDescription'),
			   'resource_category' => $this->input->post('resource_category')
            );
      if($cat_edi_key!="")
      $this->db->where('category_id', $cat_edi_key);
      $this->db->update('product_category', $data);
      echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));

  }else{
    echo 'Error 404';
  }
      
}
	function specific_product_show(){
	
		$json_response = array();
	 
			$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$product_info = $this->dbm_model->other_all_show('product_info','category',$show_key);

            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
                $row_array['product_name'] = $row->product_name;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['cost_price'] = $row->cost_price;
				$row_array['stock_amount'] = $row->stock_amount;
				$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['unitName'] = $this->dbm_model->other_show('unitName','product_unit_name','unit_name_id',$row->unit_name);
				$row_array['creator'] = $row->creator;
				$row_array['show_in_kitchen'] = $row->show_in_kitchen;
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
		  
	}
	function product_show_codewise(){
	
		$json_response = array();
	 
			$show_key=$this->input->post('product_code');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$product_info = $this->dbm_model->other_all_show('product_info','product_code',$show_key);

            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
                $row_array['product_name'] = $row->product_name;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['cost_price'] = $row->cost_price;
				$row_array['stock_amount'] = $row->stock_amount;
				$row_array['product_code'] = $row->product_code;
				$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['unitName'] = $this->dbm_model->other_show('unitName','product_unit_name','unit_name_id',$row->unit_name);
				$row_array['creator'] = $row->creator;
				$row_array['show_in_kitchen'] = $row->show_in_kitchen;
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
		  
	}
	
	function specific_product_search(){
	
		$json_response = array();
	 
			$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$product_info = $this->db->query('select * from `product_info` where `product_name` like "%'.$show_key.'%" ');

            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
                $row_array['product_name'] = $row->product_name;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['cost_price'] = $row->cost_price;
				$row_array['stock_amount'] = $row->stock_amount;
				$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['unitName'] = $this->dbm_model->other_show('unitName','product_unit_name','unit_name_id',$row->unit_name);
				$row_array['creator'] = $row->creator;
				$row_array['show_in_kitchen'] = $row->show_in_kitchen;
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
		  
	}
	
	function catagory_delete(){
		if($this->input->post()){
		$del_key=$this->input->post('del_key');
		if($del_key!="")
		$this->load->model('product_category_setup');
		$product_category_setup = new Product_Category_Setup();
		$product_category_setup->load($del_key);
		$product_category_setup->delete();
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function table_save(){
		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$tavleName = $this->input->post('tavleName');
			$tavlenumber = $this->input->post('tavlenumber');
			$capacity = $this->input->post('capacity');
			$back_color = $this->input->post('back_color');
			$font_color = $this->input->post('font_color');
			$border_color = $this->input->post('border_color');
			$border_width = $this->input->post('border_width');
			$border_radius = $this->input->post('border_radius');
			$checkKitchen = $this->input->post('checkKitchen');
			if($checkKitchen==true){$checkk='YES';}else{$checkk='NO';}
			
			$this->load->model('table_setup');
			$table_setup = new Table_Setup();
			$table_setup->table_name=$tavleName;
			$table_setup->table_number=$tavlenumber;
			$table_setup->capacity=$capacity;
			$table_setup->back_color=$back_color;
			$table_setup->font_color=$font_color;
			$table_setup->border_color=$border_color;
			$table_setup->border_width=$border_width;
			$table_setup->border_radius=$border_radius;
			
			$table_setup->xaxis_one="150px";
			$table_setup->yaxis_one="30px";
			$table_setup->xaxis_two="130px";
			$table_setup->yaxis_two="110px";
			
			$table_setup->active=$checkk;
			$table_setup->status='Available';
			$table_setup->doc=$bd_date;
			$table_setup->dom=$bd_date;
			$table_setup->creator=$this->tank_auth->get_user_id();
			$table_setup->save();
			
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function tavle_show(){
            $json_response = array();
            //$this->load->model('table_setup');
			//$table_setups = $this->table_setup->get(0,0,'table_number');
			$this->db->order_by('table_number','asc');
			//$this->db->order_by('table_id','asc');
			$query = $this->db->get('table_info');
            $table_setups = $query->result();

            foreach ($table_setups as $row){
                
                $row_array['table_id'] = $row->table_id;
                $row_array['table_name'] = $row->table_name;
                $row_array['table_number'] = $row->table_number;
				$row_array['capacity'] = $row->capacity;
				$row_array['status'] = $row->status;
				$row_array['creator'] = $row->creator;
				$row_array['active'] = $row->active;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['xaxis_one'] = $row->xaxis_one;
				$row_array['yaxis_one'] = $row->yaxis_one;
				$row_array['xaxis_two'] = $row->xaxis_two;
				$row_array['yaxis_two'] = $row->yaxis_two;
				$row_array['back_color'] = $row->back_color;
				$row_array['font_color'] = $row->font_color;
				$row_array['border_color'] = $row->border_color;
				$row_array['border_width'] = $row->border_width;
				$row_array['border_radius'] = $row->border_radius;
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
         
   }
   
    function tavle_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('table_setup');
			$table_setup = new Table_Setup();
			$table_setup->load($edi_key);
			$data['table_setup'] = $table_setup;
			echo json_encode($table_setup);
	  }else{
		echo 'Error 404';
	  }
      
	}
 function table_edit(){
      if($this->input->post()){
        $table_id=$this->input->post('edi_key');
		$check = '';
		$activ = $this->input->post('active');
		if($activ=='on'){$check='YES';}else $check='NO';
       $data = array(
               'table_name' => $this->input->post('tavleName'),
			   'table_number' => $this->input->post('tavlenumber'),
			   'capacity' => $this->input->post('capacity'),
			   'back_color' => $this->input->post('back_color'),
			   'font_color' => $this->input->post('font_color'),
			   'border_color' => $this->input->post('border_color'),
			   'border_width' => $this->input->post('border_width'),
			   'border_radius' => $this->input->post('border_radius'),
			   'active' => $check
            );
      if($table_id!=""){
      $this->db->where('table_id', $table_id);
      $this->db->update('table_info', $data);

      echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
		}
	  }else{
		echo 'Error 404';
	  }
      
	}
   
	function tavle_delete(){
		if($this->input->post()){
		$del_key=$this->input->post('del_key');
		if($del_key!="")
		$this->load->model('table_setup');
		$table_setup = new Table_Setup();
		$table_setup->load($del_key);
		$table_setup->delete();
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function tavle_splitting(){
		$bd_date = date('Y-m-d');
		$this->load->model('table_setup');
		if($this->input->post()){
			$table_id = $this->input->post('table_id');
			$table_part = $this->input->post('table_part');
			$capacity = 6;
			$checkk = 'YES';
			
			$this->db->from('table_info');
			$this->db->where('table_info.table_id = "'.$table_id.'"');
			$query = $this->db->get();
			$row = $query -> row_array();
			
			for($i=0;$i<$table_part;$i++){
				$k=0;
				for($j='A'; $j < 'Z'; $j++){
					if($k == $i){ break;}
					$k++;
				}
			
			$table_setup = new Table_Setup();
			$table_setup->table_name=$row['table_name'].' '.$j;
			$table_setup->table_number=$row['table_number'].' '.$j;
			$table_setup->capacity=$capacity;
			$table_setup->active=$checkk;
			$table_setup->status='Available';
			$table_setup->back_color="#408080";
			$table_setup->font_color="#c0c0c0";
			$table_setup->border_color="#800080";
			$table_setup->border_width=3;
			$table_setup->border_radius=6;
			$table_setup->xaxis_one="150px";
			$table_setup->yaxis_one="30px";
			$table_setup->xaxis_two="130px";
			$table_setup->yaxis_two="110px";
			$table_setup->doc=$bd_date;
			$table_setup->dom=$bd_date;
			$table_setup->creator=$this->tank_auth->get_user_id();
			$table_setup->save();
			}
			$table_data = array('active'=>'NO'); 
			$this->db->where('table_id',$table_id);
			$this->db->update('table_info',$table_data);
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function tavle_joining(){
		$bd_date = date('Y-m-d');
		$this->load->model('table_setup');
		
		$tabl_name = "";
		$tabl_number = "";
		
		if($this->input->post()){
			$table_id = $this->input->post('table_id');
			//$table_part = $this->input->post('table_part');
			$capacity = 10;
			$checkk = 'YES';
			$k=0;
			foreach($table_id as $tabl_id){
			
			$this->db->from('table_info');
			$this->db->where('table_info.table_id = "'.$tabl_id.'"');
			$query = $this->db->get();
			$row = $query -> row_array();
			if($k==0){
				$tabl_name = $row['table_name'];
				$tabl_number = $row['table_number'];
			}
			else{ $tabl_name = $tabl_name.' + '.$row['table_name'];
				$tabl_number = $tabl_number.' + '.$row['table_number'];
			}
			$k++;
				$table_data = array('active'=>'NO'); 
				$this->db->where('table_id',$tabl_id);
				$this->db->update('table_info',$table_data);
			
			}
			$table_setup = new Table_Setup();
			$table_setup->table_name=$tabl_name;
			$table_setup->table_number=$tabl_number;
			$table_setup->capacity=$capacity;
			$table_setup->active=$checkk;
			$table_setup->status='Available';
			$table_setup->back_color="#408080";
			$table_setup->font_color="#c0c0c0";
			$table_setup->border_color="#800080";
			$table_setup->border_width=3;
			$table_setup->border_radius=6;
			
			$table_setup->xaxis_one="150px";
			$table_setup->yaxis_one="30px";
			$table_setup->xaxis_two="130px";
			$table_setup->yaxis_two="110px";
			
			$table_setup->doc=$bd_date;
			$table_setup->dom=$bd_date;
			$table_setup->creator=$this->tank_auth->get_user_id();
			$table_setup->save();
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}

	
	function order_save(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		
		if($this->input->post()){
			$table_id = $this->input->post('table_id');
			$clisdfentName = '';$this->input->post('clisdfentName');
			$servie_token = 0;//$this->input->post('servie_token');
			$contact_number = '';//$this->input->post('contact_number');
			$guest_quantity = 1;//$this->input->post('guest_quantity');
			$waiter = 0;//$this->input->post('waiter');
			$order_type = 0;//$this->input->post('order_type');
			$comments = '';//$this->input->post('comments');
			$room_number = 0;//$this->input->post('room_number');
			$order_place = 0;//$this->input->post('order_place');
			
			$data = array(
               'status' => 'inactive'
            );
			
			  $this->db->where('status', 'active');
			  //$this->db->where('creator', $creator);
			  $this->db->update('order_info', $data);
			
			$this->load->model('order_setup');
			$order_setup = new Order_Setup();
			$order_setup->table_id=$table_id;
			$order_setup->client_name=$clisdfentName;
			$order_setup->client_id=$servie_token;
			$order_setup->contact_number=$contact_number;
			$order_setup->guest_quantity=$guest_quantity;
			$order_setup->total_amount=0;
			$order_setup->discount_amount=0;
			$order_setup->service_charge=0;
			$order_setup->paid_amount=0;
			$order_setup->waiter=$waiter;
			$order_setup->comments=$comments;
			$order_setup->doc=$bd_date;
			$order_setup->dom=$bd_date;
			$order_setup->status='active';
			$order_setup->order_type=$order_type;
			$order_setup->order_place=$order_place;
			$order_setup->room_number=$room_number;
			$order_setup->running='running';
			$order_setup->creator=$this->tank_auth->get_user_id();
			$insert_id = $order_setup->save();
			
			if($order_type == 2){
				$entertainment_user = $this->input->post('enter_honor');
				$enter_data = array('order_info_id'=>$insert_id,'entertainment_user'=>$entertainment_user,'creator'=>$creator);
				$this->db->insert('entertainment_order_info',$enter_data);
			}
			else if($order_type == 3){
				$stuff_honor = $this->input->post('stuff_honor');
				$enter_data2 = array('order_info_id'=>$insert_id,'stuff_info_id'=>$stuff_honor,'creator'=>$creator);
				$this->db->insert('stuff_order_info',$enter_data2);
			}
						$data2 = array('order_id'=>$insert_id);
					$query2= $this->db->insert('order_reference_table',$data2);
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function order_info_active_change(){
		$creator = $this->tank_auth->get_user_id();
		if($this->input->post()){
		$change_key=$this->input->post('change_key');
		$edit=$this->input->post('edit');
		//if($change_key!="")
		$data = array(
               'status' => 'inactive'
            );
			if($edit!=''){
				$data2 = array(
					'status' => 'active','running'=>'edit','creator'=>$this->tank_auth->get_user_id()
				);
			}else{
				$data2 = array(
					'status' => 'active'
				);
			}
			
			  $this->db->where('status', 'active');
			  //$this->db->where('creator', $creator);
			  $this->db->update('order_info', $data);
			  
			  $this->db->where('order_id', $change_key);
			  $this->db->update('order_info', $data2);
			  echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
			}
			else{
			echo 'Error 404';
		}
	}
	function current_order_show(){
	
		$json_response = array();
		$creator=$this->tank_auth->get_user_id();
			//$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			//$order_info = $this->dbm_model->other_all_show('order_info','status','active','creator',$creator);
			$order_info = $this->dbm_model->other_all_show('order_info','status','active');

            foreach ($order_info->result() as $row) {
                $row_array['order_id'] = $row->order_id;
                $row_array['client_id'] = $row->client_id;
				$row_array['client_name'] = $row->client_name;
                $row_array['table_id'] = $row->table_id;
				$row_array['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$row->table_id);
				$row_array['guest_quantity'] = $row->guest_quantity;
				$row_array['comments'] = $row->comments;
				$row_array['status'] = $row->status;
				$row_array['contact_number'] = $row->contact_number;
				$row_array['room_number'] = $row->room_number;
				$row_array['order_type'] = $row->order_type;
				$row_array['order_place'] = $row->order_place;
				$row_array['running'] = $row->running;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				$row_array['waiter'] =  $this->dbm_model->exception_show('stuff_name','stuff_info','stuff_id',$row->waiter);
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	
	function specific_order_info_show(){
	
		$row_array = array();
		$creator=$this->tank_auth->get_user_id();
			$order_id=$this->input->post('order_id');
			//if($show_key!="")
			$this->load->model('dbm_model');
			//$order_info = $this->dbm_model->other_all_show('order_info','status','active','creator',$creator);
			$order_info = $this->dbm_model->other_all_show('order_info','order_id',$order_id);
			if($order_info->num_rows()>0){
				$row = $order_info->row();
				//foreach($order_info->result() as $row) {
					$row_array['order_id'] = $row->order_id;
					$row_array['client_id'] = $row->client_id;
					$row_array['client_name'] = $row->client_name;
					$row_array['table_id'] = $row->table_id;
					$row_array['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$row->table_id);
					$row_array['guest_quantity'] = $row->guest_quantity;
					$row_array['comments'] = $row->comments;
					$row_array['status'] = $row->status;
					$row_array['contact_number'] = $row->contact_number;
					$row_array['room_number'] = $row->room_number;
					$row_array['order_type'] = $row->order_type;
					$row_array['order_place'] = $row->order_place;
					$row_array['running'] = $row->running;
					$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
					$row_array['waiter'] =  $this->dbm_model->exception_show('username','users','id',$row->waiter);
					$row_array['doc'] = $row->doc;
					$row_array['dom'] = $row->dom;
					//print_r($row_array);
					//array_push($json_response,$row_array);
				//}
			}
           echo json_encode($row_array);
	}
	
	function specific_order_info_for_update(){
		$row_array = array();
		$creator=$this->tank_auth->get_user_id();
			$order_id = $this->input->post('order_id');
			//if($show_key!="")
			$this->load->model('dbm_model');
			//$order_info = $this->dbm_model->other_all_show('order_info','status','active','creator',$creator);
			$order_info = $this->dbm_model->specific_order_info_for_update($order_id);
			if($order_info->num_rows()>0){
				$row = $order_info->row();
				//foreach($order_info->result() as $row) {
					$row_array['order_id'] = $row->order_id;
					$row_array['client_id'] = $row->client_id;
					$row_array['client_name'] = $row->client_name;
					$row_array['table_id'] = $row->table_id;
					$row_array['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$row->table_id);
					$row_array['guest_quantity'] = $row->guest_quantity;
					$row_array['comments'] = $row->comments;
					$row_array['status'] = $row->status;
					$row_array['contact_number'] = $row->contact_number;
					$row_array['room_number'] = $row->room_number;
					$row_array['order_type'] = $row->order_type;
					if($row->order_type == 2){
						$row_array['entertainment_user'] = $row->entertainment_user;
					}
					else if($row->order_type == 3){
						$row_array['stuff_info_id'] = $row->stuff_info_id;
					}
					$row_array['order_place'] = $row->order_place;
					$row_array['running'] = $row->running;
					$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
					$row_array['waiter_id'] = $row->waiter;
					$row_array['waiter'] =  $this->dbm_model->exception_show('stuff_name','stuff_info','stuff_id',$row->waiter);
					$row_array['doc'] = $row->doc;
					$row_array['dom'] = $row->dom;
					//print_r($row_array);
					//array_push($json_response,$row_array);
				//}
			}
           echo json_encode($row_array);
	}
	
	
	function order_info_update(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		
		if($this->input->post()){
			$new_order_id = $this->input->post('new_order_id');
			$table_id = $this->input->post('table_id');
			$clisdfentName = $this->input->post('clisdfentName');
			$servie_token = $this->input->post('servie_token');
			$contact_number = $this->input->post('contact_number');
			$guest_quantity = $this->input->post('guest_quantity');
			$waiter = $this->input->post('waiter');
			$order_type = $this->input->post('order_type');
			$comments = $this->input->post('comments');
			$room_number = $this->input->post('room_number');
			$order_place = $this->input->post('order_place');
			
			
			/*
				$data = array(
					'status' => 'inactive'
				);
				$this->db->where('status', 'active');
				$this->db->update('order_info', $data);
			*/
			
			$this->db->select('*');
			$this->db->from('order_info');
			$this->db->where('order_info.order_id',$new_order_id);
			$quer = $this->db->get();
			$row = $quer->row_array();
			
			    $up_data = array(
						'table_id' => $table_id,
						'client_id' => $servie_token,
						'client_name' => $clisdfentName,
						'contact_number' => $contact_number,
						'guest_quantity' => $guest_quantity,
						'waiter' => $waiter,
						'comments' => $comments,
						'order_type' => $order_type,
						'order_place' => $order_place,
						'room_number' => $room_number,
						'dom' => $bd_date
						);

				if($new_order_id!=""){
					$this->db->where('order_id', $new_order_id);
					$this->db->update('order_info', $up_data);
				}
			
			
			if($order_type == 2){
				
				if($row['order_type'] == 2){
				$entertainment_user = $this->input->post('enter_honor');
				$enter_data = array('entertainment_user'=>$entertainment_user);
				
				$this->db->where('order_info_id', $new_order_id);
				$this->db->update('entertainment_order_info', $enter_data);
				}
				else if($row['order_type'] == 3){
					$this->db->where('order_info_id', $new_order_id);
					$this->db->delete('stuff_order_info');
					
					$entertainment_user = $this->input->post('enter_honor');
					$enter_data = array('order_info_id'=>$new_order_id,'entertainment_user'=>$entertainment_user,'creator'=>$creator);
					$this->db->insert('entertainment_order_info',$enter_data);
				}
				else if($row['order_type'] == 0 || $row['order_type'] == 1){
					$entertainment_user = $this->input->post('enter_honor');
					$enter_data = array('order_info_id'=>$new_order_id,'entertainment_user'=>$entertainment_user,'creator'=>$creator);
					$this->db->insert('entertainment_order_info',$enter_data);
				}
			}
			else if($order_type == 3){
				if($row['order_type'] == 3){
					$stuff_honor = $this->input->post('stuff_honor');
					$enter_data2 = array('stuff_info_id'=>$stuff_honor);
				
					$this->db->where('order_info_id', $new_order_id);
					$this->db->update('stuff_order_info', $enter_data2);
				}
				else if($row['order_type'] == 2){
					$this->db->where('order_info_id', $new_order_id);
					$this->db->delete('entertainment_order_info');
					
					$stuff_honor = $this->input->post('stuff_honor');
					$enter_data = array('order_info_id'=>$new_order_id,'stuff_info_id'=>$stuff_honor,'creator'=>$creator);
					$this->db->insert('stuff_order_info',$enter_data);
				}
				else if($row['order_type'] == 0 || $row['order_type'] == 1){
					$stuff_honor = $this->input->post('stuff_honor');
					$enter_data = array('order_info_id'=>$new_order_id,'stuff_info_id'=>$stuff_honor,'creator'=>$creator);
					$this->db->insert('stuff_order_info',$enter_data);
				}
			}
			else if($order_type == 0 || $order_type == 1){
				if($row['order_type'] == 2){
					$this->db->where('order_info_id', $new_order_id);
					$this->db->delete('entertainment_order_info');
				}
				else if($row['order_type'] == 3){
					$this->db->where('order_info_id', $new_order_id);
					$this->db->delete('stuff_order_info');
				}
			}
			
			
			
			
			
			/* $this->load->model('order_setup');
			$order_setup = new Order_Setup();
			$order_setup->table_id=$table_id;
			$order_setup->client_name=$clisdfentName;
			$order_setup->client_id=$servie_token;
			$order_setup->contact_number=$contact_number;
			$order_setup->guest_quantity=$guest_quantity;
			$order_setup->total_amount=0;
			$order_setup->discount_amount=0;
			$order_setup->service_charge=0;
			$order_setup->paid_amount=0;
			$order_setup->waiter=$waiter;
			$order_setup->comments=$comments;
			$order_setup->doc=$bd_date;
			$order_setup->dom=$bd_date;
			$order_setup->status='active';
			$order_setup->order_type=$order_type;
			$order_setup->order_place=$order_place;
			$order_setup->room_number=$room_number;
			$order_setup->running='running';
			$order_setup->creator=$this->tank_auth->get_user_id();
			$insert_id = $order_setup->save();
			
			if($order_type == 2){
				$entertainment_user = $this->input->post('enter_honor');
				$enter_data = array('order_info_id'=>$insert_id,'entertainment_user'=>$entertainment_user,'creator'=>$creator);
				$this->db->insert('entertainment_order_info',$enter_data);
			}
			else if($order_type == 3){
				$stuff_honor = $this->input->post('stuff_honor');
				$enter_data2 = array('order_info_id'=>$insert_id,'stuff_info_id'=>$stuff_honor,'creator'=>$creator);
				$this->db->insert('stuff_order_info',$enter_data2);
			}
						$data2 = array('order_id'=>$insert_id);
					$query2= $this->db->insert('order_reference_table',$data2); */
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	
	function specific_table_order_info_show(){
	
		$json_response = array();
	 
			$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$order_info = $this->dbm_model->other_all_show('order_info','table_id',$show_key,'running','running');

            foreach ($order_info->result() as $row) {
                $row_array['order_id'] = $row->order_id;
                $row_array['client_id'] = $row->client_id;
				$row_array['client_name'] = $row->client_name;
                $row_array['table_id'] = $row->table_id;
				$row_array['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$row->table_id);
				$row_array['guest_quantity'] = $row->guest_quantity;
				$row_array['comments'] = $row->comments;
				$row_array['status'] = $row->status;
				$row_array['running'] = $row->running;
				$row_array['room_number'] = $row->room_number;
				$row_array['order_type'] = $row->order_type;
				$row_array['order_place'] = $row->order_place;
				$row_array['creator'] = $row->creator;
				$row_array['waiter'] = $row->waiter;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	
	function preperation_option_save(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		
		if($this->input->post()){
			$optionName = $this->input->post('optionName');

			$this->load->model('prep_option_setup');
			$prep_option_setup = new Prep_Option_Setup();
			//$prep_option_setup->prep_options_id=$prep_options_id;
			$prep_option_setup->option_name=$optionName;
			$prep_option_setup->doc=$bd_date;
			$prep_option_setup->dom=$bd_date;
			$prep_option_setup->creator=$this->tank_auth->get_user_id();
			$prep_option_setup->save();
			
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function prep_opt_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('prep_option_setup');
			$prep_option_setup = new Prep_Option_Setup();
			$prep_option_setup->load($edi_key);
			$data['prep_option_setup'] = $prep_option_setup;
			echo json_encode($prep_option_setup);
		  }else{
			echo 'Error 404';
		  }
		  
	}
	function preperation_option_edit(){
      if($this->input->post()){
        $option_id=$this->input->post('edi_key');
       $data = array(
               'option_name' => $this->input->post('optionName')
            );
      if($option_id!=""){
	 
      $this->db->where('prep_options_id', $option_id);
      $this->db->update('prep_options', $data);

      echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
		}
	  }else{
		echo 'Error 404';
	  }
      
	}
	function delete_prep_option(){
        if($this->input->post()){
		$del_key=$this->input->post('del_key');
		if($del_key!="")
		$this->load->model('prep_option_setup');
		$prep_option_setup = new Prep_Option_Setup();
		$prep_option_setup->load($del_key);
		$prep_option_setup->delete();
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted</span>'));
		}else{
			echo 'Error 404';
		}

	}
	function order_cancel_reason_entr_save(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		
		if($this->input->post()){
			$cancel_reason = $this->input->post('cancel_reason');

			$this->load->model('cancel_reason_setup');
			$cancel_reason_setup = new Cancel_Reason_Setup();
			$cancel_reason_setup->cancel_reason=$cancel_reason;
			$cancel_reason_setup->doc=$bd_date;
			$cancel_reason_setup->creator=$this->tank_auth->get_user_id();
			$cancel_reason_setup->save();
			
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function prepar_option_show(){
            $json_response = array();
            $this->load->model('prep_option_setup');
            $prep_option_setups = $this->prep_option_setup->get();
            foreach ($prep_option_setups as $row){
                
                $row_array['prep_options_id'] = $row->prep_options_id;
                $row_array['option_name'] = $row->option_name;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->creator;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
         
   }
	function temp_prep_option_save(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		$this->load->model('dbm_model');
		if($this->input->post('option_selected')){
			$option_selected = $this->input->post('option_selected');
			$order_selected = $this->input->post('order_selected');
			$product_selected = $this->input->post('product_selected');
			
			$this->load->model('temp_prep_option_setup');
			$temp_prep_option_setup = new Temp_Prep_Option_Setup();
			$temp_prep_option_setup->product_id=$product_selected;
			$temp_prep_option_setup->order_id=$order_selected;
			$temp_prep_option_setup->pre_option_id=$option_selected;
			$temp_prep_option_setup->sale_details_id=0;
			$temp_prep_option_setup->doc=$bd_date;
			$temp_prep_option_setup->dom=$bd_date;
			$temp_prep_option_setup->creator=$this->tank_auth->get_user_id();
			$temp_prep_option_setup->save();
			

			//$option_info = $this->dbm_model->other_all_show('temp_preparation_option,prep_options','product_id',$product_selected,'order_id',$order_selected,'temp_preparation_option.temp_prep_option_id','prep_options.prep_options_id');
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function temp_prep_option_save_onedit(){
		$bd_date = date('Y-m-d');
		$creator = $this->tank_auth->get_user_id();
		$this->load->model('dbm_model');
		if($this->input->post('option_selected')){
			$option_selected = $this->input->post('option_selected');
			$order_details_selected = $this->input->post('order_details_selected');

				$this->db->where('order_details_id',$order_details_selected);
				$this->db->from('order_details');
				$querr = $this->db->get();
				if($querr->num_rows()>0){
				$row = $querr->row_array();
					$order_selected = $row['order_id'];
					$product_selected = $row['product_id'];
				}
			
			$this->load->model('temp_prep_option_setup');
			$temp_prep_option_setup = new Temp_Prep_Option_Setup();
			$temp_prep_option_setup->product_id=$product_selected;
			$temp_prep_option_setup->order_id=$order_selected;
			$temp_prep_option_setup->pre_option_id=$option_selected;
			$temp_prep_option_setup->sale_details_id=$order_details_selected;
			$temp_prep_option_setup->doc=$bd_date;
			$temp_prep_option_setup->dom=$bd_date;
			$temp_prep_option_setup->creator=$this->tank_auth->get_user_id();
			$temp_prep_option_setup->save();

			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function temp_prepar_option_show(){
			$json_response = array();
			$this->load->model('dbm_model');
		    $option_selected = $this->input->post('option_selected');
			$order_selected = $this->input->post('order_selected');
			$product_selected = $this->input->post('product_selected');

			$option_info = $this->dbm_model->current_temp_prep_option($product_selected,$order_selected);
            foreach ($option_info->result() as $row) {
				$row_array['temp_prep_option_id'] = $row->temp_prep_option_id;
                $row_array['product_id'] = $row->product_id;
                $row_array['order_id'] = $row->order_id;
				$row_array['option_name'] = $row->option_name;
                $row_array['pre_option_id'] = $row->pre_option_id;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->creator;
                array_push($json_response,$row_array);
            }
			 echo json_encode($json_response);
	}
	function temp_prepar_option_show_on_edited(){
			$json_response = array();
			$this->load->model('dbm_model');
		    $order_details_selected = $this->input->post('order_details_selected');

			$option_info = $this->dbm_model->current_temp_prep_option_onedit($order_details_selected);
            foreach ($option_info->result() as $row) {
				$row_array['temp_prep_option_id'] = $row->temp_prep_option_id;
                $row_array['product_id'] = $row->product_id;
                $row_array['order_id'] = $row->order_id;
				$row_array['option_name'] = $row->option_name;
                $row_array['pre_option_id'] = $row->pre_option_id;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->creator;
                array_push($json_response,$row_array);
            }
			 echo json_encode($json_response);
	}
	
	function quantity_prepara_entry_save(){
		$bd_date = date('Y-m-d');
		$time = date('H:i:s');
		$creator = $this->tank_auth->get_user_id();
		$this->load->model('dbm_model');
		if($this->input->post('quantity')){
			$order_selected = $this->input->post('order_selected');
			$product_selected = $this->input->post('product_selected');
			$quantity = $this->input->post('quantity');
			$prep_comment = $this->input->post('prep_comment');
			$guest_number=$this->input->post('guesttt_number');
			
			
			$this->db->where('product_id',$product_selected);
			$quer25 = $this->db->get('product_info');
			$fro_service_id = $quer25->row_array();
			
			$this->db->where('order_id',$order_selected);
			$this->db->where('order_type',0);
			$quer23 = $this->db->get('order_info');
			$service_in_room_id = 0;
			if($quer23 -> num_rows() >0){
				$fro_service = $quer23->row_array();
				
				$databa = array('reservation_id'=>$fro_service['client_id'],'room_id'=>0,'service_date'=>$bd_date,'service_time'=>$time,'service_id'=>$fro_service_id['service_insert_id'],'quantity'=>$quantity,'is_complete'=>1,'status'=>0,'userID'=>$creator);
				
				$this->db->insert('service_in_room',$databa);
				$service_in_room_id = $this->db->insert_id();
			}
			
			$this->db->where('product_id',$product_selected);
			$this->db->where('package_definition', 'on');
			$query = $this->db->get('product_info');
			
			if($query->num_rows()>0){
			
								$this->load->model('order_details_setup');
								$order_details_setup = new Order_Details_Setup();
								$order_details_setup->product_id=$product_selected;
								$order_details_setup->order_id=$order_selected;
								$order_details_setup->quantity=$quantity;
								$order_details_setup->sale_prices=$this->dbm_model->other_show('sale_price','product_info','product_id',$product_selected);
								$order_details_setup->guest_number=$guest_number;
								$order_details_setup->prep_comment=$prep_comment;
								$order_details_setup->service_in_room_id=$service_in_room_id;
								$order_details_setup->doc=$bd_date;
								$order_details_setup->dom=$bd_date;
								$order_details_setup->creator=$this->tank_auth->get_user_id();
								$insert_id=$order_details_setup->save();
								
								$data=array('sale_details_id'=>$insert_id);
										$this->db->where('order_id', $order_selected);
										$this->db->where('product_id', $product_selected);
										$this->db->where('sale_details_id', 0);
										$this->db->update('temp_preparation_option',$data);
			
			
				foreach ($query->result() as $row)
				{
					 $myproduct=$this->dbm_model->pacage_product($row->product_id);
						foreach ($myproduct->result() as $rw){
						$produc_id = $rw->product_id;
						$quantitys = $rw->quantity * $quantity;
						$sql = "update product_info set stock_amount = stock_amount - ".$quantitys." where product_id = ".$produc_id;
						$que=$this->db->query($sql);
					}
				}
				echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
			}
		else{
			$this->load->model('order_details_setup');
			$order_details_setup = new Order_Details_Setup();
			$order_details_setup->product_id=$product_selected;
			$order_details_setup->order_id=$order_selected;
			$order_details_setup->quantity=$quantity;
			$order_details_setup->sale_prices=$this->dbm_model->other_show('sale_price','product_info','product_id',$product_selected);
			$order_details_setup->guest_number=$guest_number;
			$order_details_setup->prep_comment=$prep_comment;
			$order_details_setup->service_in_room_id=$service_in_room_id;
			$order_details_setup->doc=$bd_date;
			$order_details_setup->dom=$bd_date;
			$order_details_setup->creator=$this->tank_auth->get_user_id();
			$insert_id=$order_details_setup->save();
			
			$data=array('sale_details_id'=>$insert_id);
					$this->db->where('order_id', $order_selected);
					$this->db->where('product_id', $product_selected);
					$this->db->where('sale_details_id', 0);
					$this->db->update('temp_preparation_option',$data);
					
			$sql = "update product_info set stock_amount = stock_amount - ".$quantity." where product_id = ".$product_selected;
			$que=$this->db->query($sql);

			echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
		}
 		}
		else{
			echo 'Error 404';
		}
	}
	function order_details_edit_show(){
		if($this->input->post()){
			$order_details_id=$this->input->post('edi_key');
			$data = array();
			if($order_details_id!="")
			$this->load->model('order_details_setup');
			$order_details_setup = new Order_Details_Setup();
			$order_details_setup->load($order_details_id);
			$data['order_details_setup'] = $order_details_setup;
			echo json_encode($order_details_setup);
		  }else{
			echo 'Error 404';
		}
	}
	
	function quantity_prepara_update_save(){
      if($this->input->post()){
        $order_details_id=$this->input->post('edi_key');
		
			$this->db->select('order_details.*,product_info.package_definition');
			$this->db->where('order_details_id',$order_details_id);
			$this->db->where('order_details.product_id = product_info.product_id');
			$this->db->from('order_details,product_info');
			$querys = $this->db->get();
			$row = $querys->row_array();
			
			$dtaa = array('quantity' => $this->input->post('quantity'));
			$this->db->where('serv_room_id',$row['service_in_room_id']);
			$this->db->update('service_in_room',$dtaa);
			
			if($row['quantity'] != $this->input->post('quantity')){
				if($row['package_definition'] == 'on'){
					$myproduct=$this->dbm_model->pacage_product($row['product_id']);
						foreach ($myproduct->result() as $rw){
						$produc_id = $rw->product_id;
						$quantitys = $rw->quantity * $row['quantity'];
						$sql = "update product_info set stock_amount = stock_amount + ".$quantitys." where product_id = ".$produc_id;
						$que=$this->db->query($sql);
						
						$quantitys2 = $rw->quantity * $this->input->post('quantity');
						$sql2 = "update product_info set stock_amount = stock_amount - ".$quantitys2." where product_id = ".$produc_id;
						$que2=$this->db->query($sql2);
						}
				}
				else{
					$quant2 = $this->input->post('quantity');
					$sql = "update product_info set stock_amount = stock_amount + ".$row['quantity']." where product_id = ".$row['product_id'];
					$que=$this->db->query($sql);
					
					$sql2 = "update product_info set stock_amount = stock_amount - ".$quant2." where product_id = ".$row['product_id'];
					$que=$this->db->query($sql2);
				}
			}
        $data = array(
               'quantity' => $this->input->post('quantity') ,
			   'guest_number' => $this->input->post('guesttt_number') ,
			   'prep_comment' => $this->input->post('prep_comment')
            );
		  if($order_details_id!=""){
		 
		  $this->db->where('order_details_id', $order_details_id);
		  $this->db->update('order_details', $data);

		  echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
			}
	  }else{
		echo 'Error 404';
	  }
	}
	
	function show_products_on_specific_order(){
	
		$json_response = array();
	 
			$order_selected = $this->input->post('order_selected');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$product_info = $this->dbm_model->show_products_on_specific_order($order_selected);

            foreach ($product_info->result() as $row) {
                $row_array['product_id'] = $row->product_id;
				$row_array['order_id'] = $row->order_id;
                $row_array['product_name'] = $row->product_name;
                $row_array['sale_price'] = $row->sale_price;
				$row_array['quantity'] = $row->quantity;
				$row_array['guest_number'] = $row->guest_number;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['discounts_value'] = $row->discounts_value;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['service_type'] = $row->service_type;
				$row_array['service_value'] = $row->service_value;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['order_details_id'] = $row->order_details_id;
				//$row_array['category'] = $this->dbm_model->other_show('category_name','product_category','category_id',$row->category);
				$row_array['comments'] = $row->comments;
				$row_array['prep_comment'] = $row->prep_comment;
				$row_array['total'] = $row->quantity * $row->sale_price;
				$row_array['option_name'] = $this->dbm_model->get_option_name($row->product_id,$row->order_id,$row->order_details_id);
				//print_r($row_array);
                array_push($json_response,$row_array);

            }
           echo json_encode($json_response);
		  
	}
	function order_produc_del_link(){
		if($this->input->post()){
		$order_selected=$this->input->post('order_selected');
		$order_details_id=$this->input->post('order_details_id');
		if($order_details_id!="")
			$this->load->model('dbm_model');
			$product_info = $this->dbm_model->other_all_show('order_details','order_details_id',$order_details_id);
		        foreach ($product_info->result() as $row) {
				$product_id = $row->product_id;
                $quantity = $row->quantity;
				
								$this->db->where('product_id',$product_id);
								$this->db->where('package_definition', 'on');
								$query = $this->db->get('product_info');
								
								if($query->num_rows()>0){
												foreach ($query->result() as $row)
												{
													 $myproduct=$this->dbm_model->pacage_product($product_id);
														foreach ($myproduct->result() as $rw){
														$produc_id = $rw->product_id;
														$quantitys = $rw->quantity * $quantity;
														$sql = "update product_info set stock_amount = stock_amount + ".$quantitys." where product_id = ".$produc_id;
														$que=$this->db->query($sql);
													}
												}
								}
								else{
									$sql = "update product_info set stock_amount = stock_amount + ".$quantity." where product_id = ".$product_id;
									$que=$this->db->query($sql);
									}
				$this->db->where('serv_room_id', $row->service_in_room_id);
				$this->db->delete('service_in_room');
            }
		
		$this->db->where('order_details_id', $order_details_id);
		$this->db->delete('order_details');
		
		//$this->db->where('order_id', $order_selected);
		$this->db->where('sale_details_id', $order_details_id);
		$this->db->delete('temp_preparation_option');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function cancel_order_link(){
		$order_selected=$this->input->post('order_selected');
		if($order_selected!=""){
		
		
		
			$this->load->model('dbm_model');
			$product_info = $this->dbm_model->other_all_show('order_details','order_id',$order_selected);
		        foreach ($product_info->result() as $row) {
				$product_id = $row->product_id;
                $quantity = $row->quantity;
								$this->db->where('product_id',$product_id);
								$this->db->where('package_definition', 'on');
								$query = $this->db->get('product_info');
								
							if($query->num_rows()>0){
												foreach ($query->result() as $ro)
												{
													 $myproduct=$this->dbm_model->pacage_product($product_id);
														foreach ($myproduct->result() as $rw){
														$produc_id = $rw->product_id;
														$quantitys = $rw->quantity * $quantity;
														$sql = "update product_info set stock_amount = stock_amount + ".$quantitys." where product_id = ".$produc_id;
														$que=$this->db->query($sql);
													}
												}
								}
							else{
							$sql = "update product_info set stock_amount = stock_amount + ".$quantity." where product_id = ".$product_id;
							$que=$this->db->query($sql);
							}
					$this->db->where('serv_room_id', $row->service_in_room_id);
					$this->db->delete('service_in_room');
				}
				
		$this->db->where('order_id', $order_selected);
		$querr = $this->db->get('order_reference_table');
		if($querr->num_rows() > 0){
		$querr = $querr->row_array();
		$this->db->where('payment_history_id', $querr['ref_id']);
		$this->db->delete('payment_history');
		
		$this->db->where('discount_id', $querr['discount_id']);
		$this->db->delete('discount_client');
		}
		
		$this->db->where('order_id', $order_selected);
		$this->db->delete('order_reference_table');
		
		$this->db->where('table_ref_name', 'order_info');
		$this->db->where('table_ref_id', $order_selected);
		$this->db->delete('restaurant_transaction');
		
		$this->db->where('order_id', $order_selected);
		$this->db->delete('order_details');
		
		$this->db->where('order_id', $order_selected);
		$this->db->delete('temp_preparation_option');
		
		$this->db->where('order_id', $order_selected);
		$querrold = $this->db->get('order_info');
		if($querrold->num_rows() > 0){
			$rroww = $querrold->row_array();
			if($rroww['paid_amount'] > 0){
				$this->dbm_model->update_cashbox_in_transaction($rroww['paid_amount'],0);
			}
		}
		
		$this->db->where('order_id', $order_selected);
		$this->db->delete('order_info');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function expense_save(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'expense_save'))
		{
			$this->load->model('dbm_model');
			$bd_date = date('Y-m-d');
			if($this->input->post()){
				$proName = $this->input->post('proName');
				$purpose = $this->input->post('purpose');
				$amount = $this->input->post('amount');
				$comment = $this->input->post('comment');
				
				$this->load->model('expense_setup');
				$expense_setup = new Expense_Setup();
				$expense_setup->providerName=$proName;
				$expense_setup->purpose=$purpose;
				$expense_setup->amount=$amount;
				$expense_setup->comment=$comment;
				$expense_setup->doc=$bd_date;
				$expense_setup->creator=$this->tank_auth->get_user_id();
				$expense_id = $expense_setup->save();
				
				if($amount > 0){
				$this->dbm_model->transaction_entry('out',$amount,$bd_date,'Restaurant Expense','restaurant_expense',$expense_id);
				$this->dbm_model->update_cashbox_in_transaction($amount,0);
				}
				
				//$this->dbm_model->accounts_in_out(2,0,$amount);

				echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
			}else{
				echo 'Error 404';
			}
		}
		}
	function expense_show(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'expense_show'))
		{
			$json_response = array();
			$this->load->model('dbm_model');
			$this->load->model('expense_setup');
			$expense_setups = $this->expense_setup->get(100,0,'doc');
            foreach ($expense_setups as $row) {
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
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
	}
	function expens_delete(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'expens_delete'))
		{
			if($this->input->post()){
			$expense_selected=$this->input->post('expense_selected');
			if($expense_selected!="")
			
			$this->db->where('purpose', 'Restaurant Expense');
			$this->db->where('table_ref_id', $expense_selected);
			$exp_amount = $this->db->get('restaurant_transaction');
			$exp_amount = $exp_amount->row_array();
			$this->db->where('purpose', 'Restaurant Expense');
			$this->db->where('table_ref_id', $expense_selected);
			$this->db->delete('restaurant_transaction');
			
			$this->dbm_model->update_cashbox_in_transaction($exp_amount['transaction_amount'],1);
			
			$this->db->where('restaurant_expense_id', $expense_selected);
			$this->db->delete('restaurant_expense');
			
			   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
			}else{
				echo 'Error 404';
			}
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
	}
	function expense_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('expense_setup');
			$expense_setup = new Expense_Setup();
			$expense_setup->load($edi_key);
			$data['expense_setup'] = $expense_setup;
			echo json_encode($expense_setup);
		}else{
			echo 'Error 404';
		}
	}
	function expense_edite(){
	$data['user_type'] = $this -> tank_auth -> get_usertype();
	if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_edit'))
	{
      if($this->input->post()){
	  		
			$proName = $this->input->post('proName');
			$purpose = $this->input->post('purpose');
			$amount = $this->input->post('amount');
			$edi_key=$this->input->post('edi_key');
			$comment=$this->input->post('comment');

        $datas = array(
               'providerName' => $proName,
			   'purpose' => $purpose,
			   'amount' => $amount,
			   'comment' => $comment
            );
      $this->db->where('restaurant_expense_id', $edi_key);
      $this->db->update('restaurant_expense', $datas);
	  
			if($amount > 0){
			
			$this->dbm_model->update_transaction_cashbox_when_update_transaction($amount,'Restaurant Expense','restaurant_expense',$edi_key,'out');
			}
	  echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
	  }else{
		echo 'Error 404';
		  }
	}
	else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
	}
	
	function entertain_show(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();

			$json_response = array();
			$this->load->model('dbm_model');
			$this->load->model('entertainment_setup');
			$entertain_setup = $this->entertainment_setup->get();
            foreach ($entertain_setup as $row) {
				$row_array['entertainment_id'] = $row->entertainment_id;
                $row_array['honor_name'] = $row->honor_name;
                $row_array['contact'] = $row->contact;
				$row_array['address'] = $row->address;
                $row_array['resignation'] = $row->resignation;
				$row_array['DOC'] = $row->DOC;
				$row_array['creator'] = $row->creator;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
			 echo json_encode($json_response);
			//echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
	}
	
	function entertainment_save(){
			$this->load->model('dbm_model');
			$bd_date = date('Y-m-d');
			if($this->input->post()){
				$entertainName = $this->input->post('entertainName');
				$contact = $this->input->post('contact');
				$resignation = $this->input->post('resignation');
				$address = $this->input->post('address');
				
				$this->load->model('entertainment_setup');
				$entertainment_setup = new Entertainment_Setup();
				$entertainment_setup->honor_name=$entertainName;
				$entertainment_setup->contact=$contact;
				$entertainment_setup->resignation=$resignation;
				$entertainment_setup->address=$address;
				$entertainment_setup->DOC=$bd_date;
				$entertainment_setup->creator=$this->tank_auth->get_user_id();
				$entertainment_setup->save();

				echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
			}else{
				echo 'Error 404';
			}
	}
	
	function entertaint_edit_show(){
		if($this->input->post()){
			$entertaint_id=$this->input->post('edi_key');
			$data = array();
			if($entertaint_id!="")
			$this->load->model('entertainment_setup');
			$entertainment_setup = new Entertainment_Setup();
			$entertainment_setup->load($entertaint_id);
			$data['entertainment_setup'] = $entertainment_setup;
			echo json_encode($entertainment_setup);
		  }else{
			echo 'Error 404';
		}
	}
	
	function entertainment_edit(){
      if($this->input->post()){
        $enter_id=$this->input->post('edi_key');
       $data = array(
               'honor_name' => $this->input->post('entertainName'),
			   'contact' => $this->input->post('contact'),
			   'resignation' => $this->input->post('resignation'),
			   'address' => $this->input->post('address')
            );
      if($enter_id!=""){
	 
      $this->db->where('entertainment_id', $enter_id);
      $this->db->update('entertainment_info', $data);

      echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully updated</span>'));
		}
	  }else{
		echo 'Error 404';
	  }
      
	}
	
	function stuff_show(){
			$this->db->where('active_status',0);
			$stuff_setup = $this->db->get('stuff_info');
			$stuff_setup = $stuff_setup->result();
			echo json_encode($stuff_setup);
	}
	function stuff_save(){
			$this->load->model('dbm_model');
			$bd_date = date('Y-m-d');
			if($this->input->post()){
				$stuffName = $this->input->post('stuffName');
				$contact = $this->input->post('contact');
				$resignation = $this->input->post('resignation');
				$address = $this->input->post('address');
				
				$this->load->model('stuff_setup');
				$stuff_setup = new Stuff_Setup();
				$stuff_setup->stuff_name=$stuffName;
				$stuff_setup->contact=$contact;
				$stuff_setup->resignation=$resignation;
				$stuff_setup->address=$address;
				$stuff_setup->DOC=$bd_date;
				$stuff_setup->creator=$this->tank_auth->get_user_id();
				$stuff_setup->save();

				echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Save</span>'));
			}else{
				echo 'Error 404';
			}
	}
	function stuff_delete(){
		/* $data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'expens_delete'))
		{ */
			if($this->input->post()){
			$stuff_selected=$this->input->post('stuff_selected');
			if($stuff_selected!="")
		
			$up_data = array('active_status' => 1);
		
			$this->db->where('stuff_id', $stuff_selected);
			$this->db->update('stuff_info',$up_data);
			   echo json_encode(array('mssage'=>'1'));
			}else{
				echo 'Error 404';
			}
		/* }
		else{
		echo json_encode(array('mssage'=>'0'));
		} */
	}
	function stuff_edit_show(){
		if($this->input->post()){
			$stuff_id=$this->input->post('edi_key');
			$data = array();
			if($stuff_id!="")
			$this->load->model('stuff_setup');
			$stuff_setup = new Stuff_Setup();
			$stuff_setup->load($stuff_id);
			$data['stuff_setup'] = $stuff_setup;
			echo json_encode($stuff_setup);
		  }else{
			echo 'Error 404';
		}
	}
	function stuff_edit(){
      if($this->input->post()){
        $stuff_id=$this->input->post('edi_key');
       $data = array(
               'stuff_name' => $this->input->post('stuffName'),
			   'contact' => $this->input->post('contact'),
			   'resignation' => $this->input->post('resignation'),
			   'address' => $this->input->post('address')
            );
      if($stuff_id!=""){
	 
      $this->db->where('stuff_id', $stuff_id);
      $this->db->update('stuff_info', $data);

      echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully updated</span>'));
		}
	  }else{
		echo 'Error 404';
	  }
      
	}
	function product_stock_update(){
		if($this->input->post()){
		$stock_selected=$this->input->post('proName');
		$quantity = $this->input->post('quantitys');
			$sql = "update product_info set stock_amount = stock_amount + ".$quantity." where product_id = ".$stock_selected;
			$que=$this->db->query($sql);
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Updated.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function delete_temp_option_detail(){
	 if($this->input->post()){
		$order_selected=$this->input->post('order_selected');
		$product_selected=$this->input->post('product_selected');
		if($product_selected!="")

		$this->db->where('order_id', $order_selected);
		$this->db->where('product_id', $product_selected);
		$this->db->where('sale_details_id', 0);
		$this->db->delete('temp_preparation_option');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		 }else{
			echo 'Error 404';
		}
	}
	function dele_temp_option_selected(){
	 if($this->input->post()){
		$option_selected=$this->input->post('option_selected');
		if($option_selected!="")

		$this->db->where('temp_prep_option_id', $option_selected);
		$this->db->delete('temp_preparation_option');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
		 }else{
			echo 'Error 404';
		}
	}
	function servic_chrge_entr_save(){
		if($this->input->post()){
		$order_selected=$this->input->post('order_selected');
		$service_charge=$this->input->post('servi_charg_valu');
		if($order_selected!="")

		$data=array('service_charge'=>$service_charge);
		
		$this->db->where('order_id', $order_selected);
		$this->db->update('order_info',$data);
	
		$data2 = array('service_type'=>$this->input->post('service_type'),
				'service_value'=>$this->input->post('service_value'));
				$this->db->where('order_id', $order_selected);
				$this->db->update('order_reference_table',$data2);
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Updated.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function discoun_chrge_entr_save(){
		if($this->input->post()){
		$order_selected=$this->input->post('order_selected');
		$discoun_charg_valu=$this->input->post('discoun_charg_valu');
		//if($order_selected!="")

		$data=array('discount_amount'=>$discoun_charg_valu);
		
		$this->db->where('order_id', $order_selected);
		$this->db->update('order_info',$data);

				$data2 = array('discount_type'=>$this->input->post('discount_type'),
								'discounts_value'=>$this->input->post('discount_value'));
				$this->db->where('order_id', $order_selected);
				$this->db->update('order_reference_table',$data2);
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Updated.</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function payment_chrge_entr_save(){
		if($this->input->post()){
		$order_selected=$this->input->post('order_selected');
		$paymen_charg_valu=$this->input->post('paymen_charg_valu');
		if($order_selected!=""){

			$this->db->select('order_info.*,SUM(order_details.quantity*sale_prices) AS tot_price');
			$this->db->from('order_info,order_details');
			$this->db->where('order_info.order_id = order_details.order_id');
			$this->db->where('order_info.order_id', $order_selected);
			$quer = $this->db->get();
			$row = $quer->row();
			$grand = ($row->tot_price + $row->service_charge) - $row->discount_amount;
			if($grand < $paymen_charg_valu){
				$paymen_charg_valu = $grand;
			}
		
			$data=array('paid_amount'=>$paymen_charg_valu);
		
			$this->db->where('order_id', $order_selected);
			$this->db->update('order_info',$data);
	
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Updated.</span>'));
		}
		}else{
			echo 'Error 404';
		}
	}
	
	function package_save(){
	
		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$package_nam = $this->input->post('package_nam');
			$product_name = $this->input->post('product_name');
			$quantity = $this->input->post('quantity');
			
			$this->load->model('package_setup');
			$package_setup = new Package_Setup();
			$package_setup->package_id=$package_nam;
			$package_setup->product_id=$product_name;
			$package_setup->quantity=$quantity;
			$package_setup->doc=$bd_date;
			$package_setup->dom=$bd_date;
			$package_setup->creator=$this->tank_auth->get_user_id();
			$package_setup->save();
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function package_show(){
			$json_response = array();
			//$this->load->model('dbm_model');
			//$this->load->model('expense_setup');
			$myproduct=array();
			$this->load->model('dbm_model');
			
			 $this->db->where('package_definition', 'on');
			 $query = $this->db->get('product_info');
			
				foreach ($query->result() as $row)
				{
					 $myproduct=$this->dbm_model->pacage_product($row->product_id);
						foreach ($myproduct->result() as $rw){
						$row_array['product_name'] = $rw->product_name;
						$row_array['category_name'] = $rw->category_name;
						$row_array['package_name'] = $row->product_name;
						$row_array['package_info_id'] = $rw->package_info_id;
						$row_array['quantity'] = $rw->quantity;
						array_push($json_response,$row_array);
					}
				}
			 echo json_encode($json_response);
		
	}
	function product_package_delete(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();

			if($this->input->post()){
			$del_key=$this->input->post('del_key');
			if($del_key!="")
			
			$this->db->where('package_info_id', $del_key);
			$this->db->delete('package_info');
			   echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Deleted.</span>'));
			}else{
				echo 'Error 404';
			}
	}
	

	
	function showStayList(){
		$this->load->model('naz_mdl');
		$json_response = array();
		$client_id = $from_date = $to_date='';
        $client_id = $this->input->post('client_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        
        if($client_id != ''){
            $this->db->where('client_id', $client_id);
        }else{
            //nothing
        }
        
        if($from_date != ''){
            $this->db->where('checkin_date >=', $this->naz_mdl->date_sql($from_date));
        }else{
            //nothing
        }
        
        if($to_date != ''){
            $this->db->where('checkin_date <=', $this->naz_mdl->date_sql($to_date));
        }else{
            //nothing
        }

        $this->db->where('reservation_status', 2);
        $this->db->where('status', 0);
        $this->db->order_by('real_checkin_date', 'DESC');
        $this->db->limit(1500);
        $query = $this->db->get('reservation_new');

        foreach ($query->result() as $row)
        {
            $client_name = $this->naz_mdl->client_name($row->client_id);
            $client_mobile = $this->naz_mdl->converter_db('contact_no', 'client_info', 'client_id', $row->client_id);
            $rooms = $this->naz_mdl->reserved_room($row->reservation_id);
            
            $total_payment = $this->naz_mdl->total_payed_in_reservtion($row->reservation_id);
            $get_total_bill = $this->naz_mdl->get_total_bill_in_checkout($row->reservation_id);
            
            $balance = $total_payment - $get_total_bill;
            
            $client_name1 = $client_name;
            $total_payment = number_format($total_payment, 2, '.', '');
            $get_total_bill = number_format($get_total_bill, 2, '.', '');
            $balance = number_format($balance, 2, '.', '');

            $reservation_date = $this->naz_mdl->date_pub($row->checkin_date);
            
		$row_array['balance'] = $balance;
        $row_array['ServiceToken'] = $row->reservation_id;
        $row_array['clientname'] = $client_name1;
        $row_array['contactNo'] = $client_mobile;
        $row_array['ChekinDate'] = $reservation_date;
        $row_array['ChekinTime'] = $rooms;
		$row_array['ChekinTimess'] = 0;//$row->ChekinTime;
		$row_array['amount'] = $get_total_bill;
		$row_array['payment'] = $total_payment;
        $row_array['statuse'] = 0;//$this->dbm_model_hotel->checkStatuse($dateEntris,$deptureDate);
        array_push($json_response,$row_array);
			
           /*  $this->table->add_row($row->reservation_id, $client_name1, $client_mobile, $reservation_date, $rooms, $get_total_bill, $total_payment, $balance); */

        }
        
        /* $tamplate = $this->naz_mdl->table_template('table table-bordered table-striped table-condensed table_side3', 'font-size:12px');
	    $this->table->set_heading('R.No', 'Client Name', 'Contact No', 'Checkin', 'Rooms', 'Amount', 'Payment', 'Balaence');
        $this->table->set_template($tamplate);
        echo $this->table->generate(); */
		
		echo json_encode($json_response);
}
	
	function showStayList_old(){
    
    $this->load->model('dbm_model_hotel');
    $this->load->model('date_model');
    $arrdata=array();
    $json_response = array();
    $this->db->where('checkValue', 0); 
    $this->db->order_by("checkInID", "desc"); 
	$query = $this->db->get('checkin_table');
    foreach ($query->result() as $row)
    {
        $dateEntris=$this->dbm_model_hotel->entrisDate($row->ServiceToken);
        $deptureDate=$this->dbm_model_hotel->deptureDate($row->ServiceToken);
        $customerID=$this->dbm_model_hotel->other_show('customerID','service_token','serviceToken',$row->ServiceToken);
        $customerIdenty=$this->dbm_model_hotel->other_show('customerIdenty','service_token','serviceToken',$row->ServiceToken);
        $arrdata=$this->dbm_model_hotel->customerSelection($customerID,$customerIdenty);
        $totalAmount=$this->dbm_model_hotel->other_show('totalAmount','service_token','serviceToken',$row->ServiceToken);
        $paidAmount=$this->dbm_model_hotel->other_show('paidAmount','service_token','serviceToken',$row->ServiceToken);

        $row_array['balance']=$this->dbm_model_hotel->check_balance($totalAmount,$paidAmount);
        $row_array['ServiceToken']=$row->ServiceToken;
        $row_array['clientname']=$arrdata[0]['name'];
        $row_array['contactNo']=$arrdata[0]['mobile'];
        $row_array['ChekinDate']=$this->date_model->date_pub($row->ChekinDate);
        $row_array['ChekinTime']=$this->dbm_model_hotel->room_list($row->ServiceToken);//$row->ChekinTime;
		$row_array['ChekinTimess']=$row->ChekinTime;
        $row_array['statuse']=$this->dbm_model_hotel->checkStatuse($dateEntris,$deptureDate);
        array_push($json_response,$row_array);
    }
    echo json_encode($json_response);
}
function CheckinCustomerDetails(){

	$this->load->model('naz_mdl');
	if($this->input->post()){
	   
  $tokenID=$this->input->post('tokenID');
  $this->db->select('client_id');
  $this->db->from('reservation_new');
  $this->db->where('reservation_id',$tokenID);
  $client_id = $this->db->get();
  $client_id = $client_id->row_array();
  $json_response = array();
        $this->db->where('client_id', $client_id['client_id']);
 	    $query = $this->db->get('client_info');
        foreach ($query->result() as $row)
        {
           $total_payment = $this->naz_mdl->total_payed($row->client_id);
           $get_total_bill = $this->naz_mdl->get_total_bill($row->client_id);
           $balance = $total_payment - $get_total_bill;
           
           $row_data['serviceToken'] = $tokenID;
           $row_data['name_title'] = $this->naz_mdl->converter_db('title_name', 'name_title', 'name_title_id', $row->name_title_id);
           $row_data['clientname'] = $row_data['name_title'].' '.$row->first_name.' '.$row->last_name;
           $row_data['last_name'] = $row->last_name;
           $row_data['gender'] = $row->gender;
           $row_data['dob'] = $this->naz_mdl->date_pub($row->dob);
           $row_data['address'] = $row->address;
           $row_data['city'] = $row->city;
           $row_data['zip_code'] = $row->zip_code;
           $row_data['country_id'] = $row->country_id;
           $row_data['countrys'] = $this->naz_mdl->converter_db('Name', 'country', 'country_id', $row->country_id);
           $row_data['contactNo'] = $row->contact_no;
           $row_data['email'] = $row->email;
		   $row_data['rooms'] = $this->naz_mdl->reserved_room($tokenID);
           $row_data['passport'] = $row->passport;
           $row_data['national_id'] = $row->national_id;
           $row_data['comment'] = $row->comment;
           $row_data['client_id'] = $row->client_id;
           $row_data['client_img'] = $this->naz_mdl->client_img($row->client_id);
           $row_data['balance'] = number_format($balance, 2, '.', '');
		   array_push($json_response,$row_data);
        }
        echo json_encode($json_response);
  
    }else{
        echo 'Error 404';
    }
    
}

function CheckinCustomerDetails_Old(){

if($this->input->post()){
	   
  $tokenID=$this->input->post('tokenID');
  
  $json_response = array();
    $this->load->model('dbm_model_hotel');
    $this->load->model('date_model');
    $arrdata=array();
    $this->db->where('serviceToken', $tokenID);
    $query = $this->db->get('service_token');
    foreach ($query->result() as $row)
    {   $arrdata=$this->dbm_model_hotel->customerSelection($row->customerID,$row->customerIdenty);
        
        $dateEntris=$this->dbm_model_hotel->entrisDate($row->serviceToken);
        $deptureDate=$this->dbm_model_hotel->deptureDate($row->serviceToken);
        $row_array['serviceToken']=$row->serviceToken;
        $row_array['clientname']=$arrdata[0]['name'];
        $row_array['contactNo']=$arrdata[0]['mobile'];
        $row_array['rooms']=$this->dbm_model_hotel->conjumeroom($row->serviceToken);
        $row_array['entrace']=$dateEntris;
        $row_array['departure']=$deptureDate;
        $row_array['nights']=$this->dbm_model_hotel->countNight($row->serviceToken);
        $row_array['adults']=$this->dbm_model_hotel->countAdults($row->serviceToken);
        $row_array['childs']=$this->dbm_model_hotel->countchild($row->serviceToken);
        $row_array['statuse']=$this->dbm_model_hotel->checkStatuse($dateEntris,$deptureDate);
        $row_array['totalAmount']=$row->totalAmount;
        $row_array['paidAmount']=$row->paidAmount;
        $row_array['balance']=$this->dbm_model_hotel->check_balance($row->totalAmount,$row->paidAmount);
        array_push($json_response,$row_array);
    }
   echo json_encode($json_response); 
  
    }else{
        echo 'Error 404';
    }
    
}

	function invoice_show(){
            $json_response = array();
			$timezone = "Asia/Dhaka";
			date_default_timezone_set($timezone);
			$bd_date = date('Y-m-d',time());
			$this->load->model('dbm_model');
            $this->load->model('order_setup');
			$this->db->select('order_info.*,order_reference_table.grand_total,order_reference_table.discount_type,order_reference_table.discounts_value');
			$this->db->from('order_info,order_reference_table');
			$this->db->where('order_info.doc >="'.$bd_date.'"');
			$this->db->where('order_info.doc <="'.$bd_date.'"');
			$this->db->where('order_info.order_id = order_reference_table.order_id');
			$order_setup = $this->db->get();
			$order_setup = $order_setup->result();
            //$order_setup = $this->order_setup->get();
            foreach ($order_setup as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['room_number'] = $row->room_number;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['order_type'] = $row->order_type;
				$row_array['discounts_value'] = $row->discounts_value;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
   	function specific_invoices_shoing(){
            $json_response = array();
			$this->load->model('dbm_model');
           // $this->load->model('order_setup');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$username = $this->input->post('username');
			$waitername = $this->input->post('waitername');
            $order_setup = $this->dbm_model->specific_invoices_shoing($start_date,$end_date,$username,$waitername);
            foreach ($order_setup->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['room_number'] = $row->room_number;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['discount_type'] = $row->discount_type;
				$row_array['discounts_value'] = $row->discounts_value;
				$row_array['order_type'] = $row->order_type;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $row->username;//$this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
   
	function cash_box_entr_save(){
	
		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$opening_cash = $this->input->post('opening_cash');
			
			$this->load->model('cash_box_setup');
			$cash_box_setup = new Cash_Box_Setup();
			$cash_box_setup->opening_cashbox=$opening_cash;
			$cash_box_setup->thousand=0;
			$cash_box_setup->five_hundred=0;
			$cash_box_setup->one_hundred= 0;
			$cash_box_setup->fifty= 0;
			$cash_box_setup->twenty= 0;
			$cash_box_setup->ten= 0;
			$cash_box_setup->five= 0;
			$cash_box_setup->two= 0;
			$cash_box_setup->one= 0;
			$cash_box_setup->not_edit_future= 0;
			$cash_box_setup->closing_cash= $opening_cash;
			$cash_box_setup->DOM=$bd_date;
			$cash_box_setup->creator=$this->tank_auth->get_user_id();
			$cash_box_setup->save();
			
			echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	
	function cash_box_show(){
            $json_response = array();
            $this->load->model('cash_box_setup');
			$this->load->model('dbm_model');
            $cash_box_setup = $this->cash_box_setup->get(100,0,'DOC');
            foreach ($cash_box_setup as $row){
                
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
				$row_array['creator'] = $this->dbm_model->other_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
   
	function specific_cash_box_shoing(){
            $json_response = array();
            $start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			
			//if($show_key!="")
			$this->load->model('dbm_model');
			$this->db->from('cashbox_info');
			$this->db->order_by('cashbox_info.DOC','desc');
					if($start_date!=''){
						$st_date = $start_date.' 00:00:00';
						$this->db-> where('cashbox_info.DOC >= "'.$st_date.'"');
					}
					if($end_date!=''){
						$end_date = $end_date.' 24:59:59';
						$this->db-> where('cashbox_info.DOC <= "'.$end_date.'"');
					}
					elseif($start_date!=''){
						$stt_date = $start_date.' 24:59:59';
						$this->db-> where('cashbox_info.DOC <= "'.$stt_date.'"');
					}
			
			$cash_box_setup =$this->db->get();
           // $cash_box_setup = $this->cash_box_setup->get(100,0,'DOC');
            foreach ($cash_box_setup ->result() as $row){
                
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
				$row_array['creator'] = $this->dbm_model->other_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
   
	  function cashbox_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('cash_box_setup');
			$cash_box_setup = new Cash_Box_Setup();
			$cash_box_setup->load($edi_key);
			$data['cash_box_setup'] = $cash_box_setup;
			echo json_encode($cash_box_setup);
	  }else{
		echo 'Error 404';
	  }
		  
	}
 function cashbox_edite(){
      if($this->input->post()){
		  
		$closing_date = date('Y-m-d H:i:s');
        $cashbox_edi_key=$this->input->post('cashbox_edi_key');
        $opening_cash=$this->input->post('opening_cash');
        $thousand=$this->input->post('thousand');
		$five_hundred_cash_edi=$this->input->post('five_hundred_cash_edi');
		$one_hundred_cash_edi=$this->input->post('one_hundred_cash_edi');
		$fifty_cash_edi=$this->input->post('fifty_cash_edi');
        $twenty_cash_edi=$this->input->post('twenty_cash_edi');
		$ten_cash_edi=$this->input->post('ten_cash_edi');
		$five_cash_edi=$this->input->post('five_cash_edi');
		$two_cash_edi=$this->input->post('two_cash_edi');
		$one_cash_edi=$this->input->post('one_cash_edi');
		$closing_cash=$this->input->post('closing_cash');
		$future_edit=$this->input->post('future_edit');
		$edinot_future_id=$this->input->post('edinot_future_id');

       $data = array(
               'opening_cashbox' => $this->input->post('opening_cash'),
			   'thousand' => $this->input->post('thousand'),
			   'five_hundred' => $this->input->post('five_hundred_cash_edi'),
			   'one_hundred' => $this->input->post('one_hundred_cash_edi'),
			   'fifty' => $this->input->post('fifty_cash_edi'),
			   'twenty' => $this->input->post('twenty_cash_edi'),
			   'ten' => $this->input->post('ten_cash_edi'),
			   'five' => $this->input->post('five_cash_edi'),
			   'two' => $this->input->post('two_cash_edi'),
			   'one' => $this->input->post('one_cash_edi'),
			   'closing_cash' => $this->input->post('closing_cash'),
			   'not_edit_future' => $future_edit
            );
      if($edinot_future_id!='on'){
      $this->db->where('cashbox_id', $cashbox_edi_key);
      $this->db->update('cashbox_info', $data);
		if($future_edit!=''){
			$data_close = array('closing_date'=>$closing_date);
			$this->db->where('cashbox_id', $cashbox_edi_key);
			$this->db->update('cashbox_info', $data_close);
		}
	  echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
	  }
	  else{
      echo json_encode(array('mssage'=>'<span style="color: red;">Data Not Edit In Future</span>'));
	  }

	  }else{
		echo 'Error 404';
	  }
      
	}
	
	function booking_check_exist(){
		if($this->input->post('booking_time')=='All Day'){
			$this->db->select('*');
			$this->db->from('restaurant_booking');
			$this->db->where('booking_place',$this->input->post('booking_place'));
			$this->db->where('booking_date',$this->input->post('booking_date'));
			$query = $this->db->get();
		}
		else{
		$this->db->select('*');
		$this->db->from('restaurant_booking');
		$this->db->where('booking_place',$this->input->post('booking_place'));
		$this->db->where('booking_date',$this->input->post('booking_date'));
		$this->db->where('booking_time',$this->input->post('booking_time'));
		}
		$query = $this->db->get();
		if($query->num_rows()>0){
			echo json_encode(array('mssage'=>'1'));
		}
		else{
			echo json_encode(array('mssage'=>'0'));
		}
	}
	
	function booking_save(){
		
		$this->load->model('dbm_model');
		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$personName = $this->input->post('personName');
			$total_amnt = $this->input->post('total_amount');
			$advnc_amnt = $this->input->post('advance_amount');
			
			if($advnc_amnt>=$total_amnt){
				$transaction_status = 1;
			}
			else{
				$transaction_status = 0;
			}
				if($this->input->post('booking_time') == 'Full Day'){
					$this->db->select('*');
					$this->db->from('restaurant_booking');
					$this->db->where('booking_place',$this->input->post('booking_place'));
					$this->db->where('booking_date',$this->input->post('booking_date'));
					$query = $this->db->get();
				}
				else{
					$this->db->select('*');
					$this->db->from('restaurant_booking');
					$this->db->where('booking_place',$this->input->post('booking_place'));
					$this->db->where('booking_date',$this->input->post('booking_date'));
					$this->db->where('booking_time',$this->input->post('booking_time'));
					$query = $this->db->get();
				}
				if($query->num_rows()>0){
					echo json_encode(array('mssage'=>'0'));
				}
			else{
			$this->load->model('booking_setup');
			$booking_setup = new Booking_Setup();
			$booking_setup->person_name = $personName;
			$booking_setup->contact_number = $this->input->post('contact_number');
			$booking_setup->address = $this->input->post('address');
			$booking_setup->booking_place = $this->input->post('booking_place');
			$booking_setup->total_person = $this->input->post('total_person');
			$booking_setup->per_person_amount = $this->input->post('plate_per_person');
			$booking_setup->total_amount_main = $this->input->post('total_amount_main');
			$booking_setup->total_money = $this->input->post('total_amount');
			$booking_setup->service_charge = $this->input->post('service_charge');
			$booking_setup->total_paid = $this->input->post('advance_amount');
			$booking_setup->advance = $this->input->post('advance_amount');
			$booking_setup->hall_rent = $this->input->post('hall_rent');
			$booking_setup->discount_amount = $this->input->post('discount_amount');
			$booking_setup->due = $this->input->post('due_amount');
			$booking_setup->booking_date = $this->input->post('booking_date');
			$booking_setup->programme_name = $this->input->post('programme_name');
			$booking_setup->booking_time = $this->input->post('booking_time');
			$booking_setup->comment = $this->input->post('comment');
			$booking_setup->creator = $this->tank_auth->get_user_id();
			$booking_setup->transaction_status = $transaction_status;
			$booking_id = $booking_setup->save();
			
			$booking_data = array('booking_id'=>$booking_id);
			$this->db->where('booking_id',0);
			$this->db->update('restaurant_booking_menu',$booking_data);
			if($advnc_amnt > 0){
				$this->dbm_model->transaction_entry('in',$advnc_amnt,$bd_date,'Party','restaurant_booking',$booking_id);
				//$this->dbm_model->update_cashbox_in_transaction($advnc_amnt,1);
				
				$advances_data = array('advance_date'=>$bd_date);
				$this->db->where('res_booking_id',$booking_id);
				$this->db->update('restaurant_booking',$advances_data);
			}
			echo json_encode(array('mssage'=>'1'));
			}
		}else{
			echo 'Error 404';
		}
	}
	function booking_item_menu_save(){
		
		$this->load->model('dbm_model');
		$bd_date = date('Y-m-d');
		$this->db->where('booking_id',0);
		$this->db->delete('restaurant_booking_menu');
		if($this->input->post()){
		if($this->input->post('booking_id')==''){
		

			$this->load->model('booking_menu_setup');
			$booking_menu_setup = new Booking_Menu_Setup();
			$booking_menu_setup->item1 = $this->input->post('item1');
			$booking_menu_setup->item2 = $this->input->post('item2');
			$booking_menu_setup->item3 = $this->input->post('item3');
			$booking_menu_setup->item4 = $this->input->post('item4');
			$booking_menu_setup->item5 = $this->input->post('item5');
			$booking_menu_setup->item6 = $this->input->post('item6');
			$booking_menu_setup->item7 = $this->input->post('item7');
			$booking_menu_setup->item8 = $this->input->post('item8');
			$booking_menu_setup->item9 = $this->input->post('item9');
			$booking_menu_setup->item10 = $this->input->post('item10');
			$booking_menu_setup->item11 = $this->input->post('item11');
			$booking_menu_setup->item12 = $this->input->post('item12');
			$booking_menu_setup->booking_id = 0;
			$booking_menu_setup->save();
			}
		else{
			$this->db->where('booking_id',$this->input->post('booking_id'));
			$quuery = $this->db->get('restaurant_booking_menu');
			if($quuery->num_rows() > 0){
			$up_data = array('item1' => $this->input->post('item1'),
							 'item2' => $this->input->post('item2'),
							 'item3' => $this->input->post('item3'),
							 'item4' => $this->input->post('item4'),
							 'item5' => $this->input->post('item5'),
							 'item6' => $this->input->post('item6'),
							 'item7' => $this->input->post('item7'),
							 'item8' => $this->input->post('item8'),
							 'item9' => $this->input->post('item9'),
							 'item10' => $this->input->post('item10'),
							 'item11' => $this->input->post('item11'),
							 'item12' => $this->input->post('item12'));
			$this->db->where('booking_id',$this->input->post('booking_id'));
			$this->db->update('restaurant_booking_menu',$up_data);
			}
			else{
			$this->load->model('booking_menu_setup');
			$booking_menu_setup = new Booking_Menu_Setup();
			$booking_menu_setup->item1 = $this->input->post('item1');
			$booking_menu_setup->item2 = $this->input->post('item2');
			$booking_menu_setup->item3 = $this->input->post('item3');
			$booking_menu_setup->item4 = $this->input->post('item4');
			$booking_menu_setup->item5 = $this->input->post('item5');
			$booking_menu_setup->item6 = $this->input->post('item6');
			$booking_menu_setup->item7 = $this->input->post('item7');
			$booking_menu_setup->item8 = $this->input->post('item8');
			$booking_menu_setup->item9 = $this->input->post('item9');
			$booking_menu_setup->item10 = $this->input->post('item10');
			$booking_menu_setup->item11 = $this->input->post('item11');
			$booking_menu_setup->item12 = $this->input->post('item12');
			$booking_menu_setup->booking_id = $this->input->post('booking_id');
			$booking_menu_setup->save();
			}
		}
			echo json_encode(array('mssage'=>'1'));
		}else{
			echo 'Error 404';
		}
	}
	
	function booking_other_menu_save(){
		
		$this->load->model('dbm_model');
		$bd_date = date('Y-m-d');
		$this->db->where('booking_id',0);
		$this->db->delete('restaurant_booking_other');
		if($this->input->post()){
		if($this->input->post('booking_id')==''){
			$this->load->model('booking_other_setup');
			$booking_other_setup = new Booking_Other_Setup();
			$booking_other_setup->other1 = $this->input->post('item1');
			$booking_other_setup->other2 = $this->input->post('item2');
			$booking_other_setup->other3 = $this->input->post('item3');
			$booking_other_setup->other4 = $this->input->post('item4');
			$booking_other_setup->other5 = $this->input->post('item5');
			$booking_other_setup->other6 = $this->input->post('item6');
			$booking_other_setup->other7 = $this->input->post('item7');
			$booking_other_setup->other8 = $this->input->post('item8');
			$booking_other_setup->other9 = $this->input->post('item9');
			$booking_other_setup->other10 = $this->input->post('item10');
			$booking_other_setup->other11 = $this->input->post('item11');
			$booking_other_setup->other12 = $this->input->post('item12');
			$booking_other_setup->booking_id = 0;
			$booking_other_setup->save();
			}
		else{
			$this->db->where('booking_id',$this->input->post('booking_id'));
			$quuery = $this->db->get('restaurant_booking_other');
			if($quuery->num_rows() > 0){
			$up_data = array('other1' => $this->input->post('item1'),
							 'other2' => $this->input->post('item2'),
							 'other3' => $this->input->post('item3'),
							 'other4' => $this->input->post('item4'),
							 'other5' => $this->input->post('item5'),
							 'other6' => $this->input->post('item6'),
							 'other7' => $this->input->post('item7'),
							 'other8' => $this->input->post('item8'),
							 'other9' => $this->input->post('item9'),
							 'other10' => $this->input->post('item10'),
							 'other11' => $this->input->post('item11'),
							 'other12' => $this->input->post('item12'));
			$this->db->where('booking_id',$this->input->post('booking_id'));
			$this->db->update('restaurant_booking_other',$up_data);
			}
			else{
			$this->load->model('booking_other_setup');
			$booking_other_setup = new Booking_Other_Setup();
			$booking_other_setup->other1 = $this->input->post('item1');
			$booking_other_setup->other2 = $this->input->post('item2');
			$booking_other_setup->other3 = $this->input->post('item3');
			$booking_other_setup->other4 = $this->input->post('item4');
			$booking_other_setup->other5 = $this->input->post('item5');
			$booking_other_setup->other6 = $this->input->post('item6');
			$booking_other_setup->other7 = $this->input->post('item7');
			$booking_other_setup->other8 = $this->input->post('item8');
			$booking_other_setup->other9 = $this->input->post('item9');
			$booking_other_setup->other10 = $this->input->post('item10');
			$booking_other_setup->other11 = $this->input->post('item11');
			$booking_other_setup->other12 = $this->input->post('item12');
			$booking_other_setup->booking_id = $this->input->post('booking_id');
			$booking_other_setup->save();
			}
		}
			echo json_encode(array('mssage'=>'1'));
		}else{
			echo 'Error 404';
		}
	}
	
	function booking_show(){
            $json_response = array();
            $this->load->model('booking_setup');
			$this->load->model('dbm_model');
            $booking_setup = $this->booking_setup->get(100,0,'booking_date');
            foreach ($booking_setup as $row){
                
                $row_array['res_booking_id'] = $row->res_booking_id;
				$row_array['person_name'] = $row->person_name;
                $row_array['contact_number'] = $row->contact_number;
				$row_array['address'] = $row->address;
				$row_array['booking_place'] = $row->booking_place;
				$row_array['total_person'] = $row->total_person;
				$row_array['per_person_amount'] = $row->per_person_amount;
				$row_array['total_money'] = $row->total_money;
				$row_array['service_charge'] = $row->service_charge;
                $row_array['advance'] = $row->advance;
				$row_array['total_paid'] = $row->total_paid;
				$row_array['due'] = $row->due;
				$row_array['hall_rent'] = $row->hall_rent;
				$row_array['total_amount_main'] = $row->total_amount_main;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['comment'] = $row->comment;
				$row_array['booking_date'] = $row->booking_date;
				$row_array['programme_name'] = $row->programme_name;
				$row_array['booking_time'] = $row->booking_time;
				$row_array['creator'] = $this->dbm_model->other_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				$row_array['transaction_status'] = $row->transaction_status;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
	function show_booking_item_menu_link(){
            $json_response = array();
			$edi_key = $this->input->post('edi_key');
            $this->db->from('restaurant_booking_menu');
			$this->db->where('restaurant_booking_menu.booking_id',$edi_key);
			$query = $this->db->get();
			$row = $query->row_array();
				echo json_encode($row);
	}
	function show_booking_other_menu_link(){
            $json_response = array();
			$edi_key = $this->input->post('edi_key');
            $this->db->from('restaurant_booking_other');
			$this->db->where('restaurant_booking_other.booking_id',$edi_key);
			$query = $this->db->get();
			$row = $query->row_array();
				echo json_encode($row);
	}
	function specific_booking_log_shoing(){
            $json_response = array();
            //$this->load->model('booking_setup');
			$this->load->model('dbm_model');
            $booking_setup = $this->dbm_model->specific_booking_log_shoing();
            foreach ($booking_setup->result() as $row){
                
                $row_array['res_booking_id'] = $row->res_booking_id;
				$row_array['person_name'] = $row->person_name;
                $row_array['contact_number'] = $row->contact_number;
				$row_array['address'] = $row->address;
				$row_array['booking_place'] = $row->booking_place;
				$row_array['total_person'] = $row->total_person;
				$row_array['per_person_amount'] = $row->per_person_amount;
				$row_array['total_money'] = $row->total_money;
				$row_array['service_charge'] = $row->service_charge;
                $row_array['advance'] = $row->advance;
				$row_array['total_paid'] = $row->total_paid;
				$row_array['due'] = $row->due;
				$row_array['hall_rent'] = $row->hall_rent;
				$row_array['total_amount_main'] = $row->total_amount_main;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['comment'] = $row->comment;
				$row_array['booking_date'] = $row->booking_date;
				$row_array['programme_name'] = $row->programme_name;
				$row_array['booking_time'] = $row->booking_time;
				$row_array['creator'] = $this->dbm_model->other_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				$row_array['transaction_status'] = $row->transaction_status;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
   	function booking_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('booking_setup');
			$booking_setup = new Booking_Setup();
			$booking_setup->load($edi_key);
			$data['booking_setup'] = $booking_setup;
			echo json_encode($booking_setup);
		}else{
			echo 'Error 404';
		}
	}
	function booking_edit(){
		
		$this->load->model('dbm_model');
		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$ad_data = '';
			$personName = $this->input->post('personName');
			$total_amnt = $this->input->post('total_amount');
			$service_charge = $this->input->post('service_charge');
			$advnc_amnt = $this->input->post('advance_amount');
			
			if($this->input->post('paid_amount')>=($total_amnt+$service_charge)){
				$transaction_status = 1;
			}
			else{
				$transaction_status = 0;
			}
				$this->db->select('*');
				$this->db->from('restaurant_booking');
				$this->db->where('booking_place',$this->input->post('booking_place'));
				$this->db->where('booking_date',$this->input->post('booking_date'));
				$this->db->where('booking_time',$this->input->post('booking_time'));
				$this->db->where('res_booking_id'.!$this->input->post('edi_key'));
				$query = $this->db->get();
				if($query->num_rows()>0){
					echo json_encode(array('mssage'=>'0'));
				}
			else{
			$this->db->select('*');
			$this->db->from('restaurant_booking');
			$this->db->where('res_booking_id',$this->input->post('edi_key'));
			$que = $this->db->get();
			$roow = $que->row_array();
			if($roow['advance'] == 0 && $this->input->post('advance_amount')!= 0){
				$ad_data = 1;
			}
			
			$datas = array(
			'person_name' => $personName,
			'contact_number' => $this->input->post('contact_number'),
			'address' => $this->input->post('address'),
			'booking_place' => $this->input->post('booking_place'),
			'total_person' => $this->input->post('total_person'),
			'per_person_amount' => $this->input->post('plate_per_person'),
			'total_money' => $this->input->post('total_amount'),
			'total_amount_main' => $this->input->post('total_amount_main'),
			'service_charge' => $this->input->post('service_charge'),
			'total_paid' => $this->input->post('paid_amount'),
			'advance' => $this->input->post('advance_amount'),
			'due' => $this->input->post('due_amount'),
			'booking_date' => $this->input->post('booking_date'),
			'programme_name' => $this->input->post('programme_name'),
			'booking_time' => $this->input->post('booking_time'),
			'comment' => $this->input->post('comment'),
			'creator' => $this->tank_auth->get_user_id(),
			'transaction_status' => $transaction_status
			);
			$this->db->where('res_booking_id',$this->input->post('edi_key'));
			$this->db->update('restaurant_booking',$datas);
			
			if($ad_data != ''){
				$advaa = array('advance_date' => $bd_date);
				$this->db->where('res_booking_id',$this->input->post('edi_key'));
				$this->db->update('restaurant_booking',$advaa);
			}
			if(($this->input->post('paid_amount'))!= $roow['total_paid']){
				
				
				
				$this->db->select('*');
				$this->db->from('restaurant_transaction');
				$this->db->where('purpose', 'Party');
				$this->db->where('table_ref_name', 'restaurant_booking');
				$this->db->where('table_ref_id', $this->input->post('edi_key'));
				$quer = $this->db->get();
				$rroo = $quer -> row_array();
				if($quer->num_rows() == 1){
					$this->dbm_model->update_transaction_cashbox_when_update_transaction($this->input->post('paid_amount'),'Party','restaurant_booking',$this->input->post('edi_key'),'in');
				}
				else if($quer->num_rows() == 2){
								$amount2 = $this->input->post('paid_amount') - $roow['advance'];
								$up_data = array('transaction_amount' => $amount2);
								//$this->db->select('restaurant_transaction.*');
								$this->db->select_max('restaurant_transaction.transaction_id');
								$this->db->from('restaurant_transaction');
								$this->db->where('purpose', 'Party');
								$this->db->where('table_ref_name','restaurant_booking');
								$this->db->where('table_ref_id', $this->input->post('edi_key'));
								$max_id = $this->db->get();
								$max_id = $max_id->row_array();
								
								$this->db->where('transaction_id',$max_id['transaction_id']);
								$last_amount = $this->db->get('restaurant_transaction');
								$last_amount = $last_amount->row_array();
								
								$this->db->where('transaction_id',$max_id['transaction_id']);
								$this->db->update('restaurant_transaction',$up_data);
								//$this->dbm_model->update_cashbox_in_transaction($last_amount['transaction_amount'],0);
								//$this->dbm_model->update_cashbox_in_transaction($amount2,1);
				}
				else if($quer->num_rows() > 2){
						$this->db->select_sum('restaurant_transaction.transaction_amount');
						$this->db->from('restaurant_transaction');
						$this->db->where('purpose', 'Party');
						$this->db->where('table_ref_name','restaurant_booking');
						$this->db->where('table_ref_id', $this->input->post('edi_key'));
						$sum_amount = $this->db->get();
						$sum_amount = $sum_amount->row_array();
						
						$this->db->select_max('restaurant_transaction.transaction_id');
						$this->db->from('restaurant_transaction');
						$this->db->where('purpose', 'Party');
						$this->db->where('table_ref_name','restaurant_booking');
						$this->db->where('table_ref_id', $this->input->post('edi_key'));
						$max_id = $this->db->get();
						$max_id = $max_id->row_array();
						
						$this->db->where('transaction_id', $max_id['transaction_id']);
						$last_paid = $this->db->get('restaurant_transaction');
						$last_paid = $last_paid->row_array();
						
							$amount2 = $this->input->post('paid_amount') - ($sum_amount['transaction_amount']-$last_paid['transaction_amount']);
							$up_data = array('transaction_amount' => $amount2);
						
							$this->db->where('transaction_id',$max_id['transaction_id']);
							$this->db->update('restaurant_transaction',$up_data);
							//$this->dbm_model->update_cashbox_in_transaction($last_paid['transaction_amount'],0);
							//$this->dbm_model->update_cashbox_in_transaction($amount2,1);
				}
			}
			echo json_encode(array('mssage'=>'1'));
			}
		}else{
			echo 'Error 404';
		}
	}
	function show_all_clients_due_list(){
            $json_response = array();
            //$this->load->model('booking_setup');
			$this->load->model('dbm_model');
            $due_order_info = $this->dbm_model->show_all_clients_due_list();
 
            foreach ($due_order_info->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);

                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
	function show_all_client_order_due(){
            $json_response = array();
            //$this->load->model('booking_setup');
			$this->load->model('dbm_model');
            $due_order_info = $this->dbm_model->show_all_clients_due_individually();
 
            foreach ($due_order_info->result() as $row){
                
                //$row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);

                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
   }
	function show_specific_order_due(){
            $json_response = array();
			$order_id = $this->input->post('order_id');
			$this->load->model('dbm_model');
			
            $due_order_info = $this->dbm_model->show_specific_clients_due_list($order_id);
			//$row = $due_order_info->result();
            foreach ($due_order_info->result() as $row){
                
                $row_array['order_id'] = $row->order_id;
				$row_array['client_id'] = $row->client_id;
                $row_array['client_name'] = $row->client_name;
				$row_array['contact_number'] = $row->contact_number;
				$row_array['total_amount'] = $row->total_amount;
				$row_array['discount_amount'] = $row->discount_amount;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);

                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
	function show_specific_stuff_month_due(){
            $json_response = array();
			$stuff_id = $this->input->post('stuff_id');
			$month_id = $this->input->post('month_id');
			$this->load->model('dbm_model');
			
            $due_stuff_info = $this->dbm_model->show_specific_stuff_due_list($stuff_id,$month_id);
			//$row = $due_order_info->result();
            foreach ($due_stuff_info->result() as $row){
                
                //$row_array['order_id'] = $row->order_id;
				$row_array['stuff_id'] = $row->stuff_id;
                $row_array['stuff_name'] = $row->stuff_name;
				$row_array['contact'] = $row->contact;
				$row_array['resignation'] = $row->resignation;
				$row_array['address'] = $row->address;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['paid_amount'] = $row->paid_amount;
/* 				$row_array['service_charge'] = $row->service_charge;
				$row_array['paid_amount'] = $row->paid_amount;
				$row_array['grand_total'] = $row->grand_total;
				$row_array['running'] = $row->running;
                $row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator); */

                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
	function show_all_party_due_list(){
            $json_response = array();
            //$this->load->model('booking_setup');
			$this->load->model('dbm_model');
            $party_due_list = $this->dbm_model->show_all_party_due_list();
            foreach ($party_due_list->result() as $row){
                
                $row_array['res_booking_id'] = $row->res_booking_id;
				$row_array['person_name'] = $row->person_name;
                $row_array['contact_number'] = $row->contact_number;
				$row_array['address'] = $row->address;
				$row_array['booking_place'] = $row->booking_place;
				$row_array['total_person'] = $row->total_person;
				$row_array['per_person_amount'] = $row->per_person_amount;
				$row_array['total_money'] = $row->total_money;
				$row_array['service_charge'] = $row->service_charge;
				$row_array['total_paid'] = $row->total_paid;
                $row_array['advance'] = $row->advance;
				$row_array['due'] = $row->due;
				$row_array['booking_date'] = $row->booking_date;
				$row_array['booking_time'] = $row->booking_time;
				$row_array['creator'] = $this->dbm_model->other_show('username','users','id',$row->creator);
				$row_array['DOC'] = $row->DOC;
				$row_array['DOM'] = $row->DOM;
				$row_array['transaction_status'] = $row->transaction_status;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);

   }
	function show_specific_party(){
		if($this->input->post()){
			$booking_id=$this->input->post('booking_id');
			$data = array();
			if($booking_id!="")
			$this->load->model('booking_setup');
			$booking_setup = new Booking_Setup();
			$booking_setup->load($booking_id);
			$data['booking_setup'] = $booking_setup;
			echo json_encode($booking_setup);
	  }else{
		echo 'Error 404';
	  }
	}
	
	function cancel_reason_show(){
            $json_response = array();
			$this->load->model('dbm_model');
            $this->load->model('cancel_reason_setup');
            $cancel_reason_setup = $this->cancel_reason_setup->get(100,0,'doc');
            foreach ($cancel_reason_setup as $row){
                
                $row_array['reason_id'] = $row->reason_id;
                $row_array['cancel_reason'] = $row->cancel_reason;
                $row_array['doc'] = $row->doc;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
         
   }
   
	function all_users_show(){
            $json_response = array();
			$this->db->from('users');
            $all_users = $this->db->get();
            foreach ($all_users->result() as $row){
                
                $row_array['userid'] = $row->id;
                $row_array['username'] = $row->username;
                //$row_array['doc'] = $row->doc;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	
	function all_waiters_show(){
			$this->db->select('stuff_name AS username,stuff_id AS userid');
			$this->db->where('resignation','Waiter');
			$this->db->from('stuff_info');
            $all_stuffs = $this->db->get();
			$result = $all_stuffs->result();
           echo json_encode($result);
	}
	
	function specific_users_details(){
            $json_response = array();
			$this->db->where('id',$this->input->post('edi_key'));
			$this->db->from('users');
            $all_users = $this->db->get();
			$row = $all_users->row();

                $row_array['userid'] = $row->id;
                $row_array['username'] = $row->username;
				$row_array['user_full_name'] = $row->user_full_name;
				$row_array['email'] = $row->email;
                //$row_array['doc'] = $row->doc;
				//print_r($row_array);
               // array_push($json_response,$row_array);

           echo json_encode($row_array);
         
   }
   
   	function login_for_pos_terminal()
	{

			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('login'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->login_for_pos_terminal(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email'])) {								// success
				echo json_encode(array('mssage'=>1));
				  }
				  else{
				  echo json_encode(array('mssage'=>0));
				  }
			}
			$data['show_captcha'] = FALSE;
			//$data['try'] = $login;
			//if($this -> input -> post('password')) $data['try'] = "gotohell";
			//$this->load->view('auth/login_form', $data);
	}
	
	function open_sale_order_info_show(){
	
		$json_response = array();
	 
			//$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$this->db->from('order_info');
			$this->db->where('running = "running"');
			$order_info =$this->db->get();
			//$order_info = $this->dbm_model->other_all_show('order_info','table_id',$show_key,'running','running');

            foreach ($order_info->result() as $row) {
                $row_array['order_id'] = $row->order_id;
                $row_array['client_id'] = $row->client_id;
				$row_array['client_name'] = $row->client_name;
                $row_array['table_id'] = $row->table_id;
				$row_array['table_number'] = $this->dbm_model->exception_show('table_number','table_info','table_id',$row->table_id);
				$row_array['guest_quantity'] = $row->guest_quantity;
				$row_array['comments'] = $row->comments;
				$row_array['status'] = $row->status;
				$row_array['running'] = $row->running;
				$row_array['room_number'] = $row->room_number;
				$row_array['order_type'] = $row->order_type;
				$row_array['order_place'] = $row->order_place;
				$row_array['creator'] = $row->creator;
				$row_array['waiter'] = $row->waiter;
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	
	function usage_resource_save(){

		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$product_id = $this->input->post('product_id');
			$category = $this->input->post('category');
			$amount = $this->input->post('amount');
			$use_description = $this->input->post('use_description');
			
			$this->load->model('use_resource_setup');
			$use_resource_setup = new Use_Resource_Setup();
			$use_resource_setup->product_id=$product_id;
			$use_resource_setup->category=$category;
			$use_resource_setup->amount=$amount;
			$use_resource_setup->description=$use_description;
			$use_resource_setup->doc=$bd_date;
			$use_resource_setup->creator=$this->tank_auth->get_user_id();
			$use_resource_setup->save();
			
			$sql = "update product_info set stock_amount = stock_amount - ".$amount." where product_id = ".$product_id;
							$que=$this->db->query($sql);
			
			//print_r($expense_setup);
			echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
		}
		
	function usage_resource_show(){
	
		$json_response = array();
	 
			//$show_key=$this->input->post('show_key');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$this->db->select('usage_resource_info.*,product_category.category_name,product_info.product_name');
			$this->db->from('usage_resource_info,product_category,product_info');
			$this->db->where('usage_resource_info.product_id = product_info.product_id');
			$this->db->where('usage_resource_info.category = product_category.category_id');
			$this->db->order_by('usage_resource_info.dom','desc');
			$this->db->limit(150);
			$usage_info =$this->db->get();
			//$order_info = $this->dbm_model->other_all_show('order_info','table_id',$show_key,'running','running');

            foreach ($usage_info->result() as $row) {
                $row_array['product_name'] = $row->product_name;
                $row_array['category_name'] = $row->category_name;
				$row_array['amount'] = $row->amount;
                $row_array['description'] = $row->description;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	
	function specific_use_resource_shoing(){
	
		$json_response = array();
	 
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			//if($show_key!="")
			$this->load->model('dbm_model');
			$this->db->select('usage_resource_info.*,product_category.category_name,product_info.product_name');
			$this->db->from('usage_resource_info,product_category,product_info');
			$this->db->where('usage_resource_info.product_id = product_info.product_id');
			$this->db->where('usage_resource_info.category = product_category.category_id');
					if($start_date!=''){
						$this->db-> where('usage_resource_info.doc >= "'.$start_date.'"');
					}
					if($end_date!=''){
						$this->db-> where('usage_resource_info.doc <= "'.$end_date.'"');
					}
					elseif($start_date!=''){
						$this->db-> where('usage_resource_info.doc <= "'.$start_date.'"');
					}
			
			$usage_info =$this->db->get();
			//$order_info = $this->dbm_model->other_all_show('order_info','table_id',$show_key,'running','running');

            foreach ($usage_info->result() as $row) {
                $row_array['product_name'] = $row->product_name;
                $row_array['category_name'] = $row->category_name;
				$row_array['amount'] = $row->amount;
                $row_array['description'] = $row->description;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				$row_array['doc'] = $row->doc;
				$row_array['dom'] = $row->dom;
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	function unit_name_save(){

		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$unitName = $this->input->post('unitName');
			
			$this->load->model('unit_setup');
			$unit_setup = new Unit_Setup();
			$unit_setup->unitName=$unitName;
			$unit_setup->doc=$bd_date;
			$unit_setup->creator=$this->tank_auth->get_user_id();
			$unit_setup->save();

			//print_r($expense_setup);
			echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
		}
	function unit_name_show(){
            $json_response = array();
			$this->load->model('dbm_model');
            $this->load->model('unit_setup');
            $unit_setup = $this->unit_setup->get();
            foreach ($unit_setup as $row){
                
                $row_array['unit_name_id'] = $row->	unit_name_id;
                $row_array['unitName'] = $row->unitName;
                $row_array['doc'] = $row->doc;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
         
   }
	function salary_entry_save(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_entry_save'))
		{
			$this->load->model('dbm_model');
			$bd_date = date('Y-m-d');
			if($this->input->post()){
			$salary_amount = 0;
			$fine_amount = 0;
			$extra_amount = 0;
				$employeeName = $this->input->post('employeeName');
				$salary_amount = $this->input->post('salary_amount');
				$extra_amount = $this->input->post('extra_amount');
				$fine_amount = $this->input->post('fine_amount');
				$salary_month = $this->input->post('salary_month');
				$sal_month = explode('-',$salary_month);
				
				$salary_final = ($salary_amount+$extra_amount) - $fine_amount;
				
				$account_table_ref_id = $this->dbm_model->accounts_in_out(3,0,$salary_final);
				
				$this->load->model('salary_setup');
				$salary_setup = new Salary_Setup();
				$salary_setup-> user_id=$employeeName;
				$salary_setup-> salary_amount=$salary_amount;
				$salary_setup->	extra_payment=$extra_amount;
				$salary_setup-> reduced_amount=$fine_amount;
				$salary_setup->	salary_month=$sal_month[1];
				$salary_setup->	salary_year=$sal_month[0];
				$salary_setup-> mode='Salary';
				$salary_setup-> account_table_ref_id = $account_table_ref_id;
				$salary_setup-> salary_doc=$bd_date;
				$salary_setup-> salary_status=1;
				$salary_setup-> salary_creator=$this->tank_auth->get_user_id();
				$salary_id = $salary_setup-> save();
				if($salary_final > 0){
				$this->dbm_model->transaction_entry('out',$salary_final,$bd_date,'Salary Expense','employee_salary_log',$salary_id);
				$this->dbm_model->update_cashbox_in_transaction($salary_final,0);
				}
				echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Save</span>'));
			}else{
				echo 'Error 404';
			}
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
		}
	function salary_show(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_show'))
		{
            $json_response = array();
			$this->load->model('dbm_model');
            $this->load->model('salary_setup');
            $salary_setup = $this->salary_setup->get(100,0,'salary_doc');
            foreach ($salary_setup as $row){
                
                $row_array['salary_log_id'] = $row->salary_log_id;
				$row_array['salary_amount'] = $row->salary_amount;
				$row_array['extra_payment'] = $row->extra_payment;
				$row_array['reduced_amount'] = $row->reduced_amount;
				$row_array['salary_month'] = $row->salary_month;
				$row_array['salary_year'] = $row->salary_year;
                $row_array['user_id'] = $this->dbm_model->exception_show('username','users','id',$row->user_id);
                $row_array['salary_doc'] = $row->salary_doc;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->salary_creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
		}
	function salary_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('salary_setup');
			$salary_setup = new Salary_Setup();
			$salary_setup->load($edi_key);
			$data['salary_setup'] = $salary_setup;
			echo json_encode($salary_setup);
		}else{
			echo 'Error 404';
		}
	}
	function salary_edit(){
	$data['user_type'] = $this -> tank_auth -> get_usertype();
	if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_edit'))
	{
      if($this->input->post()){
	  		
			$salary_amount = $this->input->post('salary_amount');
			$extra_amount = $this->input->post('extra_amount');
			$fine_amount = $this->input->post('fine_amount');
			
			$salary_final = ($salary_amount+$extra_amount) - $fine_amount;
	  
        $salary_edit_keys=$this->input->post('salary_edit_keys');
		$salary_month = $this->input->post('salary_month');
		$account_table_ref_id = $this->input->post('account_table_ref_id');
		
		$sal_month = explode('-',$salary_month);
        $data = array(
               'user_id' => $this->input->post('employeeName'),
			   'salary_amount' => $this->input->post('salary_amount'),
			   'extra_payment' => $this->input->post('extra_amount'),
			   'reduced_amount' => $this->input->post('fine_amount'),
			   'salary_month' => $sal_month[1],
			   'salary_year' => $sal_month[0]
            );
      $this->db->where('salary_log_id', $salary_edit_keys);
      $this->db->update('employee_salary_log', $data);
	  
	  $data2 = array('amount'=>$salary_final);
	  
	  $this->dbm_model->update_transaction_cashbox_when_update_transaction($salary_final,'Salary Expense','employee_salary_log',$salary_edit_keys,'out');
	  
	  /* $this->db->where('ref', $account_table_ref_id);
      $this->db->update('account_table', $data2); */
	  
	  echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
	  }else{
		echo 'Error 404';
		  }
	}
	else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
	}
	function specific_salary_log_shoing(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'specific_salary_log_shoing'))
		{
		$json_response = array();
	 
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			$this->load->model('dbm_model');
			$this->db->select('employee_salary_log.*');
			$this->db->from('employee_salary_log');
					if($this->input->post('username')!=''){
						$this->db-> where('employee_salary_log.salary_creator = "'.$this->input->post('username').'"');
					}
					if($start_date!=''){
						$this->db-> where('employee_salary_log.salary_doc >= "'.$start_date.'"');
					}
					if($end_date!=''){
						$end_date = $end_date." 24:59:59";
						$this->db-> where('employee_salary_log.salary_doc <= "'.$end_date.'"');
					}
					elseif($start_date!=''){
						$start_date = $start_date." 24:59:59";
						$this->db-> where('employee_salary_log.salary_doc <= "'.$start_date.'"');
					}
			
			$usage_info =$this->db->get();
			//$order_info = $this->dbm_model->other_all_show('order_info','table_id',$show_key,'running','running');

            foreach ($usage_info->result() as $row) {
                $row_array['salary_log_id'] = $row->salary_log_id;
				$row_array['salary_amount'] = $row->salary_amount;
				$row_array['extra_payment'] = $row->extra_payment;
				$row_array['reduced_amount'] = $row->reduced_amount;
				$row_array['salary_month'] = $row->salary_month;
				$row_array['salary_year'] = $row->salary_year;
                $row_array['user_id'] = $this->dbm_model->exception_show('username','users','id',$row->user_id);
                $row_array['salary_doc'] = $row->salary_doc;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->salary_creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
	}
	function salary_delete(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_delete'))
		{
		if($this->input->post()){
		$del_key=$this->input->post('del_key');
		if($del_key!="")

			$this->db->where('purpose', 'Salary Expense');
			$this->db->where('table_ref_name', 'employee_salary_log');
			$this->db->where('table_ref_id', $del_key);
			$exp_amount = $this->db->get('restaurant_transaction');
			$exp_amount = $exp_amount->row_array();
			
			$this->db->where('purpose', 'Salary Expense');
			$this->db->where('table_ref_name', 'employee_salary_log');
			$this->db->where('table_ref_id', $del_key);
			$this->db->delete('restaurant_transaction');
			
			$this->dbm_model->update_cashbox_in_transaction($exp_amount['transaction_amount'],1);

		
		$this->db->where('salary_log_id', $del_key);
		$this->db->delete('employee_salary_log');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
		}
	function cash_box_delete(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();
		if($this -> access_control_model -> my_access($data['user_type'], 'site_controller', 'salary_delete'))
		{
		if($this->input->post()){
		$del_key=$this->input->post('del_key');
		if($del_key!="")
		$this->db->where('cashbox_id', $del_key);
		$this->db->delete('cashbox_info');
	
		   echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Deleted.</span>'));
		}else{
			echo 'Error 404';
		}
		}
		else{
		echo json_encode(array('mssage'=>'<span style="color: red;">You Have No Permission To Access This Function :-</span>'));
		}
		}
	function catering_entry_save(){

		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$item_name = $this->input->post('item_name');
			$store_name = $this->input->post('store_name');
			$check_exist = $this->dbm_model->check_already_exist('catering_info','item_name',$item_name,'store_name',$store_name);
			if($check_exist){
			echo json_encode(array('mssage'=>'<span style="color: red;">Item Already Exist.</span>'));
			}
			else{
			$this->load->model('catering_setup');
			$catering_setup = new Catering_Setup();
			$catering_setup->item_name=$item_name;
			$catering_setup->stock_amount=$this->input->post('stock_amount');
			$catering_setup->store_name=$this->input->post('store_name');
			$catering_setup->unit_buy_price=$this->input->post('unit_buy_price');
			$catering_setup->current_use_amount=$this->input->post('current_use_amount');
			$catering_setup->damage_lost=0;
			$catering_setup->creator=$this->tank_auth->get_user_id();
			$item_id = $catering_setup->save();
			
			$this->load->model('catering_log_setup');
			$catering_log_setup = new Catering_Log_Setup();
			$catering_log_setup->item_id = $item_id;
			$catering_log_setup->purpose = 0;
			$catering_log_setup->provider_name = $this->dbm_model->exception_show('username','users','id',$this->tank_auth->get_user_id());
			$catering_log_setup->quantity = $this->input->post('stock_amount')+$this->input->post('current_use_amount');
			$catering_log_setup->description = "N/A";
			$catering_log_setup->creator = $this->tank_auth->get_user_id();
			$catering_log_setup->save();
			
			//print_r($expense_setup);
			echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Save</span>'));
			}
		}else{
			echo 'Error 404';
		}
	}
	function catering_stock_show(){
            $json_response = array();
            $this->load->model('catering_setup');
            $catering_setup = $this->catering_setup->get();
            foreach ($catering_setup as $row){
                $row_array['catering_id'] = $row->catering_id;
				$row_array['item_name'] = $row->item_name;
				$row_array['store_name'] = $row->store_name;
				$row_array['stock_amount'] = $row->stock_amount;
				$row_array['unit_buy_price'] = $row->unit_buy_price;
				$row_array['current_use_amount'] = $row->current_use_amount;
				$row_array['damage_lost'] = $row->damage_lost;
				$row_array['catering_doc'] = $row->catering_doc;
                $row_array['catering_dom'] = $row->catering_dom;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
		}
	function catering_edit_show(){
		if($this->input->post()){
			$edi_key=$this->input->post('edi_key');
			$data = array();
			if($edi_key!="")
			$this->load->model('catering_setup');
			$catering_setup = new Catering_Setup();
			$catering_setup->load($edi_key);
			$data['catering_setup'] = $catering_setup;
			echo json_encode($catering_setup);
		}else{
			echo 'Error 404';
		}
	}
	function catering_edit(){
      if($this->input->post()){
        $edi_key=$this->input->post('edi_key');
        $item_name=$this->input->post('itemss_namess');
		$unit_buy_price=$this->input->post('unit_buy_price');
		$store_name=$this->input->post('store_name');

       $data = array(
               'item_name' =>  $item_name,
			   'unit_buy_price' =>  $unit_buy_price,
			   'store_name' =>  $store_name
            );
		$this->db->where('catering_id',$edi_key);
		$this->db->update('catering_info',$data);
	  echo json_encode(array('mssage'=>'<span style="color: green;">Data sucessfully updated</span>'));
	  }else{
		echo 'Error 404';
	  }
		  
	}
	
	function catering_item_print(){
		$data['bd_date'] = date('Y-m-d');
            $json_response = array();
				$this->db->select('catering_info.*,users.username');
				$this->db->where('users.id = catering_info.creator');
				$this->db->from('catering_info,users');
				$transaction_setup = $this->db->get();
			$data['catering_info'] = $transaction_setup->result_array();
			//print_r($data['catering_info']);
		    $this -> load -> view('print_catering_info_view',$data);
	}
	
	function item_log_save(){

		$bd_date = date('Y-m-d');
		if($this->input->post()){
			$purposes = $this->input->post('purposess');
			$quantityss = $this->input->post('quantytys');
			$item_key = $this->input->post('item_key');
			$this->load->model('catering_log_setup');
			$catering_log_setup = new Catering_Log_Setup();
			$catering_log_setup->item_id = $this->input->post('item_key');
			$catering_log_setup->purpose = $purposes;
			$catering_log_setup->provider_name = $this->input->post('personss_name');
			$catering_log_setup->quantity = $this->input->post('quantytys');
			$catering_log_setup->description = $this->input->post('descriptons');
			$catering_log_setup->creator = $this->tank_auth->get_user_id();
			$catering_log_setup->save();
			
			if($purposes == 1){
				$sql ="UPDATE catering_info SET stock_amount = stock_amount + '".$quantityss."' WHERE catering_id = '".$item_key."'";
				$this->db->query($sql);
			}
			else if($purposes == 2 || $purposes == 3){
				$sql ="UPDATE catering_info SET current_use_amount = current_use_amount - '".$quantityss."' , damage_lost = damage_lost + '".$quantityss."' WHERE catering_id = '".$item_key."'";
				$this->db->query($sql);
			}
			else if($purposes == 4){
				$sql ="UPDATE catering_info SET current_use_amount = current_use_amount + '".$quantityss."' , stock_amount = stock_amount - '".$quantityss."' WHERE catering_id = '".$item_key."'";
				$this->db->query($sql);
			}
			echo json_encode(array('mssage'=>'<span style="color: green;">Data Successfully Save</span>'));
		}else{
			echo 'Error 404';
		}
	}
	function catering_log_show(){
            $json_response = array();
            $item_key = $this->input->post('item_key');
			$this->db->select('catering_log.*,catering_info.item_name');
			$this->db->from('catering_log,catering_info');
			$this->db->where('catering_log.item_id = catering_info.catering_id');
			$this->db->where('catering_log.item_id',$item_key);
			$this->db->order_by('catering_log.doc','desc');
            $catering_setup = $this->db->get();
            foreach ($catering_setup->result() as $row){
                $row_array['catering_log_id'] = $row->catering_log_id;
				$row_array['item_name'] = $row->item_name;
				$row_array['purpose'] = $row->purpose;
				$row_array['provider_name'] = $row->provider_name;
				$row_array['quantity'] = $row->quantity;
				$row_array['description'] = $row->description;
                $row_array['doc'] = $row->doc;
				$row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
	}
	function booking_delete(){
		$data['user_type'] = $this -> tank_auth -> get_usertype();

			if($this->input->post()){
			$del_key=$this->input->post('del_key');
			if($del_key!="")
			
			$this->db->select_sum('transaction_amount');
			$this->db->from('restaurant_transaction');
			$this->db->where('purpose', 'Party');
			$this->db->where('table_ref_name', 'restaurant_booking');
			$this->db->where('table_ref_id', $del_key);
			$exp_amount = $this->db->get();
			$exp_amount = $exp_amount->row_array();
			
			$this->db->where('table_ref_name', 'restaurant_booking');
			$this->db->where('purpose', 'Party');
			$this->db->where('table_ref_id', $del_key);
			$this->db->delete('restaurant_transaction');
			
			//$this->dbm_model->update_cashbox_in_transaction($exp_amount['transaction_amount'],0);
			
			$this->db->where('booking_id', $del_key);
			$this->db->delete('restaurant_booking_menu');
			
			$this->db->where('res_booking_id', $del_key);
			$this->db->delete('restaurant_booking');
			   echo json_encode(array('mssage'=>'<span style="color: green;">Data successfully Deleted.</span>'));
			}else{
				echo 'Error 404';
			}
	}
		function transaction_show(){
			$bd_date = date('Y-m-d');
			$start_date = $bd_date.' 00:00:00';
			$end_date = $bd_date.' 23:59:59';
            $json_response = array();
				$this->db->select('*');
				$this->db->from('restaurant_transaction');
				$this->db->where('restaurant_transaction.DOC >"'.$start_date.'"');
				$this->db->where('restaurant_transaction.DOC <"'.$end_date.'"');
				$this->db->order_by('restaurant_transaction.purpose','asc');
				$this->db->order_by('restaurant_transaction.DOC','desc');
				$transaction_setup = $this->db->get();
            //$transaction_setup = $this->salary_setup->get(100,0,'salary_doc');
            foreach ($transaction_setup->result() as $row){
                
                $row_array['transaction_id'] = $row->transaction_id;
				$row_array['transaction_type'] = $row->transaction_type;
				$row_array['transaction_amount'] = $row->transaction_amount;
				$row_array['transaction_date'] = $row->transaction_date;
				$row_array['purpose'] = $row->purpose;
				$row_array['table_ref_name'] = $row->table_ref_name;
				$row_array['table_ref_id'] = $row->table_ref_id;
				$row_array['DOC'] = $row->DOC;
				if($row->purpose == 'Sale Due' || $row->purpose == 'Sale' || $row->purpose == 'Sale Return'){
					$row_array['real_date']=$this->dbm_model->exception_show('doc','order_info','order_id',$row->table_ref_id);
					$row_array['order_id']=$row->table_ref_id;
				}
				else if($row->purpose == 'Party'){
					$row_array['real_date']=$this->dbm_model->exception_show('DOC','restaurant_booking','res_booking_id',$row->table_ref_id);
					$row_array['order_id']=$row->table_ref_id;
				}
				else if($row->purpose == 'Restaurant Expense' || $row->purpose == 'Salary Expense'){
					$row_array['real_date'] = $row->transaction_date;
					$row_array['order_id'] = $row->table_ref_id;
				}
				else if($row->purpose == 'Stuff Due'){
					$row_array['real_date'] = $row->table_ref_name;
					$row_array['order_id'] = $row->table_ref_id;
				}
				else if($row->purpose == 'Sent To Account'){
					$row_array['real_date'] = $row->transaction_date;
					$row_array['order_id'] = $row->table_ref_id;
				}
				$row_array['DOM'] = $row->DOM;
                $row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
		}
		function specific_transactions_shoing(){
			//$bd_date = date('Y-m-d');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			if($end_date == ''){$end_date = $start_date.' 23:59:59';}
			else{
			$end_date = $end_date.' 23:59:59';			
			}
			$start_date = $start_date.' 00:00:00';
			
            $json_response = array();
				$this->db->select('*');
				$this->db->from('restaurant_transaction');
				$this->db->where('restaurant_transaction.DOC > "'.$start_date.'"');
				$this->db->where('restaurant_transaction.DOC < "'.$end_date.'"');
				if($this->input->post('transactio_type')!=''){$this->db->where('transaction_type',$this->input->post('transactio_type'));}
				if($this->input->post('transactio_purpose')!=''){$this->db->where('purpose',$this->input->post('transactio_purpose'));}
				$this->db->order_by('restaurant_transaction.purpose','asc');
				$this->db->order_by('restaurant_transaction.DOC','desc');
				$transaction_setup = $this->db->get();
            //$transaction_setup = $this->salary_setup->get(100,0,'salary_doc');
            foreach ($transaction_setup->result() as $row){
                
                $row_array['transaction_id'] = $row->transaction_id;
				$row_array['transaction_type'] = $row->transaction_type;
				$row_array['transaction_amount'] = $row->transaction_amount;
				$row_array['transaction_date'] = $row->transaction_date;
				$row_array['purpose'] = $row->purpose;
				$row_array['table_ref_name'] = $row->table_ref_name;
				$row_array['table_ref_id'] = $row->table_ref_id;
				$row_array['DOC'] = $row->DOC;
				if($row->purpose == 'Sale Due' || $row->purpose == 'Sale' || $row->purpose == 'Sale Return'){
					$row_array['real_date']=$this->dbm_model->exception_show('doc','order_info','order_id',$row->table_ref_id);
					$row_array['order_id']=$row->table_ref_id;
				}
				else if($row->purpose == 'Party'){
					$row_array['real_date']=$this->dbm_model->exception_show('DOC','restaurant_booking','res_booking_id',$row->table_ref_id);
					$row_array['order_id']=$row->table_ref_id;
				}
				else if($row->purpose == 'Restaurant Expense' || $row->purpose == 'Salary Expense'){
					$row_array['real_date'] = $row->transaction_date;
					$row_array['order_id'] = $row->table_ref_id;
				}
				else if($row->purpose == 'Stuff Due'){
					$row_array['real_date'] = $row->table_ref_name;
					$row_array['order_id'] = $row->table_ref_id;
				}
				else if($row->purpose == 'Sent To Account'){
					$row_array['real_date'] = $row->transaction_date;
					$row_array['order_id'] = $row->table_ref_id;
				}
				$row_array['DOM'] = $row->DOM;
                $row_array['creator'] = $this->dbm_model->exception_show('username','users','id',$row->creator);
				//print_r($row_array);
                array_push($json_response,$row_array);
            }
           echo json_encode($json_response);
		}
  	function transaction_save(){
	
			$this->load->model('dbm_model');
			
			$bd_time = date('Y-m-d H:i:s');
			//For Collect Credit From Different Source

			if($this->input->post('purposeName') == 'Credit Collection'){
					//For Collect Credit From Any Party
					if($this->input->post('typeName') == 'collect_party'){
						if($this->input->post('partyName')!=''){
							$amount = $this->input->post('transaction_amount');
							$this->db->select('*');
							$this->db->where('res_booking_id',$this->input->post('partyName'));
							$quer = $this->db->get('restaurant_booking');
							$row = $quer->row_array();
							$main_due = ($row['total_money'] + $row['service_charge']) - $row['total_paid'];
							if($row['due']>$amount){
								$transaction_status = 0;
								$due = $row['due'] - $amount;
								$total_paid = $row['total_paid']+$amount;
							}
							else if($main_due < $amount ){
								$transaction_status = 1;
								$due = 0;
								$total_paid = $row['total_paid']+$main_due;
								$amount = $main_due;
							}
							else{
								$transaction_status = 1;
								$due = $row['due'] - $amount;
								$total_paid = $row['total_paid']+$amount;
							}
							
							$transaction_date = $this->input->post('transaction_date');
							$data = array(
											'total_paid' => $total_paid,
											'due' => $due,
											'transaction_status' => $transaction_status
										); 

							$this->db->where('res_booking_id',$this->input->post('partyName'));
							$this->db->update('restaurant_booking',$data);
							
							$this->dbm_model->transaction_entry('in',$amount,$transaction_date,'Party','restaurant_booking',$this->input->post('partyName'));
							
							//$this->dbm_model->update_cashbox_in_transaction($amount,1);
							
							echo json_encode(array('mssage'=>'Data successfully updated.'));
						}
						else{
							echo json_encode(array('mssage'=>'Error, Data Not updated.'));
						}
					}
					//For Collect Credit From Any Client Due
					else if($this->input->post('typeName') == 'collect_client'){
						if($this->input->post('orderName')!=''){
							$amount = $this->input->post('transaction_amount');
							$this->db->select('*');
							$this->db->where('order_id',$this->input->post('orderName'));
							$quer = $this->db->get('order_info');
							$row = $quer->row_array();
								if(($row['paid_amount']+$amount) > ($row['total_amount']+$row['service_charge']-$row['discount_amount'])){
									$paid_amount = $row['total_amount']+$row['service_charge']-$row['discount_amount'];
									$amount = ($row['total_amount']+$row['service_charge']-$row['discount_amount']) - $row['paid_amount'];
								}
								else{
									$paid_amount = $row['paid_amount']+$amount;
								}
							
							$transaction_date = $this->input->post('transaction_date');
							$data = array(
											'paid_amount' => $paid_amount
										); 
								$this->db->where('order_id',$this->input->post('orderName'));
								$this->db->update('order_info',$data);
								
								$this->db->where('order_id',$this->input->post('orderName'));
								$ref_ids = $this->db->get('order_reference_table');
								$ref_id = $ref_ids->row_array();
								if($ref_id['grand_total'] <= $paid_amount){
												$this->db->where('reservation_id', $row['client_id']);
												$this->db->where('reservation_status', 2);
												$this->db->where('status', 0);
												//$this->db->order_by('real_checkin_date', 'DESC');
												//$this->db->limit(1500);
												$queryss = $this->db->get('reservation_new');
									if($queryss->num_rows() > 0){
												$this->db->where('order_id',$this->input->post('orderName'));
												$service_row = $this->db->get('order_details');
												$service_row = $service_row->result_array();
												foreach($service_row as $row){
													$this->db->where('serv_room_id',$row['service_in_room_id']);
													$this->db->delete('service_in_room');
													//echo "dxjdfks sdfjklsdjkl";
												}
										if($ref_id['discount_id']!=0 || $ref_id['discount_id']!=''){
											$this->db->where('discount_id',$ref_id['discount_id']);
											$this->db->delete('discount_client');
										}
									}
								}
							
							/* if($this->input->post('reception')=='on'){
								if($ref_id['ref_id']!=0 && $ref_id['ref_id']!=''){
								$sql ="UPDATE payment_history SET payment_amount = payment_amount + '".$amount."' , DOC = '".$bd_time."' WHERE payment_history_id = '".$ref_id['ref_id']."'";
								
								$this->db->query($sql);
								}
							} */
							
							$this->dbm_model->transaction_entry('in',$amount,$transaction_date,'Sale Due','order_info',$this->input->post('orderName'));
							
							$this->dbm_model->update_cashbox_in_transaction($amount,1);
							
							echo json_encode(array('mssage'=>'Data Successfully updated.'));
						}
						else{
							echo json_encode(array('mssage'=>'Error, Data Not updated.'));
						}
					}
					else if($this->input->post('typeName') == 'stuff_due'){
						if($this->input->post('stuffName')!='' && $this->input->post('stuff_month')!=''){
							$amount = $this->input->post('transaction_amount');
							$stuff_month = $this->input->post('stuff_month');
							$stuffName = $this->input->post('stuffName');
							
							
							
							
							
							$start_date = $stuff_month.'-01';
							$end_date = $stuff_month.'-31';
							$this->db->select('order_info.*,order_reference_table.grand_total');
							//$this->db->select_sum('order_reference_table.grand_total');
							//$this->db->select_sum('order_info.paid_amount');
							$this->db->from('order_info,stuff_order_info,stuff_info,order_reference_table');
							$this->db->where('order_info.doc >= "'.$start_date.'"');
							$this->db->where('order_info.doc <= "'.$end_date.'"');
							$this->db->where('order_info.order_type = 3');
							$this->db->where('stuff_order_info.order_info_id = order_info.order_id');
							$this->db->where('stuff_order_info.stuff_info_id = stuff_info.stuff_id');
							$this->db->where('order_reference_table.order_id = order_info.order_id');
							$this->db->where('order_reference_table.grand_total > order_info.paid_amount');
							$this->db->where('stuff_order_info.stuff_info_id = "'.$stuffName.'"');
							$query = $this->db->get();
							$amount_remain = $amount;
							$total_update = 0;
							$remain =0;
							foreach($query->result() as $row){
								$remain = $amount_remain;
								$amount_remain = $amount_remain - $row->grand_total;
								if($amount_remain >= 0 ){
									$datad = array('paid_amount'=>$row->grand_total);
									$this->db->where('order_id',$row->order_id);
									$this->db->update('order_info',$datad);
									$total_update = $row->grand_total + $total_update;
								}
								else{
									break;
								}
							}
							if($remain == $total_update){
								$remain = 0;
							}

							$transaction_date = $this->input->post('transaction_date');

							$this->dbm_model->transaction_entry('in',$total_update,$transaction_date,'Stuff Due','stuff_info '.$stuff_month,$stuffName);
							
							$this->dbm_model->update_cashbox_in_transaction($total_update,1);
							
							//echo json_encode(array('mssge2'=>'<span style="color: green;">Total Amount Updated: '.$total_update.'. Remain Amount '.$remain.'</span>'));
							echo json_encode(array('mssage'=>'Total Amount Updated: '.$total_update.'. Remain Amount '.$remain));
						}
						else{
							echo json_encode(array('mssage'=>'Error, Data Not updated.'));
						}
					}
			}
			//For Send To Accounts
			 else if($this->input->post('purposeName') == 'SendAccounts'){
			 
				$amount = $this->input->post('transaction_amount');
				$transaction_date = $this->input->post('transaction_date');
				$refer_id = 0;
				if($amount>0){
				/* $pay_data1=array(
				  'purpose'=>'Restaurant Bill',
				  'amount'=>$amount,
				  'sub_or_add'=>1
				); */
                
                $refer_id = $this->dbm_model->accounts_in_out(2,1,$amount);
				}
				
				
				$this->dbm_model->transaction_entry('out',$amount,$transaction_date,'Sent To Account','account_table',$refer_id);
							
				$this->dbm_model->update_cashbox_in_transaction($amount,0);
				echo json_encode(array('mssage'=>'Data successfully updated.'));
			}
	}
	public function find_client_name(){
		$this->load->model('naz_mdl');
		$client_select = $this->naz_mdl->option_for_client();
		$client_class = 'class="form-control tests" id="selected_client" style="width:100%;"';
		echo form_dropdown('client_id', $client_select,'',$client_class);
	}
	
	function table_design_save(){
		if($this->input->post()){
			$arry=$this->input->post('paramName');
 			for($i=0;$i<count($arry);$i++){
				for($j=0;$j<5;$j++){
						if($j==0){
							$table_id = $arry[$i][$j];
						}
						else if($j==1){
							$width = $arry[$i][$j];
						}
						else if($j==2){
							$height = $arry[$i][$j];
						}
						else if($j==3){
							$top = $arry[$i][$j];
						}
						else if($j==4){
							$left = $arry[$i][$j];
						}
				}
				$data = array(
					'xaxis_one' =>  $top,
					'yaxis_one' =>  $left,
					'xaxis_two' =>  $width,
					'yaxis_two' =>  $height
				);
				$this->db->where('table_id',$table_id);
				$this->db->update('table_info',$data);
			}
			echo json_encode($arry);
		}
		else{
			echo 'Error 404';
		} 
	}
	
	function check_access_auth(){
		$user_type = $this->input->post('user_type');
		$div_id = $this->input->post('div_id');
		$this->db->where('module_name',$div_id);
		$this->db->where('user_type',$user_type);
		$query = $this->db->get('rest_access_auth');
		$row = $query->row_array();
		echo json_encode($row['value']);
	}
}
       
	?>