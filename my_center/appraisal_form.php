<?php
   $from_year=""; 
   $to_year="";
   $emp_id="";
   $dp1="";
   $dp2="";
   $dp3="";
   $dp4="";
   $dp5="";
   $str1="";
   $str2="";
   $str3="";
   $str4="";
   $str5="";
   $dev1="";
   $dev2="";
   $dev3="";
   $dev4="";
   $dev5="";
   $success="";
   $cmt_success="";
   $cmt_dp1="";
   $cmt_dp2="";
   $cmt_dp3="";
   $cmt_date="";
   $cmt_dp5="";
   $cmt_dev1="";
   $cmt_dev2="";
   $cmt_dev3="";
   $cmt_dev4="";
   $cmt_dev5="";
   $cmt_str1="";
   $cmt_str2="";
   $cmt_str3="";
   $cmt_str4="";
   $cmt_str5="";
   $remarks="";
   $cmt1="";
   $cmt2="";
   $cmt3="";
   $cmt4="";
   $cmt5="";
   $cmt6="";
   $cmt7="";
   $cmt8="";
   $cmt_sup1="";
   $cmt_emp1="";
   $cmt_emp2="";
   $cmt_mgr1="";
   $cmt_ceo1="";
   $cmt_hr1="";
   $wrating=0;
   $tot_score=0;
   $planning=0;
   $controlling=0;
   $decesion=0;
   $knowledge=0;
   $professional=0;
   $task=0;
   $platform=0;
   $learning=0;
   $user="";
   $emp_name="";
   $emp_sup_id="";
   $lbl1="Name : ";
   $bal=22;
   $auth=8;
   $unauth=3;
   $late=55;
   $lauth=20;
   $lunauth=35;
   $designation="";
   $deptt="";
   $sup_name="";
   $sup_title="";
   $desig_code=0;
   $emp_grade="";
   $emp_dept=0;
   $emp_team=0;
   $emp_supid=0;
   $sup_desg=0;
   $date=date("Y-m-d");
   $mm_curr=date("m");
   $mm_prev=$mm_curr - 1;
   $yy_curr=date("Y");
   $yy_prev=$yy_curr - 1;
   $emp_w="";
   $emp_sup="";
   $supervisor="";
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
     $year="Jun " . $yy_prev . " - May " . $yy_curr;
   }
   
 $year="Jul 2023 - Jun 2024";

   
   include_once("connect.php");
   
   if (isset($_GET['user'])) {
     $user=$_GET['user'];
   
   }
   

   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>DSC-Employee Center</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
   </head>
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
      background-color: #00bfff !important;
      color: white !important;
      margin-top: 19px;
      }
   </style>

   <?php include 'header.php';?>
   <body>
      <div class="">
         <?php include 'sidebar.php';?> 
         <div class="col-sm-9">
            <div class="row" style="margin-top: 5px; margin-bottom: -15px; width: 1200px;">
               <div class="panel panel-primary">
                  <div class="panel-heading" style="height: 50px; font-size: 24px;">
                     <div class="col-sm-9"><b>
                        ANNUAL PERFORMANCE APPRAISAL </b>
                     </div>
                     <div class="col-sm-3"><b>( <?php echo $year;?> )</b></div>
                  </div>
               </div>
               <?php

                $get_app_details = "SELECT * FROM appraisals WHERE app_employee='$user'";
       $run_app_details = mysqli_query($link, $get_app_details);
         while ($app_details_row=mysqli_fetch_array($run_app_details)) 
       {
     
         $from_year=$app_details_row["from_year"];
         $to_year=$app_details_row["to_year"];
         $emp_w=$app_details_row["app_employee"];
         $desig_code=$app_details_row["app_desig"];
         $emp_grade=$app_details_row["app_grade"];
         $emp_doj=$app_details_row["app_doj"];
         $emp_doc=$app_details_row["app_doc"];
         $emp_supid=$app_details_row["app_sup"];
         $emp_dept=$app_details_row["app_emp_dept"];
         $emp_team=$app_details_row["app_emp_team"];
         
         $get_emp_details = "SELECT * FROM employee_record WHERE employee_serial='$user'";
       $run_emp_details = mysqli_query($link, $get_emp_details);
         while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
       {
         
         $emp_name=$emp_details_row["employee_name"] . "" . $emp_details_row["last_name"];
         $emp_sup=$emp_details_row["emp_team_lead"];
       }

        $get_emp1_details = "SELECT * FROM employee_record WHERE employee_serial='$emp_sup'";
       $run_emp1_details = mysqli_query($link, $get_emp1_details);
         while ($emp1_details_row=mysqli_fetch_array($run_emp1_details)) 
       {
         
         $supervisor=$emp_sup . " - " . $emp1_details_row["employee_name"] . "" . $emp1_details_row["last_name"];
         //$emp_sup=$emp_details_row["emp_team_lead"];
       }

       $get_designation = "SELECT * FROM employee_desig WHERE desig_id='$desig_code'";
       $run_designation = mysqli_query($link, $get_designation);
         while ($designation_row=mysqli_fetch_array($run_designation)) 
       {
         $designation=$designation_row["title"];
       }
   
      $get_dept = "SELECT * FROM department WHERE deptt_id='$emp_dept'";
       $run_dept = mysqli_query($link, $get_dept);
        while ($dept_row=mysqli_fetch_array($run_dept)) 
       {
         $deptt=$dept_row["deptt_name"];
       }
   
        $get_team = "SELECT * FROM teams WHERE team_deptt='$emp_dept' AND team_id='$emp_team'";
       $run_team = mysqli_query($link, $get_team);
         while ($team_row=mysqli_fetch_array($run_team)) 
       {
         $team=$team_row["team_name"];
       }
   
   $get_sup_details = "SELECT * FROM employee_record WHERE employee_serial='$emp_supid'";
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
   

?>
               <div class="container">
                  <div class="panel-group" id="accordion">
                     <div class="panel panel-success">
                        <div class="panel-heading" style="background-color: orange; color: white; margin-left: -15px; margin-right: -15px; margin-top: 0px;">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Rating & Corresponding Increment Percentage &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;               Supervisor : <?php echo $supervisor; ?></a>
                           </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                           <div class="panel-body">
                              <table width="1095" border="1">
                                 <tr>
                                    <td width="333"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>&nbsp; Rating</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td width="179"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>&nbsp; Range</b></span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td width="400"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>&nbsp; Description</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td width="155"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">&nbsp; <b>Increment Rate</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                 </tr>
                                 <tr>
                                    <td><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>&nbsp; 5&nbsp;&ndash;&nbsp;Outstanding</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">&nbsp; 5</span></b><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b> Outstanding performer; consistently exceeds expectations.</b></span></td>
                                    <td style="text-align: center;"><b>25%</b></td>
                                 </tr>
                                 <tr>
                                    <td rowspan="2"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>&nbsp; 4&nbsp;-&nbsp;Exceeds Expectations</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">4.5 &ndash; 4.9</span></b><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td><b>&nbsp;<span data-contrast="auto" xml:lang="EN-GB" lang="EN-GB">Very good performer; often exceeds expectations</span></b></td>
                                    <td style="text-align: center;"><b>20%</b></td>
                                 </tr>
                                 <tr>
                                    <td style="text-align: center;">
                                       <b>
                                          <span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">4.0 &ndash; 4.49</span></span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span>
                                    </td>
                                    </td>
                                    <td><b><span data-contrast="auto" xml:lang="EN-GB" lang="EN-GB">Very good performer;&nbsp;but not&nbsp;exceeds expectations</span></b><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b>15%</b></td>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td rowspan="2"><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>3 - Meets Expectations</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></td>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">3.5 &ndash; 3.9</span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU"><b>Good performer; fully meets expectations</b></span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b>10%</b></td>
                                 </tr>
                                 <tr>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">3.0 &ndash; 3.49</span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">Good performer;&nbsp;not&nbsp;meets fully expectations</span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b>0.5%</b></td>
                                 </tr>
                                 <tr>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">2 - Needs Improvement</span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">2.0 &ndash; 2.9</span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">Requires some development to meet expectations</span></b></td>
                                    <td style="text-align: center;"><b>00%</b></td>
                                 </tr>
                                 <tr>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">1 &ndash; Unsatisfactory</span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">1.0 &ndash; 1.9</span><span data-ccp-props="{'201341983':0,'335551550':2,'335551620':2,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td><b><span data-contrast="auto" xml:lang="EN-AU" lang="EN-AU">Does not meet expectations and requires significant development</span><span data-ccp-props="{'201341983':0,'335551550':6,'335551620':6,'335559740':276,'469777462':[3780],'469777927':[0],'469777928':[1]}">&nbsp;</span></b></td>
                                    <td style="text-align: center;"><b>00%</b></td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
     
               <div class="container" style="background-color: #1e90ff; margin-top: -15px;">
                  <div class="row" style="margin-top: 0px;">
                     <div class="col-sm-7">
                        <form id="form1" name="form1" method="post" action="">
                           <div class="panel panel-primary" style="height: 565px;">
                              <div class="panel-heading"><b><?php echo str_repeat('&nbsp;', 45); ?>&darr; A &nbsp; p &nbsp; p &nbsp; r &nbsp; a &nbsp; i &nbsp; s &nbsp; a &nbsp; l &nbsp; &nbsp; &nbsp;  F &nbsp; o &nbsp; r &nbsp; m &darr;  <?php echo str_repeat('&nbsp;', 45); ?></b></div>
                              <div class="panel-heading" style="background-color: #87ceff; margin-top: 3px;">
                                 <div class="row">
                                    <div class="col-sm-5">SECTION 1: COMPETENCIES </div>
                                    <div class="col-sm-3">Rating</div>
                                    <div class="col-sm-4"> Appraiser’s Comments</div>
                                 </div>
                              </div>
                              <div class="panel-body">
                                 <div class="row" style="margin-top: -10px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1" style="width: 260px; text-align: left;">1. Planning and Organizing</button>
                                      
                                       <div class="modal fade" id="myModal1" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Planning and Organizing</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>The ability to analyse work, set goals, develop plans of action, and utilize time. Consider amount of supervision required and extent to which you can trust employee to carry out assignments conscientiously.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="planning" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt1" id="cmt1"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt1; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal2" style="width: 260px; text-align: left;">2. Directing and Controlling</button>
                                      
                                       <div class="modal fade" id="myModal2" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Directing and Controlling</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>The ability to create a motivating climate, achieve teamwork, train and develop, measure work in progress, take corrective action.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="controlling" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt2" id="cmt2"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt2; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal3" style="width: 260px; text-align: left;">3. Decision Making</button>
                                   
                                       <div class="modal fade" id="myModal3" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Decision Making</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>The ability to make decision and quality and timeliness of those decisions. The extent to which the employee make decisions that are sound. The ability to base decisions on facts rather than emotions.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="decesion" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt3" id="cmt3"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt3; ?>>
                                    </div>
                                 </div>
                                 <div class="panel-heading" style="background-color: #87ceff; margin-top: 3px; color: white;">
                                    <div class="row">&nbsp; SECTION 2: PROFESSIONAL ATTRIBUTES </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal4" style="width: 260px; text-align: left;">4. Job Knowledge/Quality of Work</button>
                                      
                                       <div class="modal fade" id="myModal4" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Job Knowledge/Quality of Work</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>Fully understand job main duties and responsibilities, apply knowledge, skills and experience to accomplish results. Maintain high standards despite pressing deadlines, does work right the first time; accurate and in an acceptable format, thorough, professional work at the right time.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="knowledge" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt4" id="cmt4"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt4; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal5" style="width: 260px; text-align: left;">5. Prof/Personal Growth & Dev</button>
                                       
                                       <div class="modal fade" id="myModal5" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Prof/Personal Growth & Dev</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>learn through interaction with others; Ability to learn new skills and improve existing skills, learn about new developments in same field, taking on new challenges in current position, projects, long or short-term assignments.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="professional" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt5" id="cmt5"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt5; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal6" style="width: 260px; text-align: left;">6. Task assigned completed within time</button>
                                     
                                       <div class="modal fade" id="myModal6" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Task assigned completed within time</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>Ratio of number of tasks assigned with the number of tasks completed within time (According to Jira). 
                                                      Number of Tasks 
                                                      Task Completed            (within Time) 
                                                      Task Completed (Beyond Time).
                                                   </p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="task" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt6" id="cmt6"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt6; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal7" style="width: 260px; text-align: left;">7. Integration Platforms Learning</button>
                                     
                                       <div class="modal fade" id="myModal7" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Integration Platforms Learning</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>New integration platforms learned, and/or extended the functionality of already learned platforms. 
                                                      Integration platform Learned:__________________________.
                                                   </p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="platform" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt7" id="cmt7"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt7; ?>>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 5px;">
                                    <div class="col-sm-5">
                                       <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal8" style="width: 260px; text-align: left;">8. Platforms (to be integrated) Learning</button>
                                     
                                       <div class="modal fade" id="myModal8" role="dialog">
                                          <div class="modal-dialog modal-md">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Platforms (to be integrated) Learning</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <p>Platforms to be integrated (E-Commerce, CRM, ERP) learned and integrated.</p>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="row">
                                          <select name="learning" style="height: 30px; width: 140px; margin-left: 10px";>
                                             <option value="" disabled selected>Choose Rating</option>
                                             <option value="0.5">0.5-Hopeless</option>
                                             <option value="1">1.0-Strong efforts require</option>
                                             <option value="1.5">1.5-Does not meet expectations</option>
                                             <option value="2">2.0-Requires hardworking</option>
                                             <option value="2.5">2.5-Still below expectations</option>
                                             <option value="3">3.0-Good but low perfoemer</option>
                                             <option value="3.5">3.5-Good Performer</option>
                                             <option value="4">4.0-Very Good Performer</option>
                                             <option value="4.5">4.5-Exceeds expectations</option>
                                             <option value="5">5.0-Outstanding Performer</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="text" class="form-control" name="cmt8" id="cmt8"  style="height: 30px; width: 210px; margin-left: -20px; margin-right: 10px;" value=<?php echo $cmt8; ?>>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-12">
                                       <input id="sup1" name="sup1" class="form-control description" value="<?php echo $cmt_sup1; ?>" type="text" style="" placeholder="Pl add your comments here!">
                                    </div>
                                  </div>
                                 </div>
                              </div>

                              <div class="row" style="margin-top: -35px; margin-bottom: 5px;">
                                 <div class="col-sm-9">&nbsp; </div>
                                 <div class="col-sm-3">
                                    <label for="emp_cell" class="control-label mb-1"> </label>
                                    <input type="submit" style="height: 50px; width: 130px;" class="btn btn-md leave_sub_btn" name="submit" value="submit"/>
                                 </div>
                              </div>
                           </div>
                        <!--/form-->
                     </div>
                     <?php  

                    
                        if (isset($_POST['planning'])) {
                          $planning=$_POST['planning'];
                        
                        } 
                        
                        if (isset($_POST['controlling'])) {
                          $controlling=$_POST['controlling'];
                        
                        } 
                        
                        if (isset($_POST['decesion'])) {
                          $decesion=$_POST['decesion'];
                        
                        } 
                        
                        if (isset($_POST['knowledge'])) {
                           $knowledge=$_POST['knowledge'];
                        
                        } 
                        
                        if (isset($_POST['professional'])) {
                           $professional=$_POST['professional'];
                        
                        } 
                        
                        if (isset($_POST['task'])) {
                           $task=$_POST['task'];
                        
                        } 
                        
                        if (isset($_POST['platform'])) {
                           $platform=$_POST['platform'];
                        
                        } 
                        
                        if (isset($_POST['learning'])) {
                           $learning=$_POST['learning'];
                        
                        }   
                        
                         $tot_score=$planning+$controlling+$decesion+$knowledge+$professional+$task+$platform+$learning;
                        
                          $wrating = $tot_score / 8;
                        
                        if (isset($_POST['cmt1'])) {
                           $cmt1=$_POST['cmt1'];
                        
                        }
                        
                        if (isset($_POST['cmt2'])) {
                           $cmt2=$_POST['cmt2'];
                        
                        } 
                        
                        if (isset($_POST['cmt3'])) {
                           $cmt3=$_POST['cmt3'];
                        
                        } 
                        
                        if (isset($_POST['cmt4'])) {
                           $cmt4=$_POST['cmt4'];
                        
                        } 
                        
                        if (isset($_POST['cmt5'])) {
                           $cmt5=$_POST['cmt5'];
                        
                        } 
                        
                        if (isset($_POST['cmt6'])) {
                           $cmt6=$_POST['cmt6'];
                        
                        } 
                        
                        if (isset($_POST['cmt7'])) {
                           $cmt7=$_POST['cmt7'];
                        
                        } 
                        
                        if (isset($_POST['cmt8'])) {
                           $cmt8=$_POST['cmt8'];
                        
                        }  

                         if (isset($_POST['sup1'])) {
                           $cmt_sup1=$_POST['sup1'];
                        
                        }  
                         
                        
                        ?>
                     <div class="col-sm-5" style="margin-left: -20px; width: 500px; margin-bottom: -15px;">
                        <div class="panel panel-primary" style="width: 480px;">
                           <div class="panel-heading" style="color: white;"><b><?php echo str_repeat('&nbsp;', 25); ?>&darr; G E N E R A L &nbsp; &nbsp; I N F O R M A T I O N &darr;  </b></div>
                           <div class="panel-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Name : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $emp_name; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Title : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $designation; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Department : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $deptt; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Sub Department : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $team; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Supervisor : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $sup_name; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <label class="form-control"><b>Title : </b></label>
                                 </div>
                                 <div class="col-sm-8">
                                    <label class="form-control"><?php echo $sup_title; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp;</label>
                                    <label for="employee_cnic" class="control-label mb-1"><b> Leave Position </b></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Balance</label>
                                    <label class="form-control"><?php echo $bal; ?></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Authorize</label>
                                    <label class="form-control"><?php echo $auth; ?></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Unauth</label>
                                    <label class="form-control"><?php echo $unauth; ?></label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp;</label>
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp;</label>
                                    <label for="employee_cnic" class="control-label mb-1"><b> Late Comings </b></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Total</label>
                                    <label class="form-control"><?php echo $late; ?></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Authorize</label>
                                    <label class="form-control"><?php echo $lauth; ?></label>
                                 </div>
                                 <div class="col-sm-3">
                                    <label for="employee_cnic" class="control-label mb-1"> &nbsp; &nbsp; Unauth</label>
                                    <label class="form-control"><?php echo $lunauth; ?></label>
                                 </div>
                              </div>
                              <div class="row"><?php echo str_repeat('-', 118); ?></div>
                              <div class="panel panel-info">
                                 <div class="panel-heading"><b>Overall Performance:</b></div>
                                 <div class="row" style="margin-top: 10px;">
                                    <b>
                                       <div class="col-sm-4">
                                          <label class="form-control"><b> Total Score : 40 </b></label> 
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="form-control"><b> Earned : <?php echo $tot_score; ?></b> </label>
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="form-control"><b> Rating : <?php echo $wrating; ?></b></label>
                                       </div>
                                    </b>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
             
           <div class="row">&nbsp; </div>
           <div class="row" style="margin-top: -8px; margin-left: 15px;">
          <?php include 'footer.php';?>
        </div>

            </div>
         </div>

      </div>
     
      <?php
  $status="OK - " .$emp_sup;
  $sql=mysqli_query($link, "UPDATE appraisals SET 
      app_score1='$planning',
      app_rmk1='$cmt1',
      app_score2='$controlling',
      app_rmk2='$cmt2',
      app_score3='$decesion',
      app_rmk3='$cmt3',
      app_score4='$knowledge',
      app_rmk4='$cmt4',
      app_score5='$professional',
      app_rmk5='$cmt5',
      app_score6='$task',
      app_rmk6='$cmt6',
      app_score7='$platform',
      app_rmk7='$cmt7',
      app_score8='$learning',
      app_rmk8='$cmt8',
      app_gross='$tot_score',
      app_rating='$wrating',
      app_sup_id='$emp_supid',
      app_sup_rmk='$cmt_sup1',
      app_status='$status',
      dt_updt=NOW()
       
      WHERE app_employee='$emp_w' AND from_year='$from_year' AND to_year='$to_year'") or die(mysqli_error($link));

   $wrating=0;
   $tot_score=0;
   $planning=0;
   $controlling=0;
   $decesion=0;
   $knowledge=0;
   $professional=0;
   $task=0;
   $platform=0;
   $learning=0;
   $designation="";
   $deptt="";
   $sup_name="";
   $sup_title="";
   $desig_code=0;
   $emp_grade="";
   $emp_dept=0;
   $emp_team=0;
   $emp_supid=0;
   $sup_desg=0;

  
        /* $sql=mysqli_query($link, "INSERT INTO appraisals (app_id,from_year,to_year,app_employee,app_grade,app_desig,app_emp_team,app_emp_dept,app_score1,app_rmk1,app_score2,app_rmk2,app_score3,app_rmk3,app_score4,app_rmk4,app_score5,app_rmk5,app_score6,app_rmk6,app_score7,app_rmk7,app_score8,app_rmk8,app_gross,app_rating,app_sup_id,app_sup_rmk,app_emp_rmk,app_str1,app_str2,app_str3,app_str4,app_str5,app_dev1,app_dev2,app_dev3,app_dev4,app_dev5,app_area,app_action,app_response,app_target_date,app_result,app_success,app_emp_cmt,app_mgr_id,app_mgr_cmt,app_hr_cmt,app_comp_authority,dt_updt)
          
         VALUES('','$yy_prev','$yy_curr','$emp_id','$emp_grade','$desig_code','$emp_team','$emp_dept','$planning','$cmt1', '$controlling','$cmt2','$decesion','$cmt3','$knowledge','$cmt4','$professional','$cmt5','$task','$cmt6','$platform','$cmt7','$learning','$cmt8','$tot_score','$wrating','$emp_supid','$cmt_sup1','$cmt_emp1','$cmt_str1','$cmt_str2','$cmt_str3','$cmt_str4','$cmt_str5','$cmt_dev1','$cmt_dev2','$cmt_dev3','$cmt_dev4','$cmt_dev5','$cmt_dp1','$cmt_dp2','$cmt_dp3','$cmt_date','$cmt_dp5','$cmt_success','$cmt_emp2','$emp_supid','$cmt_mgr1','$cmt_hr1','$cmt_ceo1',NOW())") or die(mysqli_error($link));*/

  
         ?>

<?php } ?>
  </form>  


<!--?php header('Location: appraisal_status.php?user=' .$emp_sup. '&from_year=' .$from_year. '&to_year='.$to_year); ?-->

   </body>
</html>
