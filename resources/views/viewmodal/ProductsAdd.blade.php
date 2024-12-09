<h4>Product From Add</h4>

@if(Session::has('message'))
<div class="alert alert-success">
    {{ Session::get('message') }}
</div>
@endif

<form action="{{ route('B2B-add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Service Name Dropdown -->
        <div class="col-md-3">
            <label class="form-label">Service Name</label>
            <select class="form-control" name="service_id" id="service_id" required>
                <option value="" disabled selected>Select a Service</option>
            </select>

        </div>

        <!-- Product Name Input -->
        <div class="col-md-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" required>
        </div>
    </div>

    <br>

    <!-- Buttons -->
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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