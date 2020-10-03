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
                                    <h4 class="page-title">Items</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Items</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">View Items</a></li>
                                        <li class="breadcrumb-item active">Items List</li>
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
        
                                        <h4 class="mt-0 header-title">Items List</h4>
                                        <b><p class="sub-title text-danger">You can Click on a column to sort it according to that column.
                                        </p></b>
                                        <?php if($this->session->flashdata('message')){
                                               echo $this->session->flashdata('message');
                                           } ?>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Department</th>
                                                <th>UOM</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php
                                                    $item;
                                                    $curl = curl_init();
                                                    
                                                    curl_setopt_array($curl, array(
                                                      CURLOPT_URL => "http://vendtapwebapp.azurewebsites.net/api/items/getitems/".$this->session->userdata('CompanyID'),
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

                                                    // echo $res[0]['CompanyID'];die;
                                                
                                                    // var_dump("<pre>", $res);die;
                                                    
                                                    foreach($res as $key => $val){
                                                    ?>
                                            <tr>
                                                <td><?php echo $key + 1;?></td>
                                                <td><?php echo $val["ItemCode"];?></td>
                                                <td><?php echo $val["Name"];?></td>
                                                <td><?php echo $val["Department1"];?></td>
                                                <td><?php
                                                    if($val["OnHand"] == 0) $OnHand = "Out of stock";
                                                    else $OnHand = "In stock";
                                                    if($val["UOM"] == 0) $UOM = "Piece";
                                                    elseif ($val["UOM"] == 1) $UOM = "Case";
                                                    else $UOM = "Piece/Case";
                                                    echo $UOM;
                                                    ?></td>
                                                <td>
                                                <button class="btn btn-primary btn-sm itemDetailButton"
                                                data-toggle="modal"
                                                data-target=".itemModal"
                                                data-id = "<?php echo $val['ItemID'];?>"
                                                data-name = "<?php echo $val['Name'];?>"
                                                data-itemcode = "<?php echo $val['ItemCode'];?>"
                                                data-upc = "<?php echo $val['UPC'];?>"
                                                data-caseqty = "<?php echo $val['CaseQty'];?>"
                                                data-uom = "<?php echo $UOM;?>"
                                                data-pcprice = "<?php echo $val['PcPrice'];?>"
                                                data-datecreated = "<?php echo $val['DateCreated'];?>"
                                                data-datemodified = "<?php echo $val['DateModified'];?>"
                                                data-caseprice = "<?php echo $val['CasePrice'];?>"
                                                data-picturepath = "<img src='<?php if($val["PicturePath"]!=null) echo $val["PicturePath"]; else echo base_url()."assets/images/default.png"?>'>"
                                                data-onhand = "<?php echo $OnHand;?>"
                                                data-qbid = "<?php echo $val['QBID'];?>"
                                                data-brand = "<?php echo $val['Brand1'];?>"
                                                data-department = "<?php echo $val['Department1'];?>"
                                                data-btn = "<a href='<?php echo base_url();?>Items/editItem/<?php echo $val['ItemID'];?>'><button class='btn btn-primary'>Edit</button></a>"
                                                >Detail</button></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="modal fade bs-example-modal-lg show itemModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Item's Detail</h5>
                                        <!-- <span id="PicturePath"></span> -->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- NEW MODAL -->
                                        <div class="row">
                                            <div class="col-5 col-md-6 col-sm-6" style="overflow: hidden;">
                                                <span id="PicturePath"></span>
                                            </div>
                                            <div class="col-7 col-md-6 col-sm-6" style="padding-left: 50px;">
                                                <div class="row">
                                                    <div class="col-12"><h5 id="Name"></h5></div>
                                                    <div class="col-12 PcPriceDiv"><h3 id="PcPrice"></h3></div>
                                                    <div class="col-12 CasePriceDiv"><h3 id="CasePrice"></h3></div>
                                                    <div class="col-12">Item Code: <strong><span class="text text-success" id="ItemCode"></span></strong> <span class="pl-2 pr-2">|</span> Availibility: <strong><span class="text text-danger" id="OnHand"></span></strong>
                                                    </div>
                                                    <div class="col-12"><div class="progress mt-4 mb-4" style="height: 2px;"><div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div></div>
                                                    <div class="col-12 pb-2"><span class="star-toggle far fa-star"></span> <b>UOM:</b> <span id="UOM"></span></div>
                                                    <div class="col-12 pb-2"><span class="star-toggle far fa-star"></span> <b>Department:</b> <span id="Department1"></span></div>
                                                    <div class="col-12 pb-2"><span class="star-toggle far fa-star"></span> <b>Brand: </b><span id="Brand1"></span></div>
                                                    <div class="col-12"><span class="star-toggle far fa-star"></span> <b>UPC:</b> <span id="UPC"></span></div>
                                                    <div class="col-12"><div class="progress mt-4 mb-4" style="height: 2px;"><div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div></div>
                                                    <div id="editButton"></div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->



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
        $(document).on("click", ".itemDetailButton", function () {
            $("#PicturePath").html( $(this).data('picturepath') );
            $("#Name").html( $(this).data('name') );
            $("#editButton").html( $(this).data('btn') );
            $("#PcPrice").html("$ "+ (Math.round($(this).data('pcprice') * 100) / 100).toFixed(2) +"<span class='text-chota'> (Per Piece)</small>");
            $("#CasePrice").html("$ "+ (Math.round($(this).data('caseprice') * 100) / 100).toFixed(2) +"<span class='text-chota'> (Per Case)</small>" );
            $("#ItemCode").html( $(this).data('itemcode') );
            $("#Department1").html( $(this).data('department') );
            $("#Brand1").html( $(this).data('brand') );
            $("#UPC").html( $(this).data('upc') );
            $("#OnHand").html( $(this).data('onhand') );
            $("#UOM").html( $(this).data('uom') );
            if($(this).data('uom') == 'Piece'){
                $(".PcPriceDiv").show();
                $(".CaseQtyDiv").hide();
                $(".CasePriceDiv").hide();
            }
            else if($(this).data('uom') == 'Case'){
                $(".PcPriceDiv").hide();
                $(".CaseQtyDiv").show();
                $(".CasePriceDiv").show();
            }
            else{
                $(".PcPriceDiv").show();
                $(".CaseQtyDiv").show();
                $(".CasePriceDiv").show();
            }
            
        });
    </script>
    </body>

</html>