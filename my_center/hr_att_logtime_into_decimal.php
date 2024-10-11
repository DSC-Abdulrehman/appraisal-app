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
$day_name="";

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

  $date1=$att_row['att_date'];
  $dateParts = explode("/" , $date1);
  $year1 = $dateParts[2];
  $month1 = $dateParts[0];
  $day1 = $dateParts[1];

   if ($year1==$year AND $month1==$month) {
   
 $date1=$att_row['att_date'];
 $timestamp = strtotime($date1);
 $new_time_stamp = date("m/d/Y", strtotime($timestamp));
 $dayx = date('l', $timestamp);
 
  if ($dayx=="Saturday" OR $dayx=="Sunday") {
    $day_name="Week End";
    
  } else {
    $day_name="";
  }
 $att_id=$att_row['att_id'];
 $emp_id=$att_row['emp_id'];
 $time=$att_row['att_logged_time'];
 if ($time==0 OR $time=="") {
   $hours=0;
 }else{
 $timeParts = explode(":" , $time);
 $hours = $timeParts[0];
 $minutes = $timeParts[1]; 
 $hours=$hours+($minutes/60);
}

 $time_in=$att_row['att_time_in'];
 $timeIn = explode(":" , $time_in);
 $hr1 = $timeIn[0];
 //$min1 = $timeIn[1];
 $min1 = isset($timeIn[1]) ? $timeIn[1] : null;
 if ($min1 > 0) {
 	 $hours_in=$hr1+($min1/60);
 }else{
 	 $hours_in=$hr1;
 }


 $time_out=$att_row['att_time_out'];
 $timeOut = explode(":" , $time_out);
 $hr2 = $timeOut[0];
 //$min2 = $timeOut[1];
  $min2 = isset($timeOut[1]) ? $timeOut[1] : null; 
 if ($min2 > 0) {
 	 $hours_out=$hr2+($min2/60);
 }else{
 	 $hours_out=$hr2;
 }
 
if ($hours>0 AND $hours<4) 
{
	 $wlate="Forced Leave"; 
} else

    if (($hours_in>$enter2 OR $hours_out<$exit1) OR ($hours<=4 AND $hours<7)) 

{
	 
	$wlate="Half Day";
}else

if (($hours_in>$enter1 AND
	$hours_in<$enter2) OR 
	($hours_out>$exit1 AND
	$hours_out<$exit2)) 
{
	 $wlate="Late"; 

  } 

	$get_emp = "select * from employee_record where employee_id='$emp_id' Limit 1" ;
     $run_emp= mysqli_query($link,$get_emp);
    while ($emp_row=mysqli_fetch_array($run_emp)) {
    	$dept=$emp_row['employee_dept'];
    	$team=$emp_row['employee_team'];
    }
 
	$sql=mysqli_query($link, "UPDATE attendance SET 
       att_hrs='$hours', att_rule='$wlate', att_remarks='$day_name', att_deptt_id='$dept', att_team_id='$team' 
    WHERE att_id='$att_id'") or die(mysqli_error($link));   
	$wlate="";
	}
}

   header('Location: hr_attendance_summary.php?month='.$month.'&year='.$year);

?>

</body>
</html>
	