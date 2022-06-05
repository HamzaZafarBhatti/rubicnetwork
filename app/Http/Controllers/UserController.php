<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\DataOperator;
use App\Models\Extraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $extractions = Extraction::where('user_id', auth()->user()->id)->get();
        return view('user.dashboard', compact('extractions'));
    }

    public function profile()
    {
        $banks = Bank::whereStatus(1)->get();
        $data_operators = DataOperator::whereStatus(1)->get();
        return view('user.profile.index', compact('banks','data_operators'));
    }

    public function logout()
    {
        Auth::guard()->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect()->route('user.login');
    }
}
