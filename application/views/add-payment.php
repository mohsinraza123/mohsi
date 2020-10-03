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

        <!-- Select2 -->
        <!-- This Page CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/select2.min.css">
        
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .text-chota{
                font-size: 14px;
                font-weight: normal;
            }
        </style>
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
                                    <h4 class="page-title">Payment</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                                        <li class="breadcrumb-item active">Add Payment</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <!--PAGE CONTENT-->
                        <!-- ROW START -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Add Payment</h4><br>
                                        <form method="post" action="#">
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="select2 form-control custom-select" name="customer" id="customer" required="">
                                                        <option value="">Select Customer</option>
                                                        <?php

                                                            $curl = curl_init();
                                                            
                                                            curl_setopt_array($curl, array(
                                                              CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/customers/Getcustomers/".$this->session->userdata('CompanyID'),
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
                                                            $res = json_decode($response, true);
                                                            
                                                            foreach($res as $key => $val){
                                                            ?>
                                                        <option value="<?php echo $val['CustomerID'];?>"><?php echo $val['Name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <select class="select2 form-control custom-select" name="customer" id="customer" required="">
                                                        <option value="">Select Invoice</option>
                                                        <?php

                                                            $curl = curl_init();
                                                            
                                                            curl_setopt_array($curl, array(
                                                              CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/customers/Getcustomers/".$this->session->userdata('CompanyID'),
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
                                                            $res = json_decode($response, true);
                                                            
                                                            foreach($res as $key => $val){
                                                            ?>
                                                        <option value="<?php echo $val['CustomerID'];?>"><?php echo $val['Name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!--ROW END-->
                                            <!--ROW START-->
                                            <div class="row">
                                                <div class="col-4">
                                                    <select class="form-control" name="paymentMethod">
                                                        <option value="">Select One</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" name="Amount" Placehoder="Enter amount" class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" name="ChequeNo" Placehoder="Enter Cheque Number" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <!--ROW END-->
                                            <!--ROW START-->
                                            <div class="row">
                                                
                                                
                                            </div>
                                            <!--ROW END-->
                                            
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

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
        <!-- Select2 -->
        <!-- This Page JS -->
        <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/select2.init.js"></script>
    </body>
</html>