<?php include 'head.php' ?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(assets/images/background/login-register.jpg);">
  <div class="login-box card">
    <div class="card-block">
      <form class="form-horizontal form-material" id="loginform" action="" method="post">
        <a href="javascript:void(0)" class="text-center db"><i style="font-size:50px;"class="mdi mdi-truck-delivery light-logo"></i></br><h2>Empty Journeys </h2></a>  
        

        <?php 
             
             if(isset($_SESSION[$ndk]["inside"])){ header("location:index.php"); }
             if(!empty($_POST)){
                $p = clean($_POST["tel"]); $p2 = clean($_POST["pass"]);
                
                if(!empty($pass = fetch("select pass from truck_users where tel='$p'"))){
                  if(password_verify($p2, $pass)){
                    $_SESSION[$ndk]["inside"] = getlist("select * from truck_users where tel='$p'");
                    header("location:index.php");
                  }else{
                    spill("Wrong Password. Please try Again");
                  }
                }else{
                  error("User not found. Please register your phone No.");
                }

                if($p == $p2){
                    $_POST["pass"] = password_hash($_POST["pass"],1);unset($_POST["pass2"]);
                   if(insert("truck_users")){success("Registration successful. Please Login");}
                }
            }
        ?>

        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Username"  name="tel">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" placeholder="Password"  name="pass">
          </div>
        </div>

        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
              <!-- <a href="dashboard.php">Log In</a> -->
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
          </div>
        </div>
      </form>
      <form class="form-horizontal" id="recoverform" action="index.html">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>