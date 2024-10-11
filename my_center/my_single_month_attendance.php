<?php   

$user="";
$month=0;
$year=0;
$designation="";
$grade="";
$user1="";
if (isset($_GET['user'])) {
   $user=$_GET['user'];

}

if (isset($_GET['user1'])) {
   $user1=$_GET['user1'];
}

if ($user1 =="") {
   $user1=$user;

}
if (isset($_GET['month'])) {
   $month=$_GET['month'];

}
if (isset($_GET['year'])) {
   $year=$_GET['year'];

}

include_once("connect.php");
setlocale(LC_MONETARY,"PKR");
$att_date="";
$att_time_in="";
$att_time_out="";
$att_logged_time="";
$att_remarks="";
$att_rule="";
$day=0;
$deptt="";
$team="";
$dept_id=0;
$team_id=0;
$from_date="";
$to_date="";
$formated_to_date = "";
$formated_from_date = "";
$desig_id=0;
$name="";
$a=0;
if ($month==1 OR $month==3 OR $month==5 OR $month==7 OR $month==8 OR $month==10 OR $month==12) {
        $day=31;
      }

      if ($month==4 OR $month==6 OR $month==9 OR $month==9) {
        $day=30;
      }

      if ($month==2) {

        if (date('L',strtotime($year . '-01-01'))) {

           $day=29;
        }else {

        $day=28;
      }
    }
  if ($month==1) {
    $month_year="Jan' $year";
    $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year; 
      }
      if ($month==2) {
         $month_year="Feb' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==3) {
         $month_year="Mar' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==4) {
         $month_year="Apr' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==5) {
         $month_year="May' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==6) {
         $month_year="Jun' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==7) {
         $month_year="Jul' $year";
     $from_date=$month . "/1/" . $year;
     $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==8) {
         $month_year="Aug' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==9) {
         $month_year="Sep' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==10) {
         $month_year="Oct' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==11) {
         $month_year="Nov' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }
      if ($month==12) {
         $month_year="Dec' $year";
      $from_date=$month . "/1/" . $year;
    $to_date=$month . "/" . $day . "/" . $year;
      }

  $get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user'";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {

      $name=$emp_details_row["employee_name"] . "" . $emp_details_row["last_name"];
      $desig_id=$emp_details_row["employee_desig"];
      $dept_id=$emp_details_row["employee_dept"];
      $team_id=$emp_details_row["employee_team"];
  
      }

    $get_emp_desig = "SELECT * FROM employee_desig WHERE desig_id='$desig_id'";
    $run_emp_desig = mysqli_query($link, $get_emp_desig);
      while ($desig_details_row=mysqli_fetch_array($run_emp_desig)) 
    {

      $designation=$desig_details_row["title"];
      $grade=$desig_details_row["grade"];
    }

    $get_emp_dept = "SELECT * FROM department WHERE deptt_id='$dept_id'";
    $run_emp_dept = mysqli_query($link, $get_emp_dept);
      while ($dept_details_row=mysqli_fetch_array($run_emp_dept)) 
    {

      $deptt=$dept_details_row["deptt_name"];
      
    }

    $get_team = "SELECT * FROM teams WHERE team_deptt='$dept_id' AND team_id='$team_id'";
    $run_team = mysqli_query($link, $get_team);
      while ($team_details_row=mysqli_fetch_array($run_team)) 
    {

      $team=$team_details_row["team_name"];
      
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DSC-pay Center</title>
</head>
<?php include 'header.php';?>
<body>
<div class="">
	<?php include 'sidebar.php';?>
  <div class="card_panel">
     <div class="col-sm-7"> 
	   <div class="panel panel-primary" style="margin-top: 2px; width: 800px;">
               <div class="row">&nbsp;</div>
         <div class="panel-heading" style="margin-top: -20px;">
            <h3 class="panel-title" align="center"><b>&darr; My Monthly Attendance Sheet &darr;</b></h3>
              </div>
       <div class="panel-body">
         <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: -10px; margin-left: -20px;">
        <a class="navbar-brand" href="#"><img src="../images/logo-ds1.png" alt="Logo"></a>
      </div>
     </div>
     <div class="row">&nbsp; </div>
      <div class="row" style="font-size: 16px; font-family: sans-serif;">
        <div class="col-lg-3">
          <label class="file-control">&nbsp; EMPLOYEE NO : </label>
       </div>
        <div class="col-lg-3">
          <label class="file-control"><?php echo "$user"; ?></label></div>
          <div class="col-lg-3">
          <label class="file-control">&nbsp; EMPLOYEE NAME : </label>
       </div>

        <div class="col-lg-3">
          <label class="file-control"><?php echo "$name"; ?></label></div>
      </div>
  <div class="row" style="font-size: 16px; font-family: sans-serif;">
        <div class="col-lg-3">&nbsp; <label class="file-control">JOB TITLE : </label></div>
        <div class="col-lg-3"><label class="file-control"><?php echo "$designation"; ?></label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control">GRADE : </label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control"><?php echo "$grade"; ?></label></div>
      </div>

       <div class="row" style="font-size: 18px; font-family: sans-serif;">
        <div class="col-lg-3">&nbsp; <label class="file-control">DEPARTMENT : </label></div>
        <div class="col-lg-3"><label class="file-control"><?php echo "$deptt"; ?></label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control">TEAM : </label></div>
        <div class="col-lg-3" style="font-size: 16px;">&nbsp; <label class="file-control"><?php echo "$team"; ?></label></div>
      </div>
       <!--div class="row">&nbsp; </div-->
         <?php 
   $get_att1 = "SELECT * FROM attendance WHERE emp_id='$user'";
    $run_att1 = mysqli_query($link, $get_att1);
    
      while ($att1_row=mysqli_fetch_array($run_att1)) 
    {
      $date1=$att1_row['att_date'];
    }
/*
SELECT * FROM attendance WHERE emp_id='DSC-018' AND (STR_TO_DATE(att_date,'%m/%d/%Y') >=STR_TO_DATE('7/1/2021','%m/%d/%Y') AND STR_TO_DATE(att_date,'%m/%d/%Y') <= STR_TO_DATE('$to_date','%m/%d/%Y'))
*/
  $get_att = "SELECT * FROM attendance WHERE emp_id='$user' AND (STR_TO_DATE(att_date,'%m/%d/%Y') >=STR_TO_DATE('$from_date','%m/%d/%Y') AND STR_TO_DATE(att_date,'%m/%d/%Y') <= STR_TO_DATE('$to_date','%m/%d/%Y'))";
    $run_att = mysqli_query($link, $get_att);
      while ($att_row=mysqli_fetch_array($run_att)) 
    {
     
      $att_date=$att_row["att_date"];
      $att_time_in=$att_row["att_time_in"];
      $att_time_out=$att_row["att_time_out"];
      $att_logged_time=$att_row["att_logged_time"];
      $att_remarks=$att_row["att_remarks"];
      $att_rule=$att_row["att_rule"];
    if ($att_time_in=="") {
      $att_time_in="0:00";
    }
    if ($att_time_out=="") {
      $att_time_out="0:00";
    }
    
 ?>             
     <div class="row" style="margin-left: 1px;">
  <?php
 if ($a==0) {
   $a++;
  ?>       
<table width="770" border="1">
 
  <tr style="height:36px; font-size: 20px;">
    <td width="140">&nbsp;<b>Date</b></td>
    <td width="140">&nbsp; <b>Time In</b></td>
    <td width="140">&nbsp; <b>Time Out</b></td>
    <td width="140">&nbsp; <b>Log Time</b></td>
    <td width="150">&nbsp; <b>Remarks</b></td>
    <td width="150" style="font-size: 18px;"><b>&nbsp; Penality</b></td>
  </tr>
<?php } ?>
 
  <tr style="font-size:14; height:20px;">
    <td style="width=140px;">&nbsp;<b> <?php echo $att_date; ?></b></td>
    <td width="140">&nbsp; <b><?php echo $att_time_in; ?></b></td>
    <td style="width=140px;">&nbsp; <b><?php echo $att_time_out; ?></b></td>
    <td width="140">&nbsp;  <b><?php echo $att_logged_time; ?></b></td>
    <td width="150">&nbsp;<?php echo $att_remarks; ?> </td>
    <td width="150">&nbsp; <?php echo $att_rule; ?> </td>
  </tr>
    <?php } ?> 
</table>   

</div>
     </div>
	 
	 <form action="" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post"> 
  <div class="row" style="margin-top:-30px;">
   <div class="button-div">
            <button type="submit" class="btn btn-primary submit-btn" id="submit" name="submit"> Go Back</button>
            </div>
			</div>
			</form>
	 
      </div>
   </div>
  <?php   
        if(isset($_POST['submit']))
{

      header("Location: my_att_period.php?user=$user1");
   	  
  
  }

  ?>
            
   </div>
   
 <div class="col-md-3" style="margin-top: 5px;margin-bottom: -100px;">
		<?php include '../marquee_title.php';?>
 </div>
 </div> 

 <?php include 'footer.php';?>
</body>

<Script>
	  $('.carousel .vertical .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=1;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
	  </script>
	  <script type="text/javascript">
	jQuery.fn.extend({
        pic_scroll:function (){
            $(this).each(function(){
                var _this=$(this);
                var ul=_this.find("ul");
                var li=ul.find("li");
                var w=li.size()*li.outerHeight();
                li.clone().prependTo(ul);
                ul.width(2*w);
                var i=1,l;
                _this.hover(function(){i=0},function(){i=1});
                function autoScroll(){
                	l = _this.scrollTop();
                	if(l>=w){
                		_this.scrollTop(0);
                	}else{
                		_this.scrollTop(l + i);
                	}
                }
                var scrolling = setInterval(autoScroll,5);
            })
        }
    });
	$(function(){

		$(".a").pic_scroll();

	})

	</script>
</html>