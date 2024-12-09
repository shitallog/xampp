<?php $client_product = DB::table("client_product")->where("product_id", $param2)->first();  ?>
<h4>Product From Edit</h4>
<hr/>
<form action="{{route('product-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
    <div class="col-md-6">
        <label class="form-label">Item Name</label>
        <input type="text" value="{{$client_product->item_name}}" class="form-control" placeholder="Enter Item Name"   name="item_name" required="">
    </div>

    <div class="col-md-6">
        <label class="form-label">SKU Code</label>
        <input type="text" value="{{$client_product->sku_code}}" class="form-control" placeholder="Enter Sku code"   name="sku_code" required="">
    </div>
</div> 
<br>
<div class="row">
    <div class="col-md-6">
        <label class="form-label">Category</label>
        <input type="text" value="{{$client_product->category}}" class="form-control" placeholder="Enter Category"   name="category" required="">
    </div>

    <div class="col-md-6">
        <label class="form-label">Price</label>
        <input type="number" value="{{$client_product->price}}" class="form-control" placeholder="Enter Price"   name="price" required="">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label class="form-label">Discount</label>
        <input type="number" value="{{$client_product->discount}}" class="form-control" placeholder="Enter Discount" value="0"   name="discount">
    </div>

    <div class="col-md-6">
        <label class="form-label">Discount Type</label><br>
        <select class="form-control" name="discount_type">
            <option value="0">Amount</option>
            <option value="1">Percentage</option>
        </select>    
    </div>
</div>
<br>
<input type="hidden" class="form-control" name="product_id" value="{{$client_product->product_id}}">
<br>
<div class="row">
  <div class="col">    
    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
  </div>	
</div>
</form>


<script>
$('#mySelect2').select2({
  closeOnSelect: false
});
</script>
