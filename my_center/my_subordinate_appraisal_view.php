<?php 
include 'connect.php';
$period="";
$period1="";
$opening_bal=0;
$leaves_late=0;
$leaves=0;
$closing_bal=0;
$tot_score=0;
$result=0;
$wrating=0;
$tot_score=0;
$planning=0;
$controlling=0;
$decesion=0;
$knowledge=0;
$professional=0;
$manager="";
$task=0;
$platform=0;
$integrated=0;
$learning=0;
$user="";
$lead_id="";
$team_lead="";
$score1=0;
$score2=0;
$score3=0;
$score4=0;
$score5=0;
$score6=0;
$score7=0;
$score8=0;
$sup_rmk="";

if (isset($_GET['user'])) {
 $user=$_GET['user'];
 $period=$_GET['period'];
}
$from_year=0;
$from21="";
$to_year=0;
$to21="";
$to2="";
//$period1 = explode('-', $period);
//$from = $period1[0];
//$to   = $period1[1];

//$from2 = explode(' ', $from);
//$from_year = $from2[1];
  
 
//$to_year = $from_year + 1;

if (isset($_POST['user'])) {
    $user=$_POST['user'];
    $period=$_GET['period'];
}

 $get_app = "SELECT * FROM appraisals WHERE app_employee='$user' AND from_year='$period'";
    $run_app = mysqli_query($link, $get_app);
      while ($app_row=mysqli_fetch_array($run_app)) 
    {
    $score1 = $app_row['app_score1'];
    $score2=$app_row['app_score2'];
    $score3=$app_row['app_score3'];
    $score4=$app_row['app_score4'];
    $score5=$app_row['app_score5'];
    $score6=$app_row['app_score6'];
    $score7=$app_row['app_score7'];
    $score8=$app_row['app_score8'];
    $tot_score=$app_row['app_gross'];
    $result = $app_row['app_rating'];
	$sup_rmk=$app_row['app_sup_rmk'];
    }
 
 $get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user'";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
      $emp_id=$emp_details_row["employee_id"];
      $emp_name=$emp_details_row["employee_name"] . "" . $emp_details_row["last_name"];
      $desig_code=$emp_details_row["employee_desig"];
      $emp_grade=$emp_details_row["employee_grade"];
      $emp_doj=$emp_details_row["employee_doj"];
      $emp_doc=$emp_details_row["employee_doc"];
      $emp_supid=$emp_details_row["employee_supervisor_id"];
      $lead_id=$emp_details_row["emp_team_lead"];
      $manager_id=$emp_details_row["emp_manager"];
      $emp_dept=$emp_details_row["employee_dept"];
      $emp_team=$emp_details_row["employee_team"];
}
    $get_designation = "SELECT * FROM employee_desig WHERE desig_id='$desig_code'";
    $run_designation = mysqli_query($link, $get_designation);
      while ($designation_row=mysqli_fetch_array($run_designation)) 
    {
      $designation=$designation_row["title"];
    }

   
    $get_grade = "SELECT * FROM department WHERE deptt_id='$emp_dept'";
    $run_grade = mysqli_query($link, $get_grade);
      while ($grade_row=mysqli_fetch_array($run_grade)) 
    {
      $deptt=$grade_row["deptt_name"];
    }

     $get_team = "SELECT * FROM teams WHERE team_deptt='$emp_dept' AND team_id='$emp_team'";
    $run_team = mysqli_query($link, $get_team);
      while ($team_row=mysqli_fetch_array($run_team)) 
    {
      $team=$team_row["team_name"];
    }

