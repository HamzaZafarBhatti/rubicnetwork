<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Referral;
use App\Models\Etemplate;
use App\Models\Settings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    protected $redirectTo = '/user/dashboard';


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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon_id' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $errors = $validator->errors();
            $data['errors'] = $errors;
            $html_err = "ERROR REGISTRATION: ";
            foreach ($errors->all() as $error) {
                $html_err .=  $error . ', ';
            }
            Session::flash('error', $html_err);
            return view('user.auth.register', $data);
        }

        $coupon_code = Coupon::where('serial', $request->coupon_id)->first();
        // return $coupon_code;
        if (!$coupon_code) {
            Session::flash('error', 'ACTIVATION PIN CODE INVALID');
            return view('user.auth.register');
        }
        if ($coupon_code->status == 1) {
            Session::flash('error', 'ACTIVATION PIN CODE used');
            return view('user.auth.register');
        }

        $basic = Settings::first();
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
        // if ($basic->coupon_verification == 1) {
        //     $coupon = 0;
        // } else {
        //     $coupon = 1;
        // }
        $verification_code = strtoupper(Str::random(6));
        $sms_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $acct = '2' . rand(1, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
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


        // if ($basic->email_verification == 1) {
        //     $text = "Your Email Verification Code Is: $user->verification_code";
        //     // send_email($user->email, $user->name, 'Email verification', $text);
        //     $temp = Etemplate::first();
        //     Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        // }
        // if ($basic->sms_verification == 1) {
        //     $message = "Your phone verification code is: $user->sms_code";
        //     send_sms($user->phone, strip_tags($message));
        // }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect()->route('user.dashboard');
        }
    }
    public function referral($id)
    {
        $data['title'] = 'GoldMint Mining Account Registration';
        $data['ref'] = $id;
        // return $data;
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('/auth/referral', $data);
        }
    }

    public function submitreferral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'coupon' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $data['title'] = 'Affiliate system';
            $data['ref'] = $request->ref;
            $data['errors'] = $validator->errors();
            Session::flash('error', 'ERROR REGISTRATION: ' . json_encode($data['errors']));
            return view('/auth/referral', $data);
        }

        $coupon_code = Coupon::with('plan')->where('serial', $request->coupon)->first();
        if (!$coupon_code) {
            $data['title'] = 'Affiliate system';
            $data['ref'] = $request->ref;
            Session::flash('error', 'ACTIVATION PIN CODE INVALID');
            return view('/auth/referral', $data);
        }
        if ($coupon_code->status == 'inactive') {
            $data['title'] = 'Affiliate system';
            $data['ref'] = $request->ref;
            Session::flash('error', 'ACTIVATION PIN CODE used');
            return view('/auth/referral', $data);
        }
        // return $coupon_code;

        $basic = Settings::first();

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
        if ($basic->coupon_verification == 1) {
            $coupon = 0;
        } else {
            $coupon = 1;
        }
        // return $request;
        $verification_code = strtoupper(Str::random(6));
        $sms_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email_verify = $email_verify;
        $user->verification_code = $verification_code;
        $user->sms_code = $sms_code;
        $user->email_time = $email_time;
        $user->phone_verify = $phone_verify;
        $user->phone_time = $phone_time;
        $user->balance = $basic->balance_reg;
        $user->ip_address = user_ip();
        $user->pin = '0000';
        $user->coupon = $request->coupon;
        $user->activated_at = date('Y-m-d');
        $user->password = Hash::make($request->password);
        $user->save();
        $main = User::with('parent_reference')->whereUsername($request->ref)->first();
        // return $coupon_code->plan->id;
        // return $main;
        if ($coupon_code->plan->id === 10) {
            $main->is_selfcashout = $main->is_selfcashout + 1;
        }
        $ref_bonus = $main->ref_bonus + ($coupon_code->plan->upgrade * $coupon_code->plan->ref_percent / 100);
        $main->ref_bonus = $ref_bonus;
        $main->save();
        $ref = User::whereUsername($request->username)->first();
        $sav['user_id'] = $ref->id;
        $sav['ref_id'] = $main->id;
        $sav['is_direct'] = 1;
        Referral::create($sav);
        if (!$main->parent_reference->isEmpty()) {
            $parent = User::find($main->parent_reference[0]->id);
            $ref_bonus = $parent->ref_bonus + ($coupon_code->plan->upgrade * $coupon_code->plan->indirect_ref_com / 100);
            $parent->ref_bonus = $ref_bonus;
            $parent->save();
            $sav['user_id'] = $ref->id;
            $sav['ref_id'] = $parent->id;
            $sav['is_direct'] = 0;
            Referral::create($sav);
        }
        $coupon_code->update(['status' => 'inactive']);


        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: $user->verification_code";
            // send_email($user->email, $user->name, 'Email verification', $text);
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->name, $text, 'Email verification'));
        }
        if ($basic->sms_verification == 1) {
            $message = "Your phone verification code is: $user->sms_code";
            send_sms($user->phone, strip_tags($message));
        }

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect()->intended('user/dashboard');
        }
    }
}
