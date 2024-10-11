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
 		<div class="col-lg-3">
                            
                   <label for="From_Date" class="control-label mb-1"><b>&nbsp; From Date</b></label>

                        <div class="caption">
          <input  name="from_date" id="from_date" type="date" class="form-control edatepicker">    
                        </div>             
                          </div>
	<div class="col-lg-3 right_padding left_padding_md">
                            
                                <label for="To_date" class="control-label mb-1"><b>&nbsp; To Date</b></label>
							<div class="caption">
								<input  name="to_date" id="to_date" type="date" class="form-control edatepicker">     
                               </div>
                          </div>
<div class="col-sm-2">
			
	<label for="emp_cell" class="control-label mb-1"><b>Type of Leave</b></label>
	
			  <select id="leave" onChange="getLeave(this)" name="leave" class="form-control" style="height: 50px;">
          <option>Select Here</option>
     <?php
		$get_type = "select * from leave_type_table";
		$run_type= mysqli_query($link,$get_type);
	    while ($type_row=mysqli_fetch_array($run_type)) {
	    $leave_type_id=$type_row['leave_type_id'];
		$leave_type_title=$type_row['leave_type_title'];
		
		echo "<option value='$leave_type_id'>$leave_type_title</option>";
			}
	?>
    </select>
		</div>

	<div class="col-sm-2">
    <label for="emp_cell" class="control-label mb-1"><b>Status</b></label>
		<div class="row">
           
      <select name="stat1" style="height: 50px; width: 150px;";>
        <option value="" disabled selected>Choose Status</option>
        <option value="Pending">Pending</option>
        <option value="Unapproved">Unapproved</option>
        <option value="Approved">Approved</option>
        <option value="Declined">Declined</option>
       
    </select>
</div>
</div>
	<div class="col-sm-1">
           <input type="submit" style="height: 50px; width: 160px;" class="btn btn-md leave_sub_btn" name="submit" value="submit"/>
    	        </div>
	</form>	
	</div>

