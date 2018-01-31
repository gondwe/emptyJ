<?php 

include 'head.php';
$id = $_REQUEST["id"];
if(process("delete from truck_request where id ='$id'")){
	header("location:".$_SERVER["HTTP_REFERER"]);
}


?> 
