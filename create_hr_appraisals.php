

<?php
include_once("connect.php");
$year1=0;
$start_month_year="";
$curr_month_year="";
$date=date("Y-m-d");
$date = explode('-', $date);
$month = $date[1];
$day   = $date[2];
$year  = $date[0];
$year1=$year-1;

if ($month==1) {
	$start_month_year="Jan $year";
    $curr_month_year="Dec $year";
      }
if ($month==2) {
	$start_month_year="Feb $year1";
    $curr_month_year="Jan $year";
      }
 if ($month==3) {
	$start_month_year="Mar $year1";
    $curr_month_year="Feb $year";
      }
 if ($month==4) {
	$start_month_year="Apr $year1";
    $curr_month_year="Mar $year";
      }

 if ($month==5) {
	$start_month_year="May $year1";
    $curr_month_year="Apr $year";
      }

      if ($month==6) {
	$start_month_year="Jun $year1";
    $curr_month_year="May $year";
      }

      if ($month==7) {
	$start_month_year="Jul $year1";
    $curr_month_year="Jun $year";
      }

      if ($month==8) {
	  $start_month_year="Aug $year1";
      $curr_month_year="Jul $year";
      }

      if ($month==9) {
	$start_month_year="Sep $year1";
    $curr_month_year="Aug $year";
      }

       if ($month==10) {
	$start_month_year="Oct $year1";
    $curr_month_year="Sep $year";
      }

       if ($month==11) {
	$start_month_year="Nov $year1";
    $curr_month_year="Oct $year";
      }

       if ($month==12) {
	$start_month_year="Dec $year1";
    $curr_month_year="Nov $year";
      }    
$start_month_year="Jul $year1";
$curr_month_year="Jun $year";
$emp_id="";
?>
 <?php
 
	if (isset($_GET['user']))
	{
		$user=$_GET['user'];
	
		$get_user = "SELECT * FROM user WHERE user_name='$user' LIMIT 1";
		$run_user = mysqli_query($link, $get_user) or die(mysqli_error($link));
	  	while ($row=mysqli_fetch_array($run_user)) 
		{
			$emp_id=$row["user_emp_id"];
			$email=$row["email"];
			$level=$row["level"];
		}	
	
	}
	
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DSC-MANAGEMENT</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
  body{
	background-color: #dfdede !important;
  }
  .image-text{padding:0 !important;}
  .leave_form_hd{background-color: #d48237f0 !important;
	        text-align: center !important;
    font-weight: bold !important;
    color: white;
	}
	.leave_request_LV{    background-color: #0094df !important;
    border-color: #0094df !important;
    color: white !important;}
	.general_info_leave{    background-color: #0094df !important;
    border-color: #0094df !important;
    color: white !important;}
	label {
    font-weight: 500 !important;
}
.leave_sub_btn{    
    background-color: #e9770f !important;
    color: white !important;
   margin-top: 19px;
}
  </style>
</head>
<?php include 'navbar.php';?>
<body>

	<div class="container-fluid" style="margin-top: -15px; margin-left: -10px;">
	 <?php include 'sidebar.php';?>
	
	


    <!-- Right Panel -->

   <div class="col-lg-10 col-md-11 col-sm-12 login_form">
	
<?php

		$get_emp_details = "SELECT * FROM employee_record WHERE employee_id > 'DSC-010' AND status='' ORDER BY employee_id";
		$run_emp_details = mysqli_query($link, $get_emp_details);
	  	while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
		{
		    $emp_id=$emp_details_row["employee_id"];
			$desig_code=$emp_details_row["employee_desig"];
			$emp_grade=$emp_details_row["employee_grade"];
			$emp_doj=$emp_details_row["employee_doj"];
			$emp_doc=$emp_details_row["employee_doc"];
			$emp_team=$emp_details_row["employee_team"];
			$emp_dept=$emp_details_row["employee_dept"];
  
		$sql=mysqli_query($link, "INSERT INTO appraisals (app_id, from_year, to_year, app_employee, app_doj, app_doc,app_grade, app_desig, app_emp_team, app_emp_dept)

	    VALUES('', '$start_month_year', '$curr_month_year','$emp_id', '$emp_doj', '$emp_doc', '$emp_grade', '$desig_code', '$emp_team', '$emp_dept')") or die(mysqli_error($link));
	
    }



			
?>
	
	
	
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
