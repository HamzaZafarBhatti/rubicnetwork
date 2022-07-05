@extends('user.layouts.master')
@section('title')
    Stake Plans
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Stake Plans
        @endslot
        @slot('title2')
            Activate
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
<h2><span style="color: #000080;">RUBIC/USDT Live Trading Chart</span></h2><br>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_d68cc"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/RBCUSDT/?exchange=GATEIO" rel="noopener" target="_blank"><span class="blue-text">RBCUSDT Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "autosize": true,
  "symbol": "GATEIO:RBCUSDT",
  "interval": "D",
  "timezone": "Europe/London",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_top_toolbar": true,
  "save_image": false,
  "details": true,
  "container_id": "tradingview_d68cc"
}
  );
  </script>
</div>
<!-- TradingView Widget END --><br><br>
<h2><span style="color: #000080;">Unlimited &amp; Easy STAKING with any of the STAKE PLANS!</span></h2>
<p><strong>RUBIC STAKING is designed to perfectly skyrocket the financial results, growth, and expectation of Extractors by STAKING the RUBIC/USDT trading pairs with any of our STAKE PLANS.</strong></p><br>

            @if (!$plans->isEmpty())
                <div class="row">
                    @foreach ($plans as $plan)
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mb-xl-0">
                                <div class="card-body">
                                    <div class="p-2">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="font-size-16">{{ $plan->name }} STAKE</h5>
                                                <h1 class="mt-3">₦{{ $plan->amount }} <span
                                                        class="text-muted font-size-16 fw-medium">/
                                                        {{ $plan->duration . ' ' . $plan->period }}s</span>
                                                </h1>
                                            </div>
                                            <div>
                                                <img src="{{ url('/') }}/asset/images/{{ $plan->image }}" alt="{{ $plan->name }}" width="100" height="100" class="rounded-circle" style="object-fit: cover">
                                            </div>
                                        </div>
                                        {{-- <p class="text-muted mt-3 font-size-15">For small teams trying out Dason for an
                                        unlimited
                                        period of time</p> --}}
                                        <div class="mt-4 pt-2 text-muted">
                                           <p><strong>Which is equivalent ≈ to</strong></p>
                     <h4>${{ substr($plan->amount / $set->ngn_rate, 0, 9) }} USDT</h4> 
                     <hr />
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->percent }}%
                                            Daily Stake Profit</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->ref_percent }}%
                                            Stake Referral Earnings</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->duration . ' ' . $plan->period }}s
                                            Stake Active Duration</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>₦{{ $plan->stake_profit_transfer }} 
                                            Minimum Stake Profit Transfer to Stake Wallet</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>₦{{ $plan->stake_wallet_wd }}
                                            Minimum Stake Wallet Withdrawal</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited Staking</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Instant Cashout Anytime to Bank or Tether USDT of STAKE PROFITS</p>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <button type="button" class="btn btn-outline-primary w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-center{{ $plan->id }}">Activate STATE Plan</button>
                                            <div class="modal fade bs-example-modal-center{{ $plan->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Activate Plan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-center flex-column" style="gap: 10px">
                                                                <div>
                                                                    <h6>Stake Plan: {{ $plan->name }} STAKE</h6>
                                                                </div>
                                                                <div>
                                                                    <h6>Stake Amount: ₦{{ $plan->amount }} <br>which is equivalent ≈ to ${{ substr($plan->amount / $set->ngn_rate, 0, 9) }} USDT </h6>
                                                                </div>
                                                                <div>
                                                                    <h6>Stake Profit: {{ $plan->percent }}%</h6>
                                                                </div>
                                                                <a type="button" href="{{ route('user.stake_plans.do_activate_tether', $plan->id) }}" class="btn btn-primary">ACTIVATE {{ $plan->name }} STAKE USING
                                                                    TETHER USDT - Instant</a>
                                                                <button type="button" class="btn btn-primary stake_activate">ACTIVATE {{ $plan->name }} STAKE USING
                                                                ACTIVATION CODE</button><hr /><br> <a type="button" href="https://rubicnetwork.com/pin_dispatchers" target="_blank" class="btn btn-primary">Get {{ $plan->name }} STAKE Activation Code</a>
                                                              </button>
                                                            </div>
                                                            <div class="stake_activation_form" style="display: none">
                                                                <form action="{{ route('user.stake_plans.do_activate_coupon', $plan->id) }}" method="post">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="stake_activation_code">Enter {{ $plan->name }} Stake Activation Code</label>
                                                                        <input type="text" class="form-control" name="stake_activation_code">
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <button type="submit" class="btn btn-primary w-md">Activate {{ $plan->name }} STAKE Plan</button><br><p><span style="color: #0000ff;"><strong><a style="color: #0000ff;" href="https://rubicnetwork.com/pin_dispatchers" target="_blank">Get Activation Code</a></strong></span></p>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                    @endforeach
                    <!-- end col -->
                </div>
            @endif
            <!-- end row -->
        </div>
        <!-- end col -->
    </div>

    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('user_assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.stake_activate').click(function() {
                $(this).parent().fadeOut(function() {
                    $(this).addClass('d-none').parent().find('.stake_activation_form').fadeIn();
                });
            })
        })
    </script>
@endsection
