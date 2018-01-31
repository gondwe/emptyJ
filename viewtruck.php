<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                
                
        <div class='col-md-12'>
            <h4 style="margin-top:20px;">Truck Details</h4>
  <div class='row'>
         
<?php 
    $truck_id = validate_owner();
    $truck = get(
        "select t.*, tow.full_name as owner from truck as t left join truck_owner as tow on tow.user_id = t.user_id where t.id ='$truck_id'"
    );
    $drivers = getlist("select td.user_id, td.full_name from truck_driver as td 
    right join truck_driving as tdr on tdr.driver_id = td.user_id
    where tdr.truck_id = '$truck_id' and tdr.status = 1 group by td.id");
    
    
    // spill($drivers);
    // table($truck_data);
   
   
    
    echo '<div class="card col-md-3" style="padding:20px 20px 20px 20px">';
    echo "<div class=''><img src='".getimage("truck/".$truck[0]["photo"])."' width=250 ></div>";
    echo "</div>";


    echo '<div class="card col-md-4" style="margin-left:30px; padding:20px 20px 20px 20px" >';
    echo "<div class=''>";
    echo "<div><b>Number Plate:</b>".$truck[0]["number_plate"]."</div>";
    echo "<div><b>Name:</b>".$truck[0]["name"]."</div>";
    echo "<div><b>Type:</b>".$truck[0]["type"]."</div>";
    echo "<div><b>Capacity:</b>".$truck[0]["capacity"]."</div>";
    echo "<div><b>Model:</b>".$truck[0]["model"]."</div>";
    echo "<div><b>Owner:</b>".$truck[0]["owner"]."</div>";
    echo "<div><b>Date Added:</b>".date_format(new DateTime($truck[0]["date"]),'Dd M Y')."</div>";
    echo "<div><b>Drivers:</b><ol>";
    echo '<a href="./delete_truck.php?id='.$truck_id.'"><button class="btn btn-warning m-3 pull-right">Delete Truck</button></a>';
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo '<div class="card col-md-3 " style="padding:20px 20px 20px 20px; margin-left:30px;">';
    echo "<h3>Drivers Assigned</h3>";
    // echo $d;
    foreach($drivers as $k=>$d):
        // $tel = fetch("select tel from truck_users where id = $k") ;
        echo "<li>";
        echo '<a href="./driverprofile.php?tel='.$k.'">'.$d.'</a>';
        echo '<a href="./truck_deldriver.php?id='.$k.'&t='.$truck_id.'" class="btn-xs m-2 btn btn-danger">Delete Driver</a>';
        echo "</li>";
    endforeach;
    echo "</div>";


    echo "</ol></div>";
    echo "</div>";
    echo '</div>';

?>
   
</div>               
</div>  
</div>
</div>

            <?php include 'footer.php' ?>
