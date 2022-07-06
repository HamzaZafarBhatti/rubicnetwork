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
        .table td {
            vertical-align: middle;
        }
        .table img {
            border-radius: 50px;
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
    @include('front.layout.hero')

   <!-- ==== start step section start ==== -->
    <section class="start start--two section__space__top">
        <div class="container">
            <div class="start__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Cryptocurrency Multi-Chain protocol - RUBIC, designed to perfectly skyrocket your financial results.</h5>
                    <h2>It's Easy to Get Started.</h2>
                   <p class="neutral-bottom">RUBIC NETWORK is the apex of RubicNetwork's Multi-Chain Swap Protocol Network provider that enables users to manually and automatically <strong>Extract</strong> the <strong>RUBIC Token</strong> in blocks and as well as is designed to allow user STAKE the RUBIC/USDT Trading Pair.</p><br>
<p><br />RUBIC, an already existing token, also, as a Multi-Chain Swap protocol, is designed to perfectly skyrocket the financial results, growth, and expectation of Extractors by <strong>STAKING</strong> the <strong>RUBIC/USDT trading pairs</strong> who are also inturned users that extract the RUBIC TOKEN.</p>
                </div>
                <div class="section__header">
                    <h3>Choose your Multi-Chain Extraction Plan.</h3>
                    @if ($plans)
        <section class="section__space pt-0">
            <div class="container">
                <div class="contact__overview__area">
                    <div class="row">
                        @foreach ($plans as $item)
                            <div class="col-md-6 col-xl-6">
                                <div class="contact__overview__single column__space--secondary shadow__effect">
                                    <img src="{{ url('/') }}/asset/images/{{ $item->image }}"
                                        alt="{{ $item->name }}" />
                                    <h5>{{ $item->name }}</h5>
                                    <h3 class="text-center">₦{{ $item->amount }}</h3>
                                    <ul>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />
                                            {{ $item->percent }}%
                                            Extraction Protocol</li>
                                            <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />
                                            Every {{ $item->extraction_plan_time }}hrs
                                            Extraction Power Chain</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />{{ $item->ref_percent }}%
                                            Referral percent</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />{{ $item->duration . ' ' . $item->period }}
                                            Duration</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />{{ $item->indirect_ref_com }}%
                                            Indirect Referral Percent</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />₦{{ $item->min_rubic_wallet_wd }}
                                            Minimum Wallet Withdrawal</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />₦{{ $item->viral_share_bonus }}
                                            Daily Viral Share Bonus</li>
                                            <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />No Referrals Needed for Cashout</li>
                                            <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />Guaranteed Full Cashout Monthly</li>
                                             <a href="{{ route('user.register') }}" class="button button--effect">Start Extraction</a>
                                               <div class="content">
                           <a href="https://rubicnetwork.com/payment_proof" class="button button--secondary button--effect">See Payment Proofs ></a>
                        </div>
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
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box">
                                <img src="{{ asset('front_assets/images/manual_uploads/browse.png') }}" alt="Register & Get Activated" />
                                <div class="step__count">
                                    <h4>01</h4>
                                </div>
                            </div>
                            <h4>Register & Get Activated</h4>
                            <p class="neutral-bottom">Get your RubicNetwork Account Activated to any of our RUBIC Chain Plans
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box arrow__container">
                                <img src="{{ asset('front_assets/images/manual_uploads/invest2.png') }}" alt="View Details & Invest" />
                                <div class="step__count">
                                    <h4>02</h4>
                                </div>
                            </div>
                            <h4>Start Extracting / Staking</h4>
                            <p class="neutral-bottom">Begin your Extraction or Staking journey with us. Skyrocket your financial goals with us. Easy-peasy!
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item">
                            <div class="img__box">
                                <img src="{{ asset('front_assets/images/manual_uploads/browse333.png') }}" alt="Get OUTPUT - Full Cashout" />
                                <div class="step__count">
                                    <h4>03</h4>
                                </div>
                            </div>
                            <h4>Get OUTPUT - Full Cashout</h4>
                            <p class="neutral-bottom">Get Extraction & Staking Output fully and guaranteed paid out to you. No part payments or delays.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #start step section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market market--two section__space__bottom">
        <div class="container">
            <div class="market__area market__area--two section__space bg__img"
                data-background="{{ asset('front_assets/images/light-two.png') }}">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h5 class="neutral-top">What is RUBICNETWORK - Exraction & Staking Platform?</h5>
                            <h2>Extract RUBIC.<br> Stake RUBIC/USDT</h2>
                            <p>Extract RUBIC TOKENS and Get as Revenue with Full Payments - Guaranteed without Referrals.<br>RUBIC/USDT Staking - Financial Earning Staking through RUBIC/USDT Market Trading leverage.
</p>
                            <a href="{{ route('user.register') }}" class="button button--effect">REGISTER NOW!</a>
                            <img src="{{ asset('front_assets/images/arrow.png') }}" alt="Go to" />
                        </div>
                         <div class="content">
                           <a href="https://rubicnetwork.com/payment_proof" class="button button--secondary button--effect">See Payment Proofs ></a>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('front_assets/images/manual_uploads/20220702_201634.png') }}" alt="Explore the Market"
                    class="d-none d-lg-block market__two__thumb" />
            </div>
            
      
        </div>

    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== platform section start ==== -->
    <section class="platform section__space pos__rel over__hi">
        <div class="container">
            <div class="platform__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h5>We're helping you leverage on the RUBIC Multi-Chain Swap Cryptocurrency Project for your financial goals.</h5>
                            <h2>The Convenience & Power
                                To EXTRACT & STAKE
                                Is In Your Hands
                            </h2>
                            <p>JOIN RUBIC NETWORK -
