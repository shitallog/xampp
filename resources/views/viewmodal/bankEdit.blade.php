<?php $quickway_client = DB::table("quickway_client")->where("client_id", $param2)->first();  ?>
<h4>Bank From Edit</h4>
<hr/>
<form action="{{route('bank-edit')}}" method="post"  enctype="multipart/form-data" >
@csrf
<div class="row">
  <div class="col-md-4">
		<label class="form-label">Account Name</label>
		<input type="text" class="form-control"  name="account_name" value="{{$quickway_client->account_name}}"  required="">
	</div>
	<div class="col-md-4">
		<label class="form-label">Bank Name</label>
		<input type="text" class="form-control"  name="bank_name" value="{{$quickway_client->bank_name}}" required="">
	</div>
	<div class="col-md-4">
		<label class="form-label">Account No</label>
		<input type="text" class="form-control" name="account_no" value="{{$quickway_client->account_no}}"  required="">
	</div>
    
</div>
<br>
<div class="row">
   
	<div class="col-md-4">
		<label class="form-label">IFSC COde</label>
		<input type="text" class="form-control"  name="ifsc_code" value="{{$quickway_client->ifsc_code}}"  required="">
	</div>
    
</div>

<br>
<input type="hidden" class="form-control" name="client_id" value="{{$quickway_client->client_id}}">
<div class="row">
  <div class="col">    
    <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
  </div>	
</div>
</form>


