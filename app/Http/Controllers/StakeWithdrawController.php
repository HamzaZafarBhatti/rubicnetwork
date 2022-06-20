<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Setting;
use App\Models\StakePlan;
use App\Models\StakeWithdraw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StakeWithdrawController extends Controller
{
    //
    public function withdraw_to_tether()
    {
        return view('user.stake_withdraws.withdraw_tether');
    }

    public function do_withdraw_to_tether (Request $request)
    {
        // return $request;
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = Setting::first();
        $user = User::with('stake_plans')->find(auth()->user()->id);
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        // Amount/ NGN RATE = USDT Amount
        $amount = $request->amount / $set->ngn_rate;
        $min_wd_balance = $user->stake_plans->min('stake_wallet_wd');
        if ($min_wd_balance > $request->amount) {
            return back()->with('error', 'You have requested less than your plan defined payment.');
        }
        if ($user->rubic_stake_wallet >= $request->amount) {
            StakeWithdraw::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'status' => '0',
                'account_no' => $request->account_no,
                'withdraw_to' => 'tether',
            ]);
            $user->update(['rubic_stake_wallet' => $user->rubic_wallet - $request->amount]);
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of $' . $amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            }
            return redirect()->route('user.stake_wallet.withdraw_history_tether')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function withdraw_history_tether ()
    {
        $stake_withdraws = StakeWithdraw::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.stake_withdraws.history', compact('stake_withdraws'));
    }
    
    public function withdraw_to_bank()
    {
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->account_no,
            'account' => $user->account_name . ' - ' . $user->account_no . ' - ' . $bank_name
        ];
        return view('user.stake_withdraws.withdraw_bank', $data);
    }

    public function do_withdraw_to_bank (Request $request)
    {
        // return $request;
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = Setting::first();
        $user = User::with('stake_plans')->find(auth()->user()->id);
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        $amount = $request->amount;
        $min_wd_balance = $user->stake_plans->min('stake_wallet_wd');
        if ($min_wd_balance > $request->amount) {
            return back()->with('error', 'You have requested less than your plan defined payment.');
        }
        if ($user->rubic_stake_wallet >= $request->amount) {
            StakeWithdraw::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'status' => '0',
                'account_no' => $request->account_no,
                'withdraw_to' => 'bank',
            ]);
            $user->update(['rubic_stake_wallet' => $user->rubic_wallet - $request->amount]);
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            }
            return redirect()->route('user.stake_wallet.withdraw_history_bank')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function withdraw_history_bank ()
    {
        $stake_withdraws = StakeWithdraw::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.stake_withdraws.history', compact('stake_withdraws'));
    }
}
