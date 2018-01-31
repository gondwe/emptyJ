<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            

<?php 
$me =  $_SESSION[$ndk]["inside"]["id"];
if(!empty($_POST)){
    $_POST["driver_id"] =$me;
    if(insert("truck_driving")){
        success("Truck Added Successfully"); 
        $d = getlist("select * from truck_driver where user_id = '$me'");
        $t = fetch("select concat(number_plate,' ', name) from truck where id ='".$_POST['truck_id']."'");
        $message = "Name : ".$d["full_name"]."\r\n Vehicle : ".$t." \r\n Tel:".$_SESSION[$ndk]["inside"]["tel"];
        message($me,$_POST["truck_owner_id"],  $message, ">>truck driver assignment");
    }
    // echo $message;
}


    
$fleets = getlist("select tow.user_id, concat(tow.full_name, ' +254 ', u.tel) as owner 
    from truck_owner as tow 
    left join truck_users as u
    on tow.user_id = u.id");

    
?>


            <form class="form-horizontal m-t-40" method="post" action="" enctype="form-data">
 
                        <h3>Add Trucks</h3>
                                <div class="form-group">
                                    
                                    <select required  name="truck_owner_id" class="form-control" onchange="loadtrucks(this.value)">
                                        <?php foreach($fleets as $k=>$val ):?>
                                        <option value="">Select Employer</option>
                                        <option value="<?=$k?>"><?=$val?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Select Truck</label> -->
                                    <select required  name="truck_id" class="form-control" id="truck">
                                        <option value="">Select Truck</option>';
                                    </select>
                                </div>  
                               
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" >Save</button>
                                </div>
                        
                                </form>

                                <h3>Trucks Listing</h3>
<?php 

$trucklisting = get("select t.number_plate, tow.full_name as owner, t.name, t.model, td.status 
                            from truck_driving as td
                            left join truck as t on t.id = td.truck_id
                            left join truck_owner as tow on tow.user_id = td.truck_owner_id
                            where td.driver_id = '$me'
                            order by td.date desc
                            ");
// spill($trucklisting);
table($trucklisting);

?>

</div>
</div>
<script>function loadtrucks(v){ $("#truck").load("truck_list.php", {ow:v});}</script>
<?php include 'footer.php' ?>
