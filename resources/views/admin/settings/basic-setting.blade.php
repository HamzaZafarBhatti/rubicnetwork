@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Congifure website</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.update', $set->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Company / website name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="site_name" maxlength="200" value="{{ $set->site_name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Company email:</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" value="{{ $set->email }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mobile:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="mobile" max-length="14" value="{{ $set->mobile }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Website title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" max-length="200" value="{{ $set->title }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Balance on signup:</label>
                                <div class="col-lg-10">
                                    <input type="number" name="bal" step="any" max-length="10"
                                        value="{{ convertFloat($set->balance_reg) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">NGN RATE:</label>
                                <div class="col-lg-10">
                                    <input type="number" name="ngn_rate" step="any" max-length="10"
                                        value="{{ convertFloat($set->ngn_rate) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Upgrade fee <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="number" name="upgrade_fee" step="any" max-length="10"
                                        value="{{ $set->upgrade_fee }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->email_verification == 1)
                                                <input type="checkbox" name="email_verification"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="email_verification"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            Email verification
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->sms_verification == 1)
                                                <input type="checkbox" name="sms_verification"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="sms_verification"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            SMS Verification
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->email_notify == 1)
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
                                            @if ($set->sms_notify == 1)
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
                                            @if ($set->registration == 1)
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
                                            @if ($set->upgrade_status == 1)
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
                                            @if ($set->extraction_transfer == 1)
                                                <input type="checkbox" name="extraction_transfer"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="extraction_transfer"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            EXTRACTION EARNINGS transfer to RUBIC WALLET
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->viral_share_transfer == 1)
                                                <input type="checkbox" name="viral_share_transfer"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="viral_share_transfer"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            VIRAL SHARE EARNINGS transfer to RUBIC WALLET
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->ref_earning_transfer == 1)
                                                <input type="checkbox" name="ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            REFERRAL EARNINGS transfer to RUBIC WALLET
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->indirect_ref_earning_transfer == 1)
                                                <input type="checkbox" name="indirect_ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="indirect_ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            INDIRECT REFERRAL EARNINGS transfer to RUBIC WALLET
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-switchery">
                                        <label class="form-check-label">
                                            @if ($set->stake_ref_earning_transfer == 1)
                                                <input type="checkbox" name="stake_ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1" checked>
                                            @else
                                                <input type="checkbox" name="stake_ref_earning_transfer"
                                                    class="form-check-input-switchery" value="1">
                                            @endif
                                            REFERRAL EARNINGS (STAKE BALANCE) transfer to RUBIC STAKE WALLET
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">EXTRACTION EARNINGS transfer to RUBIC WALLET
                                            (Start Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $set->extraction_transfer_start)[0] ?? '') . 'T' . (explode(' ', $set->extraction_transfer_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="extraction_transfer_start"
                                                value="{{ $start }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">EXTRACTION EARNINGS transfer to RUBIC WALLET
                                            (End Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $set->extraction_transfer_end)[0] ?? '') . 'T' . (explode(' ', $set->extraction_transfer_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="extraction_transfer_end"
                                                value="{{ $end }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">VIRAL SHARE EARNINGS transfer to RUBIC WALLET
                                            (Start Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $set->viral_share_transfer_start)[0] ?? '') . 'T' . (explode(' ', $set->viral_share_transfer_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="viral_share_transfer_start"
                                                value="{{ $start }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">VIRAL SHARE EARNINGS transfer to RUBIC
                                            WALLET (End Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $set->viral_share_transfer_end)[0] ?? '') . 'T' . (explode(' ', $set->viral_share_transfer_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="viral_share_transfer_end"
                                                value="{{ $end }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">REFERRAL EARNINGS transfer to RUBIC WALLET
                                            (Start Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $set->ref_earning_transfer_start)[0] ?? '') . 'T' . (explode(' ', $set->ref_earning_transfer_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="ref_earning_transfer_start"
                                                value="{{ $start }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">REFERRAL EARNINGS transfer to RUBIC WALLET
                                            (End Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $set->ref_earning_transfer_end)[0] ?? '') . 'T' . (explode(' ', $set->ref_earning_transfer_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="ref_earning_transfer_end"
                                                value="{{ $end }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">INDIRECT REFERRAL EARNINGS transfer to RUBIC
                                            WALLET (Start Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $set->indirect_ref_earning_transfer_start)[0] ?? '') . 'T' . (explode(' ', $set->indirect_ref_earning_transfer_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="indirect_ref_earning_transfer_start"
                                                value="{{ $start }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">INDIRECT REFERRAL EARNINGS transfer to RUBIC
                                            WALLET (End Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $set->indirect_ref_earning_transfer_end)[0] ?? '') . 'T' . (explode(' ', $set->indirect_ref_earning_transfer_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="indirect_ref_earning_transfer_end"
                                                value="{{ $end }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">REFERRAL EARNINGS (STAKE BALANCE) transfer
                                            to RUBIC STAKE WALLET (Start Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $start = (explode(' ', $set->stake_ref_earning_transfer_start)[0] ?? '') . 'T' . (explode(' ', $set->stake_ref_earning_transfer_start)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="stake_ref_earning_transfer_start"
                                                value="{{ $start }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-6">REFERRAL EARNINGS (STAKE BALANCE) transfer
                                            to RUBIC STAKE WALLET (End Time):</label>
                                        <div class="col-lg-6">
                                            @php
                                                $end = (explode(' ', $set->stake_ref_earning_transfer_end)[0] ?? '') . 'T' . (explode(' ', $set->stake_ref_earning_transfer_end)[1] ?? '');
                                            @endphp
                                            <input type="datetime-local" name="stake_ref_earning_transfer_end"
                                                value="{{ $end }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Short description:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="site_desc" rows="4" class="form-control">{{ $set->site_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Address:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="address" rows="4" class="form-control">{{ $set->address }}</textarea>
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
