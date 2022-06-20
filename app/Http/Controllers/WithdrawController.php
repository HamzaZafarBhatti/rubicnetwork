<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends Controller
{
    //
    public function wallet_withdraw()
    {
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        // return $user;
        $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->account_no,
            'account' => $user->account_name . ' - ' . $user->account_no . ' - ' . $bank_name
        ];
        return view('user.withdraws.withdraw', $data);
    }

    public function wallet_do_withdraw(Request $request)
    {
        // return $request;
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = Setting::first();
        $user = User::with('plan')->find(auth()->user()->id);
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        $plan = $user->plan;
        $amount = $request->amount;
        if ($plan->min_account_balance_wd > $request->amount) {
            return back()->with('error', 'You have requested less than your plan defined payment.');
        }
        if ($user->rubic_wallet >= $amount) {
            Withdraw::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'status' => '0',
                'account_no' => $request->account_no
            ]);
            $user->update(['rubic_wallet' => $user->rubic_wallet - $amount]);
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $request->amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            }
            return redirect()->route('user.wallet.withdraw_history')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function wallet_withdraw_history()
    {
        $withdraws = Withdraw::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.withdraws.history', compact('withdraws'));
    }
}
