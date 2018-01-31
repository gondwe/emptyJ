<?php include 'head.php' ;
$id = $_REQUEST["id"];
if(process("delete from truck where id = '$id'")) header("location:trucks.php");