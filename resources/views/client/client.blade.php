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
                        <h6 class="page-title">Client</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Client</a></li>
                            <li class="breadcrumb-item"><a href="#">Client List</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                    <a href="{{route('client-add')}}">
                        <button type="button"  class="btn btn-primary waves-effect waves-light">Add New Client</button>
                    </a>
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
                                    <th>Company Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>PAN</th>
                                    <th>GST</th>
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
            url: "{{ route('client-datatable') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'client_id', name: 'client_id'},
            {data: 'company_name', name: 'company_name'},
            {data: 'company_mobile_no', name: 'company_mobile_no'},
            {data: 'company_email', name: 'company_email'},
            {data: 'company_pan', name: 'company_pan'},
            {data: 'company_gst', name: 'company_gst'},
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