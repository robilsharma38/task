<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>@yield('title','Auth')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('public/admin/images/favicon.ico')}}">
        <!-- App css -->
        <link href="{{url('public/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{url('public/admin/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{url('public/admin/css/select2.css')}}" rel="stylesheet" />
    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
                        
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="{{url('public/admin/images/logo.png')}}" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">

                                <div class="text-center">
                                    <img src="{{url('public/admin/images/startman.svg')}}" height="120" alt="File not found Image">

                                    <h1 class="text-error mt-4">500</h1>
                                    <h4 class="text-uppercase text-danger mt-3">Internal Server Error</h4>

                                    <a class="btn btn-info mt-3" href="javascript:void(0)"><i class="mdi mdi-reply"></i> We are tring to fix</a>
                                </div>

                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- bundle -->
        <script src="{{url('public/admin/js/vendor.min.js')}}"></script>
        <script src="{{url('public/admin/js/app.min.js')}}"></script>
    </body>
</html>
