<?php
include ('includes/dbconnect.php');
//error_reporting(0);
session_start();




$err="";


if (isset($_POST['submit_'])) {

$name = $_POST['name'];
$energy = $_POST['energy'];
$date_added  =date('Y-m-d H:i:s');

$picture = $_FILES['picture']['name'];
$tmp_picture = $_FILES['picture']['tmp_name'];

$location = 'pictures/';

$picture_location = $location.$picture;

move_uploaded_file($tmp_picture, $picture_location);



mysqli_query($con, "INSERT INTO `appliances`(`name`, `energy`, `date_added`, `picture`, `status`) VALUES (
'$name','$energy','$date_added','$picture_location','0')");

echo '<script>window.location.href="../appliances.php";</script>';

}




?>




<!DOCTYPE html>
<html lang="zxx">
<head>
<title>FYHome</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
<!-- banner -->
<div class="wthree_agile_admin_info">
<!-- /w3_agileits_top_nav-->

<!-- /inner_content-->
<div class="inner_content">
<!-- /inner_content_w3_agile_info-->

<h2 class="w3_inner_tittle"><?php echo $err;?></h2>

<div class="agile-grids">
<!-- validation -->
<div class="grids">

<div class="forms-grids">
<div class="w3agile-validation">
<div class="agile-validation agile_info_shadow">
<div class="my-div">
<form method="post" action="add_appliance.php" class="valida" autocomplete="off" enctype="multipart/form-data">

<h2 class="w3_inner_tittle">Add Appliance</h2>

<label for="inputName">Name</label>
<div class="form-group valid-form">
<input type="text" class="form-control" id="inputName" name="name" style="height:60px;" required>
</div>

<label for="Energy">Energy</label>
<div class="form-group valid-form">
<input type="text" class="form-control" id="Energy" name="energy" style="height:60px;" required>
</div>

<label for="Picture">Picture</label>
<div class="form-group valid-form">
<input type="file" class="form-control" id="Picture" name="picture" style="height:60px;" required>
</div>



</br>
</br>

<hr>

<p>
<input type="submit" value="Submit" name="submit_" class="btn btn-primary">
<input type="reset" name="res-1" id="res-1" value="Reset" class="btn btn-danger">
</p>
</form>
</div>
</div>
</div>

</div>
</div>
<!-- //validation -->


</div>
<!-- //inner_content_w3_agile_info-->


<!-- //inner_content-->
</div>
<!-- banner -->
<!--copy rights start here-->
<!--copy rights end here-->
<!-- js -->

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<script src="js/classie.js"></script>
<script src="js/gnmenu.js"></script>
<script>
new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
<!-- input-forms -->
<script type="text/javascript" src="js/valida.2.1.6.min.js"></script>

<!-- //input-forms -->
<!--validator js-->
<script src="js/validator.min.js"></script>
<script src="js/screenfull.js"></script>
<script>
$(function () {
$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

if (!screenfull.enabled) {
return false;
}



$('#toggle').click(function () {
screenfull.toggle($('#container')[0]);
});
});
</script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>
</html>