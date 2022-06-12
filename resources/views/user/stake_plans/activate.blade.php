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
                                                <h1 class="mt-3">{{ $plan->amount }} <span
                                                        class="text-muted font-size-16 fw-medium">/
                                                        Month</span>
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
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->percent }}%
                                                Stake profit</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->ref_percent }}%
                                                referral percent</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->duration . ' ' . $plan->period }}
                                                Duration</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->return_capital ? 'Yes' : 'No' }}
                                                Return capital</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->stake_profit_transfer }}
                                                Stake profit transfer to stake wallet</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->stake_wallet_wd }}
                                                Stake wallet withdrawal</p>
                                            <p class="mb-3 font-size-15"><i
                                                    class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>{{ $plan->ref_earning_transfer }}
                                                Stake referral earning transfer to stake wallet</p>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <button type="button" class="btn btn-outline-primary w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-center{{ $plan->id }}">Choose
                                                Plan</button>
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
                                                                <a type="button" {{-- href="{{ route('user.stake_plans.do_activate_tether', $plan->id) }}" --}} class="btn btn-primary">ACTIVATE USING
                                                                    TETHER USDT</a>
                                                                <button type="button" class="btn btn-primary stake_activate">ACTIVATE USING
                                                                    STAKE ACTIVATION CODE</button>
                                                            </div>
                                                            <div class="stake_activation_form" style="display: none">
                                                                <form action="{{ route('user.stake_plans.do_activate_coupon', $plan->id) }}" method="post">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="stake_activation_code">Stake Activation Code</label>
                                                                        <input type="text" class="form-control" name="stake_activation_code">
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
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
