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
                                    <h4 class="page-title">Invoice</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                                        <li class="breadcrumb-item active">Generate Invoice</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->
                        <!--PAGE CONTENT-->
                        <!-- Invoice -->
                        <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <h3 class="m-t-0">
                                                        <img src="<?php echo base_url();?>assets/images/vendtap_logo.png" alt="logo" height="40"/>
                                                    </h3>

                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Select Customer</label>
                                                        <div class="col-sm-8">
                                                            <select class="select2 form-control custom-select" name="customer" id="customer" required="">
                                                                <option value="">Select One</option>
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
                                                                
                                                                    // var_dump("<pre>", $res);die;
                                                                    
                                                                    foreach($res as $key => $val){
                                                                    ?>
                                                                <option value="<?php echo $val['CustomerID'];?>"><?php echo $val['Name'];?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" name="CustomerID" id="CustomerID">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="invoice-title">
                                                        <h4 class="float-right font-16"><strong>Invoice # 12345</strong></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        <strong>Billed To:</strong><br>
                                                        <b><h5 class="billed-to text-success"></h5></b><br>
                                                    </address>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <address>
                                                        <strong>Order Date:</strong><br>
                                                        <?php echo date("F j, Y");  ?><br><br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="panel panel-default">
                                                        <div class="p-2">
                                                            <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table class="table invoice" id="invoice">
                                                                    <thead>
                                                                    <tr>
                                                                        <td><strong>Remove</strong></td>
                                                                        <td><strong>Item</strong></td>
                                                                        <td><strong>Type</strong></td>
                                                                        <td><strong>UOM</strong></td>
                                                                        <td class="text-center"><strong>Price ($)</strong></td>
                                                                        <td class="text-center"><strong>Quantity</strong>
                                                                        </td>
                                                                        <td class="text-right"><strong>Totals ($)</strong></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody class="CartList">
                                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                    <!-- <tr>
                                                                        <td>BS-200</td>
                                                                        <td class="text-center">$10.99</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-right">$10.99</td>
                                                                    </tr> -->
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line text-center">
                                                                                <strong>Total</strong></td>
                                                                            <td class="no-line text-right"><h4 class="m-0">$ <span class="subtotal">0</span></h4></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
            
                                                            <div class="d-print-none mo-mt-2">
                                                                <div class="float-right">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="Order">Order</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                </div>
                                            </div> <!-- end row -->
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row --> 
                        <!-- Items -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Items List</h4><br>
                                        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <div id="DepartmentDD" class="float-right" style="margin-right: 15px;"><b>Filter By Department:</b> </div><br>
                                            <thead>
                                            <tr>
                                                <th><input type="checkbox" disabled="" style="transform: scale(1.5);"></th>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Department </th>
                                                <th>UOM</th>
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
                                            <tr id="<?php echo $val['ItemID'];?>" data-uom="<?php echo $val['UOM'];?>" data-pcprice="<?php echo $val['PcPrice'];?>" data-caseprice="<?php echo $val['CasePrice'];?>" data-name="<?php echo $val['Name'];?>">
                                                <td><input type="checkbox" name="chk_AddToList" class="chk_AddToList " style="transform: scale(1.5);" id="chk_AddToList_<?php echo $val["ItemID"];?>" value="<?php echo $val["ItemID"];?>"></td>
                                                <td><?php echo $val["ItemCode"];?></td>
                                                <td><?php echo $val["Name"];?></td>
                                                <td><?php if($val["UOM"] == 2) echo "$".number_format((float)$val["CasePrice"], 2, '.', ''); else if($val["UOM"] == 1) echo "$".number_format((float)$val["CasePrice"], 2, '.', ''); else echo "$".number_format((float)$val["PcPrice"], 2, '.', '');?></td>
                                                <td><?php echo $val["Department1"];?></td>
                                                <td><?php
                                                    if($val["OnHand"] == 0) $OnHand = "Out of stock";
                                                    else $OnHand = "In stock";
                                                    if($val["UOM"] == 0) $UOM = "Piece";
                                                    elseif ($val["UOM"] == 1) $UOM = "Case";
                                                    else $UOM = "Piece/Case";
                                                    echo $UOM;
                                                    ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
        
                                        <!-- MODAL -->
                                         <!-- data-backdrop='static' -->
                                        <div class="modal fade bs-example-modal-center invoiceModal" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-center">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="itemNamePopup"></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="padding:20px 50px">
                                                        <div class="row">
                                                        </div>
                                                        <div class="row"><input type="hidden" name="itemIDPopup" id="itemIDPopup"></div>
                                                        <div class="row"><input type="hidden" name="txtItemNamePopup" id="txtItemNamePopup"></div>
                                                        <div class="row SelectOptionDiv"><label>Select UOM</label>
                                                            <select class="form-control" name="SelectCase" id="SelectCase" required="">
                                                                <option value="">Select One</option>
                                                                <option value="CasePrice">Case</option>
                                                                <option value="PcPrice">Piece</option>
                                                            </select>
                                                        </div>
                                                        <div class="uom-error field-error-uom text-danger"></div>
                                                        <div class="row"><label>Enter Quantity</label><input type="number" name="qtyPopup" id="qtyPopup" class="form-control" placeholder="Enter Quantity"></div>
                                                        <div class="field-error-qty text-danger"></div>
                                                        <br>
                                                        <div class="row casePriceDiv"><h5>$</h5> <h4 id="casePricePopup" class="text-success"></h4> <h6> &nbsp(Per Case)</h6></div>
                                                        <br>
                                                        <div class="row pcPriceDiv"><h5>$</h5> <h4 id="pcPricePopup" class="text-success"></h4> <h6> &nbsp(Per Piece)</h6></div><br>
                                                        <input type="checkbox" name="ReturnItem" id="ReturnItem" value="Return"> <label class="text-danger"> Check if you want to Return the Item</label><br>
                                                        
                                
                                                    </div>
                                                    <div class="modal-footer"><button type="button" class="btn btn-primary" id="AddToListBtn">Submit</button></div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
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

    <script type="text/javascript">
        // create objects
        var transaction = {};
        var transEntryArray = [];

        //Datatables
         $(document).ready(function() {
                $('#datatable').DataTable( {
                    aLengthMenu: [
                        [10, 20, 50, 100, -1],
                        [10, 20, 50, 100, "All"]
                    ],
                    iDisplayLength: -1,
                    initComplete: function () {
                        this.api().columns(4).every( function () {
                            var column = this;
                            var select = $('<select class="form-control" ><option value="">Select Department</option></select>')
                                .appendTo( $('#DepartmentDD') )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
             
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
             
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                } );
            } );

            //Check on a check box to add an item for invoice
            $(".chk_AddToList").click(function() {
                if(this.checked) {
                    //Uncheck the return
                    $('#ReturnItem').prop("checked", false);
                    $('#SelectCase').val('CasePrice');
                    $('.pcPriceDiv').hide();
                    // Hide all items in modal
                    $('.SelectOptionDiv').hide();
                    $('.casePriceDiv').hide();
                    $('.pcPriceDiv').hide();
                    $("#qtyPopup").val('');
                    //Get variables
                    var ItemID = $(this).closest('tr').attr('id');
                    var UOM = $(this).closest('tr').data('uom');
                    var PcPrice = $(this).closest('tr').data('pcprice');
                    var CasePrice = $(this).closest('tr').data('caseprice');
                    var Name = $(this).closest('tr').data('name');

                    //if case is 2 (piece/case)
                    if(UOM == 2){
                        $('.SelectOptionDiv').show();
                        $('.casePriceDiv').show();
                        $(".uom-error").addClass("field-error-uom");
                    } else if(UOM == 1){
                        $('.SelectOptionDiv').hide();
                        $('.casePriceDiv').show();
                        $('.pcPriceDiv').hide();
                        $(".uom-error").removeClass("field-error-uom");
                    } else {
                        $('.SelectOptionDiv').hide();
                        $('.pcPriceDiv').show();
                        $('.casePriceDiv').hide();
                        $(".uom-error").removeClass("field-error-uom");
                    }

                    //Show values on popup
                    $("#itemNamePopup").html(Name);
                    $("#txtItemNamePopup").html(Name);
                    $("#itemIDPopup").val(ItemID);

                    // change to numbers
                    PcPrice = Number(PcPrice);
                    CasePrice = Number(CasePrice);

                    // change to decimals
                    PcPrice = (Math.round(PcPrice * 100) / 100).toFixed(2);
                    CasePrice = (Math.round(CasePrice * 100) / 100).toFixed(2);

                    $("#pcPricePopup").html(PcPrice);
                    $("#casePricePopup").html(CasePrice);
                    $('#invoiceModal').modal('toggle');
                    //Call if Enter pressed
                    $(document).on('keypress',function(e) {
                        if(e.which == 13) {
                            addItemsToList();
                        }
                    });
                    $(document).keyup(function(e) {
                         if (e.key === "Escape") { // escape key maps to keycode `27`
                            var id = $('#itemIDPopup').val();
                            $('#chk_AddToList_'+id).prop('checked', false);
                        }
                    });
                }
                else{
                    // alert("Not Checked");
                }
            });

            //Select case popup
            $("#SelectCase").change(function(){
                var val = $(this).val();
                if(val == 'CasePrice'){
                    $('.pcPriceDiv').hide();
                    $('.casePriceDiv').show();
                } else if(val == 'PcPrice'){
                    $('.casePriceDiv').hide();
                    $('.pcPriceDiv').show();
                }
                else{
                    $('.casePriceDiv').show();
                    $('.pcPriceDiv').show();
                }
            });

            //Submit popup and append to table
            $('#AddToListBtn').click(function(){
                addItemsToList();
            });
            
            function addItemsToList(){
                // Declare a variable to save pcprice or caseprice
                var price = 0;
                //validation for select uom
                var UOM = $('#SelectCase').val();
                if(UOM == ""){
                    if($('#SelectCase').is(":visible")){
                        $(".field-error-uom").html("Please Select a Value");
                        return;
                    }
                }
                else{
                    $(".field-error-uom").html("");
                }

                var Name = $("#itemNamePopup").html();
                //validation for Qty
                var Qty = $("#qtyPopup").val();
                if(Qty == ""){
                    $(".field-error-qty").html("Please enter quantity");
                    return;
                }
                else if(Qty == 0){
                    $(".field-error-qty").html("Quantity should be greater then 0");
                    return;
                }
                else if(Qty < 0){
                    $(".field-error-qty").html("Quantity should be in Positive integer");
                    return;
                }
                else{
                    $(".field-error-qty").html("");
                }

                // alert(UOM+','+Name+','+CasePrice+','+PcPrice+','+Qty);
                var UOMObjVal;
                if(UOM == 'CasePrice'){
                    price = $("#casePricePopup").html();
                    UOM = "Case";
                    UOMObjVal = 1;
                }
                else{
                    price = $("#pcPricePopup").html();
                    UOM = "Price";
                    UOMObjVal = 0;
                }

                //convert price to number
                price = Number(price);

                // item ID
                var item_id = Number($("#itemIDPopup").val());
                var total = price * Qty;

                //Make Object and push values to array of Object
                var transEntryObj = {};
                var TransEntry1Obj = 0;
                var ItemIDObj = item_id;
                var QtyObj = Qty;
                var UOMObj = UOMObjVal;
                var PriceObj = price;
                var TotalObj = total;
                var DateCreatedObj = "<?php echo date("yy-m-d")."T".date("h:i:s");?>";;
                var DateModifiedObj = "<?php echo date("yy-m-d")."T".date("h:i:s");?>";;
                var StatusObj = 1;

                // Push in trans entry object
                transEntryObj.TransEntry1 = TransEntry1Obj;
                transEntryObj.ItemID = ItemIDObj;
                transEntryObj.Qty = Qty;
                transEntryObj.UOM = UOMObj;
                transEntryObj.Price = PriceObj;
                transEntryObj.Total = TotalObj;
                transEntryObj.DateCreated = DateCreatedObj;
                transEntryObj.DateModified = DateModifiedObj;
                transEntryObj.Status = StatusObj;

                transEntryArray.push(transEntryObj);
                

                //check if its return type of addition
                var type = "";
                if($('#ReturnItem:checkbox:checked').length > 0){
                    type = "<span class='badge badge-danger'>Return</span>";
                    //append added items
                    Qty = -Qty;
                    $("tbody.CartList").append('<tr id="'+item_id+'"><td><div class="remove-item suggestion-icon mt-2 pt-1" ><i class="mdi mdi-minus bg-danger" onclick="RemoveItem('+item_id+');" style="cursor:pointer;"></i></div></td><td class="name">'+Name+'</td><td class="type">'+type+'</td><td class="uom">'+UOM+'</td><td class="text-center price_'+item_id+'">'+(Math.round(price * 100) / 100).toFixed(2)+'</td><td class="text-center qty">'+Qty+'</td><td class="text-right total_'+item_id+'">'+(Math.round(-total * 100) / 100).toFixed(2)+'</td></tr>');
                    var subtotal = Number($('.subtotal').html());
                    $('.subtotal').html((Math.round((subtotal-total) * 100) / 100).toFixed(2));
                    $('#invoiceModal').modal('toggle');
                    $('#SelectCase').val("");
                }
                else{
                    type = "<span class='badge badge-primary'>Sale</span>";
                    //append added items

                    $("tbody.CartList").append('<tr id="'+item_id+'"><td><div class="remove-item suggestion-icon mt-2 pt-1" ><i class="mdi mdi-minus bg-danger" onclick="RemoveItem('+item_id+');" style="cursor:pointer;"></i></div></td><td class="name">'+Name+'</td><td class="type">'+type+'</td><td class="uom">'+UOM+'</td><td class="text-center price_'+item_id+'">'+(Math.round(price * 100) / 100).toFixed(2)+'</td><td class="text-center qty">'+Qty+'</td><td class="text-right total_'+item_id+'">'+(Math.round(total * 100) / 100).toFixed(2)+'</td></tr>');
                    var subtotal = Number($('.subtotal').html());
                    $('.subtotal').html((Math.round((subtotal+total) * 100) / 100).toFixed(2));
                    $('#invoiceModal').modal('toggle');
                    $('#SelectCase').val("");
                }
            }

            //function to remove an item from invoice
            function RemoveItem(id){
                var price = Number($(".total_"+id).html());
                var sub = Number($(".subtotal").html());
                $(".subtotal").html((Math.round((sub - price) * 100) / 100).toFixed(2));
                $('table#invoice tr#'+id).remove();
                $('#chk_AddToList_'+id).prop('checked', false);
            }

            //Modal Close Uncheck item
            $('.close').click(function(){
                var id = $('#itemIDPopup').val();
                $('#chk_AddToList_'+id).prop('checked', false);
            })

            //Select Customer
            $("#customer").change(function(){
                var val = $(this).val();
                $("#CustomerID").val(val);
                var text = $("#customer option:selected").text();
                $('.billed-to').html(text);
            });

            //Place an order
            $(document).ready(function() {
                $('#Order').click(function(e){
                    e.preventDefault();

                    var CustomerID = $("#CustomerID").val();
                    if(CustomerID == ""){
                        alert("Please Select a Customer First");
                        return;
                    }
                    var CompanyID = <?php echo $this->session->userdata("CompanyID");?>;
                    var TransNo = "<?php echo strtoupper($this->session->userdata("UserName"));?>-".substring(0, 2).concat("-");
                    var TransDate = "<?php echo date("yy-m-d")."T".date("h:i:s");?>";
                    var TransType = 1;
                    var Debit = $('.subtotal').html();
                    var Credit = 0;
                    var RemainingCredit = 0;
                    var Discount = 0;
                    var Note = "";
                    var Status = 1;
                    var TotalItems = 0; //array of object items length
                    var UserID = <?php echo $this->session->userdata("UserID");?>;
                    var DateModified = "<?php echo date("yy-m-d")."T".date("h:i:s");?>";
                    var DiscountType = 0;
                    var SubTotal = 0;

                    //Passing Values to Object
                    transaction.CustomerID = CustomerID;
                    transaction.CompanyID = CompanyID;
                    transaction.TransNo = TransNo;
                    transaction.TransDate = TransDate;
                    transaction.TransType = TransType;
                    transaction.Debit = Debit;
                    transaction.Credit = Credit;
                    transaction.RemainingCredit = RemainingCredit;
                    transaction.Discount = Discount;
                    transaction.Note = Note;
                    transaction.Status = Status;
                    transaction.TotalItems = transEntryArray.length;
                    transaction.UserID = UserID;
                    transaction.DateModified = DateModified;
                    transaction.DiscountType = DiscountType;
                    transaction.SubTotal = SubTotal;
                    //ajax call to pass the data to php function
                    $.ajax({
                       url: '<?php echo base_url();?>Invoice/saveTransaction',
                       type: "post",
                      data: {
                        transaction: transaction
                      },
                      success: function (result) {
                            var appendTransID =transEntryArray.map(function(el) {
                              var o = Object.assign({}, el);
                              o.TransID = result;
                              return o;
                            });
                            $.ajax({
                               url: '<?php echo base_url();?>Invoice/saveTransEntry',
                               type: "post",
                              data: {
                                TransEntry: appendTransID
                              },
                              success: function (result) {
                                    if(result == "Done"){
                                        console.log("Inserted");
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>