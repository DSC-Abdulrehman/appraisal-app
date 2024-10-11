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
$dept="";
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
 
  <div class="col-lg-3"><h3>Appraisals Fiscal Year : </h3> </div>
 		<div class="col-lg-3">
                            
                   <label for="From_Date" class="control-label mb-1"><b> Fiscal Year - From </b></label>

                        <div class="caption">
          <input  name="from_date" id="from_date" type="text" class="form-control">    
                        </div>             
                          </div>
         
	<div class="col-lg-3 right_padding left_padding_md">
                            
                                <label for="To_date" class="control-label mb-1"><b>&nbsp; Fiscal Year - to</b></label>
							<div class="caption">
								<input  name="to_date" id="to_date" type="text" class="form-control">     
                               </div>
                          </div>
	 <div class="col-lg-1">&nbsp; </div>
	<div class="col-sm-1">
           <input type="submit" style="height: 50px; width: 160px;" class="btn btn-md leave_sub_btn" name="submit" value="submit"/>
    	        </div>
	</form>	
	</div>

</div>	


    <td width="100">&nbsp; Employee </td>
    <td width="250">&nbsp; Name</td>
    <td width="150">&nbsp; Joining Date</td>
    <td width="150">&nbsp; Confirmation Date </td>
    <td width="50">&nbsp; Grade</td>
    <td width="200">&nbsp; Designation</td>
    <td width="120">&nbsp; Status </td>
    <td width="50">&nbsp; </td>
    
  </tr>
	
</div>
	

</div>
</body>
</html>
