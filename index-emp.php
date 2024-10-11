<?php 
include 'connect.php'; 
$user="";
if (isset($_GET['user'])) {
  $user=$_GET['user'];
}
$m=0;
$fleave="";
$eleave="";
$month=0;
$month_year="";
date_default_timezone_set('Asia/Karachi');
if (isset($_GET['ym'])) {
  $ym=$_GET['ym'];
}else{
  $ym=date('Y-m');
  $m=date('m');
}

/*if ($m==1 or $m==01) {
  $m_name="January' ";
}

if ($m==2 or $m==02) {
  $m_name="February' ";
}
if ($m==3 or $m==03) {
  $m_name="March' ";
}
if ($m==4 or $m==04) {
  $m_name="April' ";
}
if ($m==5 or $m==05) {
  $m_name="May' ";
}
if ($m==6 or $m==06) {
  $m_name="June' ";
}
if ($m==7 or $m==07) {
  $m_name="July' ";
}
if ($m==8 or $m==08) {
  $m_name="August' ";
}
if ($m==9 or $m==09) {
  $m_name="September' ";
}
if ($m==10 or $m==10) {
  $m_name="October' ";
}
if ($m==11) {
  $m_name="November' ";
}
if ($m==12) {
  $m_name="December' ";
}*/

// check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false) {
  $timestamp = time();
}

//today
$today = date('Y-m-d', time());
//for H3 title
$html_title = date('m / Y', $timestamp);
//create prev & next month link              mktime(hour,minute,second,month,day,year)
 $month= date('m');
 
if ($month=='01') { $month_year=" - January' " . date('Y'); }
if ($month=='02') { $month_year=" - February' " . date('Y'); }
if ($month=='03') { $month_year=" - March' " . date('Y'); }
if ($month=='04') { $month_year=" - April' " . date('Y'); }
if ($month=='05') { $month_year=" - May' " . date('Y'); }
if ($month=='06') { $month_year=" - June' " . date('Y'); }
if ($month=='07') { $month_year=" - July' " . date('Y'); }
if ($month=='08') { $month_year=" - August' " . date('Y'); }
if ($month=='09') { $month_year=" - September' " . date('Y'); 
}
if ($month=='10') { $month_year=" - October' " . date('Y'); }
if ($month=='11') { $month_year=" - November' " . date('Y'); }
if ($month=='12') { $month_year=" - December' " . date('Y'); }

$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

//no of days in a month
$html_title = "Calendar" . " ". $month_year;
$day_count = date('t', $timestamp);
//0:Sun, 1:Monday----
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

//create calendar
$weeks = array();
$week = '';

$week .= str_repeat('<td></td>', $str);
for ( $day = 1; $day <= $day_count; $day++, $str++){
  $date = $ym.'-' . $day;

$dayx=$date;
 $dayParts = explode("-" , $dayx);
$day1 = $dayParts[0];
$day2 = $dayParts[1];
$day3 = $dayParts[2];
if ($day3 < 10) {
  $date=$day1 . "-" . $day2 ."-0" . $day3;
}

$get_leave = "SELECT * FROM employee_leave_record WHERE leave_emp_id='$user' ORDER BY leave_emp_id ASC";

  $run_leave = mysqli_query($link, $get_leave) or die(mysqli_error($link));
  
    while($row=mysqli_fetch_array($run_leave))
      {
       $fleave=$row['from_date'];
       $eleave=$row['to_date'];
      }

  if ($today == $date) {
   $week .= '<td class="today">'.$day;
  }else if ($date >= $fleave AND $date <= $eleave){

      $week .= '<td class="leave">'.$day;

}else{
    $week .= '<td>' .$day;
  }

  $week .= '</td>';

  // End of week or month
  if ($str % 7 == 6 || $day == $day_count) {
    
    if($day == $day_count){
      //Add empty cell
    $week .= str_repeat('<td></td>', 6 - ($str % 7));
     
    }

    $weeks[] = '<tr>' .$week.'</tr>';

    //Prepare for new week
    $week = '';

  }

}
 
$supervisor=2;

if (isset($_GET['user'])) {
    $user=$_GET['user'];
}
  
$get_emp1 = "SELECT * FROM employee_record WHERE emp_team_lead='$user' OR employee_supervisor_id = '$user' OR emp_manager = '$user'";
    $run_emp1 = mysqli_query($link, $get_emp1);
      while ($emp1_row=mysqli_fetch_array($run_emp1)) 
    {
      $supervisor=1;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link  href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
<style>
  .container {
    font-family: "Noto Sans", sans-serif;
    margin-top: 80px;
  }

  th{
    height: 80px;
    text-align: center;
    font-weight: 700;
  }

  td{
    height: 80px;
  }
  .today{

    background: Orange;
  }
  .leave{

    background: #0096FF;
  }
  th:nth-of-type(7),td:nth-of-type(7){

    color: blue;
  }

  th:nth-of-type(1),td:nth-of-type(1){

    color: red;
  }
</style>
<title>DSC-Employee Center</title>
</head>
<?php include 'header.php';?>
<body>
<div class="">
	<?php include 'sidebar.php'; ?>

	
<div class="card_panel">
   <div class="col-md-7" style="margin-top: -40px;">
  
    <div class="container">
      <div class="row" style="background-color: #0096FF; width: 850px;">
  <h3 style="color: white;"><a href="?ym=<?php echo $prev; ?>&user=<?php echo $user; ?>">&lt;</a><?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>&user=<?php echo $user; ?>">&gt;</a></h3>
</div>
  <br>
  <table class="table table-bordered" style="width: 825px; font-size: 30px;">

  <tr>
    <th>S</th>
    <th>M</th>
    <th>T</th>
    <th>W</th>
    <th>T</th>
    <th>F</th>
    <th>S</th>
  </tr>
  <?php
    foreach ($weeks as $week){
     echo $week;
    }
  ?>
</table>
</div>
  </div>      
   </div>
<div class="col-md-3 marqeeDiv">
	<?php include 'marquee_title.php';?>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>