<!-- <!doctype html> -->
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
function validate(){ 
  ///var num=document.myform.basic_pay.value; 
var num=document.myform.basic_pay.value;
var num1=document.myform.house_allowance.value;  
  var num12=document.myform.conveyance_allowance.value;  
  var num13=document.myform.communication_allowance.value;  
  var num14=document.myform.phone_others.value;  
  var num15=document.myform.absence_deduction.value;  
  var num16=document.myform.advance_deduction.value;  
  var num17=document.myform.core_deduction.value;  
  var num18=document.myform.phone_others_deduction.value;  
  var num19=document.myform.incom_tax_deduction.value;  

/*if (num==null || num=="" ) {
        alert("Name must be filled out");
        return false;*/
    
	if (isNaN(num)){  
	  document.getElementById("numloc").innerHTML="Enter Numeric value only";  
	  return false;  
	}
//}
if
(isNaN(num1))
{ document.getElementById("numloc1").innerHTML="Enter Numeric value only";  
  return false;
	}
 if
(isNaN(num12))
{ document.getElementById("numloc12").innerHTML="Enter Numeric value only";  
  return false;
	}
	if
(isNaN(num13))
{ document.getElementById("numloc13").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num14))
{ document.getElementById("numloc14").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num15))
{ document.getElementById("numloc15").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num16))
{ document.getElementById("numloc16").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num17))
{ document.getElementById("numloc17").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num18))
{ document.getElementById("numloc18").innerHTML="Enter Numeric value only";  
  return false;
	}
		if
(isNaN(num19))
{ document.getElementById("numloc19").innerHTML="Enter Numeric value only";  
  return false;
	}
  return true;  
	}
</script>
</head>
<body>
<!-- //state , pickup date , choose file -->
   
    <?php include 'header.php';?>
    <?php include "sidebar.php" ;?>
    <?php
     error_reporting(0);
     mysql_connect('localhost','root','');//for database connection
     mysql_select_db('dynasoft_pay_system');
    ?>

    <!-- Right Panel starts here -->

    <div id="right-panel" class="right-panel">

        <div class="content mt-3">
            <div class="tab-content"><!-- tab-content div starts here -->

 <!-- grades form starts here -->

                <div id="grades_form" class=""><!-- removed "tab-pan fade in" -->

                   <div class="portlet-title">
                      <h4 color="black" style="text-align:center;clear: both;font-weight: bold;margin-top: 25px;margin-bottom: 20px;">
                      <div class="caption">
                        <i class="fa fa-star-o"></i>
                        <span> Add Grades Form </span>
                      </div>
                      </h4>
                  </div>

                  <div class="col-lg-12">
                    <div class="form"><!-- div class form starts here -->
<form name="myform" onSubmit="return validate()" action="grades_form.php" method="Post" >
    
<?php /*?>
<?php 
if(!isset($_POST['save']))
 {
 ?><?php */?>
                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                              <i class="fa fa-star-o"></i>
                               <label for="grades_id" class="control-label mb-1">Grade <font color="red">*</font></label>
              <input type="text"  id="grades_id"  name="grades_id" class="form-control"/><!--<span id="numloc0"></span>
                                <input  name="grades_id" id="grades_id" type="text" class="form-control"> --> 
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
                              <i class="fa fa-money"></i>
            <label for="basic_pay" class="control-label mb-1">Basic Pay <font color="red">*</font></label>
           <input type="text"  id="basic_pay"  name="basic_pay" class="form-control"/><span id="numloc"></span> 
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
                               <i class="fa fa-plus-square-o"></i>
                                 <label for="house_allowance" class="control-label mb-1">House Allowance <!-- <font color="red">*</font> --></label>
                                 <input type="text"  id="house_allowance"  name="house_allowance" class="form-control"/><span id="numloc1"></span>
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

<!-- <div class='row'>
        <label for="email">House Allowance</label>
