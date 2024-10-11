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

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<body>
   
    <?php include 'header.php';?>
    <?php include "sidebar.php" ;?>

 <!-- salary form starts here -->

    <!-- Right Panel -->

<?php
// error_reporting(0);
 // mysql_connect('localhost','root','');//for database connection
 // mysql_select_db('dynasoft_pay_system');
?>

<?php
// error_reporting(0);
  $con = mysqli_connect("localhost","root","","dynasoft_pay_system");
  //$display=mysqli_query($con,$sql_select);
//while ($rows1=mysqli_fetch_array($display))
?>
    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="tab-content"><!-- search_case_status starts here -->

                  <div id="payroll_history_report" class=""><!-- removed "tab-pan fade in" -->
                   <!-- <div class="modal fade" id="scs_case_details_modal" role="dialog">
                    <div class="modal-dialog">  -->                               
                      <!-- Modal content-->
                      <!-- <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="scs_case_details_modal_label">Case Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                    <div class="modal-body custom-modal"> -->
                    <!-- <div class="form-group"> 
                        <label>Created Date:</label> 
                    </div>
                      
                    <div class="form-group"> 
                      <label>Case Id:</label> 
                    </div>
                   
                    <div class="form-group"> 
                      <label>Customer Name:</label> 
                    </div>
                
                    <div class="form-group"> 
                      <label>Con Note:</label>
                    </div>

                    <div class="form-group"> 
                      <label>Pick Up Company:</label>  
                    </div>

                    <div class="form-group"> 
                    <label>Sender Contact Name:</label>
                    </div>

                    <div class="form-group"> 
                    <label>Pick up Suburb: </label> 
                    </div>

                    <div class="form-group"> 
                    <label>Receiver Company Name:</label> 
                    </div>

                    <div class="form-group"> 
                    <label>Receiver Contact Name:</label>
                    </div>

                    <div class="form-group"> 
                    <label>Receiver Company Suburb:</label> 
                    </div>

                    <div class="form-group"> 
                    <label>Carrier Name:</label>
                    
                    </div>
                    <div class="form-group"> 
                    <label>Carrier Service Level:</label> 
                    </div>

                    <div class="form-group"> 
                    <label>Pick Up Date:</label> 
                    </div>

                    <div class="form-group"> 
                    <label>Estimated Cost:</label>
                    </div> -->
                    
                       <!--  </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>           
                   </div>
                  </div> -->
                  
                   <div class="portlet-title">
                    <h4 color="black" style="text-align:center;clear: both;font-weight: bold;margin-top: 25px;margin-bottom: 20px;">
                      <div class="caption">
                        <i class="fa fa-history"></i>
                        <span>Payroll History Report</span>
                      </div>
                    </h4>
                   </div>

                   <div class="col-lg-12 table-responsive">
                     <div class="card">
                      <div class="card-body custom-date-top">

<!--                        <div class="row form-group">
                            <div class="col-lg-4"> 
                            </div>
                              <div class="col-lg-4">
                            
                                <div class="caption">
                                 <i class="fa fa-male"></i>
                                  <label for="select_an_employee_salary" class="form-control-label">Select an Employee</label>
                                    <select name="select_an_employee_salary" id="select_an_employee_salary" class="form-control">
                                      <option value="0" selected></option>
                                      <option value="1">DSC-001</option>
                                      <option value="2">DSC-002</option>
                                      <option value="3">DSC-003</option>
                                      <option value="4">DSC-004</option>
                                      <option value="5">DSC-005</option>
                                    </select>
                                </div>
                              </div>
                             <div class="col-lg-4">
                             </div>
                          </div> -->
                       <!-- <div class="col-lg-6 form-group custom-date">
                         <div class="col-lg-3" >
                           <label>Start Date:<input type="text" name="scs_start_date" class="form-control datepicker"></label>
                         </div>
                         <div class="col-lg-3">
                           <label>End Date:<input type="text" name="scs_end_date" class="form-control datepicker"></label>
                         </div>
                       </div>
 -->                     
                        <div class="">
                         <table id="payroll_history_report_table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                          <!-- <table id="salaries_report_table" class="table table-striped table-bordered display" cellspacing="0" width="100%"> -->
                           <thead>
                             <tr>
                              <th scope="col"><i class="fa fa-money"></i>Salary ID.</th>
                              <th scope="col"><i class="fa fa-calendar"></i>Salary Month</th>
                              <th scope="col"><i class="fa fa-sort-numeric-asc"></i>Employee ID.</th>
                              <th scope="col"><i class="fa fa-male"></i>Employee Name.</th>
                              <!-- <th scope="col"><i class="fa fa-star-o"></i>Grade</th> -->
                               <th scope="col"><i class="fa fa-hand-o-right"></i> Job Title</th>
                               <th scope="col"><i class="fa fa-calendar"></i> Date of Joining</th>
                              <th scope="col"><i class="fa fa-calendar"></i> Date of Confirmation</th>
                              <!--<th scope="col"><i class="fa fa-calendar"></i> Date of Birth</th>-->
                              <th scope="col"><i class="fa fa-building-o"></i> Bank Account No.</th>
                              <th scope="col"><i class="fa fa-star-o"></i>Grade</th>
                              <th scope="col"><i class="fa fa-money"></i>
                                 Basic Pay</th>
                               <!--<th scope="col"><i class="fa fa-plus-square-o"></i>
                                 House Allowance</th>
                               <th scope="col"><i class="fa fa-plus-square-o"></i>
                               Conveyance Allowance</th>
                               <th scope="col"><i class="fa fa-plus-square-o"></i>
                                Communication Allowance</th>
                               <th scope="col"><i class="fa fa-plus-square-o"></i>
                                Other </th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Absence Adjustment</th>
                                <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Advance Adjustment</th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Core Adjustment</th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Income Tax</th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Phone/Others </th>-->
                                <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Net Pay</th>
                               <!-- <th scope="col"><i class="fa fa-wrench">Action</th> -->
                             </tr>
                           </thead>

                           <tbody>
