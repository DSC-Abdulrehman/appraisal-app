<?php
$hotel_id=0;
$carrier2=0;
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
$booking="";
$leave_type1_id=0;
$leave_type1_title="";
$carrier1=0;
$dep_carr="";
$ret_carr="";
include_once("connect.php");

if (isset($_GET['user'])) {
   $user=$_GET['user'];
}
if (isset($_GET['tripid'])) {
   $trip_id=$_GET['tripid'];
}
if (isset($_GET['booking'])) {
   $booking=$_GET['booking'];
}
$trip_id=1;
$get_trip = "SELECT * FROM employee_trips WHERE trip_id='$trip_id'";
  $run_trip = mysqli_query($link, $get_trip) or die(mysqli_error($link));
  
  if(mysqli_num_rows($run_trip)>0)
  
  {
    while($row=mysqli_fetch_array($run_trip))
      {
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
    }

  }

  $get_c_type = "SELECT * FROM carrier_type";
        $run_c_type = mysqli_query($link, $get_c_type);
        while ($c_type_row=mysqli_fetch_array($run_c_type)) 
        {
        if ($c_type_row['carr_type_id']==$departure) {
          $dep_carr=$c_type_row['carr_type_name'];
        }
      if ($c_type_row['carr_type_id']==$return) {
          $ret_carr=$c_type_row['carr_type_name'];
        }

        } 

    $getemp = "SELECT * FROM employee_record WHERE employee_id='$emp_id' order by employee_id ASC  LIMIT 1";
        $run_emp = mysqli_query($link, $getemp);
        while ($emp_row=mysqli_fetch_array($run_emp)) 
        {
    $name=$emp_row['employee_name'] . " " . $emp_row['last_name'];
	  $desig=$emp_row['employee_desig'];
	  $grade=$emp_row['employee_grade'];
	  $deptt=$emp_row['employee_dept'];
    $emp_doj=$emp_row['employee_doj'];
    $emp_doc=$emp_row['employee_doc'];
    $sup_id=$emp_row['employee_supervisor_id'];
	  $manager_id=$emp_row['emp_manager'];
	  $team=$emp_row['employee_team'];
	  $team_lead_id=$emp_row['emp_team_lead'];       
}
     $getemp1 = "SELECT * FROM employee_record WHERE employee_id='$manager_id' order by employee_id ASC  LIMIT 1";
        $run_emp1 = mysqli_query($link, $getemp1);
        while ($emp1_row=mysqli_fetch_array($run_emp1)) 
        {
   $manager=$emp1_row['employee_name'] . " " . $emp1_row['last_name'];
      }

   $getemp2 = "SELECT * FROM employee_record WHERE employee_id='$team_lead_id' order by employee_id ASC  LIMIT 1";
        $run_emp2 = mysqli_query($link, $getemp2);
        while ($emp2_row=mysqli_fetch_array($run_emp2)) 
        {
      $team_lead=$emp2_row['employee_name'] . " " . $emp2_row['last_name'];
     
  } 

   $getemp3 = "SELECT * FROM employee_record WHERE employee_id='$sup_id' order by employee_id ASC LIMIT 1";
        $run_emp3 = mysqli_query($link, $getemp3);
        while ($emp3_row=mysqli_fetch_array($run_emp3)) 
        {
      $supervisor=$emp3_row['employee_name'] . " " . $emp3_row['last_name'];
     
  } 

  $get_desg = "SELECT * FROM employee_desig WHERE desig_id='$desig' LIMIT 1";
        $run_desg = mysqli_query($link, $get_desg);
        while ($desg_row=mysqli_fetch_array($run_desg)) 
        {
      $designation=$desg_row['title'];

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
        if ($return_from==$city_row["city_id"]) {
    $city_name3=$city_row["city_title"];
         }
        if ($return_to==$city_row["city_id"]) {
    $city_name4=$city_row["city_title"];
         }
      
        } 

    $get_team = "SELECT * FROM teams WHERE team_deptt = '$deptt' AND team_code='$team' LIMIT 1";
        $run_team = mysqli_query($link, $get_team);
        while ($team_row=mysqli_fetch_array($run_team)) 
        {
      $team_title=$team_row['team_name'];

        } 

    $getdept = "SELECT * FROM department WHERE deptt_id='$deptt' LIMIT 1";
        $run_dept = mysqli_query($link, $getdept);
        while ($dept_row=mysqli_fetch_array($run_dept)) 
        {
      $deptt=$dept_row['deptt_name'];
      
        }

