<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
<h3>Assign Truck Driver</h3>

<?php 
if(isset($_GET["tel"])){ $tel = $_GET["tel"]; }

$me =  $_SESSION[$ndk]["inside"]["id"];
if(!empty($_POST)){
    if(insert("truck_driving")){
        success("Driver Added Successfully"); 
        $d = getlist("select * from truck_driver where user_id = (select id from truck_users where tel = '$tel')");
        $t = fetch("select concat(number_plate,' ', name) from truck where id ='".$_POST['truck_id']."'");
        $message = "Name : ".$d["full_name"]."\r\n Vehicle : ".$t." \r\n Tel:".$_SESSION[$ndk]["inside"]["tel"];
        message($me,$_POST["driver_id"],  $message, ">>truck driver assignment");
    }
    
}
$trucks = getlist("select id, concat(name, ' ', number_plate) as name from truck where user_id = '$me'");

if(isset($_GET["tel"])){
    
    $tel = $_GET["tel"];
    if(strlen($tel) == 10){ $tel = substr($tel, 1);}
    if(strlen($tel) == 12){ $tel = substr($tel, 3);}
    if(strlen($tel)<10 && substr($tel,0,1) == "0"){ $tel = substr($tel,1);}

    $drv = getlist("select u.tel, td.* 
    from truck_users as u right join truck_driver as td on td.user_id =u.id where u.tel = '$tel'");
    if(!empty($drv)){
        // spill($drv);
        ?>

        <div class="form-group">
            <a href="driverprofile.php?tel=<?=$drv["user_id"]?>"><button class="btn btn-primary" ><?=$drv["full_name"]." +254 ".$drv["tel"]?></button></a>
        </div>  
        <form action="" method="post">
        <input type="hidden" name="truck_owner_id" value="<?=$me?>">
        <input type="hidden" name="status" value="1">
        <input type="hidden" name="driver_id" value="<?=$drv["user_id"]?>">
        <div class="form-group">
            <select required  name="truck_id" class="form-control" id="truck">
                <option value="">Select Truck</option>
                <?php 
                foreach($trucks as $k=>$truck){
                    echo "<option value='".$k."'>".$truck."</option>";
                }
                ?>
            </select>
        </div>  
        
        <div class="form-group">
            <button  type="submit" class="btn btn-success" >Add Driver</button>
        </div>
        </form>
<?php

    }else{
        error("<b>".$tel."</b> No Records found");
    }


}
?>

<form action="" method="get">
    <div class="form-group">
    <input class="form-control" type="text" name="tel" placeholder="Search driver by telephone no">
    </div>
    
    <div class="form-group">
    <button type="submit" class="btn btn-success" >Search</button>
    </div>

</form>



</div>
</div>


<?php include 'footer.php' ?>