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
                        <h6 class="page-title">PickUp Boy</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item"><a href="#">PickUp Boy</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#mymodal" data-id="{{route('view_model', ['page_name' => $page_name, 'param2' => $param2])}}" id="menu" class="btn btn-primary waves-effect waves-light">Add Pickup Boy</button>
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
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
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
            url: "{{ route('pickup-list') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'email_id', name: 'email_id'},
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