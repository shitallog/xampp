<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">Client</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Client</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit Client</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('client-postdata-update')}}" method="post"  enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name" value="{{$a1->company_name}}"   name="company_name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Company Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Mobile"  value="{{$a1->company_mobile_no}}"   name="company_mobile_no">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Company EMail</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Email" value="{{$a1->company_email}}"   name="company_email">
                                </div>
                            </div>
                            <BR>
                            <div class="row">
                            <div class="col-md-9">
                                    <label class="form-label">Company Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Address" value="{{$a1->company_address}}"  name="company_address">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Pincode" value="{{$a1->company_pincode}}"  name="company_pincode">
                                </div> 
                            </div>
                            <BR>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Company PAN</label>
                                    <input type="text" class="form-control" placeholder="Enter Company PAN" value="{{$a1->company_pan}}"   name="company_pan">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Company GST</label>
                                    <input type="text" class="form-control" placeholder="Enter Company GST"  value="{{$a1->company_gst}}"   name="company_gst">
                                </div>
                               
                            </div>
                            
                            <br>
                            <h6 class="page-title" style="color: red;">Bank Details :</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name" value="{{$a1->account_name}}"  name="account_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Enter bank name" value="{{$a1->bank_name}}"   name="bank_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> Account No</label>
                                    <input type="text" class="form-control" placeholder="Enter account no" value="{{$a1->account_no}}"  name="account_no">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> IFSC Code</label>
                                    <input type="text" class="form-control" placeholder="Enter ifsc code" value="{{$a1->ifsc_code}}"  name="ifsc_code">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Sales Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$a1->sales_person}}"   name="sales_person">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile"  value="{{$a1->sales_person_mobile}}"   name="sales_person_mobile">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email" value="{{$a1->sales_person_email}}"   name="sales_person_email">
                                </div>
                            </div>
                            
                            <br>
                            <h6 class="page-title" style="color: red;">Account Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$a1->account_person}}"   name="account_person">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile" value="{{$a1->account_person_mobile}}"    name="account_person_mobile">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email" value="{{$a1->account_person_email}}"   name="account_person_email">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Logistics Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$a1->logistics_person}}"   name="logistics_person">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile"  value="{{$a1->logistics_person_mobile}}"   name="logistics_person_mobile">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email" value="{{$a1->logistics_person_email}}"   name="logistics_person_email">
                                </div>
                            </div>
                            <input type="hidden"   name="client_id" class="id1"  value="{{$a1->client_id}}" >
                            <hr/>
                            <h6 class="page-title" style="color: red;">Charges Details</h6>
            
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                        <span class="d-none d-md-block">DELHIVERY</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                        <span class="d-none d-md-block">DTDC HEAVY</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                        <span class="d-none d-md-block">DTDC E-COM</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                    </a>
                                </li>
                                
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings-11" role="tab">
                                        <span class="d-none d-md-block">TRACKON</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings-12" role="tab">
                                        <span class="d-none d-md-block">BEES</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings-13" role="tab">
                                        <span class="d-none d-md-block">BLUDART</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                <h6 class="page-title">SURFACE CHARGES :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','DELHIVERY')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_surface_charges_DELHIVERY))
                                                    @foreach($client_surface_charges_DELHIVERY as $client_surface_charges_DELHIVERY) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->weight}}" name="weight_DELHIVERY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->city}}"   name="city_DELHIVERY_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->zone}}"   name="zone_DELHIVERY_s[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->metro}}"   name="metro_DELHIVERY_s[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->rol_a}}"   name="rol_a_DELHIVERY_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->rol_b}}"   name="rol_b_DELHIVERY_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_DELHIVERY->spl_des}} "  name="spl_des_DELHIVERY_s[]"></td>
                                                        <input type="hidden" value="{{$client_surface_charges_DELHIVERY->id}}"  name='client_surface_charges_id1[]'>
                                                    </tr>
                                                    @endforeach
			                                        @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">EXPRESS CHARGES:</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','DELHIVERY')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_express_charges_DELHIVERY))
                                                    @foreach($client_express_charges_DELHIVERY as $client_express_charges_DELHIVERY) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->weight}}" name="weight_DELHIVERY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->city}}"   name="city_DELHIVERY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->zone}}"   name="zone_DELHIVERY_e[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->metro}}"   name="metro_DELHIVERY_e[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->rol_a}}"   name="rol_a_DELHIVERY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->rol_b}}"   name="rol_b_DELHIVERY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DELHIVERY->spl_des}} "  name="spl_des_DELHIVERY_e[]"></td>
                                                        <input type="hidden" value="{{$client_express_charges_DELHIVERY->id}}"  name='client_express_charges_id1[]'>
                                                    </tr>
                                                    @endforeach
			                                        @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                <h6 class="page-title">D-SURFACE CHARGES :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_surface_charges_DTDC_HEAVY =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC HEAVY')->get()->toArray();
                                                ?>
                                                @if(!empty($client_surface_charges_DTDC_HEAVY))
                                                @foreach($client_surface_charges_DTDC_HEAVY as $client_surface_charges_DTDC_HEAVY)
                                                    <tr>
                                                        <th><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->weight}}"  name="weight_DTDC_HEAVY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->city}}" name="city_DTDC_HEAVY_s[]"></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->region}}" name="region_DTDC_HEAVY_s[]"></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->zone}}" name="zone_DTDC_HEAVY_s[]"></td>
                                                        <th><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->metro}}" name="metro_DTDC_HEAVY_s[]"></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->rol_a}}" name="rol_a_DTDC_HEAVY_s[]"></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->rol_b}}" name="rol_b_DTDC_HEAVY_s[]"></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges_DTDC_HEAVY->spl_des}}" name="spl_des_DTDC_HEAVY_s[]"></td>
                                                        <input type='hidden'  name='client_surface_charges_id2[]' value="{{$client_surface_charges_DTDC_HEAVY->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                    @endif
                                                    
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">X - PREMIUM CARGO :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_express_charges_DTDC_HEAVY =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC HEAVY')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_express_charges_DTDC_HEAVY))
                                                    @foreach($client_express_charges_DTDC_HEAVY as $client_express_charges_DTDC_HEAVY) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->weight}}"  name="weight_DTDC_HEAVY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->city}}" name="city_DTDC_HEAVY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->region}}" name="region_DTDC_HEAVY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->zone}}" name="zone_DTDC_HEAVY_e[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->metro}}" name="metro_DTDC_HEAVY_e[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->rol_a}}" name="rol_a_DTDC_HEAVY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->rol_b}}" name="rol_b_DTDC_HEAVY_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_DTDC_HEAVY->spl_des}}" name="spl_des_DTDC_HEAVY_e[]"></td>
                                                        <input type='hidden'  name='client_express_charges_id2[]' value="{{$client_express_charges_DTDC_HEAVY->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                     @endif
                                                
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">D- AIR CARGO :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_cargo_charges_DTDC_HEAVY =  DB::table("client_cargo_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC HEAVY')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_cargo_charges_DTDC_HEAVY))
                                                    @foreach($client_cargo_charges_DTDC_HEAVY as $client_cargo_charges_DTDC_HEAVY) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->weight}}"  name="weight_DTDC_HEAVY_d[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->city}}" name="city_DTDC_HEAVY_d[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->region}}" name="region_DTDC_HEAVY_d[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->zone}}" name="zone_DTDC_HEAVY_d[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->metro}}" name="metro_DTDC_HEAVY_d[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->rol_a}}" name="rol_a_DTDC_HEAVY_d[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->rol_b}}" name="rol_b_DTDC_HEAVY_d[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_cargo_charges_DTDC_HEAVY->spl_des}}" name="spl_des_DTDC_HEAVY_d[]"></td>
                                                        <input type='hidden'  name='client_cargo_charges_id1[]' value="{{$client_cargo_charges_DTDC_HEAVY->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                     @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                <h6 class="page-title">Ecommerce Priority - 7X :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_express_charges =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC E-COM')->get()->toArray();
                                                ?>
                                                @if(!empty($client_express_charges))
                                                @foreach($client_express_charges as $client_express_charges) 
                                                    <tr>
                                                    <input type='hidden' id='client_express_charges_id' name='client_express_charges_id[]' value="{{$client_express_charges->id}}"/>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges->weight}}"  name="weight_p[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->city}}"  name="city_p[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->region}}"  name="region_p[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->zone}}"  name="zone_p[]" required=""></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges->metro}}"  name="metro_p[]" required=""></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->rol_a}}"  name="rol_a_p[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->rol_b}}"  name="rol_b_p[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges->spl_des}}"  name="spl_des_p[]" required=""></td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">Ecommerce Ground Express - 7D :</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_surface_charges =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC E-COM')->get()->toArray();
                                                ?>
                                                @if(!empty($client_surface_charges))
                                                @foreach($client_surface_charges as $client_surface_charges) 
                                                    <tr>
                                                    <input type='hidden' id='client_surface_charges_id' name='client_surface_charges_id[]' value="{{$client_surface_charges->id}}"/>
                                                        <th><input type="text" class="form-control"  value="{{$client_surface_charges->weight}}"   name="weight_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->city}}"  name="city_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->region}}"  name="region_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->zone}}"  name="zone_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  value="{{$client_surface_charges->metro}}"  name="metro_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->rol_a}}"  name="rol_a_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->rol_b}}"  name="rol_b_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_surface_charges->spl_des}}"  name="spl_des_s[]" required=""></td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">Ecommerce Ground Cargo - 7G :</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_cargo_charges =  DB::table("client_cargo_charges")->where('client_id',$a1->client_id)->where('vendor','DTDC E-COM')->get()->toArray();
                                                ?>
                                                @if(!empty($client_cargo_charges))
                                                @foreach($client_cargo_charges as $client_cargo_charges)
                                                    <tr>
                                                    <input type='hidden' id='client_cargo_charges_id' name='client_cargo_charges_id[]' value="{{$client_cargo_charges->id}}"/>
                                                        <th><input type="text" class="form-control"  value="{{$client_cargo_charges->weight}}"  name="weight_c[]" readonly></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->city}}" name="city_c[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->region}}" name="region_c[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->zone}}" name="zone_c[]" required=""></td>
                                                        <th><input type="text" class="form-control"  value="{{$client_cargo_charges->metro}}" name="metro_c[]" required=""></th>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->rol_a}}" name="rol_a_c[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->rol_b}}" name="rol_b_c[]" required=""></td>
                                                        <td><input type="text" class="form-control"  value="{{$client_cargo_charges->spl_des}}" name="spl_des_c[]" required=""></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane p-3" id="settings-11" role="tabpanel">
                                <h6 class="page-title">SURFACE CHARGES :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','TRACKON')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_surface_charges_TRACKON))
                                                    @foreach($client_surface_charges_TRACKON as $client_surface_charges_TRACKON) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->weight}}"  name="weight_TRACKON_s[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->city}}"  name="city_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->region}}"  name="region_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->zone}}"  name="zone_TRACKON_s[]" required=""></td>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->metro}}"  name="metro_TRACKON_s[]" required=""></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->rol_a}}"  name="rol_a_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->rol_b}}"  name="rol_b_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_TRACKON->spl_des}}"  name="spl_des_TRACKON_s[]" required=""></td>
                                                        <input type='hidden' id='client_surface_charges_id' name='client_surface_charges_id3[]' value="{{$client_surface_charges_TRACKON->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                      @endif
                                          
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">EXPRESS CHARGES:</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','TRACKON')->get()->toArray();
                                                ?>
                                                @if(!empty($client_express_charges_TRACKON))
                                                @foreach($client_express_charges_TRACKON as $client_express_charges_TRACKON)
                                                <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->weight}}"  name="weight_TRACKON_e[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->city}}" name="city_TRACKON_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->region}}" name="region_TRACKON_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->zone}}" name="zone_TRACKON_e[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->metro}}" name="metro_TRACKON_e[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->rol_a}}" name="rol_a_TRACKON_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->rol_b}}" name="rol_b_TRACKON_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_TRACKON->spl_des}}" name="spl_des_TRACKON_e[]"></td>
                                                        <input type='hidden' id='client_express_charges_id' name='client_express_charges_id3[]' value="{{$client_express_charges_TRACKON->id}}"/>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                        </div>
                                </div>
                                <div class="tab-pane p-3" id="settings-12" role="tabpanel">
                                <h6 class="page-title">SURFACE CHARGES :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','BEES')->get()->toArray();
                                                    ?>
                                                    @if(!empty($client_surface_charges_BEES))
                                                    @foreach($client_surface_charges_BEES as $client_surface_charges_BEES)
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_BEES->weight}}"   name="weight_BEES_s[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->city}}"  name="city_BEES_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->region}}"  name="region_BEES_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->zone}}"  name="zone_BEES_s[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_BEES->metro}}"  name="metro_BEES_s[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->rol_a}}"  name="rol_a_BEES_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->rol_b}}"  name="rol_b_BEES_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BEES->spl_des}}"  name="spl_des_BEES_s[]"></td>
                                                        <input type='hidden'  name='client_surface_charges_id4[]' value="{{$client_surface_charges_BEES->id}}"/>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">EXPRESS CHARGES:</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>City</th>
                                                        <th>Region</th>
                                                        <th>Zone</th>
                                                        <th>Metro</th>
                                                        <th>RoI-A</th>
                                                        <th>RoI-B</th>
                                                        <th>Spl.Dest</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','BEES')->get()->toArray();
                                                ?>
                                                @if(!empty($client_express_charges_BEES))
                                                @foreach($client_express_charges_BEES as $client_express_charges_BEES) 
                                                <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_BEES->weight}}"    name="weight_BEES_e[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->city}}"   name="city_BEES_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->region}}"  name="region_BEES_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->zone}}"  name="zone_BEES_e[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_BEES->metro}}"  name="metro_BEES_e[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->rol_a}}"  name="rol_a_BEES_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->rol_b}}"  name="rol_b_BEES_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BEES->spl_des}}"  name="spl_des_BEES_e[]"></td>
                                                        <input type='hidden'  name='client_express_charges_id4[]' value="{{$client_express_charges_BEES->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                    @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                        </div>
                                </div>
                                <div class="tab-pane p-3" id="settings-13" role="tabpanel">
                                <h6 class="page-title">SURFACE CHARGES :</h6>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>WEST / CENTRAL</th>
                                                        <th>SOUTH</th>
                                                        <th>EAST</th>
                                                        <th>KERELA</th>
                                                        <th>J&K, NE</th>
                                                        <th>NORTH</th>
                                                        <th>BIHAR / JHARKHAND</th>
                                                        <th>DELHI, NOIDA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_surface_charges_BLUDART =  DB::table("client_surface_charges")->where('client_id',$a1->client_id)->where('vendor','BLUDART')->get()->toArray();
                                                ?>
                                                @if(!empty($client_surface_charges_BLUDART))
                                                @foreach($client_surface_charges_BLUDART as $client_surface_charges_BLUDART) 
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->weight}}"   name="weight_BLUDART_s[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->west_central}}"  name="west_central_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->south}}"  name="south_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->east}}"  name="east_s[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->kerela}}"  name="kerela_s[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->jk_ne}}"  name="jk_ne_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->north}}"  name="north_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->bihar_jhar}}"  name="bihar_jhar_s[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_surface_charges_BLUDART->delhi_noida}}"  name="delhi_noida_s[]"></td>
                                                        <input type='hidden'  name='client_surface_charges_id5[]' value="{{$client_surface_charges_BLUDART->id}}"/>
                                                    </tr>
                                                    @endforeach
			                                    @endif
                                                    
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div>
                                    <br>
                                    <h6 class="page-title">EXPRESS CHARGES:</h6>
                                    <div class="row">
                                    <div class="table-responsive">
                                            <table class="table mb-0">

                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">Wdeight</th>
                                                        <th>WEST / CENTRAL</th>
                                                        <th>SOUTH</th>
                                                        <th>EAST</th>
                                                        <th>KERELA</th>
                                                        <th>J&K, NE</th>
                                                        <th>NORTH</th>
                                                        <th>BIHAR / JHARKHAND</th>
                                                        <th>DELHI, NOIDA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $client_express_charges_BLUDART =  DB::table("client_express_charges")->where('client_id',$a1->client_id)->where('vendor','BLUDART')->get()->toArray();
                                                ?>
                                                @if(!empty($client_express_charges_BLUDART))
                                                @foreach($client_express_charges_BLUDART as $client_express_charges_BLUDART) 
                                                <tr>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->weight}}"  name="weight_BLUDART_e[]" readonly></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->west_central}}" name="west_central_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->south}}" name="south_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->east}}" name="east_e[]"></td>
                                                        <th><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->kerela}}" name="kerela_e[]"></th>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->jk_ne}}" name="jk_ne_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->north}}" name="north_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->bihar_jhar}}" name="bihar_jhar_e[]"></td>
                                                        <td><input type="text" class="form-control" value="{{$client_express_charges_BLUDART->delhi_noida}}" name="delhi_noida_e[]"></td>
                                                        <input type='hidden' id='client_express_charges_id' name='client_express_charges_id5[]' value="{{$client_express_charges_BLUDART->id}}"/>
                                                    </tr>
                                                    @endforeach
                                                    @endif 
                                                </tbody>
                                                <!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                            <br>
                            <div class="row">
                                <div class="col">    
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                </div>	
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>    

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

