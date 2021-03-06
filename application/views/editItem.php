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
                                    <h4 class="page-title">Update Item</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Item</a></li>
                                        <li class="breadcrumb-item active">Update Item</li>
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
                              CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/getitem/".$id,
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
                                $item = json_decode($response, true);
                                // var_dump("<pre>", $item);die;
                                ?>
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Update Item</h4>
                                        <hr>
                                        
                                        <form method="post" action="<?php echo base_url();?>Items/updateItem/<?php echo $id;?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Item Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="Name" Placeholder="Enter Item Name" required="" value="<?php echo $item['Name'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Item Code</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="ItemCode" placeholder="Enter item's code" required="" value="<?php echo $item['ItemCode'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Select Department</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="DepartmentID" required="">
                                                                <option value="">Select One</option>
                                                                <?php

                                                                    $curl = curl_init();
                                                                    
                                                                    curl_setopt_array($curl, array(
                                                                      CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/getDepartments/".$this->session->userdata('CompanyID'),
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
                                                                
                                                                    // var_dump("<pre>", $res);die;
                                                                    
                                                                    foreach($res as $key => $val){
                                                                    ?>
                                                                <option <?php if($item['DepartmentID'] == $val['DepartmentID']) echo "selected" ?> value="<?php echo $val['DepartmentID'];?>"><?php echo $val['Department1'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Select Brand</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="BrandID" required="">
                                                                <option value="">Select One</option>
                                                                <?php

                                                                    $curl = curl_init();
                                                                    
                                                                    curl_setopt_array($curl, array(
                                                                      CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/getBrands/".$this->session->userdata('CompanyID'),
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
                                                                
                                                                    // var_dump("<pre>", $res);die;
                                                                    
                                                                    foreach($res as $key => $value){
                                                                    ?>
                                                                <option <?php if($item['BrandID'] == $value['BrandID']) echo "selected" ?> value="<?php echo $value['BrandID'];?>"><?php echo $value['Brand1'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">UPC</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="UPC" type="text" required="" placeholder="Enter UPC" value="<?php echo $item['UPC'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Image Url</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" type="file" name="PicturePath" id="example-text-input" value="<?php echo $item['PicturePath'];?>">
                                                        </div>
                                                        <input type="hidden" name="oldImage" value="<?php echo $item['PicturePath'];?>">
                                                        <div class="col-sm-3">
                                                            <img src="<?php echo $item['PicturePath'];?>" height="50" width="50" alt="Item Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Unit Of Measure (UOM)</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="UOM" id="UOM" required="">
                                                                <option>Select One</option>
                                                                <option value="0" <?php if($item['UOM'] == 0) echo "selected"; ?>>Piece</option>
                                                                <option value="1" <?php if($item['UOM'] == 1) echo "selected"; ?>>Case</option>
                                                                <option value="2" <?php if($item['UOM'] == 2) echo "selected"; ?>>Piece/Case</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Case Quantity</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="number" name="CaseQty" id="CaseQty" required="" disabled="true" placeholder="Quantity" value="<?php echo $item['CaseQty'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Piece Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="PcPrice" id="PcPrice" required="" disabled="true" placeholder="Per Piece Price" value="<?php echo number_format((float)$item['PcPrice'], 2, '.', '');?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-3 col-form-label">Case Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="CasePrice" id="CasePrice" required="" disabled="true" placeholder="Per Case Price" value="<?php echo number_format((float)$item['CasePrice'], 2, '.', '');?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" data-parsley-multiple="groups"
                                                               data-parsley-mincheck="2" name="OnHand" <?php if($item['OnHand'] == 1) echo "checked";?>>
                                                        <label class="custom-control-label" for="customCheck1">In Stock<code> (Check if item is in stock)</code></label>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <hr>
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </form>
                                        
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        <?php //} ?>
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
        
        <script type="text/javascript">
            $(document).ready(function(){
                var value = $("#UOM").val();
                uom(value);
            });
            $("#UOM").change(function(){
                var value = $(this).val();
                uom(value);
            });
            function uom(value){
                if(value == 0){
                    $("#PcPrice").prop('disabled', false);
                    $("#CaseQty").prop('disabled', true);
                    $("#CasePrice").prop('disabled', true);
                }
                else if(value == 1){
                    $("#CaseQty").prop('disabled', false);
                    $("#CasePrice").prop('disabled', false);
                    $("#PcPrice").prop('disabled', true);
                }
                else if(value == 2){
                    $("#CaseQty").prop('disabled', false);
                    $("#CasePrice").prop('disabled', false);
                    $("#PcPrice").prop('disabled', false);
                }
                else{
                    $("#CaseQty").prop('disabled', true);
                    $("#CasePrice").prop('disabled', true);
                    $("#PcPrice").prop('disabled', true);
                }
            }
        </script>
        
    </body>

</html>