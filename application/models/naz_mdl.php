<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Naz_mdl extends CI_model{
    
    
  function table_template($table_class = 'table table-condensed table-striped table-hover ',$style=null ,$table_id=null){
      $template = array(
        'table_open'            => '<table id="'.$table_id.'" class="'.$table_class.'" style="'.$style.'">',
        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
      
      );
      
      return $template;
  }
   
  
  function only_for_option($table, $option_name, $option_value, $custom_name=null, $custom_value=null, array $otherkey=null)
      {
        
        if($custom_value===null && $custom_name===null){
            // nothing
        }else{
            
            $arr_data["$custom_value"]="$custom_name";
        }
        
        if($otherkey!=null){
            $this->db->where($otherkey); 
        }else{
           // nothing
        }
        
        $query = $this->db->get($table);
        foreach ($query->result() as $row)
        {
            $arr_data[$row->{"$option_value"}]=$row->{"$option_name"};
        }
        return  $arr_data;
    }
    
    
  function option_for_client()
    {   
        $row_data[''] = 'Select Client Here';
        $this->db->where('status', 0);
        $this->db->order_by('client_id', 'DESC');
        $query = $this->db->get('client_info');
        foreach ($query->result() as $row)
        {
           $row_data[$row->client_id] =$this->converter_db('title_name', 'name_title', 'name_title_id',  $row->name_title_id).' '.$row->first_name.' '.$row->last_name
           .' ('.$row->contact_no.')';
        }
        return  $row_data;
    }
    
  function option_for_extra_service_charge()
    {   
        $row_data[''] = 'Select Extra Service Charge';
        $this->db->where('status', 0);
        $this->db->order_by('extra_service_id', 'DESC');
        $query = $this->db->get('extra_service');
        foreach ($query->result() as $row)
        {
           $row_data[$row->extra_service_id] = $row->extra_service_name;
        }
        return  $row_data;
    }
    
  function option_for_tax()
    {   
        $row_data[''] = 'Select Vat/Tax';
        $this->db->where('status', 0);
        $this->db->order_by('tax_id', 'DESC');
        $query = $this->db->get('tax_setup');
        foreach ($query->result() as $row)
        {
           $row_data[$row->tax_id] = $row->tax_name.' ('.$row->tax_rate.'%)';
        }
        return  $row_data;
    }
    
  function option_Agent()
    {   
        $row_data[''] = 'Select Agent';
        $this->db->where('status', 0);
        $this->db->order_by('agent_id', 'DESC');
        $query = $this->db->get('agents');
        foreach ($query->result() as $row)
        {
           $row_data[$row->agent_id] = $row->agent_name.' ('.$row->contact_no.') - '.$row->comission.'%';
        }
        return  $row_data;
    }
    
    
    function option_for_seassion_rate($dates=null)
    {   $dates = $this->date_sql($dates);
        
        $query = $this->db->query('SELECT * FROM seassions WHERE status = 0 AND "'.$dates.'" BETWEEN seassions.start_date AND seassions.end_date');
        if($query->num_rows()>0){
            $row_data[''] = 'Select Seassion Rate';
         foreach ($query->result() as $row)
            {
               $row_data[$row->seassion_id] = $row->seassion_name;
            }
            return  $row_data;
        }else{
            $row_data[''] = 'No Seassion at now';
            return  $row_data;
        }

    }
    
    function option_for_client_in_reservation($status = null, $reservation_status = null)
        {   
            $row_data[''] = 'Select Client Here';
            
            if($status != null){
                $this->db->where('status', $status);
            }else{
                $this->db->where('status', 0);
            }
            
            if($reservation_status != null){
                $this->db->where('reservation_status', $reservation_status);
            }else{
                $this->db->where('reservation_status=0 OR reservation_status=1 OR reservation_status=2');
            }
            
            $this->db->order_by('reservation_date', 'DESC');
            $this->db->group_by("client_id");
            $query = $this->db->get('reservation_new');
            foreach ($query->result() as $row)
            {
               $name = $this->client_name($row->client_id);
               $contct = $this->converter_db('contact_no', 'client_info', 'client_id',  $row->client_id);
               $row_data[$row->client_id] = $name.' ('.$contct.')';
            }
            return  $row_data;
        }
        
        function option_for_only_reserv_cancel()
        {   
            $row_data[''] = 'Select Client Here';
            $this->db->where('reservation_status', 4);
            $this->db->where('status', 1);
            $this->db->order_by('reservation_date', 'DESC');
            $this->db->group_by("client_id");
            $query = $this->db->get('reservation_new');
            foreach ($query->result() as $row)
            {
               $name = $this->client_name($row->client_id);
               $contct = $this->converter_db('contact_no', 'client_info', 'client_id',  $row->client_id);
               $row_data[$row->client_id] = $name.' ('.$contct.')';
            }
            return  $row_data;
        }
        
        function option_for_client_only_reservlist()
            {   
                $row_data[''] = 'Select Client Here';
                $this->db->where('status = 0 AND reservation_status = 0 OR reservation_status = 1');
                $this->db->order_by('reservation_date', 'DESC');
                $this->db->group_by("client_id");
                $query = $this->db->get('reservation_new');
                foreach ($query->result() as $row)
                {
                   $name = $this->client_name($row->client_id);
                   $contct = $this->converter_db('contact_no', 'client_info', 'client_id',  $row->client_id);
                   $row_data[$row->client_id] = $name.' ('.$contct.')';
                }
                return  $row_data;
            }
        
    function option_for_client_extand_reservation()
        {   
            $row_data[''] = 'Select Client Here';
            $this->db->where('reservation_status !=', 3);
            $this->db->where('status', 0);
            $this->db->order_by('reservation_date DESC, reservation_id DESC');
            $query = $this->db->get('reservation_new');
            foreach ($query->result() as $row)
            {
               $name = $this->client_name($row->client_id);
               $contct = $this->converter_db('contact_no', 'client_info', 'client_id',  $row->client_id);
               $row_data[$row->reservation_id] = $row->reservation_id.' - '.$name.' ('.$contct.')';
            }
            return  $row_data;
        }
        
 function option_for_service_type()
        {   
            $row_data[''] = 'Select Service Here';
            $this->db->where('status', 0);
            $this->db->order_by('service_typ_id', 'DESC');
            $query = $this->db->get('service_typ');
            foreach ($query->result() as $row)
            {
               $row_data[$row->service_typ_id] = $row->service_typ_name;
            }
            return  $row_data;
        }
    
    function option_for_client_payment_center()
            {   $row_data[''] = 'Select Client Here';

                $this->db->where('(reservation_status = 3 OR status = 1)');
                $this->db->order_by('reservation_date', 'DESC');
                //$this->db->group_by("client_id");
                $query = $this->db->get('reservation_new');
                foreach ($query->result() as $row)
                {
                    $total_payment = $this->total_payed_in_reservtion($row->reservation_id);
                    $get_total_bill = $this->get_total_bill_in_checkout($row->reservation_id);
                    $balance = $total_payment - $get_total_bill;
                    
                    if($balance != 0){
                        
                   $name = $this->client_name($row->client_id);
                   $contct = $this->converter_db('contact_no', 'client_info', 'client_id',  $row->client_id);
                   $row_data[$row->client_id] = $name.' ('.$contct.')';
                   
                   }else{
                    continue;
                   }
                }
                return  $row_data;
            }


 function duplicate_check($table, array $where){
    $num = 0;
    $this->db->where($where);
    $query = $this->db->get("$table");
    $num = $query->num_rows();
    return $num;
 }
 
 function id_check($table, $get_value, array $where){
    $this->db->where($where);
    $this->db->limit(1);
    $query = $this->db->get("$table");
    if($query->num_rows() > 0){
        foreach ($query->result() as $row)
        {
          $id = $row->{"$get_value"};
        }
        return $id;
    }else{
        return null;
    }

 }
 
 function converter_db($select, $table, $where, $key){
    $values='';
    $num = 0;
    $this->db->where($where, $key); 
    $this->db->limit(1);
    $query = $this->db->get($table);
    if($query->num_rows()>0){
        foreach ($query->result() as $row)
        {
            $values=$row->$select;
        }
        return $values;
    }else{
        return '';
    }
}


 function date_pub($sql_date=null){
    if(strtotime($sql_date) != false){
       return date("d-m-Y", strtotime($sql_date));
    }else{
        return "";
    }
  }
      
 function date_sql($public_date=null){
    if(strtotime($public_date) != false){
       return date("Y-m-d", strtotime($public_date));
    }else{
        return "";
    }
  }
 
 
 function date_over_lap($start=null, $input_date=null, $end=null){
     if(strtotime($start) != false && strtotime($input_date) != false && strtotime($end) != false){
        
        $s_date = strtotime($start);
        $e_date = strtotime($end);
        $date = strtotime($input_date);
        if($date >= $s_date && $date <= $e_date){
            return 0;
        }else{
            return 1;
        }

     }else{
        return 0;
    }
 }
 
 
function get_data($table, $get_data, $order_by=null, array $whare=null){
    
    $data = array();
    
    if($whare != null){
        $this->db->where($whare);
    }else{
        //nothing
    }
    if($order_by != null){
        $this->db->order_by($order_by, 'ASC');
    }else{
        //nothing
    }
    $query = $this->db->get($table);
    foreach ($query->result() as $row)
    { 
      array_push($data, $row->{"$get_data"});
    }
    
    return $data;
}
 
function client_img($id){
    $this->db->where('client_id', $id);
    $this->db->where('is_photo', 1);
    $query = $this->db->get('client_info');
    if($query->num_rows()>0){
        return $id.'.png';
    }else{
        return 'default.png';
    }
}
 
 
function date_for_calender($type=null, $start_date=null, $limit=7, $timezone='Asia/Dhaka'){
    date_default_timezone_set($timezone);
    if($type == 0){
        if(strtotime($start_date) != false && $start_date != ''){
       $dates = array();
	   for($i=0; $i<$limit; $i++){
         $date = strtotime("+$i day", strtotime($start_date));
         array_push($dates,date("d-m-Y", $date));
	   }
       
       return $dates;

     }else{
        
       $datescur = array();
	   for($i=0; $i<$limit; $i++){
         $date = strtotime("+$i day", strtotime(date("d-m-Y")));
         array_push($datescur,date("d-m-Y", $date));
	   }
       return $datescur;
        
    }
    
  }else{
    if(strtotime($start_date) != false && $start_date != ''){
       $dates = array();
	   for($i=0; $i<$limit; $i++){
         $date = strtotime("+$i day", strtotime($start_date));
         array_push($dates,'<div class="inside_date"><button type="button" class="btn btn-primary btn-xs btn-block radious_no" style="height:100%">'.date("d-m-Y", $date).'</button></div>');
	   }
       $all_data[0] = $dates;
       
       return $all_data;

     }else{
        
       $datescur = array();
	   for($i=0; $i<$limit; $i++){
         $date = strtotime("+$i day", strtotime(date("d-m-Y")));
         array_push($datescur,'<div class="inside_date"><button type="button" class="btn btn-primary btn-xs btn-block radious_no" style="height:100%">'.date("d-m-Y", $date).'</button></div>');
	   }
       $current[0] = $datescur;
       
       return $current;
        
    }
  }
}
 
 function show_room_for_calender($room_typ = null, $room_class = null){
    $data_id = array();
    
    if($room_typ != ''){
        $this->db->where('room_typ_id', $room_typ);
    }else{
        //nothings
    }
    
    if($room_class != ''){
        $this->db->where('class_id', $room_class);
    }else{
        //nothings
    }
    $this->db->order_by('room_number', 'ASC');
    $query = $this->db->get('rooms');
    foreach ($query->result() as $row)
    {
       array_push($data_id, $row->room_id);
    }

    return $data_id;

    
 }
 
 
 function room_date_converter($room_id=null, $dates=null){
     $this->db->where('room_id', $room_id);
     $this->db->where('dates', $this->date_sql($dates));
     $query = $this->db->get('temp_reserv_room');
     if($query->num_rows()>0){
         return '<div class="room_date_side_div selectable_bacground2">&nbsp;
         <button type="button" value="'.$room_id.'x'.$dates.'" class="close del_temp_selected" aria-hidden="true">&times;</button>
         </div>';
     }else{
         
         $reserved_data = $this->show_reserved_room_for_calender($room_id, $dates);
         $reg_status = $this->converter_db('reservation_status', 'reservation_new', 'reservation_id', $reserved_data);
         $cliet_id = $this->converter_db('client_id', 'reservation_new', 'reservation_id', $reserved_data);
         $client_name = $this->converter_db('first_name', 'client_info', 'client_id', $cliet_id);
         
         if($reserved_data != 'OK'){
            
            switch ($reg_status) {
                case 0://confirm
                    return '<div class="room_date_side_div claender_border">
                      <button style="font-size: 12px; white-space: nowrap; height: 100%; overflow: hidden;" title="Confirmed Reservation" class="btn btn-success btn-block room_reservation_id_box radious_no" value="'.$room_id.'x'.$reserved_data.'" type="button">'.$reserved_data.' - '.$client_name.'</button>
                     </div>';
                    break;
                case 1://not confirm
                    return '<div class="room_date_side_div claender_border">
                      <button style="font-size: 12px; white-space: nowrap; overflow: hidden; height: 100%;" title="Not Confirmed Reservation" class="btn btn-default btn-block room_reservation_id_box radious_no" value="'.$room_id.'x'.$reserved_data.'" type="button">'.$reserved_data.' - '.$client_name.'</button>
                     </div>';
                    break;
                case 2://Checked In
                    return '<div class="room_date_side_div claender_border">
                      <button style="font-size: 12px; white-space: nowrap; overflow: hidden; height: 100%;" title="Room is Checked in" class="btn btn-info btn-block room_reservation_id_box radious_no" value="'.$room_id.'x'.$reserved_data.'" type="button">'.$reserved_data.' - '.$client_name.'</button>
                     </div>';
                    break;
                    
                default: 
                    return '<div class="room_date_side_div">
             <input class="room_check" type="checkbox" name="room_date_val[]" value="'.$room_id.'x'.$dates.'" />
             </div>'; 


            }

            
         }else{
            return '<div class="room_date_side_div">
             <input class="room_check" type="checkbox" name="room_date_val[]" value="'.$room_id.'x'.$dates.'" />
             </div>';
         }
     }
 }
 
 function show_reserved_room_for_calender($room_id, $dates){
     $this->db->where('status', 0);
     $this->db->where('room_id', $room_id);
     $this->db->where('room_dates', $this->date_sql($dates));
     $query = $this->db->get('reserved_room');
     if($query->num_rows()>0){
        foreach ($query->result() as $row)
            {
              $data = $row->reservation_id;
            }
            return $data;
     }else{
        return 'OK';
     }
 }
 
 
 
 function count_maximum_guest_in_room($userID=null){
    //$room_typ_data = array();
    $max_adults = 0;
    $max_childs = 0;
    if($userID != null){
        $this->db->where('userID', $userID);
    }else{
        //nothing
    }
    $this->db->group_by("room_id");
    $query = $this->db->get('temp_reserv_room');
    $num_room = $query->num_rows();
    if($num_room > 0){
        foreach ($query->result() as $row)
        {     
           $room_typ_id = $this->converter_db('room_typ_id', 'rooms', 'room_id', $row->room_id);
           $max_adults += $this->converter_db('max_adults', 'room_type', 'room_typ_id', $room_typ_id);
           $max_childs += $this->converter_db('max_childs', 'room_type', 'room_typ_id', $room_typ_id); 
        }

        return array($num_room, $max_adults, $max_childs);
        
    }else{
        return array(0, 0, 0);
    }
           
 }
 
 function room_per_night_in_temp($room_id, $user_id = null){
    $num = 0;
    if($user_id != ''){
        $this->db->where('userID', $user_id);
    }else{
        //nothings
    }
    $this->db->where('room_id', $room_id);
    $query = $this->db->get('temp_reserv_room'); 
    $num = $query->num_rows();
    return $num;
 }
 
 
 function get_rate($rate_type = null, $room_typ = null, $room_class = null, $rate_typ_core = null){
      $amount=0;
      $this->db->where('main_rate_typ', $rate_typ_core);
      $this->db->where('rate_type_id', $rate_type);
      $this->db->where('room_typ_id', $room_typ);
      $this->db->where('class_id', $room_class);
      $this->db->limit(1);
      $query = $this->db->get('rate_setup');
      if($query->num_rows()>0){
        foreach ($query->result() as $row)
        {
                $amount = $row->rate_amount;
        }
        
        return $amount;
      }else{
        return 0;
      }
 
 }
 
 
 
  function get_rate_id($rate_type = null, $room_typ = null, $room_class = null, $rate_typ_core = null){
      $rate_id=null;
      $this->db->where('main_rate_typ', $rate_typ_core);
      $this->db->where('rate_type_id', $rate_type);
      $this->db->where('room_typ_id', $room_typ);
      $this->db->where('class_id', $room_class);
      $this->db->limit(1);
      $query = $this->db->get('rate_setup');
      if($query->num_rows()>0){
        foreach ($query->result() as $row)
        {
                $rate_id = $row->rate_id;
        }
        
        return $rate_id;
      }else{
        return null;
      }
 
 }
 
 function get_rates($id = null){
      $this->db->where('rate_id', $id);
      $query = $this->db->get('rate_setup');
      if($query->num_rows()>0){ 
      foreach ($query->result() as $row)
       {
          $rate = $row->rate_amount;
       }
       return $rate;
      }else{
        return 0;
      }
 }
 
  function get_main_rates($room_typ = null, $room_class = null){
      $rate_id = $this->get_rate_id(2, $room_typ, $room_class, 1);
      $this->db->where('rate_id', $rate_id);
      $query = $this->db->get('rate_setup');
      if($query->num_rows()>0){ 
      foreach ($query->result() as $row)
       {
          $rate = $row->rate_amount;
       }
       return $rate;
      }else{
        return 0;
      }
 }
 
 function total_bill_in_temp($userID = null){
    $amount = 0;
    if($userID != null){
        $this->db->where('userID', $userID);
    }else{
        //nothings
    }
    
    $query = $this->db->get('temp_room_bill');
      foreach ($query->result() as $row)
       {
          $amount += $this->get_rates($row->rate_id)*$row->stay_length;
       }
       return $amount;

    
 }
 
 function make_zero($id = null){
    if($id == null || $id == ''){
        return 0;
    }else{
        return $id;
    }
 }
 
 function total_room_bill_temp($client_id, $userID){
    $total_room_rate = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_room_bill');
    foreach ($query->result() as $row)
    {   

        $rate = $this->naz_mdl->converter_db('rate_amount', 'rate_setup', 'rate_id', $row->rate_id);
        $stay = $row->stay_length;
        $total_room_rate += $rate*$stay;
    }
    return $total_room_rate;
 }
 
 function total_tax_temp($client_id, $userID){
    $total_tax = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_tax');
    foreach ($query->result() as $row)
    {    
        $tax_percent = $this->converter_db('tax_rate', 'tax_setup', 'tax_id', $row->tax_id);
        $room_rate = $this->total_room_bill_temp($client_id, $userID);
        $total_tax += $room_rate*$tax_percent/100;
    }
    return $total_tax;
 }
 
 function total_tax_in_temp_reserv($reservation_id, $client_id, $userID){
    $total_tax = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('tax_total');
    foreach ($query->result() as $row)
    {    
        $tax_percent = $this->converter_db('tax_rate', 'tax_setup', 'tax_id', $row->tax_id);
        $room_rate = $this->total_room_bill_temp($client_id, $userID);
        $total_tax += $room_rate*$tax_percent/100;
    }
    return $total_tax;
    
 }
 
 
 
 function total_agent_comission_temp($client_id, $userID){
    $total_comission = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_agent');
    foreach ($query->result() as $row)
    {    
        $agent_percent = $this->converter_db('comission', 'agents', 'agent_id', $row->agent_id);
        $room_rate = $this->total_room_bill_temp($client_id, $userID);
        $total_comission += $room_rate*$agent_percent/100;
    }
    return $total_comission;
 }
 
 function total_agent_comission_in_temp($reservation_id, $client_id, $userID){
    $total_comission = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('agent_total');
    foreach ($query->result() as $row)
    {    
        $agent_percent = $this->converter_db('comission', 'agents', 'agent_id', $row->agent_id);
        $room_rate = $this->total_room_bill_temp($client_id, $userID);
        $total_comission += $room_rate*$agent_percent/100;
    }
    return $total_comission;
 }
 
 function total_extra_charge_temp($client_id, $userID){
    $total_charge = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_ex_service');
    foreach ($query->result() as $row)
    {   
        $total_charge += $row->amount;
    }
    return $total_charge;
 }
 
 function total_payed_temp($client_id, $userID){
    $total_payed = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_paid_amount');
    foreach ($query->result() as $row)
    {   
        $total_payed += $row->amount;
    }
    return $total_payed;
 }
 
 
 function total_discount_temp($client_id, $userID){
    $total_discount = 0;
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('temp_discount');
    foreach ($query->result() as $row)
    {   
        $total_discount += $row->amount;
    }
    return $total_discount;
 }
 
 
 function entrance_departure_date_on_temp($room_id, $userID = null){
    
    $this->db->select_max('dates', 'max_date');
    $this->db->select_min('dates', 'min_date');
    $this->db->where('room_id', $room_id);
    $this->db->where('userID', $userID);
    $this->db->limit(1);
    $query = $this->db->get('temp_reserv_room');
    foreach ($query->result() as $row)
    {   
        $depTure = strtotime("+1 day", strtotime($row->max_date));
        $entrice = $row->min_date;
    }
    
    $dates['depature_date'] = date("d-m-Y", $depTure);
    $dates['entrace_date'] = $this->date_pub($entrice);  
    return $dates;
 }
 
 function get_rate_id_from_temp($client_id, $room_id, $userID){
    $rate_id = '';
    $this->db->where('userID', $userID);
    $this->db->where('client_id', $client_id);
    $this->db->where('room_id', $room_id);
    $query = $this->db->get('temp_room_bill');
     foreach ($query->result() as $row)
      {     
          $rate_id = $row->rate_id;
      }
      return $rate_id;
 }
 
 function client_name($client_id){
    $name_title_id = $this->converter_db('name_title_id', 'client_info', 'client_id', $client_id);
    $title_name = $this->converter_db('title_name', 'name_title', 'name_title_id', $name_title_id);
    $first_name = $this->converter_db('first_name', 'client_info', 'client_id', $client_id);
    $last_name = $this->converter_db('last_name', 'client_info', 'client_id', $client_id);
    
    return $title_name.' '.$first_name.' '.$last_name;
 }
 
 function reserved_room($reserved_id){
    $room_number = '';
	$this->db->select('rooms.*');
	$this->db->from('reserved_room,rooms');
    $this->db->where('reserved_room.status', 0);
    $this->db->where('reservation_id', $reserved_id);
	$this->db->where('reserved_room.room_id = rooms.room_id');
    $this->db->group_by("room_id");
    $query = $this->db->get();
    foreach ($query->result() as $row)
    {
      $room_number .= $row->room_number.' , ';//'<button type="button" value="'.$row->room_id.'x'.$reserved_id.'" class="btn btn-link btn-xs room_reservation_id_box">'.$this->converter_db('room_number', 'rooms', 'room_id',$row->room_id).'</button>,';
    }
    
    return rtrim($room_number,' , ');
 }
 
 
  function reserved_room_arr($reserved_id){
    $room_number = array();
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->group_by("room_id"); 
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    { 
       array_push($room_number, $row->room_id);
    }
    
    return $room_number;
 }
 
   function reserved_room_normal($reserved_id){
    $room_number = '';
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->group_by("room_id"); 
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    { 
        $room_number .= $this->converter_db('room_number', 'rooms', 'room_id', $row->room_id).', ';
       //array_push($room_number, $row->room_id);
    }
    
    return rtrim($room_number, ', ');
 }
 
 
  function reserved_room_checkout($reserved_id){
    $room_number = '';
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->group_by("room_id"); 
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    {
      $room_number .= $this->converter_db('room_number', 'rooms', 'room_id',$row->room_id).', ';
    }
    
    return rtrim($room_number,', ');
 }
 
 function total_room_bill($reservation_id){
    $room_bill = 0;
    $rooms_arr = $this->reserved_room_arr($reservation_id);
    
    foreach($rooms_arr as $room_id){
        $nights = $this->room_nigh_count($reservation_id, $room_id);
        $room_rate = $this->get_rate_from_reserved_room($reservation_id, $room_id);
        $total_room_rate = $room_rate*$nights;
        $room_bill += $total_room_rate;
    }
    
    
//    $this->db->where('status', 0);
//    $this->db->where('reservation_id', $reservation_id);
//    $query = $this->db->get('reserved_room');
//    foreach ($query->result() as $row)
//    {
//       $room_bill += $this->get_rates($row->rate_id);
//    }
    
    return $room_bill;
 }
 
 function total_extra_charge($reservation_id){
    
    $extra_charge = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('extra_charge');
    foreach ($query->result() as $row)
    {
       $extra_charge += $row->charge_amount;
    }
    return $extra_charge;
    
 }
 
 function total_tax($reservation_id){
    $total_tax = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('tax_total');
    foreach ($query->result() as $row)
    {    
        $tax_percent = $this->converter_db('tax_rate', 'tax_setup', 'tax_id', $row->tax_id);
        $room_rate = $this->total_room_bill($reservation_id);
        $total_tax += $room_rate*$tax_percent/100;
    }
    return $total_tax;
    
 }
 
 function total_discount($reservation_id){
    $total_discount = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('discount_client');
    foreach ($query->result() as $row)
    {   
        $total_discount += $row->discount_amount;
    }
    return $total_discount;
 }
 
 function total_agent_comission($reservation_id){
    $total_comission = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('agent_total');
    foreach ($query->result() as $row)
    {    
        $agent_percent = $this->converter_db('comission', 'agents', 'agent_id', $row->agent_id);
        $room_rate = $this->total_room_bill($reservation_id);
        $total_comission += $room_rate*$agent_percent/100;
    }
    return $total_comission;
 }
 
  function total_service_bill($reservation_id){
    $total_service_bill = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('service_in_room');
    foreach ($query->result() as $row)
    {    
        $total_service_bill += $this->converter_db('service_rate', 'services', 'service_id', $row->service_id) * $row->quantity;
    }
    return $total_service_bill;
 }
 
 function total_service_bill_with_complete($reservation_id){
    $total_service_bill = 0;
    $this->db->where('status', 0);
    $this->db->where('is_complete', 1);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('service_in_room');
    foreach ($query->result() as $row)
    {    
        $total_service_bill += $this->converter_db('service_rate', 'services', 'service_id', $row->service_id) * $row->quantity;
    }
    return $total_service_bill;
 }
 
 function total_payed_in_reservtion($reservation_id){
    $total_payed = 0;
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('payment_history');
    foreach ($query->result() as $row)
    {   
        $total_payed += $row->payment_amount;
    }
    return $total_payed;
 }
 
 function total_payed($client_id){
    $total_payed = 0;
    $this->db->where('status', 0);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('payment_history');
    foreach ($query->result() as $row)
    {   
        $total_payed += $row->payment_amount;
    }
    return $total_payed;
 }
 
 function get_total_bill($client_id){
    $total_bill = 0;
    $reservation_ids = array();
    $this->db->where('status', 0);
    $this->db->where('client_id', $client_id);
    $query = $this->db->get('reservation_new');
    foreach ($query->result() as $row)
    {
       array_push($reservation_ids, $row->reservation_id);
    }
    
    foreach ($reservation_ids as $reservation_id){
        $total_bill += $this->get_total_bill_in_checkout($reservation_id);
    }
    return $total_bill;
    
 }
 
  function get_total_bill_in_reservation($reservation_id){
    $total_bill = 0;
    $total_room_bill = $this->total_room_bill($reservation_id);
    $total_extra_charge = $this->total_extra_charge($reservation_id);
    $total_discount = $this->total_discount($reservation_id);
    $total_service_bill = $this->total_service_bill($reservation_id);
    $total_bill = $total_room_bill+$total_extra_charge+$total_service_bill-$total_discount;
    return $total_bill;
    
 }
 
 function get_total_bill_in_checkout($reservation_id){
    $total_bill = 0;
    $total_room_bill = $this->total_room_bill($reservation_id);
    $total_extra_charge = $this->total_extra_charge($reservation_id);
    $total_discount = $this->total_discount($reservation_id);
    $total_service_bill = $this->total_service_bill_with_complete($reservation_id);
    $total_bill = $total_room_bill+$total_extra_charge+$total_service_bill-$total_discount;
    return $total_bill;
    
 }
 
 function guest_restriction($reservation_id, $room_id, $age, $is_child=0){
      if($is_child == 0){
        $this->db->where('reservation_id', $reservation_id);
        $this->db->where('room_id', $room_id);
        $this->db->where('guest_age >', 12);
        $this->db->where('status', 0);
        $query = $this->db->get('room_guest');
        $number_gest = $query->num_rows();
      }else{
        $this->db->where('reservation_id', $reservation_id);
        $this->db->where('room_id', $room_id);
        $this->db->where('guest_age <=', 12);
        $this->db->where('status', 0);
        $query = $this->db->get('room_guest');
        $number_gest = $query->num_rows();
      }
      
      return $number_gest;
 }
 
 function check_room_service_before_cencel($reserved_room_id){
        $this->db->where('reserved_room_id', $reserved_room_id);
        $query = $this->db->get('reserved_room');
        foreach ($query->result() as $row)
        {     
            $reservation_id = $row->reservation_id;
            $room_id = $row->room_id;
            $dates = $row->room_dates;
        }
        
        $this->db->where('reservation_id', $reservation_id);
        $this->db->where('room_id', $room_id);
        $this->db->where('service_date', $dates);
        $query1 = $this->db->get('service_in_room');
        $number = $query1->num_rows();
        return $number;   
 }
 
 function if_noroom_avaible($reservation_id){
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('reserved_room');
    return $query->num_rows();
    
 }
 
 function number_of_reserved_room($reserved_id){
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->group_by("room_id"); 
    $query = $this->db->get('reserved_room');
    return $query->num_rows();
 }
 
  function number_of_guest($reserved_id, $room_id = null){
    if($room_id != null){
            $this->db->where('room_id', $room_id); 
    }else{
        //nothing
    }
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reserved_id);
    $query = $this->db->get('room_guest');
    return $query->num_rows();
 }
 
 
  function entrance_departure_date($reserved_id, $room_id){
    
    $this->db->select_max('room_dates', 'max_date');
    $this->db->select_min('room_dates', 'min_date');
    $this->db->where('room_id', $room_id);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->where('status', 0);
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    {   
        $depTure = strtotime("+1 day", strtotime($row->max_date));
        $entrice = $row->min_date;
    }
    
    $dates['depature_date'] = date("d-m-Y", $depTure);
    $dates['entrace_date'] = $this->date_pub($entrice);  
    return $dates;
 }
 
  function room_nigh_count($reserved_id, $room_id){
    $num = 0;
    $this->db->where('room_id', $room_id);
    $this->db->where('reservation_id', $reserved_id);
    $this->db->where('status', 0);
    $query = $this->db->get('reserved_room'); 
    $num = $query->num_rows();
    return $num;
 }
 
  function get_rate_from_reserved_room($reservation_id, $room_id){
    $this->db->where('room_id', $room_id);
    $this->db->where('reservation_id', $reservation_id);
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    {
       $room_bill = $this->get_rates($row->rate_id);
    }
    
    return $room_bill;
 }
 
 function reserved_overlap($room_id, array $room_dates){
    $this->db->where('room_id', $room_id);
    $this->db->where('status', 0);
    $this->db->where_in('room_dates', $room_dates);
    $query = $this->db->get('reserved_room');
    return $query->num_rows();

 }
 
 function room_clear_before_check_in($reservation_id){
    $room_number = array();
    $this->db->where('status', 0);
    $this->db->where('reservation_id', $reservation_id);
    $this->db->group_by("room_id"); 
    $query = $this->db->get('reserved_room');
    foreach ($query->result() as $row)
    {
       array_push($room_number,$row->room_id);
    }
    
    $cheked_room = $this->get_checked_in_rooms();
    
    
    $result=array_intersect($cheked_room, $room_number);
    return $result;
    
 }
 
 function get_checked_in_rooms(){
    $reservation_ids = array();
    $room_ids = array();
    $this->db->where('status', 0);
    $this->db->where('reservation_status', 2);
    $query = $this->db->get('reservation_new');
    foreach ($query->result() as $row)
    {
       array_push($reservation_ids, $row->reservation_id);
    }
    
    if(!empty($reservation_ids)){
            $this->db->where_in('reservation_id', $reservation_ids);
            $this->db->where('status', 0);
            $this->db->group_by("room_id"); 
            $query1 = $this->db->get('reserved_room');
            foreach ($query1->result() as $row1)
            {
               array_push($room_ids, $row1->room_id);
            }
            
            return $room_ids;
    }else{
        return array();
    }
 }
 
 function dirty_status_in_room($room_id){
    $status = $this->converter_db('dirty_status', 'rooms', 'room_id', $room_id);
    if($status == 0){
        return '';
    }
    else
    {
        return '&nbsp;<i class="fa fa-recycle fa-spin" style="color:#FFFF00;"></i>&nbsp;';
    }
 }
 
 //4=resdrvation cencel
// function reserved_status($status_number){
//    switch ($favcolor) {
//    case 0:
//        echo "Your favorite color is red!";
//        break;
//    case 1:
//        echo "Your favorite color is blue!";
//        break;
//    case 2:
//        echo "Your favorite color is green!";
//        break;
//   }
// }
     
/**
 * End model
 */
}