<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<?php 
  $page_name = '7';
  $param2 = '1';
?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">LTL TAT</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item"><a href="#">LTL TAT</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#mymodal" data-id="{{route('view_model', ['page_name' => $page_name, 'param2' => $param2])}}" id="menu" class="btn btn-primary waves-effect waves-light">Add LTL TAT</button>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                <tr>
                                    <th>ORIGIN CITY CODE</th>
                                    <th>ORIGIN CITY NAME</th>
                                    <th>DEST PINCODE</th>
                                    <th>DEST CITY CODE</th>
                                    <th>DEST CITY NAME</th>
                                    <th>PRODUCT</th>
                                    <th>LINE HAUL TAT Days</th>
                                    <th>END MILE TAT Days</th>
                                    <th>TAT Days</th>
                                    <th>CUT OFF TIME</th>
                                    <th>SSL ODA</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<script type="text/javascript">
  $(function () {
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('LTL-list') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'ORIGIN_CITY_CODE', name: 'ORIGIN_CITY_CODE'},
            {data: 'ORIGIN_CITY_NAME', name: 'ORIGIN_CITY_NAME'},
            {data: 'DEST_PINCODE', name: 'DEST_PINCODE'},
            {data: 'DEST_CITY_CODE', name: 'DEST_CITY_CODE'},
            {data: 'DEST_CITY_NAME', name: 'DEST_CITY_NAME'},
            {data: 'PRODUCT', name: 'PRODUCT'},
            {data: 'LINE_HAUL_TATDays', name: 'LINE_HAUL_TATDays'},
            {data: 'END_MILE_TATDays', name: 'END_MILE_TATDays'},
            {data: 'TAT_Days', name: 'TAT_Days'},
            {data: 'CUT_OFF_TIME', name: 'CUT_OFF_TIME'},
            {data: 'SSL_ODA', name: 'SSL_ODA'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false
            }
        ]
    });
;
  });
</script>