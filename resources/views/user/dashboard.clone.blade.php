@extends('user.layouts.master')
@section('title')
    @lang('translation.Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('/user_assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
    <style>
        #tradingview_d68cc {
            height: 400px;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title2')
            RubicNetwork
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><span class="text-primary">Rubic Extraction</span>
                    <div>
                        <small>Extract RUBIC TOKENS and Get as Revenue with Full Payments - Guaranteed without
                            Referrals</small>
                    </div>
                </h4>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">My Rubic Wallet</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->rubic_wallet }}">{{ auth()->user()->rubic_wallet }}</span>
                            </h4>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->rubic_wallet }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="https://rubicnetwork.com/user/wallet/withdraw_history">Wallet History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Extraction Balance</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->extraction_balance }}">{{ auth()->user()->extraction_balance }}</span>
                            </h4>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->extraction_balance }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.extractions.history') }}">Extraction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Referral Earnings</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->ref_earning }}">{{ auth()->user()->ref_earning }}</span>
                            </h4>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->ref_earning }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.referrals.earning_history') }}">Referral Earnings History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Indirect Referral Earnings</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->indirect_ref_earning }}">{{ auth()->user()->indirect_ref_earning }}</span>
                            </h4>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->indirect_ref_earning }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart13" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.indirect_referrals.earning_history') }}">Indirect Referral Earnings
                            History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Viral Trend</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->viral_share_earning }}">{{ auth()->user()->viral_share_earning }}</span>
                            </h4>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->viral_share_earning }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.viral_shares.history') }}">Viral Trend History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Viral Trend</span>
                            <h4 class="mb-3">
                                <span class="counter-value"
                                    data-target="{{ $viral_share_count }}">{{ $viral_share_count }}</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart5" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.viral_shares.history') }}">Viral Trend History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Wallet Withdrawal</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="{{ auth()->user()->user_withdrawals->where('status',1)->sum('amount') }}">{{ auth()->user()->user_withdrawals->where('status',1)->sum('amount') }}</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart6" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.wallet.withdraw_history') }}">Wallet Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Extracts</span>
                            <h4 class="mb-3">
                                <span class="counter-value"
                                    data-target="{{ $extractions_count }}">{{ $extractions_count }}</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart7" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.extractions.history') }}">Extraction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><span class="text-primary">Rubic Staking</span>
                    <div>
                        <small>Financial Earning Staking through RUBIC/USDT Market Trading leverage</small>
                    </div>
                </h4>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Network Price</span>
                            <h4 class="mb-3">
                                <div class="">1RBC = ₦54</div>
                                <div class="">1RBC = $0.052</div>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart8" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="https://coinmarketcap.com/currencies/rubic/markets/" target="_blank">Rubic Price Chart History ></a> Coinmarketcap
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Referrals</span>
                            <h4 class="mb-3">
                                <span class="counter-value"
                                    data-target="{{ $referral_count }}">{{ $referral_count }}</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart9" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="https://rubicnetwork.com/user/referrals">Referral History ></a>
                    </div>
                    <div class="mt-2">
                        <a href="https://rubicnetwork.com/user/stake_referrals/earning_history">Stake Referral History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Stake Wallet</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->rubic_stake_wallet }}">{{ auth()->user()->rubic_stake_wallet }}</span>
                            </h4>
                             <p>equivalent &asymp; to</p>
                    <h5><strong>${{ substr(auth()->user()->rubic_stake_wallet / $set->ngn_rate, 0, 9) }} USDT</strong></h5>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->rubic_stake_wallet }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart10" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="https://rubicnetwork.com/user/stake_wallet/withdraw_history_bank">All Wallet Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Stake Profit</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->stake_profit }}">{{ auth()->user()->stake_profit }}</span>
                            </h4>
                             <p>equivalent &asymp; to</p>
                    <h5><strong>${{ substr(auth()->user()->stake_profit / $set->ngn_rate, 0, 9) }} USDT</strong></h5>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->stake_profit }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart14" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.stake_plans.history') }}">Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Stake Withdrawals</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->user_stake_withdrawals->where('status', 1)->sum('amount') }}">{{ auth()->user()->user_stake_withdrawals->where('status', 1)->sum('amount') }}</span>
                            </h4>
                             <p>equivalent &asymp; to</p>
                    <h5><strong>${{ substr(auth()->user()->user_stake_withdrawals->where('status', 1)->sum('amount') / $set->ngn_rate, 0, 9) }} USDT</strong></h5>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->user_stake_withdrawals->where('status', 1)->sum('amount') }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart11" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.stake_wallet.withdraw_history_bank') }}">All Stake Withdrawal History
                            ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Stake Referral Earnings</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value"
                                    data-target="{{ auth()->user()->stake_ref_earning }}">{{ auth()->user()->stake_ref_earning }}</span>
                            </h4>
                             <p>equivalent &asymp; to</p>
                    <h5><strong>${{ substr(auth()->user()->stake_ref_earning / $set->ngn_rate, 0, 9) }} USDT</strong></h5>
                            <div class="text-nowrap">
                                <span
                                    class="badge bg-soft-success text-success">+₦{{ auth()->user()->stake_ref_earning }}</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart12" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.stake_referrals.earning_history') }}">All Referral History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Rubic Network Market Trading Overview</h5>
                        <div class="ms-auto">
                            <div>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    1M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    6M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm active">
                                    1Y
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_d68cc"></div>
                            <div class="tradingview-widget-copyright"><a
                                    href="https://www.tradingview.com/symbols/RBCUSDT/?exchange=GATEIO" rel="noopener"
                                    target="_blank"><span class="blue-text">RBCUSDT Chart</span></a> by TradingView
                            </div>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Notice Board</h4>
                </div>

                <div class="card-body px-0">
                    <div class="px-3" data-simplebar style="max-height: 386px;">
                        <div class="d-flex align-items-center pb-4">
                            <div class="flex-grow-1">
                                {!! $about->notice !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row-->
    </div>
    <!-- end row-->

    <div class="row">

        <div class="col-xl-3">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0">Most Recent Extractions</h4>
                </div><!-- end card header -->
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0"><small>Extraction Protocol: {{ auth()->user()->plan->name }}</small>
                    </h4>
                </div><!-- end card header -->

                <div class="card-body px-0 pt-2">
                    <div class="table-responsive px-3" data-simplebar="init" style="max-height: 395px;">
                        <div class="simplebar-wrapper" style="margin: 0px -16px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px 16px;">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    @if (!$extractions->isEmpty())
                                                        @foreach ($extractions as $item)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <h5 class="font-size-15">
                                                                            {{-- <a href=""
                                                                            class="text-dark"> --}}                                                                            Extraction Chain: {{-- </a> --}}
                                                                        </h5>
                                                                        <span
                                                                            class="text-muted">#{{ $item->trx }}</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <h5 class="font-size-15">No Extractions Yet!</h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 454px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar"
                                style="transform: translate3d(0px, 0px, 0px); display: none;">
                            </div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 343px; transform: translate3d(0px, 52px, 0px); display: block;"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0">All Notifications</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                @if ($notifications)
                                    @foreach ($notifications as $item)
                                        <tr>
                                            <td>{{ $item->msg }} on
                                                {{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No notifications!</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">
                                        <a class="btn btn-sm btn-link font-size-14"
                                            href="{{ route('user.notifications.index') }}">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                        </a>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
   
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/user_assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/user_assets/libs/admin-resources/admin-resources.min.js') }}"></script>

    <!-- dashboard init -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script src="{{ URL::asset('/user_assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/user_assets/js/app.min.js') }}"></script>
@endsection
