<!DOCTYPE html>
<html>
<script>
function myFunction(){
    window.print();
}
</script>
<head>
    <meta charset="utf-8" />
    <title>Simple Invoice Template | PrepBootstrap</title>
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
    $slip_id = $_GET["slip_id"];
	
       
	?>
    <!-- php code end here -->
<!-- PAY SLIP START-->

<div class="container">

<div class="page-header">
    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: 15px;">
        <a class="navbar-brand" href="#" target="_blank"><img src="images/DynaSoft-logo.png" alt="Logo"></a>
    </div>

</div>
</br></br></br><br>
<!-- Simple Invoice START -->

<?php
//echo
 $sql_select1="SELECT * FROM slip_salary WHERE slip_id=$slip_id";
 
$result_select1=mysql_query($sql_select1);
$rows=mysql_fetch_array($result_select1);

?>


<div class="container">
    <form action="payslip2.php" method="GET" name="payslip2" enctype="multipart/form-data" class="form-horizontal">
    <div class="row">   
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="text-center">
                <h2><B><U>MONTHLY PAY SLIP FOR MONTH OF <input  type="hidden" id="date_salary_month"  name="date_salary_month"  value="<?php echo $rows['date_salary_month'];?>"/><?php echo $rows['date_salary_month'];?></U></B></h2>
            </div>
         </div>
    </div>   

<div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="col-xs-6 col-md-6 col-lg-6 pull-left">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
  

                       <div>EMPLOYEE NO:
                            <strong> <input  type="hidden" id="employee_no"  name="employee_no"  
                            value="<?php echo $rows['employee_no'];?>"/><?php echo $rows['employee_no'];?>
                            </strong>
                        </div><br>
                        <div>EMPLOYEE NAME:     
                            <strong>
      <input  type="hidden" id="employee_name"  name="employee_name"  value="<?php echo $rows['employee_name'];?>"/><?php echo $rows['employee_name'];?>
                            </strong>
                        </div><br>
                        <div>JOB TITLE:      
                            <strong> <input  type="hidden" id="job_title"  name="job_title"  value="<?php echo $rows['job_title'];?>"/> <?php echo $rows['job_title'];?>
                            </strong></div><br>
                        <div>DATE OF JOINING:
                            <strong> <input type="hidden"  id="date_joining"  name="date_joining" value="<?php echo $rows['date_joining'];?>" /><?php echo $rows['date_joining'];?>
                            </strong>
                        </div><br>
                        <div style="color: white">DATE OF CONFIRMATION:
                            <strong> <input  type="hidden" id="date_confirm"  name="date_confirm"  value="<?php echo $rows['date_confirm'];?>"/>
                                <!-- <input  type="text" id="date_of_birth"  name="date_of_birth"  value="<?php// echo $rows['date_of_birth'];?>"/>//8 -->
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
                            <strong> <?php //echo// $grades_id1 ?> <input  type="hidden" id="grades_id"  name="grades_id"  value="<?php echo $rows['grades_id'];?>"/> <?php echo $rows['grades_id'];?>
                            </strong>
                        </div><br>
                        <div>SALARY MODE:     
                            <strong> <?php //echo// $date_salary_month1 ?>
                                <!-- <input  type="hidden" id="date_salary_month"  name="date_salary_month"  value="<?php //echo $rows['date_salary_month'];?>"/><?php //echo $rows['date_salary_month'];?> -->

                            </strong>
                        </div><br>
                        <div>BANK ACCOUNT NO.:
                            <strong><?php //echo// $bank_account_no1 ?>
                                <input  type="hidden" id="bank_account_no"  name="bank_account_no"  value="<?php echo $rows['bank_account_no'];?>"/><?php echo $rows['bank_account_no'];?>
                            </strong>
                        </div><br>
                        <div style="">STATUS:
                           <!-- <strong><?php //echo// $STATUS ?><input  name="employee_name" id="employee_name" type="text" class="">
                            </strong>-->
                        </div><br>
                        <div style="color:white">SLIP_ID:
                            <strong><input type="hidden"  id="slip_id2"  name="slip_id2" value="<?php echo $rows['slip_id'];?>" />
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
                                    <td>Basic Pay</td>//11
                                    <td>
                                        <input type="hidden"  id="basic_pay"  name="basic_pay" value="<?php echo $rows['basic_pay'];?>" /> <?php echo $rows['basic_pay'];?>
                                    </td>
                                    <td>Absence Adjustment</td>//16
                                    <td>
                                        <input type="text"  id="absence_deduction"  name="absence_deduction" value="<?php echo $rows['absence_deduction'];?>" />
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>House Allowance</td>12
                                    <td>
                                        <input  type="text" id="house_allowance"  name="house_allowance"  value="<?php echo $rows['house_allowance'];?>"/>
                                    </td>
                                    <td>Advance Adjustment</td>//17
                                    <td>
                                        <input  type="text" id="advance_deduction"  name="advance_deduction"  value="<?php echo $rows['advance_deduction'];?>"/> 
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Conveyance All</td>//13
                                    <td> 
                                        <input  type="text" id="conveyance_allowance"  name="conveyance_allowance"  value="<?php echo $rows['conveyance_allowance'];?>"/>
                                    </td>
                                    <td>Core Adjustment</td>//18
                                    <td>
                                        <input  type="text" id="core_deduction"  name="core_deduction"  value="<?php echo $rows['core_deduction'];?>"/>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Communication All</td>//14
                                    <td>
                                        <input  type="text" id="communication_allowance"  name="communication_allowance"  value="<?php echo $rows['communication_allowance'];?>"/> 
                                    </td>
                                    <td>Phone / Others</td>//19
                                    <td>
                                        <input  type="text" id="phone_others_deduction"  name="phone_others_deduction"  value="<?php echo $rows['phone_others_deduction'];?>"/>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Others(Arrears Jan-feb)</td>//15
                                    <td>
                                        <input  type="text" id="phone_others"  name="phone_others"  value="<?php echo $rows['phone_others'];?>"/>
                                    </td>
                                    <td>Income Tax</td>//20
                                    <td>
                                        <input  type="text" id="incom_tax_deduction"  name="incom_tax_deduction"  value="<?php echo $rows['incom_tax_deduction'];?>"/>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><?php echo $add_total ?>
                                    </td>
                                    <td></td>
                                    <td><?php echo $deduct_total ?>
                                    </td>
                                    <td><?php echo $grand_total ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              
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
 <!-- <td><a href="update.php?slip_id=<?php //echo( $rows1['slip_id']);?>">update slip </a>
