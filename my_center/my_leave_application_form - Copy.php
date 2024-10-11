<?php
$yearArray = range(1980, 2020);
$manager="";
$team_lead="";
$department="";
$designation="";
$deptt="";
$date=date("Y-m-d");
$mm_curr=date("m");
$mm_prev=$mm_curr - 1;
$yy_curr=date("Y");
$yy_prev=$yy_curr - 1;

if ($mm_curr=="01") {
  $year="Jan " . $yy_prev . " - Dec " . $yy_curr;
}

if ($mm_curr=="02") {
  $year="Feb " . $yy_prev . " - Jan " . $yy_curr;
}
if ($mm_curr=="03") {
  $year="Mar " . $yy_prev . " - Feb " . $yy_curr;
}
if ($mm_curr=="04") {
  $year="Apr " . $yy_prev . " - Mar " . $yy_curr;
}

if ($mm_curr=="05") {
  $year="May " . $yy_prev . " - Apr " . $yy_curr;
}
if ($mm_curr=="06") {
  $year="Jun " . $yy_prev . " - May " . $yy_curr;
}
if ($mm_curr=="07") {
  $year="Jan " . $yy_prev . " - Dec " . $yy_curr;
}

if ($mm_curr=="08") {
  $year="Feb " . $yy_prev . " - Jan " . $yy_curr;
}
if ($mm_curr=="09") {
  $year="Mar " . $yy_prev . " - Feb " . $yy_curr;
}
if ($mm_curr=="10") {
  $year="Apr " . $yy_prev . " - Mar " . $yy_curr;
}

if ($mm_curr=="11") {
  $year="May " . $yy_prev . " - Apr " . $yy_curr;
}
if ($mm_curr=="12") {
 echo $year="Jun " . $yy_prev . " - May " . $yy_curr;
}

include_once("connect.php");

if (isset($_GET['user'])) {
   $user=$_GET['user'];

}
    $getemp = "SELECT * FROM employee_record WHERE employee_id='$user' order by employee_id ASC  LIMIT 1";
        $run_emp = mysqli_query($link, $getemp);
        while ($emp_row=mysqli_fetch_array($run_emp)) 
        {
      $name=$emp_row['employee_name'] . " " . $emp_row['last_name'];
	  $desig=$emp_row['employee_desig'];
	  $grade=$emp_row['employee_grade'];
	  $deptt=$emp_row['employee_dept'];
	  $manager_id=$emp_row['emp_manager'];
	  $team=$emp_row['employee_team'];
	  $team_lead_id=$emp_row['emp_team_lead'];       
}
     $getemp1 = "SELECT * FROM employee_record WHERE employee_id='$manager_id' order by employee_id ASC  LIMIT 1";
        $run_emp1 = mysqli_query($link, $getemp1);
        while ($emp1_row=mysqli_fetch_array($run_emp1)) 
        {
$manager=$emp_row['employee_name'] . " " . $emp_row['last_name'];
      }

   $getemp2 = "SELECT * FROM employee_record WHERE employee_id='$team_lead_id' order by employee_id ASC  LIMIT 1";
        $run_emp2 = mysqli_query($link, $getemp2);
        while ($emp2_row=mysqli_fetch_array($run_emp2)) 
        {
      $team_lead=$emp_row['employee_name'] . " " . $emp_row['last_name'];
     
  } 


    $get_team = "SELECT * FROM teams WHERE team_code='$team' LIMIT 1";
        $run_team = mysqli_query($link, $get_team);
        while ($team_row=mysqli_fetch_array($run_team)) 
        {
      $team=$team_row['team_name'];

        } 

    $getdept = "SELECT * FROM department WHERE deptt_id='$deptt' LIMIT 1";
        $run_dept = mysqli_query($link, $getdept);
        while ($dept_row=mysqli_fetch_array($run_dept)) 
        {
      $deptt=$dept_row['deptt_name'];
      
        } 

    
?>

