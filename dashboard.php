<?php include 'head.php' ?>
<?php include 'nav.php';?>                
               



        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="card ">
                          
                            <div class="card-block">
                                <h3 class="card-title">Account Summary</h3>
                                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><?=fetch("select count(id) from truck where user_id = '$me'")?></h1>
                                <h6 class="text-white">Registerd Trucks</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?=fetch("select count(id) from truck_driving where truck_owner_id = '$me'")?></h1>
                                <h6 class="text-white">Registred Drivers</h6>
                            </div>
                        </div>
                    </div>                
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?=fetch("select count(id) from truck_schedule where truck_id in (select id from truck where user_id = '$me') ")?></h1>
                                <h6 class="text-white">Journeys Listed</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?=fetch("select count(id) from truck_booking where booking_id in 
																			(select id from truck_schedule where truck_id in 
																				(select id from truck where user_id = '$me') )" )?></h1>
                                <h6 class="text-white">Journeys Booked</h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
                            </div>
                        </div> 
                
                
                
                <div class="card ">
                          
                            <div class="card-block">
                                <h3 class="card-title">My Account</h3>
                                <div class="row">
                                    
                            <div class="col-md-3">       
                            <a class="btn btn-block btn-outline-info" href="./profile.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Profile Details</span></a>
                             </div> 
                                    
                            <div class="col-md-3">       
                            <a class="btn btn-block btn-outline-info" href="./profile.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Transacations History</span></a>
                             </div>
                                    
                            <div class="col-md-3">       
                            <a class="btn btn-block btn-outline-info" href="./profile.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Your Journeys</span></a>
                             </div>  
                                    
                            <div class="col-md-3">       
                            <a class="btn btn-block btn-outline-info" href="./profile.php" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Recieve Promotional Sms</span></a>
                             </div>        
                                    
                                </div></div></div>
                </div></div>
                                
<?php include 'footer.php' ?>                                
            
