<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <?php 
  $page_name = 'services';
?>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h6 class="page-title">Service Management</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item"><a href="#">Services</a></li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#serviceModal" id="addServiceBtn"
                            class="btn btn-primary waves-effect waves-light">Add Service</button>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="serviceTable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal -->
    <div id="serviceModal" class="modal fade" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="serviceForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel">Add Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="serviceId" name="service_id">
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(function() {
        // Initialize DataTable
        var table = $('#serviceTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('service-list') }}",
                type: "GET",
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Add/Edit Modal Show
        $('#addServiceBtn').on('click', function() {
            $('#serviceForm')[0].reset();
            $('#serviceId').val('');
            $('#serviceModalLabel').text('Add Service');
        });

        // Submit Form
        $('#serviceForm').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            let url = $('#serviceId').val() ? "{{ route('service-update') }}" :
                "{{ route('service-store') }}";

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    $('#serviceModal').modal('hide');
                    table.ajax.reload();
                    alert(response.message);
                },
                error: function(error) {
                    alert('Something went wrong!');
                }
            });
        });

        // Edit Service
        $('body').on('click', '.editService', function() {
            let serviceId = $(this).data('id');
            $.get("{{ route('service-edit') }}", {
                id: serviceId
            }, function(data) {
                $('#serviceId').val(data.id);
                $('#serviceName').val(data.name);
                $('#serviceModalLabel').text('Edit Service');
                $('#serviceModal').modal('show');
            });
        });

        // Delete Service
        $('body').on('click', '.deleteService', function() {
            if (confirm('Are you sure you want to delete this service?')) {
                let serviceId = $(this).data('id');
                $.post("{{ route('service-delete') }}", {
                    id: serviceId,
                    _token: "{{ csrf_token() }}"
                }, function(response) {
                    table.ajax.reload();
                    alert(response.message);
                });
            }
        });
    });
    </script>