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
		insert("truck_sms");
		$ut = $_POST["user_category"];
		$admin = $_POST["admin_id"];
		$message = $_POST["message"];
		$u = getlist("select distinct(id) from truck_users where usertype = '$ut'");
		
		// spill($u);
		
		foreach($u as $v){
			process("insert into truck_inbox (msgfrom, subject, msgto, message) values('$admin', 'eTrip Admin Notification', '$v', '$message')");
		}
		
	}
		$utypes = [1=>"Fleet Managers",2=>"Drivers",3=>"Customers",4=>"Admins",5=>"Developers",];
		
		
	
	?>
	
	<form method="post" action="" >
		<div class='form-group'>
		<label>Select Category</label>
		<input type='hidden' name='admin_id' value="<?=$me?>" >
		<select name='user_category' class='form-control'>
			<?php foreach($utypes as $u=>$t): ?>
			<option value="<?=$u?>" ><?=$t?></option>
			<?php endforeach; ?>
		</select>
		</div>
		<div class='form-group'>
		<textarea name='message' class='form-control' placeholder='Type Message'></textarea>
		</div>
		<button type='submit' class='btn btn-primary'>Send</button>
		</div>
	</form>
	
</div>
</div>
</div>
</div>




<?php include 'footer.php' ?>

