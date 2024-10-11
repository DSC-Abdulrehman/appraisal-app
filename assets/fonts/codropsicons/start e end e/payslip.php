<!DOCTYPE html>
<html>
<script>
function myFunction(){
    window.print();
}
</script>
<head>
    <meta charset="utf-8" />
    <title>Admin|DYNASOFT PAY SYSTEM</title>
    <link rel="icon" href="logo.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="pay_slip/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="pay_slip/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="pay_slip/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="pay_slip/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- php code start here  -->
    <?php
error_reporting(0);
mysql_connect('localhost','root','');//for database connection
mysql_select_db('dynasoft_pay_system');
$empid=$_GET['empid'];
//echo ".empid.";echo $empid;echo'<br>';
$date_salary_month=$_GET['date_salary_month'];
//echo ".date_salary_month.";echo $date_salary_month; 
//echo'<br>';
/*      $sql_select="SELECT employee.employee_no,employee.employee_name,employee.job_title,employee.date_joining,employee.date_confirm,
employee.date_of_birth,employee.bank_account_no,grades.grades_id,grades.basic_pay,grades.house_allowance,grades.conveyance_allowance,grades.communication_allowance,grades.phone_others,grades.absence_deduction,grades.advance_deduction,grades.core_deduction,grades.phone_others_deduction,grades.incom_tax_deduction 
From employee INNER JOIN grades ON employee.grades_id=grades.grades_id";*/
///
////WHERE WORK FOR GETTING DATA OF SPECIFIC EMPLOYEE ID DATA COMING FROM GENERATE SLIP/////

//echo'<br>';
        $sql_select="SELECT employee.employee_no,employee.employee_name,employee.job_title,employee.date_joining,employee.date_confirm,employee.date_of_birth,employee.bank_account_no,grades.grades_id,grades.basic_pay,grades.house_allowance,grades.conveyance_allowance,grades.communication_allowance,grades.phone_others,grades.absence_deduction,grades.advance_deduction,grades.core_deduction,grades.phone_others_deduction,grades.incom_tax_deduction 
From employee INNER JOIN grades ON employee.grades_id=grades.grades_id
WHERE employee_no=$empid";
////////
    $result_select=mysql_query($sql_select);
    while ($rows = mysql_fetch_array($result_select)) 
    {
?>
 <?php //echo 
 $employee_no=$rows['employee_no'];?> 
 <?php // echo
  $employee_name=$rows['employee_name'];?> 
<?php //echo 
$job_title=$rows['job_title'];?>
<?php // echo
 $date_joining=$rows['date_joining'];?>
<?php //echo 
$date_confirm=$rows['date_confirm'];?>
<?php //echo
 $date_of_birth=$rows['date_of_birth'];?> 
<?php //echo 
$bank_account_no=$rows['bank_account_no'];?>
<?php //echo"grade id here"; echo
 $grades_id=$rows['grades_id'];?>
<?php //echo"basic pay"; echo 
$basic_pay=$rows['basic_pay'];?>
<?php //echo 
$house_allowance=$rows['house_allowance'];?>
<?php //echo 
$conveyance_allowance=$rows['conveyance_allowance'];?>
<?php //echo 
$communication_allowance=$rows['communication_allowance'];?>
<?php // echo 
$phone_others=$rows['phone_others'];?>
<?php //echo 
$absence_deduction=$rows['absence_deduction'];?>
<?php //echo 
$advance_deduction=$rows['advance_deduction'];?>
<?php //echo 
$core_deduction=$rows['core_deduction'];?>
<?php //echo
 $phone_others_deduction=$rows['phone_others_deduction'];?>
<?php //echo 
$incom_tax_deduction=$rows['incom_tax_deduction'];?>
<?php //echo'<br>'; ?>
<?php // echo ".date_salary_month."; echo 
$date_salary_month?>
<?php //echo'<br>'; ?>
<?php
}
//echo'<br>';   echo'<br>';//exit; 
?> 
<!-- <table><tr>
<th>slip id</th>
<th>salary month</th>
<th>employee no</th>
<th>employee name</th>