<input type="text"  id="house_allowance"  name="house_allowance"/><span id="numloc1"></span>
      </div> -->
                  
                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                              <i class="fa fa-plus-square-o"></i>
                               <label for="conveyance_allowance" class="control-label mb-1">Conveyance Allowance<!--  <font color="red">*</font> --></label>
                                
                               <input type="text"  id="conveyance_allowance"  name="conveyance_allowance" class="form-control"/><span id="numloc12"></span> 
                             </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

      
         <!--    <div class='row'>
        <label for="email">Conveyance Allowance</label>
<input type="text"  id="conveyance_allowance"  name="conveyance_allowance"/><span id="numloc12"></span>
      </div> -->

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-plus-square-o"></i>
                                <label for="communication_allowance" class="control-label mb-1">Communication Allowance <!-- <font color="red">*</font> --></label>
                                <!-- <input  name="communication_allowance" id="communication_allowance" type="text" class="form-control">  -->
                                <input type="text"  id="communication_allowance"  name="communication_allowance" class="form-control"/><span id="numloc13">
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>
<!-- 
    </div> -->
            <!-- <div class='row'>
        <label for="email">Communication Allowance</label>
<input type="text"  id="communication_allowance"  name="communication_allowance"/><span id="numloc13"></span>

      </div> -->

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-plus-square-o"></i>
                                <label for="phone_others" class="control-label mb-1">Other <!-- <font color="red">*</font> --></label>
                                <!-- <input  name="phone_others" id="phone_others" type="text" class="form-control"> -->
                                <input type="text"  id="phone_others"  name="phone_others" class="form-control"/><span id="numloc14"></span> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

 <!-- <div class='row'>
        <label for="email">Phone_others</label>
<input type="text"  id="phone_others"  name="phone_others"/><span id="numloc14"></span>

      </div> -->

                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="absence_deduction" class="control-label mb-1">Absence Deduction<!-- <font color="red">*</font> --></label>
                                <!-- <input  name="absence_deduction" id="absence_deduction" type="text" class="form-control">  -->
                                <input type="text"  id="absence_deduction"  name="absence_deduction" class="form-control"/><span id="numloc15"></span>
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

            <!--  <div class='row'>
        <label for="email">Absence Deduction</label>
<input type="text"  id="absence_deduction"  name="absence_deduction"/><span id="numloc15"></span>

      </div>
 -->
                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="advance_deduction" class="control-label mb-1">Advance Deduction<!-- <font color="red">*</font> --></label>
                                <!-- <input  name="advance_deduction" id="advance_deduction" type="text" class="form-control"> --> 
                                <input type="text"  id="advance_deduction"  name="advance_deduction" class="form-control"/><span id="numloc16"></span>
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>


             <!-- <div class='row'>
        <label for="email">Advance Deduction</label>
<input type="text"  id="advance_deduction"  name="advance_deduction"/><span id="numloc16"></span>

      </div> -->

                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="core_deduction" class="control-label mb-1">Core Deduction <!-- <font color="red">*</font> --></label>
                                <!-- <input  name="core_deduction" id="core_deduction" type="text" class="form-control"> -->
                                <input type="text"  id="core_deduction"  name="core_deduction" class="form-control"/><span id="numloc17"></span>
                               </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

             <!-- <div class='row'>
        <label for="email">Core Deduction</label>
<input type="text"  id="core_deduction"  name="core_deduction"/><span id="numloc17"></span>

      </div> -->

                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-minus-square-o"></i>
                                <label for="phone_other" class="control-label mb-1">Phone/Other <font color="red"></font></label>
                                <!-- <input  name="phone_other" id="phone_other" type="text" class="form-control"> -->
                                <input type="text"  id="phone_others_deduction"  name="phone_others_deduction" class="form-control"/><span id="numloc18"></span>
                              </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

             <!-- <div class='row'>
        <label for="email">Phone_others Deduction</label>
