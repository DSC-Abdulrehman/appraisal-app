
<?php   
$emp1="";
$sup_ind=0;
$user1="";
if (isset($_GET['user'])) {
    $user=$_GET['user'];
    $user1=$_GET['user'];
}
  
$from_month="";
$from_year="";
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

<form action="my_attendance_summary.php" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post">
<div class="container-fluid">
<div class="row">&nbsp; </div>
      <div class="panel panel-warning">
     <div class="panel-body">
        <div class="col-sm-3" align="right" style="margin-top:5px; font-size:16px"><label for="vendor" class="control-label mb-1"><b>From : </b></label></div>
      <div class="col-sm-2">
      <div class="input-group"><span class="input-group-addon"></span>
      <input  name="from_date" id="from_date" type="date" class="form-control edatepicker"> 
       </div>

     </div>
     
     <div class="col-sm-1" align="right" style="margin-top:5px; font-size:16px"><label for="vendor" class="control-label mb-1"><b>To : </b></label></div>
      <div class="col-sm-2">
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
  
  
  
  <div class="row" style="margin-top: -20px; margin-left: 1px; width: 1135px;">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; My Attendance Summary &darr;</b></h3>
              </div>
               <div class="panel-body" style="margin-top: -10px;">
			  
<table width="1100" border="1">
  <tr style="height: 40px;">
    <th width="150">&nbsp; &nbsp; Month & Year</th>
    <th width="150">&nbsp; &nbsp; Total Hrs</th>
    <th width="150">&nbsp; &nbsp; # of Late</th>
    <th width="150">&nbsp; &nbsp; Leave Due to late</th>
    <th width="150">&nbsp; &nbsp; Leaves</th>
    <th width="150">&nbsp; &nbsp; Total Leaves</th>
  </tr>
 
</table>

			  
      
 <?php 

  $get_att_summary = "SELECT * FROM attendance_summary WHERE emp_id='$user'";
    $run_att_summary = mysqli_query($link, $get_att_summary);
      while ($att_summary_row=mysqli_fetch_array($run_att_summary)) 
    {
   
      $att_id=$att_summary_row["emp_id"];
      $att_year=$att_summary_row["att_year"];
      $att_month=$att_summary_row["att_month"];
      
      if ($att_month==1) {
         $month_year="Jan'  $att_year";
      }
      if ($att_month==2) {
         $month_year="Feb'  $att_year";
      }
      if ($att_month==3) {
         $month_year="Mar'  $att_year";
      }
      if ($att_month==4) {
         $month_year="Apr'  $att_year";
      }
      if ($att_month==5) {
         $month_year="May'  $att_year";
      }
      if ($att_month==6) {
         $month_year="Jun'  $att_year";
      }
      if ($att_month==7) {
         $month_year="Jul'  $att_year";
      }
      if ($att_month==8) {
         $month_year="Aug'  $att_year";
      }
      if ($att_month==9) {
         $month_year="Sep'  $att_year";
      }
      if ($att_month==10) {
         $month_year="Oct'  $att_year";
      }
      if ($att_month==11) {
         $month_year="Nov'  $att_year";
      }
      if ($att_month==12) {
         $month_year="Dec'  $att_year";
      }
      
 $time=$att_summary_row['att_hrs'];
 $timeParts = explode("." , $time);
 $hours = $timeParts[0];
 $minutes = $timeParts[1] * 60/100;
 $time=explode("." , $minutes);
 $minutes=$time[0];
      $att_hrs="Hrs." . $hours . " Minutes " . $minutes;

      $att_days_late=$att_summary_row["days_late"];
      $att_leave_late=$att_summary_row["leave_due_to_late"];
      $att_leaves=($att_summary_row["half_days"] / 2)+$att_summary_row["leaves"];
      $att_total=$att_leave_late+$att_leaves;
   
 ?>             
<table width="1100" border="2">
 
  <tr>
    <td width="150"> <label class="form-control"><a href="my_single_month_attendance.php?user=<?php echo $user ?>& month=<?php echo $att_month ?>& year=<?php echo $att_year ?>"><b style="color: Blue"><?php echo $month_year; ?>&nbsp; Detail</b></a>
              </label></td>
    <td width="150"> <label class="form-control">&nbsp; <?php echo $att_hrs; ?></label></td>
    <td width="150"><label class="form-control"><?php echo $att_days_late; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_leave_late; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_leaves; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_total; ?></label></td>
  </tr>
</table>

            
                           
              
           <?php } ?>   
      
              </div>

      </div>
     </div>

