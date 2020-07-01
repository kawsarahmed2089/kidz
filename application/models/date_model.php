<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Date_model extends CI_model{
	   
       function date_sql($public_date){
        $originalDate = $public_date;
        return $sqlDate = date("Y-m-d", strtotime($originalDate));
      }
      
      function date_pub($sql_date){
         $originalDate = $sql_date;
         if($sql_date!=""){
            return $pubDate = date("d-m-Y", strtotime($originalDate));
         }else{
            return "";
         }
         
      }
      
      
      function time_pub($times){
         $originalDate = $times;
         if($times!=""){
            return $pubDate = date("g:i a", strtotime("$originalDate"));
         }else{
            return "";
         }
         
      }
      
      
    function date_subtract($date1, $date2){
        $dates1=date_create($date1);
        $dates2=date_create($date2);
        $diff=date_diff($dates1,$dates2);
        $dateDiff=$diff->format("%r%a");
        return (int)$dateDiff;
      }
      
    function date_generate($entered_date,$days,$formate){
        
        if($formate==1){
           $date_ret=date('Y-m-d', strtotime($entered_date. ' + '.$days.' days'));
        }else{
            $date_ret=date('d-m-Y', strtotime($entered_date. ' + '.$days.' days'));
        }
        
        return $date_ret;
        
    }


      
    function change_date_interval($start_time,$end_date,$in_time){
        $thestime = new DateTime($end_date);
        $betime = new DateTime($start_time);
        $interval = $betime->diff($thestime);
        $interval = $interval->format('%a');
        $start_time= date('H',strtotime($start_time));
        
        if($interval<1  && $start_time<$in_time ){
        $interval = $interval+2;
        }
        else if($interval<1  && $start_time>=$in_time ){
        $interval = $interval+1;
        }
        else{
        $interval = $interval+2;
        }
        return $interval;
    }























}