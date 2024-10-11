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

<?php
error_reporting(0);
mysql_connect('localhost','root','');//for database connection
mysql_select_db('dynasoft_pay_system');
?>

 <!-- salary form starts here -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <div class="content mt-3">
            <div class="tab-content"><!-- search_case_status starts here -->

                  <div id="employees_report" class=""><!-- removed "tab-pan fade in" -->
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
                        <span>Employees Report</span>
                      </div>
                    </h4>
                   </div>

                   <div class="col-lg-12">
                    <form action="employee_form.php" method="Post" enctype="multipart/form-data" class="form-horizontal">
                     <div class="card">
                      <div class="card-body custom-date-top">

                       <!-- <div class="col-lg-6 form-group custom-date">
                         <div class="col-lg-3" >
                           <label>Start Date:<input type="text" name="scs_start_date" class="form-control datepicker"></label>
                         </div>
                         <div class="col-lg-3">
                           <label>End Date:<input type="text" name="scs_end_date" class="form-control datepicker"></label>
                         </div>
                       </div>
 -->
                         <table id="employees_report_table" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                           <thead>
                             <tr>
                               <th scope="col"> <i class="fa fa-sort-numeric-asc"></i> Employee ID.</th>
                               <th scope="col"> <i class="fa fa-male"></i> Employee Name</th>
                               <th scope="col"> <i class="fa fa-hand-o-right"></i> Job Title</th>
                               <th scope="col"> <i class="fa fa-calendar"></i> Date of Joining</th>
                               <th scope="col"> <i class="fa fa-calendar"></i> Date of Confirmation</th>
                               <th scope="col"> <i class="fa fa-calendar"></i> Date of birth</th>
                               <th scope="col"> <i class="fa fa-building-o"></i> Bank Account No.</th>
                               <th scope="col"> <i class="fa fa-star-o"></i> Grade.</th>
                               <!--<th scope="col"> <i class="fa fa-wrench"></i> Action</th>-->
                             </tr>
                           </thead>
                           <tbody>
<?php
$sql_select="SELECT * FROM employee";
$result_select=mysql_query($sql_select);
while ($rows = mysql_fetch_array($result_select)) 
{
?>

                             <tr>
                               <td><?php echo "DSC-".$rows['employee_no']?></td>
                               <td><?php echo $rows['employee_name'];?> </td>
                               <td><?php echo $rows['job_title'];?></td>
                               <td><?php echo $rows['date_joining'];?></td>
                               <td><?php echo $rows['date_confirm'];?></td>
                               <td><?php echo $rows['date_of_birth'];?></td>
                               <td><?php echo $rows['bank_account_no'];?></td>
                               <td><?php echo $rows['grades_id'];?></td>
                               <!--<td><span class="fa fa-edit (alias) fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span> <!-- data-toggle="modal" data-target="#scs_case_details_modal"  //removed these things: --><!--<span></span> <span class="fa fa-trash-o fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>
                              </td>-->
                             </tr>

                             <!-- <tr>
                               <td>DSC-103</td>
                               <td>Employee Name 103</td>
                               <td>0123456789103</td>
                               <td>Interne' Senior Software Engineer</td>
                               <td>01-01-2003</td>
                               <td>01-02-2018</td>
                               <td>Null Value</td>
                               <td><span class="fa fa-edit (alias) fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span> --> <!-- data-toggle="modal" data-target="#scs_case_details_modal"  //removed these things: --><!-- <span></span> <span class="fa fa-trash-o fa-lg" style="cursor:pointer;border: 1px solid gray;padding: 10px;"></span>
                              </td> 
                             </tr> -->
<?php
}
?>
                           </tbody>
                         </table>   
                       </div>
                      </div>
                    </form>  
                   </div>
                   
                  </div> <!--  search_case_status starts here -->

                </div> <!-- tab-content div ends here -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    
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