<input type="text"  id="phone_others_deduction"  name="phone_others_deduction"/><span id="numloc18"></span>
      </div> -->

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-minus-square-o"></i>
                                <label for="incom_tax_deduction" class="control-label mb-1">Income Tax Deduction<!--  <font color="red">*</font> --></label>
                                <!-- <input  name="incom_tax_deduction" id="incom_tax_deduction" type="text" class="form-control"> -->
                                <input type="text"  id="incom_tax_deduction"  name="incom_tax_deduction" class="form-control"/><span id="numloc19"></span>
                              </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>


             <!-- <div class='row'>
        <label for="email">Incom Tax Deduction</label>
<input type="text"  id="incom_tax_deduction"  name="incom_tax_deduction"/><span id="numloc19"></span>

      </div> -->
            <!-- <div class='row'>
        <label for='firstname'>Employee No</label>
<input type="text"  id="employee_no"  name="employee_no"/>

      </div> -->
       <!--      <input type="submit" value="submit"> 
<input type="Reset" value="Clear">
</ul></p>
 </form> -->

 <div> <br><hr></div>
                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-4">
                         <input class="btn  btn-outline-primary form_buttons" type="submit" value="submit"  name="save">
                               <!--  <input type="submit" value="submit"> -->
                               
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="Reset" value="Clear">
                               <!-- <input type="Reset" value="Clear"> -->
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> 
 
                      </form>
                      <!-- <form action="" method="post" enctype="multipart/form-data" class="form-horizontal"> -->                       
                        <br><hr>

