<?php   

$user="";
if (isset($_POST['user'])) {
   $user=$_POST['user'];

}

include_once("connect.php");
setlocale(LC_MONETARY,"PKR");

/*$date=date("Y-m-d");
$date = explode('-', $date);
echo $month = $date[1];
echo $day   = $date[2];
echo $year  = $date[0];*/
$time="";
$timeParts="";
$hours=0;
$minutes=0;
$att_year=0;
$att_month=0;
$att_id="";
$att_hrs=0;
$att_days_late=0;
$att_leave_late=0;
$att_leaves=0;
$att_total=0;
if (isset($_POST['from_date'])) {
 
 $from_date=$_POST['from_date'];
 $from_date = explode('-', $from_date);
 $from_month = $from_date[1];
 $from_year  = $from_date[0];

}
if (isset($_POST['to_date'])) {
 
 $to_date=$_POST['to_date'];
 $to_date = explode('-', $to_date);
 $to_month = $to_date[1];
 $to_year  = $to_date[0];

}

$start_period="$from_month" . "from_year"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DSC-Attendance</title>
</head>
<?php include 'header.php';?>
<body>
<div class="">
	<?php include 'sidebar.php';?>
  <div class="card_panel">
   
	<div class="col-sm-10"> 

       <div class="row">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; Attendance Summary &darr;</b></h3>
              </div>
              <div class="panel-body">
      <div class="row">
         <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; Month & Year</label>
      </div> 
      <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">&nbsp; &nbsp; Total Hrs</label>
      </div>

         <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">&nbsp; &nbsp; # of Late</label>
      </div>

         <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">Leave Due to late</label>
      </div>

         <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">Leaves</label>
      </div> 
      <div class="col-sm-2">
              <label for="att_cnic" class="control-label mb-1">Total Leaves</label>
      </div>
    </div>       
 <?php 

  $get_att_summary = "SELECT * FROM Attendance_summary WHERE emp_id='$user' AND att_year >= '$from_year' AND att_year <= '$to_year' AND att_month >= '$from_month' AND att_month <= '$to_month'";
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

            <div class="col-sm-2">
              <div class="caption">
  <label class="form-control"><a href="my_single_month_attendance.php?user=<?php echo $user ?>& month=<?php echo $att_month ?>& year=<?php echo $att_year ?>"><?php echo $month_year; ?>&nbsp; Detail</a>
                </label>
              </div>
            </div>
              <div class="col-sm-2">
                <div class="caption">
                    <label class="form-control">&nbsp; <?php echo $att_hrs; ?></label>
              </div>  
            </div>
            
              
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control"><?php echo $att_days_late; ?></label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control">&nbsp; <?php echo $att_leave_late; ?></label>
              </div>
             </div>
             <div class="col-sm-2">
                <div class="caption">
              <label class="form-control">&nbsp; <?php echo $att_leaves; ?></label> 
              </div>
            </div>
              <div class="col-sm-2">
              <div class="caption">
              <label class="form-control">&nbsp; <?php echo $att_total; ?></label>
            </div>
              </div>
                           
              
           <?php } ?>   
      
              </div>

            </div>
          </div>  
        </div>  
      </div>
    </div>  
    
  </div>


</div>
<?php include 'footer.php';?>
</div>
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