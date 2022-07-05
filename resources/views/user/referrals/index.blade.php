@extends('user.layouts.master')
@section('title')
    My Referrals
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
            Referrals
        @endslot
        @slot('title2')
            My Referrals
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Referral Link</h4>
                    <p>Your <span style="background-color: #ffff99;"><strong>RUBICNETWORK Referral Link</strong></span> helps you Earn when you refer your downlines to register for <span style="color: #0000ff;"><strong><span style="background-color: #ffff99;">RUBIC EXTRACTION</span></strong></span> or when they activate a <span style="background-color: #ffff99; color: #0000ff;"><strong>RUBIC STAKE PLAN</strong></span>.</p>
<p>You will also earn to your <strong><span style="text-decoration: underline;">Indirect Referral Earnings Balance</span> </strong>as well as to your main <span style="text-decoration: underline;"><strong>Referral Earnings Balance</strong></span>, by sharing your referral link to your friends, family and associates.</p>
<p>Also, Share your Referral Link to your WhatsApp Groups, Facebook Groups. Earn a percentage of whatever Mining Plan your referred user purchase to. You also earn from Indirect Referral Earnings.</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hstack gap-3">
                                <input class="form-control me-auto" type="text" id="referral_link"
                                    value="{{ url('/') . '/onboarding/' . auth()->user()->username }}">
                                <button type="button" onclick="copyReferralLink()" class="btn btn-secondary">Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Referral Downlines</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($referrals)
                                            @foreach ($referrals as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->referral->name }}</td>
                                                    <td>{{ $item->referral->username }}</td>
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
        <script>
            function copyReferralLink() {
                /* Get the text field */
                var copyText = document.getElementById("referral_link");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text */
                alert("Copied the referral link");
            }
        </script>
    @endsection
