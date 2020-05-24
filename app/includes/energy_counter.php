<?php
include ('dbconnect.php');
include ('func.php');
//error_reporting(0);

$query=mysqli_query($con, "SELECT SUM(`energy`) AS energy FROM `appliances` WHERE `status`=1");
$rows = mysqli_fetch_assoc($query);


$count =mysqli_num_rows($query);
$energy_count=0.01;
if($count>0){
$energy_count=$rows['energy'];
}
//echo $count;

//$res = ['energy_count'=>$energy_count];

//	echo $res['followers'];

//$result = json_encode($res);

echo $energy_count;





?>

