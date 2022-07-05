@extends('user.layouts.master')
@section('title')
    Convert Extraction Balance to Rubic Wallet
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
            Extraction
        @endslot
        @slot('title2')
            Rubic NGN Wallet Transfers to Bank
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rubic NGN Wallet Transfers to Bank</h4>
                    <p><strong>Bank Withdrawal Status with regards to your Rubic NGN Wallet transfers is displayed here.</strong></p>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Account Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Bank Account #</th>
                                            <th>Transaction Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($withdraws)
                                            @foreach ($withdraws as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>₦{{ $item->amount }}</td>
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
