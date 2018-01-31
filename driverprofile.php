<?php include 'head.php' ?> 
<?php include 'nav.php'; $tel =$_REQUEST["tel"]; ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            


<div class='row'>

<div class='card col-md-5' style='padding:20px;'>
  
<h3>Driver Profile</h3>

<?php 
$drv = getlist("select u.tel, td.* 
from truck_users as u right join truck_driver as td on td.user_id =u.id where u.id = '$tel'");
//spill($drv);

 echo "<div><b>Names :</b>".$drv["full_name"]."</div>";
  echo "<div><b>National ID :</b>".$drv["id_no"]."</div>";
   echo "<div><b>Drivers License :</b>".$drv["license_no"]."</div>";
    echo "<div><b>Current Location :</b>".$drv["address"]."</div>";
     echo "<div><b>Email :</b>".$drv["email"]."</div>";
      echo "<div><b>Phone :</b>".$drv["tel"]."</div>";
       echo "<div><b>Registration Date :</b>".$drv["date"]."</div>";
        echo "<div><b>Profile Picture :</b><img src=".$drv["photo"]."></div>"; 
       
?>

</div>


<div class='card col-md-6' style='padding:20px; margin-left:40px;'>
<h3>Activity</h3>
<table class='table'>
<tr>
 <th>Truck Id</th>
 <th>Truck Owner</th>
 <th>Driver License</th>
 <th>Date</th>
 <th>Status</th>
</tr>    

<tr>    
<?php 
$act = getlist("select *from truck_driving where driver_id = '$tel'");
//spill($act);

echo "<td>".$act["truck_id"]."</td>";
echo "<td>".$act["truck_owner_id"]."</td>";
echo "<td>".$act["driver_id"]."</td>";
echo "<td>".$act["date"]."</td>";
echo "<td>".$act["status"]."</td>";
?>
</tr>
</table>
</div>
</div>


</div>
</div>


<?php include 'footer.php' ?>