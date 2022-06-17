<?php

namespace App\Http\Controllers;

use App\Models\IndirectReferral;
use App\Models\IndirectReferralConvert;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
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

    public function convert()
    {
        $converts = IndirectReferralConvert::with('user')->get();
        return view('user.indirect_referrals.convert', compact('converts'));
    }

    public function do_convert(Request $request)
    {
        $set = Setting::first();
        $user = User::find(auth()->user()->id);
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        if(!$set->indirect_ref_earning_transfer) {
            return back()->with('error', 'You cannot transfer indirect referral Profit to Rubic Wallet!');
        }
        if($request->amount > $user->indirect_ref_earning) {
            return back()->with('error', 'You indirect referral profit is less than the requested amount!');
        }
        $now = Carbon::now();
        $start = Carbon::parse($set->indirect_ref_earning_transfer_start);
        $end = Carbon::parse($set->indirect_ref_earning_transfer_end);
        if(($start > $now) || ($end < $now)) {
            return back()->with('error', 'You can only transfer Indirect Referral Profit to Rubic Wallet from '.$start->format('l jS \\of F Y h:i:s A').' to '.$end->format('l jS \\of F Y h:i:s A'));
        }
        $res = IndirectReferralConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if($res) {
            $user->update([
                'rubic_wallet' => $user->rubic_wallet + $request->amount,
                'indirect_ref_earning' => $user->indirect_ref_earning - $request->amount
            ]);
            return redirect()->route('user.indirect_referrals.convert')->with('success', 'Indirect Referral profit is converted to Rubic Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
