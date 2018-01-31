<?php include 'head.php' ?> 
<?php include 'nav.php'; $tel =$_REQUEST["tel"]; ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            


<h3>Driver Profile</h3>
<?php 
$drv = getlist("select u.tel, td.* 
from truck_users as u right join truck_driver as td on td.user_id =u.id where u.id = '$tel'");
spill($drv);
?>

<h3>Activity</h3>
<?php 
$act = getlist("select *from truck_driving where driver_id = '$tel'");
spill($act);
?>





</div>
</div>


<?php include 'footer.php' ?>