<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Admin;
use App\Models\Etemplate;
use App\Models\Setting;
use Carbon\Carbon;


class SettingController extends Controller
{

    public function index()
    {
        $data['title'] = 'General settings';
        return view('admin.settings.basic-setting', $data);
    }

    public function Email()
    {
        $data['title'] = 'Email settings';
        $data['val'] = Etemplate::first();
        return view('admin.settings.email', $data);
    }

    public function EmailUpdate(Request $request)
    {
        $data = Etemplate::findOrFail(1);
        $data->esender = $request->sender;
        $data->emessage = $request->message;
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Account()
    {
        $data['title'] = 'Change account details';
        $data['val'] = Admin::first();
        return view('admin.settings.account', $data);
    }

    public function AccountUpdate(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function Sms()
    {
        $data['title'] = 'Sms settings';
        $data['val'] = Etemplate::first();
        return view('admin.settings.sms', $data);
    }

    public function SmsUpdate(Request $request)
    {
        $data = Etemplate::findOrFail(1);
        $data->smsapi = $request->smsapi;
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $setting = Setting::find($id);
        if(empty($request->email_verification)) {
            $data['email_verification'] = 0;
        }
        if(empty($request->sms_verification)) {
            $data['sms_verification'] = 0;
        }
        if(empty($request->email_notify)) {
            $data['email_notify'] = 0;
        }
        if(empty($request->sms_notify)) {
            $data['sms_notify'] = 0;
        }
        if(empty($request->registration)) {
            $data['registration'] = 0;
        }
        if(empty($request->upgrade_status)) {
            $data['upgrade_status'] = 0;
        }
        if(empty($request->extraction_transfer)) {
            $data['extraction_transfer'] = 0;
        }
        if(empty($request->viral_share_transfer)) {
            $data['viral_share_transfer'] = 0;
        }
        if(empty($request->ref_earning_transfer)) {
            $data['ref_earning_transfer'] = 0;
        }
        if(empty($request->indirect_ref_earning_transfer)) {
            $data['indirect_ref_earning_transfer'] = 0;
        }
        if(empty($request->stake_ref_earning_transfer)) {
            $data['stake_ref_earning_transfer'] = 0;
        }
        $res = $setting->update($data);
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }
}
