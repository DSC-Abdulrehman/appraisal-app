<?php
if (isset($_GET['month'])) {
	 $month1=$_GET['month'];
}

if (isset($_GET['year'])) {
	 $year1=$_GET['year'];
}
//$month1=7;
//$year1=2021;

if ($month1==1 OR $month1==3 OR $month1==5 OR $month1==7 OR $month1==8 OR $month1==10 OR $month1==12) {
        $day=31;
      }

      if ($month1==4 OR $month1==6 OR $month1==9 OR $month1==11) {
        $day=30;
      }

      if ($month1==2) {

        if (date('L',strtotime($year1 . '-01-01'))) {

           $day=29;
        }else {

        $day=28;
      }
    }
 $from_date=$month1 . "/1/" . $year1;
 $to_date=$month1 . "/" . $day . "/" . $year1; 
//if (isset($_GET['month'])) {
	//echo $month=$_GET['month'];
//}
include_once("connect.php");
$att_date1="";
$att_hrs1=0;
$emp="";
$count1=0;
$count2=0;
$count3=0;
$count4=0;
$days=0;
$att_hrs=0;
$month=0;
$year=0;
$att_date="";
$tot_leaves=0;
$sum=0;
$get_att = "SELECT * FROM attendance WHERE (STR_TO_DATE(att_date,'g%m/%d/%Y') >=STR_TO_DATE('$from_date','%m/%d/%Y') AND STR_TO_DATE(att_date,'%m/%d/%Y') <= STR_TO_DATE('$to_date','%m/%d/%Y'))";
    $run_att = mysqli_query($link, $get_att);
      while ($att_row=mysqli_fetch_array($run_att)) 
    {

//$get_att = "select * from attendance WHERE ORDER BY emp_id ASC";
//$run_att= mysqli_query($link,$get_att);
    //while ($att_row=mysqli_fetch_array($run_att)) {

if ($emp=="") {
	 $emp=$att_row['emp_id'];
   }

if ($emp!=$att_row['emp_id']) 
{
	$att_date1=$att_row['att_date'];
	$att_date=$att_row['att_date'];
 	$att_date = explode('/', $att_date);
 	$month = $att_date[0];
  	$year  = $att_date[2];
 	$att_hrs=$att_row['att_hrs'];
    $days=$count1 / 3;

   $d1 = explode('.', $days); 
   $days=$d1[0];
	$tot_leaves=$days+($count2/2)+$count3;

$ind=0;
	$get_att_summary = "SELECT * FROM Attendance_summary WHERE emp_id='$emp' AND att_year='$year1' AND att_month='$month1'";
    $run_att_summary = mysqli_query($link, $get_att_summary);
      while ($att_summary_row=mysqli_fetch_array($run_att_summary)) 
    {
    	
    	$ind=1;

    	}

    	if ($ind==1) {
    		$ind=0;
    		
    	$sql1=mysqli_query($link, "UPDATE Attendance_summary SET 
        att_year='$year', att_month='$month', att_hrs='$att_hrs1', days_late='$count1',leave_due_to_late='$days', half_days='$count2', leaves='$count3', total_leaves='$tot_leaves', absents='$count4', date_updt=NOW()
	
		WHERE att_id='$emp'") or die(mysqli_error($link));

		
}else{
//echo	$sum++;
	$sql=mysqli_query($link, "INSERT INTO attendance_summary (att_id, emp_id, att_year, att_month, att_hrs, days_late,leave_due_to_late, half_days, leaves, total_leaves, absents, date_updt)
	VALUES('', '$emp','$year','$month','$att_hrs1','$count1','$days','$count2','$count3', '$tot_leaves', '$count4', NOW())") or die(mysqli_error($link));
}
$count1=0;
$count2=0;
$count3=0;
$count4=0;
$att_hrs1=0;
echo $emp=$att_row['emp_id'];

$att_hrs1=$att_hrs1+$att_row['att_hrs'];
	
	if ($att_row['att_rule']=='Late') {
		$count1++;
	}

	if ($att_row['att_rule']=='Half Day') {
		$count2++;
	}





if ($att_row['att_rule']=='Forced Leave' OR $att_row['att_remarks']=='On Sick Leave' OR $att_row['att_remarks']=='On Leave') {

		$count3++;

	    }

} else {

	$att_hrs1=$att_hrs1+$att_row['att_hrs'];
	
	if ($att_row['att_rule']=='Late') {
		$count1++;
	}

	if ($att_row['att_rule']=='Half Day') {
		$count2++;
	}

	if (($att_row['att_rule']=='Forced Leave' OR $att_row['att_rule']=='On Sick Leave' OR $att_row['att_rule']=='On Leave') OR ($att_row['att_remarks']=='Forced Leave' OR $att_row['att_remarks']=='On Sick Leave' OR $att_row['att_remarks']=='On Leave')){
$abs=0;
	$get_leave1 = "select * from employee_leave_record ORDER BY leave_emp_id ASC";
		$run_leave1= mysqli_query($link,$get_leave1);
    		while ($leave1_row=mysqli_fetch_array($run_leave1)) {

    	if ($leave1_row['leave_emp_id']==$emp AND $leave1_row['from_date']==$att_date1) {
    		$abs=1;
    	}
	}	

	$get_leave2 = "select * from leave_work_table ORDER BY wk_id ASC";
		$run_leave2= mysqli_query($link,$get_leave2);
    		while ($leave2_row=mysqli_fetch_array($run_leave2)) {

    	if ($leave2_row['wk_id']==$emp AND $leave2_row['wk_from_date']==$att_date1) {
    		$abs=1;
    	}

    }
    	 
    	if ($abs==1) {
    		$count3++;
    	}else{
    	    $count4++;

    	   }


	    }
    }
}

$ind=0;
  $get_att_summary = "SELECT * FROM Attendance_summary WHERE emp_id='$emp' AND att_year='$year1' AND att_month='$month1'";
    $run_att_summary = mysqli_query($link, $get_att_summary);
      while ($att_summary_row=mysqli_fetch_array($run_att_summary)) 
    {
      
      $ind=1;

      }

      if ($ind==1) {
        $ind=0;
        
      $sql1=mysqli_query($link, "UPDATE Attendance_summary SET 
        att_year='$year', att_month='$month', att_hrs='$att_hrs1', days_late='$count1',leave_due_to_late='$days', half_days='$count2', leaves='$count3', total_leaves='$tot_leaves', absents='$count4', date_updt=NOW()
  
    WHERE att_id='$emp'") or die(mysqli_error($link));

    
}else{

  $sql=mysqli_query($link, "INSERT INTO attendance_summary (att_id, emp_id, att_year, att_month, att_hrs, days_late,leave_due_to_late, half_days, leaves, total_leaves, absents, date_updt)
  VALUES('', '$emp','$year','$month','$att_hrs1','$count1','$days','$count2','$count3', '$tot_leaves', '$count4', NOW())") or die(mysqli_error($link));
}

header('Location: ../index-emp.php?user=DSC-9999');
?>

</body>
</html>
	
	