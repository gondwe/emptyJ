<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               <h3 class="m-3">My Clients</h3>
               <h5 class="m-3">Truck Owners</h5>

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

               
                            
               foreach($customers as $o=>$w){
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
               <?php include 'footer.php' ?>
