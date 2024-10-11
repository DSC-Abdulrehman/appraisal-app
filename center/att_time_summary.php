<?php

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

$get_att = "select * from attendance ORDER BY emp_id ASC";
$run_att= mysqli_query($link,$get_att);
    while ($att_row=mysqli_fetch_array($run_att)) {

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

$day1=$days;
 $dayParts = explode("." , $day1);
$days = $dayParts[0];
//echo "  " . $emp . "  " . $days . "  " . $count2 . "  " . $count3;
	$tot_leaves=$days+($count2/2)+$count3;
	
	$sql=mysqli_query($link, "INSERT INTO attendance_summary (att_id, emp_id, att_year, att_month, att_hrs, days_late,leave_due_to_late, half_days, leaves, total_leaves, absents, date_updt)
	VALUES('', '$emp','$year','$month','$att_hrs1','$count1','$days','$count2','$count3', '$tot_leaves', '$count4', NOW())") or die(mysqli_error($link));

$count1=0;
$count2=0;
$count3=0;
$count4=0;
$att_hrs1=0;
$emp=$att_row['emp_id'];

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
    	 $abs;
    	if ($abs==1) {
    		$count3++;
    	}else{
    	    $count4++;

    	   }


	    }
    }
}

?>

</body>
</html>
	
	