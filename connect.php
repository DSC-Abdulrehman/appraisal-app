<?php
ob_start();
	$db_host="127.0.0.1";
	$db_username="root";
	$db_pass="";
	$db_name="dsc-management";
	$link = mysqli_connect("$db_host","$db_username","$db_pass") or die("Connection failed.");
	mysqli_select_db($link,$db_name) or die("Database not found");
?>