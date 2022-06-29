@extends('front.layout.app')

@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner key-banner banner--secondary terms__banner clear__top bg__img"
        data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top mb-0">Top Earners</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Top Earners
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="{{ asset('assets/images/banner/key-illustration.png') }}" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->
    <!-- ==== details section start ==== -->
    <section class="p__details__two faq section__space__bottom">
        <div class="container">
            <div class="p__details__area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="p__details__content">
                            <div class="group__one">
                                <h4>Rubic Network Earners</h4>
                                {{-- <p>Purpose of the loan To increase the company's working capital</p> --}}
                                <div class="tabular__group">
                                    @if ($rubic_earners)
                                        <div class="single">
                                            <p class="fw-bold">Name</p>
                                            <p class="fw-bold">Amount</p>
                                            <p class="fw-bold">Status</p>
                                        </div>
                                        @foreach ($rubic_earners as $item)
                                            <div class="single">
                                                <p>{{ $item->name }}</p>
                                                <p>₦{{ $item->amount }}</p>
                                                <p class="badge bg-success">
                                                    @if ($item->status)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- <p class="neutral-bottom">The purpose of the financing is to partially refinance an
                                    existing loan on the Nordstreet platform. Refinancing is requested to adjust
                                    financial flows. </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p__details__content">
                            <div class="group__one">
                                <h4>Rubic Stake Earners</h4>
                                {{-- <p>Purpose of the loan To increase the company's working capital</p> --}}
                                <div class="tabular__group">
                                    @if ($stake_earners)
                                        <div class="single">
                                            <p class="fw-bold">Name</p>
                                            <p class="fw-bold">Amount</p>
                                            <p class="fw-bold">Status</p>
                                        </div>
                                        @foreach ($stake_earners as $item)
                                            <div class="single">
                                                <p>{{ $item->name }}</p>
                                                <p>₦{{ $item->amount }}</p>
                                                <p class="badge bg-success">
                                                    @if ($item->status)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- <p class="neutral-bottom">The purpose of the financing is to partially refinance an
                                    existing loan on the Nordstreet platform. Refinancing is requested to adjust
                                    financial flows. </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #details section end ==== -->
@endsection
