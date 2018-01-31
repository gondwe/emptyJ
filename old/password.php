<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            

<?php 
$me =  $_SESSION[$ndk]["inside"]["id"];
$type =  $_SESSION[$ndk]["inside"]["usertype"];


if(!empty($_POST)){
    $p = clean($_POST["cpass"]);
    $p2 = clean($_POST["pass"]);
    $p3 = clean($_POST["pass2"]);
    if($p2 == $p3){
        if(password_verify($p,fetch("select pass from truck_users where id ='$me'"))){
            $_POST["pass"] = password_hash($p3,PASSWORD_DEFAULT);
            unset($_POST["pass2"]);
            unset($_POST["cpass"]);
            if(update("truck_users", $me)){success("Update Successful");}
        }else{
            error("Verification Error");
        }
            
    }else{
        error("Passwords Dont Match");
    }
}



?>


<form class="form-horizontal m-t-40" method="post" action="" enctype="form-data">
<h3>Update Password</h3>
<div class="form-group">
<label>Current Password</label>
<input required type="password" class="form-control" name="cpass"  value="password">
</div>

<div class="form-group">
<label>New Password</label>
<input required type="password" class="form-control" name="pass"  value="password">
</div>

<div class="form-group">
<label>Confirm Password</label>
<input required type="password" name="pass2" class="form-control" value="password">
</div>

<div class="form-group">
<button  type="submit" class="btn btn-success" >Save</button>
</div>

</form>
</div>
</div>

<?php include 'footer.php' ?>
