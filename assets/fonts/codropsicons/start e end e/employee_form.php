<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin|DYNASOFT PAY SYSTEM</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="icon" href="logo.png" sizes="32x32">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/common.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.min.css">

    <link href="assets/css/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script>
function validateForm() {
    var y = document.forms["myForm"]["employee_no"].value;
    var x = document.forms["myForm"]["employee_name"].value;
    var a = document.forms["myForm"]["job_title"].value;
        var b = document.forms["myForm"]["date_joining"].value;
        //var c = document.forms["myForm"]["date_confirm"].value;
        var d = document.forms["myForm"]["date_of_birth"].value;
       // var e = document.forms["myForm"]["bank_account_no"].value;
        var f = document.forms["myForm"]["grades_id"].value;

    if (y==null || y=="" ) {
        alert("Employee Number must be filled out");
        return false;
    }
    else
    if (x==null || x=="" ) {
        alert("Name must be filled out");
        return false;
    }
    else
    if (a==null || a=="" ) {
        alert("Job Title must be filled out");
        return false;
    }
    else
    if (b==null || b=="" ) {
        alert("Date Joining must be filled out");
        return false;
    }
    else
    if (c==null || c=="" ) {
        alert("Date Confirm must be filled out");
        return false;
    }
    else
    if (d==null || d=="" ) {
        alert("Date of Birth must be filled out");
        return false;
    }
    else
    if (e==null || e=="" ) {
        alert("Bank Account no must be filled out");
        return false;
    }
    else
    if (f==null || f=="" ) {
        alert("Grade must be filled out");
        return false;
    }
}
</script> 
</head>
<body>
    <?php
    error_reporting(0);
    mysql_connect('localhost','root','');//for database connection
    mysql_select_db('dynasoft_pay_system');//aatest payrool_management_system
    ?>
    <?php include 'header.php';?>
    <?php include "sidebar.php" ;?>
    
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="content mt-3">
            <div class="tab-content">
               
<!-- employee form starts here -->

               <div id="employee_form" class="" >
  <!-- removed "tab-pan fade in" -->

                   <div class="portlet-title">
                      <h4 color="black" style="text-align:center;clear: both;font-weight: bold;margin-top: 25px;margin-bottom: 20px;">
                      <div class="caption">
                        <i class="fa fa-male"></i>
                        <span> Add Employee Form </span>
                      </div>
                      </h4>
                    </div>

                <!-- div col-lg-12 starts here -->  
                  <div class="col-lg-12">
                    <div class="form">
<!-- employee_form.php=emp_register.php -->
                      <form name="myForm" onsubmit="return validateForm()" action="employee_form.php" method="Post" enctype="multipart/form-data" class="form-horizontal">

                    <div> <br><hr></div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-sort-numeric-asc"></i>
                                <label for="employee_no" class="control-label mb-1">Employee ID.  DSC- <font color="red">*</font></label>
                                 <input  name="employee_no" id="employee_no" type="text" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-male"></i>
                                 <label for="employee_name" class="control-label mb-1">Employee Name <font color="red">*</font></label>
                                 <input  name="employee_name" id="employee_name" type="text" class="form-control"> 
                              </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-hand-o-right"></i>
                                <label for="job_title" class="control-label mb-1">Job Title <font color="red">*</font></label>
                                <input  name="job_title" id="job_title" type="text" class="form-control"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>
<!-- 
                       <div class="col-lg-6 form-group custom-date">
                         <div class="col-lg-3" >
                           <label>Start Date:<input type="text" name="scs_start_date" class="form-control datepicker"></label>
                         </div>
                         <div class="col-lg-3">
                           <label>End Date:<input type="text" name="scs_end_date" class="form-control datepicker"></label>
                         </div>
                       </div> -->

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_joining=date_joining -->
                                <label for="date_joining" class="control-label mb-1">Date of Joining <font color="red">*</font></label>
                                <input  name="date_joining" id="date_joining" type="text" class="form-control edatepicker"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_confirmation=date_confirm -->
                                <label for="date_confirm" class="control-label mb-1">Date of Confirmation <!-- <font color="red">*</font> --></label>
                                <input  name="date_confirm" id="date_confirm" type="text" class="form-control edatepicker">
                               </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-calendar"></i>
                                <label for="date_of_birth" class="control-label mb-1">Date of Birth<font color="red">*</font></label>
                                <input  name="date_of_birth" id="date_of_birth" type="text" class="form-control edatepicker"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-building-o"></i>
                                 <label for="bank_account_no" class="control-label mb-1">Bank Account No. <!-- <font color="red">*</font> --></label>
                                 <input  name="bank_account_no" id="bank_account_no" type="text" class="form-control">
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                              <div class="col-lg-8">
                                <div class="caption">
                                 <i class="fa fa-star-o"></i>
                                  <label for="select_an_employee" class="form-control-label">Grade.</label>
                                    <select name="grades_id" id="grades_id" class="form-control">