$get_sup_details = "SELECT * FROM employee_record WHERE employee_id='$emp_supid'";
    $run_sup_details = mysqli_query($link, $get_sup_details);
      while ($sup_details_row=mysqli_fetch_array($run_sup_details)) 
    {
      $sup_name=$sup_details_row["employee_name"] . "" . $sup_details_row["last_name"];
      $sup_desg=$sup_details_row["employee_desig"];
    }

    $get_desg = "SELECT * FROM employee_desig WHERE desig_id='$sup_desg'";
    $run_desg = mysqli_query($link, $get_desg);
      while ($desg_row=mysqli_fetch_array($run_desg)) 
    {
      $sup_title=$desg_row["title"];
    }

    $get_manager = "SELECT * FROM employee_record WHERE employee_id='$manager_id' LIMIT 1";
    $run_manager = mysqli_query($link, $get_manager);
      while ($manager_row=mysqli_fetch_array($run_manager)) 
    {
      $manager=$manager_row["employee_name"] . " " . $manager_row["last_name"];
      
    }

    $get_lead = "SELECT * FROM employee_record WHERE employee_id='$lead_id' LIMIT 1";
    $run_lead = mysqli_query($link, $get_lead);
      while ($lead_row=mysqli_fetch_array($run_lead)) 
    {
      $team_lead=$lead_row["employee_name"] . " " . $lead_row["last_name"];
      
    }

    $get_summary = "SELECT * FROM leaves_summary WHERE  l_emp_id='$user' AND l_fiscal_year1='$from_year' AND l_fiscal_year2='$to_year' LIMIT 1";
    $run_summary = mysqli_query($link, $get_summary);
      while ($summary_row=mysqli_fetch_array($run_summary)) 
    {
      
      $opening_bal=$summary_row["l_opening_leave_balance"];
      $leaves_late=$summary_row["l_leave_due_to_late"];
      $leaves=$summary_row["l_leaves"];
      $closing_bal=$summary_row["l_closing_balance"];
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
        <title>Annual Evaluation Appraisal</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        
        <link rel="stylesheet" href="style12.css">
        
        <link rel="stylesheet" href="style.css">
    </head>
    <?php include 'header.php'; ?>
    <body>
         <?php include 'sidebar.php'; ?>
       <div class="container evaluation-form-custom-container">
            <div class="row start-row">
               
                <div class="col-md-10" style="padding:0px;">


            <section class="section-1  bordered-column">
                    <div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                            <h1>ANNUAL PERFORMANCE APPRAISAL</h1>
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
                                            <label for="id_no" >ID : &nbsp; <?php echo $emp_id; ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="">
                                            <label for="id_no" >Name : &nbsp; <?php echo $emp_name; ?></label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
                                            <label for="id_no" >Title :&nbsp; <?php echo $designation; ?></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col">
                                            
                                            <label for="id_no" >Grade :&nbsp; <?php echo $emp_grade; ?></label>
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
                                            <label for="id_no" >Supervisor :&nbsp; <?php echo $sup_name; ?></label>
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
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Leave Position</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                                            <label for="id_no" >Opening Balance :</label>
                                        </div>
										<div class="col-lg-3 col-md-3 col-sm-3" style="">
                                            <label for="id_no" >&nbsp; <?php echo $opening_bal; ?></label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-left-col border-right-col" style="">
                                            <label for="id_no" >Due to Late : </label>
                                            
                                        </div>
										<div class="col-lg-3 col-md-3 col-sm-3" style="">
                                            <label for="id_no" > <?php echo $leaves_late; ?></label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >Leaves : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <label for="id_no" >&nbsp; <?php echo $leaves; ?></label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-left-col border-right-col">
                                            
                                            <label for="id_no" >Closing Balance : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                            
                                            <label for="id_no" >&nbsp; <?php echo $closing_bal; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-center">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-left-col">
                                            <div class="row align-center" >
                                                <div class="col-lg-4 col-md-6 col-sm-3  border-right-col">
                                                    <label for="id_no" >Late Coming</label>
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-sm-9" >
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g. 6" disabled>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col border-left-col">
                                            <div class="row align-center " >
                                                <div class="col-lg-4 col-md-6 col-sm-3  border-right-col" >
                                                    <label for="id_no" >Authorized Leave</label>
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-sm-9" >
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g 4" disabled>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 ">
                                            <div class="row align-center" >
                                                <div class="col-lg-4 col-md-6 col-sm-3 border-right-col" style="padding-left:0px;">
                                                    <label for="id_no" >Unauthorized Leave</label>
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-sm-9" >
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g 7" disabled>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
            </section>
            
            <section class="section-competencies">
			
			                  <!-- <div class="container demo"> -->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        
                         
                        
                        <div class="panel panel-default bordered-column" style="margin-top:-10px;">
                            <div class="panel-heading bordered-column" role="tab" id="headingTwo">
                                <h2 class="panel-title" align="center" style="font-size:20px;">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                         Rating & Corresponding Increment Percentage
                                    </a>
                                </h2>
                            </div>
							 <div id="collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
							
                              <div class="panel-body" style="margin-top:-10px;">
                                    
                                    <div class="row margin-off bordered-column">
                                        <div class="table-responsive-lg" style="width: 100%;">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Rating</th>
                                                    <th scope="col">Range</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Increment</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">5 – Outstanding </th>
                                                    <td>5</td>
                                                    <td>Outstanding performer; consistently exceeds expectations.</td>
                                                    <td>25%</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4 - Exceeds Expectations </th>
                                                    <td>
													
                                                        <div class="">4.5 – 4.99</div>
														<div class="">4.0 – 4.49</div>
														
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <p>Very good performer; often exceeds expectations</p>
                                                        </div>
														<div class="">
                                                            <p>
                                                                Very good performer; but not exceeds expectations
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <p>20%</p>
                                                        </div>
                                                        <div>
                                                            <p>15%</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3 - Meets Expectations</th>
                                                    <td>
                                                        <div class="">3.5 - 3.99</div>
                                                        <div class="">3.0 – 3.49</div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <p>Good performer; fully meets expectations</p>
                                                        </div>
                                                        <div class="">
                                                            <p>
                                                                Good performer; not meets fully expectations
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <p>10%</p>
                                                        </div>
                                                        <div>
                                                            <p>05%</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2 - Needs Improvement </th>
                                                    <td>
                                                        2.0-2.9
                                                    </td>
                                                    <td>
                                                        Requires some development to meet expectations
                                                    </td>
                                                    <td>
                                                        00%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">1 – Unsatisfactory</th>
                                                    <td>
                                                        1.0-1.9
                                                    </td>
                                                    <td>
                                                        Does not meet expectations and requires significant development
                                                    </td>
                                                    <td>
                                                        00%
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            
                     </div>
					 
					 <div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                            <h1> Rating & Corresponding Increment Percentage</h1>
                        </div>
                    </div>
					 
					    

                           <div class="panel-body">
                                    <ol class="ordered-list">
                                        <li class="list-element">
                                            <div class="row align-center margin-off" >
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p>
                                                        <strong class="list-element-section-heading">Planning and Organizing: </strong>The ability to analyse work, set goals, develop plans of action, and utilize time. Consider amount of supervision required and extent to which you can trust employee to carry out assignments conscientiously.
                                                    </p>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score1; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p>
                                                        <strong class="list-element-section-heading">Directing and Controlling: </strong>The ability to create a motivating climate, achieve teamwork, train and develop, measure work in progress, take corrective action.
                                                    </p>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score2; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p>
                                                        <strong class="list-element-section-heading">Decision Making: </strong>The ability to make decision and quality and timeliness of those decisions. The extent to which the employee make decisions that are sound. The ability to base decisions on facts rather than emotions.
                                                    </p>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score3; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                      
                
                        <div class="panel panel-default bordered-column" style="margin-top: 5px;">
                            <div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                            <h1> Professional Attributes</h1>
                        </div>
                    </div>
                            <div class="panel-body border-bottom-custom" >
                                    <ol class="ordered-list">
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p>
                                                        <strong class="list-element-section-heading">Job Knowledge/Quality of Work: </strong>Fully understand job main duties and responsibilities, apply knowledge, skills and experience to accomplish results. Maintain high standards despite pressing deadlines, does work right the first time; accurate and in an acceptable format, thorough, professional work at the right time.
                                                    </p>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score4; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p>
                                                        <strong class="list-element-section-heading">Professional/Personal Growth & Development: </strong>learn through interaction with others; Ability to learn new skills and improve existing skills, learn about new developments in same field, taking on new challenges in current position, projects, long or short-term assignments.
                                                    </p>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score5; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p><strong class="list-element-section-heading">Task assigned completed within time </strong></p>
                                                    <ul class="ordered-list">
                                                        <li class="list-element">
                                                            Ratio of number of tasks assigned with the number of tasks completed within time (According to Jira). 
                                                        </li>
                                                    </ul>
                                                    <table class="table table-bordered custom-table" style="">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">No of Tasks</th>
                                                            <th scope="col">Tasks Completed (within Time)</th>
                                                            <th scope="col">Tasks Completed (beyond Time)</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row"><input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g 7" ></th>
                                                            <td><input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g 4" ></td>
                                                            <td><input type="text" class="form-control" id="exampleFormControlInput1" placeholder=".e.g 3" ></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
  <div class="col-md-2 col-sm-4 col-4 custom-select-div">
   <label for="id_no" ><?php echo $score6; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col">
                                                    <p><strong class="list-element-section-heading">Integration Platforms Learning </strong></p>

                                                    <ul class="ordered-list">
                                                        <li class="list-element">
                                                            New integration platforms learned, and/or extended the functionality of already learned platforms. 
                                                        </li>
                                                    </ul>
                                                    <div class="align-center">
                                                    <label for="id_no">Integration Platform Learned:</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No. of Learned Platforms" style="width: 80%;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score7; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-element">
                                            <div class="row align-center margin-off">
                                                <div class="col-md-10 col-sm-8 col-8 border-right-col padding-bottom-custom">
                                                    <p><strong class="list-element-section-heading">Platforms (to be integrated) Learning</strong></p>
                                                    <ul class="ordered-list">
                                                        <li class="list-element">
                                                            Platforms to be integrated (E-Commerce, CRM, ERP) learned and integrated. 
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4 custom-select-div">
                                                    <label for="id_no" ><?php echo $score8; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    
                                </div>
								
	
                                
                         <div class="panel-body-sub-part ">
                                    <div class="bordered-column"><h4><b>&nbsp; &nbsp; Overall Performance:</b></h4></div>
                                    <div class="row align-center margin-off border-bottom-custom">
                                <div class="col-md-10 col-sm-8 padding-off">
                                            <div class="row align-center margin-off ">
                                                <div class="col-md-3 col-sm-6 col-12 border-right-col ">
                                                    <!-- <label for="id_no">Total Score :</label> -->
                                                    <div class="align-center">
                                                    <label for="id_no" class="form-label input-labels" >Total Score : &nbsp; <?php echo $tot_score; ?></label> 
                                                   
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-12 border-right-col ">
                                                    <div class="align-center">
                                                    <label for="id_no" class="form-label input-labels">Rating : &nbsp; <?php echo $result; ?></label>
                                                    </div>
                                                </div>
												<div class="col-md-7 col-sm-10s col-12 border-right-col ">
                                                    <div class="align-center">
													<label for="id_no" class="form-label input-labels">Supervisor Remarks : <?php echo $sup_rmk; ?></label>
													
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
									</div>       
                                
                            </div>
							
                     
                
                    </div><!-- panel-group -->
                    
               <form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post">     
                <!-- </div> -->
                <!-- container -->
            </section>
            <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> Go Back</button>
            </div>
            </form>
                </div>
            </div>
 <?php   
        if(isset($_POST['submit']))
{
   	  header("location:select_appraisals_period.php?user=$emp_supid");
  
  }

  ?>
        </div>
        
        <script src="index.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script> -->
    </body>
</html>