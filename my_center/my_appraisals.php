
<?php   


if (isset($_GET['user'])) {
    $user=$_GET['user'];
}
$remarks=""; 
$score1=0;
$score2=0;
$gross=0;
$rating=0;
$period=0;
$to_month=0;
$to_year=0;
$abc=0;
$date=date("Y-m-d");
$date=date("2021-07-11");
$date = explode('-', $date);
$month = $date[1];
$day   = $date[2];
$year  = $date[0];
if ($month > 6) {
  $from_year=$year;
  $to_year=$year;
}else{
  $from_year=$year-1;
  $to_year=$year;
}
 $from_month=07;
 $to_month=$month-1;
 if ($month ==07) {
  $from_year=$year-1;
  $to_year=$year;
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DSC-Employee Center</title>
</head>
<?php include 'header.php';?>
<body>
<div class="">
	<?php include 'sidebar.php';?>
	
<div class="card_panel">
   <div class="col-md-10" style="margin-top: 10px;">
  
  <div class="row">

<form action="" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post">
<div class="container-fluid">
<div class="row">&nbsp; </div>
      <div class="panel panel-warning">
     <div class="panel-body">
        <div class="col-sm-3" align="right" style="margin-top:5px; font-size:16px"><label for="vendor" class="control-label mb-1"><b>Appraisals Period :        From : </b></label></div>
      <div class="col-sm-3">
      <div class="input-group"><span class="input-group-addon"></span>
      <input  name="from_date" id="from_date" type="date" class="form-control edatepicker"> 
       </div>

     </div>
     
     <div class="col-sm-1" align="right" style="margin-top:5px; font-size:16px"><label for="vendor" class="control-label mb-1"><b>To : </b></label></div>
      <div class="col-sm-3">
      <div class="input-group"><span class="input-group-addon"></span>
      <input  name="to_date" id="to_date" type="date" class="form-control edatepicker"> 
       </div>
     </div>
      <input name='user' type='hidden' hidden value="<?php echo $user ?>"/>
     <div class="col-sm-1">
      <div class="input-group"><span class="input-group-addon"></span>
      <input  name="Submit" type="submit" class="form-control"> 
       </div>
     </div>
     </div>
      </div>

</div>
</form>
  </div>
  <!--?php
  
  if (isset($_POST['from_date'])) {
     $from_date=$_POST['from_date'];
    
$date = explode('-', $from_date);
$from_month = $date[1];
$day   = $date[2];
$from_year  = $date[0];
$from_month = explode(('0'), $from_month);
$from_month = $from_month[1];
  }

  if (isset($_POST['from_date'])) {
     $to_date=$_POST['to_date'];

$date = explode('-', $to_date);
$to_month = $date[1];
$day   = $date[2];
$to_year  = $date[0];
$to_month = explode(('0'), $to_month);
$to_month = $to_month[1];
  }
  ?-->
    </div>
<div class="col-sm-10"> 

       <div class="row">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; My Appraisals &darr;</b></h3>
              </div>
              <div class="panel-body">
      <div class="row">
         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; Period</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; Competence</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; Professional</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Gross Score</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Rating</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Rank</label>
      </div>
    </div>       
 <?php 
 
$get_app_details = "SELECT * FROM appraisals WHERE acr_emp_id='$user'";
    $run_app_details = mysqli_query($link, $get_app_details);
      while ($app_details_row=mysqli_fetch_array($run_app_details)) 
    {

     
     if ($app_details_row["acr_emp_id"]=="$user") {
        
    $period=$app_details_row["from_year"] . " - " . $app_details_row["to_year"];

      $score1=$app_details_row["app_score1"] + $app_details_row["app_score2"] + $app_details_row["app_score3"];
      $score2=$app_details_row["app_score4"] + $app_details_row["app_score5"] + $app_details_row["app_score6"] + $app_details_row["app_score7"] + $app_details_row["app_score8"];

      $gross=$app_details_row["app_gross"];
      $rating=$app_details_row["app_rating"];

if ($rating < 2) {
  $remarks="Poor Performer";
}
if ($rating > 1.99 AND $rating < 3) {
  $remarks="Needs Imrovement";
} 

if ($rating > 2.99 AND $rating < 3.5) {
  $remarks="Good Performer";
}    
  
  if ($rating > 3.49 AND $rating < 4) {
  $remarks="Good Performer MeetsvExceptions";
}  
if ($rating > 3.99 AND $rating < 4.5) {
  $remarks="Very Good Performer";
} 
if ($rating > 4.49 AND $rating < 5) {
  $remarks="Exceptionally Very Good Performer";
}  

if ($rating > 4.99) {
  $remarks="Outstanding Performer";
} 
 ?>             

            <div class="col-sm-2">
              <div class="caption">
              <label class="form-control"><a href="my_appraisal_view.php?user=<?php echo $user ?>"><?php echo $period; ?>&nbsp; Detail</a>
                </label>
              </div>
            </div>
              <div class="col-sm-2">
                <div class="caption">
                    <label class="form-control"> &nbsp; <?php echo $score1; ?></label>
              </div>  
            </div>
            
              
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control">&nbsp; <?php echo $score2; ?></label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control">&nbsp; <?php echo $gross; ?></label>
              </div>
             </div>
             <div class="col-sm-2">
                <div class="caption">
              <label class="form-control">&nbsp; <?php echo $rating; ?></label> 
              </div>
            </div>
              <div class="col-sm-2">
              <div class="caption">
               <label class="form-control">&nbsp; <?php echo $remarks; ?></label>
            </div>
              </div>
                           
     <?php 

     
           }
           
         } 
    ?>   
      <!--<form id="form1" name="form1" method="post" action="personal_info1.php">
            <div class="row">
      <div class="col-sm-9">&nbsp; </div>
      <div class="col-sm-3">
        <input type="submit" class="submit_button btn tn-info btn-md"  value="Next">
      </div>        
    </div>
  </form-->
              </div>

            </div>
          </div>  
        </div>
<form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post"> 
  <div class="row" style="margin-top:-30px;">
   <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> Go Back</button>
            </div>
      </div>
      </form>
   
<?php   
        if(isset($_POST['submit']))
{

      header("Location: ../index-emp.php?user=$user");
      
  
  }
?>
      </div>  
  </div>    
<?php include 'footer.php';?>
</body>
</html>