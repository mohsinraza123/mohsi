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
        <!-- DataTables -->
        <link href="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
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
                                    <h4 class="page-title">Invoice</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                                        <li class="breadcrumb-item active">Invoice's List</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <!--PAGE CONTENT-->
                        <div class="row">
                            <div class="col-12">
                                <div class="m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Invoice's List</h4>
                                        <br>
                                        <input type="hidden" id="limit" value="<?php echo $limit;?>">
                                        <input type="hidden" id="offset" value="<?php echo $offset;?>">
                                        <div class="row inovices">
                                            <div class="col-lg-6">
                                                <div class="card faq-box border-success">
                                                    <div class="card-body">
                                                        <div class="faq-icon float-right">
                                                            <i class="fas fa-question-circle font-24 mt-2 text-success"></i>
                                                        </div>
                                                        <h5 class="text-success">DE-4511</h5>
                                                        <h5 class="font-16 mb-3 mt-4">10th Ave Food Centersxxx</h5>
                                                        <p class=" mt-2 mb-0">10/05/2020 12:56 PM<span class="float-right">Total Bill: $765.00</span></p>
                                                        <p class="text-danger float-right">Balance: $765.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card faq-box border-danger">
                                                    <div class="card-body">
                                                        <div class="faq-icon float-right">
                                                            <i class="fas fa-question-circle font-24 mt-2 text-danger"></i>
                                                        </div>
                                                        <h5 class="text-danger">DE-6355</h5>
                                                        <h5 class="font-16 mb-3 mt-4">10th Ave Food Centersxxx</h5>
                                                        <p class=" mt-2 mb-0">10/05/2020 12:56 PM<span class="float-right">Total Bill: $765.00</span></p>
                                                        <p class="text-danger float-right">Balance: $765.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card faq-box border-warning">
                                                    <div class="card-body">
                                                        <div class="faq-icon float-right">
                                                            <i class="fas fa-question-circle font-24 mt-2 text-warning"></i>
                                                        </div>
                                                        <h5 class="text-warning">DE-5344</h5>
                                                        <h5 class="font-16 mb-3 mt-4">10th Ave Food Centersxxx</h5>
                                                        <p class=" mt-2 mb-0">10/05/2020 12:56 PM<span class="float-right">Total Bill: $765.00</span></p>
                                                        <p class="text-danger float-right">Balance: $765.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card faq-box border-primary">
                                                    <div class="card-body">
                                                        <div class="faq-icon float-right">
                                                            <i class="fas fa-question-circle font-24 mt-2 text-primary"></i>
                                                        </div>
                                                        <h5 class="text-primary">DE-1145</h5>
                                                        <h5 class="font-16 mb-3 mt-4">10th Ave Food Centersxxx</h5>
                                                        <p class="mt-2 mb-0">10/05/2020 12:56 PM<span class="float-right">Total Bill: $765.00</span></p>
                                                        <p class="text-danger float-right">Balance: $765.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/waves.min.js"></script>
        
        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url();?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url();?>assets/pages/datatables.init.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var offset = $("#offset").val();
                var limit = $("#limit").val();
            });
        </script>
    </body>
</html>