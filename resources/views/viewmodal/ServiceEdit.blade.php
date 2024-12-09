<?php $pincode_master = DB::table("services")->where("id", $param2)->first();  ?>
<h4>Service From Edit</h4>
<hr />
<form action="{{route('pincode-edit')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Service Name</label>
            <input type="text" class="form-control" value="{{ $pincode_master->name }}" name="name" required="">
        </div>
    </div>
    <br>


    <input type="hidden" class="form-control" name="service_id" value="{{ $pincode_master->id }}">

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