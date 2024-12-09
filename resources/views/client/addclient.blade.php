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
                            <li class="breadcrumb-item"><a href="#">Add New Client</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{route('client-postdata')}}" method="post"  enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name"  name="company_name" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Company Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Mobile"   name="company_mobile_no" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Company EMail</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Email"  name="company_email">
                                </div>
                            </div>
                            <BR>
                            <div class="row">
                               <div class="col-md-9">
                                    <label class="form-label">Company Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Address"  name="company_address" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Pincode"  name="company_pincode">
                                </div> 
                            </div> 
                              
                            <BR>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Company PAN</label>
                                    <input type="text" class="form-control" placeholder="Enter Company PAN"  name="company_pan" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Company GST</label>
                                    <input type="text" class="form-control" placeholder="Enter Company GST"   name="company_gst" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter Username"   name="username" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" placeholder="Enter Password"   name="password" required="">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Bank Details :</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name"  name="account_name" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> Bank Name</label>
                                    <input type="text" class="form-control" placeholder="Enter bank name"   name="bank_name" required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> Account No</label>
                                    <input type="text" class="form-control" placeholder="Enter account no"  name="account_no">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"> IFSC Code</label>
                                    <input type="text" class="form-control" placeholder="Enter ifsc code"  name="ifsc_code">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Sales Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name"  name="sales_person" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile"   name="sales_person_mobile" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email"  name="sales_person_email">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Account Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name"  name="account_person" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile"   name="account_person_mobile" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email"  name="account_person_email">
                                </div>
                            </div>
                            <br>
                            <h6 class="page-title" style="color: red;">Logistics Person Details :</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name"  name="logistics_person" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter Mobile"   name="logistics_person_mobile" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"> Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email"  name="logistics_person_email">
                                </div>
                            </div>
                            <hr/>
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="500 mg"  name="weight_DELHIVERY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DELHIVERY_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DELHIVERY_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DELHIVERY_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor1[]" value="DELHIVERY">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional 500 mg"  name="weight_DELHIVERY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DELHIVERY_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DELHIVERY_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DELHIVERY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DELHIVERY_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor1[]" value="DELHIVERY">
                                                    </tr>
                                                    
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
                                                <tr>
                                                        <th><input type="text" class="form-control" value="500 mg"  name="weight_DELHIVERY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DELHIVERY_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DELHIVERY_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DELHIVERY_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor2[]" value="DELHIVERY">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional 500 mg"  name="weight_DELHIVERY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DELHIVERY_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DELHIVERY_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DELHIVERY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DELHIVERY_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor2[]" value="DELHIVERY">
                                                    </tr>
                                                    
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="MINIMUM 3 KG"  name="weight_DTDC_HEAVY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor3[]" value="DTDC HEAVY">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 1 KG"  name="weight_DTDC_HEAVY_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor3[]" value="DTDC HEAVY">
                                                    </tr>
                                                    
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="MINIMUM 3 KG"  name="weight_DTDC_HEAVY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor4[]" value="DTDC HEAVY">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 1 KG"  name="weight_DTDC_HEAVY_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor4[]" value="DTDC HEAVY">
                                                    </tr>
                                                   
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="MINIMUM  3 KG"  name="weight_DTDC_HEAVY_d[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_d[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_d[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_d[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor5[]" value="DTDC HEAVY">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 1 KG"  name="weight_DTDC_HEAVY_d[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_DTDC_HEAVY_d[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_DTDC_HEAVY_d[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_DTDC_HEAVY_d[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_DTDC_HEAVY_d[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor5[]" value="DTDC HEAVY">
                                                    </tr>
                                                    
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="500 mg"  name="weight_p[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_p[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_p[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_p[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor6[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional 500 mg"  name="weight_p[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_p[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_p[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_p[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor6[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional per kg > 5 kg"  name="weight_p[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_p[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_p[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_p[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor6[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="1 Kg"  name="weight_p[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_p[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_p[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_p[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_p[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor6[]" value="DTDC E-COM">
                                                    </tr>
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="500 mg"  name="weight_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor7[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional 500 mg"  name="weight_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor7[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="Additional per kg > 5 kg"  name="weight_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor7[]" value="DTDC E-COM">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control"  value="1 Kg"  name="weight_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor7[]" value="DTDC E-COM">
                                                    </tr>
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
                                                        <tr>
                                                            <th><input type="text" class="form-control" value="Up yo 10 kg(per kg)"  name="weight_c[]" readonly></th>
                                                            <td><input type="text" class="form-control"  name="city_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="region_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="zone_c[]" required=""></td>
                                                            <th><input type="text" class="form-control"  name="metro_c[]" required=""></th>
                                                            <td><input type="text" class="form-control"  name="rol_a_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="rol_b_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="spl_des_c[]" required=""></td>
                                                            <input type="hidden" class="form-control"  name="vendor8[]" value="DTDC E-COM">
                                                        </tr>
                                                        <tr>
                                                            <th><input type="text" class="form-control" value="Additional per kg > 10 kg"  name="weight_c[]" readonly></th>
                                                            <td><input type="text" class="form-control"  name="city_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="region_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="zone_c[]" required=""></td>
                                                            <th><input type="text" class="form-control"  name="metro_c[]" required=""></th>
                                                            <td><input type="text" class="form-control"  name="rol_a_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="rol_b_c[]" required=""></td>
                                                            <td><input type="text" class="form-control"  name="spl_des_c[]" required=""></td>
                                                            <input type="hidden" class="form-control"  name="vendor8[]" value="DTDC E-COM">
                                                        </tr>
                                                        
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="1 Kg"  name="weight_TRACKON_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_TRACKON_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_TRACKON_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_TRACKON_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor9[]" value="TRACKON">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 1 Kg"  name="weight_TRACKON_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_TRACKON_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_TRACKON_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_TRACKON_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_TRACKON_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor9[]" value="TRACKON">
                                                    </tr>
                                                    
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
                                                <tr>
                                                        <th><input type="text" class="form-control" value="1 Kg"  name="weight_TRACKON_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_TRACKON_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_TRACKON_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_TRACKON_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor10[]" value="TRACKON">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 1 Kg"  name="weight_TRACKON_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_TRACKON_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_TRACKON_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_TRACKON_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_TRACKON_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor10[]" value="TRACKON">
                                                    </tr>
                                                    
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="500 GM"  name="weight_BEES_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_BEES_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_BEES_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_BEES_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor11[]" value="BEES">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 500 GM"  name="weight_BEES_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_BEES_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_BEES_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_BEES_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_BEES_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor11[]" value="BEES">
                                                    </tr>
                                                    
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
                                                <tr>
                                                        <th><input type="text" class="form-control" value="500 GM"  name="weight_BEES_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_BEES_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_BEES_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_BEES_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor12[]" value="BEES">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD 500 GM"  name="weight_BEES_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="city_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="region_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="zone_BEES_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="metro_BEES_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="rol_a_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="rol_b_BEES_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="spl_des_BEES_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor12" value="BEES">
                                                    </tr>
                                                    
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
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="MINIMUM 10 KG"  name="weight_BLUDART_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="west_central_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="south_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="east_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="kerela_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="jk_ne_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="north_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="bihar_jhar_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="delhi_noida_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor13[]" value="BLUDART">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD PER KG"  name="weight_BLUDART_s[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="west_central_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="south_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="east_s[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="kerela_s[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="jk_ne_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="north_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="bihar_jhar_s[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="delhi_noida_s[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor13[]" value="BLUDART">
                                                    </tr>
                                                    
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
                                                <tr>
                                                        <th><input type="text" class="form-control" value="MINIMUM 10 KG"  name="weight_BLUDART_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="west_central_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="south_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="east_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="kerela_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="jk_ne_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="north_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="bihar_jhar_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="delhi_noida_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor14[]" value="BLUDART">
                                                    </tr>
                                                    <tr>
                                                        <th><input type="text" class="form-control" value="ADD PER KG"  name="weight_BLUDART_e[]" readonly></th>
                                                        <td><input type="text" class="form-control"  name="west_central_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="south_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="east_e[]" required=""></td>
                                                        <th><input type="text" class="form-control"  name="kerela_e[]" required=""></th>
                                                        <td><input type="text" class="form-control"  name="jk_ne_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="north_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="bihar_jhar_e[]" required=""></td>
                                                        <td><input type="text" class="form-control"  name="delhi_noida_e[]" required=""></td>
                                                        <input type="hidden" class="form-control"  name="vendor14[]" value="BLUDART">
                                                    </tr>
                                                    
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
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
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

