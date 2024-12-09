<?php $pincode_master = DB::table("products")->where("id", $param2)->first(); ?>
<h4>Product From Edit</h4>

<form action="{{ route('B2B-edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Service Name</label>
            <select class="form-control" name="service_id" id="service_id" required>
                <option value="" disabled selected>Select a Service</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{ $pincode_master->product_name }}"
                required>
        </div>
    </div>
    <br>
    <input type="hidden" class="form-control" name="id" value="{{ $pincode_master->id }}"> <!-- Corrected here -->

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    // Fetch services dynamically when the page loads
    $.ajax({
        url: "{{ route('get-services') }}",
        method: "GET",
        success: function(data) {
            var serviceDropdown = $('#service_id');
            serviceDropdown.empty(); // Clear existing options
            serviceDropdown.append('<option value="" disabled selected>Select a Service</option>');

            data.forEach(function(service) {
                serviceDropdown.append('<option value="' + service.id + '">' + service
                    .name + '</option>');
            });
        },
        error: function(error) {
            console.error('Error fetching services:', error);
        }
    });
});
</script>

<script>
$('#mySelect2').select2({
    closeOnSelect: false
});
</script>