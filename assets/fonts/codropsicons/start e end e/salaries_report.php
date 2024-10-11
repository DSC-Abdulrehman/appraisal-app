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
 error_reporting(0);
  mysql_connect('localhost','root','');//for database connection
  mysql_select_db('payrool_management_system');
?>
    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="tab-content"><!-- search_case_status starts here -->

                  <div id="salaries_report" class=""><!-- removed "tab-pan fade in" -->
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
                        <i class="fa fa-building-o"></i>
                        <span>Salaries Report</span>
                      </div>
                    </h4>
                   </div>

                   <div class="col-lg-12">
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
                        <div class="table-responsive">
                         <table id="salaries_report_table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                           <thead>
                             <tr>
                              <th scope="col"><i class="fa fa-money"></i>Salary ID.</th>
                              <th scope="col"><i class="fa fa-male"></i>Employee ID.</th>
                              <th scope="col"><i class="fa fa-star-o"></i>Grade</th>
                               <th scope="col"><i class="fa fa-star-o"></i>Salary Month</th>
                               <th scope="col"><i class="fa fa-money"></i>
                                 Basic Pay</th>
                               <th scope="col"><i class="fa fa-plus-square-o"></i>
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
                                Core Adjustment</th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Income Tax</th>
                               <th scope="col"><i class="fa fa-minus-square-o"></i>
                                Phone/Others </th>
                               <th scope="col"><i class="fa fa-wrench">Action</th>
                             </tr>
                           </thead>

                           <tbody>
<?php 
$sql_select="SELECT * FROM salary";
$result_select=mysql_query($sql_select);
  while ($rows = mysql_fetch_array($result_select)) 
  {
?> 
                             <tr>
                               <td><?php echo $rows['salary_id']?></td>
                               <td><?php echo $rows['employee_no'];?></td>
                               <td><?php echo $rows['grade'];?></td>
                               <td><?php echo $rows['salary_month'];?></td>
                               <td><?php echo $rows['basic_pay'];?></td>
                               <td><?php echo $rows['house_allowance'];?></td>
                               <td><?php echo $rows['conveyance_allowance'];?></td>
                               <td><?php echo $rows['communication_allowance'];?></td>
                               <td><?php echo $rows['phone_others'];?></td>
                               <td><?php echo $rows['absence_deduction'];?></td>
                               <td><?php echo $rows['core_deduction'];?></td>
                               <td><?php echo $rows['phone_others_deduction'];?></td>
                               <td><?php echo $rows['employee_no'];?></td>
                               <td><span class="fa fa-edit (alias) fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span> <!-- data-toggle="modal" data-target="#scs_case_details_modal"  //removed these things: --><span></span> <span class="fa fa-trash-o fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>
                              </td> 
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