</div>	
<?php
if ($level > 70) {
//echo $user;
?> 
<div class="panel-heading" style="margin-top: -10px;">
				<h3 class="panel-title" align="center"><b>&darr; Approved / Declined Leaves &darr;</b> </h3>
			</div>
	<div class="panel-body">
		<div class="panel" style="box-shadow: -1px 0px 5px gray;">
<div class="row">
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Application Date </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Leave Type </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">From Date </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">To Date </label>
	</div>
	<div class="col-sm-1">
       <label for="date_Applied" class="control-label mb-1"># of Days </label>
	</div>
	<div class="col-sm-1">
       <label for="date_Applied" class="control-label mb-1">Status </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Approved by </label>
	</div>
	
</div>
<?php

if (isset($_POST['stat1'])) {
   $wstat1=$_POST['stat1'];
}


if (isset($_POST['leave'])) {

    $leave_type_id=$_POST['leave'];
 
}


if (isset($_POST['from_date'])) {
 
   $from_date=$_POST['from_date'];


}
if (isset($_POST['to_date'])) {
 
   $to_date=$_POST['to_date'];
 

}

if ($from_date=="") {
  
  $w_switch="full";
}
 
   
   $get_leave_tbl = "SELECT * FROM employee_leave_record WHERE leave_emp_id='$user' AND leave_type>0 AND (status='approved' OR status='Approved' OR status='declined' OR status='Declined')";
 
    $run_leave_tbl = mysqli_query($link, $get_leave_tbl);

      while ($leave_tbl_row=mysqli_fetch_array($run_leave_tbl)) 
    {
    	$w_date_applied=$leave_tbl_row['date_applied'];
    	$w_from_date=$leave_tbl_row['from_date'];
  		$w_to_date=$leave_tbl_row['to_date'];
  		$w_days=$leave_tbl_row['no_of_days'];
  		$w_status=$leave_tbl_row['status'];
  		$w_type=$leave_tbl_row['leave_type'];
  		$w_supervisor=$leave_tbl_row['recommended_by'];
  		
  		
	
	$get_type = "SELECT * FROM leave_type_table WHERE leave_type_id='$w_type'";
    $run_type = mysqli_query($link, $get_type);
      while ($type_row=mysqli_fetch_array($run_type)) 
    {	

    	$w_title=$type_row['leave_type_title'];
    }
?>	


<div class="row">
   <div class="col-sm-2">
         <label  class="form-control"><?php echo $w_date_applied; ?></label>
    </div>
     <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $w_title; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $w_from_date; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $w_to_date; ?></label>
    </div>
    <div class="col-sm-1">
        
           <label  class="form-control"><?php echo $w_days; ?></label>
    </div>
    <div class="col-sm-1">
        
           <label  class="form-control"><?php echo $w_status; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $w_supervisor; ?></label>
    </div>
    
</div>
<?php

}

?>
	
	</div>
	</div>
	

	<div class="panel-heading" style="margin-top: -20px">
				<h3 class="panel-title" align="center"><b>&darr; Leave Applications under Process &darr;</b> </h3>
			</div>
	<div class="panel-body">
		<div class="panel" style="box-shadow: -1px 0px 5px gray;">
<div class="row">
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Application Date </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Leave Type </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">From Date </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">To Date </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1"># of Days </label>
	</div>
	<div class="col-sm-2">
       <label for="date_Applied" class="control-label mb-1">Status </label>
	</div>
</div>
<?php
 if (isset($_POST['stat1'])) {

   $wstat1=$_POST['stat1'];
}


if (isset($_POST['leave'])) {

   $leave_type_id=$_POST['leave'];
 
}


if (isset($_POST['from_date'])) {
 
 $from_date=$_POST['from_date'];


}
if (isset($_POST['to_date'])) {
 
  $to_date=$_POST['to_date'];
 

}
$leave_type_id=0;

  if ($from_date=="") {
  	$get_leave_details = "SELECT * FROM leave_work_table WHERE wk_id='$user'";
  }else {
  	$get_leave_details = "SELECT * FROM leave_work_table WHERE wk_id='$user' AND wk_date_applied >= '$from_date' AND wk_date_applied <= '$to_date' AND wk_type='$leave_type_id'";
 }
    $run_leave_details = mysqli_query($link, $get_leave_details);
      while ($leave_details_row=mysqli_fetch_array($run_leave_details)) 
    {

      $wk1_status="";
    	$wk_date_applied=$leave_details_row['wk_date_applied'];
    	$wk_from_date=$leave_details_row['wk_from_date'];
  		$wk_to_date=$leave_details_row['wk_to_date'];
      $description=$leave_details_row['wk_reason'];
  		$wk_days=$leave_details_row['wk_days'];
      $wk_leave_bal=$leave_details_row['wk_leave_bal'];
  		$wk_status=$leave_details_row['wk_status'];
      $leave_type_id=$leave_details_row['wk_type'];

  if ($wk_status=="Pending" OR $wk_status=="pending" OR $wk_status=="Applied" OR $wk_status=="applied") {
    $wk1_status="Pending with Your Supervisor";

  }else if ($wk_status=="recommended" OR $wk_status=="Recommended") {
    $wk1_status="Pending with Manager";

  }else{

    $wk1_status=$wk_status;
  }
	
	$get_type_details = "SELECT * FROM leave_type_table WHERE leave_type_id='$leave_type_id'";
    $run_type_details = mysqli_query($link, $get_type_details);
      while ($type_details_row=mysqli_fetch_array($run_type_details)) 
    {	

    	$wk_title=$type_details_row['leave_type_title'];
    }
?>	


<div class="row">
   <div class="col-sm-2">
         <label  class="form-control"><?php echo $wk_date_applied; ?></label>
    </div>
     <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $wk_title; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $wk_from_date; ?></label>
    </div>
    <div class="col-sm-2">
        
           <label  class="form-control"><?php echo $wk_to_date; ?></label>
    </div>
    <div class="col-sm-1">
        
           <label  class="form-control"><?php echo $wk_days; ?></label>
    </div>
    <div class="col-sm-3">
        
           <label  class="form-control"><?php echo $wk1_status; ?></label>
    </div>
</div>
<?php
}

?>
	
	</div>
	</div>
	<?php
}

?>
	
	
	
</div>
	
