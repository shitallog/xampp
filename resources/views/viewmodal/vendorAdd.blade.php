<h4>Vendor From Add</h4>
<hr/>
<form action="{{route('vendor-add')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-6">
		<label class="form-label">Vendor Name</label>
		<input type="text" class="form-control"  name="vendor_name" required="">
	</div>
	

</div>
<br>



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
