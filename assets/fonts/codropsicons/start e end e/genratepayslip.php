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

 <!-- genrate pay slip form starts here -->

                <div id="genratepayslip_form" class=""><!-- removed "tab-pan fade in" -->

                   <div class="portlet-title">
                      <h4 color="black" style="text-align:center;clear: both;font-weight: bold;margin-top: 25px;margin-bottom: 20px;">
                      <div class="caption">
                        <i class="fa fa-align-justify"></i>
                        <span> Genrate Salary of an Employee or Genrate Pay Slip </span>
                      </div>
                      </h4>
                   </div>

                  <div class="col-lg-12">
                    <div class="form"><!-- div class form starts here -->

                      <form action="payslip.php" method="GET" name="gentatepayslip" enctype="multipart/form-data" class="form-horizontal">                       
                        <br><hr>

                         <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                              <div class="col-lg-8">
                                <div class="caption">
                                 <i class="fa fa-male"></i>
                                  <label for="select_an_employee" class="form-control-label">Select an Employee [ ID and thier respective Name ]</label>
                                    <select name="empid" id="empid" class="form-control">
<?php
$query9="SELECT * FROM employee";//table from where u want to get data
$result9=mysql_query($query9);
while($person4=mysql_fetch_array($result9))
{
$employee_no=$person4['employee_no']; 
$employee_name=$person4['employee_name'];
?>
<!--drop down code-->  
<!--<option  value="<?php //echo $employee_no ?>"><?php //echo $employee_no.':'.$employee_name ?></option> <br />
--><option  value="<?php echo $employee_no ?>"><?php echo $employee_name ?></option> <br />

<?php
}?>
                                    </select>
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
                               <!-- date_of_joining=date_joining -->
                                <label for="date_salary_month" class="control-label mb-1">Salary Month <font color="red">*</font></label>
                                <!-- salary_month changed with salary_month -->
                                <input  name="date_salary_month" id="date_salary_month" type="text" class="form-control datepicker"> 
                               </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div>

                         <div> <br><hr></div>
                        <div class="row form-group">
                            <div class="col-lg-2"> 
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="submit" value="Genrate"  name="Genrate">
                               
                            </div>
                            <div class="col-lg-4">
                                <input class="btn  btn-outline-primary form_buttons" type="Reset" value="Clear">
                               
                            </div>
                            <div class="col-lg-2">
                            </div>
                         </div> 

                       </form>
                      
                    </div> <!-- div class form ends here -->
                  </div> <!-- div col-lg-12 ends here -->  
                    
                </div><!-- genrate pay slip div ends here -->
            <!-- genrate pay slip form endshere -->

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