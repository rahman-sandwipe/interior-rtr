<header class="header-light">
    <div class="topbar no-sticky" id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div class="header-widget d-flex">
                            <div class="topbar-widget">
                                <a href="#">
                                    <i class="icofont-location-pin"></i>
                                    <span>Dragon Mart-1, International City, Al Awir Road - Dubai - U.A.E</span>
                                </a>
                            </div>
                            <div class="topbar-widget">
                                <a href="#">
                                    <i class="icofont-clock-time"></i>
                                    <span>Mon - Sat: 8AM - 9PM</span>
                                    <span class="ms-3">Sunday: 10AM - 8PM </span>
                                </a>
                            </div>
                            <div class="topbar-widget">
                                <a href="#">
                                    <i class="icofont-envelope"></i>
                                    <span>contact@rtrinterior.com</span>
                                </a>
                            </div>
                        </div>

                        <div class="social-icons">
                            <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest fa-lg"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container sticky-header">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div>
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/partials/dark_logo_67433a63c2d8f.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <!-- logo close -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li><a class="menu-item" href="{{ route('services') }}">{{ __('Services') }}</a></li>
                            <li><a class="menu-item" href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                            <li><a class="menu-item" href="{{ route('case-studies') }}">{{ __('Study Case') }}</a></li>
                            <li><a class="menu-item" href="{{ route('shop') }}">{{ __('Products') }}</a></li>
                            <li><a class="menu-item" href="{{ route('blog') }}">{{ __('Blog') }}</a></li>
                            <li><a class="menu-item" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <div class="h-phone xs-hide">
                                <i class="icofont-headphone-alt"></i>
                                <span>Need Help?</span>058 681 3322
                                {{-- <span>Need Help?</span>055 516 4878 --}}
                            </div>
                            <a href="{{ route('appointment.page') }}" class="btn-main d-xl-block d-md-none">Make Appointment</a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>