<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        // return $setting;
        // return $request;
        $res = $setting->update([
            'title' => $request->title,
            'site_name' => $request->site_name,
            'site_desc' => $request->site_desc,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'balance_reg' => $request->balance_reg,
            'email_notify' => empty($request->email_notify) ? 0 : 1,
            'sms_notify' => empty($request->sms_notify) ? 0 : 1,
            'email_verification' => empty($request->email_verification) ? 0 : 1,
            'sms_verification' => empty($request->sms_verification) ? 0 : 1,
            'registration' => empty($request->registration) ? 0 : 1,
            'withdraw_charge' => $request->withdraw_charge,
            'withdraw_start' => $request->withdraw_start,
            'withdraw_end' => $request->withdraw_end,
            // 'min_withdraw_wallet' => '',
            // 'min_withdraw_wallet' => '',
            // 'min_transfer_viral_share' => '',
            // 'min_transfer_ref_earning' => '',
            // 'min_transfer_ext_balance' => '',
            // 'min_transfer_indirect_referral' => '',
            'coupon_code_rate' => $request->coupon_code_rate,
            'upgrade_status' => empty($request->upgrade_status) ? 0 : 1,
            'upgrade_fee' => $request->upgrade_fee,
            'transfer_fee' => $request->transfer_fee,
            'max_transfer' => $request->max_transfer,
            'data_withdraw_limit' => $request->data_withdraw_limit,
            'extract_user_limit' => $request->extract_user_limit,
            'data_user_limit' => $request->data_user_limit,
        ]);
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
