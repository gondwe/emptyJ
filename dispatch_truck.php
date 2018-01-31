<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
			<h3 class='m-3'>Secure Truck Request</h3>
<?php
	$id = $_GET['id'];
	$cid = fetch("select customer_id from truck_request where id = '$id'");

if(!empty($_POST)){
	if(update("truck_request", $id)){
		$msg = "\nDispatch success\nPlease check your request schedule.";
		message($me, $cid, $msg);
		success("<div class='alert alert-success'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button>
                                            <h3 class='text-success'><i class='fa fa-check-circle'></i>Dispatch Successful</h3> 
                                        </div>");
	}
}		

$trucks = getlist("
select t.id, concat(t.number_plate, ' ',t.name) as driver
from truck as t 
left join truck_driving as td on  td.truck_id = t.id
left join truck_driver as tdr on tdr.user_id = td.driver_id               
where t.user_id = '$me' and not td.status  is null
");

// spill($trucks)

?>


<div class='col-md-7 pull-left card' style='padding:20px;'>
    
		  <h5 >Requesting Client Details</h5> 
		  <table class='table'>
		      <tr>
		          <th>Photo</th> 
		          <th>Name</th>
		           <th>Current Location</th>
		           <th>Email</th>
		      </tr>
		      <tr>
		  <?php 
		
		$cidets =get("select tel from truck_users where id = '$cid'");
		
		$flds = ["full_name","address","photo","email",];
		$fields = implode(",'|',", $flds);
		
		$datastring = "concat($fields) as data";
		$names  = get("select truck_users.tel, (
						select $datastring from truck_owner where user_id = '$cid'
						UNION 
						select $datastring  from truck_driver where user_id = '$cid'
						UNION
						select $datastring from truck_customer where user_id = '$cid'
						) as customer from truck_users where 
						id = '$cid'");
						
		echo "<h2>" .$tel = $names[0]["tel"]. "</h2>" ;
		$details = explode("|",$names[0]["customer"]);
		//spill($details);
		
	echo "<td>".$details["2"]."</td>";
		echo "<td>".$details["0"]."</td>";
			echo "<td>".$details["1"]."</td>";
					echo "<td>".$details["3"]."</td>";
		
		  ?>
	</tr>	  
</table>
</div>   

       
<div class='col-md-4 pull-right card ' style='padding:20px;' >
	<form action="" method="post">
	<input type="hidden" name="fleet_owner_id" value="<?=$me?>">
	<input type="hidden" name="status" value="1">
	<div class="form-group">
		<label >Available Trucks</label>
		<select class="form-control" name="truck_id" >
			<?php foreach($trucks as $v=>$n): ?>
				<option value="<?=$v?>"><?=$n?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary" >Dispatch Truck</button>
	</form>
</div>          



</div>
</div>



<?php include 'footer.php' ?>


