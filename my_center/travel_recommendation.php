<?php
//header("Location: ../index-emp.php?user=$user");
$date1="";
$date2="";
$departure="";
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
include_once("connect.php");

//if (isset($_GET['leave'])) {
    //$leave = $_GET['leave'];
//}

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

   $getemp3 = "SELECT * FROM employee_record WHERE employee_id='$sup_id' order by employee_id ASC  LIMIT 1";
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

    $get_trip = "SELECT * FROM employee_trips WHERE emp_id='$user' ORDER BY emp_id ASC, date_updt DESC LIMIT 1";
  $run_trip = mysqli_query($link, $get_trip) or die(mysqli_error($link));
  
  if(mysqli_num_rows($run_trip)>0)
  
  {
    while($row=mysqli_fetch_array($run_trip))
      {
      $date_fr=$row["exp_travel_date"];
      $date_to=$row["exp_return_date"];
      $days=$row["trip_days"];
      $trip_from=$row["trip_from"];
      $trip_to=$row["trip_to"];
    }

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
                            <h4>Employee</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" style="">
                                            <label for="id_no" >ID : &nbsp; <?php echo $user; ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="">
                                            <label for="id_no" >Name : &nbsp; <?php echo $name; ?></label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
                                            <label for="id_no" >Title :&nbsp; <?php echo $designation; ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col">
                                            
                                    <label for="id_no" >Grade :&nbsp; <?php echo $grad_title; ?></label>
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
                                            <label for="id_no" >Team :&nbsp; <?php echo $team; ?></label>
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

  <?php
    $date_fr="01.01.2023"; 
    $date_to="20.01.2023";
    $cityx="Karachi";
    $cityy="Lahore"; 
    $start=$cityx . " to " . $cityy . " on " . $date_fr;   
    $end=$cityy . " from " . $cityx . " on " . $date_to;
    $purpose="To take NetSuite training"           
  ?>                 
                    <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Last Trip's Details</h4>
                        </div>
                         <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-4 col-md-4 col-sm-4 col-sx-4 border-bottom-custom border-left-col">
                                    <label for="id_no" >From &nbsp; <?php echo $start; ?></label>
                                  </div>

<div class="col-lg-4 col-md-4 col-sm-4 col-sx-4 border-bottom-custom border-left-col">
                                    <label for="id_no" >Return to &nbsp; <?php echo $end; ?></label>
                                  </div>

<div class="col-lg-4 col-md-4 col-sm-4 col-sx-4 border-bottom-custom border-left-col">
                                    <label for="id_no" >Purpose : &nbsp; <?php echo $purpose; ?></label>
                           
                        </div>
                    </div>
            </section>
					
	 <section class="section-competencies">
                  
         <div class="panel panel-default bordered-column">
                            <div class="panel-heading bordered-column">
                                <h2 class="panel-title" style="font-size:24px;"> Travel Authorization Form </h2>
                            </div>
                            
                <div class="panel-body">
				
			<form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST">
                       
                            <div class="row align-center border-bottom-custom" style="margin-top: -10px;" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-6 col-md-6 col-sm-6
                                        border-left-col border-right-col" >
                                             <label for="id_no" > Date : &nbsp; <?php echo date('Y-m-d'); ?></label>
                                        </div>
										<div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                             <label for="emp_cell" class="control-label mb-1">Contact Number : </label>
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
                                          <input type="text" class="form-control" name="description" id="description" placeholder="Mention here " />
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
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No Of Days </label>
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
        <input  name="from_date" id="from_date" type="date" class="form-control edatepicker">
      </div>
    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Carrier </label>
        </div>

       </div>

    </div>

          <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col">

        <div class="row align-center margin-off">

          <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
            <select id="city1" onChange="getLeave(this)" name="city1" class="form-control" style="height: 34px;">
          <option>Departing City</option>
     <?php
        $get_type = "select * from city";
        $run_type= mysqli_query($link,$get_type);
        while ($type_row=mysqli_fetch_array($run_type)) {
        $leave_type_id=$type_row['city_id'];
        $leave_type_title=$type_row['city_title'];
        
        echo "<option value='$leave_type_id'>$leave_type_title</option>";
            }
    ?>
    </select>
   </div>
        <div class="col-lg-6 col-md-6 col-sm-6 border" >
            <select id="city2" onChange="getLeave(this)" name="city2" class="form-control" style="height: 34px;">
          <option>Destination</option>
     <?php
        $get_type = "select * from city";
        $run_type= mysqli_query($link,$get_type);
        while ($type_row=mysqli_fetch_array($run_type)) {
        $leave_type_id=$type_row['city_id'];
        $leave_type_title=$type_row['city_title'];
        
        echo "<option value='$leave_type_id'>$leave_type_title</option>";
            }
    ?>
    </select>
   </div>

  </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
         <select name="departure" class="form-control" style="height: 30px;">
            <option value="By Air">By Air</option>
            <option value="By Train">By Train</option>
            <option value="By Road">By Road</option>
                    </select>
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
        <input  name="to_date" id="to_date" type="date" class="form-control edatepicker">
      </div>
    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <label for="emp_cell" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Carrier </label>
        </div>

       </div>

    </div>

          <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-right-col">

    <div class="row align-center margin-off">
       <div class="col-lg-9 col-md-9 col-sm-9 border-right-col">

        <div class="row align-center margin-off">

          <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
            <select id="city3" onChange="getLeave(this)" name="city3" class="form-control" style="height: 34px;">
          <option>Departing City</option>
     <?php
        $get_type = "select * from city";
        $run_type= mysqli_query($link,$get_type);
        while ($type_row=mysqli_fetch_array($run_type)) {
        $leave_type_id=$type_row['city_id'];
        $leave_type_title=$type_row['city_title'];
        
        echo "<option value='$leave_type_id'>$leave_type_title</option>";
            }
    ?>
    </select>
   </div>
        <div class="col-lg-6 col-md-6 col-sm-6 border" >
            <select id="city4" onChange="getLeave(this)" name="city4" class="form-control" style="height: 34px;">
          <option>Destination</option>
     <?php
        $get_type = "select * from city";
        $run_type= mysqli_query($link,$get_type);
        while ($type_row=mysqli_fetch_array($run_type)) {
        $leave_type_id=$type_row['city_id'];
        $leave_type_title=$type_row['city_title'];
        
        echo "<option value='$leave_type_id'>$leave_type_title</option>";
            }
    ?>
    </select>
   </div>

  </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
        <select name="return" class="form-control" style="height: 30px;">
            <option value="By Air">By Air</option>
            <option value="By Train">By Train</option>
            <option value="By Road">By Road</option>
                    </select>
        </div>

       </div>

    </div>

  </div>


			
        <div class="button-div">
           <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> submit</button>
        </div>
	</section>	
	</form>
		
	</div>
	</div>
	</div>
<?php
    if(isset($_POST['submit']))
{   

    $date_from=mysqli_real_escape_string($link, $_POST['from_date']);
    $date_to=mysqli_real_escape_string($link, $_POST['to_date']);
    $departure=mysqli_real_escape_string($link, $_POST['departure']);
    $return=mysqli_real_escape_string($link, $_POST['return']);
    $city1=mysqli_real_escape_string($link, $_POST['city1']);
    $city2=mysqli_real_escape_string($link, $_POST['city2']);
    $city3=mysqli_real_escape_string($link, $_POST['city3']);
    $city4=mysqli_real_escape_string($link, $_POST['city4']);

  //echo $date_from=$_POST['from_date']; 
  //echo $date_to=$_POST['to_date'];
  //echo $departure = $_POST['departure'];
  //echo $return = $_POST['return'];
  //echo $city1 = $_POST['city1'];
  //echo $city2 = $_POST['city2'];
  //echo $city3 = $_POST['city3'];
  //echo $city4 = $_POST['city4'];
  
    
       //if (isset($_POST['from_date'])) {
      //echo $date_from=$_POST['from_date'];
       $date1=$_POST['from_date'];
      
      //}

      //if (isset($_POST['to_date'])) {
       //echo $date_to=$_POST['to_date'];
        $date2=$_POST['to_date'];
       // $leave=$_POST['leave'];

     // }

      $date_to = strtotime("$date_to"); 
      $date_from = strtotime("$date_from");
      $days1 = $date_to - $date_from;

      round ($days2 = $days1 / (60 * 60 * 24)+1);
    
    }

    $get_grade = "SELECT * FROM employee_grade WHERE grade_ser='$grade' LIMIT 1";
        $run_grade = mysqli_query($link, $get_grade);
        while ($grade_row=mysqli_fetch_array($run_grade)) 
        {

      $travel_ent=0;
      $hotel_ent1=0;
      $hotel_ent2=0;
      $daily_ent=0;
      $taxi_ent=0;

      $travel_ent=$grade_row['travel_entitlement'];
      $hotel_ent1=$grade_row['hotel_entitlement1'];
      $hotel_ent2=$grade_row['hotel_entitlement2'];
      $daily_ent=$grade_row['daily_allowance'];
      $taxi_ent=$grade_row['taxi_fare_km'];
        } 

    $sql=mysqli_query($link, "INSERT INTO employee_trips (trip_id,emp_id,emp_grade,sup_id,exp_travel_date,exp_return_date,trip_from,trip_to,return_from,return_to,trip_purpose,trip_days,trip_travel_entitlement,trip_hotel_ent_1,trip_hotel_ent_2,trip_daily_allonace,trip_taxi_fare,status)

    VALUES('','$user','$grade','$sup_id','$date1','$date2','$city1','$city2','$city3','$city4','$purpose','$days2','$travel_ent','$hotel_ent1','$hotel_ent2','$daily_ent','$taxi_ent','Applied')") or die(mysqli_error($link));
     
     //header("Location: travel_recommendation.php?user=$user");
    
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
	
	