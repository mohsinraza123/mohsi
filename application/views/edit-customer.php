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
                                    <h4 class="page-title">Update Customer</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                                        <li class="breadcrumb-item active">Update Customer</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <!--PAGE CONTENT-->
                        <div class="row">
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
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Update Customer</h4>
                                        <hr>
                                        
                                        <form method="post" action="<?php echo base_url();?>Customer/updateCustomer/<?php echo $id;?>">
                                            <input type="hidden" name="Balance" value="<?php echo $result['Balance'];?>">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Customer Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="Name" Placeholder="Name" required="" value="<?php echo $result['Name'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="email" name="Email" required="" placeholder="Email" value="<?php echo $result['Email'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="Phone" required="" placeholder="(718)851-2808" value="<?php echo $result['Phone'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Category</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="BillingContact" required="" placeholder="Category" value="<?php echo $result['BillingContact'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h4 class="mt-0 header-title">Shipping Address</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" type="text" name="Address" id="Address" placeholder="Address" required=""><?php echo $result['Address'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">City</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="City" type="text" required="" placeholder="City" id="City" value="<?php echo $result['City'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">State</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="State" id="State" required="" placeholder="State" value="<?php echo $result['State'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Zip</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="Zip" required="" placeholder="Zip" id="Zip" value="<?php echo $result['Zip'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <h4 class="mt-0 header-title">Billing Address</h4> 
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" data-parsley-multiple="groups"
                                                               data-parsley-mincheck="2" name="OnHand">
                                                        <label class="custom-control-label" for="customCheck1">Address<code> (Check if same as above)</code></label>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" type="text" name="BillingAddress" placeholder="Address" required="" id="BillingAddress"><?php echo $result['BillingAddress'];?></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">City</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="BillingCity" type="text" required="" placeholder="City" id="BillingCity" value="<?php echo $result['BillingCity'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">State</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="BillingState" id="BillingState" required="" placeholder="State" value="<?php echo $result['BillingState'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Zip</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="BillingZip" required="" placeholder="Zip" id="BillingZip" value="<?php echo $result['BillingZip'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <hr>
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
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
        
        <script type="text/javascript">
            $("#customCheck1").change(function() {
                if(this.checked) {
                    //GET THE VALUES ON CHECK
                    var address = $("#Address").val();
                    var city = $("#City").val();
                    var state = $("#State").val();
                    var zip = $("#Zip").val();

                    // SET THE VALUES
                    $("#BillingAddress").val(address);
                    $("#BillingCity").val(city);
                    $("#BillingState").val(state);
                    $("#BillingZip").val(zip);
                }
                else{
                    $("#BillingAddress").val("");
                    $("#BillingCity").val("");
                    $("#BillingState").val("");
                    $("#BillingZip").val("");
                }
            });
        </script>
        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.js"></script>
    </body>

</html>