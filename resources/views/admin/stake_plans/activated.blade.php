@extends('admin.master')

@section('css')
    <style>
        .table td img {
            width: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Activated User Stake Plan Log</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>User</th>
                                    <th>Stake Plan</th>
                                    <th>Wallet Address / Activation Code</th>
                                    <th>Payment Hash</th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_stake_plans as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->user->name }}</td>
                                        <td>{{ $val->stake_plan->name }}</td>
                                        <td>{{ $val->wallet_address ? $val->wallet_address->address : $val->stake_coupon->serial }}</td>
                                        <td>
                                            @if ($val->tether_payment)
                                                {{ $val->tether_payment->hash }}
                                            @else
                                                Not Paid
                                            @endif
                                        </td>
                                        <td>
                                            @if ($val->tether_payment)
                                                <a href="{{ url('/') }}/asset/tether_payments/{{ $val->tether_payment->image }}"
                                                    target="_blank">
                                                    <img
                                                        src="{{ url('/') }}/asset/tether_payments/{{ $val->tether_payment->image }}">
                                                </a>
                                            @else
                                                No Proof
                                            @endif
                                        </td>
                                        <td>
                                            Activated
                                        </td>
                                        <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
