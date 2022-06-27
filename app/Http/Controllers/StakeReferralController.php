<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Setting;
use App\Models\StakeReferral;
use App\Models\StakeReferralConvert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StakeReferralController extends Controller
{
    public function earning_history()
    {
        $referrals = StakeReferral::with('referral')->whereRefereeId(auth()->user()->id)->get();
        return view('user.stake_referrals.history', compact('referrals'));
    }

    public function convert()
    {
        $converts = StakeReferralConvert::with('user')->get();
        return view('user.stake_referrals.convert', compact('converts'));
    }

    public function do_convert(Request $request)
    {
        // return $request;
        $set = Setting::first();
        $user = User::find(auth()->user()->id);
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        if (!$set->stake_ref_earning_transfer) {
            return back()->with('error', 'You cannot transfer Stake Referral Profit to Rubic Wallet Wallet!');
        }
        if ($request->amount > $user->stake_ref_earning) {
            return back()->with('error', 'Your Stake Referral profit balance is less than the requested amount!');
        }
        $now = Carbon::now();
        $start = Carbon::parse($set->stake_ref_earning_transfer_start);
        $end = Carbon::parse($set->stake_ref_earning_transfer_end);
        if (($start > $now) || ($end < $now)) {
            return back()->with('error', 'You  can only transfer Stake Referral Profit to Rubic Wallet Wallet from ' . $start->format('l jS \\of F Y h:i:s A') . ' to ' . $end->format('l jS \\of F Y h:i:s A'));
        }
        $res = StakeReferralConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if ($res) {
            $user->update([
                'rubic_stake_wallet' => $user->rubic_stake_wallet + $request->amount,
                'stake_ref_earning' => $user->stake_ref_earning - $request->amount
            ]);
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE REFERRAL Transfer to STAKE WALLET',
                'msg' => 'You transferred NGN' . $request->amount . ' from your RUBIC STAKE REFERRAL EARNINGS to your Rubic STAKE WALLET',
                'is_read' => 0
            ]);
            return redirect()->route('user.stake_referrals.convert')->with('success', 'Stake Referral profit is converted to Rubic Wallet Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
