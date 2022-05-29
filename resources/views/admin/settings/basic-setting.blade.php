@extends('admin.layouts.master')
@section('title')
    Settings
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Congifure website</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.update', $setting->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Company / website name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="site_name" maxlength="200" value="{{ $setting->site_name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tawk ID:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="tawk_id" value="{{ $setting->tawk_id }}" maxlength="25"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Company email:</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" value="{{ $setting->email }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mobile:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="mobile" max-length="14" value="{{ $setting->mobile }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Website title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" max-length="200" value="{{ $setting->title }}"
                                        class="form-control">
                                </div>
                            </div>
                            @if (!$setting->is_testing)
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Coupon Code Coversion Rate:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="coupon_code_rate" value="{{ $setting->coupon_code_rate }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Monthly Coupon Code Limit:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="monthly_coupon_limit" value="{{ $setting->monthly_coupon_limit }}"
                                            class="form-control">
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Selfcashout Amount Limit:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="selfcashout_amount" value="{{ $setting->selfcashout_amount }}"
                                            class="form-control">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mine Balance Withdrawal User Limit:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="mine_user_limit" value="{{ $setting->mine_user_limit }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mobile Data Withdrawal User Limit:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="data_user_limit" value="{{ $setting->data_user_limit }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mobile Data Withdraw Balance Limit:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="data_withdraw_limit"
                                            value="{{ $setting->data_withdraw_limit }}" class="form-control">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">MB</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">Withdrawal Start Time (MINER BALANCE, SPONSOR
                                            BALANCE):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $setting->withdraw_start)[0] ?? '') . 'T' . (explode(' ', $setting->withdraw_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="withdraw_start" value="{{ $start }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">Withdrawal End Time (MINER BALANCE, SPONSOR
                                            BALANCE):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $setting->withdraw_end)[0] ?? '') . 'T' . (explode(' ', $setting->withdraw_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="withdraw_end" value="{{ $end }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Balance on signup <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">BTC</span>
                                        </span>
                                        <input type="number" name="bal" step="any" max-length="10"
                                            value="{{ $setting->balance_reg }}" class="form-control">
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2">Withdraw charge <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <input type="number" name="withdraw_charge" max-length="10"
                                            value="{{ $setting->withdraw_charge }}" class="form-control">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2">Upgrade fee <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <input type="number" name="upgrade_fee" step="any" max-length="10"
                                            value="{{ $setting->upgrade_fee }}" class="form-control">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">BTC</span>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2">Maximum Transfer Fund <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">NGN</span>
                                        </span>
                                        <input type="number" name="max_transfer" max-length="10"
                                            value="{{ $setting->max_transfer }}" class="form-control">
                                    </div>
                                </div>
                                <label class="col-form-label col-lg-2">Transfer charge <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-2">
                                    <div class="input-group">
                                        <input type="number" name="transfer_fee" max-length="10"
                                            value="{{ $setting->transfer_fee }}" class="form-control">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->kyc == 1)
                                                <input type="checkbox" name="kyc" class="form-check-input-switchery"
                                                    value="1" checked>
                                            @else
                                                <input type="checkbox" name="kyc" class="form-check-input-switchery"
                                                    value="1">
                                            @endif
                                            KYC
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->email_verification == 1)
                                                <input type="checkbox" name="email_activation"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="email_activation"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            Email verification
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->sms_verification == 1)
                                                <input type="checkbox" name="sms_activation"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="sms_activation"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            SMS Verification
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->email_notify == 1)
                                                <input type="checkbox" name="email_notify"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="email_notify"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            Email notify
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->sms_notify == 1)
                                                <input type="checkbox" name="sms_notify" class="form-check-input-switchery"
                                                    value="1" checked>
                                            @else
                                                <input type="checkbox" name="sms_notify" class="form-check-input-switchery"
                                                    value="1">
                                            @endif
                                            SMS notify
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->registration == 1)
                                                <input type="checkbox" name="registration"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="registration"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            Registration
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->upgrade_status == 1)
                                                <input type="checkbox" name="upgrade_status"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="upgrade_status"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            Upgrade status
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->referral == 1)
                                                <input type="checkbox" name="referral" class="form-check-input-switchery"
                                                    value="1" checked>
                                            @else
                                                <input type="checkbox" name="referral" class="form-check-input-switchery"
                                                    value="1">
                                            @endif
                                            Referral
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($setting->is_testing == 1)
                                                <input type="checkbox" name="is_testing" class="form-check-input-switchery"
                                                    value="1" checked>
                                            @else
                                                <input type="checkbox" name="is_testing" class="form-check-input-switchery"
                                                    value="1">
                                            @endif
                                            Testing
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Short description:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="site_desc" rows="4" class="form-control">{{ $setting->site_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Address:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="address" rows="4" class="form-control">{{ $setting->address }}</textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Submit<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop
