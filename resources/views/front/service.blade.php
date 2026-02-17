@extends('front.app')
@section('title', 'Service')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Service</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-title">
                        <h1 class="display-6 mb-4">What We Do for Those in Need.</h1>
                        <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row g-5">
                        @foreach ($services as $service)
                            <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="service-item h-100">
                                    <div class="btn-square bg-light mb-4">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                    <h3>{{ $service->title_trans }}</h3>
                                    <p class="mb-2">{{ $service->content_trans }}</p>
                                    {{-- <a href="#!">Read More</a> --}}
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->




    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-title">
                        <h1 class="display-6 mb-4">What People Say About Our Activities.</h1>
                        <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial-item">
                                <div class="row g-5 align-items-center">
                                    <div class="col-md-6">
                                        <div class="testimonial-img">
                                            <img class="img-fluid" src="{{ asset($testimonial->image->path) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="testimonial-text pb-5 pb-md-0">
                                            <div class="mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $testimonial->rate)
                                                        <i class="fas fa-star text-primary"></i>
                                                    @else
                                                        <i class="far fa-star text-primary"></i>
                                                    @endif
                                                @endfor

                                            </div>
                                            <p class="fs-5">{{ $testimonial->review[app()->getLocale()] }}.</p>
                                            <div class="d-flex align-items-center">
                                                <div class="btn-lg-square bg-light text-secondary flex-shrink-0">
                                                    <i class="fa fa-quote-right fa-2x"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h5 class="mb-0">{{ $testimonial->title_trans }}</h5>
                                                    <span>{{ $testimonial->position }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection
