<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?php include('includes/pagetitle.php');?>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <!-- <div class="home-btn d-none d-sm-block">
                <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
            </div> -->
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url();?>assets/images/vendtap_logo.png" alt="" height="80"></a>
                        </div>
                        <h5 class="font-18 text-center">Sign in to continue to Vendtap.</h5>
                        <form class="form-horizontal m-t-30" action="<?php echo base_url();?>Login/verifyLogin" method="post">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Username</label>
                                    <input class="form-control" type="text" required="" placeholder="Username" name="username">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary">
                                            <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                                  </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <?php if($this->session->flashdata('message')){
                                   echo $this->session->flashdata('message');
                               } ?>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/waves.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
        
    </body>

</html>