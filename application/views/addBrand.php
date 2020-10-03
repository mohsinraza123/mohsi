
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
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/head.php');?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/side.php');?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Add Brand</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                                        <li class="breadcrumb-item active">Add Brand</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <!--PAGE CONTENT-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Add New Brand</h4>
                                        <hr>
                                        
                                        <form method="post" action="<?php echo base_url();?>Brand/saveBrand">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" name="Brand" Placeholder="Enter Brand Name" required="">
                                                </div>
                                                <div class="col-5">
                                                	<button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                            
                                           <br>
                                            <hr>
                                            
                                        </form>
                                        
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->   
                        <!--END PAGE CONTENT-->
                        
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->
                <?php include('includes/foot.php');?>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/metismenu.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/waves.min.js"></script>
        

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
                
    </body>

</html>