

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <div id="mymodal" class="modal fade mymodal" tabindex="-1" role="dialog" aria-labelledby="largemodal" data-backdrop="static" data-keyboard="false" aria-hidden="true"  style="display: none;">
          <div class="modal-dialog modal-lg " role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- content will be load here -->
                        <div id="dynamic-content"></div>
					</div>
				</div>
			</div>
        </div>


        <!-- JAVASCRIPT -->
        
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>


        <!-- Peity chart-->
        <script src="{{ asset('assets/libs/peity/jquery.peity.min.js')}}"></script>

        <!-- Plugin Js-->
        <script src="{{ asset('assets/libs/chartist/chartist.min.js')}}"></script>
        <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')}}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{ asset('assets/js/app.js')}}"></script>
        <script src="{{ asset('assets/libs/notify/js/rainbow.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/sample.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/jquery.growl.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/notifIt.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script> 
    
        <script>
		    /**************** Model Open **********************/
			$(document).on('click', '#menu', function(e) 
			{
				e.preventDefault();
				var url = $(this).data('id'); // it will get action url
				//alert(url);
				$('#dynamic-content').html(''); // leave it blank before ajax call
			
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				  });
	  
				$.ajax({
						url: url,
						type: 'GET',
						dataType: 'html'
					})
				.done(function(data) 
				{
					//alert(data);
					$('#dynamic-content').html('');
					$('#dynamic-content').html(data); // load response 

				})
				.fail(function() 
				{
					$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
				});
			});
			/**************** Model Close **********************/

            $(document).ready(function() 
            {
                @if(session()->has('message'))
                    var success_message = '{{ session()->get('message') }}';
                @else
                    var success_message = '';
                @endif
                
                var error_message = '{{ $errors->first() }}';
                
                if (success_message !== '') 
                {
                    notif({
                    msg: success_message,
                    type: "success",
                    position: "right"
                    });
                }
                if (error_message !== '') 
                {
                notif({
                    msg: error_message,
                    type: "error",
                    position: "right"
                    });
                }
            });

            $('document').ready(function() {
                $('#mymodal').modal({
                    backdrop: 'static',
                    keyboard: false
                });

            });    
        </script>
  
</body>


</html>