<!DOCTYPE html>
<html>
    <head>
         <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Leaves</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        
        <link rel="stylesheet" href="../dsc-management/ds_payroll/style12.css">
        
        <link rel="stylesheet" href="../dsc-management/ds_payroll/style.css">
    </head>
	
	 <?php include 'header.php'; ?>
    <body>
	
	<div class="container evaluation-form-custom-container">
       <div class="row start-row">
                <?php include 'sidebar.php'; ?>
        <div class="col-md-10" style="padding:0px;">
	 <form id="" name="Form1"  action="" method="post">

            <section class="section-1  bordered-column">
                    <div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                            <h1>New Employee Record</h1>
                        </div>
                    </div>
			<div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-sx-12 ">
                            <h4>Employee</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div class="col-lg-6 col-md-9 col-sm-10 col-xs-12">
						<div class="row align-center" > 
      					 <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" >ID :&nbsp; &nbsp; <?php echo $user; ?></label>
                          </div>
                                       
                         <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                             <label for="id_no" >Name : &nbsp; &nbsp;<?php echo $name; ?></label>
                         </div>
						 
						 <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" >Title :&nbsp; &nbsp; <?php echo $designation; ?></label>
                          </div>
                                       
                         <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                             <label for="id_no" >Grade : &nbsp; &nbsp;<?php echo $grade; ?></label>
                         </div>
                        </div>
                        <div class="col-lg-6 col-md-9 col-sm-10 col-xs-12">
						 
						 <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" >Team :&nbsp; &nbsp; <?php echo $team; ?></label>
                          </div>
                                       
                         <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                             <label for="id_no" >Team Lead : &nbsp; &nbsp;<?php echo $team_lead; ?></label>
                         </div>
						 
						 <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" >Department:&nbsp; &nbsp; <?php echo $department; ?></label>
                          </div>
                                       
                         <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                             <label for="id_no" >Manager : &nbsp; &nbsp;<?php echo $manager; ?></label>
                         </div>
	                   </div>
	  				</div>
                    </div>
				
                    <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>National ID Card</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row align-center ">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp; NO : <font color="red">*</font></label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="emp_cnic" placeholder="xxxxx-xxxxxxx-x"  value= "<?php echo $cnic; ?>">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                        <div class="row align-center border-bottom-custom">
                                            <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp;  Issue Date <font color="red">*</font></label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input  name="date_issue" id="date_issue" type="date" class="form-control edatepicker"> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 ">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp; Expiry Date</label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input  name="date_expiry" id="date_expiry" type="date" class="form-control edatepicker" />
                                </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                                                       
                        </div>

					<div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Placement / Father's Info</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
        <label for="id_no" >Team :</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
    <select id="team" onChange="getTeam(this)" name="team" class="form-control" style="height: 40px;">
          <option><b>Select Team</b></option>
     <?php
        $get_team = "select * from teams";
        $run_team= mysqli_query($link,$get_team);
        while ($team_row=mysqli_fetch_array($run_team)) {
        $team_id=$team_row['team_id'];   
        $team_title=$team_row['team_name'];
        
        echo "<option value='$team_id'>$team_title</option>";
            }
    ?>
    </select>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3" >
                                            <label for="id_no" >Father's Name :</label>
                                        </div>

                                    </div>
                                </div>
								<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                                             <input type="text" class="form-control" id="exampleFormControlInput1"  name="fname" placeholder="Father Name" value= "<?php echo $fname; ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >CNIC # </label>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="fcnic" placeholder="xxxxx-xxxxxxx-x" value= "<?php echo $fcnic; ?>">
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
					
					<div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Date Of</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row align-center ">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp;  Birth <font color="red">*</font></label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input  name="date_birth" id="date_birth" type="date" class="form-control edatepicker" />
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp;  Joining <font color="red">*</font></label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input  name="date_joining" id="date_joining" type="date" class="form-control edatepicker"> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 ">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp; Confirmation</label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <input  name="date_confirm" id="date_confirm" type="date" class="form-control edatepicker" />
                                </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                 
                        </div>
							
					<div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-lerightft-col">
                            <h4>Contact</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-1 col-md-1 col-sm-1 border-right-col">
                                            <label for="id_no" >Mobile : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="mobile" placeholder="+92 xxx xxx xxxx" value= "<?php echo $mobile; ?>" >
                                        </div>
										<div class="col-lg-1 col-md-1 col-sm-1 border-right-col">
                                            <label for="id_no" >Phone : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="+92 xxx xxx xxxx" value= "<?php echo $phone; ?>" >
                                        </div>
										<div class="col-lg-1 col-md-1 col-sm-1 border-right-col">
                                            <label for="id_no" >Email : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Email Address" value= "<?php echo $email; ?>" >
                                        </div>
                                    </div>
                                <!--/div>
								<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col"-->
                                   
                                </div>
                            </div>
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-1 col-md-1 col-sm-1 border-right-col">
                                            <label for="id_no" >Address : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="add1" placeholder="Address - 1" value= "<?php echo $add1; ?>" >
                                        </div>
										
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="add2" placeholder="Address - 2" value= "<?php echo $add2; ?>" >
                                        </div>
										<div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
                                            <label for="id_no" >Nationality : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                           <input type="text" class="form-control" id="exampleFormControlInput1" name="national" placeholder="Nationality" value= "<?php echo $national; ?>" >
                                        </div>
                                    </div>
                                <!--/div>
								<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col"-->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
		</section>
					