</td>
<td><a href="genslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>">generate slip </a>
</td> -->
    <div class="row form-group">
        <div class="col-lg-4">
            <a class="btn btn-outline-primary form_buttons" onclick="myFunction()" type="button" value="Genrate"  name="Genrate" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-print fa-lg"></i></a>
        </div>
        <!-- <div class="col-lg-"> 
        </div> -->
        <div class="col-lg-4">
            <!-- <input type="submit" value="update" name="save" align="middle"/></center> -->
            <input type="submit" class="btn btn-outline-primary form_buttons" value="update"  name="save" style="cursor:pointer;border: 1px solid gray;padding: 10px;"/>
        </div>
        <!-- <div class="col-lg-2"> 
        </div> -->
        <div class="col-lg-4">
            <!-- <center>
<input type="submit" value="update" name="save" align="submitmiddle"/></center> -->
            <!-- <form action="gentatepayslip.php" method="GET" name="gentatepayslip" enctype="multipart/form-data" class="form-horizontal"> --> 
            <a class="btn  btn-outline-primary form_buttons" href="genratepayslip.php" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-reply-all fa-lg"></i></a>
            <!-- <input class="btn btn-success form_buttons" type="Reset" value="Clear">-->
            <!-- <center>
<input type="submit" value="update" name="save" align="middle"/></center> -->
            </form> 
        </div>
     </div>
<!-- button div ends here -->

</div>
<!-- very first container ends here -->

</body>
</html>