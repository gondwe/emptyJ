<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            

<?php 
    if(!empty($_POST)){

        $_POST["user_id"] = $_SESSION[$ndk]["inside"]["id"];
        if(insert("truck")){header("location:trucks.php");}
    }

?>


            <form class="form-horizontal m-t-40" method="post" action="" enctype="multipart/form-data">
 
                        <h3>Truck Details</h3>
                                <div class="form-group">
                                    <label>Number Plate</label>
                                    <input required type="text" name="number_plate" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input required type="text" name="name" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Type</label>
                                    <input required type="text" name="type" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input required type="text" name="capacity" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Model</label>
                                    <input required type="text" name="model" class="form-control" value="">
                                </div>
                        

                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" >Save</button>
                                </div>
                        
                                </form>

</div>
</div>

<?php include 'footer.php' ?>
