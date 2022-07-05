<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Referral;
use App\Models\ReferralConvert;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
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

    public function convert()
    {
        $converts = ReferralConvert::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.referrals.convert', compact('converts'));
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
        if (!$set->ref_earning_transfer) {
            return back()->with('error', 'You cannot transfer referral Profit to Rubic Wallet!');
        }
        if ($request->amount > $user->ref_earning) {
            return back()->with('error', 'You referral profit balance is less than the requested amount!');
        }
        $now = Carbon::now();
        $start = Carbon::parse($set->ref_earning_transfer_start);
        $end = Carbon::parse($set->ref_earning_transfer_end);
        if (($start > $now) || ($end < $now)) {
            return back()->with('error', 'You can only transfer Referral Profit to Rubic Wallet from ' . $start->format('l jS \\of F Y h:i:s A') . ' to ' . $end->format('l jS \\of F Y h:i:s A'));
        }
        $res = ReferralConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if ($res) {
            $user->update([
                'rubic_wallet' => $user->rubic_wallet + $request->amount,
                'ref_earning' => $user->ref_earning - $request->amount
            ]);
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Referral Earnings Transfer',
                'msg' => 'You transferred NGN' . $request->amount . ' from your Referral Earnings to your Rubic Wallet',
                'is_read' => 0
            ]);
            return redirect()->route('user.referrals.convert')->with('success', 'Referral profit is converted to Rubic Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
