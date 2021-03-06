<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Referral;
use App\Models\Etemplate;
use App\Models\IndirectReferral;
use App\Models\Setting;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    // protected $redirectTo = '/user/dashboard';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function register()
    {
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.register');
        }
    }

    public function do_register(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon_id' => 'required|string|regex:/^\S*$/u',
        ]);

        $coupon_code = Coupon::where('serial', $request->coupon_id)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            return redirect()->route('user.register')
                ->withErrors(['coupon_id' => 'ACTIVATION PIN CODE INVALID'])
                ->withInput();
        }
        if ($coupon_code->status == 1) {
            return redirect()->route('user.register')
                ->withErrors(['coupon_id' => 'ACTIVATION PIN CODE used'])
                ->withInput();
        }

        $basic = Setting::first();
        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        $verification_code = rand(100000, 999999);
        $sms_code = rand(100000, 999999);
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'email_verify' => $email_verify,
            'verification_code' => $verification_code,
            'sms_code' => $sms_code,
            'email_time' => $email_time,
            'phone_verify' => $phone_verify,
            'phone_time' => $phone_time,
            'extraction_balance' => $basic->balance_reg,
            'ip_address' => user_ip(),
            'coupon_id' => $coupon_code->id,
            'plan_id' => $coupon_code->plan_id,
            'activated_at' => date('Y-m-d'),
            'password' => bcrypt($request->password),
        ]);
        $coupon_code->update(['status' => 1]);


        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: $user->verification_code";
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        }
        // if ($basic->sms_verification == 1) {
        //     $message = "Your phone verification code is: $user->sms_code";
        //     send_sms($user->phone, strip_tags($message));
        // }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            login_log();
            return redirect()->route('user.dashboard');
        }
    }
    public function onboarding($username)
    {
        // return $data;
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.referral', compact('username'));
        }
    }

    public function do_onboarding(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon_id' => 'required|string|regex:/^\S*$/u',
            'referee_username' => 'required|string',
        ]);


        $referee_user = User::with('parent')->whereUsername($request->referee_username)->first();
        // return json_encode(!$referee_user->parent->isEmpty());
        if (!$referee_user) {
            return redirect()->route('user.onboarding', $request->referee_username)
                ->withErrors(['referee_username' => 'REFERRAL USERNAME INVALID'])
                ->withInput();
        }

        $coupon_code = Coupon::with('plan')->where('serial', $request->coupon_id)->first();
        if (!$coupon_code) {
            return redirect()->route('user.onboarding', $request->referee_username)
                ->withErrors(['coupon_id' => 'ACTIVATION PIN CODE INVALID'])
                ->withInput();
        }
        if ($coupon_code->status == 1) {
            return redirect()->route('user.onboarding', $request->referee_username)
                ->withErrors(['coupon_id' => 'ACTIVATION PIN CODE used'])
                ->withInput();
        }
        // return $coupon_code;

        $basic = Setting::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        $verification_code = rand(100000, 999999);
        $sms_code = rand(100000, 999999);
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'email_verify' => $email_verify,
            'verification_code' => $verification_code,
            'sms_code' => $sms_code,
            'email_time' => $email_time,
            'phone_verify' => $phone_verify,
            'phone_time' => $phone_time,
            'extraction_balance' => $basic->balance_reg,
            'ip_address' => user_ip(),
            'coupon_id' => $coupon_code->id,
            'plan_id' => $coupon_code->plan_id,
            'activated_at' => date('Y-m-d'),
            'password' => bcrypt($request->password),
        ]);
        $ref_bonus = $coupon_code->plan->upgrade * $coupon_code->plan->ref_percent / 100;
        $ref_earning = $referee_user->ref_earning + $ref_bonus;
        Referral::create([
            'referral_id' => $user->id,
            'referee_id' => $referee_user->id,
            'referee_ref_earning' => $referee_user->ref_earning,
            'bonus' => $ref_bonus,
        ]);
        $referee_user->update(['ref_earning' => $ref_earning]);
        if (!$referee_user->parent->isEmpty()) {
            $parent = User::find($referee_user->parent[0]->id);
            $indirect_ref_bonus = $coupon_code->plan->upgrade * $coupon_code->plan->indirect_ref_com / 100;
            $indirect_ref_earning = $parent->ref_bonus + $indirect_ref_bonus;
            IndirectReferral::create([
                'referral_id' => $user->id,
                'referee_id' => $parent->id,
                'referee_ref_earning' => $parent->indirect_ref_earning,
                'bonus' => $indirect_ref_earning,
            ]);
            $parent->update(['indirect_ref_earning' => $indirect_ref_earning]);
        }
        $coupon_code->update(['status' => 1]);

        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: $user->verification_code";
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        }
        // if ($basic->sms_verification == 1) {
        //     $message = "Your phone verification code is: $user->sms_code";
        //     send_sms($user->phone, strip_tags($message));
        // }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            login_log();
            return redirect()->route('user.dashboard');
        }
    }
}
