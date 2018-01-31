<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               

               
<?php 
        // switch($_SESSION[$ndk]["inside"]["usertype"] ){
        //     case 1 : $table = "truck_owner"; break;
        //     case 2 : $table = "truck_driver"; break;
        //     case 3 : $table = "truck_customer"; break;
        // }
    if(!empty($_POST)){
        
        // $_POST["user_id"] = $_SESSION[$ndk]["inside"]["id"];
        $_POST["user_id"] = $me;
        if(insert($truck_table)){header("location:index.php");}

    }

?>

                
                
<div class="col-md-12">
   <div class="row" style="margin-top:20px;">
      <div class="col-md-3"></div>  
       
    <div class="col-md-6">
<div class="card card-outline-info" style="padding:20px 20px 20px 20px">   
<form class="form-horizontal m-t-40" method="post" action="" enctype="multipart/form-data">
 
<!-- update truck owners info -->
 <?php if($truck_table == "truck_owner") { ?>

                        <h3>Personal Details</h3>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input required type="text" name="full_name" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Business Registration Number</label>
                                    <input required type="text" name="regno" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Residential/Commercial Address</label>
                                    <textarea required name="address" class="form-control" rows="5"></textarea>
                                </div>
                        

                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input required type="email"  name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input required type="file" name="photo" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" >Save</button>
                                </div>
    
    <!-- update truck driver info  -->
    <?php }elseif($truck_table == "truck_driver"){ ?>
        

                        <h3>Personal Details</h3>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input required type="text" name="full_name" class="form-control" value="">
                                </div>
                               
                                                   
                                <div class="form-group">
                                    <label>ID Number</label>
                                    <input required type="text" name="id_no" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Driving License Number</label>
                                    <input required type="text" name="license_no" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Personal Address</label>
                                    <textarea required name="address" class="form-control" rows="5"></textarea>
                                </div>
                        

                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input required type="email"  name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input required type="file" name="photo" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" >Save</button>
                                </div>
                        
    
    <!-- update customer info  -->
    <?php } elseif($truck_table == "truck_customer") { ?>
        

                        <h3>Personal Details</h3>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input required type="text" name="full_name" class="form-control" value="">
                                </div>
                               
                                                   
                                <div class="form-group">
                                    <label>ID Number</label>
                                    <input required type="text" name="id_no" class="form-control" value="">
                                </div>
                        
                        
                                <div class="form-group">
                                    <label>Personal Address</label>
                                    <textarea required name="address" class="form-control" rows="5"></textarea>
                                </div>
                        

                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input required type="email"  name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input  type="file" name="photo" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-success" >Save</button>
                                </div>
                        
                         
    
    <!-- update customer info  -->
    <?php } elseif($truck_table == "truck_admin") { ?>
        

                        <h3>Personal Details</h3>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input required type="text" name="full_name" class="form-control" value="">
                                </div>
                                                       
                                <div class="form-group">
                                    <label>Personal Address</label>
                                    <textarea required name="address" class="form-control" rows="5"></textarea>
                                </div>
                        

                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input required type="email"  name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input  type="file" name="photo" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-info" >Save</button>
                                </div>
                        
   
    <?php     } ?>                       


                                </form>
                                </div>

    </div>                
         
                   
</div>                
                      
</div>                
                
                
                                </div>
                                </div>
                                
<?php include 'footer.php' ?>
