<script language="javascript">

function getLeave(leave)
{
	
	var value = $('#leave').find(":selected").text();

	$("#leave").val(value);

}

</script>


<?php
include_once("connect.php");
$a=0;
$b=0;
$c=0;
$wk_id=0;
$wemp="";
$stat="";
$wk_type=0;
$wk_title="";
$w_switch="";
$wk1_status="[";
$emp_id="";
$date_applied="";
$from_date="";
$to_date="";
$no_of_days="";
$status="";
$remarks="";
$leave_type_id="";
$leave_type_title="";
$description="";
$wk_leave_bal=0;
$wk_date_applied="";
$wk_from_date="";
$wk_to_date="";
$wk_days=0;
$sup_ind=0;
$desg_id=0;
$dept="Leave System (Application Form)";
$emp_ser=0;
$user_id="";
$user="";
$level="";
$email="";
$fiscal_1="";
$fiscal_2="";
$grade="";
$doj="";
$doc="";
$emp_grade="";
$designation="";

	if (isset($_GET['user']))
	{
		$user=$_GET['user'];
	}
		$get_user = "SELECT * FROM user WHERE user_emp_id='$user' LIMIT 1";
		$run_user = mysqli_query($link, $get_user) or die(mysqli_error($link));
	  	while ($row=mysqli_fetch_array($run_user)) 
		
		{
			$emp_id=$row["user_emp_id"];
			$email=$row["email"];
			$level=$row["level"];
	
	}
	if (isset($_GET['from_year'])) {
   echo $fiscal_1=$_GET['from_year'];
   echo  $fiscal_2=$_GET['to_year'];
}
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DS-EmployeeCenter</title>
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
<?php include 'header.php';?>
<body>

<div class="container-fluid">
  
<?php include 'sidebar.php';?>
  
  <div class="col-lg-10 login_form">

<div class="panel panel-Success" style="box-shadow: -1px 0px 5px gray; margin-top: 10px;">

  <div class="panel-body">

  <div class="row">
<form enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST">
 
  <div class="col-lg-3"><h3>Appraisals Fiscal Year : </h3> </div>
    <div class="col-lg-3">
                            
                   <label for="From_Date" class="control-label mb-1"><b> Fiscal Year - From </b></label>

                        <div class="caption">
          <input  name="from_date" id="from_date" type="text" class="form-control" value=<?php echo $fiscal_1; ?>>    
                        </div>             
                          </div>
         
  <div class="col-lg-3 right_padding left_padding_md">
                            
                                <label for="To_date" class="control-label mb-1"><b>&nbsp; Fiscal Year - to</b></label>
              <div class="caption">
                <input  name="to_date" id="to_date" type="text" class="form-control" value=<?php echo $fiscal_2; ?>>     
                               </div>
                          </div>
   <div class="col-lg-1">&nbsp; </div>
  <div class="col-sm-1">
           <input type="submit" style="height: 50px; width: 160px;" class="btn btn-md leave_sub_btn" name="submit" value="submit"/>
              </div>
  </form> 
  </div>

</div>  

</div>	

<?php
if (isset($_POST['from_date'])) {
    $fiscal_1=$_POST['from_date'];
    $fiscal_2=$_POST['to_date'];
}



?>

<div class="row">
  <div class="panel panel-danger" style="width=1410px; margin-left: 0px; margin-right: 20px; margin-top: -20px; ">
<div class="panel-heading panel-Info" style="margin-top: 0px">
        <h3 class="panel-title" align="center"><b>&darr; Subordinates Appraisals &darr;</b> </h3>
      </div>
<div class="panel-body">
<table width="1180" border="1">
  <tr>


    <td width="100">&nbsp; Employee </td>
    <td width="250">&nbsp; Name</td>
    <td width="150">&nbsp; Joining Date</td>
    <td width="150">&nbsp; Confirmation Date </td>
    <td width="50">&nbsp; Grade</td>
    <td width="200">&nbsp; Designation</td>
    <td width="170">&nbsp; Status </td>
    

  </tr>
</table>

<!--div class="row">
   <div class="col-sm-2">
     <div class="caption">
         <label  class="form-control">Employee </label>
    </div>
  </div>
     <div class="col-sm-2">
       <div class="caption">
        
           <label  class="form-control">Name</label>
    </div>
  </div>
    <div class="col-sm-2">
       <div class="caption">
         <label  class="form-control">Joining Date </label>
    </div>
  </div>
     <div class="col-sm-2">
        
           <label  class="form-control">Confirmation Date</label>
    </div>
    <div class="col-sm-2">
         <label  class="form-control">Grade </label>
    </div>
     <div class="col-sm-2">
        
           <label  class="form-control">Designation</label>
    </div>
 </div-->   

<?php

$get_app_details = "SELECT * FROM appraisals WHERE app_sup='$emp_id' AND from_year='$fiscal_1' AND to_year='$fiscal_2'";
    $run_app_details = mysqli_query($link, $get_app_details);
      while ($app_details_row=mysqli_fetch_array($run_app_details)) 
    {
  
    //$emp=$emp_details_row['employee_id'];
    $emp=$app_details_row['app_employee'];
    //$name=$app_details_row['app_employee'];
    $grade=$app_details_row['app_grade'];
    $desg_id=$app_details_row['app_desig'];
    $doj=$app_details_row['app_doj'];
    $doc=$app_details_row['app_doc'];
    $status=$app_details_row['app_status'];

$get_grade_details = "SELECT * FROM employee_grade WHERE grade_ser='$grade' LIMIT 1";
    $run_grade_details = mysqli_query($link, $get_grade_details);
      while ($grade_details_row=mysqli_fetch_array($run_grade_details)) 
    {
      
     $emp_grade=$grade_details_row['grade_title'];
   
  }

  $get_desg_details = "SELECT * FROM employee_desig WHERE desig_id='$desg_id' LIMIT 1";
    $run_desg_details = mysqli_query($link, $get_desg_details);
      while ($desg_details_row=mysqli_fetch_array($run_desg_details)) 
    {
      
     $designation=$desg_details_row['title'];
   
  }

  $get_emp_details = "SELECT * FROM employee_record WHERE employee_serial='$emp' LIMIT 1";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
      
     $name=$emp_details_row['employee_name'] . "" . $emp_details_row['last_name'];
   
  }
?>
<table width="1180" border="1">
  <tr>
    <td width="100"><a href="appraisal_form.php?user=<?php echo $emp; ?>"><?php echo $emp; ?></a></td> 
    <td width="250"><?php echo $name; ?></td>
    <td width="150"><?php echo $doj; ?></td>
    <td width="150"><?php echo $doc; ?></td>
    <td width="50"><?php echo $emp_grade; ?></td>
    <td width="200"><?php echo $designation; ?></td>
    <td width="170"><?php echo $status; ?></td>
    
<a href=
"appraisal_form.php?user=<?php echo $emp; ?>">
  </tr>
</table>

<!--div class="row">
   <div class="col-sm-2">
         <label  class="form-control"><?php echo $emp; ?></label>
    </div>
     <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $name; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $doj; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $doc; ?></label>
    </div>

     <div class="col-sm-1">
        
           <label  class="form-control"><?php echo $emp_grade; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $designation; ?></label>
    </div>

    <div class="col-sm-1">
        
           <label  class="form-control"></label>
    </div>
   
    
</div-->

<?php } ?>



</div>
</div>
</div>

</body>
</html>
