<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') __ {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.favicon') }}" type="image/x-icon">
    <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Vendor css -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <!-- Begin page -->
    <div class="wrapper">
        @include('backend.include.inc.sidebar')     <!-- Sidebar File Included -->
        @include('backend.include.inc.header')      <!-- Header File Included -->
        @include('backend.include.inc.searchModal') <!-- Search Modal File Included -->

        <div class="page-content">

            @yield('content')
            <main>
            </main>
            
            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Abstack - By <span
                                class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- END main -->
    </div>
    <!-- END wrapper -->

    @include('backend.include.inc.ThemeSettings')     <!-- Theme Settings -->

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>     <!-- Vendor js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>            <!-- App js -->
</body>
</html>
