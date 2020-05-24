<?php
include ('includes/dbconnect.php');


$query=mysqli_query($con, "SELECT SUM(`energy`) AS energy , SUM(`time_on`) AS time_on FROM `appliances` WHERE `time_on`!=0");
$rows = mysqli_fetch_assoc($query);

$total_energy=$rows['energy'];
$total_time=$rows['time_on'];


$c_p=$total_energy/$total_time;


$date_time  =date('Y-m-d H:i:s');
$activity= '<p style="color:black;">'.$c_p.' been consumed per hour <small>'.$date_time.'</small></p>';
$energy=0;
$appliance_id=0;
 
mysqli_query($con, "UPDATE `fiyin`.`appliances` SET `time_on` = `time_on` + 3600 WHERE `status`='1'");
mysqli_query($con, "INSERT INTO `log`(`activity`, `energy`, `date_time`, `appliance_id`) VALUES ( '$activity','$energy','$date_time','$appliance_id')");



echo $c_p;

?>
