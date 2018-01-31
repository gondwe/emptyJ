<?php include 'head.php' ?> 
<?php include 'nav.php' ?>


<?php 

$i = $_REQUEST["id"];
// $t = $_REQUEST["t"];

process("delete from truck_schedule where id = '$i' ");

// header("location:".$_SERVER["HTTP_REFERER"]);