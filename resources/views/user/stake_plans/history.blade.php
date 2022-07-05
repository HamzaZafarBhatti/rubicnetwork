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
<p><strong><span style="color: #0000ff;"><span style="background-color: #ffff99;">RUBIC/USDT Stakes History</span></span></strong></p>
<p>All STAKES Trade leveraging on the<strong> RUBIC/USDT Trading</strong> can be managed from this STAKES History overview.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Total Stake Profit</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ $user_stake_profit }}</h4><br>
                     <p><strong>Which is equivalent ≈ to</strong></p>
                     <h4>${{ substr($user_stake_profit / $set->ngn_rate, 0, 9) }} USDT</h4><p><strong>as <span style="color: #0000ff;">Tether USDT</span></strong></p>
                      <a href="https://rubicnetwork.com/user/stake_plans/convert" type="submit"
                        class="btn btn-primary w-100">Convert to Rubic STAKE Wallet</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stake Plan History</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Stake Plan</th>
                                            <th>Stake Activation</th>
                                            <th>Stake Status</th>
                                            <th>Start Date</th>
                                            <th>Next Daily Profit</th>
                                            {{-- <th>Completion Date</th> --}}
                                            <th>Stake Profit</th>
                                            {{-- <th>Withdrawn</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($plans)
                                            @foreach ($plans as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->stake_plan->name }}</td>
                                                    <td>{{ $item->stake_coupon ? $item->stake_coupon->serial : 'TETHER USDT' }}</td>
                                                    <td>
                                                        @if ($item->status == 3)
                                                            Cancelled
                                                        @elseif($item->status == 2)
                                                            Pending
                                                        @elseif($item->status == 1)
                                                            Active
                                                        @else
                                                            Completed
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                                                    <td>{{ $item->status == 1 ? \Carbon\Carbon::parse($item->next_update_time)->toDateTimeString() : 'N/A' }}</td>
                                                    {{-- <td>{{ \Carbon\Carbon::parse($item->complete_time)->toFormattedDateString() }}</td> --}}
                                                    <td>₦{{ $item->stake_profit }} ≈ ${{ substr($item->stake_profit / $set->ngn_rate, 0, 9) }}</td>
                                                    {{-- <td>{{ $item->is_withdrawn ? 'Yes' : 'No' }}</td> --}}
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