<?php
$query9="SELECT * FROM grades";//table from where u want to get data
$result9=mysql_query($query9);
while($grade4=mysql_fetch_array($result9))
{
$grades_id=$grade4['grades_id']; 
$basic_pay=$grade4['basic_pay'];
?>
<!--drop down code-->  
<option  value="<?php echo $grades_id ?>"><?php echo $grades_id.':'.$basic_pay ?></option> <br />

<?php
}?>
                                    </select>
                                </div>
                              </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-align-justify"></i>
                                <label for="customer_reference" class="control-label mb-1">Customer Reference <font color="red">*</font></label>
                                <input  name="customer_reference" id="customer_reference" type="text" class="form-control">
                              </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->
                         <!-- INSERT INTO `state`(`statename`, `countryid`, `date`) VALUES (1,1,STR_TO_DATE('03/08/2009', '%m/%d/%Y'))


SELECT  `stateid` ,  `statename` ,  `countryid` , DATE_FORMAT(  'date',  '%d/%m/%Y' ) 
FROM  `state`

$originalDate = "2010-03-21";
$newDate = date("d-m-Y", strtotime($originalDate)); -->

                       <div> <br><hr></div>
                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons"  type="Submit" value="save"  name="save">
                               
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="Reset" value="Clear">
                               
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> 
                           
                      </form>
  <?php
$employee_no=$_POST['employee_no'];
$employee_name=$_POST['employee_name'];
$job_title=$_POST['job_title'];
$date_joining=$_POST['date_joining'];
$date_confirm=$_POST['date_confirm'];
$date_of_birth=$_POST['date_of_birth'];
$bank_account_no=$_POST['bank_account_no'];
$grades_id=$_POST['grades_id'];//"'.STR_TO_DATE('.$date_of_birth.','%m/%d/%Y').'" 
  
  ?>
  <?php 
//echo'<br>';
//exit;
// echo

  //$query22="SELECT * FROM employee WHERE employee_no=$employee_no AND employee_name='$employee_name' AND date_joining='$date_joining' AND grades_id='$grades_id'";
 
/*echo $query22="SELECT * FROM slip_salary WHERE employee_no =$empid AND date_salary_month=";
*/
//$query22="SELECT * FROM employee WHERE employee_no=$employee_no";//=1
//$result=mysql_query($query22);//=1
//$num_rows=mysql_num_rows($result);//=1
//echo'<br>';
    //echo 
    //'row  is';//=1

   // echo
     //$num_rows;//=1
   // echo'<br>';

/*  if (1 <= 0)
*/  
//if ($num_rows <= 0)//=1
   //  { //=1
 
 if($employee_no!="")
 {
//echo "<strong> Result:</strong>Entered";

$query=  'INSERT INTO employee(`employee_no`,`employee_name`,`job_title`,`date_joining`,`date_confirm`,`date_of_birth`,`bank_account_no`,`grades_id`)
VALUES("'.$employee_no.'","'.$employee_name.'","'.$job_title.'","'.$date_joining.'","'.$date_confirm.'","'.$date_of_birth.'","'.$bank_account_no.'" ,"'.$grades_id.'")
  ;
';
        
mysql_query($query);  
} 
//}//=1
//else//=1
//{//=1
  //echo"<strong> Result:</strong>Sorry! Already exit";//=1
//echo"Sorry! Already exit entered Employee No. and thier Grade can't enter again." ;
//}//=1


//}
?>

                        
                    </div> <!-- div class form ends here -->
                  </div> <!-- div col-lg-12 ends here -->  
                </div>

                 <!-- employee form div ends here -->
    
            </div> <!-- tab-content div ends here -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/jquery.timepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/common.js"></script>
    
   <script>
       
   </script>
    
</body>
</html>

