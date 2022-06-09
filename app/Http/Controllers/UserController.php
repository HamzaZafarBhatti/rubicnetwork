<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\DataOperator;
use App\Models\Extraction;
use App\Models\PostUser;
use App\Models\Referral;
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