<div class="panel">
 
		<div class="panel-heading general_info_leave" align="center"><h4>&darr; General Information &darr; </h4></div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-2">
					<div class="caption">
					<i class="fa fa-hand-o-right"></i>
					<label for="emp_id" class="control-label mb-1">&nbsp; Emp No </label>
					<label  class="form-control"><b><?php echo $user; ?></b></label>         
				</div>
				</div>		
				<div class="col-sm-3">
					<div class="caption">
					<i class="fa fa-male"></i>
					<label for="employee_name" class="control-label mb-1">&nbsp; Employee Name </label>
					<label  class="form-control"><b><?php echo $emp_name; ?></b></label>  
				</div>
				</div>				 
				<div class="col-sm-3">
					<div class="caption">
					<i class="fa fa-sort-numeric-asc"></i>
					<label for="employee_desig" class="control-label mb-1">&nbsp; Employee Designation </label>
					<label  class="form-control"><b><?php echo $desig_title; ?></b></label>
				</div> 
				</div>		
				<div class="col-sm-2">
					<div class="caption">
					<i class="fa fa-sort-numeric-asc"></i>
					<label for="employee_cnic" class="control-label mb-1">&nbsp; Employee CNIC. </label>
					<label  class="form-control"><b><?php echo $emp_cnic; ?></b></label>  
				</div>
			</div>
				<div class="col-sm-2">
					<div class="caption">
					<i class="fa fa-calendar"></i>
					<label for="date_joining" class="control-label mb-1">&nbsp; Date of Joining </label>
					<label  class="form-control"><b><?php echo $emp_doj; ?></b></label>  
				   </div>
				</div>
					
			</div>
			<div class="row">
				<div class="col-sm-2" style="font-size:16" align="center">
					<div class="row">&nbsp; </div>
					<div class="row">&nbsp; </div>
				<div class="row">	
				<b>Leave Last Availed</b>
				</div>
				</div>
				<div class="col-sm-2">
					<div class="caption">
						<i class="fa fa-calendar"></i>
						<label for="From_Date" class="control-label mb-1">From Date</label>
						<label  class="form-control"><?php echo $date_fr; ?></label>
					</div>
				</div>
				<div class="col-sm-2">
                            <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_confirmation=date_confirm -->
                                <label for="To_date" class="control-label mb-1">To Date</label>
								<label  class="form-control"><?php echo $date_to; ?></label> 
                               </div>
                          </div>
	
		<div class="col-sm-2">
			<div class="caption">
			<label for="emp_phone" class="control-label mb-1">No Of Days</label>
		<label  class="form-control"><?php echo $days; ?></label> 
		</div>
		</div>
		<div class="col-sm-2">
			<div class="caption">
			<label for="emp_phone" class="control-label mb-1">Balance</label>
		<label  class="form-control"><?php echo $leave_bal; ?></label>  
		</div>
	</div>
		<div class="col-sm-2">
			<div class="caption">
			<label for="emp_phone" class="control-label mb-1">Status</label>
		<label  class="form-control"><?php echo $status; ?></label>  
		</div>
	</div>
	</div>
	<
	</div>
   </div>

 <div class="panel" style="margin-top: -40px; border: thick;">
    <div class="panel-heading leave_request_LV" align="center"><h4>&darr; Leave Request &darr; </h4></div>

