<?php 

include 'head.php';
$id = $_REQUEST["id"];
if(process("update truck_request set status = 0, fleet_owner_id = NULL, truck_type=NULL, truck_id = NULL where id ='$id'")){
	header("location:".$_SERVER["HTTP_REFERER"]);
}


?> 
