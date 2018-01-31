<?php include 'head.php' ?>
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               
                
                

<?php 
    if(!empty($_POST)){
        $p = clean($_POST["pass"]);$p2 = clean($_POST["pass2"]);
        if($p == $p2){
            $_POST["pass"] = password_hash($_POST["pass"],PASSWORD_DEFAULT);unset($_POST["pass2"]);
           if(insert("truck_users")){success("Registration successful. Please Login");}
        }
    }
?>
                <div class="row card " style="margin-top:5%;">
                
                 <div class="container col-md-6 ">
                     
                     <h2 class="text-center" style='margin-top:5%;'>Register As A Driver</h2>
                     
                    <form class="form-horizontal m-t-40" method="post" action="">
                        
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input required type="number" size=9 name="tel" class="form-control" placeholder="Enter your primary contact No.">
                                </div>
                        
                                    <input type="hidden"  name="usertype" value="2">
                        
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="password" class="form-control" name="pass"  value="password">
                                </div>
                        
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input required type="password" name="pass2" class="form-control" value="password">
                                </div>
                                
                                
                                
                                <div class="form-group row p-t-20">
                                   
                                    <!-- <div class="col-sm-12"> -->
                                        <div class="h6">
                                            <!-- <label class="custom-control custom-checkbox"> -->
                                                <!-- <input type="checkbox" class="custom-control-input"> -->
                                                <!-- <span class="custom-control-indicator"></span> -->
                                                <small class="custom-control-description"><a href="terms.php">By clicking on Register button, you acknowledge to accept Terms of Use. Thank You*</a></small>
                                            <!-- </label> -->
                                        <!-- </div> -->
                                       
                                            
                                    </div>
                                    
                                    
                                    
                                </div>
                        
                        <div class="form-group">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <a href="index.php" class="btn btn-success">Cancel</a>
                                        </div> 
     
                        </div>      
                            </form>
                    
                    
                </div>
                </div>
                
                
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<?php include 'footer.php' ?>
