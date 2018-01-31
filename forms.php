<?php include 'head.php' ?>
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
               

                
                <div class="row card " style="margin-top:5%;">
                
                 <div class="container col-md-6 ">
                     
                     <h2 class="text-center" style='margin-top:5%;'>Register As A Shipper</h2>
                     
                    <form class="form-horizontal m-t-40">
                        
                        
                                <div class="form-group">
                                    <label>Shipper</label>
                                    <select class="custom-select col-12" name="shipper">
                                        <option selected="">Choose...</option>
                                        <option value="1">Private</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                        
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                                    <input type="email" id="example-email" name="email" class="form-control" placeholder="Email">
                                </div>
                        
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="pnumber" class="form-control" value="">
                                </div>
                        
                                <div class="form-group">
                                    <label>Residential/Commercial Address</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                        
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" value="password">
                                </div>
                        
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" value="password">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>Read only input</label>
                                    <input class="form-control" type="text" placeholder="Readonly input here…" readonly="">
                                </div>
                                <div class="form-group">
                                    <fieldset disabled="">
                                        <label for="disabledTextInput">Disabled input</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                    </fieldset>
                                </div>
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="form-check has-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="checkboxSuccess" value="option1"> Checkbox with success
                                            </label>
                                        </div>
                                        <div class="form-check has-warning">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="checkboxWarning" value="option1"> Checkbox with warning
                                            </label>
                                        </div>
                                        <div class="form-check has-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="checkboxDanger" value="option1"> Checkbox with danger
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Check this custom checkbox</span>
                                            </label>
                                        </div>
                                        <div class="form-check bd-example-indeterminate">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Check this custom checkbox</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Check this custom checkbox</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Toggle this custom radio</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Or toggle this other custom radio</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <fieldset class="form-group">
                                    <label>Default file upload</label>
                                    <label class="custom-file d-block">
                                        <input type="file" id="file" class="custom-file-input">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </fieldset>
                                <div class="form-group">
                                    <label>Default file upload</label>
                                    <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
                                </div>
                                <div class="form-group">
                                    <label>Custom File upload</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-secondary btn-file"> 
                                            <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="...">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                </div>
                                <div class="form-group">
                                    <label>Helping text</label>
                                    <input type="text" class="form-control" placeholder="Helping text">
                                    <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
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
