@extends('admin.layouts.master')
@section('title')
    Settings
@endsection
@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1')
            Basic Settings
        @endslot
        @slot('title1')
            Settings
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Congifure website</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.settings.update', $setting->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Company / website name</label>
                                    <input class="form-control" type="text" name="site_name"
                                        value="{{ $setting->site_name }}" id="site_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label">Company email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $setting->email }}"
                                        id="email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="example-tel-input" class="form-label">Mobile</label>
                                    <input class="form-control" type="tel" name="mobile" value="{{ $setting->mobile }}"
                                        id="mobile">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Website title</label>
                                    <input class="form-control" type="text" name="title" value="{{ $setting->title }}"
                                        id="title">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="coupon_code_rate" class="form-label">Coupon Code Coversion
                                        Rate</label>
                                    <input class="form-control" type="number" value="{{ $setting->coupon_code_rate }}"
                                        name="coupon_code_rate">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="extract_user_limit" class="form-label">Extract Balance Withdrawal
                                        User Limit</label>
                                    <input class="form-control" type="number" value="{{ $setting->extract_user_limit }}"
                                        name="extract_user_limit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="data_user_limit" class="form-label">Mobile Data Withdrawal User
                                        Limit</label>
                                    <input class="form-control" type="number" value="{{ $setting->data_user_limit }}"
                                        name="data_user_limit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="data_withdraw_limit" class="form-label">Mobile Data Withdraw
                                        Balance Limit</label>
                                    <input class="form-control" type="number"
                                        value="{{ $setting->data_withdraw_limit }}" name="data_withdraw_limit">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="withdraw_start" class="form-label">Withdrawal Start Time
                                        (MINER BALANCE, SPONSOR
                                        BALANCE)</label>
                                    @php
                                        $start = (explode(' ', $setting->withdraw_start)[0] ?? '') . 'T' . (explode(' ', $setting->withdraw_start)[1] ?? '');
                                    @endphp
                                    <input class="form-control" type="datetime-local" value="{{ $start }}"
                                        name="withdraw_start">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="withdraw_end" class="form-label">Withdrawal End Time (MINER
                                        BALANCE, SPONSOR
                                        BALANCE)</label>
                                    @php
                                        $end = (explode(' ', $setting->withdraw_end)[0] ?? '') . 'T' . (explode(' ', $setting->withdraw_end)[1] ?? '');
                                    @endphp
                                    <input class="form-control" type="datetime-local" value="{{ $end }}"
                                        name="withdraw_end">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="balance_reg" class="form-label">Balance on signup</label>
                                    <input class="form-control" type="number" value="{{ $setting->balance_reg }}"
                                        name="balance_reg">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="withdraw_charge" class="form-label">Withdraw charge</label>
                                    <input class="form-control" type="number" value="{{ $setting->withdraw_charge }}"
                                        name="withdraw_charge">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="upgrade_fee" class="form-label">Upgrade fee</label>
                                    <input class="form-control" type="number" value="{{ $setting->upgrade_fee }}"
                                        name="upgrade_fee">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="max_transfer" class="form-label">Maximum Transfer
                                        Fund</label>
                                    <input class="form-control" type="number" value="{{ $setting->max_transfer }}"
                                        name="max_transfer">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="transfer_fee" class="form-label">Transfer charge</label>
                                    <input class="form-control" type="number" value="{{ $setting->transfer_fee }}"
                                        name="transfer_fee">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->email_verification == 1)
                                        <input type="checkbox" class="form-check-input" name="email_verification" value="1"
                                            id="customSwitch1" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="email_verification" value="1"
                                            id="customSwitch1">
                                    @endif
                                    <label class="form-check-label" for="email_verification">Email verification</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->sms_verification == 1)
                                        <input type="checkbox" class="form-check-input" name="sms_verification" value="1"
                                            id="customSwitch2" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="sms_verification" value="1"
                                            id="customSwitch2">
                                    @endif
                                    <label class="form-check-label" for="sms_verification">SMS Verification</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->email_notify == 1)
                                        <input type="checkbox" class="form-check-input" name="email_notify" value="1"
                                            id="customSwitch3" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="email_notify" value="1"
                                            id="customSwitch3">
                                    @endif
                                    <label class="form-check-label" for="email_notify">Email notify</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->sms_notify == 1)
                                        <input type="checkbox" class="form-check-input" name="sms_notify" value="1"
                                            id="customSwitch4" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="sms_notify" value="1"
                                            id="customSwitch4">
                                    @endif
                                    <label class="form-check-label" for="sms_notify">SMS notify</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->registration == 1)
                                        <input type="checkbox" class="form-check-input" name="registration" value="1"
                                            id="customSwitch5" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="registration" value="1"
                                            id="customSwitch5">
                                    @endif
                                    <label class="form-check-label" for="registration">Registration</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->upgrade_status == 1)
                                        <input type="checkbox" class="form-check-input" name="upgrade_status" value="1"
                                            id="customSwitch6" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="upgrade_status" value="1"
                                            id="customSwitch6">
                                    @endif
                                    <label class="form-check-label" for="upgrade_status">Upgrade status</label>
                                </div>
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    @if ($setting->referral == 1)
                                        <input type="checkbox" class="form-check-input" name="referral" value="1"
                                            id="customSwitch7" checked="">
                                    @else
                                        <input type="checkbox" class="form-check-input" name="referral" value="1"
                                            id="customSwitch7">
                                    @endif
                                    <label class="form-check-label" for="referral">Referral</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="site_desc" class="form-label">Short description</label>
                                    <textarea name="site_desc" id="site_desc" cols="30" rows="3"
                                        class="form-control">{{ $setting->site_desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $setting->address }}</textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('/user_assets/js/app.min.js') }}"></script>
@endsection
