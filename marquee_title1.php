<?php
$venTotal=0; 
$payables=0;
$custTotal=0;
$receivables=0;
$balance_dr=0;
$balance_cr=0;
$balance=0;
$expenses=0;
$income=0;
$profit=0;
$liab=0;
$recable=0;
$amount_in=0;
$amount_out=0;
$amount1=0;
$amount2=0;
$amount11=0;
$amount12=0;
$cust_paid=0;
$code = 0;
$cash_in=0;
$cash_out=0;
$amount13=0;
$amount14=0;
$amount13A=0;
$amount14A=0;
$amount13B=0;
$amount14B=0;
$gain_loss=0;
$diff_lc=0;
  include 'connect.php';
?>
<style>
  #marquee_1 li {
    height: 34px;
    width: auto;
    line-height: 2.4;
    font-size: 10px;
    text-align: left;
    margin-left: 0;
    color: white;
  }

  .wrap-box {
    border: 1px solid white;
    margin: 8px;
    box-shadow: 1px 2px 3px 1px;
  }
</style>
<?php 
$star="";
$team_id=1;
$dept_id=2;
$desig_id=0;
$desig="";
$name="";
$fname="";
$lname='';
$team_name="";
$dept_name="";
$date=date('Y-m-d');
$amount_due=0;
$arr_unpaid = array();
$arr_partial = array();
$ser=0;
$dept_w=0;
$team_w=0;

  include 'connect.php'; 
 ?>

<marquee width="100%" height="675px" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
  <?php
  
   
    echo "</div>";

$get_dept = "select * from department ORDER BY deptt_id ASC;";
            $run_dept= mysqli_query($link,$get_dept);
      while ($dept_row=mysqli_fetch_array($run_dept)) 
      {
          $dept_name=$dept_row['deptt_name'];
          $dept_id=$dept_row['deptt_id'];


$get_team = "select * from teams where team_deptt = '$dept_id' ORDER BY team_deptt, team_id ASC;";
            $run_team= mysqli_query($link,$get_team);
            while ($team_row=mysqli_fetch_array($run_team)) 
        {

          $team_name=$team_row['team_name'];
          $team_id=$team_row['team_id'];

$get_emp = "select * from employee_record where employee_dept = '$dept_id' AND employee_team = '$team_id' ORDER BY employee_dept ASC;";
            $run_emp= mysqli_query($link,$get_emp);
        while ($emp_row=mysqli_fetch_array($run_emp)) 
        {

          $fname=$emp_row['employee_name'];
          $lname=$emp_row['last_name'];
          $desig_id=$emp_row['employee_desig'];
          $name=$fname . '' . $lname;

$get_dsg = "select * from employee_desig where desig_id= '$desig_id' ORDER BY desig_id ASC;";
            $run_dsg= mysqli_query($link,$get_dsg);
          while ($dsg_row=mysqli_fetch_array($run_dsg)) 
          {

            $desig=$dsg_row['title'];
          }

       
if ($dept_id != $dept_w) {
   $dept_w = $dept_id;

    echo "<div style='background-color:#e93c1f;padding-bottom:10px;padding-top:10px;margin-top:15px;'><h3 style='text-align:center;'><b>". $dept_name. "</b></h3>";

  }

  if ($team_id != $team_w) {
  $team_w = $team_id;
echo "<div class='wrap-box' style='margin:8px 0px; color:#fff;'>";
        echo  "<div style='color:blue;padding-left:10px; font-weight: 700; font-size: 16px;'><h3 style='text-align:center;'><b>$team_name</b></h3></div>";
}
     

       echo "<div style='color:white;padding-left:10px; font-weight: 700; font-size: 16px; padding-bottom: 7px;'>$name <span style='float: right; margin-right: 8px;'>$desig</span></div>";

     }

    }
  }
?>

</marquee>