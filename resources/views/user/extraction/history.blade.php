@extends('user.layouts.master')
@section('title')
    Extraction Page
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
        {{-- @slot('title1')
            Good Evening ! {{ auth()->user()->name }}
        @endslot
        @slot('small')
            You are on the <a href="#">{{ auth()->user()->plan->name }}</a>
        @endslot --}}
        @slot('title2')
            Extraction History
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Extraction History</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Plan</th>
                                            <th>User Extract Balance</th>
                                            <th>Extract Amount</th>
                                            <th>Transaction</th>
                                            <th>Status</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($extractions)
                                            @foreach ($extractions as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->plan->name }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->profit }}</td>
                                                    <td>{{ $item->trx }}</td>
                                                    <td>
                                                        @if ($item->status == 2)
                                                            Completed
                                                        @else
                                                            In progress
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->start_datetime }}</td>
                                                    <td>{{ $item->end_datetime }}</td>
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
        <script></script>
    @endsection
