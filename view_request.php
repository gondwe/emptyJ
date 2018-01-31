<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
<?php

$id = $_GET['id'];
$cid = fetch("select customer_id from truck_request where id = '$id'");



?>
<div class='col-md-6 pull-left'>
		  <h5 >Requesting Client Details</h5> 
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
						
		echo $tel = $names[0]["tel"];
		$details = explode("|",$names[0]["customer"]);
		// spill($details);
		// echo $details[0];
		  ?>
		<?php foreach($details as $item): ?>
		<li style='list-style-type:none'><?=$item?></li>
		<?php endforeach ?>
		  
</div>  


<?php include 'footer.php' ?>

