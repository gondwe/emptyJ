<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluplaceholder  -->
            <!-- ============================================================== -->
            <div class="container">
            
<!-- <a href="./truck_schedule.php"><button class="m-2 btn btn-success pull-right">View Schedule</button></a> -->
<h3 class='m-3'>My Schedule </h3>
<a href="./schedule.php"><button class="m-3 btn btn-primary">New Schedule</button></a>

<?php 
    $me =  $_SESSION[$ndk]["inside"]["id"];
    $sql = "
    select ts.id, tt.town as town_from, ttt.town as town_to, concat(t.name,' ',t.number_plate) as truck, ts.dep_time as depature_time, concat(ts.eta,' Hrs') as eta, date_format(ts.transit_date, '%D %b, %Y') as transit_date
    from truck_schedule as ts
    left join truck as t on t.id = ts.truck_id
    left join truck_towns as tt on tt.id = ts.town_from
    left join truck_towns as ttt on ttt.id = ts.town_to
    where t.user_id = '$me'";

    $data = get($sql);
    //    spill($transit);
    // table($transit);
    if(!empty($data)) {
        $ths = array_keys($data[0]);
        echo "<table class='table table-striped table-bordered'>";
        echo "<tr><thead class='bg-info'>"; foreach($ths as $th){ echo "<th>".rx($th)."</th>"; }echo "<th>Action</th>"; echo "</thead></tr>";
        echo "<tbody>";
        $x = 1;
        foreach($data as $tr=>$tds){
            if(isset($tds["status"])){ 
                $tds["status"] = $tds["status"] == 0 ? "Pending" : "Approved";}
                echo "<tr>";
                $ids = array_shift($tds);
                array_unshift($tds, $x);
                foreach($tds as $td){ echo "<td>".$td."</td>"; } 
                echo "<td class='btn btn-danger' id='$ids' onclick='delete_schedule(this.id)'>Delete</td>";
                echo "</tr>"; 
                $x++;
        }
        echo "</tbody>";
        echo "</table>";
    }


    // add delete
?>

<script>
    function delete_schedule(id){
        console.log(id);
        $("#"+id).load("deleteSchedule.php", {id:id});
        myel = document.getElementById(id).parentElement
        myel.style.display = "none";
    }
</script>

</div>
</div>
                                
<?php include 'footer.php' ?>