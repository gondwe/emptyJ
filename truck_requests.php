<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                
                <div class="col-md-12">
   <div class="row" style="margin-top:20px;">
      <div class="col-md-1"></div>  
       
    <div class="col-md-9 card">
            
<?php
	if(!empty($_POST)){
		if(insert("truck_request")){success("<div class='alert alert-success'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button>
                                            <h3 class='text-success'><i class='fa fa-check-circle'></i> Success</h3> Request Successful
                                        </div>");}
	}
	
	$truck_types = getlist("select id, names from truck_types");
	$a = getlist("select u.id, td.full_name from truck_users as u right join truck_driver as td on td.user_id = u.id");
	$b = getlist("select u.id, td.full_name from truck_users as u right join truck_owner as td on td.user_id = u.id");
	$c = getlist("select u.id, td.full_name from truck_users as u right join truck_customer as td on td.user_id = u.id");
	
	$users = $a+$b+$c;
	// spill($users);
	$trucks = getlist("select id, number_plate from truck");
	
	$sqk = " tr.id, tr.customer_id, tr.transit_date,tr.status, ttf.town as from_, tto.town as to_
					from truck_request as tr
					left join truck_users as tu on tu.id = tr.customer_id
					left join truck_towns as ttf on tr.town_from = ttf.id
					left join truck_towns as tto on tr.town_to = tto.id";
					
	
	

	$sqkl = $type == "3" ? "select $sqk where tr.status = 0 and tr.customer_id = '$me'" : "select $sqk where tr.status = 0 ";
	$data = get($sqkl);
	
	$sql ="select tr.fleet_owner_id, tr.date as ddate, tr.truck_id, $sqk where tr.status = 1 ";
	$dispatch = get($sql);
	// spill($dispatch);
	
	
	// if($type == "1" ){
		if(!empty($dispatch)){
			foreach($dispatch as $tr=>$tds){
				if($tds["status"] == "1" && ( $tds["fleet_owner_id"] == $me || $tds["customer_id"] == $me) ){
					$dispatched[] = $tds;
				}
			}
		}
		if(!empty($dispatched)){
			echo "<h4 class='m-3'>Dispatch Schedule</h4>";
			// spill($dispatched);
			echo "<table class='table table-striped table-bordered'>";
			echo "<tr style='color:#fff;'><thead class='bg-info'>";
			echo "<th style='color:#fff;'>Dispatch Date</th>";
			echo "<th style='color:#fff;'>Customer</th>";
			echo "<th style='color:#fff;'>Transit Route</th>";
			echo "<th style='color:#fff;'>Truck</th>";
			echo "<th style='color:#fff;' colspan=3>Action</th>";
			echo "</thead></tr>";
			foreach($dispatched as $v){
				echo "<tr>";
					echo "<td>".date_format(new DateTime($v["ddate"]),"d/M/Y")."</td>";
					echo "<td>".$users[$v["customer_id"]]."</td>";
					echo "<td>From : ".$v["from_"]." To : ".$v["to_"]."</td>";
					echo "<td>".$trucks[$v["truck_id"]]."</td>";
					echo "<td><a href='view_dispatch.php?id=".$v["id"]."'>View</a></td>";
					echo "<td><a href='cancel_dispatch.php?id=".$v["id"]."'>Cancel</a></td>";
					echo "<td><a href='close_dispatch.php?id=".$v["id"]."'>Close</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	
	// }
	
	
	$status = sub_status($me);
	if($status == "1"){
    // subscribed
	
	
	echo "<div class='card' style='margin-top:20px;'> "; 
	echo "<h3 class='m-3'>Open Requests</h3>";
	
	$type = fetch("select usertype from truck_users where id = '$me'");
	
	    if(!empty($data)) {
        $ths = array_keys($data[0]);
           
        echo "<table class='table table-striped table-bordered'>";
        echo "<tr><thead class='bg-info' style='color:#fff;'>"; foreach($ths as $th){ echo "<th>".rx($th)."</th>"; }echo "<th>Action</th>"; echo "</thead></tr>";
        echo "<tbody>";
        $x = 1;
        foreach($data as $tr=>$tds){
            if(isset($tds["status"])){ 
                $tds["status"] = $tds["status"] == 0 ? "Pending" : "Approved";}
                $tds["customer_id"] = $users[$tds["customer_id"]];
                $ids = array_shift($tds);
				
				$action = null;
				switch($type){
					case 1: $d = "<td class='btn btn-danger' id='$ids' onclick='dispatch_truck(this.id)'>Dispatch Truck</td>"; break;
					case 2: $d = "<td class='btn btn-danger' id='$ids' onclick='view_request(this.id)'>View Details</td>";break;
					case 3: $d = "<td class='btn btn-danger' id='$ids' onclick='cancel_request(this.id)'>Cancel Request</td>";break;
					case 4: $d = "<td class='btn btn-danger' id='$ids' onclick='view_request(this.id)'>View Details</td>";break;
					
				}
				
				
				$action = $d;
				
				
                array_unshift($tds, $x);

                echo "<tr>";
                foreach($tds as $td){ echo "<td>".$td."</td>"; } 
                echo $action;
                echo "</tr>"; 
                $x++;
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        
    }else{
		echo "<h5>No open Requests";
	}
	
	}elseif($status === "0"){
    // pending approval
    error("Your subscription is pending approval.");
   
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

<script>
	function dispatch_truck(id){window.location = "./dispatch_truck.php?id="+id}
	function view_request(id){window.location = "./view_request.php?id="+id}
	function cancel_request(id){window.location = "./cancel_request.php?id="+id}
</script>




<?php include 'footer.php' ?>

