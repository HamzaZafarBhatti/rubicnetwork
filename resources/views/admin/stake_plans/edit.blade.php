@extends('admin.master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{ route('admin.stake_plans.update', $stakePlan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{ $stakePlan->name }}"
                                        reqiured>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Daily percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="percent" value="{{ $stakePlan->percent }}"
                                            class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum Deposit:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="min_deposit" value="{{ $stakePlan->min_deposit }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Maximum Deposit:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="max_deposit" value="{{ $stakePlan->max_deposit }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Duration:</label>
                                <div class="col-lg-10">
                                    <input type="number" name="duration" pattern="[0-9]+(\.[0-9]{0,2})?%?"
                                        value="{{ $stakePlan->duration }}" class="form-control" placeholder="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Period:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="period" data-fouc required>
                                        <option value="day" @if ($stakePlan->period == 'day') selected @endif>Day
                                        </option>
                                        <option value="week" @if ($stakePlan->period == 'week') selected @endif>Week
                                        </option>
                                        <option value="month" @if ($stakePlan->period == 'month') selected @endif>Month
                                        </option>
                                        <option value="year" @if ($stakePlan->period == 'year') selected @endif>year
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Return Capital after running:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="return_capital" data-fouc required>
                                        <option value="0" @if ($stakePlan->return_capital == 0) selected @endif>No
                                        </option>
                                        <option value="1" @if ($stakePlan->return_capital == 1) selected @endif>Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Referral percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="ref_percent" maxlength="10" placeholder="2.5"
                                            value="{{ $stakePlan->ref_percent }}" class="form-control" required>
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum transfer for STAKE PROFIT:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="stake_profit_transfer" placeholder="200NGN"
                                            class="form-control" value="{{ $stakePlan->stake_profit_transfer }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">STAKE PROFIT TRANSFER to STAKE WALLET CYCLE:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="stake_profit_transfer_cycle" data-fouc required>
                                        <option value="1" @if ($stakePlan->stake_profit_transfer_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($stakePlan->stake_profit_transfer_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($stakePlan->stake_profit_transfer_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum withdrawal for STAKE WALLET:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="stake_wallet_wd" placeholder="200NGN"
                                            class="form-control" value="{{ $stakePlan->stake_wallet_wd }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">STAKE WALLET WITHDRAWAL CYCLE:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="stake_wallet_wd_cycle" data-fouc required>
                                        <option value="1" @if ($stakePlan->stake_wallet_wd_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($stakePlan->stake_wallet_wd_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($stakePlan->stake_wallet_wd_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum referral earnings transfer to STAKE WALLET:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="ref_earning_transfer" placeholder="200NGN"
                                            class="form-control" value="{{ $stakePlan->ref_earning_transfer }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">REFERRAL EARNING TRANSFER to STAKE WALLET CYCLE:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="ref_earning_transfer_cycle" data-fouc required>
                                        <option value="1" @if ($stakePlan->ref_earning_transfer_cycle == '1') selected @endif>Daily
                                        </option>
                                        <option value="7" @if ($stakePlan->ref_earning_transfer_cycle == '7') selected @endif>Weekly
                                        </option>
                                        <option value="30" @if ($stakePlan->ref_earning_transfer_cycle == '30') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1" @if ($stakePlan->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if ($stakePlan->status == 0) selected @endif>Deactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Prefix:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="code_prefix"
                                            class="form-control" value="{{ $stakePlan->code_prefix }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">STAKE WALLET Activation Code Length:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" name="code_length"
                                            class="form-control" value="{{ $stakePlan->code_length }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Image:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" class="form-input-styled" data-fouc>
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size
                                        1Mb</span>
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
    </div>

@stop
