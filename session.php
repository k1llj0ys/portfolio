<?php
include('constant/config.php');
include('login-check.php');

$user_check=$_SESSION['user'];
$ses_sql=mysqli_query($conn,"SELECT name FROM tbl_admin where name='$user_check'");
$rowses=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$rowses['name'];

if(!isset($loggedin_session) && $loggedin_session==NULL) {
 echo "Go back";
 header('location:'.SITEURL.'login.php');
}
?>