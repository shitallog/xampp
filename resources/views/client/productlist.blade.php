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
                        <h6 class="page-title">Product</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Client</a></li>
                            <li class="breadcrumb-item"><a href="#">Product List</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#itemModal"  class="btn btn-primary waves-effect waves-light">Add New Product</button>
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
                                    <th>Product Name</th>
                                    <th>SKU Code</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
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

    <div id="itemModal" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel"   data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Item Deatils </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Item Name</label>
                            <input type="text" class="form-control" placeholder="Enter Item Name"   id="item_name" required="">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">SKU Code</label>
                            <input type="text" class="form-control" placeholder="Enter Sku code"   id="sku_code" required="">
                        </div>
                    </div> 
                    <br>
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" placeholder="Enter Category"   id="category" required="">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" placeholder="Enter Price"   id="price" required="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-md-6">
                            <label class="form-label">Discount</label>
                            <input type="number" class="form-control" placeholder="Enter Discount" value="0"   id="discount">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Discount Type</label><br>
                            <select class="form-control" id="discount_type">
                                <option value="0">Amount</option>
                                <option value="1">Percentage</option>
                            </select>    
                        </div>
                    </div>     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick='getitem()' class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<script type="text/javascript">
  $(function () {
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('product-datatable') }}",
            type: "GET",
            
        },
        columns: [
            {data: 'item_name', name: 'item_name'},
            {data: 'sku_code', name: 'sku_code'},
            {data: 'category', name: 'category'},
            {data: 'price', name: 'price'},
            {data: 'discount', name: 'discount'},
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


    function getitem()
     {

	   
        var item_name =  $('#item_name').val();
        var sku_code =  $('#sku_code').val();
        var category =  $('#category').val();
        var price =  $('#price').val();
        var discount =  $('#discount').val();
        var discount_type =  $('#discount_type').val();
        

        $.ajax({
            type:'POST',
            url: '{{ route('product-add-post') }}',
            data: {  _token: "{{ csrf_token() }}",item_name: item_name,sku_code: sku_code,category: category,price: price,discount: discount,discount_type: discount_type},
            dataType: "json",
                success:function(success)
                {
                    var keysu=success.keysu;
                    if(keysu == '202')
                    {
                        notif({
                        msg: 'Product add successfully..',
                        type: "success",
                        position: "right"
                        });
                        $("#itemModal").modal("hide");
                        window.location.href = "{{route('product-list')}}";


                    }
                    else if(keysu == '201')
                    {
                        notif({
                        msg: 'All Feild are mandatory.',
                        type: "error",
                        position: "right"
                        });
                    }
                  
                }
        });
      }
</script>