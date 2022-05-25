<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function login()
    {
        if(auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function do_login(Request $request)
    {
        // return $request;
		if (Auth::guard('admin')->attempt([
			'username' => $request->username,
			'password' => $request->password,
		])) {
			return redirect()->route('admin.dashboard');
		}else{
			return back()->with('alert', 'Oops! You have entered invalid credentials');
		}
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect()->route('admin.login');
    }
}
