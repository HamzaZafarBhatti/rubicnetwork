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
                            <a href="index.html">Home</a>
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
                                    <h6 class="text-center">{{ $plan->amount }}</h6>
                                    <ul>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />
                                            {{ $plan->percent }}%
                                            Stake profit</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->ref_percent }}%
                                            referral percent</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->duration . ' ' . $plan->period }}
                                            Duration</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->return_capital ? 'Yes' : 'No' }}
                                            Return capital</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->stake_profit_transfer }}
                                            Stake profit transfer to stake wallet</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->stake_wallet_wd }}
                                            Stake wallet withdrawal</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $plan->ref_earning_transfer }}
                                            Stake referral earning transfer to stake wallet</li>
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
