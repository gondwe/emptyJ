<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            

<?php 

    $mydata = getlist("select * from `$truck_table` where user_id = '$me'");
    if(!empty($mydata)){
    echo '<h3 class="mt-3">Personal Details</h3>';
    echo "<div><img src='".getimage($truck_table."/".$mydata['photo'])."' class='pull-left m-3' width=100 ></div>";
    echo '<div class="pull-left m-5">';
    echo "<div><b>Names :</b>".$mydata["full_name"]."</div>";
    echo "<div><b>Address :</b>".$mydata["address"]."</div>";
    echo "<div><b>Email :</b>".$mydata["email"]."</div>";
    echo "</div>";
    }
?>

 <a href="./password.php" class='btn btn-info pull-right m-2'>Change Password</a>
 


<!-- show drivers data -->
    <?php if($type == 2) :?>
    <h3 class="m-3 col-md-12 row">Registered Fleets</h3>
    <?php 
    // $trucklisting = getlist("select * from truck_driving where driver_id = '$me'");
    // spill($trucklisting);
    
    $trucklisting = get("select t.number_plate, tow.full_name as owner, t.name, t.model, td.status 
    from truck_driving as td
    left join truck as t on t.id = td.truck_id
    left join truck_owner as tow on tow.user_id = td.truck_owner_id
    where td.driver_id = '$me'
    order by td.date desc
    ");
    // spill($trucklisting);
    table($trucklisting);
    endif;
    ?>
<!-- end of drivers data -->

<!-- show customer data -->
<?php if($type == 3){
    echo "<h3>My Shipment</h3>";
    $shipment = getlist("select * from truck_shipment where customer_id = '$me'");
    spill($shipment);
} 


?>
<!-- end of customer data -->


</div>
</div>
<script>function loadtrucks(v){ $("#truck").load("truck_list.php", {ow:v});}</script>
<?php include 'footer.php' ?>