<?php //echo
//$sql_select="SELECT * FROM slip_salary";
//$result_select=mysql_query($sql_select);
//$rows = mysql_fetch_array($result_select);
  
//echo".<br>.";
 //     echo "add amount";echo "<br/>";
 //   echo// $add_total=$basic_pay+$house_allowance+$conveyance_allowance+$communication_allowance+$phone_others;
  //  echo".<br>.";
  //    echo "deduct amount";echo "<br/>";
  //  echo //$deduct_total=$absence_deduction+$advance_deduction+$core_deduction+$phone_others_deduction+$incom_tax_deduction;
   // echo".<br>."; echo "net salary";echo "<br/>";
   // echo// $grand_total=$add_total-$deduct_total;
    //   echo".<br>."
      
?> 
<?php
$sql_select="SELECT * FROM  slip_salary";
$result_select=mysqli_query($con,$sql_select);
  while ($rows1= mysqli_fetch_assoc($result_select)) 
  {
   ?>
                             <tr>
                               <td><?php echo $slip_id=$rows1['slip_id'];?></td>
                               <td><?php echo $date_salary_month1=$rows1['date_salary_month'];?></td>
                               <td><?php echo $employee_no1=$rows1['employee_no'];?></td>
                               <td><?php echo $employee_name1=$rows1['employee_name'];?></td>
                               <td><?php echo $job_title1=$rows1['job_title'];?></td>
                               <td><?php echo $date_joining1=$rows1['date_joining'];?></td>
                               <td><?php echo $date_confirm1=$rows1['date_confirm'];?></td>
                               <!--<td><?php //echo $date_of_birth1=$rows1['date_of_birth'];?> </td>-->
                               <td><?php echo $bank_account_no1=$rows1['bank_account_no'];?></td>
                               <td><?php echo $grades_id1=$rows1['grades_id'];?></td>
                               <td><?php echo $basic_pay1=$rows1['basic_pay'];?></td>
                               <!--<td><?php //echo $house_allowance1=$rows1['house_allowance'];?></td>
                               <td><?php //echo $conveyance_allowance1=$rows1['conveyance_allowance'];?></td>
                               <td><?php //echo $conveyance_allowance1=$rows1['communication_allowance'];?></td>
                               <td><?php //echo $phone_others1=$rows1['phone_others'];?></td>
                               <td><?php //echo $absence_deduction1=$rows1['absence_deduction'];?></td>
                               <td><?php //echo $advance_deduction1=$rows1['advance_deduction'];?></td>
                               <td><?php //echo $core_deduction1=$rows1['core_deduction'];?></td>
                               <td><?php //echo $phone_others_deduction1=$rows1['phone_others_deduction'];?></td>
                               <td><?php //echo $incom_tax_deduction1=$rows1['incom_tax_deduction'];?></td>-->
                               <td><?php 
$addition_total=$rows1['basic_pay']+$rows1['house_allowance']+$rows1['conveyance_allowance']+$rows1['communication_allowance']+$rows1['phone_others']; echo"<br>";
$deduction_total=$rows1['absence_deduction']+$rows1['advance_deduction']+$rows1['core_deduction']+$rows1['phone_others_deduction']+$rows1['incom_tax_deduction'];

echo $total=$addition_total-$deduction_total;

?></td>
                               <!-- <td><span class="fa fa-edit (alias) fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span> -->
                                <!-- data-toggle="modal" data-target="#scs_case_details_modal"  //removed these things: -->
                                <!-- <span></span> 
                                <span class="fa fa-trash-o fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>
                              </td>  -->
                             </tr>
<?php
}

  ?>
                             <!-- <tr>
                               <td>DSC-102</td>
                               <td>Employee Name 102</td>
                               <td>0123456789102</td>
                               <td>Frontend Senior Software Engineer</td>
                               <td>01-01-2002</td>
                               <td>01-01-2016</td>
                               <td>01-03-2016</td>
                               <td>01-01-2016</td>
                               <td>01-03-2016</td>
                               <td>01-03-2016</td>
                               <td><span class="fa fa-edit (alias) fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>  --><!-- data-toggle="modal" data-target="#scs_case_details_modal"  //removed these things: --><!-- <span></span> <span class="fa fa-trash-o fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>
                              </td> 
                             </tr> -->

                           </tbody>
                         </table> 
                        </div>  
                       </div>
                      </div>
                   </div>
                   
                  </div> <!--  search_case_status starts here -->

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