<?php


/*Default time zone ,to be able to send mail */
date_default_timezone_set('UTC');


$con = @mysqli_connect("localhost", "root", "","fiyin");



// if (!$con) {
// trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
// echo "couldnt";
// }
// else{echo "connected";}

function get_app_info($what,$id){
global $con;
$query= mysqli_query($con,"SELECT *FROM appliances WHERE `appliance_id` = '$id'");
$row=mysqli_fetch_array($query);
$result=$row[$what];
return $result;
}


function get_messages($id){
$messages_="";
global $con;
$query= mysqli_query($con,"SELECT *FROM message WHERE `to_id` = '$id'");
$users_count= mysqli_num_rows($query);
if($users_count<1){$messages_.= "<p style='color:black;'>No Message Found On Database</p>";}
else{
while($users_rows = mysqli_fetch_assoc($query)){
$message_id=$users_rows['message_id'];
$subject=$users_rows['subject'];
$message=$users_rows['message'];
$from_id=$users_rows['from_id'];
$to_id=$users_rows['to_id'];
$date_time=$users_rows['date_time'];
$read_status=$users_rows['read_status'];
$picture=get_user_info("picture",$from_id);
$name=get_user_info("name",$from_id);
$date_ = date('d-m-y', strtotime($date_time));
$time_ = date('g:i A', strtotime($date_time));


$messages_.='<li><a href="#">
<div class="user_img"><img src="'.$picture.'" alt="No Image" style="height:50px;width:50px;"></div>
<div class="notification_desc">
<h6>'.$name.'</h6>
<p>'.$subject.'</p>
<p><span>'.$date_ .'( '.$time_.' )</span></p>
</div>
<div class="clearfix"></div>
</a>
</li>';
}

}

return $messages_;
}

function get_assignments($id){
$messages_="";
global $con;
$query=mysqli_query($con, "SELECT * FROM assignment WHERE department ='$department' AND DATE(`date_time`) = '$today'");
$users_count= mysqli_num_rows($query);
if($users_count<1){$messages_.= "<p style='color:black;'>No Assignment Found On Database</p>";}
else{
while($users_rows = mysqli_fetch_assoc($query)){

$assignment_id=$users_rows['assignment_id'];
$assignment=$users_rows['assignment'];
$course=$users_rows['course'];
$department=$users_rows['department'];
$lecturer_id=$users_rows['lecturer_id'];
$deadline=$users_rows['deadline'];
$date_time=$users_rows['date_time'];

$lec_name=get_user_info("name",$lecturer_id);
$date_ = date('d-m-y', strtotime($deadline));
$time_ = date('g:i A', strtotime($deadline));


$messages_.='<li><a href="#">
<div class="task-info">
<span class="task-desc">'.$course.'</span><span class="percentage">'.$date_.'('.$time_.'):</span>
<div class="clearfix"></div>
</div>
<div class="progress progress-striped active">
<div class="bar  green" style="width: 100%;"></div>
</div>
</a></li>';
}

}

return $messages_;
}


function get_events($id){
$messages_="";
global $con;
$query=mysqli_query($con, "SELECT * FROM events WHERE department ='$department' AND DATE(`starttime`) = '$today'");
$users_count= mysqli_num_rows($query);
if($users_count<1){$messages_.= "<p style='color:black;'>No Events Found On Database</p>";}
else{
while($users_rows = mysqli_fetch_assoc($query)){


$id=$users_rows['id'];
$name=$users_rows['name'];
$startdate=$users_rows['startdate'];
$starttime=$users_rows['starttime'];
$color=$users_rows['color'];
$department=$users_rows['department'];
$lecturer_id=$users_rows['lecturer_id'];
$picture=get_user_info("picture",$lecturer_id);
$lec_name=get_user_info("name",$lecturer_id);
$date_ = date('d-m-y', strtotime($starttime));
$time_ = date('g:i A', strtotime($starttime));


$messages_.='<li><a href="#">
<div class="user_img"><img src="'.$picture.'" alt="No Image" style="height:50px;width:50px;"></div>
<div class="notification_desc">
<h6>'.$name.'</h6>
<p>'.$lec_name.'</p>
<p><span>'.$date_ .'( '.$time_.' )</span></p>
</div>
<div class="clearfix"></div>
</a>
</li>';
}

}

return $messages_;
}





?>
