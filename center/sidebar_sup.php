<head>
<link rel="stylesheet" href="style12.css">
          
    </head>

<?php

if (isset($_GET['user'])) {
   $user=$_GET['user'];
}

?>

<div class="col-md-2" style="margin-top: 2px; padding:0">
		<div class="nav-side-menu">
<div class="row">&nbsp; </div>
   <div class="brand"><img src="images/empcntr-new.png" /></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      <div class="row">&nbsp; </div>
        <div class="menu-list">
          <ul id="menu-content" class="menu-content collapse out">
            <li>
             <a href="#">
<i class="fa fa-dashboard fa-lg"></i><img src="images/db.png" />
             </a>
            </li>
				
				 <li  data-toggle="collapse" data-target="#">
          <a href="index.php"><i class="fa fa-home fa-lg"></i><b> Home Page </b></a>
                    
          </li>

    <li  data-toggle="collapse" data-target="#sales" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b>Profiles</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales">
        <li  data-toggle="collapse" data-target="#" class="collapsed">
    <a href="./my_center/my_profile.php?user=<?php echo $user;?>"><i class="fa fa-book fa-lg"></i><b>My Profile </b></a>
                   
    </li>

  <li><a href="employees_profile.php">Employees Profile</a></li>
          </ul>
        </li>

				
	 <li  data-toggle="collapse" data-target="#sales1" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b>Attendance</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales1">
				                
    <li><a href="./my_center/my_att_period.php?user=<?php echo $user;?>"><i class="fa fa-user fa-lg"></i><b>MY Attendance</b></a>
    </li>

    <li><a href="emp_att_period.php?user=<?php echo $user;?>"><i class="fa fa-user fa-lg"></i><b>Employees Attendance</b></a>
    </li>
      </ul>
    </li>
    <li  data-toggle="collapse" data-target="#sales3" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b>Leaves Position</b><span class="arrow"></span></a>
      <ul class="sub-menu collapse" id="sales3">

        <li><a href="./my_center/my_leave_status.php?user=<?php echo $user;?>">My Leave Status</a></li>

        <li><a href="employees_leave_status.php">Employees Leave Status</a></li>

        <li><a href="./my_center/my_leave_application.php?user=<?php echo $user;?>">My Leave Application</a></li>
          </ul>
        </li>

          <li><a href="bank_details.php?user=<?php echo $user;?>"><i class="fa fa-bank fa-lg"></i><b>My Bank Details</b></a></li>

          <li><a href="view_bankt.php"><i class="fa fa-low-vision fa-lg"></i><b>Loan Details</b></a></li>

   <li data-toggle="collapse" data-target="#" class="collapsed">
         <a href="my_ytd_payslips.php?user=<?php echo $user;?>"><i class="fa fa-bar-chart fa-lg"></i><b>My Payslips </b></a>  
          </li>
            
        <li  data-toggle="collapse" data-target="#sales2" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i><b> Appraisals </b><span class="arrow"></span></a>
          <ul class="sub-menu collapse" id="sales2">
            <li><a href="select_appraisals_period.php?user=<?php echo $user;?>">My Subordinates Appraisals</a></li>
            <li><a href="select_appraisals_period.php">Create Subordinates Appraisals</a></li>
            <li><a href="my_appraisals.php?user=<?php echo $user;?>">My Appraisals</a></li>

            <li><a href="sign2_my_appraisal.php?user=<?php echo $user; ?>&yy_prev=<?php echo $yy_prev; ?>&yy_curr=<?php echo $yy_curr; ?>">Employee Signatures</a></li>

            <li><a href="select_manager_appraisals.php?user=<?php echo $user;?>">Manager's Signatures</a></li>
            <li><a href="select_hr_appraisals.php?user=<?php echo $user;?>">Manager Human Resource</a></li>
            <li><a href="select_auth_appraisals.php?user=<?php echo $user;?>">Competent Authority</a></li>
          </ul>
        </li>
    </ul>
   </li>          
  </div>
</div>
</div>