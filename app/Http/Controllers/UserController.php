<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Bank;
use App\Models\Etemplate;
use App\Models\Extraction;
use App\Models\PostUser;
use App\Models\Referral;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $ext_query = Extraction::where('user_id', auth()->user()->id);
        $extractions = $ext_query->get();
        $extractions_count = $ext_query->count();
        $viral_share_count = PostUser::where('user_id', auth()->user()->id)->count();
        $referral_count = Referral::where('referee_id', auth()->user()->id)->count();
        return view('user.dashboard', compact(
            'extractions',
            'extractions_count',
            'viral_share_count',
            'referral_count',
        ));
    }

    public function profile_edit()
    {
        $banks = Bank::whereStatus(1)->get(['id', 'name']);
        $user = User::find(auth()->user()->id);
        return view('user.profile.edit', compact('banks', 'user'));
    }

    public function profile_update_basic(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $res = $user->update($request->except('_token'));
        if ($res) {
            return back()->with('success', 'Profile Updated Successfully.');
        } else {
            return back()->with('error', 'Error Updating Profile.');
        }
    }
    public function profile_update_bank(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('alert', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $res = $user->update($request->except('_token', 'pins'));
        if ($res) {
            return back()->with('success', 'Bank Details Updated Successfully.');
        } else {
            return back()->with('error', 'Error Updating Bank Details.');
        }
    }

    public function profile_update_avatar(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'asset/profile/' . $filename;
            if ($user->image != 'user-default.png') {
                $path = './asset/profile/';
                File::delete($path . $user->image);
            }
            Image::make($image)->resize(800, 800)->save($location);
            $user->image = $filename;
            $user->save();
            return back()->with('success', 'Avatar Updated Successfully.');
        } else {
            return back()->with('error', 'An error occured, try again.');
        }
    }

    public function profile_set_pin()
    {
        return view('user.profile.pin');
    }

    public function profile_update_pin(Request $request)
    {
        try {
            $user = User::findOrFail(auth()->user()->id);
            $set = Setting::first();
            $current_pin = implode('', $request->current_pins);
            $pin = implode('', $request->pins);
            if ($current_pin != auth()->user()->pin) {
                return back()->with('alert', 'Current Pin Not Match.');
            }
            // $user->update(['pin' => $pin]);
            
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Please click on this link to confirm the pin change: <a href="' . route('user.profile.change_pin', $pin) . '">Click Here!</a>. Thanks for working with us.', 'Request for Pin Change', 1));
            }
            return back()->with('success', 'A confirmation email has been sent to your EMAIL for your PIN Change confirmation. Please go to your EMAIL to your to confirm your PIN Change setup. Thank you!');
            // return back()->with('success', 'Pin Changed Successfully.');
        } catch (\PDOException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function profile_change_pin($pin)
    {
        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->update(['pin' => $pin]);
            return redirect()->route('user.profile.set_pin')->with('success', 'Pin Changed Successfully.');
        } catch (\PDOException $e) {
            return redirect()->route('user.profile.set_pin')->with('error', $e->getMessage());
        }
    }

    public function profile_update_tether_address(Request $request)
    {
        // return $request;
        $user = User::findOrFail(auth()->user()->id);
        $res = $user->update($request->except('_token'));
        if ($res) {
            return back()->with('success', 'Tether Account Updated Successfully.');
        } else {
            return back()->with('error', 'Error Updating Tether Account.');
        }
    }

    public function verify_email()
    {
        $user = auth()->user();
        // if (($user->status == 0 || $user->status == null) && $user->email_verify == 1/*  && $user->sms_verify == '1' */) {
        if ($user->status == 1) {
            return redirect()->route('user.dashboard');
        } else {
            return view('user.auth.verify');
        }
    }

    public function do_verify_email(Request $request)
    {
        // return $request;
        $pin = implode('',$request->pin);
        $user = User::find(auth()->user()->id);
        if ($user->verification_code == $pin) {
            $user->update(['email_verify' => 1, 'status' => 1]);
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('error', 'Verification Code Did not matched');
        }
        return back();
    }

    public function resend_code()
    {
        $user = User::find(auth()->user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('error', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = rand(100000, 999999);
            $user->update([
                'email_time' => Carbon::now(),
                'verification_code' => $code
            ]);
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Your Verification Code is ' . $code, 'Verificatin Code'));
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect()->route('user.login');
    }
}
