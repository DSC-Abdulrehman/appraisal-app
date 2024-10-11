<?php
$time="";
$timeParts="";
$hours=0;
$minutes=0;
$att_id=0;
$wlate="";
$a=0;
$hr1=0;
$hr2=0;
$min1=0;
$min2=0;
$dept=0;
$team=0;
$emp_id="";

$date=date('Y/m/d');
$dateParts = explode("/" , $date);
$year = $dateParts[0];
$month = $dateParts[1];

if ($month==1) {
   $month=12;
   $year=$year-1;
   }else{
    $month=$month-1;
   }
 
 
include_once("connect.php");

$get_cri = "select * from criteria";
   $run_cri= mysqli_query($link,$get_cri);
    while ($cri_row=mysqli_fetch_array($run_cri)) {
   $enter1=$cri_row['enter1'];
   $enter2=$cri_row['enter2'];
   $exit1=$cri_row['exit1'];
   $exit2=$cri_row['exit2'];
   $hrs1=$cri_row['hrs1'];
   $hrs2=$cri_row['hrs2'];

}

$get_att = "select * from attendance";
$run_att= mysqli_query($link,$get_att);
    while ($att_row=mysqli_fetch_array($run_att)) {
	$att_id=$att_row['att_id'];
	
	$sql=mysqli_query($link, "UPDATE attendance SET 
       att_remarks=''
    WHERE att_id='$att_id'") or die(mysqli_error($link));
/*$date1=$att_row['att_date'];
$date1="8-1-2021";
 $timestamp = strtotime($date1);
$new_time_stamp = date("m-d-Y", strtotime($timestamp));
$day = date('D', $timestamp);
echo $day;*/
  
  }
  
  ?>