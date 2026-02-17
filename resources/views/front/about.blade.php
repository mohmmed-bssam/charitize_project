@extends('front.app')
    @section('title', 'About Us')
    @section('content')



    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
                                <img class="img-fluid mb-4" src="{{ asset($team->image->path) }}" alt="{{ $team->title_trans }}">
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





    @endsection
