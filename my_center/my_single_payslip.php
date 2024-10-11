<?php   

$user="";
$month=0;
$year=0;
$designation="";
$grade="";

if (isset($_GET['user'])) {
   $user=$_GET['user'];

}
if (isset($_GET['month'])) {
   $month=$_GET['month'];

}
if (isset($_GET['year'])) {
   $year=$_GET['year'];

}

include_once("connect.php");
setlocale(LC_MONETARY,"PKR");

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
$pay_wk="DSC-011";

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
$pay_tech_all=0;
$pay_medical_all=0;
$pay_adjust=0;
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
$gross_ded=0;
$day=0;
$deptt="";
$team="";
$dept_id=0;
$team_id=0;
$emp_cnic="";
$emp_doj="";
$bank_ac="";
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
                <h3 class="panel-title" align="center"><b>&darr; My Payslip &darr;</b></h3>
              </div>
              <div class="panel-body">
           
 <?php 

  $get_pay_details = "SELECT * FROM payslips WHERE pay_id='$user' AND pay_year = '$year' AND pay_month = '$month' ORDER BY pay_year ASC, pay_month ASC";
    $run_pay_details = mysqli_query($link, $get_pay_details);
      while ($pay_details_row=mysqli_fetch_array($run_pay_details)) 
    {
     
      $pay1=$pay_details_row["pay_id"];
      $name=$pay_details_row["pay_name"];
      $pay_year=$pay_details_row["pay_year"];
      $pay_month=$pay_details_row["pay_month"];
      $pay_basic=$pay_details_row["pay_basic"];

      if ($pay_month==1 OR $pay_month==3 OR $pay_month==5 OR $pay_month==7 OR $pay_month==8 OR $pay_month==10 OR $pay_month==12) {
        $day=31;
      }

      if ($pay_month==4 OR $pay_month==6 OR $pay_month==9 OR $pay_month==9) {
        $day=30;
      }

      if ($pay_month==2) {

        if (date('L',strtotime($pay_year . '-01-01'))) {

           $day=29;
        }else {

        $day=28;
      }
    }
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
      $pay_house=$pay_details_row["pay_house"];
      $pay_conv=$pay_details_row["pay_conv"];
      $pay_comm=$pay_details_row["pay_comm"];
      $pay_tech_all=$pay_details_row["pay_tech_all"];
      $pay_medical_all=$pay_details_row["pay_medical_all"];
      $pay_adjust=$pay_details_row["pay_cost"];
      $pay_other=$pay_details_row["pay_others"];
      $allowances=$pay_details_row["pay_house"]+$pay_details_row["pay_conv"]+$pay_details_row["pay_comm"]+$pay_details_row["pay_tech_all"]+$pay_details_row["pay_medical_all"]+$pay_details_row["pay_cost"]+$pay_details_row["pay_others"];
      $total_pay=$pay_basic+$allowances;
      $deductions=$pay_details_row["ded_absense"]+$pay_details_row["ded_adv"]+$pay_details_row["ded_core"]+$pay_details_row["ded_other"];
      

      $ded_absense=$pay_details_row["ded_absense"];
      $ded_adv=$pay_details_row["ded_adv"];
      $ded_core=$pay_details_row["ded_core"];
      $ded_other=$pay_details_row["ded_other"];
      $ded_income_tax=$pay_details_row["ded_income_tax"];
      $ytd_tax=$pay_details_row["ytd_tax"];
      $gross_ded=$deductions+$ded_income_tax;
      $net_pay=$total_pay-$gross_ded;
      
    $pay_basic=number_format($pay_basic);
    $pay_house=number_format($pay_house);
    $pay_conv=number_format($pay_conv);
    $pay_comm=number_format($pay_comm);
    $pay_tech_all=number_format($pay_tech_all);
    $pay_medical_all=number_format($pay_medical_all);
    $pay_adjust=number_format($pay_adjust);
    $pay_other=number_format($pay_other);
    $total_pay=number_format($total_pay);
    $deductions=number_format($deductions);
    $ded_absense=number_format($ded_absense);
    $ded_adv=number_format($ded_adv);
    $ded_core=number_format($ded_core);
    $ded_other=number_format($ded_other);
    $ded_income_tax=number_format($ded_income_tax);
    $ytd_tax=number_format($ytd_tax);
    $net_pay=number_format($net_pay);
    $gross_ded=number_format($gross_ded);

$get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user'";
    $run_emp_details = mysqli_query($link, $get_emp_details);
      while ($emp_details_row=mysqli_fetch_array($run_emp_details)) 
    {

      $name=$emp_details_row["employee_name"] . "" . $emp_details_row["last_name"];
      $desig_id=$emp_details_row["employee_desig"];
      $dept_id=$emp_details_row["employee_dept"];
      $team_id=$emp_details_row["employee_team"];
      $emp_cnic=$emp_details_row["employee_cnic"];
      $emp_doj=$emp_details_row["employee_doj"];
      $bank_ac=$emp_details_row["employee_account"];

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

    $get_team = "SELECT * FROM teams WHERE team_deptt='$dept_id' AND team_code='$team_id'";
    $run_team = mysqli_query($link, $get_team);
      while ($team_details_row=mysqli_fetch_array($run_team)) 
    {

      $team=$team_details_row["team_name"];
      
    }
 ?>             
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="margin-top: -10px; margin-left: -20px;">
        <a class="navbar-brand" href="#"><img src="../images/logo-ds1.png" alt="Logo"></a>
      </div>
    </div>
      <div class="row">&nbsp; </div>
      <div class="row" style="font-size: 24px; text-align: center; font-family: Georgia, serif;">MONTHLY PAYSLIP FOR THE MONTH OF <?php echo $month_year; ?></div>
      </div>
      
      <div class="row" style="font-size: 16px; font-family: sans-serif;">
        <div class="col-lg-3">
          <label class="file-control">&nbsp; EMPLOYEE NO : </label>
       </div>
        <div class="col-lg-3">
          <label class="file-control"><?php echo "$pay1"; ?></label></div>
          <div class="col-lg-3">
          <label class="file-control">&nbsp; EMPLOYEE NAME : </label>
       </div>

        <div class="col-lg-3">
          <label class="file-control"><?php echo "$name"; ?></label></div>
      </div>
      
      <div class="row" style="font-size: 18px; font-family: sans-serif;">
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
      
       <div class="row" style="font-size: 18px; font-family: sans-serif;">
        <div class="col-lg-3">&nbsp; <label class="file-control">JOINING DATE : </label></div>
        <div class="col-lg-3"><label class="file-control"><?php echo "$emp_doj"; ?></label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control">CNIC # : </label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control"><?php echo "$emp_cnic"; ?></label></div>
      </div>

       <div class="row" style="font-size: 18px; font-family: sans-serif;">
        <div class="col-lg-3" style="font-size: 17px;">&nbsp; <label class="file-control">BANK ACCOUNT # : </label></div>
        <div class="col-lg-3"><label class="file-control"><?php echo "$bank_ac"; ?></label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control">NO OF DAYS : </label></div>
        <div class="col-lg-3">&nbsp; <label class="file-control"><?php echo "$day"; ?></label></div>
      </div>
           
      <div class="row">&nbsp; </div>
      <div class="row" style="margin-left: 10px;">
         
<table width="790" border="1">
  <tr style="height:36px; font-size: 20px;">
    <td width="210">&nbsp;<b>Earnings</b></td>
    <td width="104">&nbsp; <b>Amount</b></td>
    <td width="151">&nbsp; <b>Deductions</b></td>
    <td width="104">&nbsp; <b>Amount</b></td>
    <td width="104">&nbsp; <b>Balance</b></td>
    <td width="106" style="font-size: 18px;"><b>Net Amount</b></td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Basic Pay</td>
    <td width="94">&nbsp; <b>Rs. <?php echo $pay_basic; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; Absence</td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $ded_absense; ?></b></td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; </td>

    <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; House Allowance</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_house; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; Advance</td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $ded_adv; ?></b></td>
    <td width="93">&nbsp;  </td>
    <td width="101">&nbsp; </td></td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Conveyance All.</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_conv; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; Core Advance</td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $ded_core; ?></b></td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp;  </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Communication All.</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_comm; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; Phone / Other</td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $ded_other; ?></b></td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Technical Allowance</td>
    <td width="94">&nbsp; <b>Rs. <?php echo $pay_tech_all; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; Income Tax</td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $ded_income_tax; ?></b></td>
    <td width="93">&nbsp; <b>Rs. <?php echo $ytd_tax; ?></b></td>
    <td width="101">&nbsp; </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Medical Allowance</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_medical_all; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; </td>
    <td width="96">&nbsp; </td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; Salary Adjustment</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_adjust; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; </td>
    <td width="96">&nbsp; </td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=200px;">&nbsp; Leave Encashment/Arears</td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $pay_other; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp; </td>
    <td width="96">&nbsp; </td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; </td>
  </tr>

  <tr style="font-size:14; height:36px;">
    <td style="font-size: 18px;width=210px;">&nbsp; <b>Total Pay</b></td>
    <td width="94">&nbsp;  <b>Rs. <?php echo $total_pay; ?></b></td>
    <td style="font-size: 18px;width=175px;">&nbsp;  <b>Total Deduction</b></td>
    <td width="96">&nbsp;  <b>Rs. <?php echo $gross_ded; ?></b></td>
    <td width="93">&nbsp; </td>
    <td width="101">&nbsp; <b>Rs. <?php echo $net_pay; ?></b></td></td>
  </tr>
  </tr>
</table>  

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

            </div>
            <div class="col-md-3" style="margin-top: 5px;margin-bottom: -100px;">
			         <?php include '../marquee_title1.php';?>
			       </div>
			
          </div>  
        </div>  

      <?php   
        if(isset($_POST['submit']))
{

      header("Location: my_ytd_payslips.php?user=$user");
      
  }

  ?>

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