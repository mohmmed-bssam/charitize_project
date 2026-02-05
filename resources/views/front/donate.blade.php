@extends('front.app')
@section('title', 'Donation')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Donation</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Donate Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">

                        <h1 class="display-6 mb-4">{{ $case->title_trans }}</h1>
                        <p class="fs-5 mb-4">{{ $case->content_trans }}</p>
                        <div>
                            <img class="w-25 mb-1" src="{{ asset($case->image->path) }}" alt="">
                            @foreach ($case->gallery as $item)
                                <img class="w-25" src="{{ asset($item->path) }}" alt="">
                            @endforeach
                        </div>
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
                                            value="{{ Auth::user()->name }}" name="name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            value="{{ Auth::user()->email }}" name="email">
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
    </div>
    <!-- Donate End -->



@endsection
@section('js')
    <script>
        const custom_amount = document.querySelector('#custom_amount');
        const fixed_amounts = document.querySelectorAll('input[name="fixed_amount"]');
        custom_amount.onkeyup = () => {
            if (custom_amount.value.length > 0) {
                fixed_amounts.forEach((item) => {
                    item.checked = false;

                    if (item.value === custom_amount.value) {
                        item.checked = true;
                    }
                });
            } else {
                fixed_amounts[0].checked = true;

            }
        };
        fixed_amounts.forEach((item) => {
            item.onclick = () => {
                custom_amount.value = '';

            }
        });
    </script>
@endsection
