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
                                    <th scope="col" class="text-bold">Name</th>
                                    <th scope="col" class="text-bold">Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->image ? asset('asset/profile/'.$item->image) : asset('asset/profile/react.jpg') }}"
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
                                    <h4>Latest Network Withdraws</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-bold">Name</th>
                                    <th scope="col" class="text-bold">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubic_wds as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->user->image ? asset('asset/profile/'.$item->user->image) : asset('asset/profile/react.jpg') }}"
                                                alt="{{ $item->name }}"></th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->amount }}</td>
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
                                    <h4>Latest Stake Withdraws</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-bold">Name</th>
                                    <th scope="col" class="text-bold">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stake_wds as $item)
                                    <tr>
                                        <th scope="row"><img width="50" src="{{ $item->user->image ? asset('asset/profile/'.$item->user->image) : asset('asset/profile/react.jpg') }}"
                                                alt="{{ $item->name }}"></th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <h6 class="text-center">{{ $item->amount }}</h6>
                                    <ul>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}" alt="Check" />
                                            {{ $item->percent }}%
                                            profit</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $item->ref_percent }}%
                                            Referral percent</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $item->duration . ' ' . $item->period }}
                                            Duration</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $item->min_account_balance_wd }}
                                            Profit transfer to Rubic wallet</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $item->min_rubic_wallet_wd }}
                                            Wallet withdrawal</li>
                                        <li><img src="{{ asset('front_assets/images/check.png') }}"
                                                alt="Check" />{{ $item->min_ref_earn_wd }}
                                            Referral earning transfer to Rubic wallet</li>
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
@endsection
