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
$pay1=0;
$basic_pay=0;
$house_all=0;
$conveyance_all=0;
$communication_all=0;
$additional_pay=0;
$other_all=0;

$ded_id=0;
$ded_absent=0;
$ded_adv=0;
$ded_core=0;
$ded_phone=0;
$ded_other=0;
$ded_income_tax=0;
$ytd_income_tax=0;
$pay_year=0;
$pay_month=0;
$pay_id=0;
$pay_name="";
$pay_desig="";
$pay_grade=0;
$pay_cnic="";
$pay_doj="";
$pay_bank="";
$pay_branch="";
$pay_account="";
$pay_basic=0;
$pay_house=0;
$pay_conv=0;
$pay_comm=0;
$pay_other=0;
$total_pay=0;
$ded_absense=0;
$ded_adv=0;
$ded_core=0;
$ded_other=0;
$ded_income_tax=0;
$total_ded=0;
$net_pay=0;
$ytd_tax=0;
$from_year=0;
$from_month=0;
$to_year=0;
$to_month=0;
$name="";
$net_pay=0;
$deductions=0;
$total_pay=0;
$allowances=0;
$month_year="";
$total_pay1=0;
$deductions1=0;
$ded_income_tax1=0;
$net_pay1=0;
$ser=0;


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
<title>DSC-pay Center</title>
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
                <h3 class="panel-title" align="center"><b>&darr; Payslips Information &darr;</b></h3>
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

  $get_pay_details = "SELECT * FROM payslips WHERE pay_id='$user' AND pay_year >= '$from_year' AND pay_year <= '$to_year' AND pay_month >= '$from_month' AND pay_month <= '$to_month'";
    $run_pay_details = mysqli_query($link, $get_pay_details);
      while ($pay_details_row=mysqli_fetch_array($run_pay_details)) 
    {
   
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
                           
              
           <?php } ?>   
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