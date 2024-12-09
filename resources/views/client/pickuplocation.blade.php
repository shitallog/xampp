<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<?php 
  $page_name = '11';
  $param2 = '1';
?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h6 class="page-title">Pickup Location</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item"><a href="#">Pickup Location</a></li>
                        </ol>
                    </div>
                    <div class="col-md-3">
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#mymodal" data-id="{{route('view_model', ['page_name' => $page_name, 'param2' => $a1->client_id])}}" id="menu" class="btn btn-primary waves-effect waves-light">Add New Pickup Location</button>
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
                                    <th>Pickup Location</th>
                                    <th>Pincode</th>
                                    <th>Status</th>
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
            url: "{{ route('pickup-location-list') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'pickup_address', name: 'pickup_address'},
            {data: 'pincode', name: 'pincode'},
            {data: 'status', name: 'status'},
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