<?php include 'head.php' ?> 
<?php include 'nav.php' ?>
<?php 

if(isset($_POST["town"])){
    insert("truck_towns");
}

?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
<h3 class='m-3'>Truck Locations & Towns</h3>
<form action="" method="post">
<input type="text" name="town" placeholder=" Add New Location">
</form>

<div class="m-3">
<h4>Enlisted Towns</h4>
<?php 
$towns = getlist("select town from truck_towns");
// spill($towns);
?>
<ol>
<?php foreach($towns as $item): ?>
		<li ><?=$item?></li>
		<?php endforeach ?>
</ol>

<!-- </div> -->
</div>
</div>
</div>
<?php include 'footer.php' ?>
