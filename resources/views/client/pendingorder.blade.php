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
                        <h6 class="page-title">Order</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Order</a></li>
                            <li class="breadcrumb-item"><a href="#">Pending Order</a></li>
                        </ol>
                    </div>
                    <div class="col-md-3">
                    <a href="{{route('forward-order')}}">
                        <button type="button"   class="btn btn-primary waves-effect waves-light">Add New Forward Order</button>
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
                                    <th>Order ID</th>
                                    <th>Pickup & Delivery Address</th>
                                    <th>Package Deatils</th>
                                    <th>Payment Deatils</th>
                                    <th>Delivery Deatils</th>
                                    <th>Vendor Type</th>
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
            url: "{{ route('pending-order-list') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'order_id', name: 'order_id'},
            {data: 'address', name: 'address'},
            {data: 'package', name: 'package'},
            {data: 'payment', name: 'payment'},
            {data: 'delivery', name: 'delivery'},
            {
                data: 'vendor_type', 
                name: 'vendor_type', 
                orderable: false, 
                searchable: false
            }
        ]
    });
;
  });
</script>