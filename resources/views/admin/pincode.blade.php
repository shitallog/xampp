<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <?php 
        $page_name = '2'; // Example dynamic page name ID
        $param2 = '1';    // Example dynamic parameter
    ?>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">service</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item"><a href="#">service</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#mymodal"
                            data-id="{{ route('view_model', ['page_name' => $page_name, 'param2' => $param2]) }}"
                            id="menu" class="btn btn-primary waves-effect waves-light">Add service</button>
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
                                        <th>Service</th>
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
    </div> <!-- End Page-content -->

    <script type="text/javascript">
    $(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('service-list') }}", // Adjusted to fetch the services
                type: "GET",
            },
            columns: [{
                    data: 'name', // Adjusted to show the 'name' of service
                    name: 'name'
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
</div>