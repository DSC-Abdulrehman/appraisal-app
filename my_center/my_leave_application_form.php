<script language="javascript">
function getLeave(leaveElement)
{
     var url = window.location.href;   
     var value = leaveElement.value;
    
     var oldleave= getUrlVars()['leave'];
    
     if(oldleave==null)
     {

      url += '&leave=' + value;
      console.log(url)
     }
     else
     {
        console.log('Here')
      separatorIndex = url.indexOf('&');
      url = url.substr(0,separatorIndex);
      url += '&leave=' + value;
            console.log(url)

     }
      //window.location.href = url;

    // var value = $('#leave').find(":selected").text();
    //     $("#leave").val(value);

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

$emp_cell="";
$description="";
$date_fr="";
$date_to="";
$days=0;
$leave_bal=0;
$status="";
$sup_title="Team Lead";
$sup_id="";
$supervisor="";
$manager="";
$team_lead="";
$department="";
$no_of_days=0;
$leaves=0;
$leave=0;
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

include_once("connect.php");

//if (isset($_GET['leave'])) {
    //$leave = $_GET['leave'];
//}

if (isset($_GET['user'])) {
   $user=$_GET['user'];

}
    $getemp = "SELECT * FROM employee_record WHERE employee_serial='$user' order by employee_id ASC  LIMIT 1";
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
     $getemp1 = "SELECT * FROM employee_record WHERE employee_serial='$manager_id' order by employee_id ASC  LIMIT 1";
        $run_emp1 = mysqli_query($link, $getemp1);
        while ($emp1_row=mysqli_fetch_array($run_emp1)) 
        {
   $manager=$emp1_row['employee_name'] . " " . $emp1_row['last_name'];
      }

   $getemp2 = "SELECT * FROM employee_record WHERE employee_serial='$team_lead_id' order by employee_id ASC  LIMIT 1";
        $run_emp2 = mysqli_query($link, $getemp2);
        while ($emp2_row=mysqli_fetch_array($run_emp2)) 
        {
      $team_lead=$emp2_row['employee_name'] . " " . $emp2_row['last_name'];
     
  } 

   $getemp3 = "SELECT * FROM employee_record WHERE employee_serial='$sup_id' order by employee_id ASC  LIMIT 1";
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

   // $get_team = "SELECT * FROM teams WHERE team_code='$team' LIMIT 1";
    $get_team = "SELECT * FROM teams WHERE team_id='$team' LIMIT 1";
        $run_team = mysqli_query($link, $get_team);
        while ($team_row=mysqli_fetch_array($run_team)) 
        {
      $team=$team_row['team_name'];

        } 

echo $deptt;

    $getdept = "SELECT * FROM department WHERE deptt_id='$deptt' LIMIT 1";
        $run_dept = mysqli_query($link, $getdept);
        while ($dept_row=mysqli_fetch_array($run_dept)) 
        {
      $deptt=$dept_row['deptt_name'];
      
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
if ($leave_bal==0) {
 
  $getsumm = "SELECT * FROM leaves_summary WHERE l_emp_id='$user' LIMIT 1";
        $run_summ = mysqli_query($link, $getsumm);
        while ($summ_row=mysqli_fetch_array($run_summ)) 
        {
      $leave_bal=$summ_row['l_closing_balance'];
      
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
	

            <section class="section-1  bordered-column">
                    <div class="row margin-off align-center bordered-column section-heading">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-align-custom">
                            <h1>MY LEAVE APPLICATION FORM</h1>
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
                                            
                                            <label for="id_no" >Grade :&nbsp; <?php echo $grade; ?></label>
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
                    
                    
                    <div class="row align-center margin-off border-bottom-custom">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-sx-12">
                            <h4>Leave Availed</h4>
                        </div>
                         <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                            <div class="row align-center" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom border-left-col">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" style="">
                                            <label for="id_no" >From : &nbsp; <?php echo $date_fr; ?></label>
                                        </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="">
                                            <label for="id_no" >To : &nbsp; <?php echo $date_to; ?></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-left-col" style="">
                                            <label for="id_no" >No Of Days : &nbsp; <?php echo $days; ?></label>
                                            
                                        </div>
                    
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-bottom-custom">
                                    <div class="row align-center margin-off ">
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-left-col" style="">
                                            <label for="id_no" >Balance : &nbsp; <?php echo $leave_bal; ?></label>
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-left-col" style="">
                                            <label for="id_no" >Status : &nbsp; <?php echo $status; ?></label>
                                            
                                        </div>
                                         <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" style="">
                                            <label for="id_no" > &nbsp; </label>
                                            
                                        </div>  
                                                                               
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
            </section>
					
	 <section class="section-competencies">
                  
         <div class="panel panel-default bordered-column">
                            <div class="panel-heading bordered-column">
                                <h2 class="panel-title" style="font-size:24px;"> Leave Request </h2>
                            </div>
                            
                <div class="panel-body">
				
			<form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="POST">
                       
                            <div class="row align-center border-bottom-custom" style="margin-top: -10px;" >
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-6 col-md-6 col-sm-6 border-left-col border-right-col" >
                                             <label for="id_no" >Application Date : &nbsp; <?php echo date('Y-m-d'); ?></label>
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
                                             <label for="id_no" >Purpose of Leave : </label>
                                        </div>
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-8 border-right-col" >
                                          <input type="text" class="form-control" name="description" id="description" placeholder="Mention here " />
                                        </div>
										  
                                    </div>
                                </div>
                            </div>
				
				<div class="row align-center border-bottom-custom">
                                <div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        
										<div class="col-lg-4 col-md-4 col-sm-4 border-right-col border-left-col" >
                                             <label for="emp_cell" class="control-label mb-1">Type Of Leave : </label>
                                        </div>
                                         <div class="col-lg-4 col-md-4" >
<!--select id="leave" onChange="getLeave(this)" name="leave" class="form-control" style="height: 34px;" value='<?php echo $leave; ?>'-->
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

										<div class="col-lg-4 col-md-4 col-sm-4 border-left-col" >
                                             <label for="id_no" >From : &nbsp; </label>
                                        </div>
                                       
                                    </div>
                                </div>
								<div class="col-lg-6 col-md-10 col-sm-12 col-sx-12 border-left-col">
                                    <div class="row align-center margin-off">
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-right-col " >
                                          <input  name="from_date" id="from_date" type="date" class="form-control edatepicker">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                                             <label for="id_no" >To : &nbsp; </label>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 border-right-col" >
                                          <input  name="to_date" id="to_date" type="date" class="form-control edatepicker">
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
echo "ZZZZZZZZZZ";
    if(isset($_POST['submit']))
{         

echo "YYYYYYYYYYYYYYY"; 
    $date_from="";
    $date_tod="";
    $days1=0;
      
       if (isset($_POST['from_date'])) {
       $date_from=$_POST['from_date'];
       $date1=$_POST['from_date'];
      
      }

      if (isset($_POST['to_date'])) {
        $date_to=$_POST['to_date'];
        $date2=$_POST['to_date'];
        $leave=$_POST['leave'];

      }

      $date_to = strtotime("$date_to"); 
      $date_from = strtotime("$date_from");
      $days1 = $date_to - $date_from;

      round ($days2 = $days1 / (60 * 60 * 24)+1);
    
  
       $leave_balance  = $leave_bal - $days2;
        

       $sql=mysqli_query($link, "INSERT INTO leave_work_table (wk_id,wk_date_applied,wk_reason,wk_type,wk_from_date,wk_to_date,wk_days,wk_leave_bal,wk_status)

       VALUES('$user',NOW(),'$description','$leave','$date1','$date2','$days2','$leave_balance','applied')") or die(mysqli_error($link));
    }
     //header("Location: my_leave_application_disp.php?user=$user");
    
?>	 
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
	
	