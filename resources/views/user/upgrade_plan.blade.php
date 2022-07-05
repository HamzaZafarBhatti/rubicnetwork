@extends('user.layouts.master')
@section('title')
    Plan
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Plan
        @endslot
        @slot('title2')
            Upgrade
        @endslot
    @endcomponent
<h2><span style="color: #000080;">Choose your Multi-Chain Extraction Plan.</span></h2>
    @if (!$plans->isEmpty())
        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-xl-0">
                        <div class="card-body">
                            <div class="p-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="font-size-16">{{ $plan->name }}</h5>
                                        <h1 class="mt-3">₦{{ $plan->amount }} <span
                                                class="text-muted font-size-16 fw-medium"></span>
                                        </h1>
                                    </div>
                                    <div>
                                        <img src="{{ url('/') }}/asset/images/{{ $plan->image }}"
                                            alt="{{ $plan->name }}" width="100" height="100" class="rounded-circle"
                                            style="object-fit: cover">
                                    </div>
                                </div>
                                {{-- <p class="text-muted mt-3 font-size-15">For small teams trying out Dason for an
                                        unlimited
                                        period of time</p> --}}
                                <div class="mt-4 pt-2 text-muted">
                                    <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->percent }}%
                                        Extraction Protocol</p>
                                         <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Every  {{ $plan->extraction_plan_time }}hrs
                                        Extraction Power Chain</p>
                                    <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->ref_percent }}%
                                        Referral percent</p>
                                    <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->duration . ' ' . $plan->period }}
                                        Duration</p>
                                        <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->indirect_ref_com }}%
                                        Indirect Referral Percent</p>
                                    <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>₦{{ $plan->min_rubic_wallet_wd }}
                                        Minimum Wallet Withdrawal</p>
                                        <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>₦{{ $plan->viral_share_bonus }}
                                        Daily Viral Share Bonus</p>
                                    <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>No Referrals Needed for Cashout</p>
                                      <p class="mb-3 font-size-15"><i
                                            class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Guaranteed Full Cashout Monthly</p>       
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

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upgrade your Rubic Extraction Plan</h4>
                    <p><strong>Enter your RUBIC EXTRACTION Activation Code to Upgrade your EXTRACTION PLAN</strong></p>
                    <p><span style="color: #0000ff;"><a style="color: #0000ff;" href="https://rubicnetwork.com/pin_dispatchers" target="_blank"><strong>Get ACTIVATION PIN CODE</strong></a></span></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.plan.do_upgrade') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="coupon_code">Activation Code</label>
                                                <input type="text" class="form-control" name="coupon_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Upgrade Extraction Plan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
