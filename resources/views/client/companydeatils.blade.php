<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h6 class="page-title">Company Deatils</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item"><a href="#">Company Deatils</a></li>
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
               <div class="col-lg-4">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <blockquote class="card-blockquote mb-0">
                                <p>Company Name : {{$a1->company_name}}</p>
                                <p>Company Mobile : {{$a1->company_mobile_no}}</p>
                                <p>Company Email : {{$a1->company_email}}</p>
                                <p>Company Pan : {{$a1->company_pan}}</p>
                                
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <blockquote class="card-blockquote mb-0">
                                <p>Company GST : {{$a1->company_gst}}</p>
                                <p>Address : {{$a1->company_address}}</p>
                                <p>Pincode: {{$a1->company_pincode}}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <p>Sales Person </p>
                            <blockquote class="card-blockquote mb-0">
                                <p>Sales Person Name : {{$a1->sales_person}}</p>
                                <p>Sales Person Mobile : {{$a1->sales_person_mobile}}</p>
                                <p>Sales Person Email : {{$a1->sales_person_email}}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <p>Account Person </p>
                            <blockquote class="card-blockquote mb-0">
                                <p>Account Person Name : {{$a1->account_person}}</p>
                                <p>Account Person Mobile : {{$a1->account_person_mobile}}</p>
                                <p>Account Person Email : {{$a1->account_person_email}}</p>

                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <p>Logistics Person </p>
                            <blockquote class="card-blockquote mb-0">
                                <p>Logistics Person Name : {{$a1->logistics_person}}</p>
                                <p>Logistics Person Mobile : {{$a1->logistics_person_mobile}}</p>
                                <p>Logistics Person Email : {{$a1->logistics_person_email}}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

