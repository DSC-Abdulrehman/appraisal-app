<?php
include_once("connect.php");
$leaves=0;
$leave=0;
$designation="";
$deptt="";
$manager_id =0;
$team_lead_id =0;
$desig =0;
$team =0;
$emp_doj ="";
$emp_doc ="";
$name="";
$title="";
$grade=0;

 $getcrit = "SELECT * FROM criteria";
        $run_crit = mysqli_query($link, $getcrit);

        while ($crit_row=mysqli_fetch_array($run_crit)) 
        {
           $month= $crit_row['financial_start_month'];
           $annual_leaves=$crit_row['annual_entitlement'];
           $casual_leaves=$crit_row['casual_entitlement'];
           $sick_leaves=$crit_row['sick_entitlement'];
        }

/*$date=date('Y-m-d');
$dateParts = explode("-" , $date);
$year = $dateParts[0];
$month = $dateParts[1];*/

$year=date('Y');
$year1=$year;
$year2=$year+1;
$year=$year - 2;
echo $date=$year . "-0" . $month . "-01";
/*$date=date('Y-m-d');
$dateParts = explode("-" , $date);
$year = $dateParts[0];
$month = $dateParts[1];
$day = $dateParts[2];

$month=$month-1;
if ($month==0) {
  $month=12;
  $year=$year-1;
}*/

    //$getemp = "SELECT * FROM employee_record Where employee_id > 'DSC-010' AND (STR_TO_DATE(employee_doj,'%Y/%m/%d') <=STR_TO_DATE('$date','%Y/%m/%d')) order by employee_id ASC";

  $getemp = "SELECT * FROM employee_record Where employee_id > 'DSC-010' AND employee_doj <='$date' order by employee_id ASC";

        $run_emp = mysqli_query($link, $getemp);

        while ($emp_row=mysqli_fetch_array($run_emp)) 
        {
            
	  $emp_doj=$emp_row['employee_doj'];     
    $emp=$emp_row['employee_id'];
    if ($emp_doj <= $date) {
         $leaves=$annual_leaves;
    /*}else{]

        $emp_doj=date('Y-m-d');
        $dateParts = explode("-" , $emp_doj);
        $month1 = $dateParts[1];
       if ($month1 >= $month) {
        if ($month==7) {
            $leaves=$annual_leaves/12*(6+(12-$month1+1));
        }else{
            $leaves=$annual_leaves/12*(6-$month1+1);
        }
           
       }else{

           $leaves=$annual_leaves/12*(12-$month1+1);
       }*/
    }

     $getsum = "SELECT * FROM leaves_summary WHERE l_emp_id='$emp' AND l_fiscal_year1='$year' order by l_emp_id ASC LIMIT 1";
        $run_sum = mysqli_query($link, $getsum);

    
        while ($sum_row=mysqli_fetch_array($run_sum)) 
        {

            $leaves=$leaves+$sum_row['l_closing_balance'];
        }

    $sqlleav=mysqli_query($link, "INSERT INTO leaves_summary (l_id,l_fiscal_year1,l_fiscal_year2,l_emp_id,l_opening_leave_balance,l_leave_due_to_late,l_leaves,l_closing_balance,date_updt)

    VALUES('', '$year1', '$year2', '$emp', '$leaves', '0', '0', '$leaves', NOW())") or die(mysqli_error($link));
    

    $leave=0;
}

    
?>	
</body>
</html>
	
	