<?php 

include 'head.php';
$id = $_REQUEST["id"];
if(process("update truck_request set status = 2 where id ='$id'")){
	header("location:".$_SERVER["HTTP_REFERER"]);
}


?> 
