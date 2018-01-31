<?php include 'head.php' ?>
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               

                
                <div class="row card " style="margin-top:5%;">
                
                 <div class="container col-md-6 ">
                     
                     <h2 class="text-center" style='margin-top:5%;'>Register As A Broker</h2>
                     
                    <form class="form-horizontal m-t-40">
                        
                        
                                <h3>Business Details</h3>
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" name="bname" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Business Registration Number</label>
                                    <input type="text" name="bname" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>County Of Operation</label>
                                    <select class="custom-select col-12" name="location">
                                        <option selected="">Choose...</option>
                                        <option value="1">Nakuru</option>
                                        <option value="2">Kisumu</option>
                                        <option value="3">Mombasa</option>
                                    </select>
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Residential/Commercial Address</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                        
                        
                        
                        
                                <h3>Contact Person Details</h3>
                        
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input type="email"  name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="pnumber" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="password">
                                </div>
                        
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" value="password">
                                </div>
                                
                                
                                
                                <div class="form-group row p-t-20">
                                   
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description"><a href="">Accept Terms of Use *</a></span>
                                            </label>
                                        </div>
                                       
                                            
                                    </div>
                                    
                                    
                                    
                                </div>
                        
                        <div class="form-group">
                                <div class="col-sm-5">
                                    <button class="btn btn-primary">Register</button>
                                    <a href="index.php" class="btn btn-success">Cancel</a></button>
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