<form enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST">
<div class="panel-body">
 	<div class="row">
	 <div class="col-sm-2">
                               
            <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_Applied -->
                                <label for="date_Applied" class="control-label mb-1">Application Date </label>
                                <label  class="form-control"><?php echo date('Y-m-d'); ?></label>
                            </div>
    </div>
	
		<div class="col-sm-2">
			
	<label for="emp_cell" class="control-label mb-1">Type of Leave <!-- <font color="red">*</font> --></label>
	
			  <select id="leave" onChange="getLeave(this)" name="leave" class="form-control" style="height: 34px;">
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
	
	<div class="col-sm-8">
	<i class="fa fa-mobile"></i>
	<label for="emp_cell" class="control-label mb-1">Reasons for Leave <!-- <font color="red">*</font> --></label>
		 <input type="text" class="form-control" name="description" id="description" placeholder="Reasons for Leave" />
		 </div>
	</div>
	<div class="row">
	<div class="col-lg-2">
                            <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_joining=date_joining -->
                                <label for="From_Date" class="control-label mb-1">Leave Starting Date</label>
                                 <input  name="from_date" id="from_date" type="date" class="form-control edatepicker">    
                            </div>
                          </div>
	<div class="col-lg-2 right_padding left_padding_md">
                            <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_confirmation=date_confirm -->
                                <label for="To_date" class="control-label mb-1">Up to Date</label>
								<input  name="to_date" id="to_date" type="date" class="form-control edatepicker">     
                               </div>
                          </div>
		<?php
		$date_from="";
			if (isset($_POST['from_date'])) {
			$date_from=$_POST['from_date'];
			
			}

			if (isset($_POST['to_date'])) {
			 $date_to=$_POST['to_date'];
			
			}
			$date_to = strtotime("$date_to"); 
			$date_from = strtotime("$date_from");
 			$days = $date_to - $date_from;
 			round($days / ((60 * 60 * 24))+1);
			
		?>	
	
		<div class="col-sm-2">
			<label for="emp_phone" class="control-label mb-1">Days</label>
			<input type="text" class="form-control" name="no_of_days" id="no_of_days" value=<?php echo $days; ?>>
		</div>
		<!-- <div class="col-sm-1">
			<label for="emp_phone" class="control-label mb-1">Balance</label>
		<label  class="form-control"><?php echo $leave_balance; ?></label> 
		</div> -->
		
		<div class="col-sm-2">
			<label for="email" class="control-label mb-1">Contact Number</label>
			<input type="text" class="form-control" name="cell" id="cell" value=<?php echo $emp_cell; ?>>
		</div>
		<div class="col-sm-4">
			<label for="email" class="control-label mb-1">Email Address</label>
			<input type="text" class="form-control" name="email" id="email" value=<?php echo $emp_email; ?>>
		</div>
		</div>

	<div class="row">				
		<div class="col-sm-10">
		<i class="fa fa-building"></i>
			<label for="email" class="control-label mb-1">Contact Address if leave exceeds one week</label>
			<input type="text" class="form-control" name="address" id="address" placeholder="Contact Address" />
		</div>
	<div class="col-lg-2">
           <input type="submit" class="btn btn-md leave_sub_btn" value="submit"/>
    	        </div>
	</div>
	</div>
	
