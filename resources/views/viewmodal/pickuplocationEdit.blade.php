<h4>Pickup Location From Edit</h4>
<?php $client_pickup_location = DB::table("client_pickup_location")->where("id", $param2)->first();  ?>
<hr/>
<form action="{{route('pickuplocation-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
<div class="col-md-12">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="is_Active" id="inlineRadio1" value="0" <?php if($client_pickup_location->is_Active == '0') { echo 'checked';} ?> >
    <label class="form-check-label" for="inlineRadio1">Active</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="is_Active" id="inlineRadio2" value="1" <?php if($client_pickup_location->is_Active == '1') { echo 'checked';} ?>>
    <label class="form-check-label" for="inlineRadio2">Inactive</label>
    </div>
</div>
    
</div>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Facility Name </label>
		<input type="text" class="form-control" placeholder="Enter Name" value="{{$client_pickup_location->facility_name}}"   name="facility_name" required="">
	</div>
	<div class="col-md-4">
		<label class="form-label">Contact Person Name (Optional)</label>
		<input type="text" class="form-control" placeholder="Enter Contact Person Name" value="{{$client_pickup_location->contact_person_name}}"   name="contact_person_name">
	</div>
	<div class="col-md-4">
		<label class="form-label">Pickup Location Contact</label>
		<input type="text" class="form-control" placeholder="Enter mobile no" value="{{$client_pickup_location->pickup_contact}}"  name="pickup_contact" required="">
	</div>
    
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Email (Optional)</label>
		<input type="text" class="form-control" placeholder="Enter Email ID" value="{{$client_pickup_location->pickup_email}}"   name="pickup_email">
	</div>
	<div class="col-md-8">
		<label class="form-label">Address Line</label>
		<input type="text" class="form-control" placeholder="Enter Address" value="{{$client_pickup_location->pickup_address}}"   name="pickup_address" required="">
	</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Pincode</label>
		<input type="text" class="form-control" placeholder="Enter Pincode" value="{{$client_pickup_location->pincode}}"   name="pincode" required="">
	</div>

    <div class="col-md-8">
		<label class="form-label">Pickup Slot</label>
		<select class="form-control select2" name="slot" required="">
            <option value="">Select Slot</option>
            <option value="12:00 AM - 06:00 AM" <?php if($client_pickup_location->slot == '12:00 AM - 06:00 AM') { echo 'selected';} ?>>Early Morning <BR> 12:00 AM - 06:00 AM</option>
            <option value="06:00 AM - 10:00 AM" <?php if($client_pickup_location->slot == '06:00 AM - 10:00 AM') { echo 'selected';} ?>>Morning <BR> 06:00 AM - 10:00 AM </option>
            <option value="10:00 AM - 02:00 PM" <?php if($client_pickup_location->slot == '10:00 AM - 02:00 PM') { echo 'selected';} ?>>Mid Day <BR> 10:00 AM - 02:00 PM</option>
            <option value="02:00 PM - 06:00 PM" <?php if($client_pickup_location->slot == '02:00 PM - 06:00 PM') { echo 'selected';} ?>>Evening <BR> 02:00 PM - 06:00 PM</option>
            <option value="06:00 PM - 09:00 PM" <?php if($client_pickup_location->slot == '06:00 PM - 09:00 PM') { echo 'selected';} ?>>Late Evening <BR> 06:00 PM - 09:00 PM</option>
            <option value="09:00 PM - 12:00 PM" <?php if($client_pickup_location->slot == '09:00 PM - 12:00 PM') { echo 'selected';} ?>>Night <BR> 09:00 PM - 12:00 PM</option>
        </select>    
	</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
		<label class="form-label">City</label>
		<input type="text" class="form-control" placeholder="Enter City"  name="pickup_city" value="{{$client_pickup_location->pickup_city}}" required="">
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
<div class="row <?php if($client_pickup_location->return_type == '1') { echo '"';} else { echo 'answer';} ?>">
   <div class="col-md-8">
		<label class="form-label">Address Line</label>
		<input type="text" class="form-control" placeholder="Enter Address" value="{{$client_pickup_location->return_address}}"   name="return_address">
	</div>
	<div class="col-md-4">
		<label class="form-label">Pincode</label>
		<input type="text" class="form-control" placeholder="Enter Pincode" value="{{$client_pickup_location->return_pincode}}"   name="return_pincode">
	</div>
</div>    
<br>
<input type="hidden" class="form-control" name="pickuplocation_id" value="{{$client_pickup_location->id}}">
<div class="row">
  <div class="col">    
    <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
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


