<?php $pincode_master = DB::table("ltl_tat")->where("id", $param2)->first();  ?>
<h4>LTL TAT From Edit</h4>
<form action="{{route('LTL-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-3">
		<label class="form-label">ORIGIN CITY CODE</label>
		<input type="text" class="form-control"  name="ORIGIN_CITY_CODE" value="{{$pincode_master->ORIGIN_CITY_CODE}}" required="">
	</div>
	<div class="col-md-3">
		<label class="form-label">ORIGIN CITY NAME</label>
		<input type="text" class="form-control"  name="ORIGIN_CITY_NAME" value="{{$pincode_master->ORIGIN_CITY_NAME}}" required="">
	</div>
	<div class="col-md-3">
		<label class="form-label">DESTINATION PINCODE</label>
		<input type="text" class="form-control" name="DEST_PINCODE" value="{{$pincode_master->DEST_PINCODE}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">DEST CITY CODE</label>
		<input type="text" class="form-control"  name="DEST_CITY_CODE" value="{{$pincode_master->DEST_CITY_CODE}}"  required="">
	</div>
</div>
<br>
<div class="row">
   
	<div class="col-md-3">
		<label class="form-label">DEST CITY NAME</label>
		<input type="text" class="form-control"  name="DEST_CITY_NAME" value="{{$pincode_master->DEST_CITY_NAME}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">PRODUCT</label>
		<input type="text" class="form-control" name="PRODUCT" value="{{$pincode_master->PRODUCT}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">LINE HAUL TAT Days</label>
		<input type="text" class="form-control" name="LINE_HAUL_TATDays" value="{{$pincode_master->LINE_HAUL_TATDays}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">END MILE TAT Days</label>
		<input type="text" class="form-control"  name="END_MILE_TATDays" value="{{$pincode_master->END_MILE_TATDays}}"  required="">
	</div>
</div>
<br>
<div class="row">
   
	<div class="col-md-3">
		<label class="form-label">TAT Days</label>
		<input type="text" class="form-control"  name="TAT_Days" value="{{$pincode_master->TAT_Days}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">CUT OFF TIME</label>
		<input type="text" class="form-control" name="CUT_OFF_TIME" value="{{$pincode_master->CUT_OFF_TIME}}" required="">
	</div>
    <div class="col-md-3">
		<label class="form-label">SSL ODA</label>
		<input type="text" class="form-control" name="SSL_ODA" value="{{$pincode_master->SSL_ODA}}" required="">
	</div>
    
</div>

<input type="hidden" class="form-control" name="pincode_id" value="{{$pincode_master->id}}">
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
