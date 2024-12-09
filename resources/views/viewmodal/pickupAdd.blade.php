<h4>Pickup Boy From Add</h4>
<form action="{{route('pickupboy-add')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-3">
		<label class="form-label">Name</label>
		<input type="text" class="form-control"  name="name" required="">
	</div>
	<div class="col-md-3">
		<label class="form-label">Mobile No</label>
		<input type="text" class="form-control"  name="mobile_no" required="">
	</div>
	<div class="col-md-3">
		<label class="form-label">Email</label>
		<input type="text" class="form-control" name="email_id" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">DOB</label>
		<input type="date" class="form-control"  name="dob"  required="">
	</div>
</div>
<br>
<div class="row">
   
	<div class="col-md-3">
		<label class="form-label">Gender</label>
		<input type="text" class="form-control"  name="gender">
	</div>
    <div class="col-md-9">
		<label class="form-label">Address</label>
		<input type="text" class="form-control" name="address">
	</div>
   
</div>

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
