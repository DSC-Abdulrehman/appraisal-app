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
  
<?php
  error_reporting(0);
  mysql_connect('localhost','root','');//for database connection
  mysql_select_db('dynasoft_pay_system');
  //$slip_id = $_GET["slip_id"];
  //  echo "<h1>keyword is " .$slip_id. "</h1>";
    $slip_id2 = $_GET["slip_id2"];//echo "</br>";
   // echo "<h1>slip id 2 is " 
  //  .$slip_id2. //"</h1>";
	  $date_salary_month = $_REQUEST["date_salary_month"];
		//echo "<h1>date_salary_month is "
       //  .$date_salary_month.// "</h1>";
		 $employee_no = $_REQUEST["employee_no"];
		//echo "<h1>employee_no is " .$employee_no. "</h1>"; 
        //$employee_name1=intval($_GET['employee_name']);
        $employee_name1=intval($_GET['employee_name']);
        //echo "<h1>employee_name is " .$employee_name1. "</h1>";

		//echo $employee_name=$_GET["employee_name"];
		//echo 
        $employee_name=$_REQUEST["employee_name"];
		//echo "<h1>employee name is " .$employee_name. "</h1>";
		 $job_title = $_GET["job_title"];
		//echo "<h1>job_title is " .$job_title. "</h1>";
		
	//echo	
    $date_joining=$_GET["date_joining"];//echo "<h1>date_joining is " .$date_joining. "</h1>";
	// echo 
      $date_confirm=$_GET["date_confirm"];//echo "<h1>date_confirm is " .$date_confirm. "</h1>";
		//echo
         $date_of_birth=$_GET["date_of_birth"];
      //echo "<h1>date_of_birth is " .$date_of_birth. "</h1>";
		//echo
         $bank_account_no=$_GET["bank_account_no"];//echo "<h1>bank_account_no is " .$bank_account_no. "</h1>";
		//echo
         $grades_id=$_GET["grades_id"];//echo "<h1>grades_id is " .$grades_id. "</h1>";
		 
		//echo 
        $basic_pay=$_GET["basic_pay"];//echo "<h1>basic_pay is " .$basic_pay. "</h1>";
	   //echo 
       $house_allowance=$_GET["house_allowance"];//echo "<h1>house_allowance is " .$house_allowance. "</h1>";
		//echo
         $conveyance_allowance=$_GET["conveyance_allowance"];//echo "<h1>conveyance_allowance is " .$conveyance_allowance. "</h1>";
		//echo
         $communication_allowance=$_GET["communication_allowance"];//echo "<h1>communication_allowance is " .$communication_allowance. "</h1>";
		//echo
         $phone_others=$_GET["phone_others"];//echo "<h1>phone_others is " .$phone_others. "</h1>";
		 
		//echo 
         $absence_deduction=$_GET["absence_deduction"];//echo "<h1>absence_deduction is " .$absence_deduction. "</h1>";
	   //echo 
       $advance_deduction=$_GET["advance_deduction"];//echo "<h1>advance_deduction is " .$advance_deduction. "</h1>";
		//echo 
       $core_deduction=$_GET["core_deduction"];//echo "<h1>core_deduction is " .$core_deduction. "</h1>";
		//echo
         $phone_others_deduction=$_GET["phone_others_deduction"];//echo "<h1>phone_others_deduction is " .$phone_others_deduction. "</h1>";
		//echo
         $incom_tax_deduction=$_GET["incom_tax_deduction"];//echo "<h1>incom_tax_deduction is " .$incom_tax_deduction. "</h1>";
   
  ?>
   <?php
