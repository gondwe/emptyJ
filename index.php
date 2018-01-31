<?php include 'head.php' ?>
<?php include 'nav.php';

// $td = date("Y")."-".date("m")."-".date("d");
// if(!empty($_REQUEST)){
    $tf = empty($_REQUEST)? "X" : clean($_REQUEST["departure"]);
    $tt = empty($_REQUEST)? "Y" : clean($_REQUEST["destination"]);
    $td = empty($_REQUEST)? date("Y")."-".date("m")."-".date("d") : clean($_REQUEST["transit_date"]);
// }

?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               
 
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                             <h3 style="padding:20px">Destination of your cargo <i class="mdi mdi-truck-delivery"></i></h3> 
                            <div class="card-block">
                                 <div class="row page-titles">
                    <form action="" method="get">
                    <div class="col-md-12 row">
                      <div class="form-group col-md-4" method="get">
                                    
                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="departure">
                                        <option selected="">Departure Town</option>
                                        <?php foreach(getlist("select id, town from truck_towns") as $t=>$o):?>
                                         <option <?= $t==$tf? 'selected':null?> value="<?=$t?>"><?=$o?></option>
                                         <?php endforeach?>
                                       
                                    </select>
                                </div>
                        
                                <div class="form-group col-md-4">
                                    
                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="destination">
                                        <option selected="">Arrival Town</option>
                                        <?php foreach(getlist("select id, town from truck_towns") as $t=>$o):?>
                                          <option <?= $t==$tt? 'selected':null?> value="<?=$t?>"><?=$o?></option>
                                        <?php endforeach?>
                                       
                                    </select>
                                </div>
                        
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control" name="transit_date" value="<?=$td?>">
                                    <!-- <select class="custom-select col-12" id="inlineFormCustomSelect">
                                        <option selected="">Transit Date</option>
                                    </select> -->
                                </div>
                        
                    </form>
                                    <div class="col-md-3"> 
                                        
                                        <button class="btn btn-info btn-rounded col-md-12"><i class="mdi mdi-account-search"></i> Search</button>
                        
                                    </div>
                        
                                        
                                    <div class="col-md-3">
                        
                                     <a href="./request_truck.php" type="button" class="btn btn-danger btn-rounded col-md-12"><i class="mdi mdi-car-connected"></i>  Request a Truck</a> 
                                        
                                    </div>    
     
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                




                <?php 
                // spill($_SERVER);
                // spill($_COOKIE);
                // spill($_SESSION);
                    // check request
                    if(!empty($_REQUEST)){
                        
                        $sql = "
                        select ts.id as tsd, tt.town as town_from, ttt.town as town_to, concat(t.name,' ',t.number_plate) as truck, ts.dep_time as depature_time, concat(ts.eta,' Hrs') as eta, date_format(ts.transit_date, '%D %b, %Y') as transit_date
                        from truck_schedule as ts
                        left join truck as t on t.id = ts.truck_id
                        left join truck_towns as tt on tt.id = ts.town_from
                        left join truck_towns as ttt on ttt.id = ts.town_to
                        left join truck_driving as tdr on tdr.truck_id = t.id and tdr.status =1
                        where transit_date = '$td' and town_from = '$tf' and town_to = '$tt'
                        group by t.id
                        ";
                        $trucks1 = get($sql);

                       // $_COOKIE['search'] = $_SERVER["QUERY_STRING"];
                        // setcookie("search",$_SERVER["QUERY_STRING"]);
                        echo "<script>localStorage.setItem('trucksearch','".$_SERVER["QUERY_STRING"]."' );</script>";


                    }

                    $tff = isset($_REQUEST["departure"])? fetch("select town from truck_towns where id = '$tf'") : " X ";
                    $ttt = isset($_REQUEST["destination"])? fetch("select town from  truck_towns where id = '$tt'") : " Y ";
                    $day = date_format(new DateTime($td),"Dd M Y");
                        if(!empty($trucks1)){
                            // spill($trucks1);
                            getcard($trucks1, "Trucks from $tff to $ttt on $day");
                        }else{
                            echo "<button class='m-2 btn btn-danger'>0 Trucks found on ".date_format( new DateTime(@$td),'Dd M Y')." from $tff to $ttt</button>";
                        }
                        
                        
                        // trucks within 7 days 
                        $trucks = get("
                        select ts.id as tsd, tt.town as town_from, ttt.town as town_to, concat(t.name,' ',t.number_plate) as truck, ts.dep_time as depature_time, concat(ts.eta,' Hrs') as eta, date_format(ts.transit_date, '%D %b, %Y') as transit_date
                        from truck_schedule as ts
                        left join truck as t on t.id = ts.truck_id
                        left join truck_towns as tt on tt.id = ts.town_from
                        left join truck_towns as ttt on ttt.id = ts.town_to
                        where transit_date >= NOW() and transit_date <= NOW() + INTERVAL 7 DAY  
                        and t.id in (select truck_id from truck_driving where status = 1) ");

                        if(!empty($trucks)){
                            getcard($trucks, "Available Trucks Next 7 day(s) Period");
                        }

                ?>

                       
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<?php 
function getcard($trucks, $head){
    ?>
                 <div class="card">
                            <div class="card-block">
                                <h4 class="card-title bg-info p-2" style="color:#fff;"><?php echo $head ?></h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Truck Image</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Date/Time</th>
                                                <!-- <th>Mode</th> -->
                                                <th>Vehicle Type</th>
                                                <!-- <th>Indicated Price</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $x =1; foreach($trucks as $tr=>$u): ?>
                                            <tr>
                                                <td><?=$x?></td>
                                                <td>
                                                    <a href="javascript:void(0)"><img src="assets/images/scania.png" alt="user" hieght="70" class="img-square" /> </a>
                                                </td>
                                                <td><?=$u["town_from"]?></td>
                                                <td><?=$u["town_to"]?></td>
                                                <td><span class="label label-info"><?=$u["transit_date"]?></span><span class="label label-danger"><?=$u["depature_time"]?></span> </td>
                                                <!-- <td>Road</td> -->
                                                <td><?=$u["truck"]?></td>
                                                <!-- <td>$1200 <i class="card-subtitle" style='font-size: 10px;'>(Excl. VAT & </br> Service Fees  )</i> </td> -->
                                                <td>
                                                   <a href="./truck_booking.php?b=<?=$u["tsd"]?>"><button type="button" class="btn btn-info btn-rounded col-md-12" data-toggle="modal" data-target="#add-contact">Book</button></a>
                                                </td>
                                            </tr>

<?php $x++; endforeach; ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               
                                                
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
    <?php
}

?>
<script>
    if(localStorage.trucksearch.length > 0){
        if(window.location.search == '?'+localStorage.trucksearch){
            console.log("no redirect");
        }else{
            window.location.href = "index.php?"+localStorage.trucksearch;
        }
        // 
    }
</script>

<?php include 'footer.php' ?>
