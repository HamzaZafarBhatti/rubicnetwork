@extends('front.layout.app')

@section('styles')
    <style>
        .contact__overview__area ul li img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin: 0;
        }

        .contact__overview__area ul li {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 8px;
        }

        @media (min-width:1400px) {
            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 1750px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner clear__top bg__img" data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Rubic Staking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Rubic Staking
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->
    <!-- ==== terms & conditions section start ==== -->
    <section class="terms section__space">
        <div class="container">
            <div class="terms-area">
                {!! $rubic_staking !!}
            </div>
        </div>
    </section>
        <div class="container">
            <div class="testimonial__area">
                    <h5 class="neutral-top">Full Payments. No Stories. No Delays</h5>
                    <h2>Unlimited & Easy STAKING with any of our STAKE PLANS!
                    </h2>
                    <p class="neutral-bottom">RUBIC STAKING is designed to perfectly skyrocket the financial results, growth, and expectation of Extractors by STAKING the RUBIC/USDT trading pairs with any of our STAKE PLANS.</p><br>
                </div>
                        </div>
    @if ($plans)
        <section class="section__space pt-0">
            <div class="container">
                <div class="contact__overview__area">
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-md-6 col-xl-3">
                                <div class="contact__overview__single column__space--secondary shadow__effect">
                                    <img src="{{ url('/') }}/asset/images/{{ $plan->image }}"
                                        alt="{{ $plan->name }}" />
                                    <h5>{{ $plan->name }}</h5>
                                    <h3 class="text-center">₦{{ $plan->amount }}</h3>
                                    <ul>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />
                                            {{ $plan->percent }}%
                                            Daily Stake Profit</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->ref_percent }}%
                                            Stake Referral Earnings</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->duration . ' ' . $plan->period }}s
                                            Stake Active Duration</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />₦{{ $plan->stake_profit_transfer }} 
                                            Minimum Stake Profit Transfer to Stake Wallet</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />₦{{ $plan->stake_wallet_wd }}
                                            Minimum Stake Wallet Withdrawal</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />Unlimited Staking</li>
                                                <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />Instant Cashout Anytime to Bank or Tether USDT of STAKE PROFITS</li>
                                             <a href="{{ route('user.register') }}" class="button button--effect d-none d-sm-block">Stake Now
                            <i class="fa-solid fa-arrow-circle-right"></i> </a>
                                    </ul>
                                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                                    <hr />
                                    <p class="neutral-bottom">
                                        <a href="mailto:example@example.com">contact@revest.com</a>
                                    </p> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ==== #terms & conditions section end ==== -->
@endsection
