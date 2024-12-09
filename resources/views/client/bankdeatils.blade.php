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
                        <h6 class="page-title">Bank Deatils</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item"><a href="#">Bank Deatils</a></li>
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
                                <p>Account Name : {{$a1->account_name}}</p>
                                <p>Bank Name : {{$a1->bank_name}}</p>
                                <p>Account no : {{$a1->account_no}}</p>
                                <p>IFSC Code : {{$a1->ifsc_code}}</p>
                            </blockquote>
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#mymodal" data-id="{{route('view_model', ['page_name' => $page_name, 'param2' => $a1->client_id])}}" id="menu" class="btn btn-primary waves-effect waves-light">Edit</button>
                        </div>
                    </div>
                </div>

                
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

