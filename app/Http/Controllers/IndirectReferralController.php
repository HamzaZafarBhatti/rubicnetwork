<?php

namespace App\Http\Controllers;

use App\Models\IndirectReferral;
use Illuminate\Http\Request;

class IndirectReferralController extends Controller
{
    //
    public function index()
    {
        $referrals = IndirectReferral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.indirect_referrals.index', compact('referrals'));
    }

    public function earning_history()
    {
        $referrals = IndirectReferral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.indirect_referrals.history', compact('referrals'));
    }
}
