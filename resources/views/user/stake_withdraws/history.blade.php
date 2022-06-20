@extends('user.layouts.master')
@section('title')
Rubic Stake Wallet Withdrawal History
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
        Rubic Stake Wallet
        @endslot
        @slot('title2')
            History
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rubic Stake Wallet Withdrawal History</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Account #</th>
                                            <th>Withdrawn To</th>
                                            <th>Transfer Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($stake_withdraws)
                                            @foreach ($stake_withdraws as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>
                                                        @if ($item->status == 2)
                                                            <span
                                                                class="badge rounded-pill badge-soft-warning">Declined</span>
                                                        @elseif($item->status == 1)
                                                            <span
                                                                class="badge rounded-pill badge-soft-success">Approved</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill badge-soft-secondary">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->account_no }}</td>
                                                    <td>
                                                        @if ($item->withdraw_to == 'bank')
                                                            Bank
                                                        @else
                                                            Tether
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\carbon::parse($item->created_at)->toDateTimeString() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    @endsection
