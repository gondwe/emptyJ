<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                
                
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3">
                    
                  </div> 
                      
                      <div class="card card-outline-info col-md-6">
                          <div class="card-header">
                                <h4 class="m-b-0 text-white">Truck Booking & Subscriptions</h4></div>

                            <div class="card-block">
                              
                          
                                                
                          
                          
                          
<?php 

if(!isset($_REQUEST["b"])) header("location:index.php");

$bid = $_REQUEST["b"];
$me  = $_SESSION[$ndk]["inside"]["id"];

$sql = "
select ts.id as tsd, t.id as truck_id, tt.town as town_from, ttt.town as town_to, concat(t.name,' ',t.number_plate) as truck, ts.dep_time as depature_time, concat(ts.eta,' Hrs') as eta, date_format(ts.transit_date, '%D %b, %Y') as transit_date
,transit_date as tdt
from truck_schedule as ts
left join truck as t on t.id = ts.truck_id
left join truck_towns as tt on tt.id = ts.town_from
left join truck_towns as ttt on ttt.id = ts.town_to
left join truck_driving as tdr on tdr.truck_id = t.id and tdr.status =1
where ts.id = '$bid'
group by ts.id
";



$s = getlist($sql);
// spill($s);
$d = date_timestamp_get(new DateTime($s["tdt"]));
$n = date_timestamp_get(new DateTime());
if($d-$n < 1 ) error("WARNING: Only post-dated Transit is Allowed. Please Revise your dates");

echo "<div class='ml-4'>";
echo "<h4 class='ml-3'>Book Shipment with ".$s["truck"]." on ".$s["transit_date"]." at ".$s["depature_time"]."</h4>";
echo "<h5 class='ml-3'>From ".$s["town_from"]." to ".$s["town_to"]." within approx (".$s["eta"].")</h5>";

$driversids = implode(",",getlist("select driver_id from truck_driving where truck_id ='".$s["truck_id"]."' "));
$drivers = getlist("select u.tel, td.full_name from truck_users as u left join truck_driver as td on td.user_id = u.id where u.id in ($driversids) ");

// spill($drivers);
// get subscription data
$status = sub_status($me);

if($status == "1"){
    // subscribed
    success("Proceed to Contact Listing");
    success("Booking Successful");
    $db = db();
    $db->query("insert into truck_booking (booking_id, cust_id) values('$bid','$me') ");
    echo '<div class="m-5">';
    echo "<h3 >Truck Control Center</h3>";
    $agents = getlist("select u.tel from truck_users as u where u.usertype = '4'");
    echo "<ol>";
    foreach($agents as $a){
        echo "<li>+254 $a</li>";
    }echo "</ol>";
    echo "<h3 >Truck Owner Contacts</h3>";
        echo "<li class='m-2 ml-5'>".fetch("select concat(tow.full_name,' Tel : +254 ',u.tel) from truck_owner as tow 
        left join truck_users as u on tow.user_id = u.id
        left join truck as t on t.user_id = tow.id
        where t.id = '".$s['truck_id']."' ")."</li>";
    echo "<h3 >Driver Contacts</h3>";
                foreach($drivers as $c=>$n){
    echo "<li class='m-2 ml-5'>".$n." +254 ".$c."</li>";
                }
    echo '</div>';
}elseif($status === "0"){
    // pending approval
    error("Your subscription is pending approval.");
    echo '<div class="m-3">';
    echo "<h4>Contact : Truck Control</h4>";
    $agents = getlist("select u.tel from truck_users as u where u.usertype = '4'");
    echo "<ol>";
    foreach($agents as $a){
        echo "<li>+254 $a</li>";
    }echo "</ol>";
    echo "</div>";
}elseif($status === false){
    // unsubscribed
    error("<button class='btn btn-danger btn-block'>Settle your monthly subscription . </br> Send Ksh 500 to paybill number 565656 to proceed</button>");
}
?>
                  </div> 
                  </div> 
                </div>                
                
                

</div>
</div>
</div>
<?php include 'footer.php' ?>
