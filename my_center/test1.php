 <?php
$a=0;
$user="";
$desg_id=0;
$stat="";
$emp="";
$wk_from_date="";
$wk_to_date="";
$wk_date_applied="";
$description="";
$leave_type_id=0;
$wk_days=0;
$wk_leave_bal=0;
include_once("connect.php");
if (isset($_POST['update'])) {
 echo   $stat=$_POST['stat'];
  
}
if (isset($_GET['wk_id'])) {
   echo $wk_id=$_GET['wk_id'];
}
if (isset($_GET['user'])) {
   echo $user=$_GET['user'];
}
if (isset($_GET['emp'])) {
    echo $emp=$_GET['emp']; 
}
if (isset($_GET['desig_id'])) {
   $desg_id=$_GET['desig_id']; 
}
if (isset($_GET['wk_from_date'])) {
  echo $wk_from_date=$_GET['wk_from_date']; 
}
if (isset($_GET['wk_to_date'])) {
   $wk_to_date=$_GET['wk_to_date']; 
}

//$get_tbl = "SELECT * FROM leave_work_table";

 // $run_tbl = mysqli_query($link, $get_tbl);
     // while ($tbl_row=mysqli_fetch_array($run_tbl)) 
    //{
     // $wk_from_date=$tbl_row['wk_from_date'];

    // }
 
      $sql=mysqli_query($link, "UPDATE leave_work_table SET 
              
       wk_status='$stat',
       wk_date=NOW(),
       wk_authority='$user',
       wk_desig='$desg_id'
            

       WHERE id='$wk_id'")  or die(mysqli_error($link));

      $get_tbl = "SELECT * FROM leave_work_table WHERE wk_id='$emp' AND wk_from_date='$wk_from_date' AND wk_to_date='$wk_to_date'";

  $run_tbl = mysqli_query($link, $get_tbl);
      while ($tbl_row=mysqli_fetch_array($run_tbl)) 
    {

      echo "BBBBBBBBB";
      $wk_date_applied=$tbl_row['wk_date_applied'];
      $description=$tbl_row['wk_reason'];
      $leave_type_id=$tbl_row['wk_type'];
      $wk_days=$tbl_row['wk_days'];
      $wk_leave_bal=$tbl_row['wk_leave_bal'];


  if ($stat== 'Recommended' OR $stat== 'recommended') {
  $sql1=mysqli_query($link, "INSERT INTO employee_leave_record SET leave_emp_id='$emp',date_applied='$wk_date_applied',description='$description',leave_type='$leave_type_id',from_date='$wk_from_date',to_date='$wk_to_date',no_of_days='$wk_days',leave_balance='$wk_leave_bal',status='$stat',recomm_date=NOW(),recommended_by='$user'") or die(mysqli_error($link));
}

   if ($stat== 'Declined' OR $stat== 'declined' OR $stat== 'Approved' OR $stat== 'approved') {
echo "AAAAAAAAAAA" . $stat;
  $sql1=mysqli_query($link, "UPDATE employee_leave_record SET leave_emp_id='$emp',date_applied='$wk_date_applied',description='$description',leave_type='$leave_type_id',from_date='$wk_from_date',to_date='$wk_to_date',no_of_days='$wk_days',leave_balance='$wk_leave_bal',status='$stat',approve_date=NOW(),approved_by='$user' 

    WHERE leave_emp_id='$emp' AND date_applied='$wk_date_applied'") or die(mysqli_error($link));


$sql = "DELETE FROM leave_work_table WHERE id='$wk_id'" or die(mysqli_error($link));

    }
     
 }
echo '<script>alert("Successfully Updated")</script>';
 header("Location: my_leave_status.php?user=$user");
 ?>