<head>
<link rel="stylesheet" href="style12.css">
          
    </head>

<?php
$level=0;
include 'connect.php';
if (isset($_GET['user'])) {
   $user=$_GET['user'];
}
  $get_user = "SELECT * FROM user WHERE user_emp_id='$user' ORDER BY user_emp_id ASC LIMIT 1";

  $run_user = mysqli_query($link, $get_user) or die(mysqli_error($link));
  
    while($row=mysqli_fetch_array($run_user))
      {
       $level=$row['level'];
       
      }

?>

<div class="col-md-2" style="margin-top: 2px; padding:0; height: 1000px">
		<div class="nav-side-menu">
<div class="row">&nbsp; </div>
   <div class="brand"><img src="../images/empcntr-new.png" /></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      <div class="row">&nbsp; </div>
        <div class="menu-list">
          <ul id="menu-content" class="menu-content collapse out">
            <li>
             <a href="#">
<i class="fa fa-dashboard fa-lg"></i><img src="../images/db.png" />
             </a>
            </li>
	
     <li  data-toggle="collapse" data-target="#">
      <a href="../index.php"><i class="fa fa-home fa-lg"></i><b> Home Page </b></a>
                    
    </li> 
        
  <li  data-toggle="collapse" data-target="#" class="collapsed">
    <a href="my_profile.php?user=<?php echo $user;?>"><i class="fa fa-book fa-lg"></i><b>My Profile </b></a>
                   
    </li>
                        
    <li  data-toggle="collapse" data-target="#sales3" class="collapsed"><a href="my_att_period.php?user=<?php echo $user;?>"><i class="fa fa-user fa-lg"></i><b> My Attendance</b></a>
    </li>

   <li  data-toggle="collapse" data-target="#sales" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b>My Leaves</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales">

    <li><a href="my_leave_status.php?user=<?php echo $user;?>">Leave Status</a></li>

    <li><a href="my_leave_application_form.php?user=<?php echo $user;?>">My Leave Application</a></li>
         
     </ul>
    </li>

     <li  data-toggle="collapse" data-target="#sales5" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b> My Appraisals</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales5">

    <li><a href="appraisal_form.php?user=<?php echo $user;?>">Appraisals Form</a></li>

    <li><a href="appraisal_status.php?user=<?php echo $user;?>">Appraisals Status</a></li>
         
     </ul>
    </li>

<li  data-toggle="collapse" data-target="#sales4" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b>My Travel</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales4">

        <li><a href="my_travel_request.php?user=<?php echo $user;?>">My Travel Request</a></li>
         
         <li><a href="travel_status_for_recomm.php?user=<?php echo $user;?>">Supervisor's Recommendation</a></li>

         <li><a href="travel_budget_approval.php?user=<?php echo $user;?>">Travel Budget Approval</a></li>

         <li><a href="travel_status.php?user=<?php echo $user;?>">Travel Status</a></li>

         <li><a href="booking_status.php?user=<?php echo $user;?>">Booking Status</a></li>

  <li><a href="travel_booking.php?user=<?php echo $user;?>">Travel Booking</a></li>

  <li><a href="travel_status_final.php?user=<?php echo $user;?>">Final Status</a></li>

          </ul>
        </li>
   <li data-toggle="collapse" data-target="#" class="collapsed">
         <a href="my_ytd_payslips.php?user=<?php echo $user;?>"><i class="fa fa-bar-chart fa-lg"></i><b>My Payslips </b></a>  
          </li>

       <!--li><a href="my_center/my_appraisals.php?user=<?php echo $user;?>"><i class="fa fa-user fa-lg"></i>My Appraisals</a></li>
</li-->

 

<!--?php } ?-->
    </ul>
   </li>          
  </div>
</div>
</div>






