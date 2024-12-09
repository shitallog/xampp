<?php $pincode_master = DB::table("pincode")->where("id", $param2)->first();  ?>
<h4>Pincode From Edit</h4>
<form action="{{ route('B2C-edit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Service Name</label>
            <select class="form-control" name="service_id" id="service_id">
                <option value="" disabled selected>Select a Service</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Product Name</label>
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>Select a Product</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Upload Pincode Excel</label>
            <input type="file" class="form-control" name="pincode_file" id="pincode_file" accept=".xlsx, .xls">
        </div>
    </div>
    <input type="hidden" class="form-control" name="id" value="{{ $pincode_master->id }}"> <!-- Corrected here -->

    <br>
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
// Use jQuery for the AJAX functionality
$(document).ready(function() {
    $('#service_id').on('change', function() {
        const serviceId = $(this).val();
        $('#product_id').empty().append('<option value="" disabled selected>Loading...</option>');

        if (serviceId) {
            $.ajax({
                url: "{{ route('get-products-by-service') }}",
                type: "GET",
                data: {
                    service_id: serviceId
                },
                success: function(data) {
                    $('#product_id').empty().append(
                        '<option value="" disabled selected>Select a Product</option>');
                    data.forEach(product => {
                        $('#product_id').append(
                            `<option value="${product.id}">${product.product_name}</option>`
                        );
                    });
                },
                error: function() {
                    $('#product_id').empty().append(
                        '<option value="" disabled selected>No products found</option>');
                }
            });
        }
    });
});
</script>


<script>
$('#mySelect2').select2({
    closeOnSelect: false
});
</script>