<?php $pickup_boy = DB::table("pickup_boy")->where("id", $param2)->first();  ?>
<h4>Pickup Boy From Edit</h4>
<form action="{{route('pickupboy-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-3">
		<label class="form-label">Name</label>
		<input type="text" class="form-control"  value="{{$pickup_boy->name}}"  name="name" required="">
	</div>
	<div class="col-md-3">
		<label class="form-label">Mobile No</label>
		<input type="text" class="form-control" value="{{$pickup_boy->mobile_no}}" name="mobile_no" required="" readonly>
	</div>
	<div class="col-md-3">
		<label class="form-label">Email</label>
		<input type="text" class="form-control" value="{{$pickup_boy->email_id}}" name="email_id" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">DOB</label>
		<input type="date" class="form-control" value="{{$pickup_boy->dob}}"  name="dob"  required="">
	</div>
</div>
<br>
<div class="row">
   
	<div class="col-md-3">
		<label class="form-label">Gender</label>
		<input type="text" class="form-control" value="{{$pickup_boy->gender}}"  name="gender">
	</div>
    <div class="col-md-9">
		<label class="form-label">Address</label>
		<input type="text" class="form-control" value="{{$pickup_boy->address}}" name="address">
	</div>
   
</div>
<input type="hidden" class="form-control" name="pickupboy_id" value="{{$pickup_boy->id}}">
<br>
<div class="row">
  <div class="col">    
    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
  </div>	
</div>
</form>


<script>
$('#mySelect2').select2({
  closeOnSelect: false
});
</script>
