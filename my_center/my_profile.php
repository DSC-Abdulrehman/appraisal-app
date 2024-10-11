<script language="javascript">

function getEmployee(emp)
{
    var url = window.location.href;   
    var value = emp.value;
    
    var oldEmp= getUrlVars()['emp'];
    
    if(oldEmp==null)
    {
        url += '&emp=' + value;
    }
    else
    {
        separatorIndex = url.indexOf('&');
        url = url.substr(0,separatorIndex);
        url += '&emp=' + value;
    }
    window.location.href = url;
}

function getBank(bank)

{
 var value = $('#bank').find(":selected").text();
        $("#bank_code").val(value);
    }

function getBranch(br)

{
 var value = $('#br').find(":selected").text();
        $("#br_code").val(value);
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
$yearArray = range(1980, 2020);
$desig_title="";
$grade="";
$gender="";
$team_title="";
$team_lead_name="";
$dept_title="";
$manager_name="";
$date_birth="";
$date_joining="";
$date_confirm="";
$cnic="";
$date_issue="";
$date_expiry="";
$national="";
$mobile="";
$phone="";
$email="";
$add1="";
$add2="";
$inst1="";
$year1="";
$cgpa1="";
$inst2="";
$year2="";
$cgpa2="";
$technical="";
$other="";
$lang1="";
$lang2="";
$lang3="";
$frame1="";
$frame2="";
$frame3="";
$more_frame="";
$bank_title="";
$bank=0;
$br=0;
$acno="";
$bank1=0;
$br1=0;
$acno1="";
$bank2=0;
$br2=0;
$acno2="";
$fcnic="";
$kin1="";
$relkin1="";
$ckin1="";
$kin2="";
$relkin2="";
$ckin2="";
$actual_b_pay=0;
$gross_pay=0;
$code=0; 
$adv1=0;  
$tax1="";
$deductions=0;
$deductions1="";
$net_pay1="";
$ded1=0;
$ded2=0;
$ded3=0;
$ded4=0;
$ded5=0;
$amount1=0;
$amount2=0;
$amount3=0;
$amount4=0;
$amount5=0;
$amt1="";
$amt2="";
$amt3="";
$amt4="";
$amt5="";
$title1="";
$title2="";
$title3="";
$title4="";
$title5=""; 
$emp_id="";
$basic_start=0;
$basic_end=0;
$degree_title="";
$degreep_title="";
$br_title="";
$house_all=0;
$conv_all=0;
$comm_all=0;
$cost_all=0;
$med_all=0;
$tech_all=0;
$tax=0;
$adv_incr=0;
$incr_rate=0;
$emp1="";
$other_pay=0;
$more_lang="";
$b_inc=0;
$bank_title1="";
$br_title1="";
$bank_title2="";
$br_title2="";
include_once("connect.php");
   
$emp_name1="";
 if(isset($_GET['user']))
        {
   $emp1=$_GET['user'];
        $get_emp_details = "SELECT * FROM employee_record WHERE employee_serial='" . $_GET['user'] . "'";
        $run_emp_details = mysqli_query($link, $get_emp_details);
while ($emp_row=mysqli_fetch_array($run_emp_details)) 
        {
    $emp_name1= $emp_row['employee_name'] . " " .  $emp_row['last_name'];
    $desig = $emp_row['employee_desig'];
    $grade = $emp_row['employee_grade'];
    $sup_id = $emp_row['employee_supervisor_id'];
    $dept = $emp_row['employee_dept'];
    $manager = $emp_row['emp_manager'];
    $team = $emp_row['employee_team'];
    $team_lead = $emp_row['emp_team_lead'];
    $cnic = $emp_row['employee_cnic'];
    $date_issue = $emp_row['employee_cnic_issue'];
    $date_expiry = $emp_row['employee_cnic_expiry'];
    $gender = $emp_row['employee_gender'];
    $bgroup = $emp_row['employee_blood_group'];
            $national = $emp_row['employee_nationality'];
            $fname = $emp_row['employee_father_name'];
            $fcnic = $emp_row['employee_father_cnic'];
            $bank = $emp_row['employee_bank'];
            $br = $emp_row['employee_branch'];
            $acno = $emp_row['employee_account'];
            $bank1 = $emp_row['employee_bank1'];
            $br1 = $emp_row['employee_branch1'];
            $acno1 = $emp_row['employee_account1'];
            $bank2 = $emp_row['employee_bank2'];
            $br2 = $emp_row['employee_branch2'];
            $acno2 = $emp_row['employee_account2'];
            $date_birth = $emp_row['employee_dob'];
            $date_joining = $emp_row['employee_doj'];
            $date_confirm = $emp_row['employee_doc'];
            $mobile = $emp_row['employee_cell'];
            $phone = $emp_row['employee_phone'];
            $email = $emp_row['employee_email'];
            $add1 = $emp_row['employee_add1'];
            $add2 = $emp_row['employee_add2'];
            $lang1 = $emp_row['employee_it_lang1'];
            $lang2 = $emp_row['employee_it_lang2'];
            $lang3 = $emp_row['employee_it_lang3'];
            $degree = $emp_row['employee_edu_degree'];
            $inst1 = $emp_row['employee_edu_inst'];
            $year1 = $emp_row['employee_edu_year'];
            $cgpa1 = $emp_row['employee_edu_grade'];
            $degreep = $emp_row['employee_prof_degree'];
            $inst2 = $emp_row['employee_prof_inst'];
            $year2 = $emp_row['employee_prof_year'];
            $cgpa2 = $emp_row['employee_prof_grade'];
            $lang1 = $emp_row['employee_it_lang1'];
            $lang2 = $emp_row['employee_it_lang2'];
            $lang3 = $emp_row['employee_it_lang3'];
            $more_lang = $emp_row['more_language'];
            $frame1 = $emp_row['employee_frame_1'];
            $frame2 = $emp_row['employee_frame_2'];
            $frame3 = $emp_row['employee_frame_3'];
            $more_frame = $emp_row['more_frame'];
            $technical = $emp_row['employee_it_exp'];
            $other = $emp_row['employee_other_exp'];
            $kin1 = $emp_row['employee_nextofkin1'];
            $relkin1 = $emp_row['relation_nextofkin1'];
            $ckin1 = $emp_row['cnic_nextofkin1'];
            $kin2 = $emp_row['employee_nextofkin2'];
            $relkin2 = $emp_row['relation_nextofkin2'];
            $ckin2 = $emp_row['cnic_nextofkin2'];


 $get_emp_det = "SELECT * FROM employee_record WHERE employee_serial='$team_lead' LIMIT 1";
        $run_emp_det = mysqli_query($link, $get_emp_det);
while ($det_row=mysqli_fetch_array($run_emp_det)) 
        {

              $team_lead_name= $det_row['employee_name'] . " " .  $det_row['last_name'];
            }

    $get_emp_det1 = "SELECT * FROM employee_record WHERE employee_serial='$manager' LIMIT 1";
        $run_emp_det1 = mysqli_query($link, $get_emp_det1);
while ($det1_row=mysqli_fetch_array($run_emp_det1)) 
        {

              $manager_name= $det1_row['employee_name'] . " " .  $det1_row['last_name'];
            }

$get_desig = "select * from employee_desig where desig_id=$desig LIMIT 1";
        $run_desig= mysqli_query($link,$get_desig);
        while ($desig_row=mysqli_fetch_array($run_desig)) {
          $desig_title=$desig_row['title'];
                  
            }


        $get_team = "select * from teams where team_id=$team LIMIT 1";
        $run_team= mysqli_query($link,$get_team);
        while ($team_row=mysqli_fetch_array($run_team)) {
          $team_title=$team_row['team_name'];
          $team_lead=$team_row['team_lead'];
          $dept=$team_row['team_deptt'];
            }



        $get_dept = "select * from department where deptt_id='$dept' LIMIT 1";
        $run_dept= mysqli_query($link,$get_dept);
        while ($dept_row=mysqli_fetch_array($run_dept)) {
          $dept_title=$dept_row['deptt_name'];
          $manager=$dept_row['manager'];
          
            }

   
            $get_degr = "select * from degree where degree_id=$degree OR degree_id=$degreep";
        $run_degr= mysqli_query($link,$get_degr);
        while ($degr_row=mysqli_fetch_array($run_degr)) {
          if ($degr_row['degree_type']==1) {
             $degree_title=$degr_row['degree_name'];
          }else {
         
          $degreep_title=$degr_row['degree_name'];
          }
            }

       $get_bank = "select * from bank_names where id=$bank LIMIT 1";
        $run_bank= mysqli_query($link,$get_bank);
        while ($bank_row=mysqli_fetch_array($run_bank)) {
          $bank_title=$bank_row['name'];
          
            }

        $get_br = "select * from bank_branches where br_code=$br AND bank_code=$bank LIMIT 1";
        $run_br= mysqli_query($link,$get_br);
        while ($br_row=mysqli_fetch_array($run_br)) {
         $br_title=$br_row['br_code'] . " - " . $br_row['br_name'];
          
             }

      $get_bank1 = "select * from bank_names where id=$bank1 LIMIT 1";
        $run_bank1= mysqli_query($link,$get_bank1);
    while ($bank1_row=mysqli_fetch_array($run_bank1)) {
          $bank_title1=$bank1_row['name'];
          
            }

    $get_br1 = "select * from bank_branches where bank_code=$bank1 AND br_code=$br1 LIMIT 1";
        $run_br1= mysqli_query($link,$get_br1);
    while ($br1_row=mysqli_fetch_array($run_br1)) {
    $br_title1=$br1_row['br_code'] . " - " . $br1_row['br_name'];
          
             }

      $get_bank2 = "select * from bank_names where id=$bank2 LIMIT 1";
        $run_bank2= mysqli_query($link,$get_bank2);
  while ($bank2_row=mysqli_fetch_array($run_bank2)) {
          $bank_title2=$bank2_row['name'];
          
            }

        $get_br2 = "select * from bank_branches where br_code=$br2 AND bank_code=$bank2 LIMIT 1";
    $run_br2= mysqli_query($link,$get_br2);
    while ($br2_row=mysqli_fetch_array($run_br2)) {
          $br_title2=$br2_row['br_code'] . " - " . $br2_row['br_name'];
          
             }

        $get_emp1 = "SELECT * FROM employee_record WHERE employee_id='$team_lead' OR employee_id='$manager'";
        $run_emp1 = mysqli_query($link, $get_emp1) or die(mysqli_error($link));
        while ($emp1_row=mysqli_fetch_array($run_emp1)) 
        {
            if ($emp1_row['employee_id']=="$team_lead") {
                $team_lead_name=$emp1_row['employee_id'] . " - " . $emp1_row['employee_name'] . " " . $emp1_row['last_name'];
            } else {

                $manager_name=$emp1_row['employee_id'] . " - " . $emp1_row['employee_name'] . " " . $emp1_row['last_name'];
            }

        }
    }

        $get_pay = "SELECT * FROM pays_allowances_table WHERE basic_id='$grade'";
        $run_pay = mysqli_query($link, $get_pay) or die(mysqli_error($link));
        while ($pay_row=mysqli_fetch_array($run_pay)) 
        {
        
            $basic_start=$pay_row['basic_start'];
            $b_inc=$pay_row['basic_incr'];
            $basic_end=$pay_row['basic_end'];  

         }   

  //$get_pays = "select * from employees_pay_rec WHERE pay_id='$emp1' LIMIT 1";
  $get_pays = "select * from employees_pay_rec WHERE pay_serial='$emp1' LIMIT 1";
      $run_pays= mysqli_query($link,$get_pays);
        while ($pays_row=mysqli_fetch_array($run_pays)) {

  $actual_b_pay=$pays_row['basic_pay'];
  $house_all=$pays_row['house_all'];
  $conv_all=$pays_row['conveyance_all'];
  $comm_all=$pays_row['communication_all'];
  $cost_all=$pays_row['costof_living_all'];
  $med_all=$pays_row['medical_all'];
  $tech_all=$pays_row['technical_all'];

       // $get_ded = "select * from employee_deductions WHERE ded_id='$emp1' LIMIT 1";
        $get_ded = "select * from employee_deductions WHERE ded_serial='$emp1' LIMIT 1";
        $run_ded= mysqli_query($link,$get_ded);
        while ($ded_row=mysqli_fetch_array($run_ded)) {
        $tax=$ded_row['ded_income_tax1'];  
        $ded1=$ded_row['ded_code1'];   
        $amount1=$ded_row['ded_amount1'];
        $ded2=$ded_row['ded_code2'];   
        $amount2=$ded_row['ded_amount2'];
        $ded3=$ded_row['ded_code3'];   
        $amount3=$ded_row['ded_amount3'];
        $ded4=$ded_row['ded_code4'];   
        $amount4=$ded_row['ded_amount4'];
        $ded5=$ded_row['ded_code5'];   
        $amount5=$ded_row['ded_amount5'];

    $deductions=$tax+$amount1+$amount2+$amount3+$amount4+$amount5;
    }

    $get_code = "select * from codes_table WHERE type=2";
        $run_code= mysqli_query($link,$get_code);
        while ($code_row=mysqli_fetch_array($run_code)) {

            $ded_code=$code_row['code'];

        if ($ded_code==$ded1) {
            $title1=$code_row['title'];
        }
       
       if ($ded_code==$ded2) {
            $title2=$code_row['title'];
        }

        if ($ded_code==$ded3) {
            $title3=$code_row['title'];
        }
        if ($ded_code==$ded4) {
            $title4=$code_row['title'];
        }

        if ($ded_code==$ded5) {
            $title5=$code_row['title'];
        }
        
     }

  }
   $gross_pay= $actual_b_pay+$house_all+$conv_all+$comm_all+$cost_all+$med_all+$tech_all;
    $house_all=number_format($house_all);
    $conv_all=number_format($conv_all);
    $comm_all=number_format($comm_all);
    $cost_all=number_format($cost_all);
    $med_all=number_format($med_all);
    $tech_all=number_format($tech_all);
    $incr_rate=number_format($b_inc);
    $tax1=number_format($tax);
    $amt1=number_format($amount1);
    $amt2=number_format($amount2);
    $amt3=number_format($amount3);
    $amt4=number_format($amount4);
    $amt5=number_format($amount5);
    
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
        <title>Profile</title>
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
	
       	 <?php include 'sidebar.php'; ?>
<form action="../index-emp.php?user=<?php echo $emp1; ?>" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post">
		  <div class="col-md-10" style="padding:0px;">
       
	 
	<div class="container evaluation-form-custom-container" style="margin-top: 2px;">
		<div class="row start-row">

            <section class="section-1  bordered-column">
			
			<div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                <h1>My Profile </h1>
                        </div>
                    </div>
			
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          
      <div class="panel panel-default bordered-column" style="margin-top:2px;">
                            <div class="panel-heading bordered-column" role="tab" id="headingOne">
      <h1 class="panel-title" style="height: 50px; font-size: 24px; margin-top: 12px; margin-left: 11px;">
        
        General Information Section
                                    
                                </h1>
                            </div>
                            
     <div class="panel-body">

<div class="row align-center margin-off border-bottom-custom" style="margin-top:-16px;">
    <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-right-col">
      <h4>Employee</h4>
    </div>
  <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
    <div class="row align-center border-bottom-custom" >
  <div class="col-lg-2 col-md-2 col-sm-2 border-right-col" >
    <label for="id_no" >ID : <?php echo $emp1; ?></label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
      <label for="id_no" >Name : <?php echo $emp_name1; ?></label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
      <label for="id_no" >Title : <?php echo $desig_title; ?></label>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
      <label for="id_no" >Grade : <?php echo $grade; ?></label>
    </div>
 
<div class="col-lg-2 col-md-2 col-sm-2 border-right-col" >
    <label for="id_no" >Gender : <?php echo $gender; ?></label>
  </div>
    
    </div>
    </div>
   </div>
                            
                    
  <div class="row align-center margin-off border-bottom-custom">
    <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-right-col">
      <h4>Placement</h4>
    </div>
  <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
    <div class="row align-center border-bottom-custom" >
  <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12">
    <div class="row align-center margin-off">
    <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
    <label for="id_no" >Team : <?php echo $team_title; ?></label>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7" >
      <label for="id_no" >Team Lead : <?php echo $team_lead_name; ?></label>
    </div>
  </div>
</div>

<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
  <div class="row align-center margin-off">
  <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
    <label for="id_no" >Department : <?php echo $dept_title; ?></label>
  </div>
    <div class="col-lg-7 col-md-7 col-sm-7  border-right-col" >
  <label for="id_no">Manager : <?php echo $manager_name; ?></label>
      </div>
    </div>
    </div>
   </div>
                            
                        </div>
                    </div>
          
          <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-right-col">
                            <h4>Date Of</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row align-center ">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-right-col" >
<label for="date_joining" class="control-label mb-1">&nbsp; &nbsp;  Birth </label>
                                </div>
<div class="col-lg-7 col-md-5 col-sm-8 " >
    <label for="id_no" ><?php echo $date_birth; ?></label>
    </div>
  </div>
                                     
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
                                            <div class="row align-center border-bottom-custom">
                                                <div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
                                                    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp;  Joining </label>
                                                </div>
                                                <div class="col-lg-7 col-md-5 col-sm-8 " >
                                                    <label for="id_no" ><?php echo $date_joining; ?></label> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 ">
                                            <div class="row align-center border-bottom-custom">
<div class="col-lg-5 col-md-7 col-sm-4 border-left-col border-right-col" >
 <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp; Confirmation</label>
</div>
<div class="col-lg-7 col-md-5 col-sm-8  border-right-col" >
  <label for="id_no" ><?php echo $date_confirm; ?></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>                 
</div>

<div class="row align-center margin-off border-bottom-custom">
  <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12  border-right-col">
   <h4>National ID Card</h4>
  </div>
  <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row align-center ">
  <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12 border-right-col">
    <label for="date_joining" class="control-label mb-1">&nbsp; &nbsp; NO :&nbsp; <?php echo $cnic; ?> </label>
  </div>
  
    <div class="col-lg-3 col-md-3 col-sm-3 border-left-col border-right-col" >
    <label for="date_joining" class="control-label mb-1">&nbsp;  Issue Date : &nbsp; <?php echo $date_issue; ?></label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 " >
      <label for="id_no" >&nbsp; Expiry Date : &nbsp; <?php echo $date_expiry; ?></label>
    </div>
   
     <div class="col-lg-2 col-md-2 col-sm-2 border-left-col border-right-col" >
     <label for="date_joining" class="control-label mb-1">&nbsp; Nationality :&nbsp; <?php echo $national; ?></label>
     </div>
     
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                                                       
                        </div>
            
            <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-right-col">
                            <h4>Contact</h4>
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                    <div class="row align-center margin-off border-bottom-custom">
                                        <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
<label for="id_no" >&nbsp; &nbsp; Mobile <font color="red">*</font> &nbsp; &nbsp; </label>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
                                          <label for="id_no" >&nbsp; &nbsp; Phone <font color="red">*</font>&nbsp; &nbsp; </label>
                                        </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                            <label for="id_no" >&nbsp; &nbsp; Email <font color="red">*</font> &nbsp; &nbsp; </label>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col">
                                           <label for="id_no" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Address <font color="red">*</font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
                                        </div>
                    
                                    </div>
									
					<div class="row align-center margin-off">
                                        <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
<input type="text" class="form-control" id="mobile" name="mobile" value= "<?php echo $mobile; ?>" >
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
<input type="text" class="form-control" id="phone" name="phone" value= "<?php echo $phone; ?>" >
                                        </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
                                            
<input type="text" class="form-control" id="email" name="email" value= "<?php echo $email; ?>" >
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col">                              
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6">
  <input type="text" class="form-control" id="add1" name="add1" value= "<?php echo $add1; ?>" > 
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
  <input type="text" class="form-control" id="add2" name="add2" value= "<?php echo $add2; ?>" > 
</div>          

                                        </div>
                    
                                    </div>
									
                                <!--/div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col"-->
                                   
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
              
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          
      <div class="panel panel-default bordered-column" style="margin-top:-36px;">
                            <div class="panel-heading bordered-column" role="tab" id="headingOne">
                                <h2 class="panel-title" style="height: 50px; font-size: 24px; margin-top: 10px; margin-left: 10px;">
                                    
                                       Other Related Information Section
                                   
                                </h2>
                            </div>
                            
                <div class="panel-body">
                
          <div class="row align-center margin-off border-bottom-custom" style="margin-top: -5px;">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <div class="row">
                            <h4>Educational </h4>
                            </div>         
                            <div class="row">
                            <h4>Professional </h4>
                            </div> 
                    
                        </div>
                       <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
<div class="col-lg-6 col-md-6 col-sm-6 border-right-col" >
  <!--label for="id_no" ><?php echo $degree_title; ?></label-->
  <select id="degree" onChange="getDegree(this)" name="degree" class="form-control" style="height: 40px;">
          <option><b><?php echo $degree_title; ?><font color="red"> *</font></b></option>
     <?php
        $get_degree = "select * from degree where degree_type=1";
        $run_degree= mysqli_query($link,$get_degree);
        while ($degree_row=mysqli_fetch_array($run_degree)) {
        $degree_id=$degree_row['degree_id'];   
        $degree_title=$degree_row['degree_name'];
        
        echo "<option value='$degree_id'>$degree_title</option>";
            }
    ?>
    </select>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6" >
  <input type="text" class="form-control" id="exampleFormControlInput1" name="inst1" value= "<?php echo $inst1; ?>"  >
                                        </div>
                                    </div>
                                </div>
                
            <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
  <label for="id_no" >Year <font color="red">*</font> </label>
                                        </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >

  <select class="form-control" name="year1" style="height: 40px;">
    <option value=""><?php echo $year1; ?></style></option>
      <?php
        foreach ($yearArray as $year)   
          {
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
          }
      ?>
  </select>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
<label for="id_no" >Grade <font color="red">*</font></label>
                                        </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
<select name="cgpa1" class="form-control" style="height: 40px;">
    <option value=""><?php echo $cgpa1; ?></option>
    <option value="+4.0">4.0</option>
    <option value="3.5">3.5</option>
    <option value="3">3.0</option>
    <option value="2.5">2.5</option>
</select>

                                        </div>
                                    </div>
                                </div>
                            </div>
              
                            <div class="row align-center" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12  border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-right-col">

<select id="degreep" onChange="getDegreep(this)" name="degreep" class="form-control" style="height: 40px;">
          <option><b><?php echo $degreep_title; ?></b></option>
     <?php
        $get_degree = "select * from degree Where degree_type=2";
        $run_degree= mysqli_query($link,$get_degree);
        while ($degree_row=mysqli_fetch_array($run_degree)) {
        $degree_id=$degree_row['degree_id'];   
        $degree_title=$degree_row['degree_name'];
        
        echo "<option value='$degree_id'>$degree_title</option>";
            }
    ?>
    </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                          <label for="id_no" ><?php echo $inst2; ?></label>
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12  border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
<label for="id_no" >Year <font color="red">*</font> </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                    
<select class="form-control" name="year2" style="height: 40px;">
    <option value=""><?php echo $year2; ?></style></option>
      <?php
        foreach ($yearArray as $year)   
          {
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
          }
      ?>
  </select>                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >Grade <font color="red">*</font> </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
<select name="cgpa1" class="form-control" style="height: 40px;">
    <option value=""><?php echo $cgpa2; ?></option>
    <option value="+4.0">4.0</option>
    <option value="3.5">3.5</option>
    <option value="3">3.0</option>
    <option value="2.5">2.5</option>
</select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
           </div>
                
               <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <div class="row">
                            <h4>Experience </h4>
                            </div>         
                            <div class="row">
                            <h4>Proficiency </h4>
                        </div> 
                    
                        </div>
                       <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >Technical <font color="red">*</font></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9" >
<input type="text" class="form-control" id="exampleFormControlInput1" name="technical" value= "<?php echo $technical; ?>" >
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >Other <font color="red">*</font></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9" >
  <input type="text" class="form-control" id="exampleFormControlInput1" name="other" value= "<?php echo $other; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12  border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >Languages <font color="red">*</font> </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
  <select name="lang1" class="form-control" style="height: 40px;">
    <option value=""><?php echo $lang1; ?></option>
    <option value="Java Script">Java Script</option>
    <option value="Java">Java</option>
    <option value="PHP">PHP</option>
    <option value="Python">Python</option>
    <option value="C++">C++</option>
    <option value="C#">C#</option>
</select>
                                </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
<select name="lang" class="form-control" style="height: 40px;">
    <option value=""><?php echo $lang2; ?></option>
    <option value="Java Script">Java Script</option>
    <option value="Java">Java</option>
    <option value="PHP">PHP</option>
    <option value="Python">Python</option>
    <option value="C++">C++</option>
    <option value="C#">C#</option>
</select>
 </div>
<div class="col-lg-3 col-md-3 col-sm-3">
  <select name="lang3" class="form-control" style="height: 40px;">
    <option value=""><?php echo $lang3; ?></option>
    <option value="Java Script">Java Script</option>
    <option value="Java">Java</option>
    <option value="PHP">PHP</option>
    <option value="Python">Python</option>
    <option value="C++">C++</option>
    <option value="C#">C#</option>
</select>
</div>
</div>
</div>
<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12  border-left-col">
 <div class="row align-center margin-off">
   <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
 <label for="id_no" >Frame Works <font color="red">*</font></label>
    </div>
 <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
 <select name="frame1" class="form-control" style="height: 40px;">
 <option value=""><?php echo $frame1; ?></option>
 <option value="Node.js">Node.js</option>
 <option value="Angular.js">Angular.js</option>
 <option value="React.js">React.js</option>
 <option value="Vue.js">Vue.js</option>
 <option value=".Net">.Net</option>
 <option value="Xamarin">Xamarin</option>
 <option value="Larawell">Larawell</option>
 <option value="Symfony">Symfony</option>
                               
</select>
 </div>
<div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
 <select name="frame2" class="form-control" style="height: 40px;">
 <option value=""><?php echo $frame2; ?></option>
 <option value="Node.js">Node.js</option>
 <option value="Angular.js">Angular.js</option>
 <option value="React.js">React.js</option>
 <option value="Vue.js">Vue.js</option>
 <option value=".Net">.Net</option>
 <option value="Xamarin">Xamarin</option>
 <option value="Larawell">Larawell</option>
 <option value="Symfony">Symfony</option>
                               
</select>
 </div>
<div class="col-lg-3 col-md-3 col-sm-3">
 <select name="frame3" class="form-control" style="height: 40px;">
 <option value=""><?php echo $frame3; ?></option>
 <option value="Node.js">Node.js</option>
 <option value="Angular.js">Angular.js</option>
 <option value="React.js">React.js</option>
 <option value="Vue.js">Vue.js</option>
 <option value=".Net">.Net</option>
 <option value="Xamarin">Xamarin</option>
 <option value="Larawell">Larawell</option>
 <option value="Symfony">Symfony</option>
                               
</select>
     </div>
    </div>
   </div>
  </div>
              
<div class="row align-center border-bottom-custom" >
<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
 <div class="row align-center margin-off">
  <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
  <label for="id_no" >More <font color="red">*</font> : </label>
  </div>
 <div class="col-lg-9 col-md-9 col-sm-9" >
  
  <input type="text" class="form-control" id="exampleFormControlInput1" name="more_lang" value= "<?php echo $more_lang; ?>" >
                    </div>
                </div>
            </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                                            <label for="id_no" >More <font color="red">*</font> : </label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9" >
<input type="text" class="form-control" id="exampleFormControlInput1" name="more_frame" value= "<?php echo $more_frame; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
             </div>
           </div>
              
      <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <div class="row">
                            <h4>Bank Details </h4>
                            
                            </div> 
                    
                        </div>
                       <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
<label for="id_no" ><?php echo $bank_title; ?></label>

                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7" >
                                          <label for="id_no" ><?php echo $br_title; ?></label>
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
                                            <label for="id_no" >Account No : </label>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 border-right-col" >
                                           <label for="id_no" ><?php echo $acno; ?></label>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
							
			<div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
 
  <select id="bank1" onChange="getBank(this)" name="bank1" class="form-control" style="height: 40px;">
          <option><b><?php echo $bank_title1; ?></b></option>
     <?php
        $get_bank1 = "select * from bank_names";
        $run_bank1= mysqli_query($link,$get_bank1);
  while ($bank1_row=mysqli_fetch_array($run_bank1)) {
        $bank_id1=$bank1_row['id'];
        $bank_title1=$bank1_row['name'];
        
        echo "<option value='$bank_id1'>$bank_title1</option>";
            }
    ?>
    </select>

                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7" >
<select id="br1" onChange="getBranch(this)" name="br1" class="form-control" style="height: 40px;">
    <option><b><?php echo $br_title1; ?></b></option>
     <?php
        $get_br1 = "select * from bank_branches Where bank_code='$bank_id1'";
        $run_br1= mysqli_query($link,$get_br1);
        while ($br1_row=mysqli_fetch_array($run_br1)) {
        $br_id1=$br1_row['br_id'];   
        $br_title1=$br1_row['br_name'] . $br1_row['br_add1'] . $br1_row['br_add2'];
        
        echo "<option value='$br_id1'>$br_title1</option>";
            }
    ?>
    </select>
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
<label for="id_no" >Account No : </label>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 border-right-col" >
<input type="text" class="form-control" id="exampleFormControlInput1" name="acno1" value= "<?php echo $acno1; ?>">
                                        </div>                                
                                    </div>
                                </div>
                            </div>

			<div class="row align-center border-bottom-custom" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >

  <select id="bank2" onChange="getBank(this)" name="bank2" class="form-control" style="height: 40px;">
          <option><b><?php echo $bank_title2; ?></b></option>
     <?php
        $get_bank2 = "select * from bank_names";
        $run_bank2= mysqli_query($link,$get_bank2);
        while ($bank2_row=mysqli_fetch_array($run_bank2)) {
        $bank_id2=$bank2_row['id'];   
        $bank_title2=$bank2_row['name'];
        
        echo "<option value='$bank_id2'>$bank_title2</option>";
            }
    ?>
    </select>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7" >
<select id="br2" onChange="getBranch(this)" name="br2" class="form-control" style="height: 40px;">
    <option><b><?php echo $br_title2; ?></b></option>
     <?php
        $get_br2 = "select * from bank_branches";
        $run_br2= mysqli_query($link,$get_br2);
    while ($br2_row=mysqli_fetch_array($run_br2)) {
        $br_id2=$br2_row['br_id'];   
        $br_title2=$br2_row['br_name'] . $br2_row['br_add1'] . $br2_row['br_add2'];
        
        echo "<option value='$br_id2'>$br_title2</option>";
            }
    ?>
    </select>
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
                                            <label for="id_no" >Account No : </label>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 border-right-col" >
<input type="text" class="form-control" id="exampleFormControlInput1" name="acno2" value= "<?php echo $acno2; ?>">
                                        </div>                                
                                    </div>
                                </div>
                            </div>

                        </div>
          </div>
                
<div class="row align-center margin-off border-bottom-custom">
  <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
   <div class="row">
   <h4>Father's Info <font color="red">*</font> </h4>
  </div> 
</div>
  <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
 <div class="row align-center border-bottom-custom" >
  <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
    <div class="row align-center margin-off">
      <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
   <label for="id_no" >Name : </label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9" >
 <input type="text" class="form-control" id="exampleFormControlInput1" name="fname" value= "<?php echo $fname; ?>" >
                                        </div>
                                    </div>
                                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-5 col-md-5 col-sm-5 border-right-col" >
                                            <label for="id_no" >CNIC # </label>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 border-right-col" >
<input type="text" class="form-control" id="exampleFormControlInput1" name="fcnic" value= "<?php echo $fcnic; ?>" >
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>    
          </div>
                
           <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12 border-lerightft-col">
                            <h4>Next of Kin <font color="red">*</font></h4>
                       </div>
                        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center border-bottom-custom" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-1 col-md-1 col-sm-1 border-right-col">
                                            <label for="id_no" >Name : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
<input type="text" class="form-control" id="exampleFormControlInput1" name="kin1" value= "<?php echo $kin1; ?>" >

                                        </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 border-right-col border-left-col">
                                            <label for="id_no" >Relation</label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
<!--label for="id_no" ><?php echo $relkin1; ?></label-->
<input type="text" class="form-control" id="exampleFormControlInput1" name="relkin1" value= "<?php echo $relkin1; ?>" >

                                        </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 border-right-col border-left-col">
                                            <label for="id_no" >CNIC #: </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
<input type="text" class="form-control" id="exampleFormControlInput1" name="ckin1" value= "<?php echo $ckin1; ?>" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-center" >
                                <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 border-left-col">
                                   <div class="row align-center margin-off">
                                        <div class="col-lg-1 col-md-1 col-sm-1 border-right-col ">
                                            <label for="id_no" >Name : </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
<input type="text" class="form-control" id="exampleFormControlInput1" name="kin2" value= "<?php echo $kin2; ?>" >

                                        </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 border-right-col border-left-col">
                                            <label for="id_no" >Relation</label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
<input type="text" class="form-control" id="exampleFormControlInput1" name="relkin2" value= "<?php echo $relkin2; ?>" >

                                        </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 border-right-col border-left-col">
                                            <label for="id_no" >CNIC #: </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 border-right-col">
  <input type="text" class="form-control" id="exampleFormControlInput1" name="ckin2" value= "<?php echo $ckin2; ?>" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>        
      </div>
    </div>
  </section>

    
    <?php

    $actual_b_pay=number_format($actual_b_pay);
    $gross_pay1=number_format($gross_pay);
    $basic_start=number_format($basic_start);
    $basic_end=number_format($basic_end);

    ?>

        <!--section class="section-1  bordered-column" style="margin-top: -36px;"-->
          
      <div class="panel panel-default bordered-column" style="margin-top:-35px;">
                            <div class="panel-heading bordered-column" role="tab" id="headingOne">
                                <h2 class="panel-title" style="height: 50px; font-size: 24px; margin-top: 10px; margin-left: 10px;">
                                    
                                       Salary Information Section
                                  
                                </h2>
                            </div>
                            
                <div class="panel-body">
                   
		<div class="row align-center margin-off border-bottom-custom" style="margin-top: -15px;">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Pays & Allowances</h4>
                        </div>
         <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        
	<div class="row align-center border-bottom-custom" >
    <div class="col-lg-5 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                <label for="id_no" >Pay Scale</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8" >
            <label for="id_no" ><?php echo $basic_start; ?> - <?php echo $incr_rate; ?> - <?php echo $basic_end; ?></label>
            </div>

        </div>
    </div>
    <div class="col-lg-7 col-md-9 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Current Basic Pay</label>
            </div>
    
                                <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" ><?php echo $actual_b_pay; ?></label>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Other Pay</label>
            </div>
        
   
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
            <label for="id_no" ><?php echo $other_pay; ?></label>
            </div>
        </div>
    </div>
	</div>	

 
 <div class="row align-center border-bottom-custom" >
    <div class="col-lg-5 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Housing</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
            <label for="id_no" ><?php echo $house_all; ?></label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
             <label for="id_no" >Conveyance</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
            <label for="id_no" ><?php echo $conv_all; ?></label>
            </div>

        </div>
    </div>
    <div class="col-lg-7 col-md-9 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Communication</label>
            </div>
    
                                <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" ><?php echo $comm_all; ?></label>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Cost Of Living</label>
            </div>
        
   
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
            <label for="id_no" ><?php echo $cost_all; ?></label>
            </div>
        </div>
    </div>
	</div>
 
 <div class="row align-center border-bottom-custom" >
    <div class="col-lg-5 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Medical</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
            <label for="id_no" ><?php echo $med_all; ?></label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
             <label for="id_no" >Technical</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
            <label for="id_no" ><?php echo $tech_all; ?></label>
            </div>

        </div>
    </div>
    <div class="col-lg-7 col-md-9 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" ></label>
            </div>
    
                                <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" style="">
                            <label for="id_no" ></label>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
                <label for="id_no" >Gross Salry</label>
            </div>
        
   
            <div class="col-lg-3 col-md-3 col-sm-3 border-right-col" >
            <label for="id_no" ><?php echo $gross_pay1; ?></label>
            </div>
        </div>
    </div>
	</div>
        
  </div>
  </div>

      <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Deductions</h4>
                        </div>
 <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        
  <div class="row align-center border-bottom-custom" >
    <div class="col-lg-6 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                <label for="id_no" >Income Tax</label>
            </div>
     
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
            <label for="id_no" ><?php echo $tax1; ?></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 " >
             <label for="id_no" ><?php echo $title1; ?></label>
            </div>     
		 </div>
    </div>	
 
<div class="col-lg-6 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" style="">
                <label for="id_no" ><?php echo $amt1; ?></label>
         </div>

            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" ><label for="id_no" ><?php echo $title2; ?></label>
            </div>
     
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
            <label for="id_no" ><?php echo $amt2; ?></label>
            </div>
            
    </div>
    </div>
	</div>
 
 <div class="row align-center border-bottom-custom" >
    <div class="col-lg-6 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                 <label for="id_no" ><?php echo $title3; ?></label>
            </div>
    
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
             <label for="id_no" ><?php echo $amt3; ?></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" >
             <label for="id_no" ><?php echo $title4; ?></label>
        </div>
         
    </div>	
  </div>  

<div class="col-lg-6 col-md-8 col-sm-10 col-sx-12 border-left-col">
        <div class="row align-center margin-off">
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
             <label for="id_no" ><?php echo $amt4; ?></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
             <label for="id_no" ><?php echo $title5; ?></label>
        </div>
         
            <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
             <label for="id_no" ><?php echo $amt5; ?></label>
            </div>
            
        
    </div>
    </div>
	</div>
        
  </div>
  </div>
  <?php 
  
  	
    $net_pay=$gross_pay - $deductions;
    $deductions1=number_format($deductions);
    $net_pay1=number_format($net_pay);
  ?>
  
  <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Resultant</h4>
                        </div>
 <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        
  <div class="row align-center border-bottom-custom" >
    
            <div class="col-lg-2 col-md-2 col-sm-2 border-right-col border-left-col">
                <label for="id_no" >Gross Pay : </label>
            </div>
        
            <div class="col-lg-2 col-md-2 col-sm-2 border-right-col">
              <label for="id_no"><?php echo $gross_pay1; ?></label>
        	</div>
          <div class="col-lg-2 col-md-2 col-sm-2 border-right-col" style="">
               <label for="id_no" >Total Deductions : </label>
         </div>
    
          <div class="col-lg-2 col-md-2 col-sm-2 border-right-col" >
              <label for="id_no"><?php echo $deductions1; ?></label>
          </div>
     
            <div class="col-lg-2 col-md-2 col-sm-2 border-right-col" >
             <label for="id_no" >Net Pay : </label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 border-right-col" >
              <label for="id_no"><?php echo $net_pay1; ?></label>
           </div>
         
	</div>        
  </div>
  </div>
        <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> Go Back</button>
        </div>
  </form> 
   

 
	         </div>


  <div class="row align-center margin-top= " >
    <div class="col-lg-1 col-md-1 col-sm-1" >&nbsp;</div>
<div class="col-lg-10 col-md-10 col-sm-10" > 
<?php include 'footer.php';?>  
</div> 
   </div>

	       </div>
	     </div>
	   </div>
    </div>
  </div>
   <?php   
        if(isset($_POST['submit']))
{

      header("Location: ./index-emp.php?user=$user");
      
  
  }
  ?>
</div> 

	
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script> -->
    

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
	
	