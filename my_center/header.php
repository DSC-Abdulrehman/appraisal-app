<?php
include_once("connect.php");
$xyz="";
if (isset($_GET['user'])) {
    $user=$_GET['user'];

}
  $get_emp_details = "SELECT * FROM employee_record WHERE employee_id='$user'";
        $run_emp_details = mysqli_query($link, $get_emp_details);
while ($emp_row=mysqli_fetch_array($run_emp_details)) 
        {
    $xyz= $emp_row['employee_name'] . ".jpg";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script type="text/javascript" src="http://tajs.qq.com/stats?sId=15910806" charset="UTF-8"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
.show .dropdown-menu, .open .dropdown-menu{top:32px !important;}
</style>
</head bgcolor="#008000">
<body">
  <header id="header" class="header">
  <div class="header-menu">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #2e353d;">
        
      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" style="margin-top: -10px; margin-left: -30px;">
        <a class="navbar-brand" href="#"><img src="../images/DSC-Logo-2018-2.png" alt="Logo"></a>
      </div>

      <div class="col-lg-8 col-md-6 col-sm-5 col-xs-12 headerMenues">

          <a class="navbar-brand" href="index.php">Home</a>
          <a class="navbar-brand" href="#">About Us</a>
          <a class="navbar-brand" href="#">Contact</a>
		  <a class="navbar-brand" href="#">Go Back</a>
        
 </div>
 	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
		<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                <img alt="" class="img-circle" src="images/avatar3_small.jpg">
                                <span class="username username-hide-on-mobile"><img src="images/<?php echo $xyz; ?>" style="width: 60px; height: 50px"></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                               
                                <li>
                                    <a href="#">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>Log Out </a>
                                </li>
                            </ul>
                        </li>
	</div>
</div>

 </div>
</header>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

</body>
</html>