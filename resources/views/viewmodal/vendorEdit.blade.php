<?php $vendor = DB::table("vendor")->where("vendor_id", $param2)->first();  ?>
<h4>Vendor From Edit</h4>
<hr/>
<form action="{{route('vendor-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-6">
		<label class="form-label">Vendor Name</label>
		<input type="text" class="form-control" value="{{$vendor->vendor_name}}" name="vendor_name" required="">
	</div>
	

</div>
<br>



<input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->vendor_id}}">
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
