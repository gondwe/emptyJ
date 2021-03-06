
<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <style>
    
        .light-logo{
            
            color: #fff;
            font-size: 37px;
        }
        
    </style>
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">

                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <i class="mdi mdi-truck-delivery dark-logo"> </i>
                            <!-- Light Logo icon -->
                        
                            <i class="mdi mdi-truck-delivery light-logo"></i>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
   
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    
                    <!-- ============================================================== -->
                
                    <ul class="navbar-nav my-lg-0">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-ke"></i></a>
                           
                        </li>
                    </ul>


                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" class="pull-left">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <?php if(!isset($_SESSION[$ndk]["inside"])) { ?>
                        <li>
                            <a class="has-arrow" href="./login.php" aria-expanded="false"><i class="mdi mdi-key"></i><span class="hide-menu">Login</span></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($_SESSION[$ndk]["inside"])) { ?>
                        <li>
                            <a class="has-arrow " href="./profile.php" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        
                            <?php profile_handler() ?>
                        
                        <?php }else{ ?>
                        <li>
                            <a class="has-arrow " href="./about.php" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">About Us</span></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($_SESSION[$ndk]["inside"])) { ?>
                        <li class="pull-right">
                            <a class="has-arrow" href="./logout.php" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a>
                           
                        </li>
                        <?php } ?>
                    </ul>
                    
                </nav>


                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->