<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               <h3 class="m-3">Subscriptions</h3><hr/>
               <style>#flash{color:green}</style>
    <h5 id="flash"></h5>
               <?php 
    $m = date("m");
    $id = $_REQUEST["id"];

    if(isset($_POST["status"])){
    $ss = $_POST["status"];
    $found = fetch("select count(id) from truck_sub where user_id = '$id' and month(sub_month) = '$m'");
    if($found){
        process("update truck_sub set status = '$ss' where user_id = '$id' and month(sub_month) ='$m'");
    }else{
        process("insert into truck_sub(user_id, status) values('$id','$ss')") ;
    }
}




               $status = $_REQUEST["s"];
               $user = getlist("select * from truck_sub where user_id = '$id' and month(sub_month) = '$m'");
                //    spill($owners);

                $status = isset($user["status"])? $user["status"] : $status;
                   $active = $status === "1"? 
                   "<div class='btn btn-success'  >Active</div>" 
                   : ( $status === "0"? 
                   "<div class='btn btn-warning'  >Pending</div>" : 
                   "<div class='btn btn-danger'  >Unsubscribed</div>");

                   $action = $status === "1"? "<span style='color:red'>UnSubscribe" : ( $status === "0"? "Activate" : "Subscribe");

                   
                   $vid = $status === "1"? 0 : 1;
                   $tbl = truck_table($id) ;

                  
                   $mydata = getlist("select * from `$tbl` where user_id = '$id'");
                   if(!empty($mydata)){
                   echo '<h3 class="mt-3"></h3>';
                   echo "<div><img src='".getimage($truck_table."/".$mydata['photo'])."' class='pull-left m-3' width=100 ></div>";
                   echo '<div class="pull-left m-5">';
                   echo "<div><b>Names :</b>".$mydata["full_name"]."</div>";
                   echo "<div><b>Address :</b>".$mydata["address"]."</div>";
                   echo "<div><b>Email :</b>".$mydata["email"]."</div>";
                   echo "</div>";
                   }

                   echo "<form class='pull-right m-4' method='post' action=''>
                   <div class='m-3'>Status $active </div>
                   <input type='hidden' name='status' value='$vid'>
                   <input type='hidden' name='user_id' value='$id'>
                   <div class='m-3'>Action <button type='submit' class='btn btn-success'  >$action</button></div>
                   </form>";

?>


<!-- <form action="" method="post">
    <button class="btn btn-primary">Subscribe</button>
    <button class="btn btn-danger">UnSubscribe</button>
</form> -->
               </div>
               </div>
               </div>
               <?php include 'footer.php' ?>
