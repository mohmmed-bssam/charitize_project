<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
    @if (app()->getLocale() == 'ar')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap');

            body {
                direction: rtl;
                text-align: right;
                font-family: 'Cairo', sans-serif;
            }

            .text-lg-start {
                text-align: right !important;
            }

            h6,
            .h6,
            h5,
            .h5,
            h4,
            .h4,
            h3,
            .h3,
            h2,
            .h2,
            h1,
            .h1 {
                font-family: 'Cairo', sans-serif;

            }

            .breadcrumb-item+.breadcrumb-item::before {
                float:right;
                padding-right: .5rem;
            }
        </style>
    @endif

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="{{ url('/') }}">
                    @isset($settings['site_logo'])
                        <img width="80" src="{{ asset($settings['site_logo']) }}" alt="Logo">
                    @else
                        <h1 class="display-5 text-primary m-0">Charitize</h1>
                    @endisset
                </a>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="row">
                    <div class="col-lg-4">
                        @isset($settings['call_us'])
                            <div class="d-flex justify-content-end">
                                <div class="flex-shrink-0 btn-square bg-primary">
                                    <i class="fa fa-phone-alt text-dark"></i>
                                </div>
                                <div class="ms-2">
                                    <h6 class="text-primary mb-0">Call Us</h6>
                                    <span class="text-white">{{ $settings['call_us'] }}</span>
                                </div>
                            </div>
                        @endisset
                    </div>
                    <div class="col-lg-4">
                        @isset($settings['mail_us'])
                            <div class="d-flex justify-content-end">
                                <div class="flex-shrink-0 btn-square bg-primary">
                                    <i class="fa fa-envelope-open text-dark"></i>
                                </div>
                                <div class="ms-2">
                                    <h6 class="text-primary mb-0">Mail Us</h6>
                                    <span class="text-white">{{ $settings['mail_us'] }}</span>
                                </div>
                            </div>
                        @endisset
                    </div>
                    <div class="col-lg-4">
                        @isset($settings['address'])
                            <div class="d-flex justify-content-end">
                                <div class="flex-shrink-0 btn-square bg-primary">
                                    <i class="fa fa-map-marker-alt text-dark"></i>
                                </div>
                                <div class="ms-2">
                                    <h6 class="text-primary mb-0">Address</h6>
                                    <span class="text-white">{{ $settings['address'] }}</span>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="nav-bar">
                <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                    <h4 class="d-lg-none m-0">Menu</h4>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav {{ app()->getLocale() == 'ar' ? 'ms-auto' : 'me-auto' }}">
                            <a href="{{ route('front.index') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.index') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('front.about') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.about') ? 'active' : '' }}">About</a>
                            <a href="{{ route('front.services') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.services') ? 'active' : '' }}">Service</a>
                            <a href="{{ route('front.donation') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.donation') ? 'active' : '' }}">Donation</a>
                            <a href="{{ route('front.events') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.events') ? 'active' : '' }}">Events</a>
                            <a href="{{ route('front.features') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.features') ? 'active' : '' }}">Features</a>
                            <a href="{{ route('front.teams') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.teams') ? 'active' : '' }}">Teams</a>
                            <a href="{{ route('front.testimonials') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.testimonials') ? 'active' : '' }}">Testimonials</a>
                            <a href="{{ route('front.contact') }}"
                                class="nav-item nav-link {{ Request()->routeIs('front.contact') ? 'active' : '' }}">Contact</a>

                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode != app()->getLocale())
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        class="nav-item nav-link">{{ $properties['native'] }}</a>
                                @endif
                            @endforeach

                        </div>
                        <div class="d-none d-lg-flex ms-auto">
                            @isset($settings['x'])
                                <a class="btn btn-square btn-dark ms-2" href="{{ $settings['x'] }}"><i
                                        class="fab fa-twitter"></i></a>
                            @endisset

                            @isset($settings['facebook'])
                                <a class="btn btn-square btn-dark ms-2" href="{{ $settings['facebook'] }}"><i
                                        class="fab fa-facebook-f"></i></a>
                            @endisset

                            @isset($settings['youtube'])
                                <a class="btn btn-square btn-dark ms-2" href="{{ $settings['youtube'] }}"><i
                                        class="fab fa-youtube"></i></a>
                            @endisset
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="row g-5 py-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Our Office</h4>
                        @isset($settings['address'])
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $settings['address'] }}</p>
                        @endisset
                        @isset($settings['call_us'])
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $settings['call_us'] }}</p>
                        @endisset
                        @isset($settings['mail_us'])
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $settings['mail_us'] }}</p>
                        @endisset
                        <div class="d-flex pt-3">
                            @isset($settings['x'])
                                <a class="btn btn-square btn-primary me-2" href="{{ $settings['x'] }}"><i
                                        class="fab fa-x-twitter"></i></a>
                            @endisset
                            @isset($settings['facebook'])
                                <a class="btn btn-square btn-primary me-2" href="{{ $settings['facebook'] }}"><i
                                        class="fab fa-facebook-f"></i></a>
                            @endisset

                            @isset($settings['youtube'])
                                <a class="btn btn-square btn-primary me-2" href="{{ $settings['youtube'] }}"><i
                                        class="fab fa-youtube"></i></a>
                            @endisset

                            @isset($settings['linkedin'])
                                <a class="btn btn-square btn-primary me-2" href="{{ $settings['linkedin'] }}"><i
                                        class="fab fa-linkedin-in"></i></a>
                            @endisset
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="{{ route('front.about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('front.contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('front.services') }}">Our Services</a>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Business Hours</h4>
                        <p class="mb-1">Monday - Friday</p>
                        <h6 class="text-light">09:00 am - 07:00 pm</h6>
                        <p class="mb-1">Saturday</p>
                        <h6 class="text-light">09:00 am - 12:00 pm</h6>
                        <p class="mb-1">Sunday</p>
                        <h6 class="text-light">Closed</h6>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Gallery</h4>
                        <div class="row g-2">
                            {{-- @foreach (Image::where('type', 'gallery')->pluck('path')->get() as $gallery)
                                <div class="col-4">
                                    <img class="img-fluid w-100" src="{{ asset($gallery) }}"
                                        alt="">
                                </div>
                            @endforeach --}}
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-1.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-2.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-3.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-4.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-5.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid w-100" src="{{ asset('img/gallery-6.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright pt-5">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="fw-semi-bold" href="#!">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                            <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                            <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                            Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>.
                            Distributed
                            by
                            <a class="fw-semi-bold" href="https://themewagon.com">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('js')
</body>

</html>