//   echo"</br>";
//  echo
// $sql_select1="SELECT * FROM employee WHERE employee_no=$employee_no";
// 
//$result_select1=mysql_query($sql_select1);
//$rows122=mysql_fetch_array($result_select1);
//echo"</br>";
//   echo 'employee_no';
// echo 
// $employee_no3=$rows122['employee_no'];echo"</br>";
//  echo 'employee xyz'; 
// echo
//  $employee_name3=$rows122['employee_name'];echo"</br>";
//  echo $employee_name3 ;
//  echo"</br>";
//  ?>
 
  <?php
  
  
  
  if(isset($_GET['save']))
{
	//echo "The posted values are:<pre>";print_r($_GET);echo "</pre>";
	$slip_id2 = $_GET["slip_id2"];
	//echo "The value of the id update is:".$id2."<br />";
	
	
	//exit;
	// $user_id=$_POST['user_id'];
	// $name=$_POST['name'];

  ///// echo   $sql="update event set name=$name && date=$date && time=$time && user_id=$user_id WHERE id=$id2";
   //echo  
    $sql="update slip_salary set 
	date_salary_month='$date_salary_month',employee_no='$employee_no',employee_name='$employee_name',      job_title='$job_title',date_joining='$date_joining',date_confirm='$date_confirm',
	date_of_birth='$date_of_birth',bank_account_no='$bank_account_no',grades_id='$grades_id',
	basic_pay='$basic_pay',house_allowance='$house_allowance',conveyance_allowance='$conveyance_allowance',
	communication_allowance='$communication_allowance' ,phone_others='$phone_others' ,absence_deduction='$absence_deduction',
	advance_deduction='$advance_deduction' ,core_deduction='$core_deduction' ,phone_others_deduction='$phone_others_deduction',
	incom_tax_deduction='$incom_tax_deduction'  
         WHERE slip_id='$slip_id2'";
$result=mysql_query($sql);

//if successfully updated. 
	if($result){//echo "Successful";
	//echo "<a href=empgrade2.php>generate slip </a>";
	//echo'<br>';	
	
	}
	
	else {
	//echo "ERROR";
	}
}
  ?>
 
    <?php
 //echo 
  $sql_select12="SELECT * FROM slip_salary WHERE slip_id=$slip_id2";
   $result_select12=mysql_query($sql_select12);
  while ($rows12 = mysql_fetch_array($result_select12)) 
  {
	  
  ?>
    
<tr>
<td> <?php  //echo 'salary month is';
//echo 
 $slip_id=$rows12['slip_id'];?></td>
<td> <?php  //echo 'salary month is';
//echo $date_salary_month1=$rows12['date_salary_month'];?></td><td>
 <?php  //echo 'employee_no';
// echo 
 $employee_no1=$rows12['employee_no'];?> </td><td>
 <?php // echo 'employee_name'; 
// echo
  $employee_name1=$rows12['employee_name'];?> </td><td>
<?php //echo 
$job_title1=$rows12['job_title'];?></td><td>
<?php  //echo
 $date_joining1=$rows12['date_joining'];?></td><td>
<?php //echo 
$date_confirm1=$rows12['date_confirm'];?></td><td>
<?php //echo
 $date_of_birth1=$rows12['date_of_birth'];?> </td><td>
<?php //echo 
$bank_account_no1=$rows12['bank_account_no'];?></td><td>
<?php //echo"grade id here";
 //echo
 $grades_id1=$rows12['grades_id'];?></td><td>
<?php //echo"basic pay"; 
//echo 
$basic_pay1=$rows12['basic_pay'];?></td><td>
<?php //echo 
$house_allowance1=$rows12['house_allowance'];?></td><td>
<?php //echo 
$conveyance_allowance12=$rows12['conveyance_allowance'];?></td><td>
<?php ////echo 
$communication_allowance12=$rows12['communication_allowance'];?></td><td>
<?php //echo 
$phone_others1=$rows12['phone_others'];?></td><td>
<?php //echo 
$absence_deduction1=$rows12['absence_deduction'];?></td><td>
<?php //echo 
$advance_deduction1=$rows12['advance_deduction'];?></td><td>
<?php //echo 
$core_deduction1=$rows12['core_deduction'];?></td><td>
<?php //echo
 $phone_others_deduction1=$rows12['phone_others_deduction'];?></td><td>
<?php ////echo 
$incom_tax_deduction1=$rows12['incom_tax_deduction'];?></td>-->

<!-- <td><a href="genslip.php?slip_id=<?php //echo( $rows12['slip_id']);?>">generate slip </a>
</td> -->
</tr></table>
<?php
//echo".<br>.";
      //echo "add amount";echo "<br/>";
    //echo
     $add_total=$basic_pay+$house_allowance+$conveyance_allowance+$communication_allowance+$phone_others;
    //echo".<br>.";
     // echo "deduct amount";echo "<br/>";
   // echo
     $deduct_total=$absence_deduction+$advance_deduction+$core_deduction+$phone_others_deduction+$incom_tax_deduction;
    //echo".<br>."; echo "net salary";echo "<br/>";
    //echo
     $grand_total=$add_total-$deduct_total;
      // echo".<br>."
       ?>



<!--<div class="container">

<div class="page-header">
    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: 15px;">
        <a class="navbar-brand" href="#" target="_blank"><img src="images/DynaSoft-logo.png" alt="Logo"></a>
    </div>-->

</div>
</br></br></br><br>
<!-- Simple Invoice START -->
<div class="container">
<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: 15px;">
        <a class="navbar-brand" href="#" target="_blank"><img src="images/DynaSoft-logo.png" alt="Logo"></a>
    </div>
    <form action="" method="GET" enctype="multipart/form-data" class="form-horizontal"> 
    <div class="row">   
        <div class="col-xs-12 col-md-12 col-lg-12 ">
            <div class="text-center">
                <h2><B><U>MONTHLY PAY SLIP FOR MONTH OF <?php echo $rows12['date_salary_month'];?></U></B></h2>
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
                            <strong><?php echo $rows12['employee_no'];?>
                            </strong>
                        </div><br>
                        <div>EMPLOYEE NAME:     
                            <strong>  <?php echo $rows12['employee_name'];?>
                            </strong>
                        </div><br>
                        <div>JOB TITLE:      
                            <strong> <?php echo $rows12['job_title'];?>
                            </strong></div><br>
                        <div>DATE OF JOINING:
                            <strong><?php echo $rows12['date_joining'];?>
                            </strong>
                        </div><br>
                        <div style="color: white">DATE OF CONFIRMATION:
                            <strong><?php echo $rows12['date_confirm'];?>

                            </strong>
                        </div><br>
                        <div style="color: white">DATE OF BIRTH:
                            <strong><?php echo $rows12['date_of_birth'];?>
                              
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
                            <strong> <?php echo $rows12['grades_id'];?>
                            </strong>
                        </div><br>
                        <div>SALARY MODE:     
                            <strong> <!-- <?php //echo $rows12['date_salary_month'];?>
                            </strong> -->
                        </div><br>
                        <div>BANK ACCOUNT NO.:
                            <strong><?php echo $rows12['bank_account_no'];?>
                            </strong>
                        </div><br>
                        <div style="">STATUS:
                            <strong><?php echo $STATUS ?>
                            </strong>
                        </div><br>
                        <div style="color: white">Slip_Id
                            <strong><input type="hidden"  id="slip_id2"  name="slip_id2" value="<?php echo $rows12['slip_id'];?>" />
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
                                    <td><?php echo $rows12['basic_pay'];?>
                                    </td>
                                    <td>Absence Adjustment</td>
                                    <td><?php echo $rows12['absence_deduction'];?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>House Allowance</td>
                                    <td><?php echo $rows12['house_allowance'];?>
                                    </td>
                                    <td>Advance Adjustment</td>
                                    <td><?php echo $rows12['advance_deduction'];?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Conveyance All</td>
                                    <td><?php echo $rows12['conveyance_allowance'];?> 
                                    </td>
                                    <td>Core Adjustment</td>
                                    <td><?php echo $rows12['core_deduction'];?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Communication All</td>
                                    <td><?php echo $rows12['communication_allowance'];?>
                                    </td>
                                    <td>Phone / Others</td>
                                    <td><?php echo $rows12['phone_others_deduction'];?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Others(Arrears Jan-feb)</td>
                                    <td><?php echo $rows12['phone_others'];?>
                                    </td>
                                    <td>Income Tax</td>
                                    <td><?php echo $rows12['incom_tax_deduction'];?>
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
        
<!-- <a href="update_payslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>">update slip </a> -->           
 <!-- <a class="btn btn-outline-primary form_buttons"" href="update_payslip.php?slip_id=<?php //echo( $rows1['slip_id']);?>" type="button" value="Update"  name="Update" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-edit (alias) fa-lg"></i></a> -->
            <!-- <input type="submit" class="btn btn-outline-primary form_buttons" value="update"  name="save" style="cursor:pointer;border: 1px solid gray;padding: 10px;"/> -->

            <!-- <input type="submit" value="update" name="save" align="middle"/></center> -->
    
        </div>
        <!-- <div class="col-lg-2"> 
        </div> -->
        <div class="col-lg-4">
            <!-- <form action="gentatepayslip.php" method="GET" name="gentatepayslip" enctype="multipart/form-data" class="form-horizontal"> --> 
            <a class="btn  btn-outline-primary form_buttons" href="genratepayslip.php" style="cursor:pointer;border: 1px solid gray;padding: 10px;"><i class="fa fa-reply-all fa-lg"></i></a>
            <!-- <input class="btn btn-success form_buttons" type="Reset" value="Clear">-->
            </form> 

<?php
  }
 ?>
     
        </div>
     </div>

</div>

</body>
</html>