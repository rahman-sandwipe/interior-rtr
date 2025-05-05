<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') __ {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ config('app.logo') }}" type="image/x-icon">

        <!-- App css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .preview {
                width: 120px;
                height: 70px;
                overflow: hidden;
                display: inline-block;
                margin-right: 10px;
                border: 1px solid #ccc;
                padding: 5px;
                border-radius: 5px;
            }
            .preview img {
                max-width: 100px;
                max-height: 100px;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">      <!-- Begin page -->

            @include('backend.include.header') <!-- end header -->
            @include('backend.include.sidebar') <!-- end left sidebar -->

            <div class="content-page">  <!-- Start Content-->
                @yield('content')
            </div>  <!-- Start Content-->
        </div>      <!-- END wrapper -->

        @include('backend.include.right-sidebar') <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('backend/libs/chart-js/Chart.bundle.min.js') }}"></script>
        <!-- Init js -->
        <script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @yield('scripts')   <!-- page js -->
    </body>
</html>