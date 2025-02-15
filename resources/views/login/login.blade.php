<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8">
        <title>Quickway</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/notify/css/jquery.growl.css')}}" rel="stylesheet" />
		    <link href="{{ asset('assets/libs/notify/css/notifIt.css')}}" rel="stylesheet" />

    </head>

<body>

    
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to Quickway.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{ asset('assets/images/logo-sm.png')}}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{route('login-postdata')}}" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
                                    </div>

                                    <div class="mb-3 row">
                                        
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="#"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('assets/libs/notify/js/rainbow.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/sample.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/jquery.growl.js')}}"></script>
		<script src="{{ asset('assets/libs/notify/js/notifIt.js')}}"></script>
	
	<script>
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
</script>

</body>

</html>