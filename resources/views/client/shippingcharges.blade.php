<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<?php 
  $page_name = '9';
  $param2 = '1';
?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">Shipping Charges</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                            <li class="breadcrumb-item"><a href="#">Shipping Charges</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges_DELHIVERY->weight}}</th>
                                                        <td>{{$client_surface_charges_DELHIVERY->city}}</td>
                                                        <td>{{$client_surface_charges_DELHIVERY->zone}}</td>
                                                        <th>{{$client_surface_charges_DELHIVERY->metro}}</th>
                                                        <td>{{$client_surface_charges_DELHIVERY->rol_a}}</td>
                                                        <td>{{$client_surface_charges_DELHIVERY->rol_b}}</td>
                                                        <td>{{$client_surface_charges_DELHIVERY->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges_DELHIVERY->weight}}</th>
                                                        <td>{{$client_express_charges_DELHIVERY->city}}</td>
                                                        <td>{{$client_express_charges_DELHIVERY->zone}}</td>
                                                        <th>{{$client_express_charges_DELHIVERY->metro}}</th>
                                                        <td>{{$client_express_charges_DELHIVERY->rol_a}}</td>
                                                        <td>{{$client_express_charges_DELHIVERY->rol_b}}</td>
                                                        <td>{{$client_express_charges_DELHIVERY->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges_DTDC_HEAVY->weight}}</th>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->city}}</td>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->region}}</td>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->zone}}</td>
                                                        <th>{{$client_surface_charges_DTDC_HEAVY->metro}}</th>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->rol_a}}</td>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->rol_b}}</td>
                                                        <td>{{$client_surface_charges_DTDC_HEAVY->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges_DTDC_HEAVY->weight}}</th>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->city}}</td>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->region}}</td>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->zone}}</td>
                                                        <th>{{$client_express_charges_DTDC_HEAVY->metro}}</th>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->rol_a}}</td>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->rol_b}}</td>
                                                        <td>{{$client_express_charges_DTDC_HEAVY->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_cargo_charges_DTDC_HEAVY->weight}}</th>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->city}}</td>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->region}}</td>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->zone}}</td>
                                                        <th>{{$client_cargo_charges_DTDC_HEAVY->metro}}</th>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->rol_a}}</td>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->rol_b}}</td>
                                                        <td>{{$client_cargo_charges_DTDC_HEAVY->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges->weight}}</th>
                                                        <td>{{$client_express_charges->city}}</td>
                                                        <td>{{$client_express_charges->region}}</td>
                                                        <td>{{$client_express_charges->zone}}</td>
                                                        <th>{{$client_express_charges->metro}}</th>
                                                        <td>{{$client_express_charges->rol_a}}</td>
                                                        <td>{{$client_express_charges->rol_b}}</td>
                                                        <td>{{$client_express_charges->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges->weight}}</th>
                                                        <td>{{$client_surface_charges->city}}</td>
                                                        <td>{{$client_surface_charges->region}}</td>
                                                        <td>{{$client_surface_charges->zone}}</td>
                                                        <th>{{$client_surface_charges->metro}}</th>
                                                        <td>{{$client_surface_charges->rol_a}}</td>
                                                        <td>{{$client_surface_charges->rol_b}}</td>
                                                        <td>{{$client_surface_charges->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_cargo_charges->weight}}</th>
                                                        <td>{{$client_cargo_charges->city}}</td>
                                                        <td>{{$client_cargo_charges->region}}</td>
                                                        <td>{{$client_cargo_charges->zone}}</td>
                                                        <th>{{$client_cargo_charges->metro}}</th>
                                                        <td>{{$client_cargo_charges->rol_a}}</td>
                                                        <td>{{$client_cargo_charges->rol_b}}</td>
                                                        <td>{{$client_cargo_charges->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges_TRACKON->weight}}</th>
                                                        <td>{{$client_surface_charges_TRACKON->city}}</td>
                                                        <td>{{$client_surface_charges_TRACKON->region}}</td>
                                                        <td>{{$client_surface_charges_TRACKON->zone}}</td>
                                                        <th>{{$client_surface_charges_TRACKON->metro}}</th>
                                                        <td>{{$client_surface_charges_TRACKON->rol_a}}</td>
                                                        <td>{{$client_surface_charges_TRACKON->rol_b}}</td>
                                                        <td>{{$client_surface_charges_TRACKON->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges_TRACKON->weight}}</th>
                                                        <td>{{$client_express_charges_TRACKON->city}}</td>
                                                        <td>{{$client_express_charges_TRACKON->region}}</td>
                                                        <td>{{$client_express_charges_TRACKON->zone}}</td>
                                                        <th>{{$client_express_charges_TRACKON->metro}}</th>
                                                        <td>{{$client_express_charges_TRACKON->rol_a}}</td>
                                                        <td>{{$client_express_charges_TRACKON->rol_b}}</td>
                                                        <td>{{$client_express_charges_TRACKON->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges_BEES->weight}}</th>
                                                        <td>{{$client_surface_charges_BEES->city}}</td>
                                                        <td>{{$client_surface_charges_BEES->region}}</td>
                                                        <td>{{$client_surface_charges_BEES->zone}}</td>
                                                        <th>{{$client_surface_charges_BEES->metro}}</th>
                                                        <td>{{$client_surface_charges_BEES->rol_a}}</td>
                                                        <td>{{$client_surface_charges_BEES->rol_b}}</td>
                                                        <td>{{$client_surface_charges_BEES->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges_BEES->weight}}</th>
                                                        <td>{{$client_express_charges_BEES->city}}</td>
                                                        <td>{{$client_express_charges_BEES->region}}</td>
                                                        <td>{{$client_express_charges_BEES->zone}}</td>
                                                        <th>{{$client_express_charges_BEES->metro}}</th>
                                                        <td>{{$client_express_charges_BEES->rol_a}}</td>
                                                        <td>{{$client_express_charges_BEES->rol_b}}</td>
                                                        <td>{{$client_express_charges_BEES->spl_des}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_surface_charges_BLUDART->weight}}</th>
                                                        <td>{{$client_surface_charges_BLUDART->west_central}}</td>
                                                        <td>{{$client_surface_charges_BLUDART->south}}</td>
                                                        <td>{{$client_surface_charges_BLUDART->east}}</td>
                                                        <th>{{$client_surface_charges_BLUDART->kerela}}</th>
                                                        <td>{{$client_surface_charges_BLUDART->jk_ne}}</td>
                                                        <td>{{$client_surface_charges_BLUDART->north}}</td>
                                                        <td>{{$client_surface_charges_BLUDART->bihar_jhar}}</td>
                                                        <td>{{$client_surface_charges_BLUDART->delhi_noida}}</td>
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
                                            <table class="table table-bordered mb-0"">

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
                                                        <th>{{$client_express_charges_BLUDART->weight}}</th>
                                                        <td>{{$client_express_charges_BLUDART->west_central}}</td>
                                                        <td>{{$client_express_charges_BLUDART->south}}</td>
                                                        <td>{{$client_express_charges_BLUDART->east}}</td>
                                                        <th>{{$client_express_charges_BLUDART->kerela}}</th>
                                                        <td>{{$client_express_charges_BLUDART->jk_ne}}</td>
                                                        <td>{{$client_express_charges_BLUDART->north}}</td>
                                                        <td>{{$client_express_charges_BLUDART->bihar_jhar}}</td>
                                                        <td>{{$client_express_charges_BLUDART->delhi_noida}}</td>
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
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

