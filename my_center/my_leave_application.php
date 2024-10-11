<script language="javascript">



function getLeave(leave)
{
	// var url = window.location.href;   
	// var value = leave.value;
	
	// var oldleave= getUrlVars()['leave'];
	
	// if(oldleave==null)
	// {
	// 	url += '&leave=' + value;
	// }
	// else
	// {
	// 	separatorIndex = url.indexOf('&');
	// 	url = url.substr(0,separatorIndex);
	// 	url += '&leave=' + value;
	// }
	// 	window.location.href = url;

	var value = $('#leave').find(":selected").text();
		$("#leave").val(value);

}

function getUrlVars() 
{
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
</script>


<?php
include_once("connect.php");

$emp_id="";
$date_applied="";
$from_date="";
$description="";
$to_date="";
$no_of_days="";
$leave_balance="";
$status="";
$remarks="";
$emp_name="";
$emp_grade="";
$emp_desig="";
$emp_cnic="";
$emp_doj="";
$title="";
$emp1="";
$emp_name1="";
$desig_title="";
$leave_balance="";
$date_fr="";
$date_to="";
$days="";
$leave_bal="";
$status="";
$emp_email="";
$emp_cell="";
$leave_type_id="";
$leave_type_title="";
$desig_code="";
$dept="Leave System (Application Form)";

?>
 <?php
 $user_id="";
$user="";
$level="";
$email="";




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
    <title>DS-MANAGEMENT</title>
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
<?php include './navbar.php';?>
<body>

	<div class="container-fluid" style="margin-top: -15px; margin-left: -10px;">
	
	
	


 <div class="col-lg-2 col-md-8 col-sm-12 login_form">
 <?php include 'sidebar.php';?>
</div>
   <div class="col-lg-10 col-md-11 col-sm-12 login_form">
	
<?php
$emp_ser=0;

	$get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user'";
		$run_emp_details = mysqli_query($link, $get_emp_details);
	  	while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
		{
			$emp_id=$emp_details_row["employee_id"];
			$emp_name=$emp_details_row["employee_name"] . " " . $emp_details_row["last_name"];
			$desig_code=$emp_details_row["employee_desig"];
			$emp_grade=$emp_details_row["employee_grade"];
			$emp_doj=$emp_details_row["employee_doj"];
			$emp_cnic=$emp_details_row["employee_cnic"];
			$emp_email=$emp_details_row["employee_email"];
			$emp_cell=$emp_details_row["employee_cell"];
			$emp1=$emp_id;
			$emp_name1=$emp_name;
			$desg_code=$desig_code;
			$title=$emp_grade;
			
		}
		
		$get_designation = "SELECT * FROM employee_desig WHERE desig_id='$desig_code'";
		$run_designation = mysqli_query($link, $get_designation);
	  	while ($designation_row=mysqli_fetch_array($run_designation)) 
		{
			$desig_title=$designation_row["title"];
		}
		$get_leave = "SELECT * FROM employee_leave_record WHERE leave_emp_id='$user' ORDER BY leave_emp_id ASC, date_updated DESC LIMIT 1";
	$run_leave = mysqli_query($link, $get_leave) or die(mysqli_error($link));
	
	if(mysqli_num_rows($run_leave)>0)
	{
		while($row=mysqli_fetch_array($run_leave))
			{
			$date_fr=$row["from_date"];
			$date_to=$row["to_date"];
			$days=$row["no_of_days"];
			$leave_bal=$row["leave_balance"];
			$status=$row["status"];
		}
	
}

		
?>
	
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
				<div class="col-sm-4">
					<div class="caption">
						<i class="fa fa-calendar"></i>
						<label for="From_Date" class="control-label mb-1">From Date</label>
						<label  class="form-control"><?php echo $date_fr; ?></label>
					</div>
				</div>
				<div class="col-sm-4">
                            <div class="caption">
                               <i class="fa fa-calendar"></i>
                               <!-- date_of_confirmation=date_confirm -->
                                <label for="To_date" class="control-label mb-1">To Date</label>
								<label  class="form-control"><?php echo $date_to; ?></label> 
                               </div>
                          </div>
	
		<div class="col-sm-4">
			<div class="caption">
			<label for="emp_phone" class="control-label mb-1">No Of Days</label>
		<label  class="form-control"><?php echo $days; ?></label> 
		</div>
		</div>
		
		<div class="col-sm-4">
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
 
 
 </div>
  <?php 
if(isset($_GET['leave'])){
			$leave_type_id=$_GET['leave'];	
		}
	
if(isset($_POST['description'])){

		$from_date=mysqli_real_escape_string($link, $_POST['from_date']);
		$to_date=mysqli_real_escape_string($link, $_POST['to_date']);
		$description=mysqli_real_escape_string($link, $_POST['description']);
		$no_of_days=mysqli_real_escape_string($link, $_POST['no_of_days']);
		
		$leave_balance	= $leave_bal - $no_of_days;
		
	 $sql=mysqli_query($link, "INSERT INTO leave_work_table (wk_id,wk_date_applied,wk_reason,wk_type,wk_from_date,wk_to_date,wk_days,wk_leave_bal,wk_status)
	VALUES('$emp1',NOW(),'$description','$leave_type_id','$from_date','$to_date','$no_of_days','$leave_balance','applied')") or die(mysqli_error($link));
	
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
