<h4>Pickup Location From Add</h4>
<hr/>
<form action="{{route('pickuplocation-add')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Facility Name </label>
		<input type="text" class="form-control" placeholder="Enter Name"  name="facility_name" required="">
	</div>
	<div class="col-md-4">
		<label class="form-label">Contact Person Name (Optional)</label>
		<input type="text" class="form-control" placeholder="Enter Contact Person Name"  name="contact_person_name">
	</div>
	<div class="col-md-4">
		<label class="form-label">Pickup Location Contact</label>
		<input type="text" class="form-control" placeholder="Enter mobile no" name="pickup_contact" required="">
	</div>
    
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Email (Optional)</label>
		<input type="text" class="form-control" placeholder="Enter Email ID"  name="pickup_email">
	</div>
	<div class="col-md-8">
		<label class="form-label">Address Line</label>
		<input type="text" class="form-control" placeholder="Enter Address"  name="pickup_address" required="">
	</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Pincode</label>
		<input type="text" class="form-control" placeholder="Enter Pincode"  name="pincode" required="">
	</div>

    <div class="col-md-8">
		<label class="form-label">Pickup Slot</label>
		<select class="form-control select2" name="slot" required="">
            <option value="">Select Slot</option>
            <option value="12:00 AM - 06:00 AM">Early Morning <BR> 12:00 AM - 06:00 AM</option>
            <option value="06:00 AM - 10:00 AM">Morning <BR> 06:00 AM - 10:00 AM </option>
            <option value="10:00 AM - 02:00 PM">Mid Day <BR> 10:00 AM - 02:00 PM</option>
            <option value="02:00 PM - 06:00 PM">Evening <BR> 02:00 PM - 06:00 PM</option>
            <option value="06:00 PM - 09:00 PM">Late Evening <BR> 06:00 PM - 09:00 PM</option>
            <option value="09:00 PM - 12:00 PM">Night <BR> 09:00 PM - 12:00 PM</option>
        </select>    
	</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">City</label>
		<input type="text" class="form-control" placeholder="Enter City"  name="pickup_city" required="">
	</div>
</div>    
<br>
<h4 class="card-title">Working Days</h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]" id="inlineCheckbox1" value="Monday" checked>
            <label class="form-check-label" for="inlineCheckbox1">Monday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox2" value="Tuesday" checked>
            <label class="form-check-label" for="inlineCheckbox2">Tuesday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox3" value="Wednesday" checked>
            <label class="form-check-label" for="inlineCheckbox3">Wednesday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox4" value="Thursday" checked>
            <label class="form-check-label" for="inlineCheckbox4">Thursday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox5" value="Friday" checked>
            <label class="form-check-label" for="inlineCheckbox5">Friday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox6" value="Saturday" checked>
            <label class="form-check-label" for="inlineCheckbox6">Saturday</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="working_days[]"  id="inlineCheckbox7" value="Sunday" checked>
            <label class="form-check-label" for="inlineCheckbox7">Sunday</label>
        </div>
    </div>    
</div> 
<hr/> 
<h4 class="card-title">Return Details</h4> 
<div class="row">
    <div class="col-md-12">
        <div class="form-check form-check-inline">
            <input class="form-check-input coupon_question" type="checkbox" name="return_type" id="return_type" value="0" checked>
            <label class="form-check-label" for="return_type">Rturn address is the same as Pickup Address</label>
        </div>
    </div>
</div>
<br>
<div class="row answer">
   <div class="col-md-8">
		<label class="form-label">Address Line</label>
		<input type="text" class="form-control" placeholder="Enter Address"  name="return_address">
	</div>
	<div class="col-md-4">
		<label class="form-label">Pincode</label>
		<input type="text" class="form-control" placeholder="Enter Pincode"  name="return_pincode">
	</div>
</div>    
<br>
<input type="hidden" class="form-control" placeholder="Enter Pincode"  name="client_id" value="<?php echo $param2 ?>">
<div class="row">
  <div class="col">    
    <button type="submit" class="btn btn-success waves-effect waves-light">Add Pickup Address</button>
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
  </div>	
</div>
</form>

<script>
    $(".answer").hide();
        $(".coupon_question").click(function() {
            if($(this).is(":checked"))
             {
                $(".answer").hide();
            } else
            {
                $(".answer").show();
            }
        });
</script>


