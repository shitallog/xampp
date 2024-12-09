<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<?php $page_name = '13'; ?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h6 class="page-title">Rate Calculator</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Calculator</a></li>
                            <li class="breadcrumb-item"><a href="#">Rate Calculator</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
               <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Pickup & Delivery Pincode</p>
            
                            <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Pickup Pincode</label>
                                        <select class="form-control select2" id="pickup_pincode" required="">
                                        <?php 
                                            $client_pickup_location =  DB::table("client_pickup_location")->where('client_id',$a1->client_id)->get()->toArray();
                                            ?>
                                            @if(!empty($client_pickup_location))
                                            @foreach($client_pickup_location as $client_pickup_location)
                                            <option value="{{$client_pickup_location->pincode}}">{{$client_pickup_location->pincode}}</option>
                                            @endforeach
                                            @endif
                                        </select>        
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Drop Pincode</label>
                                        <input type="text" class="form-control" placeholder="Enter Pincode"   id="drop_pincode" required="">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Package Weight (IN GM)</label>
                                        <input type="text" class="form-control" placeholder="Enter grms"   id="grms" required="">
                                    </div>
                                    <div class="col-md-4">
                                      <button type="button" id="submit" onclick='getMessage()' class="btn btn-success waves-effect waves-light">Calculate</button>
                                    </div>
                                </div>
                            <hr/>
                            <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0"">

                                    <thead>
                                        <tr>
                                            <th>Vendor</th>
                                            <th><i class="fa fa-truck" aria-hidden="true"></i>   Surface Charges</th>
                                            <th><i class="fa fa-plane" aria-hidden="true"></i>   Express Charges</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                            <td>DELHIVERY</td>
                                            <td><span id="surface_charge_DELHIVERY"></span></td>
                                            <td><span id="express_charge_DELHIVERY"></span></td>
                                          </tr>
                                          <tr>
                                            <td>DTDC HEAVY</td>
                                            <td><span id="surface_charges_dtdc_heavy"></span></td>
                                            <td><span id="express_charges_dtdc_heavy"></span></td>
                                          </tr>
                                          <tr>
                                            <td>DTDC E-COM</td>
                                            <td><span id="surface_charge_dtc_ecom"></span></td>
                                            <td><span id="express_charge_dtc_ecom"></span></td>
                                          </tr>
                                          <tr>
                                            <td>BLUDART</td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td>TRACKON</td>
                                            <td><span id="surface_charge_TRACKON"></span></td>
                                            <td><span id="express_charge_TRACKON"></span></td>
                                          </tr>
                                          <tr>
                                            <td>BEES</td>
                                            <td><span id="surface_charge_BEES"></span></td>
                                            <td><span id="express_charge_BEES"></span></td>
                                          </tr>
                                    </tbody>
                                </table>
                                
                            </div>      
                        </div>
                    </div>
                </div>    
              
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <script>
     function getMessage()
     {
	   
        var pickup_pincode =  $('#pickup_pincode').val();
        var drop_pincode =  $('#drop_pincode').val();
        var grms =  $('#grms').val();
        
        $('#surface_charge_dtc_ecom').empty();
        $('#express_charge_dtc_ecom').empty();
        $('#surface_charge_DELHIVERY').empty();
        $('#express_charge_DELHIVERY').empty();
        $('#surface_charge_BEES').empty();
        $('#express_charge_BEES').empty();
        $('#surface_charge_TRACKON').empty();
        $('#express_charge_TRACKON').empty();
        $.ajax({
            type:'POST',
            url: '{{ route('charges-calculate-post') }}',
            data: {  _token: "{{ csrf_token() }}",pickup_pincode: drop_pincode,drop_pincode: drop_pincode,grms: grms},
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
                    if(keysu == '202')
                    {
                        $('#surface_charge_dtc_ecom').append(surface_charge_dtc_ecom);
                        $('#express_charge_dtc_ecom').append(express_charge_dtc_ecom);
                        $('#surface_charge_DELHIVERY').append(surface_charge_DELHIVERY);
                        $('#express_charge_DELHIVERY').append(express_charge_DELHIVERY);
                        $('#surface_charge_BEES').append(surface_charge_BEES);
                        $('#express_charge_BEES').append(express_charge_BEES);
                        $('#surface_charge_TRACKON').append(surface_charge_TRACKON);
                        $('#express_charge_TRACKON').append(express_charge_TRACKON);
                        $('#surface_charges_dtdc_heavy').append(surface_charges_dtdc_heavy);
                        $('#express_charges_dtdc_heavy').append(express_charges_dtdc_heavy);

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