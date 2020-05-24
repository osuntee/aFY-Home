<?php


function isSqlSafe($st){
include('dbconnect.php');
$nuST = trim(htmlentities(strip_tags($st)));

if (get_magic_quotes_gpc())
$nuST = stripslashes($nuST);

$nuST = mysqli_real_escape_string($con,$nuST);
return $nuST;
}

function remove_blank($wrd){
$uST = preg_replace('/\s+/', '_', $wrd);
return $uST;
}






?>