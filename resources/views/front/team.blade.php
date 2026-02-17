@extends('front.app')
@section('title', 'teams')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Team</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
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

@endsection
