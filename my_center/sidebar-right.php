<head>
<link rel="stylesheet" href="style12.css">
        
        
    </head>
<?php

if (isset($_GET['user'])) {

   $user=$_GET['user'];
}

?>

<div class="col-md-2" style="margin-top: 5px; padding:0">
		<div class="nav-side-menu">
<div class="row">&nbsp; </div>

    <div class="brand"></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="row">&nbsp; </div>
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
<i class="fa fa-dashboard fa-lg"></i><img src="images/dboard.png" />
                  </a>
                </li>
				
				 <li  data-toggle="collapse" data-target="#">
                <a href="index.php"><i class="fa fa-home fa-lg"></i><b> Home Page </b></a>
                    
             </li>
				<li  data-toggle="collapse" data-target="#sales2" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i> Human Resource <span class="arrow"></span></a>
          <ul class="sub-menu collapse" id="sales2">
            <li><a href="hr_new_employee_record.php">Create New Employee Record</a></li>

            <li><a href="hr_select_basic_pay.php">Salary Creation</a></li>

            <li><a href="hr_emp_rec_edit_update.php?user=<?php echo $user;?>">Edit / Update</a></li>

            <li><a href="hr_view_emp_rec.php?user=<?php echo $user;?>">Employee's Record View</a></li>
            <li><a href="create_hr_appraisals.php">Employees Appraisals Creation</a></li>
            
          </ul>
        </li>
				 
        <li><a href="bank_details.php?user=<?php echo $user;?>"><i class="fa fa-bank fa-lg"></i><b>Bank Details</b></a></li>

        <li><a href="view_bankt.php"><i class="fa fa-low-vision fa-lg"></i><b>Loan Details</b></a></li>

        <li  data-toggle="collapse" data-target="#salesx" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i> Payroll Processing <span class="arrow"></span></a>
          <ul class="sub-menu collapse" id="salesx">
            <li><a href="payroll_periods_list.php?user=<?php echo $user;?>">Run Payroll</a></li>
            <li><a href="hr_pay_initial_pickup.php">Initial Pickup</a></li>           
          </ul>
        </li>
       
        <li  data-toggle="collapse" data-target="#sales1" class="collapsed"><a href="#"><i class="fa fa-user fa-lg"></i> Appraisals <span class="arrow"></span></a>
          <ul class="sub-menu collapse" id="sales1">
            <li><a href="index-appraisal_form.php?user=<?php echo $user;?>">Subordinates Appraisals</a></li>

          <li><a href="select_my_appraisals.php?user=<?php echo $user;?>">My Appraisals</a></li>

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