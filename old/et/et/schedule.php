<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluplaceholder  -->
            <!-- ============================================================== -->
            <div class="container">
            
<a href="./truck_schedule.php"><button class="m-2 btn btn-success pull-right">View Schedule</button></a>
<h3 class='m-3'>Schedule Transit</h3>

<?php 
    $me =  $_SESSION[$ndk]["inside"]["id"];
    if(!empty($_POST)){
        
        // $_POST["user_id"] = $_SESSION[$ndk]["inside"]["id"];
        if(insert("truck_schedule")){success("Scheduling successful");}

    }
?>


<form action="" method="post" class="form ">
    <div class="form-group">
    <label for="">Departure Town</label>
        <select name="town_from" class="form-control" id="">
            <?php foreach(getlist("select id, town from truck_towns") as $t=>$o):?>
            <option value="<?=$t?>"><?=$o?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
    <label for="">Destination Town</label>
        <select name="town_to" class="form-control" id="">
            <?php foreach(getlist("select id, town from truck_towns") as $t=>$o):?>
            <option value="<?=$t?>"><?=$o?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
    <label for="">Truck</label>
        <select name="truck_id" class="form-control" id="">
            <?php foreach(getlist("select id, concat(number_plate,' ',name) from truck where user_id = '$me' and id in (select truck_id from truck_driving where status=1)") as $t=>$o):?>
            <option value="<?=$t?>"><?=$o?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Departure Time</label>
        <input type="time" class="form-control"  name="dep_time" id="">
    </div>
    <div class="form-group">
        <input type="number" name="eta" class="form-control" placeholder="e.t.a in hrs">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="transit_date" id="">
    </div>
    <button type="submit">Save</button>
</form>

</div>
</div>
                                
<?php include 'footer.php' ?>
