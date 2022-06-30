@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">User Stake Plan Log</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>User</th>
                                    <th>Stake Plan</th>
                                    <th>Wallet Address</th>
                                    <th>Payment Hash</th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_stake_plans as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->user->name }}</td>
                                        <td>{{ $val->stake_plan->name }}</td>
                                        <td>{{ $val->wallet_address ? $val->wallet_address->address : 'Not Paid' }}</td>
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
                                            @if ($val->status == 3)
                                                Cancelled
                                            @elseif($val->status == 2)
                                                Pending
                                            @elseif($val->status == 1)
                                                Active
                                            @else
                                                Completed
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                        <td class="text-center">
                                            @if ($val->status == 2)
                                                <div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.stake_plans.do_activate', $val->id) }}"><i
                                                                    class="icon-pencil7 mr-2"></i>Activate Plan</a>
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.stake_plans.do_cancel', $val->id) }}"><i
                                                                    class="icon-pencil7 mr-2"></i>Cancel Plan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- <div id="{{ $val->id }}delete" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-semibold">Are you sure you want to delete this?
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="{{ url('/') }}/admin/py/delete/{{ $val->id }}"
                                                        class="btn bg-danger">Proceed</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
