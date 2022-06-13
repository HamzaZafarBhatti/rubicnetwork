<?php

namespace App\Http\Controllers;

use App\Models\StakeReferral;
use Illuminate\Http\Request;

class StakeReferralController extends Controller
{
    public function earning_history()
    {
        $referrals = StakeReferral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.stake_referrals.history', compact('referrals'));
    }
}
