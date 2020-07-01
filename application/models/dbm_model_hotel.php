<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Dbm_Model_Hotel extends CI_model{
	   
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

   function where_count($table,  array $key){
       $this->db->where($key);
       $this->db->from($table);
       return $this->db->count_all_results();
     }

   function all_insert($table,  array $data){
       $this->db->insert_batch($table, $data); 
     }


function roomCheck($id,$date){
    $this->db->where('room_reservation_history.roomID', $id);
    $this->db->where('room_reservation_history.Date', $date);
    //$this->db->get('room_reservation_history');
    $this->db->from('room_reservation_history');
    $result=$this->db->count_all_results();
    
    $this->db->where('room_reservation_history.roomID', $id);
    $this->db->where('room_reservation_history.Date', $date);
    $this->db->limit(1);
    $query=$this->db->get('room_reservation_history');
    foreach ($query->result() as $row)
        { 
            $token=$row->serviceTokenID;
            
        }

    $this->db->where('tepm_roomresevation.roomID', $id);
    $this->db->where('tepm_roomresevation.Date', $date);
    $this->db->from('tepm_roomresevation');
    $result2=$this->db->count_all_results();
    
    
    
    if($result==0){
        if($result2==0){
        return '<span style="color: green;">Available</span>';
        }else{
            return '<span style="color: #FF9900;">Processing</span>';
        }
    }else{
        return $token;
    }
}

function countTypeRoom($token,$roomId){
    $this->db->where('serviceTokenID', $token);
    $this->db->where('roomID', $roomId);
    $this->db->from('tepm_roomresevation');
    return $this->db->count_all_results();
}


function roomCounts($rTyp,$rClass){
    $counRes=0;
    $this->db->where('roomType', $rTyp);
    $this->db->where('roomClass', $rClass);
    $this->db->from('room_setup');
    $counRes=$this->db->count_all_results();
    return $counRes;
}

function roomRates($rTyp,$rClass){
    $counRes=0;
    $this->db->where('roomTypeID', $rTyp);
    $this->db->where('roomClassID', $rClass);
    $this->db->limit(1);
    $query = $this->db->get('room_rate');

    foreach ($query->result() as $row)
    {
        $counRes= $row->roomRate;
    }
    return $counRes;
    
}

function countRoom_Rate($roomNumber){
    $countres=0;
    $this->db->where('roomCode', $roomNumber);
    $this->db->from('room_setup');
    $countres= $this->db->count_all_results();
    return $countres;
}

function customerSelection($id,$identy){
    if($identy==1){
        $data=array();
        
        $this->db->where('customerID', $id); 
        $this->db->limit(1);
        $this->db->from('customer_info');
        $count_result2=$this->db->count_all_results();
        if($count_result2==1){
        $this->db->where('customerID', $id); 
        $this->db->limit(1);
        $query = $this->db->get('customer_info');
            foreach ($query->result() as $row)
            {
               $rowdata['name']=$row->firstName.' '.$row->lastName;
               $rowdata['mobile']=$row->contactNo;
               
               array_push($data,$rowdata);
                
            }
            return $data;
            }else{
                $rowdata['name']='No Name';
                $rowdata['mobile']='&nbsp;';
                array_push($data,$rowdata);
                return $data;
            }
    }else{
        
        $data2=array();
        
        
        $this->db->where('corpID', $id); 
        $this->db->limit(1);
        $this->db->from('corporate_setup');
        $count_result=$this->db->count_all_results();
        
        if($count_result==1){
        $this->db->where('corpID', $id); 
        $this->db->limit(1);
        $query = $this->db->get('corporate_setup');
            foreach ($query->result() as $row)
            {
               $rowdata2['name']=$row->corpName;
               $rowdata2['mobile']=$row->corpContactNo;
               array_push($data2,$rowdata2);
            }
            return $data2;
        }else{
            $rowdata2['name']='No Name';
            $rowdata2['mobile']='';
            array_push($data2,$rowdata2);
            return $data2;
        }
        
    }
}

function check_balance($amount,$payed){
    $balance=$amount-$payed;
    
    switch ($balance) {
             
             case 0:
                 return '<span style="color:#333333">'.$balance.'</span>';
                 break;
                 
             case ($balance<0 && $balance!=0):
                 return '<span style="color:#31D604">'.$balance.'</span>';
                 break;

             case ($balance>0 && $balance!=0):
                 return '<span style="color:#FF0000">'.$balance.'</span>';
                 break;
              
             }
}

function conjumeroom($tknid){
    $countres=0;
    $this->db->where('serviceTokenID', $tknid);
    $this->db->from('room_reservation_history');
    $countres= $this->db->count_all_results();
    return $countres;
}

function entrisDate($tknid){
    $this->load->model('date_model');
    $dates='';
    $this->db->where('serviceTokenID', $tknid);
    $this->db->select_min('Date');
    $query = $this->db->get('room_reservation_history');
    foreach ($query->result() as $row)
        {
           $dates=$row->Date;
        }
        
    if($dates!='')
        {
            return $this->date_model->date_pub($dates);
        }else{
            return '<span style="color:#FF0000">No Date</span>';
        }
        
        
        

}


function deptureDate($tknid){
    $this->load->model('date_model');
    $dates='';
    $this->db->where('serviceTokenID', $tknid);
    $this->db->select_max('Date');
    $query = $this->db->get('room_reservation_history');
    foreach ($query->result() as $row)
        {
           $dates=$row->Date;
        }
        
    if($dates!='')
        {
            return $this->date_model->date_pub($dates);
        }else{
            return '<span style="color:#FF0000">No Date</span>';
        }
}

function countNight($tknid){
    $countres=0;
    $this->db->where('serviceTokenID', $tknid);
    //$this->db->group_by(array("roomID","Date")); 
    $this->db->from('room_reservation_history');
    $countres= $this->db->count_all_results();
    return $countres;
}

function countAdults($tknid){
    $countres=0;
    $this->db->where('serviceTokenID', $tknid);
    $this->db->where('guestAge >=', 15); 
    $this->db->from('room_guest');
    $countres= $this->db->count_all_results();
    if($countres==0 || $countres==1){
        return 1;
    }else{
        return $countres;
    }
    
}

function countchild($tknid){
    $countres=0;
    $this->db->where('serviceTokenID', $tknid);
    $this->db->where('guestAge <', 15); 
    $this->db->from('room_guest');
    $countres= $this->db->count_all_results();
    return $countres;
}

function checkStatuse($entris,$depture){
    $current=date("Y-m-d");
    
    $curdate=strtotime($current);
    $entires=strtotime($entris);
    $deptures=strtotime($depture);
    
        switch ($curdate) {
             
             case ($curdate>=$entires && $curdate<=$deptures):
                 return '<span style="color:#008000">Runing</span>';
                 break;
                 
             case ($curdate<$entires):
                 return '<span style="color:#FF9900">Coming</span>';
                 break;

             case ($curdate>$deptures):
                 return '<span style="color:#FF0000">Expired</span>';
                 break;
              
             }
    
    
}



function checkBokingCondition($tknid){
    $totalAmount=$paidAmount=0;
    $this->db->where('serviceToken', $tknid);
    $this->db->limit(1);
    $query = $this->db->get('service_token');
        foreach ($query->result() as $row)
        {
           $totalAmount=$row->totalAmount;
           $paidAmount=$row->paidAmount;
           
        }

        switch ($paidAmount) {
             
             case 0:
                 return '<span style="color:#993366"><input class="disPlatNanem" name="Other" type="radio" value="'.$tknid.'" /> Waiting Payment</span>';
                 break;
                 
             case ($paidAmount>1):
                 return '<span style="color:#FF0000"><input class="disPlatNanem" name="Other" type="radio" value="'.$tknid.'" />Conframed</span>';
                 break;
              
             }      
}


function check_confrim($tknid, $p_or_up){
    $count_value=0;
    $this->db->where('ServiceToken', $tknid); 
    $this->db->from('checkin_table');
    $count_value=$this->db->count_all_results();
    
    $this->db->where('ServiceToken', $tknid); 
        $this->db->limit(1);
	    $query = $this->db->get('checkin_table');
        foreach ($query->result() as $row)
             {
                 $status_value=$row->checkValue;
             }
    
    
    if($count_value==0){
        
        if($p_or_up==0){
            return 'Unpaid';
        }else{
            return 'Confirmed';
        }   
        
    }else{
         
         if($status_value==0){
            return '<span style="color:#3366FF">Check IN</span>';
         }else{
            if($p_or_up==0){
            return 'Unpaid';
            }else{
            return 'Confirmed';
           } 
            
         }    
             
    }
    
    
}


function checkBokingCondition2($tknid){
    $totalAmount=$paidAmount=0;
    $this->db->where('serviceToken', $tknid);
    $this->db->limit(1);
    $query = $this->db->get('service_token');
        foreach ($query->result() as $row)
        {
           $totalAmount=$row->totalAmount;
           $paidAmount=$row->paidAmount;
           
        }

        switch ($paidAmount) {
             
             case 0:
                 return '<span style="color:#993366"><input class="disPlatNanem" name="Other" type="radio" value="'.$tknid.'" />'.$this->check_confrim($tknid,0).'</span>';
                 break;
                 
             case ($paidAmount>1):
                 return '<span style="color:#FF0000"><input class="disPlatNanem" name="Other" type="radio" value="'.$tknid.'" />'.$this->check_confrim($tknid,1).'</span>';
                 break;
              
             }      
}




function room_guests_list($token,$roomNo){
    $data2=array();
    $this->db->where('serviceTokenID', $token);
    $this->db->where('roomID', $roomNo);
    $this->db->from('room_guest');
    $checkcount= $this->db->count_all_results();
    
    if($checkcount>0){
        $this->db->where('serviceTokenID', $token);
        $this->db->where('roomID', $roomNo);
        $query = $this->db->get('room_guest');
        foreach ($query->result() as $row){
           $values=array($row->guestName,$row->guestGender,$row->guestContact,$row->guestAge,$token,$roomNo);
           array_push($data2,$values);
           // array_push($data2,$row->guestName,$row->guestGender,$row->guestContact,$row->guestAge);
        }
        return $data2;
    }else{
        
    $this->db->where('serviceToken', $token);
    $query = $this->db->get('service_token');
    foreach ($query->result() as $row){
          
          if($row->customerIdenty==1){
            $fstname=$this->other_show('firstName','customer_info','customerID',$row->customerID);
            $lstname=$this->other_show('lastName','customer_info','customerID',$row->customerID);
            $customerName=$fstname.' '.$lstname;
            $customerGender=$this->other_show('gender','customer_info','customerID',$row->customerID);
            $customerContact=$this->other_show('contactNo','customer_info','customerID',$row->customerID);
            $customerAge='&nbsp;';//other_show('lastName','customer_info','customerID',$row->customerID);
            $values=array($customerName,$customerGender,$customerContact,$customerAge);
          }else{
            
            $customerName=$this->other_show('corpName','corporate_setup','corpID',$row->customerID);
            $customerGender='&nbsp;';
            $customerContact=$this->other_show('corpContactNo','corporate_setup','corpID',$row->customerID);
            $customerAge='&nbsp;';//other_show('lastName','customer_info','customerID',$row->customerID);
            $values=array($customerName,$customerGender,$customerContact,$customerAge);
            
          }
          $values=array($customerName,$customerGender,$customerContact,$customerAge,$token,$roomNo);
           array_push($data2,$values);
           // array_push($data2,$row->guestName,$row->guestGender,$row->guestContact,$row->guestAge);
        }
        return $data2;
    }
}

function room_list($tken){
    $x=0;
    $rooms1 = '';
    $rooms2 = '';
    
    $this->db->where('serviceTokenID', $tken); 
    $this->db->group_by("roomID"); 
    $query = $this->db->get('room_reservation_history');
    $dotdot = $query->num_rows();
    
    if($dotdot>3){
        
        foreach ($query->result() as $row)
        {   if($x<3)
            $rooms2.= $row->roomID.', ';
            $x++;
        }
        return rtrim($rooms2,', ').' ...';

        
    }else{
                
        foreach ($query->result() as $row)
        {
            $rooms1.= $row->roomID.', ';
        }
        
        return rtrim($rooms1,', ');
    }
}





















}





















