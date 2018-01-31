<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
<a href="./truck_schedule.php"><button class="m-2 btn btn-success pull-right">View Schedule</button></a>
            
<form class="form-horizontal m-t-40" >
<div class="form-group">
<a href="./addtruck.php" class="btn btn-primary" >Add New</a>
</div>
</form>


<?php 

$me = $_SESSION[$ndk]["inside"]["id"];
$trucks = get("
select t.id, t.number_plate, t.name, t.type,  tdr.user_id as driver_id,
tdr.full_name as driver, 
td.status as action
from truck as t 
left join truck_driving as td on  td.truck_id = t.id
left join truck_driver as tdr on tdr.user_id = td.driver_id               
where t.user_id = '$me' 
");

//  t.user_id = '$id' and
// td.truck_owner_id = t.user_id and

// spill($trucks);

if(empty($trucks)) error( "0 trucks found !");
    

if(!empty($trucks)) {
    $ths = array_keys($trucks[0]);
    echo "<table class='table table-striped table-compact table-bordered'>";
    echo "<tr><thead class='bg-warning'>"; foreach($ths as $th){ echo "<th>".rx($th)."</th>"; } echo "</thead></tr>";
    echo "<tbody>";
    $x = 1;
    foreach($trucks as $tds){
        $tid = $tds["id"];
        $tds["id"] = $x;
        $Approve = '<a href="./approve.php?id='.$tid.'&d='.$tds["driver_id"].'">Approve</a>';
        $AssignDriver = '<a href="./assign.php?id='.$tid.'">AssignDriver</a>';
        $ScheduleTransit = '<a href="./schedule.php?id='.$tid.'">ScheduleTransit</a>';

        $tds["number_plate"] = '<a href="./viewtruck.php?id='.$tid.'">'.$tds["number_plate"].'</a>';

        $tds["action"] = $tds["action"] == 1 ? $ScheduleTransit : (is_null($tds["action"])? $AssignDriver : $Approve);
        echo "<tr>";foreach($tds as $td){ echo "<td>".$td."</td>"; } echo "</tr>"; 
        $x++;
    }
    echo "</tbody>";
    echo "</table>";
    }   

?>

</div>
</div>

<?php include 'footer.php' ?>
