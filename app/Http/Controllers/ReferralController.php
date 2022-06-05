<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //
    public function index()
    {
        $referrals = Referral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.referrals.index', compact('referrals'));
    }

    public function earning_history()
    {
        $referrals = Referral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.referrals.history', compact('referrals'));
    }
}
