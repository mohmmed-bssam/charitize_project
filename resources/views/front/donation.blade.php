@extends('front.app')
@section('title','Donation')

@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Donation</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donation</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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







@endsection