<th>job title</th>
<th>date joining</th>
<th>date confirm</th>
<th>date of birth</th>
<th>bank account</th>
<th>grade id</th>
<th>basic_pay</th>
<th>house_allowance</th>
<th>conveyance_allowance</th>
<th>communication_allowance</th>
<th>phone_others</th>
<th>absence_deduction</th>
<th>advance_deduction</th>
<th>core_deduction</th>
<th>phone_others_deduction</th>
<th>incom_tax_deduction</th>
<th>update</th>
<th>generate slip</th>
</tr> -->
<?php  
//echo'<br>';
//exit;
 //echo
  $query22="SELECT * FROM slip_salary WHERE employee_no =$empid AND date_salary_month='$date_salary_month'";
 
/*echo $query22="SELECT * FROM slip_salary WHERE employee_no =$empid AND date_salary_month=";
*/
$result=mysql_query($query22);
$num_rows=mysql_num_rows($result);
//echo'<br>';
    //echo 
    'row  is';

   // echo
     $num_rows;
   // echo'<br>';

/*  if (1 <= 0)
*/  
if ($num_rows <= 0)
     {
//echo    
$query=  'INSERT INTO  slip_salary(`date_salary_month`,`employee_no`,`employee_name`,`job_title`,`date_joining`,`date_confirm`,`date_of_birth`
,`bank_account_no`,`grades_id`,`basic_pay`,`house_allowance`,`conveyance_allowance`
,`communication_allowance`,`phone_others`,`absence_deduction`,`advance_deduction`,`core_deduction`,`phone_others_deduction`,`incom_tax_deduction`)
  VALUES("'.$date_salary_month.'","'.$employee_no.'","'.$employee_name.'","'.$job_title.'","'.$date_joining.'",
  "'.$date_confirm.'","'.$date_of_birth.'","'.$bank_account_no.'","'.$grades_id.'",
  "'.$basic_pay.'","'.$house_allowance.'","'.$conveyance_allowance.'","'.$communication_allowance.'","'.$phone_others.'","'.$absence_deduction.'","'.$advance_deduction .'","'.$core_deduction.'","'.$phone_others_deduction.'","'.$incom_tax_deduction.'")
    ;
