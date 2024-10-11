<?php 
$status="";  
 include 'connect.php';

if (isset($_GET['user'])) {
    $user=$_GET['user'];
}
$team_name="";
$from_month=4;
$from_year=0;
$to_month=0;
$to_year=0;
$date=date("Y-m-d");
$date = explode('-', $date);
$month = $date[1];
$day   = $date[2];
$year  = $date[0];

if ($month > 6) {
 $from_year=$year-1;
}else{
 $from_year=$year;
}
$to_month=$month;
$to_year=$year;
$period= $from_year . "-08-01";
$app_period= "July " . $from_year . " - June " . $to_year;


     $get_emp = "SELECT * FROM employee_record WHERE employee_id='$user'";
    $run_emp = mysqli_query($link, $get_emp);
      while ($emp_row=mysqli_fetch_array($run_emp)) 
    {
      $team=$emp_row['employee_team'];
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

<form action="my_subordinate_appraisal.php" onSubmit="return validateForm()" enctype="multipart/form-data" name="EmpForm" id="EmpForm" method="post">
<div class="container-fluid">
<div class="row">&nbsp; </div>
      <div class="panel panel-warning">
     <div class="panel-body">
        <div class="col-sm-3" align="right" style="margin-top:5px; font-size:16px"><label for="vendor" class="control-label mb-1"><b>Payroll Period :        From : </b></label></div>
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
  
    </div>
<div class="col-sm-10"> 
<form id="form1" name="form1" method="post" >
       <div class="row">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; List Of Employees for Appraisals &darr;</b></h3>
              </div>
              <div class="panel-body">
      <div class="row">
         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; Appraisal Period</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; Team</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; &nbsp; Employee ID</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Name</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Designation</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Status</label>
      </div>
    </div>       
 <?php 
$get_emp1 = "SELECT * FROM employee_record WHERE employee_team='$team' AND employee_supervisor_id = '$user' AND employee_doj < '$period'";
    $run_emp1 = mysqli_query($link, $get_emp1);
      while ($emp1_row=mysqli_fetch_array($run_emp1)) 
    {
   
      $emp_id=$emp1_row["employee_id"];
      $name=$emp1_row["employee_name"] . " " . $emp1_row["last_name"];
      $desig=$emp1_row["employee_desig"];
      $grade=$emp1_row["employee_grade"];
      $dept=$emp1_row["employee_dept"];

  $get_desg = "SELECT * FROM employee_desig WHERE desig_id='$desig' LIMIT 1";
    $run_desg = mysqli_query($link, $get_desg);
      while ($desg_row=mysqli_fetch_array($run_desg)) 
    {
   
      $designation=$desg_row["title"];    
    } 

   $get_team = "SELECT * FROM teams WHERE team_deptt ='$dept' AND team_code='$team' LIMIT 1";
    $run_team = mysqli_query($link, $get_team);
      while ($team_row=mysqli_fetch_array($run_team)) 
    {
   
      $team_name=$team_row["team_name"];    
    }   
 ?>             

	<table width="1100" border="1">
  
  <tr>
    <td style="width: 200px;">
      
              <label class="form-control"><a href="my_subordinate_appraisal.php?user=<?php echo $emp_id ?>&period=<?php echo $app_period; ?>"><?php echo $app_period; ?></a>
                </label>
             
            </td>
   <td style="width: 200px;">
              <label class="form-control">&nbsp; <?php echo $team_name; ?></label>
            </td>
    <td style="width: 150px;">
              <label class="form-control">&nbsp; <?php echo $emp_id; ?></label>
              </td>
    <td style="width: 200px;">
              <label class="form-control">&nbsp; <?php echo $name; ?></label>
             </td>
    <td style="width: 200px;">
              <label class="form-control">&nbsp; <?php echo $designation; ?></label>
              </td>
    <td style="width: 150px;">
              <label class="form-control">&nbsp; <?php echo $status; ?></label>
              </td>
  </tr>
</table>


            
                           
              
           <?php } ?>   
      
              </div>

            </div>
          </div>  
        </div>
		</form>
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