@extends('front.app')
@section('title')
    {{ __('admin.home_page') }}
@endsection

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            @foreach ($sliders as $slider)
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="carousel-text">
                                <h1 class="display-1 text-uppercase mb-3">{{ $slider->title_trans }}</h1>
                                <p class="fs-5 mb-5">{{ $slider->content[app()->getLocale()] }}</p>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-primary py-3 px-4 me-3"
                                        href="{{ url($slider->btn1_link) ?? '' }}">{{ $slider->btn1_text[app()->getLocale()] ?? 'Join Now' }}</a>
                                    <a class="btn btn-secondary py-3 px-4"
                                        href="{{ url($slider->btn2_link) ?? '' }}">{{ $slider->btn2_text[app()->getLocale()] ?? 'Donate Now' }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="carousel-img">
                                <img class="w-100" src="{{ asset($slider->image->path) }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
   <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="about-img">
                        <img class="img-fluid w-100" src="{{ asset($settings['about_logo']) }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">{{ $settings['about_title'] }}</h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">{{ $settings['about_content'] }}.</p>
                    <div class="row g-4 pt-2">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="h-100">
                                <h3>Our Mission</h3>
                                <p>{{ $settings['ourMission_content'] }}</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>{{ $settings['ourMission_goal1'] }}</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>{{ $settings['ourMission_goal2'] }}</p>
                                <p class="text-dark mb-0"><i class="fa fa-check text-primary me-2"></i>{{ $settings['ourMission_goal3'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


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


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            @foreach ($statistics as $statistic)
                                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                    <div
                                        class="text-center {{ $loop->iteration == 2 || $loop->iteration == 3 ? 'bg-secondary' : 'bg-primary' }} py-5 px-4 h-100">
                                        <i class="{{ $statistic->icon }}"></i>
                                        <h1 class="display-5 mb-0" data-toggle="counter-up">{{ $statistic->number }}</h1>
                                        <span class="text-dark">{{ $statistic->title_trans }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">Few Reasons Why People Choosing Us!</h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">We believe in creating opportunities and empowering
                        communities through education, healthcare, and sustainable development. Your support helps us
                        bring smiles, hope, and a brighter future to those in need.</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.4s"><i class="fa fa-check text-primary me-2"></i>Justo
                        magna erat amet</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.5s"><i class="fa fa-check text-primary me-2"></i>Aliqu
                        diam amet diam et eos</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i class="fa fa-check text-primary me-2"></i>Clita
                        erat ipsum et lorem et sit</p>
                    <div class="d-flex mt-4 wow fadeIn" data-wow-delay="0.7s">
                        <a class="btn btn-primary py-3 px-4 me-3" href="#!">Donate Now</a>
                        <a class="btn btn-secondary py-3 px-4" href="#!">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Donation Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Donation</p>
                <h1 class="display-6 mb-4">Our Donation Causes Around the World</h1>
            </div>
            <div class="row g-4">
                @foreach ($cases as $case)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="donation-item d-flex h-100 p-4">
                            <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                                <h6 class="mb-0">Raised</h6>
                                <span class="mb-2">${{ $case->raised }}</span>
                                <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                    <div class="progress-bar w-100 bg-secondary" role="progressbar"
                                        aria-valuenow="{{ ($case->raised / $case->goal) * 100 }}" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <span class="fs-5">
                                            @if ($case->raised != 0)
                                                %{{ number_format(($case->raised / $case->goal) * 100, 2) }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <h6 class="mb-0">Goal</h6>
                                <span>${{ $case->goal }}</span>
                            </div>
                            <div class="donation-detail">
                                <div class="position-relative mb-4">
                                    <img class="img-fluid w-100" src="{{ asset($case->image->path) }}" alt="">
                                    <a href="#!"
                                        class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">{{ $case->category->title_trans }}</a>
                                </div>
                                <a href="#!" class="h3 d-inline-block">{{ $case->title_trans }}</a>
                                <p> {{ $case->content_trans }} </p>
                                <a href="{{ route('front.donate', $case->id) }}" class="btn btn-primary w-100 py-3"><i
                                        class="fa fa-plus me-2"></i>Donate
                                    Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Donation End -->


    <!-- Banner Start -->
    <div class="container-fluid banner py-5">
        <div class="container">
            <div class="banner-inner bg-light p-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 py-5 text-center">
                        <h1 class="display-6 wow fadeIn" data-wow-delay="0.3s">Our Door Are Always Open to More People
                            Who Want to Support Each Others!</h1>
                        <p class="fs-5 mb-4 wow fadeIn" data-wow-delay="0.5s">Through your donations and volunteer work,
                            we spread kindness and support to children, families, and communities struggling to find
                            stability.</p>
                        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.7s">
                            <a class="btn btn-primary py-3 px-4 me-3" href="#!">Donate Now</a>
                            <a class="btn btn-secondary py-3 px-4" href="#!">Join Us Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Events</p>
                <h1 class="display-6 mb-4">Be a Part of a Global Movement</h1>
            </div>
            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="event-item h-100 p-4">
                            <img class="img-fluid w-100 mb-4" src="{{ asset($event->image->path) }}" alt="">
                            <a href="#!" class="h3 d-inline-block">{{ $event->title_trans }}</a>
                            <p>{{ $event->content_trans }}</p>
                            <div class="bg-light p-4">
                                <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>{{ $event->hours }}</p>
                                <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $event->date }}
                                </p>
                                <p class="mb-0"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Event End -->


    <!-- Donate Start -->
    {{-- <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 mb-4">Let's Donate to Needy People for Better Lives</h1>
                        <p class="fs-5 mb-0">Through your donations, we spread kindness and support to children,
                            families, and communities struggling to find stability.</p>
                    </div>
                </div>
                <div class="col-lg-5 donate-form bg-primary py-5 text-center wow fadeIn" data-wow-delay="0.5s">
                     <div class="h-100 p-5">
                        <form action="{{ route('front.donate.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="case_id" value="{{ $case->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                                            value="{{ Auth::user()->name ?? '' }}" name="name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            value="{{ Auth::user()->email?? '' }}" name="email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="fixed_amount" value="10"
                                            id="fixed_amount1" _ autocomplete="off" checked>
                                        <label class="btn btn-light" for="fixed_amount1">$10</label>

                                        <input type="radio" class="btn-check" value="20" name="fixed_amount"
                                            id="fixed_amount2" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount2">$20</label>

                                        <input type="radio" class="btn-check" value="30" name="fixed_amount"
                                            id="fixed_amount3" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount3">$30</label>

                                        <input type="radio" class="btn-check" value="40" name="fixed_amount"
                                            id="fixed_amount4" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount4">$40</label>

                                        <input type="radio" class="btn-check" value="50" name="fixed_amount"
                                            id="fixed_amount5" autocomplete="off">
                                        <label class="btn btn-light" for="fixed_amount5">$50</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="custom_amount"
                                            placeholder="Custom Amount" value="" name="custom_amount">
                                        <label for=" ">Custom Amount</label>
                                    </div>
                                </div>
                                <label><input type="checkbox" name="anonymous" value="1">
                                    Anonymous Donation</label>
                                <div class="col-12">
                                    <h5>Payment Gateway</h5>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="payment_gateway" value="stripe"
                                            id="Stripe" _ autocomplete="off" checked>
                                        <label class="btn btn-light" for="Stripe">Stripe</label>
                                        <input type="radio" class="btn-check" name="payment_gateway" value="paypal"
                                            id="PayPal" _ autocomplete="off" >
                                        <label class="btn btn-light" for="PayPal">PayPal</label>

                                    </div>

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary py-3 w-100" type="submit">Donate Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Donate End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Team</p>
                <h1 class="display-6 mb-4">Meet Our Dedicated Team Members</h1>
            </div>
            <div class="row g-4">
                @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="team-item d-flex h-100 p-4">
                            <div class="team-detail pe-4">
                                <img class="img-fluid mb-4" src="{{ asset($team->image->path) }}" alt="">
                                <h3>{{ $team->title_trans }}</h3>
                                <span>{{ $team->position }}</span>
                            </div>
                            <div class="team-social bg-light d-flex flex-column justify-content-center flex-shrink-0 p-4">
                                <a class="btn btn-square btn-primary my-2" href="{{ $team->facebook }}"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary my-2" href="{{ $team->x }}"><i
                                        class="fab fa-x-twitter"></i></a>
                                <a class="btn btn-square btn-primary my-2" href="{{ $team->youtube }}"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="btn btn-square btn-primary my-2" href="{{ $team->instagram }}"><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary my-2" href="{{ $team->linkedin }}"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->


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
