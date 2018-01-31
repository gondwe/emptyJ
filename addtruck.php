<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container col-md-12">
            
            

<?php 
    if(!empty($_POST)){

        $_POST["user_id"] = $_SESSION[$ndk]["inside"]["id"];
        if(insert("truck")){header("location:trucks.php");}
    }
    
    
    

?>
                
                
                
<div class="col-md-12" style="margin-top:20px;">
    
    <div class="row">
    <div class="col-md-3">
    
    </div>  
     
    
    <div class="col-md-6">
    <div class="card card-block ">              
             
            <form class="form-horizontal m-t-40 " method="post" action="" enctype="multipart/form-data">
 
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
                                    <select required name="type" class="form-control" value="">
                                        <?php 
                                            foreach($truck_types as $t=>$r):
                                                echo "<option value='$t' >$r</option>";
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                        
                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input required type="text" name="capacity" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Model</label>
                                    <select required name="model" class="form-control" value="">
                                        <?php 
                                            foreach($truck_models as $t=>$r):
                                                echo "<option value='$t' >$r</option>";
                                            endforeach;
                                        ?>
                                    </select>
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
     </div>    
</div>                

</div>
</div>



<?php include 'footer.php' ?>
