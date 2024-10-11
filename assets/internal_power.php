<?php 
if ($level < 50)
{
	  echo "Access Denied, Pl contact Administrator !";
	  exit();
	}
	else
	{
	
		if ($level > 89)
		{
			if ($system == "hr")
			{
			header("location:ds_hr/index.php?user=$user&email=$email&level=$level");
			}
			else if ($system == "pay")
			{
				//this header location is executed after successful login
				//$_SESSION['admin'] = $user;
			header("location:ds_payroll/index.php?user=$user&email=$email&level=$level");
			}
			else if ($system == "leave")
			{
			header("location:ds_leave/index.php?user=$user&email=$email&level=$level");
			} 
			else
			{
			header("location:ds_attendance/index.php?user=$user&email=$email&level=$level");
			}
		}
		
		if ($level > 79 AND $level < 90)
		{
			if ($system == "pay")
			{
			header("location:ds_payroll/index.php?user=$user&email=$email&level=$level");
			}
			else if ($system == "leave")
			{
			header("location:ds_leave/index.php?user=$user&email=$email&level=$level");
			} 
			else
			{
			echo "You are not Authorize to access Attendance System";
			exit();
			}
		}
		
		if ($level > 69 AND $level < 80)
		{
			if ($system == "leave")
			{
			header("location:ds_leave/index.php?user=$user&email=$email&level=$level");
			}
			else if ($system == "att")
			{
			header("location:ds_attendance/index.php?user=$user&email=$email&level=$level");
			} 
			else
			{
			echo "You are not Authorize to access Payroll System";
			exit();
			}
		}
		
		if ($level > 49 AND $level < 70)
		{
			 if ($system == "att")
			{
			header("location:ds_attendance/index.php?user=$user&email=$email");
			} 
			else if ($system == "leave")
			{
			header("location:ds_leave/index.php?user=$user&email=$email");
			} 
			else
			{
			echo "You are not Authorize to access Payroll System";
			exit();
			}
		}
	}

}
?>