<!--                          <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                              <div class="col-lg-8">
                                <div class="caption">
                                 <i class="fa fa-male"></i>
                                  <label for="select_an_employee" class="form-control-label">Select an Employee</label>
                                    <select name="select_an_employee" id="select_an_employee" class="form-control">
                                      <option value="0" selected></option>
                                      <option value="1">DSC-001</option>
                                      <option value="2">DSC-002</option>
                                      <option value="3">DSC-003</option>
                                      <option value="4">DSC-004</option>
                                      <option value="5">DSC-005</option>
                                    </select>
                                </div>
                              </div>
                            <div class="col-lg-2">
                            </div>
                         </div>
 -->

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                              <div class="col-lg-8">
                                <div class="caption">
                                 <i class="fa fa-male"></i>
                                  <label for="select_an_employee" class="form-control-label">Select an Employee [ ID and thier respective Name ]</label>
                                    <select name="empid" id="empid" class="form-control"> -->
                                      <?php /*?><?php
$query9="SELECT * FROM employee";//table from where u want to get data
$result9=mysql_query($query9);
while($person4=mysql_fetch_array($result9))
{
$employee_no=$person4['employee_no']; 
$employee_name=$person4['employee_name'];
?>
<!--drop down code-->  
<option  value="<?php echo $employee_no ?>"><?php echo $employee_no.':'.$employee_name ?></option> <br />
<?php
}?> <?php */?>
                                  <!--   </select>
                                </div>
                              </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                        <!--  <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                              <i class="fa fa-star-o"></i>
                               <label for="grades_id" class="control-label mb-1">Grade <font color="red">*</font></label>
                               <input  name="grades_id" id="grades_id" type="text" class="form-control"> 
                             </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-money"></i>
                                 <label for="basic_pay" class="control-label mb-1">Basic Pay <font color="red">*</font></label>
                                 <input  name="basic_pay" id="basic_pay" type="text" class="form-control"> 
                              </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                        <!-- <div>
                          <br><hr>
                        </div> -->

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-plus-square-o"></i>
                                 <label for="house_allowance" class="control-label mb-1">House Allowance --> <!-- <font color="red">*</font> --><!-- </label>
                                 <input  name="house_allowance" id="house_allowance" type="text" class="form-control">
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                        <!--  <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                              <i class="fa fa-plus-square-o"></i>
                               <label for="conveyance_allowance" class="control-label mb-1">Conveyance Allowance --><!--  <font color="red">*</font> --><!-- </label>
                               <input  name="conveyance_allowance" id="conveyance_allowance" type="text" class="form-control"> 
                             </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-plus-square-o"></i>
                                <label for="communication_allowance" class="control-label mb-1">Communication Allowance --> <!-- <font color="red">*</font> --><!-- </label>
                                <input  name="communication_allowance" id="communication_allowance" type="text" class="form-control"> 
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
                               <i class="fa fa-plus-square-o"></i>
                                <label for="phone_others" class="control-label mb-1">Other --> <!-- <font color="red">*</font> --><!-- </label>
                                <input  name="phone_others" id="phone_others" type="text" class="form-control"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>
 
                          <div> <br><hr></div>
                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="absence_deduction" class="control-label mb-1">Absence Deduction --><!-- <font color="red">*</font> --><!-- </label>
                                <input  name="absence_deduction" id="absence_deduction" type="text" class="form-control"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                        <!--  <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="advance_deduction" class="control-label mb-1">Advance Deduction --><!-- <font color="red">*</font> --><!-- </label>
                                <input  name="advance_deduction" id="advance_deduction" type="text" class="form-control"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->


                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                               <div class="caption">
                               <i class="fa fa-minus-square-o"></i>
                                <label for="core_deduction" class="control-label mb-1">Core Deduction  --><!-- <font color="red">*</font> --><!-- </label>
                                <input  name="core_deduction" id="core_deduction" type="text" class="form-control">
                               </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                         <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-minus-square-o"></i>
                                <label for="incom_tax_deduction" class="control-label mb-1">Income Tax Deduction --><!--  <font color="red">*</font> --><!-- </label>
                                <input  name="incom_tax_deduction" id="incom_tax_deduction" type="text" class="form-control">
                              </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> -->

                        <!-- <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-8">
                              <div class="caption">
                              <i class="fa fa-minus-square-o"></i>
                                <label for="phone_other" class="control-label mb-1">Phone/Other <font color="red"></font></label>
                                <input  name="phone_other" id="phone_other" type="text" class="form-control">
                              </div> 
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>
 -->
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
                         </div>

                         <div class="row form-group">
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
                         </div>


                        <br><hr>

                        <div class="row form-group">
                          <div class="col-lg-6 left_padding right_padding_md">
                            <label for="rrr_receiver_post_code" class="control-label mb-1">Post Code<font color="red">*</font></label>
                            <input  name="rrr_receiver_post_code" type="text" class="form-control" id="rrr_receiver_post_code" />
                          </div>
                          <div class="col-lg-6 right_padding left_padding right_padding_md">
                            <label for="rrr_receiver_state" class="control-label mb-1">State<font color="red">*</font></label>
                            <select name="rrr_receiver_state" id="rrr_receiver_state" class="form-control">
                              <option value="victoria" selected>Victoria</option>
                              <option value="new_south_wales">New South Wales</option>
                              <option value="south_australia">South Australia</option>
                            </select>
                          </div>
                        </div>

                        <br><hr>

                        <div class="row form-group">
                            <div class="col-lg-6 left_padding right_padding_md">
                              <label for="rrr_pick_up_from_date">Pickup From Date</label>
                              <input type="text" name="rrr_pick_up_from_date" class="form-control datepicker" >                                  
                            </div>
                            <div class="col-lg-2 right_padding_md left_padding_md">
                              <label for="rrr_pick_up_time_from">Pickup Time(From)</label>
                              <input type="text" name="rrr_pick_up_time_from" class="form-control timepicker">
                            </div>
                            <div class="col-lg-2 right_padding_md left_padding_md">
                              <label for="rrr_pick_up_time_to">Pickup Time(To)</label>
                              <input type="text" name="rrr_pick_up_time_to" class="form-control timepicker">
                            </div>
                            <div class="col-lg-2 right_padding left_padding">
                              <label for="rrr_service_level">Service Level</label>                        
                                 <select name="rrr_service_level" class="form-control">
                                  <option></option>
                                  <option value="">Logistics - Labour</option>
                                  <option value="">Logistics - Parcel</option>
                                  <option value="">Logistics - ROS</option>
                                  <option value="">Logistics - Tailgate</option>
                                 </select>
                            </div>
                        </div>  

                        <div class="row form-group">
                          <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">To Upload your File, Click</label>
                          </div>
                          <div class="col-12 col-md-9">
                            <input type="file" id="rrr_file_upload" name="rrr_file_upload" class="form-control-file">
                          </div>
                        </div>
 -->
                        <!-- <div> <br><hr></div>
                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="submit" value="save"  name="save">
                               
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="Reset" value="Clear">
                               
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> 

                      </form>
                       -->
