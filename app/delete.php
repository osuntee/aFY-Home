<?php
include ('includes/dbconnect.php');
//error_reporting(0);
session_start();


if (isset($_REQUEST['appliance_id'])) {$appliance_id = $_REQUEST['appliance_id'];}
else{header("Location: ../index.php");}





$appliance_id=$_REQUEST['appliance_id'];


$appliance_id=$_REQUEST['appliance_id'];
$date_time  =date('Y-m-d H:i:s');
$name=get_app_info("name",$appliance_id);
$energy=get_app_info("energy",$appliance_id);
$activity= '<p style="color:red;">'.$name.' was deleted from appliances <small>'.$date_time.'</small><b>-'.$energy.'</b></p>';

 
mysqli_query($con, "INSERT INTO `log`(`activity`, `energy`, `date_time`, `appliance_id`) VALUES ( '$activity','$energy','$date_time','$appliance_id')");
mysqli_query($con, "DELETE FROM `appliances` WHERE `appliance_id`='$appliance_id'"); 
mysqli_query($con, "DELETE FROM `log` WHERE `appliance_id`='$appliance_id'"); 




echo '<script>window.location.href="../appliances.php";</script>';




?>