<?php
  $get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user' AND employee_desig > 11 LIMIT 1";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {
      
    $sup_ind=1;
  }
  
  if ($sup_ind==1)
  {
?>

	 
	 <div class="row" style="margin-top: -20px; margin-left: 1px; width: 1135px;">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; My Subordinates Attendance Summary &darr;</b></h3>
              </div>
             <div class="panel-body" style="margin-top: -10px;">
			  
<table width="1100" border="1">
  <tr style="height: 40px;">
    <th width="150">&nbsp; &nbsp; Employee</th>
    <th width="150">&nbsp; &nbsp; Month & Year</th>
    <th width="150">&nbsp; &nbsp; Total Hrs</th>
    <th width="150">&nbsp; &nbsp; # of Late</th>
    <th width="150">&nbsp; &nbsp; Leave Due to late</th>
    <th width="150">&nbsp; &nbsp; Leaves</th>
    <th width="150">&nbsp; &nbsp; Total Leaves</th>
  </tr>
 
</table>

			  
      
 <?php 
  $get_emp1_details = "SELECT * FROM employee_record WHERE employee_supervisor_id='$user'";
    $run_emp1_details = mysqli_query($link, $get_emp1_details);
      while ($emp1_details_row=mysqli_fetch_array($run_emp1_details)) 
    {

      $emp1=$emp1_details_row['employee_id'];

  $get_att_summary = "SELECT * FROM Attendance_summary WHERE emp_id='$emp1'";
    $run_att_summary = mysqli_query($link, $get_att_summary);
      while ($att_summary_row=mysqli_fetch_array($run_att_summary)) 
    {
   
      $att_id=$att_summary_row["emp_id"];
      $att_year=$att_summary_row["att_year"];
      $att_month=$att_summary_row["att_month"];
      
      if ($att_month==1) {
         $month_year="Jan'  $att_year";
      }
      if ($att_month==2) {
         $month_year="Feb'  $att_year";
      }
      if ($att_month==3) {
         $month_year="Mar'  $att_year";
      }
      if ($att_month==4) {
         $month_year="Apr'  $att_year";
      }
      if ($att_month==5) {
         $month_year="May'  $att_year";
      }
      if ($att_month==6) {
         $month_year="Jun'  $att_year";
      }
      if ($att_month==7) {
         $month_year="Jul'  $att_year";
      }
      if ($att_month==8) {
         $month_year="Aug'  $att_year";
      }
      if ($att_month==9) {
         $month_year="Sep'  $att_year";
      }
      if ($att_month==10) {
         $month_year="Oct'  $att_year";
      }
      if ($att_month==11) {
         $month_year="Nov'  $att_year";
      }
      if ($att_month==12) {
         $month_year="Dec'  $att_year";
      }
      
 $time=$att_summary_row['att_hrs'];
 $timeParts = explode("." , $time);
 $hours = $timeParts[0];
 $minutes = $timeParts[1] * 60/100;
 $time=explode("." , $minutes);
 $minutes=$time[0];
      $att_hrs="Hrs." . $hours . " Minutes " . $minutes;

      $att_days_late=$att_summary_row["days_late"];
      $att_leave_late=$att_summary_row["leave_due_to_late"];
      $att_leaves=($att_summary_row["half_days"] / 2)+$att_summary_row["leaves"];
      $att_total=$att_leave_late+$att_leaves;
   
 ?>             
<table width="1100" border="1">
 
  <tr>
    <td width="150"> <label class="form-control"><a href="my_single_month_attendance.php?user=<?php echo $att_id ?>&user1=<?php echo $user1 ?>& month=<?php echo $att_month ?>& year=<?php echo $att_year ?>"><b style="color: Orange"><?php echo $att_id; ?>&nbsp; Detail</b></a>
              </label></td>
    <td width="150"> <label class="form-control">&nbsp; <?php echo $month_year; ?></label></td>
    <td width="150"> <label class="form-control">&nbsp; <?php echo $att_hrs; ?></label></td>
    <td width="150"><label class="form-control"><?php echo $att_days_late; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_leave_late; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_leaves; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $att_total; ?></label></td>
  </tr>
</table>

  <?php 
  }
} 

?>   
      
              </div>

      </div>
     </div>
 <?php } ?>
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
      
</body>
<?php include 'footer.php';?>
</div>
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