Extract Rubic Token (Proof on Coinmarketcap)

All you have to do is to EXTRACT DAILY, GET EXTRACTION OUTPUT MONTHLY in FULL PAYMENTS. 

<br>STAKE RUBIC/USDT Trading Pair. Get Output Upon Maturity of your STAKE to your WALLET.</p>
                            <a href="{{ route('user.register') }}" class="button button--effect">Start Extraction</a>
                             <a href="{{ route('user.register') }}" class="button button--secondary button--effect">Start Staking</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="platform__thumb thumb__ltr d-none d-lg-block">
                            <img src="{{ asset('front_assets/images/manual_uploads/20220702_184738.png') }}" width="950" height="800" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #platform section end ==== -->

    <!-- ==== why invest section start ==== -->
    <section class="why__invest section__space">
        <div class="container">
            <div class="why__invest__area wow fadeInUp">
                <div class="row d-flex align-items-center">
                    <div class="col-xxl-6">
                        <div class="content column__space--secondary">
                            <h5 class="neutral-top">Join our Cryptocurrency backed-project - RUBICNETWORK</h5>
                            <h2>Why Choose RUBIC NETWORK</h2>
                            <p>RUBICNETWORK is divided into two earning protocols. RUBIC EXTRACTION & RUBIC STAKING.</p>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="why__invest__single shadow__effect__secondary">
                                    <img src="{{ asset('front_assets/images/icons/passive.png') }}" alt="Passive" />
                                    <h5>Powerful Extraction</h5>
                                    <p class="neutral-bottom">Get Full Extraction Output Monthly</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="why__invest__single shadow__effect__secondary">
                                    <img src="{{ asset('front_assets/images/icons/stable.png') }}" alt="Stable Cash Flow" />
                                    <h5>Easy Staking</h5>
                                    <p class="neutral-bottom">Get STAKING Dividend Output Anytime. Unlimited STAKING.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/tax.png') }}" alt="Tax Advantages" />
                            <h5>Superb Interface</h5>
                            <p class="neutral-bottom">We make detailed statistics of your transaction for your Extractions & Staking with us
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/capital.png') }}" alt="Capital Appr'n" />
                            <h5>Security & Protection</h5>
                            <p class="neutral-bottom">We constantly work on improving our robust systems and minimize the level of any risks or factors to jeopardize your earning operations
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/protection.png') }}" alt="Inflation protection" />
                            <h5>Cashout Output</h5>
                            <p class="neutral-bottom">Our powerful Cloud operation platform helps you stay focused on your Extraction & Staking for optimum Cashout anytime
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/diversifaction.png') }}" alt="Diversification" />
                            <h5>Easy Withdrawal</h5>
                            <p class="neutral-bottom">Our withdrawal process takes only 24 hours. We are highly transparent about transactions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #why invest section end ==== -->

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial testimonial--two section__space pos__rel over__hi bg__img"
        data-background="{{ asset('front_assets/images/testimonial/dot-map.png') }}">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h5 class="neutral-top">Full Payments. No Stories. No Delays</h5>
                    <h2>Unlimited & Easy STAKING with any of our STAKE PLANS!
                    </h2>
                    <p class="neutral-bottom">RUBIC STAKING is designed to perfectly skyrocket the financial results, growth, and expectation of Extractors by STAKING the RUBIC/USDT trading pairs with any of our STAKE PLANS.</p>
                </div>
                        </div>
                            @if ($stake_plans)
        <section class="section__space pt-0">
            <div class="container">
                <div class="contact__overview__area">
                    <div class="row">
                        @foreach ($stake_plans as $plan)
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
                                                alt="Check" />{{ $plan->duration . ' ' . $plan->period }}
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
                              <div class="content">
                           <a href="https://rubicnetwork.com/payment_proof" class="button button--secondary button--effect">See Payment Proofs ></a>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #testimonial section end ==== -->
    <section class="cities section__space">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cities__area">
                        <div class="title__with__cta">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-12">
                                    <h4>Latest Registrations</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="fw-bold">Name</th>
                                    <th scope="col" class="fw-bold">Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->image ? asset('asset/profile/'.$item->image) : asset('asset/profile/rubic-avatar-min.jpg') }}"
                                                alt="{{ $item->name }}"></th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->plan->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cities__area">
                        <div class="title__with__cta">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-12">
                                    <h4>Extractors Cashout</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="fw-bold">Name</th>
                                    <th scope="col" class="fw-bold">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubic_wds as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->user->image ? asset('asset/profile/'.$item->user->image) : asset('asset/profile/rubic-avatar-min.jpg') }}"
                                                alt="{{ $item->name }}"></th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>₦{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cities__area">
                        <div class="title__with__cta">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-12">
                                    <h4>Stakes Cashout</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="fw-bold">Name</th>
                                    <th scope="col" class="fw-bold">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stake_wds as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->user->image ? asset('asset/profile/'.$item->user->image) : asset('asset/profile/rubic-avatar-min.jpg') }}"
                                                alt="{{ $item->name }}"></th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>₦{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