<?php
/*  $salary_id=$_POST['salary_id'];
*/
// $grades_id=$_POST['grades_id'];  
// $basic_pay=$_POST['basic_pay'];//variable declare
// //$salary_month=$_POST['salary_month'];
// $house_allowance=$_POST['house_allowance'];
// $conveyance_allowance=$_POST['conveyance_allowance'];
// $communication_allowance=$_POST['communication_allowance'];
// $phone_others=$_POST['phone_others'];
// $absence_deduction=$_POST['absence_deduction'];
// $advance_deduction=$_POST['advance_deduction'];
// $core_deduction=$_POST['core_deduction'];
// $phone_others_deduction=$_POST['phone_others_deduction'];
// $incom_tax_deduction=$_POST['incom_tax_deduction'];
// //$employee_no=$_POST['empid'];//removed:employee_id
// echo  
// $query='INSERT INTO grades(`basic_pay`,`grades`,`house_allowance`,`conveyance_allowance`,`communication_allowance`,`phone_others`,`absence_deduction`,`advance_deduction`,`core_deduction`
// ,`phone_others_deduction`,`incom_tax_deduction`)
// VALUES("'.$basic_pay.'","'.$grades.'","'.$house_allowance.'","'.$conveyance_allowance.'","'.$communication_allowance.'","'.$phone_others.'","'.$absence_deduction.'","'.$advance_deduction.'","'.$core_deduction.'","'.$phone_others_deduction.'","'.$incom_tax_deduction.'","'.$employee_no.'")
// ;
// ';

  
/*  $salary_id=$_POST['salary_id'];
*/  $grades_id=$_POST['grades_id'];
  $basic_pay=$_POST['basic_pay'];//variable declare
  /*$grade=$_POST['grade'];
  $salary_month=$_POST['salary_month'];*/
    $house_allowance=$_POST['house_allowance'];
  $conveyance_allowance=$_POST['conveyance_allowance'];
    $communication_allowance=$_POST['communication_allowance'];
  $phone_others=$_POST['phone_others'];
  $absence_deduction=$_POST['absence_deduction'];
    $advance_deduction=$_POST['advance_deduction'];
  $core_deduction=$_POST['core_deduction'];
  $phone_others_deduction=$_POST['phone_others_deduction'];
  $incom_tax_deduction=$_POST['incom_tax_deduction'];
/*  $employee_no=$_POST['employee_no'];
*/
//echo  
$query='INSERT INTO grades(`grades_id`,`basic_pay`,`house_allowance`,`conveyance_allowance`,`communication_allowance`,`phone_others`,`absence_deduction`,`advance_deduction`,`core_deduction`
,`phone_others_deduction`,`incom_tax_deduction`)
  VALUES("'.$grades_id.'","'.$basic_pay.'","'.$house_allowance.'","'.$conveyance_allowance.'","'.$communication_allowance.'","'.
  $phone_others.'","'.$absence_deduction.'","'.$advance_deduction.'","'.$core_deduction.'","'.$phone_others_deduction.'","'.$incom_tax_deduction.'")
;
';

mysql_query($query);;              
//}
?>
                    </div> <!-- div class form ends here -->
                  </div> <!-- div col-lg-12 ends here -->  
                    
                </div><!-- salary div ends here -->
            <!-- salary form endshere -->

            </div> <!-- tab-content div ends here -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel ends here -->

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