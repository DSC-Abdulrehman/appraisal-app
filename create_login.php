<?php require "connect.php";

// $empno="";
// $desig_code="";
// $desig_title="";

function showErrorAndRedirect($message) {
	echo "<script type='text/javascript'>alert('$message');
	window.location.href='create_login.php';
	</script>";
}

function showSuccessMsgAndRedirect($message) {
	echo "<script type='text/javascript'>alert('$message');
	window.location.href='index.php';
	</script>";
}

function checkUsername($link, $username) {
	$check = " SELECT * FROM user WHERE user_name = '$username' ";
	$rs    = mysqli_query($link,$check);
	$data  = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 0) {
		return false;
	} else {
		return true;
	}
}

function checkEmail($link, $email) {
	$check=" SELECT * FROM user WHERE email = '$email' ";
	$rs = mysqli_query($link,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 0) {
		return false;
	} else {
		return true;
	}
}

function checkEmpno($link, $empno) {
	$check=" SELECT * FROM user WHERE user_emp_id = '$empno' ";
	$rs = mysqli_query($link,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 0) {
		return false;
	} else {
		return true;
	}
}

// Parse the login form if the user has filled it out and pressed "register"
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$username  = $_POST["username"];
	$email     = $_POST["email"];
	$password  = $_POST["password"];
	$password1 = $_POST["password1"];
	echo "<script>alert(".$username." ".$email." ".$password." ".$password1.")</script>";
	
	$empno = '';
	$desig_title = '';

	$allowInsertion = true;

	if ($_POST["empno"]) {
		$empno = $_POST["empno"];
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$message = "Invalid Email Format!";
		$allowInsertion = false;
		showErrorAndRedirect($message);
	}

	if ($password != $password1) {
		$message = "Passwords does not Match Retry! ";
		$allowInsertion = false;
		showErrorAndRedirect($message);
	}

	$md5pass  = md5($password);
	$sha1pass = sha1($md5pass);

	$statusUsername = checkUsername($link, $username);
	$statusEmail    = checkEmail($link, $email);

	//if false means username is duplicate, if true means not duplicate
	
	if ($statusUsername == false || $statusEmail == false) {
		//one of username or email is duplicate
		$statusUsername==false ? $target="Username" : $target="Email";
		$message = "Such ".$target." Already Exists, Try another one!";
		showErrorAndRedirect($message);
	} else {

		//both username and email are valid
		//now check empno

		if ($empno != '') {
			
			$statusEmpno = checkEmpno($link, $empno);
			if ($statusEmpno == false) {
				//empno is duplicate
				$message = "Such Employee ID Already Exists, Try another one!";
				showErrorAndRedirect($message);
			} else {
				//after valid empno, username, email
				//valid means unique
				$query = " SELECT employee_desig FROM employee_record WHERE employee_id='$empno' LIMIT 1 ";
				$sql   = mysqli_query($link, $query);
				$existCount = mysqli_num_rows($sql);
				if($existCount == 1 ) {
					$row=mysqli_fetch_array($sql);
					$desig_code = $row["employee_desig"];
					$query = "SELECT title FROM employee_desig WHERE desig_id = '$desig_code'";
					$sql = mysqli_query($link, $query);
					$existCount = mysqli_num_rows($sql);
					if($existCount == 1 ) {
						$row=mysqli_fetch_array($sql);
						$desig_title=$row["title"];
					}
				}

				$query = "INSERT INTO user(user_emp_id, user_name, user_position, email, password) VALUES('$empno','$username','$desig_title','$email','$sha1pass')";
			}
		} else {
			$query = "INSERT INTO user(user_name, email, password) VALUES('".$username."','".$email."','".$sha1pass."')";
		}

		// $query = "INSERT INTO user(user_emp_id, user_name, user_position, email, password) VALUES('$empno','$username','$desig_title','$email','$sha1pass')";

		// echo $empno."<br>";
		// echo $query."<br>";
		// echo $allowInsertion==true ? " true " : " false ";
		// echo mysqli_query($link, $query)==true ? " true " : mysqli_error($link);
		// exit;

		if ($allowInsertion == true && mysqli_query($link, $query)) {
			$message = "Registration successfull! ";
			showSuccessMsgAndRedirect($message);
		} else {
			$message = "Error occured in Registration! Please try again ";
			showErrorAndRedirect($message);
		}
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DS-MANAGEMENT</title>
	<meta name="description" content="Sufee Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="apple-icon.png">
	<link rel="icon" href="logo.png" sizes="32x32">

	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/flag-icon.min.css">
	<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
	<link rel="stylesheet" href="assets/scss/style.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.min.css">

	<link href="assets/css/jqvmap.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


	<style>
	body{
		background-color: #dfdede !important;
	}
	.register_form{margin-top: 100px;
		box-shadow: 5px 5px 5px gray !important;
	}
	.panel-heading{background-color: #e9770f !important;
		font-weight: bold !important;
		color: white;
	}
	.register_button{background-color: #e9770f !important; 
		color:white !important;
		font-size: 16px !important;
	}
	.register_front{margin-top: 100px}
</style>
</head>
<body>

	<?php include 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 login_form">
				<div class="panel register_form">
					<div class="panel-heading">
						<h4 class="panel-title">Register Now</h4>
					</div>

					<div class="panel-body">
						<form id="form1" name="form1" method="post" action="create_login.php">
							<div class="row" style="overflow:hidden; margin-bottom:15px;">
								<div class="col-sm-12">
									<label style="font-size:14px">User Name</label>
									<input class="form-control" name="username" type="text" id="username" required /> 
								</div>
							</div>

							<div class="row" style="overflow:hidden; margin-bottom:15px;">
								<div class="col-sm-12">
									<label style="font-size:14px">User Email</label>
									<input class="form-control" name="email" type="email" id="email" required/>
								</div>
							</div>


							<div class="row" style="overflow:hidden; margin-bottom:15px;">
								<div class="col-sm-12">
									<label style="font-size:14px"> &nbsp; Employee No </label>
								</div>
								<div class="col-sm-12" style="width:300px">
									<input class="form-control" name="empno" type="text" id="empno" /> 
								</div>
							</div>

							<div class="row" style="overflow:hidden; margin-bottom:15px;">
								<div class="col-sm-12">
									<label style="font-size:14px">Password:</label>
									<input class="form-control" name="password" type="password" id="password" pattern=".{4,}"   required title="4 characters minimum"/> 
								</div>
							</div>

							<div class="row" style="overflow:hidden; margin-bottom:15px;">
								<div class="col-sm-12">
									<label style="font-size:14px">Confirm Password:</label>
									<input class="form-control" name="password1" type="password" id="password1" pattern=".{4,}"   required title="4 characters minimum"/>
								</div>
							</div>

							<div class="row">&nbsp; </div>
							<div class="col-sm-8 col-sm-offset-2">
								<input type="submit" class="form-control register_button" value="REGISTER" />
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-12">
				<div class="register_front">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 image-text" style="position:absolute;">
						<?php include "calendar.php"; ?>
					</div>

				</div>
			</div>

		</div><!-- /.navbar-collapse -->
	</div>

	<!-- end of main_content -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	<!-- end of main_container -->
</body>
</html>



