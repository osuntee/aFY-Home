<?php
include ('includes/dbconnect.php');




$date_time  =date('Y-m-d H:i:s');
$activity= '<p style="color:yellow;">A reset  was carried out <small>'.$date_time.'</small></p>';
$energy=0;
$appliance_id=0;
 
mysqli_query($con, "UPDATE `appliances` SET `status`='0'");
mysqli_query($con, "INSERT INTO `log`(`activity`, `energy`, `date_time`, `appliance_id`) VALUES ( '$activity','$energy','$date_time','$appliance_id')");


echo '<script>window.location.href="../appliances.php";</script>';



?>
