<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        $data['title'] = 'Login';
        if (Auth::user()) {
            return redirect()->intended('user/dashboard');
        } else {
            return view('user.auth.login', $data);
        }
    }
    public function faverify()
    {
        if (Auth::user()) {
            $data['title'] = '2fa verification';
            return view('/auth/2fa', $data);
        } else {
            $data['title'] = 'Login';
            return view('/auth/login', $data);
        }
    }

    public function submitfa(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret = $user->googlefa_secret;
        $check = $g->checkcode($secret, $request->code, 3);
        if ($check) {
            Session::put('fakey', $secret);
            return redirect()->route('user.dashboard');
        } else {
            return back()->with('alert', 'Invalid code.');
        }
    }

    public function do_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $ip_address = user_ip();
            $user = User::find(auth()->user()->id);
            $set = $data['set'] = Setting::first();
            if ($ip_address != $user->ip_address & $set['email_notify'] == 1) {
                $msg = 'Sorry your account was just accessed from an unknown IP address<br> ' . $ip_address . '<br>If this was you, please you can ignore this message or reset your account password.';
                $subject = 'Login Notification';
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, $msg, $subject, 1));
            }
            $user->update([
                'last_login' => Carbon::now(),
                'ip_address' => $ip_address
            ]);
            login_log();
            if ($user->fa_status == 1) {
                return redirect()->route('2fa');
            } else {
                Session::put('fakey');
                return redirect()->intended('user/dashboard');
            }
        } else {
            return back()
                ->withErrors(['email' => 'Oops! You have entered invalid credentials'])
                ->withInput();
            // return back()->with('alert', 'Oops! You have entered invalid credentials');
        }
    }
}