</form>	

	</div>

 
  </div>
		
        <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> submit</button>
            </div>
		
	</form>
		
	</div>
	</div>
	</div>
	  <?php

         if (isset($_POST['team'])) {
           echo  $team=$_POST['team'];

        $get_team = "SELECT * FROM teams WHERE team_id=$team";
        $run_team = mysqli_query($link, $get_team);
        while ($team_row=mysqli_fetch_array($run_team)) 
        {

            $dept=$team_row['team_deptt'];
            $team_lead=$team_row['team_lead'];
        }

        $get_dept = "SELECT * FROM department WHERE deptt_id=$dept";
        $run_dept = mysqli_query($link, $get_dept);
        while ($dept_row=mysqli_fetch_array($run_dept)) 
        {

            
            $manager=$dept_row['manager'];
        }

         }

        
    

if(isset($_POST['submit']))
{
    //print_r( $_POST);
    $emp_gender = $_POST['gender'];
    $emp_no=mysqli_real_escape_string($link, $_POST['emp_id']);
    $emp_cnic_no=mysqli_real_escape_string($link, $_POST['emp_cnic']);
    $emp_cnic_issue_date=mysqli_real_escape_string($link, $_POST['date_issue']);
    $emp_cnic_expiry_date=mysqli_real_escape_string($link, $_POST['date_expiry']);
    
    $emp_fname=mysqli_real_escape_string($link, $_POST['emp_fname']);
    $emp_lname=mysqli_real_escape_string($link, $_POST['emp_lname']);
    $date_joining=mysqli_real_escape_string($link, $_POST['date_joining']);
    $date_confirm=mysqli_real_escape_string($link, $_POST['date_confirm']);
    $date_birth=mysqli_real_escape_string($link, $_POST['date_birth']);
   $national=mysqli_real_escape_string($link, $_POST['national']);
   $emp_cell=mysqli_real_escape_string($link, $_POST['mobile']);
   $emp_phone=mysqli_real_escape_string($link, $_POST['phone']);
   $emp_email=mysqli_real_escape_string($link, $_POST['email']);
   $grade=mysqli_real_escape_string($link, $_POST['grade']);
    $add1=mysqli_real_escape_string($link, $_POST['add1']);
    $add2=mysqli_real_escape_string($link, $_POST['add2']);
   $bgroup=mysqli_real_escape_string($link, $_POST['bgroup']);
    $degree=mysqli_real_escape_string($link, $_POST['degree']);
    $inst1=mysqli_real_escape_string($link, $_POST['inst1']);
    $year1=mysqli_real_escape_string($link, $_POST['year1']);
    $cgpa1=mysqli_real_escape_string($link, $_POST['cgpa1']);
   $degreep=mysqli_real_escape_string($link, $_POST['degreep']);
    $inst2=mysqli_real_escape_string($link, $_POST['inst2']);
    $year2=mysqli_real_escape_string($link, $_POST['year2']);
    $cgpa2=mysqli_real_escape_string($link, $_POST['cgpa2']);
    $fname=mysqli_real_escape_string($link, $_POST['fname']);
    $fcnic=mysqli_real_escape_string($link, $_POST['fcnic']);
    $lang1=mysqli_real_escape_string($link, $_POST['lang1']);
    $lang2=mysqli_real_escape_string($link, $_POST['lang2']);
    $lang3=mysqli_real_escape_string($link, $_POST['lang3']);
    $frame1=mysqli_real_escape_string($link, $_POST['frame1']);
    $frame2=mysqli_real_escape_string($link, $_POST['frame2']);
    $frame3=mysqli_real_escape_string($link, $_POST['frame3']);
    $technical=mysqli_real_escape_string($link, $_POST['technical']);
    $other=mysqli_real_escape_string($link, $_POST['other']);
    $more_lang=mysqli_real_escape_string($link, $_POST['more_lang']);
    $more_frame=mysqli_real_escape_string($link, $_POST['more_frame']);
    $bank=mysqli_real_escape_string($link, $_POST['bank']);
    $branch=mysqli_real_escape_string($link, $_POST['br']);
    $acno=mysqli_real_escape_string($link, $_POST['acno']);

    $kin1=mysqli_real_escape_string($link, $_POST['kin1']);
   $relkin1=mysqli_real_escape_string($link, $_POST['relkin1']);
    $ckin1=mysqli_real_escape_string($link, $_POST['ckin1']);

    $kin2=mysqli_real_escape_string($link, $_POST['kin2']);
   $relkin2=mysqli_real_escape_string($link, $_POST['relkin2']);
    $ckin2=mysqli_real_escape_string($link, $_POST['ckin2']);

    if ($emp_no=='' OR $emp_cnic_no=='' OR $emp_fname=='')
    {
        echo "<script>alert('Please fill in Employee Number, CNIC, Employee Name, Joining Date, Date of Birth WHICH ARE MANDATORY!')</script>";
        exit();
    }
    else
    {

        $sql=mysqli_query($link, "SELECT * FROM employee_record WHERE employee_id='$emp_id' LIMIT 1");
        $empMatch=mysqli_num_rows($sql);//Count the output amount
        if($empMatch>0){
            echo 'Sorry you tried to force a duplicate Employee into the system <a href="create_employee_form.php">Click here</a>';
            exit();
        }

        $sql=mysqli_query($link, "INSERT INTO employee_record (employee_id,employee_name,last_name,employee_desig,employee_grade,employee_supervisor_id,employee_dept,emp_manager,employee_team,emp_team_lead,employee_cnic,employee_cnic_issue,employee_cnic_expiry,employee_gender,employee_marital,employee_blood_group,employee_nationality,employee_father_name,employee_father_cnic,employee_bank,employee_branch,employee_account,employee_dob,employee_doj,employee_doc,employee_cell,employee_phone,employee_email,employee_add1,employee_add2,employee_edu_degree,employee_edu_inst,employee_edu_year,employee_edu_grade,employee_prof_degree,employee_prof_inst,employee_prof_year,employee_prof_grade,employee_it_lang1,employee_it_lang2,employee_it_lang3,more_language,employee_frame_1,employee_frame_2,employee_frame_3,more_frame,employee_it_exp,employee_other_exp,employee_nextofkin1,relation_nextofkin1,cnic_nextofkin1,employee_nextofkin2,relation_nextofkin2,cnic_nextofkin2,status,date_status)

            VALUES('$emp_id','$emp_fname','$emp_lname','$desig','$grade','$team_lead','$dept','$manager','$team','$team_lead','$emp_cnic','$emp_cnic_issue_date','$emp_cnic_expiry_date','$emp_gender','','$bgroup','$national','$fname','$fcnic','$bank','$br','$acno','$date_birth','$date_joining','$date_confirm','$mobile','$phone','$email','$add1','$add2','$degree','$inst1','$year1','$cgpa1','$degreep','$inst2','$year2','$cgpa2','$lang1','$lang2','$lang3','more_lang','$frame1','$frame2','$frame3','$more_frame','$technical','$other','$kin1','$relkin1','$ckin1','$kin2','$relkin2','$ckin2','',NOW())") or die(mysqli_error($link));


    }


header("location: select_basic_pay.php?emp_id=$emp_id&grade=$grade&desig=$desig");
  }

  ?>
	   <script src="../dsc-management/ds_payroll/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dsc-management/ds_payroll/js/bootstrap.min.js"></script>
    <script src="../dsc-management/ds_payroll/assets/js/common.js"></script>
    
    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</body>
</html>
	
	