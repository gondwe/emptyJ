<?php include 'head.php' ?> 
<?php include 'nav.php' ?>


<?php 

$i = $_REQUEST["id"];
$t = $_REQUEST["t"];

process("delete from truck_driving where driver_id = '$i' and truck_id = '$t'");

header("location:".$_SERVER["HTTP_REFERER"]);