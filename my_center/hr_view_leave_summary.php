
<?php   
$emp1="";
$sup_ind=0;
$user1="";
$year1=0;
$year2=0;
if (isset($_GET['user'])) {
    $user=$_GET['user'];
    $user1=$_GET['user'];
}
 $date=date('Y-m-d');
 $dateParts = explode("-" , $date);
 $month = $dateParts[1];
 $year1 = $dateParts[0];
 $year2 = $dateParts[0];
if ($month>6) {
 $year2=$year1+1;
  
}else{
 $year1=$year1-1;
}
//$month=07;
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

 
	 <div class="row" style="margin-top: 0px; margin-left: 1px; width: 1135px;">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading"style="margin-top: -25px;">
                <h3 class="panel-title" align="center"><b>&darr; Leave Summary &darr;</b><?php echo str_repeat("&nbsp;", 15) ?>( Fiscal Year : <?php echo $year1; ?> - <?php echo $year2; ?> )</h3>
              </div>
             <div class="panel-body" style="margin-top: -10px;">
			  
<table width="1100" border="1">
  <tr style="height: 40px;">
    <th width="150">&nbsp; &nbsp; Employee</th>
    <th width="150">&nbsp; &nbsp; Name</th>
    <th width="150">&nbsp; &nbsp; Opening Balance</th>
    <th width="150">&nbsp; &nbsp; Due to Late Coming</th>
    <th width="150">&nbsp; &nbsp; Leaves availed</th>
    <th width="150">&nbsp; &nbsp; Total Leaves</th>
    <th width="150">&nbsp; &nbsp; Closing Balance</th>
  </tr>
 
</table>

			  
      
 <?php 
  $get_emp1_details = "SELECT * FROM employee_record";
    $run_emp1_details = mysqli_query($link, $get_emp1_details);
      while ($emp1_details_row=mysqli_fetch_array($run_emp1_details)) 
    {

      $emp1=$emp1_details_row['employee_id'];
      $name=$emp1_details_row['employee_name'] . $emp1_details_row['last_name'];
  $get_leave_summary = "SELECT * FROM leaves_summary WHERE l_emp_id='$emp1' AND l_fiscal_year1='$year1' AND l_fiscal_year2='$year2'";
    $run_leave_summary = mysqli_query($link, $get_leave_summary);
      while ($leave_summary_row=mysqli_fetch_array($run_leave_summary)) 
    {
   
      $op_bal=$leave_summary_row["l_opening_leave_balance"];
      $late=$leave_summary_row["l_leave_due_to_late"];
      $leaves=$leave_summary_row["l_leaves"];
      $cl_bal=$leave_summary_row["l_closing_balance"];
      $tot_leaves=$late+$leaves;
      
   
 ?>             
<table width="1100" border="1">
 
  <tr>
    <!--td width="150"> <label class="form-control"><a href="hr_attendance_changes.php?user=<?php echo $att_id ?>&user1=<?php echo $user1 ?>& month=<?php echo $att_month ?>& year=<?php echo $att_year ?>"><b style="color: Orange"><?php echo $att_id; ?></b></a>
              </label></td-->
    <td width="150"> <label class="form-control">&nbsp; <?php echo $emp1; ?></label></td>
    <td width="150"> <label class="form-control">&nbsp; <?php echo $name; ?></label></td>
    <td width="150"><label class="form-control"><?php echo $op_bal; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $late; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $leaves; ?></label></td>
    <td width="150"><label class="form-control">&nbsp; <?php echo $tot_leaves; ?></label></td>
     <td width="150"><label class="form-control">&nbsp; <?php echo $cl_bal; ?></label></td>
  </tr>
</table>

  <?php 
  }
} 

?>   
      
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