';
mysql_query($query);
//echo'<br>'; 
    
 // echo".<br>.";
 //      echo "add amount";echo "<br/>";
 //    echo $add_total=$basic_pay+$house_allowance+$conveyance_allowance+$communication_allowance+$phone_others;
 //    echo".<br>.";
 //      echo "deduct amount";echo "<br/>";
 //    echo $deduct_total=$absence_deduction+$advance_deduction+$core_deduction+$phone_others_deduction+$incom_tax_deduction;
 //    echo".<br>."; echo "net salary";echo "<br/>";
 //    echo $grand_total=$add_total-$deduct_total;
 //       echo".<br>."

 //exit;
    ?> 
    <?php
   // echo
    $sql_select1="SELECT * FROM slip_salary WHERE employee_no=$empid AND date_salary_month='$date_salary_month'";
   $result_select1=mysql_query($sql_select1);
    while ($rows1 = mysql_fetch_array($result_select1)) 
    {
    ?>
    
<tr>
<td> <?php  //echo 'salary month is';
//echo 
 $slip_id=$rows1['slip_id'];?></td>
<td> <?php  //echo 'salary month is';
//echo 
 $date_salary_month1=$rows1['date_salary_month'];?></td><td>
 <?php  //echo 'employee_no';
 //echo 
 $employee_no1=$rows1['employee_no'];?> </td><td>
 <?php // echo 'employee_name'; 
  //echo "new name is"; echo
  $employee_name1=$rows1['employee_name'];?> </td><td>
<?php //echo 
$job_title1=$rows1['job_title'];?></td><td>
<?php // echo
 $date_joining1=$rows1['date_joining'];?></td><td>
<?php //echo 
$date_confirm1=$rows1['date_confirm'];?></td><td>
<?php //echo
 $date_of_birth1=$rows1['date_of_birth'];?> </td><td>
<?php //echo 
$bank_account_no1=$rows1['bank_account_no'];?></td><td>
<?php //echo"grade id here";
 //echo
 $grades_id1=$rows1['grades_id'];?></td><td>
<?php //echo"basic pay"; 
//echo 
$basic_pay1=$rows1['basic_pay'];?></td><td>
<?php // echo 
$house_allowance1=$rows1['house_allowance'];?></td><td>
<?php // echo 
$conveyance_allowance1=$rows1['conveyance_allowance'];?></td><td>
<?php // echo 
$communication_allowance1=$rows1['communication_allowance'];?></td><td>
<?php //echo 
$phone_others1=$rows1['phone_others'];?></td><td>
<?php //echo 
$absence_deduction1=$rows1['absence_deduction'];?></td><td>
<?php // echo 
$advance_deduction1=$rows1['advance_deduction'];?></td><td>
<?php //echo 
$core_deduction1=$rows1['core_deduction'];?></td><td>
<?php //echo
 $phone_others_deduction1=$rows1['phone_others_deduction'];?></td><td>
<?php //echo 
$incom_tax_deduction1=$rows1['incom_tax_deduction'];?></td>
<!-- <td><a href="update.php?slip_id=<?php //echo( $rows1['slip_id']);?>">update slip </a>
</td> -->
<!-- <td><a href="genslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>">generate slip </a>
</td> -->
</tr></table>
<?php
//echo".<br>.";
     // echo "add amount";echo "<br/>";
    //echo
     $add_total=$basic_pay+$house_allowance+$conveyance_allowance+$communication_allowance+$phone_others;
    //echo".<br>.";
     // echo "deduct amount";echo "<br/>";
    //echo
     $deduct_total=$absence_deduction+$advance_deduction+$core_deduction+$phone_others_deduction+$incom_tax_deduction;
   // echo".<br>."; echo "net salary";echo "<br/>";
    //echo 
    $grand_total=$add_total-$deduct_total;
      // echo".<br>."
       ?>
<div class="container">

<div class="page-header">
    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: 15px;">
        <a class="navbar-brand" href="#" target="_blank"><img src="images/DynaSoft-logo.png" alt="Logo"></a>
    </div>

</div>
<!-- Simple Invoice START -->
<div class="container">
    <div class="row">   
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="text-center">
                <h2><B><U>MONTHLY PAY SLIP FOR MONTH OF <?php echo $date_salary_month1 ?></U></B></h2>
            </div>
         </div>
    </div>   

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="col-xs-6 col-md-6 col-lg-6 pull-left">
                <div class="panel">
<form action="update_payslip.php" method="GET" enctype="multipart/form-data" class="form-horizontal"> 
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                       <div>EMPLOYEE NO:
                            <strong><?php echo $employee_no1?>
                            </strong>
                        </div><br>
                        <div>EMPLOYEE NAME:     
                            <strong>  <?php echo $employee_name1?> 
                            </strong>
                        </div><br>
                        <div>JOB TITLE:      
                            <strong> <?php echo $job_title1?>
                            </strong></div><br>
                        <div>DATE OF JOINING:
                            <strong><?php  echo $date_joining1?>
                            </strong>
                        </div><br>
                        <div style="color: white">DATE OF CONFIRMATION:
                            <strong><?php echo $date_confirm1?>
                            </strong>
                        </div><br>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-6 col-md-6 col-lg-6 pull-right">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div>GRADE:      
                            <strong> <?php echo $grades_id1?> 
                            </strong>
                        </div><br>
                        <div>SALARY MODE:     
                            <strong> 
                            </strong>
                        </div><br>
                        <div>BANK ACCOUNT NO.:
                            <strong><?php echo $bank_account_no1 ?>
                            </strong>
                        </div><br>
                        <div style="">STATUS:
                            <strong><?php echo $STATUS ?>
                            </strong>
                        </div><br>
                        <div style="color: white">aaa
                            <strong>sss
                            </strong>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div> -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-dark table-striped">
                            <thead>
                                <tr>
                                    <th><strong>Pay & Allowance</strong></th>
                                    <th><strong>Amount</strong></td>
                                    <td><strong>Deductions</strong></td>
                                    <td><strong>Amount</strong></td>
                                    <td><strong>Net Pay</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Pay</td>
                                    <td><?php echo $basic_pay1?>
                                    </td>
                                    <td>Absence Adjustment</td>
                                    <td><?php echo $absence_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>House Allowance</td>
                                    <td><?php echo $house_allowance1?>
                                    </td>
                                    <td>Advance Adjustment</td>
                                    <td><?php echo $advance_deduction1 ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Conveyance All</td>
                                    <td><?php echo $conveyance_allowance1 ?> 
                                    </td>
                                    <td>Core Adjustment</td>
                                    <td><?php echo $core_deduction1 ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Communication All</td>
                                    <td><?php echo $communication_allowance1 ?>
                                    </td>
                                    <td>Phone / Others</td>
                                    <td><?php echo $phone_others_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Others(Arrears Jan-feb)</td>
                                    <td><?php echo $phone_others1?>
                                    </td>
                                    <td>Income Tax</td>
                                    <td><?php echo $incom_tax_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><?php echo $add_total ?></td>
                                    <td></td>
                                    <td><?php echo $deduct_total ?></td>
                                    <td><?php echo $grand_total ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="panel-footer">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div> -->
            </div>
        </div>
    </div>

 <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div>
                        <table>
                            
                            <tbody>
                               <tr><td> The Net Pay has been credited to your account with Silk Bank,Johartown,Lahore.</td></tr> 
                               <tr><td>Please notify Finanace roll for any discrepancy-If there is any Change to the bank account</td></tr>
                               <tr><td>please inform dinance to ensure your detials are maintained as you</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                        <table>
                            
                            <tbody>
                               <tr>
                                    <td class="highrow"></td>
                                    <td class="text-center">DYNASOFT c 2017| 9-E1,JOHAR TOWN,LAHORE,PAKISTAN|INFO@DYNASOFTCLOUD.COM</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div> 

</div>

<!-- PAY SLIP END-->
<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->
<!-- <button onclick="myFunction()">Print Slip</button> -->
 <!-- button div starts here -->

    <div class="row form-group">
        <div class="col-lg-4">
            <a class="btn btn-outline-primary form_buttons" onclick="myFunction()" type="button" value="Genrate"  name="Genrate" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-print fa-lg"></i></a>
        </div>
        <!-- <div class="col-lg-"> 
        </div> -->
        <div class="col-lg-4">
        <?php //echo
        ( $rows1['slip_id']);
    //echo 
    $slip_id=$rows1['slip_id'];
    //echo "slip id is";
    //echo
     $slip_id;
    ?>
<a href="update_payslip.php?slip_id=<?php echo( $rows1['slip_id']);?>">update slip </a>           
 <!-- <a class="btn btn-outline-primary form_buttons"" href="update_payslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>" type="button" value="Update"  name="Update" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-edit (alias) fa-lg"></i></a> -->
            <!-- <input type="submit" class="btn btn-outline-primary form_buttons" value="update"  name="save" style="cursor:pointer;border: 1px solid gray;padding: 10px;"/> -->
    
        </div>
        <!-- <div class="col-lg-2"> 
        </div> -->
        <div class="col-lg-4">
            <!-- <form action="gentatepayslip.php" method="GET" name="gentatepayslip" enctype="multipart/form-data" class="form-horizontal"> --> 
            <a class="btn  btn-outline-primary form_buttons" href="genratepayslip.php" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-reply-all fa-lg"></i></a>
            <!-- <input class="btn btn-success form_buttons" type="Reset" value="Clear">-->
            </form> 
        </div>
     </div>
<!-- button div ends here -->

</div>
<!-- very first container ends here -->
<?php
    }
    
     }
     else
    {
        //echo 
        $STATUS="ALREADY EXIT";
      //echo'<br>';   
   // echo
     $sql_select1="SELECT * FROM slip_salary WHERE employee_no=$empid AND date_salary_month='$date_salary_month'";
   $result_select1=mysql_query($sql_select1);
    while ($rows1 = mysql_fetch_array($result_select1)) 
    {
    ?>
    
<tr>
<td> <?php  //echo 'salary month is';
//echo 
 $slip_id=$rows1['slip_id'];?></td>
<td> <?php  //echo 'salary month is';
//echo 
 $date_salary_month1=$rows1['date_salary_month'];?></td><td>
 <?php  //echo 'employee_no';
 //echo 
 $employee_no1=$rows1['employee_no'];?> </td><td>
 <?php // echo 'employee_name'; 
//echo "new name is";
 //echo
  $employee_name1=$rows1['employee_name'];?> </td><td>
<?php //echo 
$job_title1=$rows1['job_title'];?></td><td>
<?php // echo
 $date_joining1=$rows1['date_joining'];?></td><td>
<?php // echo 
$date_confirm1=$rows1['date_confirm'];?></td><td>
<?php //echo
 $date_of_birth1=$rows1['date_of_birth'];?> </td><td>
<?php // echo 
$bank_account_no1=$rows1['bank_account_no'];?></td><td>
<?php //echo"grade id here";
// echo
 $grades_id1=$rows1['grades_id'];?></td><td>
<?php //echo"basic pay"; 
//echo 
$basic_pay1=$rows1['basic_pay'];?></td><td>
<?php //echo 
$house_allowance1=$rows1['house_allowance'];?></td><td>
<?php //echo 
$conveyance_allowance1=$rows1['conveyance_allowance'];?></td><td>
<?php //echo 
$communication_allowance1=$rows1['communication_allowance'];?></td><td>
<?php //echo 
$phone_others1=$rows1['phone_others'];?></td><td>
<?php //echo 
$absence_deduction1=$rows1['absence_deduction'];?></td><td>
<?php //echo 
$advance_deduction1=$rows1['advance_deduction'];?></td><td>
<?php //echo 
$core_deduction1=$rows1['core_deduction'];?></td><td>
<?php //echo
 $phone_others_deduction1=$rows1['phone_others_deduction'];?></td><td>
<?php //echo 
$incom_tax_deduction1=$rows1['incom_tax_deduction'];?></td>
<!-- <td><a href="update.php?slip_id=<?php// echo( $rows1['slip_id']);?>">update slip </a>
</td>
<td><a href="genslip.php?slip_id=<?php// echo( $rows1['slip_id']);?>">generate slip </a>
</td> -->
<!-- </tr></table> -->
<?php
//echo".<br>.";
     // echo "add amount";echo "<br/>";
    //echo
     $add_total=$basic_pay1+$house_allowance1+$conveyance_allowance1+$communication_allowance1+$phone_others1;
    //echo".<br>.";
     // echo "deduct amount";echo "<br/>";
   // echo
     $deduct_total=$absence_deduction1+$advance_deduction1+$core_deduction1+$phone_others_deduction1+$incom_tax_deduction1;
   // echo".<br>."; echo "net salary";echo "<br/>";
   // echo
     $grand_total=$add_total-$deduct_total;
     //echo".<br>.";
       ?>


     <?php
    // echo'<br>';    
    //echo 
   /* $sql_select1="SELECT * FROM slip_salary WHERE employee_no=$empid AND date_salary_month='$date_salary_month'";

    //echo $sql_select1="SELECT * FROM slip_salary WHERE employee_no=$empid";
    //echo $sql_select1="SELECT * FROM slip_salary WHERE employee_no=$empid AND date_salary_month=$date_salary_month";
    $result_select1=mysql_query($sql_select1);
    while ($rows1 = mysql_fetch_array($result_select1)) 
    {
    ?>
 <?php  echo 'salary month is';echo 
 $date_salary_month1=$rows1['date_salary_month'];?>
 <?php  echo 'employee_no';echo 
 $employee_no1=$rows1['employee_no'];?> 
 <?php  echo 'employee_name'; echo
  $employee_name1=$rows1['employee_name'];?> 
<?php echo 
$job_title1=$rows1['job_title'];?>
<?php  echo
 $date_joining1=$rows1['date_joining'];?>
<?php echo 
$date_confirm1=$rows1['date_confirm'];?>
<?php echo
 $date_of_birth1=$rows1['date_of_birth'];?> 
<?php echo 
$bank_account_no1=$rows1['bank_account_no'];?>
<?php echo"grade id here"; echo
 $grades_id1=$rows1['grades_id'];?>
<?php echo"basic pay"; echo 
$basic_pay1=$rows1['basic_pay'];?>
<?php echo 
$house_allowance1=$rows1['house_allowance'];?>
<?php echo 
$conveyance_allowance1=$rows1['conveyance_allowance'];?>
<?php echo 
$communication_allowance1=$rows1['communication_allowance'];?>
<?php echo 
$phone_others1=$rows1['phone_others'];?>
<?php echo 
$absence_deduction1=$rows1['absence_deduction'];?>
<?php echo 
$advance_deduction1=$rows1['advance_deduction'];?>
<?php echo 
$core_deduction1=$rows1['core_deduction'];?>
<?php echo
 $phone_others_deduction1=$rows1['phone_others_deduction'];?>
<?php echo 
$incom_tax_deduction1=$rows1['incom_tax_deduction'];
    ?>
    <?php
}
echo".<br>.";
      echo "add amount";echo "<br/>";
    echo $add_total=$basic_pay+$house_allowance+$conveyance_allowance+$communication_allowance+$phone_others;
    echo".<br>.";
      echo "deduct amount";echo "<br/>";
    echo $deduct_total=$absence_deduction+$advance_deduction+$core_deduction+$phone_others_deduction+$incom_tax_deduction;
    echo".<br>."; echo "net salary";echo "<br/>";
    echo $grand_total=$add_total-$deduct_total;
       echo".<br>."*/
?>
    <!-- php code end here -->
<!-- PAY SLIP START-->

<div class="container">

<!--'<div class="page-header">
'    
'
'</div>
-->
<!-- Simple Invoice START -->
<div class="container">
 <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: 15px;">
        <a class="navbar-brand" href="#" target="_blank"><img src="images/DynaSoft-logo.png" alt="Logo"></a>
    </div>
    <div class="row">   
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="text-center">
                <h2><B><U>MONTHLY PAY SLIP FOR MONTH OF <?php echo $date_salary_month1 ?></U></B></h2>
            </div>
         </div>
    </div>   

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="col-xs-6 col-md-6 col-lg-6 pull-left">
                <div class="panel">
<form action="update_payslip.php" method="GET" enctype="multipart/form-data" class="form-horizontal"> 
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                       <div>EMPLOYEE NO:
                            <strong><?php  echo $employee_no1?>
                            </strong>
                        </div><br>
                        <div>EMPLOYEE NAME:     
                            <strong>  <?php echo $employee_name1?> 
                            </strong>
                        </div><br>
                        <div>JOB TITLE:      
                            <strong> <?php echo $job_title1?>
                            </strong></div><br>
                        <div>DATE OF JOINING:
                            <strong><?php  echo $date_joining1?>
                            </strong>
                        </div><br>
                        <!--<div style="color: white">DATE OF CONFIRMATION:
                            <strong><?php //echo $date_confirm1?>
                            </strong>
                        </div><br>-->
                    </div>
                </div>
            </div>
            
            <div class="col-xs-6 col-md-6 col-lg-6 pull-right">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <div>GRADE:      
                            <strong> <?php echo $grades_id1?> 
                            </strong>
                        </div><br>
                        <div>SALARY MODE:     
                            <strong> <!-- <?php //echo $date_salary_month1 ?> -->
                            </strong>
                        </div><br>
                        <div>BANK ACCOUNT NO.:
                            <strong><?php echo $bank_account_no1 ?>
                            </strong>
                        </div><br>
                        <div style="">STATUS:
                            <strong><?php echo $STATUS ?>
                            </strong>
                        </div><br>
                        <!--<div style="color: white">aaa
                            <strong>sss
                            </strong>
                        </div><br>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div> -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-dark table-striped">
                            <thead>
                                <tr>
                                    <th><strong>Pay & Allowance</strong></th>
                                    <th><strong>Amount</strong></td>
                                    <td><strong>Deductions</strong></td>
                                    <td><strong>Amount</strong></td>
                                    <td><strong>Net Pay</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Pay</td>
                                    <td><?php echo $basic_pay1?>
                                    </td>
                                    <td>Absence Adjustment</td>
                                    <td><?php echo $absence_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>House Allowance</td>
                                    <td><?php echo $house_allowance1?>
                                    </td>
                                    <td>Advance Adjustment</td>
                                    <td><?php echo $advance_deduction1 ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Conveyance All</td>
                                    <td><?php echo $conveyance_allowance1 ?> 
                                    </td>
                                    <td>Core Adjustment</td>
                                    <td><?php echo $core_deduction1 ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Communication All</td>
                                    <td><?php echo $communication_allowance1 ?>
                                    </td>
                                    <td>Phone / Others</td>
                                    <td><?php echo $phone_others_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Others(Arrears Jan-feb)</td>
                                    <td><?php echo $phone_others1?>
                                    </td>
                                    <td>Income Tax</td>
                                    <td><?php echo $incom_tax_deduction1?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><?php echo $add_total ?></td>
                                    <td></td>
                                    <td><?php echo $deduct_total ?></td>
                                    <td><?php echo $grand_total ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="panel-footer">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div> -->
            </div>
        </div>
    </div>

 <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div>
                        <table>
                            
                            <tbody>
                               <tr><td> The Net Pay has been credited to your account with Silk Bank,Johartown,Lahore.</td></tr> 
                               <tr><td>Please notify Finanace roll for any discrepancy-If there is any Change to the bank account</td></tr>
                               <tr><td>please inform dinance to ensure your detials are maintained as you</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                        <table>
                            
                            <tbody>
                               <tr>
                                    <td class="highrow"></td>
                                    <td class="text-center">DYNASOFT c 2017| 9-E1,JOHAR TOWN,LAHORE,PAKISTAN|INFO@DYNASOFTCLOUD.COM</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div> 

</div>

<!-- PAY SLIP END-->
<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->
<!-- <button onclick="myFunction()">Print Slip</button> -->
 <!-- button div starts here -->

    <div class="row form-group">
        <div class="col-lg-4">
            <a class="btn btn-outline-primary form_buttons" onclick="myFunction()" type="button" value="Genrate"  name="Genrate" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-print fa-lg"></i></a>
        </div>
        <!-- <div class="col-lg-"> 
        </div> -->
        <div class="col-lg-4">
        <?php //echo
        ( $rows1['slip_id']);
		//echo 
        $slip_id=$rows1['slip_id'];
		//echo "slip id is";
		//echo
         $slip_id;
		?>
<a href="update_payslip.php?slip_id=<?php echo( $rows1['slip_id']);?>">update slip </a>           
 <!-- <a class="btn btn-outline-primary form_buttons"" href="update_payslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>" type="button" value="Update"  name="Update" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-edit (alias) fa-lg"></i></a> -->
            <!-- <input type="submit" class="btn btn-outline-primary form_buttons" value="update"  name="save" style="cursor:pointer;border: 1px solid gray;padding: 10px;"/> -->
    
        </div>
        <!-- <div class="col-lg-2"> 
        </div> -->
        <div class="col-lg-4">
            <!-- <form action="gentatepayslip.php" method="GET" name="gentatepayslip" enctype="multipart/form-data" class="form-horizontal"> --> 
            <a class="btn  btn-outline-primary form_buttons" href="genratepayslip.php" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-reply-all fa-lg"></i></a>
            <!-- <input class="btn btn-success form_buttons" type="Reset" value="Clear">-->
            </form> 
        </div>
     </div>
<!-- button div ends here -->

</div>
<!-- very first container ends here -->
   <?php
    }   
    }
     ?>
</body>
</html>