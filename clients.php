<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                
                
                <div class="col-md-12" style="margin-top:20px;">
                        <div class="card">
                            <div class="card-block p-b-0">
                                <h4 class="card-title">Clients</h4>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Customers</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Drivers</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Fleet Managers</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                        
               <h5 class="m-3">Customers</h5>

               <?php 
               $m = date("m");
               $owners = get("select tow.*, tu.tel, ts.status from truck_owner as tow left join truck_users as tu on tu.id = tow.user_id left join truck_sub as ts on ts.user_id = tow.user_id and month(ts.sub_month) = '$m'");
               $drivers = get("select tow.*, tu.tel, ts.status from truck_driver as tow left join truck_users as tu on tu.id = tow.user_id left join truck_sub as ts on ts.user_id = tow.user_id and month(ts.sub_month) = '$m'");
               $customers = get("select tow.*, tu.tel, ts.status from truck_customer as tow left join truck_users as tu on tu.id = tow.user_id left join truck_sub as ts on ts.user_id = tow.user_id and month(ts.sub_month) = '$m'");
            //    spill($owners);
               
               echo '<table class="table-bordered m-4" width=100%>';
               echo "<tr>";
               echo "<th>Name</th>";
               echo "<th>Tel</th>";
            //    echo "<th>Address</th>";
               echo "<th>Action</th>";
               echo "</tr>";
               
             
               
                            
               foreach($customers as $o=>$w){
                   $active = $w["status"] === "1"? 
                   "<button class='btn btn-success'  >Active</button>" 
                   : ( $w["status"] === "0"? 
                   "<button class='btn btn-warning'  >Pending</button>" : 
                   "<button class='btn btn-danger'  >Unsubscribed</button>");
                   echo "<tr>";
                   echo "<td> ".$w["full_name"]."</td>";
                   echo "<td> +254 ".$w["tel"]."</td>";
                   ?><td><a href="truck_subscriptions.php?id=<?=$w['user_id'] ?>&s=<?=$w["status"]?>" ><?=$active ?></a></td><?php
                   echo "</tr>";
               }

               
               ?>
               </table>

                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="profile2" role="tabpanel"> <h5 class="m-3">Drivers</h5>
								
								<?php 
									echo '<table class="table-bordered m-4" width=100%>';
								   echo "<tr>";
								   echo "<th>Name</th>";
								   echo "<th>Tel</th>";
								//    echo "<th>Address</th>";
								   echo "<th>Action</th>";
								   echo "</tr>";

								   
               
               foreach($drivers as $o=>$w){
                   $active = $w["status"] === "1"? 
                   "<button class='btn btn-success'  >Active</button>" 
                   : ( $w["status"] === "0"? 
                   "<button class='btn btn-warning'  >Pending</button>" : 
                   "<button class='btn btn-danger'  >Unsubscribed</button>");
                   echo "<tr>";
                   echo "<td> ".$w["full_name"]."</td>";
                   echo "<td> +254 ".$w["tel"]."</td>";
                //    echo "<td> ".$w["address"]."</td>";
                   ?><td><a href="truck_subscriptions.php?id=<?=$w['user_id'] ?>&s=<?=$w["status"]?>" ><?=$active ?></a></td><?php
                   echo "</tr>";
               }

								?>
								</table>
								
								
								</div>
                                <div class="tab-pane p-20" id="messages2" role="tabpanel"> <h5 class="m-3">Fleet Managers</h5>
								<?php 
								
								 
               echo '<table class="table-bordered m-4" width=100%>';
               echo "<tr>";
               echo "<th>Name</th>";
               echo "<th>Tel</th>";
            //    echo "<th>Address</th>";
               echo "<th>Action</th>";
               echo "</tr>";
               
               foreach($owners as $o=>$w){
                   $active = $w["status"] === "1"? 
                   "<button class='btn btn-success'  >Active</button>" 
                   : ( $w["status"] === "0"? 
                   "<button class='btn btn-warning'  >Pending</button>" : 
                   "<button class='btn btn-danger'  >Unsubscribed</button>");
                   echo "<tr>";
                   echo "<td> ".$w["full_name"]."</td>";
                   echo "<td> +254 ".$w["tel"]."</td>";
                //    echo "<td> ".$w["address"]."</td>";
                   ?><td><a href="truck_subscriptions.php?id=<?=$w['user_id'] ?>&s=<?=$w["status"]?>" ><?=$active ?></a></td><?php
                   echo "</tr>";
               }

             
								
								?>
								</table>
								
								
								
								</div>
                            </div>
                        </div>
                    </div>
                
                
               


               </div>
               </div>
               <?php include 'footer.php' ?>