<?php
  $get_emp_details = "SELECT * FROM employee_record WHERE employee_supervisor_id='$user' OR emp_manager='$user' OR emp_team_lead='$user' LIMIT 1";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
      
	  $sup_ind=1;
  }
  
  if ($sup_ind==1)
  {
?>

<div class="row">
	<div class="panel panel-danger" style="width=1410px; margin-left: 0px; margin-right: 20px; margin-top: -20px; ">
<div class="panel-heading panel-Info" style="margin-top: 0px">
				<h3 class="panel-title" align="center"><b>&darr; Subordinates Applications Status &darr;</b> </h3>
			</div>
<div class="panel-body">
<table width="1180" border="1">
  <tr>
    <!--td width="100">&nbsp; Employee </td>
    <td width="180">&nbsp; Name</td>
    <td width="100">&nbsp; App. Date</td>
    <td width="100">&nbsp; Leave Type </td>
    <td width="100">&nbsp; From Date</td>
    <td width="100">&nbsp; To Date</td>
    <td width="100">&nbsp; # of Days </td>
    <td width="120">&nbsp; Status </td>
    <td width="100">&nbsp; Action</td>
    <td width="100">&nbsp;</td-->

    <td width="100">&nbsp; Employee </td>
    <td width="180">&nbsp; Name</td>
    <td width="100">&nbsp; App. Date</td>
    <td width="100">&nbsp; Leave Type </td>
    <td width="100">&nbsp; From Date</td>
    <td width="100">&nbsp; To Date</td>
    <td width="100">&nbsp; # of Days </td>
    <td width="120">&nbsp; Status </td>
    <td width="100">&nbsp; Action</td>
    <td width="100">&nbsp; </td>
    
  </tr>
  <?php

$get_emp_details = "SELECT * FROM employee_record WHERE employee_supervisor_id='$user' OR emp_manager='$user' OR emp_team_lead='$user'";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
  
    //$emp=$emp_details_row['employee_id'];
      $emp=$emp_details_row['employee_serial'];
    $name=$emp_details_row['employee_name'];
    $lname=$emp_details_row['last_name'];
		$super_id=$emp_details_row['employee_supervisor_id'];
		$manager_id=$emp_details_row['emp_manager'];
		$team_lead_id=$emp_details_row['emp_team_lead'];
    $desg_id=$emp_details_row['employee_desig'];

    if ($manager_id==$user) {
      $rank="manager";
    }

    if ($team_lead_id==$user OR $super_id==$user) {
      $rank="lead";
    }

   if($from_date==""){
    	$get_leave_details = "SELECT * FROM leave_work_table WHERE wk_id='$emp' ORDER BY wk_id ASC";
   }else {

   	$get_leave_details = "SELECT * FROM leave_work_table WHERE wk_id='$emp' AND wk_date_applied >= '$from_date' AND wk_date_applied <= '$to_date' AND wk_type='$leave_type_id'";
   }

      $run_leave_details = mysqli_query($link, $get_leave_details);
      while ($leave_details_row=mysqli_fetch_array($run_leave_details)) 
    {
      $wk_id=$leave_details_row['id'];
    	$wk_date_applied=$leave_details_row['wk_date_applied'];
    	$wk_from_date=$leave_details_row['wk_from_date'];
  		$wk_to_date=$leave_details_row['wk_to_date'];
  		$wk_days=$leave_details_row['wk_days'];
  	  $wk_status=$leave_details_row['wk_status'];
      $wk_type=$leave_details_row['wk_type'];
      if ($wk_status=="recommended") {
        $wk_type = "Approval Pending with Manager";
      }

      if ($wk_status=="pending" OR $wk_status=="Pending") {
        $wk_status = "Pending with You";
      }
	
	  $get_type_details = "SELECT * FROM leave_type_table WHERE leave_type_id='$wk_type'";
    $run_type_details = mysqli_query($link, $get_type_details);
      while ($type_details_row=mysqli_fetch_array($run_type_details)) 
    {	

    	 $wk_title=$type_details_row['leave_type_title'];
    }

    if (($rank=="manager" AND $wk_status=="recommended") OR ($rank=="lead" AND $wk_status=="applied")) {
    
?>	
  
  <tr>
    <td width="100">&nbsp; <?php echo $emp; ?></td>
    <td width="180">&nbsp; <?php echo $name  . " " . $lname; ?></td>
    <td width="100">&nbsp; <?php echo $wk_date_applied; ?></td>
    <td width="100">&nbsp; <?php echo $wk_title; ?></td>
    <td width="100">&nbsp;<?php echo $wk_from_date; ?></td>
    <td width="100">&nbsp; <?php echo $wk_to_date; ?></td>
    <td width="100">&nbsp; <?php echo $wk_days; ?></td>
    <td width="120">&nbsp; <?php echo $wk_status; ?></td>

	  <form action="my_leave_status_update.php?wk_id=<?php echo $wk_id; ?>&emp=<?php echo $emp; ?>&user=<?php echo $user; ?>&desig_id=<?php echo $desg_id; ?>&wk_from_date=<?php echo $wk_from_date; ?>&wk_to_date=<?php echo $wk_to_date; ?>" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm1" id="EmpForm1" method="post">
    <td width="100">
      <?php 
      
    if ($rank=="manager") {

        ?>
    <select id="stat" name="stat" value=<?php echo $wk_status; ?>>
      <option class="form-control" value="approved">Approved</option>
      <option class="form-control" value="declined">Declined</option>
      <option class="form-control" value="pending">Pending</option>
      </select>
      <?php
      }
      if ($rank=="lead") {
        
        ?>
   <select id="stat" name="stat" value=<?php echo $wk_status; ?>>
      <option class="form-control" value="recommended">Recommended</option>
      <option class="form-control" value="declined">Declined</option>
      <option class="form-control" value="pending">Pending</option>
      </select>
    <?php
    }


    ?>
    
	</td>
    <td width="90"><input type="submit" class="btn btn-md recommend_appr_btn" name="update" value="update"> </td>
	</form>
  </tr>
  

 <?php

  }
}
  /* if (isset($_POST['update'])) {
    echo $stat=$_POST['stat'];
    
     $sql=mysqli_query($link, "UPDATE leave_work_table SET 
              
       wk_status='$stat',
       wk_date=NOW(),
       wk_authority='$user',
       wk_desig='$desg_id'
       WHERE wk_id='$emp' AND wk_from_date='$wk_from_date' AND wk_to_date='$wk_to_date'") or die(mysqli_error($link));
        
}
    //header("Location: ../index-emp.php?user=$user");
  }

  $get_tbl = "SELECT * FROM leave_work_table";

  $run_tbl = mysqli_query($link, $get_tbl);
      while ($tbl_row=mysqli_fetch_array($run_tbl)) 
    {

      if ($stat== 'Recommended' OR $stat== 'recommended') {

  $sql1=mysqli_query($link, "INSERT INTO employee_leave_record SET leave_emp_id='$emp',date_applied='$wk_date_applied',description='$description',leave_type='$leave_type_id',from_date='$wk_from_date',to_date='$wk_to_date',no_of_days='$wk_days',leave_balance='$wk_leave_bal',status='$stat',recomm_date=NOW(),recommended_by='$user',date_updated=NOW()") or die(mysqli_error($link));
}

   if ($stat== 'Declined' OR $stat== 'declined' OR $stat== 'Approved' OR $stat== 'approved') {

  $sql1=mysqli_query($link, "UPDATE employee_leave_record SET leave_emp_id='$emp',date_applied='$wk_date_applied',description='$description',leave_type='$leave_type_id',from_date='$wk_from_date',to_date='$wk_to_date',no_of_days='$wk_days',leave_balance='$wk_leave_bal',status='$stat',approve_date=NOW(),approved_by='$user',date_updated=NOW() 

    WHERE leave_emp_id='$emp' AND date_applied='$wk_date_applied'") or die(mysqli_error($link));

  $sql = "DELETE FROM leave_work_table WHERE wk_id='$emp' AND wk_status='$stat'" or die(mysqli_error($link));

    }*/


  }
?>

</table>
</div>			
		
</div>	

	</div>

	<?php
	
	}
?>

	</div>
</div>
</div>



	
	</div>
	
	
</div>
</body>
</html>
