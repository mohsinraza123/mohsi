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
                                    <h4 class="page-title">Customer</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                                        <li class="breadcrumb-item active">Customer Detail</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <?php

                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                              CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/customers/getCustomer/".$id,
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => "",
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => "GET",
                              CURLOPT_HTTPHEADER => array(
                                "APIKey:".APIKey
                              ),
                            ));

                            $response = curl_exec($curl);

                            curl_close($curl);
                            // echo $response;die;
                            $result = json_decode($response, true);
                            // echo $result['CustomerID'];die;
                        ?>

                        <!--PAGE CONTENT-->
                        <div class="row m-t-4">
                            <div class="col-xl-4 col-md-4">
                                <div class="card pricing-box mt-4">
                                    <div class="pricing-icon">
                                        <i class="icon-profile-add bg-primary"></i>
                                    </div>
                                    <div class="pricing-content">
                                        <div class="text-center">
                                            <h5 class="text-uppercase mt-5"><?php echo $result['Name'];?></h5>
                                            <div class="pricing-plan mt-4 pt-2">
                                                <h1><sup>$ </sup><?php echo $result['Balance'];?> <small class="font-16">/ <span class="text-danger">Net Debit</span></small></h1>
                                            </div>
                                            <div class="pricing-border mt-5"></div>
                                        </div>
                                        <div class="pricing-features mt-4">
                                                <p class="font-14 mb-2"><i class="ti-check-box text-primary mr-3"></i> 45 Total invoices </p>
                                                <p class="font-14 mb-2"><i class="ti-check-box text-primary mr-3"></i> 11 Closed invoices</p>
                                                <p class="font-14 mb-2"><i class="ti-check-box text-primary mr-3"></i> 26 Active Invoices </p>
                                        </div>
                                        <div class="pricing-border mt-4"></div>
                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-dark btn-round" data-toggle="tooltip" data-placement="top" data-original-title="Add Invoice">Invoice</a>
                                            <a href="" class="btn btn-dark btn-round" data-toggle="tooltip" data-placement="top" data-original-title="Add Payment">Payment</a>
                                            <a href="" class="btn btn-dark btn-round" data-toggle="tooltip" data-placement="top" data-original-title="Statement">Statement</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 card mt-4">
                                <div class="friends-suggestions">
                                    <a href="#" class="friends-suggestions-list">
                                        <div class="border-bottom position-relative" >
                                            <a href="<?php echo base_url();?>Customer/editCustomer/<?php echo $id;?>">
                                                <div class="suggestion-icon float-right mb-2 pt-1" data-toggle="tooltip" data-placement="top" data-original-title="Edit Customer">
                                                    <i class="mdi mdi-pencil"></i>
                                                </div>
                                            </a>
                                            <div class="">
                                                <h4 class="mb-1 pt-2 text-dark">Personal Information</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <table class="table table-bordered mt-4">
                                    <tr>
                                        <th>Name</th>
                                        <td><?php echo $result['Name'];?></td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $result['Phone'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $result['Email'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td><?php echo $result['BillingAddress'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $result['Address'];?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $result['City'];?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><?php echo $result['State'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Zip</th>
                                        <td><?php echo $result['Zip'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
        
    </body>

</html>