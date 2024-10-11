<?php

include_once("connect.php");
$user="";
$date1="";
$id=0;
$timein="";
$timeout="";
$log_time="";
$minutes2=0;
$minutes1=0;
$reasons="";
if (isset($_GET['user'])) {
	$user=$_GET['user'];
	$date1=$_GET['date1'];
	$id=$_GET['id'];
	
}

if (isset($_POST['update'])) {
	$timein=$_POST['new_time_in'];
	$timeout=$_POST['new_time_out'];
	$reasons=$_POST['reasons'];

 $timeParts = explode(":" , $timein);
 $hours = $timeParts[0];
 $minutes = $timeParts[1]; 
 $minutes1=$minutes+($hours*60);

 $timeParts = explode(":" , $timeout);
 $hours = $timeParts[0];
 $minutes = $timeParts[1]; 
 $minutes2=$minutes+($hours*60);
 
 $log_time=($minutes2 - $minutes1)/60;
 $timeParts = explode("." , $log_time);
 $hours = $timeParts[0];
 $minutes = round($timeParts[1] *.6,0);
 $log_time=$hours . "." . $minutes;
 $log_time=round($log_time,2);

 $timeParts = explode("." , $log_time);
 $hours = $timeParts[0];
 $minutes = $timeParts[1];
 $log_time=$hours . ":" . $minutes;

	$sql=mysqli_query($link, "UPDATE attendance SET 
              
       att_time_in='$timein',
       att_time_out='$timeout',
       att_logged_time='$log_time',
       att_remarks='$reasons',
       date_updt=NOW()

		WHERE att_id='$id'") or die(mysqli_error($link));
        
}

?>