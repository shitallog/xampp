<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<style>


form button {
    /* style */
    background-color: lightblue;
    border: none;
    padding: 7px;
    
    /* to match input height above */
    height: 33px;

    /* removes the box from DOM */
    float: right;
    
    /* alternative to negative margin-top,
    which seems to hide my button behind the input */
    position: relative;
    top: -34px;   
}



.form-check-input[type=radio] 
{
    margin-right: 20px;
}

#ui-id-1{
    background: #fff;
    font-size: 13px;
    padding: 0 15px 15px;
    box-shadow: 0 0 0 0 rgba(111, 134, 230, 0.33), 0 4px 16px 0 rgba(179, 187, 195, 0.47);
    width: 370px;
    height: 200px;
    overflow: auto;
    color: #03a9f4;
}
#ui-id-1 .ui-menu-item{
     border-bottom: solid 1px #dae0e6;
         line-height: 1.0;
         padding: 5px 0;
}

    </style>


<style>
  

        /* add-products-section-dropdown1 */


        .add-products-section-dropdown1 .cart-qty-plus,
        .add-products-section-dropdown1 .cart-qty-minus{
          width: 25px;
          height: 25px;
          background-color: transparent;
          border: 0;
            border-radius: 50%;
        }
        .add-products-section-dropdown1 .cart-qty-plus:hover,
        .add-products-section-dropdown1 .cart-qty-minus:hover{
          background-color: #5161ce;
          color: #fff;
        }
   
        /* end add-products-section-dropdown1 */

        /* add-products-section-dropdown2 */

    
        .add-products-section-dropdown2 input[type=button] {
            background-color: transparent;
            cursor: pointer;
            outline-style: none;
            width: 25px;
            height: 25px;
            border: 0;
            color: #000000;
            text-align: center;
            line-height: 0;
            font-size: 16px;
            font-family: "Raleway", serif;
            -webkit-transition: all ease 0.3s;
            -moz-transition: all ease 0.3s;
            -ms-transition: all ease 0.3s;
            -o-transition: all ease 0.3s;
            transition: all ease 0.3s;
            border-radius: 50% !important;
        }
        .add-products-section-dropdown2 input[type=button]#minus {
          border-radius: 10px 0 0 10px;
        }
        .add-products-section-dropdown2 input[type=button]#plus {
          border-radius: 0 10px 10px 0;
          margin-left: -4px;
        }
        .add-products-section-dropdown2 input#total-price {
          font-size: 16px;
          border: 0;
          color: #000;
          background-color: transparent;
          width: 100%;
          padding: 0;
          font-weight: 700;
        }
        .add-products-section-dropdown2 .product-counter{
            display: flex;
            align-items: baseline;
            background-color: #fff;
        }
        .add-products-section-dropdown2 .total-prices{
            width: 15%;
        }
        .add-products-section-dropdown2 p{
            margin: 0;
            font-weight: 600;
            font-size: 16px;
            color: #0f76af;
        }
        /* end add-products-section-dropdown2 */
        .form-control:disabled, .form-control[readonly] {
            background-color: #eee;
            opacity: 1;
        }
    </style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">Forward Order</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Order</a></li>
                            <li class="breadcrumb-item"><a href="#">Forward Order</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->


            <form action="{{route('forwardorder-postdata')}}" method="post"  enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">  
                                <div class="col-md-6">
                                    <h4 class="card-title"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Order Details</h4>
                                        <div class="col-md-12">
                                            <label class="form-label">Order ID <span style="color : red; ">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Order ID / Reference Number"  name="order_id" required="">
                                            <span class="text-muted">It is a unique identification number for an order.</span>
                                        </div>
                                        <br>
                                        <h4 class="card-title"><i class="fa fa-archive" aria-hidden="true"></i> Add products to be shipped</h4>
                                        <input type="text" class="form-control typeahead" style="font-family:Arial, FontAwesome" id="search_input" placeholder="&#xF002; Enter atleast 3 letters to search by product name / SKU code"> 
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#itemModal"><i class="fa fa-plus" aria-hidden="true"></i>  Add Item</button>
                                        <hr/>
                                        <h6 class="page-title">Product List <span style="color : red; ">*</span></h6>
                                        <table class="table table-bordered mb-0 add-products-section-dropdown2" id='student'>
                                        <thead>
                                            <th>Product Name</th>
                                            <th>price</th>
                                            <th>Qty</th>
                                            <th>Final Price</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                        <br>

                                        <div class="row" id="final_record" style="display:none">
                                            <div class="col-md-4">
                                                <label class="form-label">Sub Total </label>
                                                <input type="text" class="form-control" name="subtotal" value="" id="subtotal">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Total Discount </label>
                                                <input type="text" class="form-control" name="totaldiscount" value="" id="totaldiscount">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Total Amount</label>
                                                <input type="text" class="form-control" name="totalamount" value="" id="totalamount">
                                            </div>
                                        </div>
                                        <hr/>
                                        <h4 class="card-title"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>  Payment Details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                             <label class="form-label">Payment Mode <span style="color : red; ">*</span></label>
                                                <select class="form-control select2" name="payment_mode" id="payment_mode" required="">
                                                    <option value="">Select</option>
                                                    <option value="0">Pre-Paid</option>
                                                    <option value="1">Cash On Delivery</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" id="cod" style="display:none">
                                                <label class="form-label">Collectable Amount</label>
                                                <input type="text" class="form-control" name="collect_amount" value="0"    id="collect_amount" required="">
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title"><i class="fa fa-map-marker" aria-hidden="true"></i> Delivery Details</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Pickup Location <span style="color : red; ">*</span></label>
                                                <select class="form-control select2" name="pickup_location" id="pickup_location" required="">
                                                <?php 
                                                    $client_pickup_location =  DB::table("client_pickup_location")->where('client_id',$a1->client_id)->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_pickup_location))
                                                    @foreach($client_pickup_location as $client_pickup_location)
                                                    <option value="{{$client_pickup_location->pincode}}">{{$client_pickup_location->facility_name}} / {{$client_pickup_location->pincode}}</option>
                                                    @endforeach
                                                    @endif   
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> Customer Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">First Name <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter First Name"  name="cust_fname" required="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Last Name <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter Last Name"  name="cust_lname" required="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Mobile No <span style="color : red; ">*</span></label>
                                                    <input type="number" class="form-control" placeholder="Enter Mobile No"  name="cust_mobile" required="">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px">
                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder="Enter email"  name="cust_email" >
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Alt Mobile No</label>
                                                    <input type="number" class="form-control" placeholder="Enter mobile no"  name="cust_alt_mobile" >
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Pincode <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Pincode " id="cust_pincode" onChange="getMessage()"  name="cust_pincode" required="">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px">
                                                
                                                <div class="col-md-4">
                                                    <label class="form-label">Country <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Country " value="India"  name="cust_country">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">State <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="State " id="cust_state"  name="cust_state">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">City <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="City " id="cust_city"  name="cust_city">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px">
                                                <div class="col-md-12">
                                                    <label class="form-label">Shipping Address Line 1 <span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Address Line 1 "  name="cust_address1" required="">
                                                </div>
                                                <div class="col-md-12" style="margin-top:10px">
                                                    <label class="form-label">Shipping Address Line 2 (Optional)</label>
                                                    <input type="text" class="form-control" placeholder="Address Line 2 "  name="cust_address2" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input coupon_question" type="checkbox" name="cust_billing_type" id="return_type" value="0" checked>
                                                        <label class="form-check-label" for="return_type">Billing address same as the shipping address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row answer" style="margin-top:10px">
                                                <div class="col-md-4">
                                                    <label class="form-label">Billing Pincode </label>
                                                    <input type="text" class="form-control" placeholder="Pincode" id="cust_billing_pincode" onChange="getstatecity()"  name="cust_billing_pincode">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" placeholder="Country "  value="India"  name="cust_billing_country">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">State</label>
                                                    <input type="text" class="form-control" placeholder="State" id="cust_billing_state"  name="cust_billing_state">
                                                </div>
                                                <div class="col-md-4" style="margin-top:10px">
                                                    <label class="form-label">City </label>
                                                    <input type="text" class="form-control" placeholder="City " id="cust_billing_city"   name="cust_billing_city">
                                                </div>
                                                <div class="col-md-12" style="margin-top:10px">
                                                    <label class="form-label">Billing  Shipping Address Line 1 </label>
                                                    <input type="text" class="form-control" placeholder="Address Line 1 "  name="cust_billing_address1">
                                                </div>
                                                <div class="col-md-12" style="margin-top:10px">
                                                    <label class="form-label">Billing Shipping Address Line 2 (Optional)</label>
                                                    <input type="text" class="form-control" placeholder="Address Line 2 "  name="cust_billing_address2" >
                                                </div>
                                            </div>    
                                            
                                        </div>
                                    </div> 
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title"><i class="fa fa-th" aria-hidden="true"></i> Box Details</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Package Type <span style="color : red; ">*</span></label>
                                                    <select class="form-control select2" name="package_type" id="package_type" required="">
                                                        <option value="">Select</option>
                                                        <option value="Plastic cover/Flyer">Plastic cover/Flyer</option>
                                                        <option value="Cardboard Box">Cardboard Box</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">No of boxes <span style="color : red; ">*</span></label>
                                                    <input type="number" class="form-control" placeholder="No of boxes" id="no_of_box" onkeyup="add_box_row()"  name="no_of_box" required="">
                                                </div>    
                                            </div>
                                            <br> 
                                            <div class="row">
                                             <table class="table table-bordered mb-0 add-products-section-dropdown2" id='box_rows'>
                                                <thead>
                                                    <th>Length </th>
                                                    <th>Breadth </th>
                                                    <th>Height </th>
                                                    <th>Package Weight (GM)</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="row" id="total_weight" style="display:none">
                                            <div class="col-md-6">
                                                    <label class="form-label">Total Chargeable Weight (GM)<span style="color : red; ">*</span></label>
                                                    <input type="text" class="form-control" id="chargeable_weight" onChange="getMessage()"   name="chargeable_weight" required="">
                                                </div>  
                                            </div>     
                                        </div>  
                                        <div class="col-md-6">
                                        <h4 class="card-title"> Choose shipping mode <span style="color : red; ">*</span></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                             <label class="form-label">Vendor <span style="color : red; ">*</span></label>
                                                <select class="form-control select2" name="vendor_type" id="vendor_type" required="">
                                                    <option value="">Select</option>
                                                    <option value="DELHIVERY">DELHIVERY</option>
                                                    <option value="DTDC HEAVY">DTDC HEAVY</option>
                                                    <option value="DTDC E-COM">DTDC E-COM</option>
                                                    <!--<option value="BLUDART">BLUDART</option>-->
                                                    <option value="TRACKON">TRACKON</option>
                                                    <option value="BEES">BEES</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Shipping Mode <span style="color : red; ">*</span></label>
                                                <select class="form-control select2" name="shipping_mode" id="shipping_mode" required="">
                                                    <option value="">Select</option>
                                                    <option value="0">Surface</option>
                                                    <option value="1">Express</option>
                                                </select>
                                            </div>    
                                        </div>
                                        <p style="font-size: 11px;">Note*: Select Vendor and Shipping Mode Charges automatic Selected.<p>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th>Vendor</th>
                                                            <th><i class="fa fa-truck" aria-hidden="true"></i>   Surface Charges</th>
                                                            <th><i class="fa fa-plane" aria-hidden="true"></i>   Express Charges</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                        <tr>
                                                            <td>DELHIVERY</td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="surface_charge_DELHIVERY" disabled>
                                                                <label class="form-check-label" for="surface_charge_DELHIVERY">
                                                                    <span id="surface_charge_DELHIVERY1"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                               <input class="form-check-input" type="radio" name="shipping_charge" value="" id="express_charge_DELHIVERY" disabled>
                                                                <label class="form-check-label" for="express_charge_DELHIVERY">
                                                                    <span id="express_charge_DELHIVERY1"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>DTDC HEAVY</td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="surface_charges_dtdc_heavy" disabled>
                                                                <label class="form-check-label" for="surface_charges_dtdc_heavy">
                                                                    <span id="surface_charges_dtdc_heavy1"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                               <input class="form-check-input" type="radio" name="shipping_charge" value="" id="express_charges_dtdc_heavy" disabled>
                                                                <label class="form-check-label" for="express_charges_dtdc_heavy">
                                                                    <span id="express_charges_dtdc_heavy1"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>DTDC E-COM</td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="surface_charge_dtc_ecom" disabled>
                                                                <label class="form-check-label" for="surface_charge_dtc_ecom">
                                                                    <span id="surface_charge_dtc_ecom1"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="express_charge_dtc_ecom" disabled>
                                                                <label class="form-check-label" for="express_charge_dtc_ecom">
                                                                    <span id="express_charge_dtc_ecom1"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>BLUDART</td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRACKON</td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="surface_charge_TRACKON" disabled>
                                                                <label class="form-check-label" for="surface_charge_TRACKON">
                                                                    <span id="surface_charge_TRACKON1"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="express_charge_TRACKON" disabled>
                                                                <label class="form-check-label" for="express_charge_TRACKON">
                                                                    <span id="express_charge_TRACKON1"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>BEES</td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="surface_charge_BEES" disabled>
                                                                <label class="form-check-label" for="surface_charge_BEES">
                                                                    <span id="surface_charge_BEES1"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input class="form-check-input" type="radio" name="shipping_charge" value="" id="express_charge_BEES" disabled>
                                                                <label class="form-check-label" for="express_charge_BEES">
                                                                    <span id="express_charge_BEES1"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div> 
                                            </div>    
                                        </div> 
                                    </div> 
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-4">
                                           <button style="margin-top:30px;float:left" type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>   
                                        </div>
                                    </div>
                          
                        </div>
                    </div>
                    
                </div> <!-- end col -->
                
            </div> <!-- end row -->
            </form>


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div id="itemModal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel"   data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Item Deatils </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Item Name</label>
                            <input type="text" class="form-control" placeholder="Enter Item Name"   id="item_name" required="">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">SKU Code</label>
                            <input type="text" class="form-control" placeholder="Enter Sku code"   id="sku_code" required="">
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" placeholder="Enter Category"   id="category" required="">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" placeholder="Enter Price"   id="price" required="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Discount</label>
                            <input type="number" class="form-control" placeholder="Enter Discount" value="0"   id="discount">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Discount Type</label><br>
                            <select class="form-control" id="discount_type">
                                <option value="0">Amount</option>
                                <option value="1">Percentage</option>
                            </select>    
                        </div>
                    </div>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick='getitem()' class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <script>
     function getitem()
     {

	   
        var item_name =  $('#item_name').val();
        var sku_code =  $('#sku_code').val();
        var category =  $('#category').val();
        var price =  $('#price').val();
        var discount =  $('#discount').val();
        var discount_type =  $('#discount_type').val();
        

        $.ajax({
            type:'POST',
            url: '{{ route('product-add-post') }}',
            data: {  _token: "{{ csrf_token() }}",item_name: item_name,sku_code: sku_code,category: category,price: price,discount: discount,discount_type: discount_type},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                    if(keysu == '202')
                    {
                        notif({
                        msg: 'Product add successfully..',
                        type: "success",
                        position: "right"
                        });
                        $("#itemModal").modal("hide");
                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'All Feild are mandatory.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
        });
      } 
      
      

      $(document).ready(function () {
    //Product Search
    
    $("#search_input").autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: '{{ route('serach-product') }}',
                dataType: "json",
                data: 
                {
                    term: request.term
                },
                success: function (data)
                {
                    $(this).removeClass('ui-autocomplete-loading');
                    if (!data.length) {
                        var result = [
                            {
                                label: 'No matches found',
                                value: response.term
                            }
                        ];
                        response(result);
                    } else {
                        response($.map(data.slice(0, 50), function (item) {
                            return {
                                //label: item.client_id,
                                item_name: item.item_name,
                                product_id: item.product_id,
                                sku_code: item.sku_code,
                                category: item.category,
                                price: item.price,
                            };
                        }));
                    }

                }
            });
        },
        minLength: 3,
        autoFocus: false,
        delay: 250,
        
        select: function(event, ui) {
        },
        html: true, 
        open: function(event, ui) 
        {
          $(".ui-autocomplete").css("z-index", 1000);
          
        }
      })
        
        .autocomplete( "instance" )._renderItem = function( ul, item ) 
        {
            return $( "<li><a onclick='getproductrow("+item.product_id+")'><div class='row'><div class='col-md-3'>"+item.item_name+"</div> <div class='col-md-3'>"+item.sku_code+"</div><div class='col-md-3'>"+item.category+"</div><div class='col-md-3'>"+item.price+"</div></div></a></li>" ).appendTo( ul );
        };
  
    }); // End Document Ready
    
    
    function getproductrow(product_id)
    {
	   
        var  product_id   = product_id;
        var scntDiv = $('#student');
        
        $.ajax({
            type:'POST',
            url: '{{ route('product-row-post') }}',
            data: {  _token: "{{ csrf_token() }}",product_id: product_id},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                
                    if(keysu == '202')
                    {
                        var product_id=success.product_id;
                        var item_name=success.item_name;
                        var sku_code=success.sku_code;
                        var category=success.category;
                        var price=success.price;
                        var discount=success.discount;
                        var discount_type=success.discount_type;

                        var final_price_total = price - discount;
                        var rowCount = $('#student >tbody >tr').length; 
                        var tr_id  = rowCount+1;
                        scntDiv.append('<tr class""><td> <input type="text" class="form-control" value="'+item_name+'"  name="item_name[]"><input type="hidden" class="form-control" id="product_id'+tr_id+'" value="'+product_id+'"  name="product_id[]"><input type="hidden" class="form-control" id="discount'+tr_id+'" value="'+discount+'"  name="discount[]"></td><td> <input type="text" class="form-control" id="price'+tr_id+'" value="'+price+'"  name="price[]"></td><td><div class="product-counter"><input id="minus'+tr_id+'" type="button" value="-" onclick="qytminus('+product_id+','+tr_id+')"/><input id="quantity'+tr_id+'" type="text" value="1" style="width: 35px;" name="quantity[]"/><input id="plus'+tr_id+'" onclick="qytadd('+product_id+','+tr_id+')" type="button" value="+"/></div></td><td><input type="text" class="form-control" value="'+final_price_total+'" id="total-price'+tr_id+'"  name="final_price[]"></td><td><button id="deleterow' + tr_id + '" style="margin-top:35px" class="delete btn btn-danger" name="delete" type="button">DELETE</button></td></tr>'); 
                        rate_cal();
                        $("#final_record").show();
                        
                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'Product Not Found.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
        });
      } 

    function qytadd(product_id,tr_id)
    {
	   
        var  product_id   = product_id;
        var quantity = parseInt($('#quantity'+tr_id).val());
        
        if(quantity < 5)
        {
            $('#quantity'+tr_id).val(quantity + 1);
            
            var  qty   = quantity + 1;
            $.ajax({
            type:'POST',
            url: '{{ route('add-product-qty') }}',
            data: {  _token: "{{ csrf_token() }}",product_id: product_id,qty: qty},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                
                    if(keysu == '202')
                    {
                        var price=success.price;
                        var discount=success.discount;

                        $('#total-price'+tr_id).val(price);
                        $('#discount'+tr_id).val(discount);
                        
                        rate_cal();
                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'Product Not Found.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
            });


        }
    }


    function qytminus(product_id,tr_id)
    {
	   
        var  product_id   = product_id;
        var quantity = parseInt($('#quantity'+tr_id).val());
        
        if(quantity > 1)
        {
            $('#quantity'+tr_id).val(quantity - 1);
            
            var  qty   = quantity - 1;
            $.ajax({
            type:'POST',
            url: '{{ route('add-product-qty') }}',
            data: {  _token: "{{ csrf_token() }}",product_id: product_id,qty: qty},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                
                    if(keysu == '202')
                    {
                        var price=success.price;
                        var discount=success.discount;

                        $('#total-price'+tr_id).val(price);
                        $('#discount'+tr_id).val(discount);
                        
                        rate_cal();
                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'Product Not Found.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
            });


        }
    }
    
      
    $(document).on("click",'.delete',function(){

        $(this).closest('tr').remove(); 

        var table = document.getElementById('student');
        var Count = table.rows.length;
        //alert(Count);	

        if(Count > 1)
        {
            rate_cal();
        }
        else
        {
            $("#final_record").hide();
        }

        
    });


    function rate_cal()
    {	
        try 
        {
            var table = document.getElementById('student');
            var Count = table.rows.length;	
            
            var totval=0,tot_final_amt=0,totdis=0,tot_final_dis=0,totprice=0,tot_final_price=0;
            for(var i=1; i<Count; i++) 
            {
                var quantity = parseInt($('#quantity'+i).val());

                var amount = 'total-price'+i;	
                if(document.getElementById(amount).value.length == 0)
                    var totval = 0;
                else
                    var totval = document.getElementById(amount).value;
                tot_final_amt +=  parseFloat(totval);

                document.getElementById('totalamount').value = tot_final_amt.toFixed(2);
                
                var discount = 'discount'+i;	
                if(document.getElementById(discount).value.length == 0)
                    var totdis = 0;
                else
                    var totdis = document.getElementById(discount).value;
                tot_final_dis +=  parseFloat(totdis);
                document.getElementById('totaldiscount').value = tot_final_dis.toFixed(2);
                
                var price = 'price'+i;	
                if(document.getElementById(price).value.length == 0)
                    var totprice = 0;
                else
                var totprice = document.getElementById(price).value;
                tot_final_price +=  parseFloat(totprice*quantity);
                document.getElementById('subtotal').value = tot_final_price.toFixed(2);
                document.getElementById('collect_amount').value = tot_final_amt.toFixed(2);
            
                
            }	

        }
        catch(e) 
        {
            
        }

    }

        
    $('#payment_mode').on('change', function()
     {
    if ( this.value == '1')
    //.....................^.......
    {
        $("#cod").show();
    }
    else
    {
        $("#cod").hide();
    }
    });

    $(".answer").hide();
    $(".coupon_question").click(function() {
        if($(this).is(":checked"))
            {
            $(".answer").hide();
        } else
        {
            $(".answer").show();
        }
    });

    function add_box_row() 
    {
        $("#box_rows tr>td").remove();
        $("#total_weight").show();

        var no_of_box =  $('#no_of_box').val();
        var scntDiv2 = $('#box_rows');
        $i = 1;
        for(var i = 0; i < no_of_box; i++)
        {
            scntDiv2.append('<tr><td><input type="text" class="form-control"  name="lenght[]"></td><td> <input type="text" class="form-control"  name="breadth[]"></td><td> <input type="text" class="form-control"  name="height[]"></td><td><input type="text" class="form-control" id="package_weight'+$i+++'"  onChange="claculate_package_weight()"  name="package_weight[]"></td></tr>');
        }
    } 
    
    
    function claculate_package_weight()
    {
        
        try 
        {
            $('#surface_charge_dtc_ecom').empty();
            $('#express_charge_dtc_ecom').empty();
            $('#surface_charge_DELHIVERY').empty();
            $('#express_charge_DELHIVERY').empty();
            $('#surface_charge_BEES').empty();
            $('#express_charge_BEES').empty();
            $('#surface_charge_TRACKON').empty();
            $('#express_charge_TRACKON').empty();
            $('#surface_charges_dtdc_heavy').empty();
            $('#express_charges_dtdc_heavy').empty();

            var table = document.getElementById('box_rows');
            var Count = table.rows.length;	
            
            var totweight=0;tot_final_weight=0;
            for(var i=1; i<Count; i++) 
            {
                var package_weight = 'package_weight'+i;
                if(document.getElementById(package_weight).value.length == 0)
                    var totweight = 0;
                else
                var totweight = document.getElementById(package_weight).value;
                tot_final_weight +=  parseFloat(totweight);
                document.getElementById('chargeable_weight').value = tot_final_weight.toFixed(2);

                
            }
       

            getMessage();
        } 
        catch(e) 
        {
            
        }
        
        
    }

    function getMessage()
    {
	   
        var pickup_pincode =  $('#pickup_location').val();
        var drop_pincode =  $('#cust_pincode').val();
        var grms =  $('#chargeable_weight').val();
        
        $('#surface_charge_dtc_ecom').empty();
        $('#express_charge_dtc_ecom').empty();
        $('#surface_charge_DELHIVERY').empty();
        $('#express_charge_DELHIVERY').empty();
        $('#surface_charge_BEES').empty();
        $('#express_charge_BEES').empty();
        $('#surface_charge_TRACKON').empty();
        $('#express_charge_TRACKON').empty();
        $('#surface_charges_dtdc_heavy').empty();
        $('#express_charges_dtdc_heavy').empty();


        $('#surface_charge_dtc_ecom1').empty();
        $('#express_charge_dtc_ecom1').empty();
        $('#surface_charge_DELHIVERY1').empty();
        $('#express_charge_DELHIVERY1').empty();
        $('#surface_charge_BEES1').empty();
        $('#express_charge_BEES1').empty();
        $('#surface_charge_TRACKON1').empty();
        $('#express_charge_TRACKON1').empty();
        $('#surface_charges_dtdc_heavy1').empty();
        $('#express_charges_dtdc_heavy1').empty();

        $.ajax({
            type:'POST',
            url: '{{ route('charges-calculate-post') }}',
            data: {  _token: "{{ csrf_token() }}",pickup_pincode: pickup_pincode,drop_pincode: drop_pincode,grms: grms},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                    var surface_charge_dtc_ecom=success.surface_charge_dtc_ecom;
                    var express_charge_dtc_ecom=success.express_charge_dtc_ecom;
                    var surface_charge_DELHIVERY=success.surface_charge_DELHIVERY;
                    var express_charge_DELHIVERY=success.express_charge_DELHIVERY;
                    var surface_charge_BEES=success.surface_charge_BEES;
                    var express_charge_BEES=success.express_charge_BEES;
                    var surface_charge_TRACKON=success.surface_charge_TRACKON;
                    var express_charge_TRACKON=success.express_charge_TRACKON;
                    var surface_charges_dtdc_heavy=success.surface_charges_dtdc_heavy;
                    var express_charges_dtdc_heavy=success.express_charges_dtdc_heavy;

                    var state=success.state;
                    var city=success.city;
                    if(keysu == '202')
                    {
                        $('#surface_charge_dtc_ecom').val(surface_charge_dtc_ecom);
                        $('#surface_charge_dtc_ecom1').append(surface_charge_dtc_ecom);
                        $('#express_charge_dtc_ecom').val(express_charge_dtc_ecom);
                        $('#express_charge_dtc_ecom1').append(express_charge_dtc_ecom);
                        $('#surface_charge_DELHIVERY').val(surface_charge_DELHIVERY);
                        $('#surface_charge_DELHIVERY1').append(surface_charge_DELHIVERY);
                        $('#express_charge_DELHIVERY').val(express_charge_DELHIVERY);
                        $('#express_charge_DELHIVERY1').append(express_charge_DELHIVERY);
                        $('#surface_charge_BEES').val(surface_charge_BEES);
                        $('#surface_charge_BEES1').append(surface_charge_BEES);
                        $('#express_charge_BEES').val(express_charge_BEES);
                        $('#express_charge_BEES1').append(express_charge_BEES);
                        $('#surface_charge_TRACKON').val(surface_charge_TRACKON);
                        $('#surface_charge_TRACKON1').append(surface_charge_TRACKON);
                        $('#express_charge_TRACKON').val(express_charge_TRACKON);
                        $('#express_charge_TRACKON1').append(express_charge_TRACKON);
                        $('#surface_charges_dtdc_heavy').val(surface_charges_dtdc_heavy);
                        $('#surface_charges_dtdc_heavy1').append(surface_charges_dtdc_heavy);
                        $('#express_charges_dtdc_heavy').val(express_charges_dtdc_heavy);
                        $('#express_charges_dtdc_heavy1').append(express_charges_dtdc_heavy);

                        $('#cust_state').val(state);
                        $('#cust_city').val(city);
                        

                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'Drop pincode or weight should not be empty.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
        });
    } 
      
      $('#vendor_type').on('change', function()
      {
          var vendor_type = $(this).val();
          var shipping_mode =  $('#shipping_mode').val();

          if(vendor_type == 'DELHIVERY' && shipping_mode == '0')
          {
            $("#surface_charge_DELHIVERY").attr('checked', 'checked');
            $('#surface_charge_DELHIVERY').attr('disabled', false);
          }
          else if(vendor_type == 'DELHIVERY' && shipping_mode == '1')
          {
            $("#express_charge_DELHIVERY").attr('checked', 'checked');
            $('#express_charge_DELHIVERY').attr('disabled', false);
          }

          else if(vendor_type == 'DTDC HEAVY' && shipping_mode == '0')
          {
            $("#surface_charges_dtdc_heavy").attr('checked', 'checked');
            $('#surface_charges_dtdc_heavy').attr('disabled', false);
          }
          else if(vendor_type == 'DTDC HEAVY' && shipping_mode == '1')
          {
            $("#express_charges_dtdc_heavy").attr('checked', 'checked');
            $('#express_charges_dtdc_heavy').attr('disabled', false);
          }
          
          else if(vendor_type == 'DTDC E-COM' && shipping_mode == '0')
          {
            $("#surface_charge_dtc_ecom").attr('checked', 'checked');
            $('#surface_charge_dtc_ecom').attr('disabled', false);
          }
          else if(vendor_type == 'DTDC E-COM' && shipping_mode == '1')
          {
            $("#express_charge_dtc_ecom").attr('checked', 'checked');
            $('#express_charge_dtc_ecom').attr('disabled', false);
          }


          else if(vendor_type == 'BLUDART' && shipping_mode == '0')
          {
            $("#surface_charge_bludart").attr('checked', 'checked');
            $('#surface_charge_bludart').attr('disabled', false);
          }
          else if(vendor_type == 'BLUDART' && shipping_mode == '1')
          {
            $("#express_charge_bludart").attr('checked', 'checked');
            $('#express_charge_bludart').attr('disabled', false);
          }

          else if(vendor_type == 'TRACKON' && shipping_mode == '0')
          {
            $("#surface_charge_TRACKON").attr('checked', 'checked');
            $('#surface_charge_TRACKON').attr('disabled', false);
          }
          else if(vendor_type == 'TRACKON' && shipping_mode == '1')
          {
            $("#express_charge_TRACKON").attr('checked', 'checked');
            $('#express_charge_TRACKON').attr('disabled', false);
          }

          else if(vendor_type == 'BEES' && shipping_mode == '0')
          {
            $("#surface_charge_BEES").attr('checked', 'checked');
            $('#surface_charge_BEES').attr('disabled', false);
          }
          else if(vendor_type == 'BEES' && shipping_mode == '1')
          {
            $("#express_charge_BEES").attr('checked', 'checked');
            $('#express_charge_BEES').attr('disabled', false);
          }

      });



      $('#shipping_mode').on('change', function()
      {
          var shipping_mode = $(this).val();
          var vendor_type =  $('#vendor_type').val();

          if(vendor_type == 'DELHIVERY' && shipping_mode == '0')
          {
            $("#surface_charge_DELHIVERY").attr('checked', 'checked');
            $('#surface_charge_DELHIVERY').attr('disabled', false);
          }
          else if(vendor_type == 'DELHIVERY' && shipping_mode == '1')
          {
            $("#express_charge_DELHIVERY").attr('checked', 'checked');
            $('#express_charge_DELHIVERY').attr('disabled', false);
          }

          else if(vendor_type == 'DTDC HEAVY' && shipping_mode == '0')
          {
            $("#surface_charges_dtdc_heavy").attr('checked', 'checked');
            $('#surface_charges_dtdc_heavy').attr('disabled', false);
          }
          else if(vendor_type == 'DTDC HEAVY' && shipping_mode == '1')
          {
            $("#express_charges_dtdc_heavy").attr('checked', 'checked');
            $('#express_charges_dtdc_heavy').attr('disabled', false);
          }
          
          else if(vendor_type == 'DTDC E-COM' && shipping_mode == '0')
          {
            $("#surface_charge_dtc_ecom").attr('checked', 'checked');
            $('#surface_charge_dtc_ecom').attr('disabled', false);
          }
          else if(vendor_type == 'DTDC E-COM' && shipping_mode == '1')
          {
            $("#express_charge_dtc_ecom").attr('checked', 'checked');
            $('#express_charge_dtc_ecom').attr('disabled', false);
          }


          else if(vendor_type == 'BLUDART' && shipping_mode == '0')
          {
            $("#surface_charge_bludart").attr('checked', 'checked');
            $('#surface_charge_bludart').attr('disabled', false);
          }
          else if(vendor_type == 'BLUDART' && shipping_mode == '1')
          {
            $("#express_charge_bludart").attr('checked', 'checked');
            $('#express_charge_bludart').attr('disabled', false);
          }

          else if(vendor_type == 'TRACKON' && shipping_mode == '0')
          {
            $("#surface_charge_TRACKON").attr('checked', 'checked');
            $('#surface_charge_TRACKON').attr('disabled', false);
          }
          else if(vendor_type == 'TRACKON' && shipping_mode == '1')
          {
            $("#express_charge_TRACKON").attr('checked', 'checked');
            $('#express_charge_TRACKON').attr('disabled', false);
          }

          else if(vendor_type == 'BEES' && shipping_mode == '0')
          {
            $("#surface_charge_BEES").attr('checked', 'checked');
            $('#surface_charge_BEES').attr('disabled', false);
          }
          else if(vendor_type == 'BEES' && shipping_mode == '1')
          {
            $("#express_charge_BEES").attr('checked', 'checked');
            $('#express_charge_BEES').attr('disabled', false);
          }

      });

    function getstatecity()
    {
	   
        var cust_billing_pincode =  $('#cust_billing_pincode').val();
        
        $('#cust_billing_state').empty();
        $('#cust_billing_city').empty();
     
        $.ajax({
            type:'POST',
            url: '{{ route('city-state-details') }}',
            data: {  _token: "{{ csrf_token() }}",cust_billing_pincode: cust_billing_pincode},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                    var state=success.state;
                    var city=success.city;
                    if(keysu == '202')
                    {
                        

                        $('#cust_billing_state').val(state);
                        $('#cust_billing_city').val(city);
                        

                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'Drop pincode or weight should not be empty.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
        });
    } 
       
    </script>  
    
    
