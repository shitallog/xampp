<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <?php 
  $page_name = '5';
  $param2 = '1';
?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">Pincode</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item"><a href="#">Pincode</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mymodal"
                            data-id="{{route('view_model', ['page_name' => $page_name, 'param2' => $param2])}}"
                            id="menu" class="btn btn-primary waves-effect waves-light">Add Pincode</button>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Service_name</th>
                                        <th>product_name</th>
                                        <th>Pincode</th>
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
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('B2C-list') }}", // Route to fetch data from the database
            columns: [{
                    data: 'service_name',
                    name: 'service_name'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'pincode',
                    name: 'pincode'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
    </script>