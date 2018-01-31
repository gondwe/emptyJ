<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            <h3>Approve Truck Driver</h3>
<?php 

$me =  $_SESSION[$ndk]["inside"]["id"];
$truck_id = validate_owner();
if(!isset($_REQUEST["d"])) header("location:trucks.php");
$dr = $_REQUEST["d"];
$truck = get("select * from truck where id = '$truck_id' ");
$driver = get("select td.*, tu.tel  from truck_driver as td 
left join truck_users as tu on tu.id = td.user_id where td.user_id = '$dr'");
$d = fetch("select id from truck_driving where driver_id = '$dr' and truck_owner_id = '$me' and status = 0");

// spill($truck);
echo '<div class="col-sm-4 m-2 pull-left">';
echo "<h4>Truck Details</h4>";
echo "<div><img src='".getimage("truck/".$truck[0]["photo"])."' width=100 ></div>";
echo "<div><b>Number Plate:</b>".$truck[0]["number_plate"]."</div>";
echo "<div><b>Name:</b>".$truck[0]["name"]."</div>";
echo "<div><b>Type:</b>".$truck[0]["type"]."</div>";
echo "<div><b>Capacity:</b>".$truck[0]["capacity"]."</div>";
echo "<div><b>Model:</b>".$truck[0]["model"]."</div>";
echo '</div>';

// spill($driver);
echo '<div class="col-sm-4 m-2 pull-left">';
echo "<h4>Driver Details</h4>";
echo "<div><img src ='".getimage("truck_driver/".$driver[0]["photo"])."' width=100  ></div>";
echo "<div><b>Names:</b>".$driver[0]["full_name"]."</div>";
echo "<div><b>ID Number:</b>".$driver[0]["id_no"]."</div>";
echo "<div><b>DL Number:</b>".$driver[0]["license_no"]."</div>";
echo "<div><b>Address:</b>".$driver[0]["address"]."</div>";
echo "<div><b>Contact:</b>+254 ".$driver[0]["tel"]."</div>";
echo "<div><b>Email:</b>".$driver[0]["email"]."</div>";
echo '</div>';

 $sql ="select status from truck_driving where truck_id =  '$truck_id' and driver_id ='$dr' ";
 $status = fetch($sql);
?>
<?php
if(!empty($_POST)){
    if(update("truck_driving",$d)) header("location:trucks.php");
}
?>
<form action="" method="post">
<?php if($status){ ?>
<button class="btn btn-success" type='button' value="0">Driver Approved</button>
<?php }else{ ?>
<input type="hidden" name="status" value="1">
<button class="btn btn-success" type='submit' >Approve</button>
<?php } ?>
</form>

    
    </div>
    </div>
<?php include 'footer.php' ?>
