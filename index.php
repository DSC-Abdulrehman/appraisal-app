<?php include"connect.php";

$yearArray = range(2020, 2060);
$level="";
$user="";
$email="";
$month="";
$year="";
$emp_id="";
$user_name="";

// Parse the login form if the user has filled it out and pressed "Login"
if(isset($_POST["username"])&&isset($_POST["password"])){
 $manager=preg_replace('#[^A-Za-z0-9@.]#','',$_POST["username"]);//filter every thing but numbers & letters
  $email=preg_replace('#[^A-Za-z0-9@.]#','',$_POST["email"]);//filter every thing but numbers & letters
  $password=preg_replace('#[^A-Za-z0-9@.]#','',$_POST["password"]);//filter every thing but numbers & letters
 $md5pass=md5($password);
 echo $sha1pass=sha1($md5pass);
$sql=mysqli_query($link, "SELECT * FROM user WHERE email='$email' Limit 1"); //query the person
//------MAKE SURE PERSON EXISTS IN DATABASE----
  $existCount=mysqli_num_rows($sql);//count row nums
if($existCount>0){//Evaluate the count
	while($row=mysqli_fetch_array($sql)){
		 $id=$row["user_id"];
		 $user=$row["user_name"];
		 $emp_id=$row["user_emp_id"];
		 $email=$row["email"];
		$level=$row["level"];
		//$emp_id="DSC-013";
	}
	
}
else
{
	
	echo "Your Record not found, Pl first create your login!";
	exit();
}

header("location:index-emp.php?user=$emp_id");

}

?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DSC-Employee Center</title>
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
	
	<link href="assets/bootstrap.min.css" rel="stylesheet">
	<link href="assets/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">   
	<style>
	body{
		background-color: #dfdede !important;
	}
	.login_panel{
		margin-top:100px;
		box-shadow: 5px 5px 5px gray !important;
	}
	.card_panel{
		margin-top:100px;
	}
	.login_form_li2{    
		list-style: none !important;
	}
	.login_form_li2 a{
		color:white;
	}
	a:hover{
		font-weight: unset !important;
		font-style: unset !important;
		color: #203446 !important; 
		text-decoration: none !important;
	}
	.panel_list{list-style: none;
		font-size: 15px !important;
	}
}
.login_form_li1{
	float:left !important;

}
.panel-heading{background-color: #d48237f0 !important;
	text-align: center !important;
	font-weight: bold !important;
	color: white;
}
.btn-info{background-color: #e9760f !important;
	border-color: #e9760f !important;}
	.submit_button{float: right;
	}
	.submit_button:hover{color: #203446 !important;}
	.card{margin-right: 0px !important;}
	.image-text{
		padding-left: 0px !important;
		padding-right: 0px !important;
		padding-bottom: 0px !important;
	}
	.ds_management_heading{/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#6db3f2+0,1e69de+0,1e69de+0,54a3ee+50,3690f0+97,3690f0+97 */
		background: #6db3f2; /* Old browsers */
		background: -moz-linear-gradient(top, #6db3f2 0%, #1e69de 0%, #1e69de 0%, #54a3ee 50%, #3690f0 97%, #3690f0 97%); /* FF3.6-15 */
		background: -webkit-linear-gradient(top, #6db3f2 0%,#1e69de 0%,#1e69de 0%,#54a3ee 50%,#3690f0 97%,#3690f0 97%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to bottom, #6db3f2 0%,#1e69de 0%,#1e69de 0%,#54a3ee 50%,#3690f0 97%,#3690f0 97%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6db3f2', endColorstr='#3690f0',GradientType=0 ); /* IE6-9 */}
	.login_fonts_label{font-size: 12px !important;}

</style>

</head>
<?php include 'header.php';?>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 login_form">
				<div class="panel login_panel">
					<div class="panel-heading">
						<ul class="panel_list">
							<li class="login_form_li1">Member Login</li>
		<!-- <li class="login_form_li2">
		<a href="create_login.php">Create Login</a>
	</li> -->
</ul>
</div>
<div class="panel-body management_page">
	<form id="form1" name="form1" method="post" action="index.php">
		<div class="row" style="overflow:hidden; margin-bottom:15px;">
			<div class="col-sm-12">
				<label style="font-size:14px">User Name </label>
				<input class="form-control" name="username" type="text" id="username"  placeholder="Pl Give your ID / Name here!"> 
			</div>
		</div>

		<div class="row" style="overflow:hidden; margin-bottom:0px;">
			<div class="col-sm-12">
				<label style="font-size:14px">User Email</label>
				<input class="form-control" name="email" type="text" id="email"> 
			</div>			  
		</div>
		<div class="row">&nbsp; </div>
		<div class="row" style="overflow:hidden; margin-bottom:15px;">
			<div class="col-sm-12"> 
				<label style="font-size:14px">Password</label>
				<input class="form-control" name="password" type="password" id="password">
			</div> 
		</div>
		<div class="row">&nbsp; </div>
		
		<div class="row">
			<div class="col-sm-6">
				<li class="login_form_li2">
					<a href="create_login.php" class="btn btn-info btn-md" role="button">Register</a>
				</li>
			</div>
			<div class="col-sm-6">
				<input type="submit" class="submit_button btn btn-info btn-md"  value="submit">
			</div>				
		</div>
	</form>

</div>
</div>
</div>

<div class="col-lg-9 col-md-8 col-sm-12">
	<div class="card_panel">
		
			<div class="col-md-8" style="margin-top: 10px;"><img src="images/ds-banner-image22.png" style="width: 100%; height: 87vh"></div>
             
      </div>

<div class="col-md-4 marqeeDiv">
	<?php include 'marquee_title.php';?>
  
</div>

    </div>

  </div>
</div>
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/jquery.timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/common.js"></script>

<script>

</script>

</body>
</html>
