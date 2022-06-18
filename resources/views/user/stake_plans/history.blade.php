@extends('user.layouts.master')
@section('title')
    Stake Plans History
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
            History
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stake Plans Total Profit</h4>
                </div>
                <div class="card-body">
                    <h4>{{ $user_stake_profit }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stake Plans History</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Stake Plan</th>
                                            <th>Stake Activation Code</th>
                                            <th>Status</th>
                                            <th>Start Date</th>
                                            <th>Next Daily Profit</th>
                                            {{-- <th>Completion Date</th> --}}
                                            <th>Bonus</th>
                                            <th>Withdrawn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($plans)
                                            @foreach ($plans as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->stake_plan->name }}</td>
                                                    <td>{{ $item->stake_coupon->serial }}</td>
                                                    <td>{{ $item->status ? 'Active' : 'Completed' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->start_time)->toFormattedDateString() }}</td>
                                                    <td>{{ $item->status ? \Carbon\Carbon::parse($item->next_update_time)->toDateTimeString() : 'NA' }}</td>
                                                    {{-- <td>{{ \Carbon\Carbon::parse($item->complete_time)->toFormattedDateString() }}</td> --}}
                                                    <td>{{ $item->stake_profit }}</td>
                                                    <td>{{ $item->is_withdrawn ? 'Yes' : 'No' }}</td>
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
