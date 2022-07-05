@extends('user.layouts.master')
@section('title')
    Stake Plans Confirm Payment
@endsection
@section('css')
    <link href="{{ URL::asset('user_assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('user_assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('user_assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Stake Plans
        @endslot
        @slot('title2')
            Confirm Payment
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tether USDT - TRON-20 - {{ $stakePlan->name }} STAKE PLAN Activation</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <h4>Deposit ${{ $stakePlan->amount / $set->ngn_rate }} of Tether USDT - TRC20 to the Wallet
                                Address below or scan the wallet QR Code below to initiate payment from your wallet app.
                            </h4>
                            <div class="col-sm-12">
                                <table class="table table-bordered dt-responsive  nowrap w-100">
                                    <tbody>
                                        <tr>
                                            <td>CURRENCY</td>
                                            <td>Tether USDT TRC20</td>
                                        </tr>
                                        <tr>
                                            <td>PLAN</td>
                                            <td>{{ $stakePlan->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>AMOUNT</td>
                                            <td>${{ $stakePlan->amount / $set->ngn_rate }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h4>Tether USDT - TRC20 Deposit Address below</h4>
                        <h5 class="text-primary">{{ $wallet_address->address }}</h5>
                        <h4>Tether USDT - TRC20 Deposit Address QR Code</h4>
                        <div id="qrcode"></div>
                    </div>
                    <div>
                        <h5>
                            Tether USDT - TRC20: Send only USDT to this deposit address. Ensure the network is Tron
                            (TRC-20).
                        </h5>
                    </div>
                    <hr>
                    <div>
                        <h5>
                            After successfully sending Tether USDT - TRC-20 to the Deposit Address for activation of your
                            STAKE PLAN, please upload your Tether USDT PAYMENT PROOF below.
                        </h5>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#myModal">Click Here to Upload Payment Proof</button>
                    </div>

                    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                        data-bs-scroll="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Upload Payment Proof</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('user.stake_plans.do_confirm_payment') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <h5>Confirm Tether USDT - TRC20 SAKE PLAN - {{ $stakePlan->name }} -
                                            ${{ $stakePlan->amount / $set->ngn_rate }} USDT ACTIVATION</h5>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="hash">Transaction Hash</label>
                                                    <input type="text" class="form-control" name="hash">
                                                    <input type="hidden" class="form-control" name="user_stake_plan_id" value="{{ $userStakePlan->id }}">
                                                    <input type="hidden" class="form-control" name="wallet_address_id" value="{{ $wallet_address->id }}">
                                                    <input type="hidden" class="form-control" name="stake_plan_id" value="{{ $stakePlan->id }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image">Upload Transaction
                                                        Screenshot</label>
                                                    <input type="file" accept="image/*" class="form-control"
                                                        name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Confirm Payment</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="{{ URL::asset('user_assets/libs/datatables.net/datatables.net.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}">
        </script>
        <script src="{{ URL::asset('user_assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}">
        </script>
        <script
            src="{{ URL::asset('user_assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}">
        </script>
        <script src="{{ URL::asset('user_assets/js/pages/datatables.init.js') }}"></script>
        <script src="{{ URL::asset('user_assets/js/app.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/js/jquery-qrcode.js') }}"></script>
        <script>
            $("#qrcode").qrcode({
                size: 150,
                fill: '#333',
                text: '{{ $wallet_address->address }}',
                mode: 4,
                // label: 'jQueryScript.Net',
                fontcolor: '#F1C40F'
            });
        </script>
    @endsection
