<?php 
include("php/functions.php");
$ow = $_POST["ow"];
$trucks = getlist("select id, concat(name, ' ', number_plate) as name from truck where user_id = '$ow'");
echo '<option value="">Select Truck</option>';
foreach($trucks as $k=>$truck){
    echo "<option value='".$k."'>".$truck."</option>";
}
