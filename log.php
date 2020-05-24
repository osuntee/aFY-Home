<?php
include ('app/includes/dbconnect.php');
error_reporting(0);
//check connection status
session_start();// Starting Session




$query= mysqli_query($con,"SELECT * FROM log");
$count =mysqli_num_rows($query);

if($count<0){$apps_= "<h1>No Activity Found On Database</h1>";}
else{
$apps_="";
while($rows = mysqli_fetch_assoc($query)) {

$id=$rows['id'];
$appliance_id=$rows['appliance_id'];
 $activity=$rows['activity'];
$energy=$rows['energy'];


$apps_.='<p>'.$activity.'</p>';
}

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FYHome</title>
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/unusual_menu.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
<style>
@font-face{
 font-family:'digital-clock-font';
 src: url('fonts/digital-7/digital-7.ttf');
}
#energy_usage{font-family:'digital-clock-font';text-align:center;font-size:55px;}
</style>
</head>
<body>
<div class="container">
<!-- Top Navigation -->
<nav>
<ul>
<li><a href="appliances.php"><span>Home</span></a></li>
<li><a href="app/reset.php"><span>Reset</span></a></li>
<li><a href="log.php"><span>Log</span></a></li>
<li> <a href="manage_appliances.php"><span>Manage Appliances</span></a></li>
<h2 id="energy_usage">

</h2>

</ul>
</nav>

<style>
.related {
	padding: 2em 0 3em;
	clear: both;
}
</style>

<section class="related" style="margin-top:-20px;">
<?php echo $apps_;?>
</section>
</div><!-- /container -->

<script src="js/unusual_menu.js"></script>
<script src="js/jquery.js"></script>

<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/colorfinder-1.1.js"></script>
<script src="js/gridScrollFx.js"></script>
<script>
new GridScrollFx( document.getElementById( 'grid' ), {
viewportFactor : 0.4
} );
</script>
<script>
function on_app(appliance_id) {

$.ajax({
url: 'app/on_app.php?appliance_id='+appliance_id,
type: 'GET',
dataType: 'json',
success: function(output) {
window.location.reload();
},
error: function(output) {
window.location.reload();
}

});
}
function off_app(appliance_id) {

$.ajax({
url: 'app/off_app.php?appliance_id='+appliance_id,
type: 'GET',
dataType: 'json',
success: function(output) {
window.location.reload();
},
error: function(output) {
window.location.reload();
}
});
}

</script>


<script>

$(document).ready(function() {
$.ajax({
url: 'app/includes/energy_counter.php',
type: 'GET',
dataType: 'json',
success: function(output) {
//alert(output);
$("#energy_usage").text(output);
},
error: function(output) {
//alert("err");
},
complete: function() {
setTimeout(worker, 1000);
}
});
});
</script>


</body>
</html>