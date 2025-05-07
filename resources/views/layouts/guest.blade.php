<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title') — {{ config('app.name') }} </title>
        <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Mindthera — Psychology and Counseling" name="description">
        <meta content="" name="keywords">
        <meta content="" name="author">
        <!-- CSS Files
        ================================================== -->
        <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
        <link href="{{ asset('frontend/css/plugins.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('frontend/css/swiper.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('frontend/css/coloring.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css">
        <!-- color scheme -->
        <link id="colors" href="{{ asset('frontend/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('custom/auth.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('custom/style.css') }}" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <div class="float-text show-on-scroll">
                <span><a href="#">Scroll to top</a></span>
            </div>
            <div class="scrollbar-v show-on-scroll"></div>

            <!-- page preloader begin -->
            {{-- <div id="de-loader"></div> --}}
            <!-- page preloader close -->

            <!-- ======================= header begin ======================= -->
            @include('frontend.include.header')
            <!-- ======================= header close ======================= -->
            <!-- content begin -->
            <div id="top"></div>
                <!-- ======================= section begin ======================= -->
            <div class="main-content no-padding">
                @yield('content')
            </div>
                <!-- ======================= section close ======================= -->
            <!-- content close -->

            <!-- ======================= footer begin ====================== -->
            @include('frontend.include.footer')
            <!-- ======================= footer close ====================== -->
        </div>
        
        <!-- ======================= Javascript Files ======================= -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @yield('scripts')
        
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/js/designesia.js') }}"></script>
        <script src="{{ asset('frontend/js/swiper.js') }}"></script>
        <script src="{{ asset('frontend/js/custom-marquee.js') }}"></script>
        <script src="{{ asset('frontend/js/custom-swiper-1.js') }}"></script>
    </body>
</html>
