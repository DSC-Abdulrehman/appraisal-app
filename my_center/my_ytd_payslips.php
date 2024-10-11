
<?php   


if (isset($_GET['user'])) {
    $user=$_GET['user'];
}
  
$from_month=0;
$from_year=0;
$to_month=0;
$to_year=0;
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
  <?php
  
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
  ?>
    </div>
<div class="col-sm-10"> 

       <div class="row">
         <div class="panel panel-primary">
               <div class="row">&nbsp;</div>
              <div class="panel-heading">
                <h3 class="panel-title" align="center"><b>&darr; My Year - To - date Payslips &darr;</b></h3>
              </div>
              <div class="panel-body">
      <div class="row">
         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; &nbsp; Month & Year</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; Basic Pay</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">&nbsp; &nbsp; Gross Salary</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Deductions</label>
      </div>

         <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Income Tax</label>
      </div> 
      <div class="col-sm-2">
              <label for="pay_cnic" class="control-label mb-1">Net Pay</label>
      </div>
    </div>       
 <?php 
 
 $start=$from_year . $from_month;
 $end= $to_year . $to_month;
$get_pay_details = "SELECT * FROM payslips WHERE pay_id='$user'";
    $run_pay_details = mysqli_query($link, $get_pay_details);
      while ($pay_details_row=mysqli_fetch_array($run_pay_details)) 
    {
     $abc=$pay_details_row["pay_year"].$pay_details_row["pay_month"];
     if ($abc>="$start" AND $abc<="$end") {
        
      
      $pay1=$pay_details_row["pay_id"];
      $name=$pay_details_row["pay_name"];
      $pay_year=$pay_details_row["pay_year"];
      $pay_month=$pay_details_row["pay_month"];
      $pay_basic=$pay_details_row["pay_basic"];

      if ($pay_month==1) {
         $month_year="Jan'  $pay_year";
      }
      if ($pay_month==2) {
         $month_year="Feb'  $pay_year";
      }
      if ($pay_month==3) {
         $month_year="Mar'  $pay_year";
      }
      if ($pay_month==4) {
         $month_year="Apr'  $pay_year";
      }
      if ($pay_month==5) {
         $month_year="May'  $pay_year";
      }
      if ($pay_month==6) {
         $month_year="Jun'  $pay_year";
      }
      if ($pay_month==7) {
         $month_year="Jul'  $pay_year";
      }
      if ($pay_month==8) {
         $month_year="Aug'  $pay_year";
      }
      if ($pay_month==9) {
         $month_year="Sep'  $pay_year";
      }
      if ($pay_month==10) {
         $month_year="Oct'  $pay_year";
      }
      if ($pay_month==11) {
         $month_year="Nov'  $pay_year";
      }
      if ($pay_month==12) {
         $month_year="Dec'  $pay_year";
      }
      
      $allowances=$pay_details_row["pay_house"]+$pay_details_row["pay_conv"]+$pay_details_row["pay_comm"]+$pay_details_row["pay_tech_all"]+$pay_details_row["pay_medical_all"]+$pay_details_row["pay_cost"]+$pay_details_row["pay_others"];
      $total_pay=$pay_basic+$allowances;
      $deductions=$pay_details_row["ded_absense"]+$pay_details_row["ded_adv"]+$pay_details_row["ded_core"]+$pay_details_row["ded_other"];
      
      $ded_income_tax=$pay_details_row["ded_income_tax"];
      $ytd_tax=$pay_details_row["ytd_tax"];

      $net_pay=$total_pay-($deductions+$ded_income_tax);
      
    $pay_basic1=number_format($pay_basic);
    
    $total_pay1=number_format($total_pay);
    $deductions1=number_format($deductions);
    $ded_income_tax1=number_format($ded_income_tax);
    $net_pay1=number_format($net_pay);
 ?>             

            <div class="col-sm-2">
              <div class="caption">
              <label class="form-control"><a href="my_single_payslip.php?user=<?php echo $user ?>& month=<?php echo $pay_month ?>& year=<?php echo $pay_year ?>"><?php echo $month_year; ?>&nbsp; Detail</a>
                </label>
              </div>
            </div>
              <div class="col-sm-2">
                <div class="caption">
                    <label class="form-control">PKR &nbsp; <?php echo $pay_basic1; ?></label>
              </div>  
            </div>
            
              
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control">PKR &nbsp; <?php echo $total_pay1; ?></label>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="caption">
                <label class="form-control">PKR &nbsp; <?php echo $deductions1; ?></label>
              </div>
             </div>
             <div class="col-sm-2">
                <div class="caption">
              <label class="form-control">PKR &nbsp; <?php echo $ded_income_tax1; ?></label> 
              </div>
            </div>
              <div class="col-sm-2">
              <div class="caption">
              <label class="form-control">PKR &nbsp; <?php echo $net_pay1; ?></label>
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
        <input type="submit" class="submit_button btn btn-info btn-md"  value="Next">
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