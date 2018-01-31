<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
<?php
	if(!empty($_POST)){
		if(insert("truck_request")){header("location:truck_requests.php");}
	}
	
	$truck_types = getlist("select id, names from truck_types");
	$towns = getlist("select id, town from truck_towns");
	
?>	
                
                
<div class="col-md-12">
   <div class="row" style="margin-top:20px;">
      <div class="col-md-3"></div>  
       
    <div class="col-md-6 card">
        
<form action="" method="post" >
	<input type="hidden" name="customer_id" value="<?=$me?>">
	<h3 class='m-3'>Request Truck</h3>
	<div class="form-group">
		<label >Truck Type</label>
		<select class="form-control" name="truck_type" >
			<?php foreach($truck_types as $v=>$n): ?>
				<option value="<?=$v?>"><?=$n?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label >Transit Date</label>
		<input required class="form-control" name="transit_date" type='date' >
	</div>
	<div class="form-group">
		<label >Departure Town</label>
		<select class="form-control" name="town_from" >
			<?php foreach($towns as $v=>$n): ?>
				<option value="<?=$v?>"><?=$n?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label >Destination Town</label>
		<select class="form-control" name="town_to" >
			<?php foreach($towns as $v=>$n): ?>
				<option value="<?=$v?>"><?=$n?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label >Load Capacity</label>
		<input required class="form-control" name="load_capacity" type='text' >
	</div>
	<div class="form-group">
	<textarea name="purpose" id="" rows="5" class="form-control" placeholder="purpose of request"></textarea>
	</div>
	<button type="submit" class="btn btn-info" >Save</button>

</form>

			
</div>
</div>
</div>
</div>

<?php include 'footer.php' ?>