$getgrad = "SELECT * FROM employee_grade WHERE grade_ser='$grade' LIMIT 1";
        $run_grad = mysqli_query($link, $getgrad);
        while ($grad_row=mysqli_fetch_array($run_grad)) 
        {

$grade_title=$grad_row['grade_title'];      
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
        <title>Trips</title>
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
	

<section class="section-1  bordered-column">
 <div class="row margin-off align-center bordered-column section-heading">
  <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
  <h1>MY Travel Request</h1>
                        </div>
                    </div>
  <div class="row align-center margin-off border-bottom-custom">
  <div class="col-lg-2 col-md-3 col-sm-3 col-sx-12 ">
  <h4>Employe</h4>
 </div>
<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
<div class="row align-center" >
<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
<div class="row align-center margin-off ">
<div class="col-lg-6 col-md-6 col-sm-6 border-right-col" style="">
 <label for="id_no" >ID : &nbsp; <?php echo $emp_id; ?></label>
    </div>
  <div class="col-lg-6 col-md-6 col-sm-6" style="">
    <label for="id_no" >Name : &nbsp; <?php echo $name; ?></label>
                                            
  </div>
    </div>
     </div>
 <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
<div class="row align-center margin-off border-right-col ">
  <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
  <label for="id_no" >Title :&nbsp; <?php echo $designation; ?></label>
 </div>
 <div class="col-lg-6 col-md-6 col-sm-6">
  <label for="id_no" >Grade :&nbsp; <?php echo $grade_title; ?></label>
 </div>
</div>
</div>
</div>
<div class="row align-center" >
 <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
 <div class="row align-center margin-off" >
  <div class="col-lg-6 col-md-6 col-sm-6" >
  <label for="id_no" >Department :&nbsp; <?php echo $deptt; ?></label>
  </div>
 <div class="col-lg-6 col-md-6 col-sm-6 border-left-col" >
  <label for="id_no" >Manager : &nbsp; <?php echo $manager; ?></label>
  </div>
   </div>
    </div>
 <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
<div class="row align-center margin-off" >
  <div class="col-lg-6 col-md-6 col-sm-6" >
    <label for="id_no" >Team :&nbsp; <?php echo $team_title; ?></label>
  </div>
   <div class="col-lg-6 col-md-6 col-sm-6 border-left-col border-right-col" >
  <label for="id_no" >Team_lead :&nbsp; <?php echo $team_lead; ?></label>
   </div>
    </div>
     </div>
     </div>

<div class="row align-center" >
  <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
 <div class="row align-center margin-off" >
  <div class="col-lg-6 col-md-6 col-sm-6" >
    <label for="id_no" >Supervisor :&nbsp; <?php echo $supervisor; ?></label>
       </div>
<div class="col-lg-6 col-md-6 col-sm-6 border-left-col" >
 <label for="id_no" >Designation : &nbsp; <?php echo $sup_title; ?></label>
  </div>
     </div>
        </div>
  <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
 <div class="row align-center margin-off" >
<div class="col-lg-6 col-md-6 col-sm-6" >
  <label for="id_no" >Joining Date :&nbsp; <?php echo $emp_doj; ?></label>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 border-left-col border-right-col" >
   <label for="id_no" >Confirmation Date :&nbsp; <?php echo $emp_doc; ?></label>
   </div>
    </div>
     </div>
     </div>
      </div>
       </div>
          
  <div class="row align-center margin-off border-bottom-custom">
                        
  <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
  <div class="row align-center" >
   </div>
      </section>
					
	 <section class="section-competencies">
                  
         
                            
                <div class="panel-body">
		<div class="panel panel-default bordered-column" style="margin-top: -10px;">
                            <div class="panel-heading bordered-column" style="height: 30px;">
                                <h2 class="panel-title" style="font-size:24px;"> &nbsp; &nbsp; &nbsp; Itinerary Information</h2>
                            </div>		
			<!--form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST"-->
                       
                            <div class="row align-center border-bottom-custom">
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
<div class="col-lg-6 col-md-6 col-sm-6
 border-left-col border-right-col" >
   <label for="id_no" > Date : &nbsp; <?php echo date('Y-m-d'); ?></label>
    </div>
<div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
 <label for="emp_cell" class="control-label mb-1">Contact Number </label>
</div>
 <div class="col-lg-3 col-md-3" >
  <input type="text" class="form-control" name="cell" id="cell" value=<?php echo $emp_cell; ?>>
  </div>
     
 </div>
</div>

<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
<div class="row align-center margin-off">
  <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >     
  <label for="id_no" >Purpose of Travel : </label>
 </div>
                                        
  <div class="col-lg-8 col-md-8 col-sm-8" >
   <label for="id_no" > <?php echo $purpose; ?> </label>
     </div>
										  
                                    </div>
                                </div>
                            </div>
				
      <div class="row align-center border-bottom-custom">

        <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col border-right-col">

    <div class="row align-center margin-off">

       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col border-left-col">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Expected Date Of </label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="id_no" > <?php echo $status; ?> </label>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
      <div class="col-lg-9 col-md-9 col-sm-9 border-right-col">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Travel Details </label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Carrier </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row align-center border-bottom-custom">

        <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col border-left-col">
        <div class="row align-center margin-off">
       <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Departure </label>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 border-left-col">
        <label for="id_no" > <?php echo $date_fr; ?> </label>
      </div>
    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No Of Days </label>
        </div>

       </div>

    </div>

          <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col">

        <div class="row align-center margin-off">

          <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
             <label for="id_no" > <?php echo $city_name1; ?> </label>
   </div>
        <div class="col-lg-6 col-md-6 col-sm-6 border" >
             <label for="id_no" > <?php echo $city_name2; ?> </label>
   </div>

  </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="id_no" > <?php echo $dep_carr; ?> </label>
        </div>

       </div>

    </div>

  </div>


  <div class="row align-center border-bottom-custom">

        <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col border-left-col">
        <div class="row align-center margin-off">
       <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Return </label>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 border-left-col">
        <label for="id_no" > <?php echo $date_to; ?> </label>
      </div>
    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="id_no" > <?php echo $days; ?> </label>
        </div>

       </div>

    </div>

          <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col">

        <div class="row align-center margin-off">

          <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
             <label for="id_no" > <?php echo $city_name3; ?> </label>
   </div>
        <div class="col-lg-6 col-md-6 col-sm-6 border" >
             <label for="id_no" > <?php echo $city_name4; ?> </label>
   </div>

  </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="id_no" > <?php echo $ret_carr; ?> </label>
        </div>

       </div>
    </div>
  </div>

<div class="panel panel-default bordered-column">
 <div class="panel-heading bordered-column">
  <h2 class="panel-title" style="font-size:24px;"> &nbsp; &nbsp; Entitlement</h2>
   </div>
                            
                <div class="panel-body">  

<div class="row align-center border-bottom-custom">

        <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col border-right-col">

    <div class="row align-center margin-off">

       <div class="col-lg-4 col-md-4 col-sm-4 border-right-col">
        <label for="emp_cell" class="control-label mb-1"> Traveling : &nbsp; </label>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
        <label for="id_no" > <?php echo $travel_ent; ?> </label>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
      <div class="col-lg-4 col-md-4 col-sm-4 border-right-col">
        <label for="emp_cell" class="control-label mb-1"> &nbsp; &nbsp; &nbsp;Room Rent per day </label>
        </div>
        <div class="col-lg-8 col-md- col-sm-8">
        <label for="id_no" > <?php echo $hotel_ent; ?> </label>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row align-center border-bottom-custom">

        <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col border-right-col">

    <div class="row align-center margin-off">
       <!--div class="col-lg-9 col-md-9 col-sm-9 border-right-col">
        <div class="row align-center margin-off"-->
       <div class="col-lg-4 col-md-4 col-sm-4">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp;Daily Allowance : </label>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 border-left-col">
        <label for="id_no" > <?php echo $daily_all; ?> </label>
      </div>
    </div>
        </div>
        

       <!--/div>

    </div-->

          <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
             <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp;Taxi Fare per KM : </label>
   </div>
        <div class="col-lg-8 col-md-8 col-sm-8 border" >
             <label for="id_no" > <?php echo $taxi_fare_km; ?> </label>
   </div>

  </div>

        </div>
        
       </div>
 
<?php 
$a=0;
$d_all=0;
$hotel1=0;
$hotel2=0;
$hroom1="";
$hroom2="";
$d_all1="";
$tot1=0;
$tot2=0;
$return_fare=0;
$total1="";
$total2="";
$taxi_fare1=100*30;
$l_type_title="";
$taxi_fare=number_format($taxi_fare1);
$min_fare1="";
$max_fare1="";
$hotel1=$hotel_ent1 * $days;
$hotel2=$hotel_ent2 * $days;
$d_all=$daily_all * $days;
$total=$hotel1+$hotel2+$d_all+$taxi_fare1;
$total1=number_format($total);
$hroom1=number_format($hotel1);
$hroom2=number_format($hotel2);
$d_all1=number_format($d_all);
  $get_city = "SELECT * FROM city";
  $run_city = mysqli_query($link, $get_city) or die(mysqli_error($link));
  
  if(mysqli_num_rows($run_city)>0)

  {
    while($row_city=mysqli_fetch_array($run_city))
      {

if ($row_city["city_id"] == $trip_from)
{
   $city_t1=$row_city["city_title"];
} 

if ($row_city["city_id"] == $trip_to)
{
   $city_t2=$row_city["city_title"];
} 

if ($row_city["city_id"] == $return_from)
{
   $city_t3=$row_city["city_title"];
} 

if ($row_city["city_id"] == $return_to)
{
  $city_t4=$row_city["city_title"];
} 
       }
   }


$get_trip1 = "SELECT * FROM carr_fare_list";
  $run_trip1 = mysqli_query($link, $get_trip1) or die(mysqli_error($link));
  
  if(mysqli_num_rows($run_trip1)>0)
  
  {
    while($row1=mysqli_fetch_array($run_trip1))
      {
 // $net_pay=number_format($net_pay);    
//$city_t1 = $row1['fare_from'];
//$city_t3 = $row1['fare_to'];
if ($city_t1 = $row1['fare_from'] AND $city_t3 = $row1['fare_to']) {
  
if ($departure==$return) {
  $return_fare=$row1['fare_round_trip'];
  }

  if ($min_fare==0) {
    $min_fare=$return_fare;
    $max_fare=$return_fare;
  }
  
  if ($return_fare < $min_fare) {
  $min_fare=$return_fare;
  }
  if ($return_fare > $max_fare) {
  $max_fare=$return_fare;
  }
       }
   }

$min_fare1=number_format($min_fare);
$max_fare1=number_format($max_fare);
$tot1=$min_fare+$hotel1+$d_all+$taxi_fare1;
$tot2=$max_fare+$hotel2+$d_all+$taxi_fare1;
$total1=number_format($tot1);
$total2=number_format($tot2);
}
?>

<div class="row align-center border-bottom-custom">

<div class="col-lg-2 col-md-2 col-sm-2">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp;Approx Trip Expenses </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 border-left-col">
        <label for="id_no" >Travel: &nbsp; &nbsp; <?php echo $min_fare1; ?>&nbsp; - &nbsp; <?php echo $max_fare1; ?></label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 border-left-col">
        <label for="id_no" >Hotel: &nbsp; <?php echo $hroom1; ?>&nbsp; - <?php echo $hroom2;?> </label>
      </div>
<div class="col-lg-2 col-md-2 col-sm-2 border-left-col">
<label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; Daily All :&nbsp; <?php echo $d_all1; ?></label>
      </div>
<div class="col-lg-2 col-md-2 col-sm-2 border-left-col">
<label for="id_no" > Taxi Fare 100KM :&nbsp; <?php echo $taxi_fare; ?> </label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 border-left-col">
<label for="id_no" > Total : &nbsp;<?php echo $total1; ?>&nbsp; - &nbsp; <?php echo $total2; ?> </label>
  </div>
</div>

    <div class="panel-heading bordered-column" style="margin-top: 5px;">
     <h2 class="panel-title" style="font-size:24px;"> &nbsp; &nbsp; Booking Information</h2>
   </div>
      <form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST">
                       
  <div class="row align-center border-bottom-custom">
   <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
    <div class="row align-center margin-off">
    
     <div class="col-lg-6 col-md-6 col-sm-6
     border-left-col" >
         <select id="carrier1" name="carrier1" class="form-control" style="height: 34px;">
          <option>Select Starting Carrier</option>
     <?php
$get_type = "select * from carr_fare_list WHERE carr_type=$departure";
$run_type= mysqli_query($link,$get_type);
while ($type_row=mysqli_fetch_array($run_type)) {
 $leave_type_id=$type_row['fare_id'];

$leave_type_title=$type_row['fare_one_way']. ' --- '.$type_row['carr_name'];
 echo "<option value='$leave_type_id'>$leave_type_title </option>";
  }
?>
  </select>
</div>

    <div class="col-lg-6 col-md-6 col-sm-6
     border-left-col" >
         <select id="carrier2" name="carrier2" class="form-control" style="height: 34px;">
          <option>Select Return Carrier</option>
     <?php
    $get_type1 = "select * from carr_fare_list WHERE carr_type=$return";
        $run_type1= mysqli_query($link,$get_type1);
        while ($type1_row=mysqli_fetch_array($run_type1)) {
      $leave_type1_id=$type1_row['fare_id'];
     //$leave_type1_title=$type1_row['carr_name'];
    $leave_type1_title=$type1_row['fare_one_way']. ' --- '.$type1_row['carr_name'];    
        echo "<option value='$leave_type1_id'>$leave_type1_title</option>";
            }
    ?>
    </select>
         </div>

    
    
      </div>
     </div>

      <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">                 <div class="row align-center margin-off">
<div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
<select id="hotel" name="hotel" class="form-control" style="height: 34px;">
          <option>Hotel Booking</option>
     <?php
        $get_hotel = "select * from hotels";
        $run_hotel= mysqli_query($link,$get_hotel);
        while ($hotel_row=mysqli_fetch_array($run_hotel)) {
$hotel_id=$hotel_row['hotel_id'];
$hotel_title=$hotel_row['hotel_name'] . " " . $hotel_row['single_bed_rent'] . " " . $hotel_row['double_bed_rent'];
        
echo "<option value='$hotel_id'>$hotel_title</option>";
            }
    ?>
    </select>
       
 </div>
  
  <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" > From Date:
         <input  name="from_date" id="from_date" type="date" class="form-control edatepicker">
       
   </div>

   <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" > To Date :
         <input  name="to_date" id="to_date" type="date" class="form-control edatepicker">
       
   </div>
    </div>
     </div>
      </div>
        
        <div class="button-div">
           <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> submit</button>
        </div>
   
  </form>
</div>			
</div>  
 
	</section>	
	 </div>
    </div>
	</div>

<?php 
if (isset($_POST['submit'])) {
    $carrier1=mysqli_real_escape_string($link, $_POST['carrier1']);
   echo $hotel_id=mysqli_real_escape_string($link, $_POST['hotel']);
    $carrier2=mysqli_real_escape_string($link, $_POST['carrier2']);
    $date_fr=mysqli_real_escape_string($link, $_POST['from_date']);
    $date_to=mysqli_real_escape_string($link, $_POST['to_date']);
   
//}
  $ret_fare=0;
  $room_rent=0;
  $tot_daily_all=0;
  $taxi_fare=0;
  $tot_daily_all = $daily_all * $days;
  $taxi_fare=$taxi_fare_km * $days;
  $get_fare = "SELECT * FROM carr_fare_list WHERE fare_id='$carrier1' LIMIT 1";
        $run_fare = mysqli_query($link, $get_fare);
        while ($fare_row=mysqli_fetch_array($run_fare)) 
        {
      $ret_fare=$fare_row['fare_one_way'];

        } 
$get_fare = "SELECT * FROM carr_fare_list WHERE fare_id='$carrier2' LIMIT 1";
        $run_fare = mysqli_query($link, $get_fare);
        while ($fare_row=mysqli_fetch_array($run_fare)) 
        {
       $ret_fare= $ret_fare + $fare_row['fare_one_way'];

        }

$get_hotel = "SELECT * FROM hotels WHERE hotel_id='$hotel_id' LIMIT 1";
        $run_hotel = mysqli_query($link, $get_hotel);
        while ($hotel_row=mysqli_fetch_array($run_hotel)) 
        {
       $room_rent= $hotel_row['single_bed_rent'] * $days;

        } 

$sql=mysqli_query($link, "UPDATE employee_trips SET trip_carr_start='$carrier1', trip_date_start='$date_fr', trip_carr_return='$carrier2', trip_date_return='$date_to', 
  trip_hotel_name='$hotel_id', trip_hotel_check_in_date='$date_fr', trip_hotel_check_out_date='$date_to', trip_actual_treturn_icket='$ret_fare',trip_actual_hotel_exp='$room_rent', trip_actual_taxi_fare='$taxi_fare', trip_actual_daily_allowance='$tot_daily_all', 
  status='booked', 
  date_updt=NOW() WHERE trip_id='$trip_id'") or die(mysqli_error($link));

  //header("Location: travel_final_info.php?user=$user&tripid=$trip_id&booking=booked");
      
}
?>    
	 
 <script>
      function getDateDiff(date){
        var currDate = new Date();
        var lastDay = new Date(currDate.getFullYear(), currDate.getMonth(), 0);
        var lastDate = lastDay.getDate();
        var d = new Date(date);
        var day = d.getDate() - 1;
        var diff = lastDate - day;
        return diff;
      }
      function gradechange(){

        var e = document.getElementById("grade_drop");
        var strUser = e.options[e.selectedIndex].value;

        alert(strUser);

      }
    </script>
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
	
	