<?php
include ('app/includes/dbconnect.php');
error_reporting(0);
//check connection status
session_start();// Starting Session




$query= mysqli_query($con,"SELECT * FROM appliances");
$count =mysqli_num_rows($query);

if($count<0){$apps_= "<h1>No Appliance Found On Database</h1>";}
else{
$apps_="";
while($rows = mysqli_fetch_assoc($query)) {

$appliance_id=$rows['appliance_id'];
$name=$rows['name'];
$energy=$rows['energy'];
$picture=$rows['picture'];
$status=$rows['status'];

if($status==0){$which="on_app";}
if($status==1){$which="off_app";}

$apps_.='<li>
<img src="app/'.$picture.'" style="width:300px;height:360px;" alt="'.$name.'">
<h3>
<table>
<tr>
<td style="width:30%;text-align:left;"><a href="app/edit_appliance.php?appliance_id='.$appliance_id.'" style="text-decoration:none;">Edit</a></td>
<td style="width:30%;text-align:right;"><a href="app/delete.php?appliance_id='.$appliance_id.'" style="text-decoration:none;">Delete</a></td>
</tr>
<tr>
<td style="text-align:center;">'.$name.'<small> (-'.$energy.'W)</small> </td>
</tr>
</table>
</h3>
</li>';
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
#energy_usage{font-family:'digital-clock-font';text-align:center;font-size:55px;color:red;}
#usage_per_hour{font-family:'digital-clock-font';text-align:center;font-size:55px;}
</style>
</head>
<body>
<div class="container">
<!-- Top Navigation -->

<nav>
<ul>
<li><a href="appliances.php"><span>Back</span></a></li>
<li><a href="manage_appliances.php"><span>Manage Appliance</span></a></li>
<li> <a href="app/add_appliance.php"><span>Add Appliance</span></a></li>
<h2 id="energy_usage"></h2>
<h2 id="usage_per_hour"></h2>

</ul>
</nav>


<section class="grid-wrap">
<ul class="grid swipe-right" id="grid">
<li class="title-box">
<!-- <h2>Illustrations by <a href="http://ryotakemasa.com/">Ryo Takemasa</a></h2> -->
</li>
<?php echo $apps_;?>

</ul>
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




</body>
</html>