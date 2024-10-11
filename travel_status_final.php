<script language="javascript">

function getLeave(leave)
{
	
	var value = $('#leave').find(":selected").text();

	$("#leave").val(value);

}

</script>


<?php
include_once("connect.php");
$date1="";
$date2="";
$departure="";
$return="";
$city1=0;
$city2=0;
$city3=0;
$city4=0;
$emp_cell="";
$description="";
$date_fr="";
$date_to="";
$date_from="";
$days=0;
$days2=0;
$status="";
$sup_title="Team Lead";
$sup_id="";
$supervisor="";
$manager="";
$team_lead="";
$department="";
$no_of_days=0;
$designation="";
$deptt="";
$manager_id =0;
$team_lead_id =0;
$desig =0;
$team =0;
$emp_doj ="";
$emp_doc ="";
$name="";
$title="";
$grade=0;
$grad_title="";
$trip_id=0;
$return_from="";
$return_to="";
$travel_ent="";
$hotel_ent1=0;
$hotel_ent2=0;
$daily_all=0;
$emp_id="";
$team_title="";
$city_name1="";
$city_name2="";
$city_name3="";
$city_name4="";
$status="";
$taxi_fare_km=0;
$min_fare=0;
$max_fare=0;
$trip_from="";
$trip_from=0;
$trip_to=0;
$grade_title="";
$purpose="";
$hotel_ent="";
$user="";
$emp_ser=0;
$user_id="";
$level="";
$email="";
$trip_id=0;
$wstatus="";
		$get_user = "SELECT * FROM user WHERE user_name='$user' LIMIT 1";
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
    <title>DS-TRAVELING</title>
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

	<!--div class="panel-body">

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
	
		</div>
		
	<div class="col-sm-2">
    <label for="emp_cell" class="control-label mb-1"><b>Status</b></label>
		<div class="row" style="font-size: 20px;">

    <select name="stat1" style="height: 50px; width: 150px;";>
        
        <option value="" disabled selected>Choose Status </option>
        <option value="all">All Records</option>
        <option value="pending">Pending</option>
        <option value="recommended">Recommended</option>
        <option value="approved">Approved</option>
        <option value="declined">Declined</option>
       
    </select>
</div>
</div>
	<div class="col-sm-1">
           <input type="submit" style="height: 50px; width: 160px;" class="btn btn-md leave_sub_btn" name="submit" value="submit"/>
    	        </div>
	</form>	
	</div>

</div-->	 
<?php
  
      $wstatus="booked";
  

?>
	<div class="panel-body">
		<div class="panel" style="box-shadow: -1px 0px 5px gray;">
	
	</div>
	</div>
	
<?php
  $get_emp_details = "SELECT * FROM employee_record WHERE employee_supervisor_id='$user' OR emp_manager='$user' OR emp_team_lead='$user' LIMIT 1";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
      
	  
  }
  
  //if ($sup_ind==1)
  //{
?>

<div class="row">
	<div class="panel panel-danger" style="width: 1100px; margin-left: 15px; margin-top: -20px;">
<div class="panel-heading panel-Info" style="margin-top: 0px">
				<h3 class="caption" align="center"><b>&darr; Travelling Report Status &darr;</b> </h3>
			</div>
<div class="panel-body">
<table width="1080" border="1">
  <tr>
    <td width="300">&nbsp; Employee </td>
    
    <td width="100">&nbsp; Travel Date</td>
    <td width="100">&nbsp; Return Date </td>
    <td width="160">&nbsp; Starting Place </td>
    <td width="160">&nbsp; Destination</td>
    <td width="70">&nbsp; Days </td>
    <td width="100">&nbsp; Status </td>
    <td width="90">&nbsp; Action</td>
    
  </tr>
  <?php
  $ind=0;
if ($wstatus=="") {

$get_trip = "SELECT * FROM employee_trips";
  $run_trip = mysqli_query($link, $get_trip) or die(mysqli_error($link));
  }else{
    $get_trip = "SELECT * FROM employee_trips WHERE status='$wstatus'";
  $run_trip = mysqli_query($link, $get_trip) or die(mysqli_error($link));
  }
  if(mysqli_num_rows($run_trip)>0)
  
  {
    while($row=mysqli_fetch_array($run_trip))
      {
      $trip_id=$row["trip_id"];
      $emp_id=$row["emp_id"];
      $date_fr=$row["exp_travel_date"];
      $date_to=$row["exp_return_date"];
      $days=$row["trip_days"];
      $trip_from=$row["trip_from"];
      $trip_to=$row["trip_to"];
      $return_from=$row["return_from"];
      $return_to=$row["return_to"];
      $purpose=$row["trip_purpose"];
      $travel_ent=$row["trip_travel_entitlement"];
      $hotel_ent1=$row["trip_hotel_ent_1"];
      $hotel_ent2=$row["trip_hotel_ent_2"];
    $daily_all=$row["trip_daily_allonace"];
    $departure=$row["trip_carrier_from"];
    $return=$row["trip_carrier_to"];
    $status=$row["status"];
    $taxi_fare_km=$row["trip_taxi_fare"];
   $hotel_ent=$hotel_ent1 . " - " . $hotel_ent2; 
    
    $getemp = "SELECT * FROM employee_record WHERE employee_id='$emp_id' order by employee_id ASC  LIMIT 1";
        $run_emp = mysqli_query($link, $getemp);
        while ($emp_row=mysqli_fetch_array($run_emp)) 
        { 
         $name="$emp_id" . " - " . $emp_row["employee_name"] . " " . $emp_row["last_name"];
    }   

  $get_city = "SELECT * FROM city";
$run_city = mysqli_query($link, $get_city);
  while ($city_row=mysqli_fetch_array($run_city)) 
        {
     if ($trip_from==$city_row["city_id"]) {
    $city_name1=$city_row["city_title"];
         } 

    if ($trip_to==$city_row["city_id"]) {
    $city_name2=$city_row["city_title"];
         } 
    }


?>	
  
  <tr>
    <input type="hidden" name="tripid" value="<?php echo $trip_id; ?>">
    <td width="300">&nbsp; <?php echo $name; ?></td>
    
    <td width="100">&nbsp; <?php echo $date_fr; ?></td>
    <td width="100">&nbsp; <?php echo $date_to; ?></td>
    <td width="160">&nbsp;<?php echo $city_name1; ?></td>
    <td width="160">&nbsp; <?php echo $city_name2; ?></td>
    <td width="70">&nbsp; <?php echo $days; ?></td>
    <td width="100">&nbsp; <?php echo $status; ?></td>

    <form action="" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm1" id="EmpForm1" method="post">
    <!--td width="100"><label class="form-control">
      
    <select id="stat" name="stat" value=<?php echo $wk_status; ?>>
      <option class="form-control" value="approved">Approved</option>
      <option class="form-control" value="declined">Declined</option>
      <option class="form-control" value="pending">Pending</option>
      </select></label>
      
	</td-->
    <td width="90"><label class="form-control">
      
      <input type="submit" class="btn btn-md recommend_appr_btn" name="view" value="view"> </label></td>
	</form>
  
  <?php
    }

echo $trip_id;
}

if(isset($_POST['view']))
  {  header("Location: travel_final_info.php?user=$user&tripid=$trip_id");

  }
?>
  </tr>
  </table>

</div>			
		
	

	

<form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post"> 
  <div class="row">
   <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> Go Back</button>
            </div>
      </div>
      </form>
   
<!--?php   
        if(isset($_POST['submit']))
{

      header("Location: index-emp.php?user=$user");
      
  
  }
?-->
</div>
</div>
	  </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>
