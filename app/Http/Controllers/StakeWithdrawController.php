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
        // $user = User::whereId(auth()->user()->id)->first();
        // return $user;
        return view('user.stake_withdraws.withdraw_tether');
    }

    public function do_withdraw_to_tether (Request $request)
    {
        // return $request;
        $pin = implode('', $request->pins);
        // return date('Y-m-d');
        // $validator = Validator::make($request->all(), [
        //     'amount' => 'required',
        //     'type' => 'required',
        //     'details' => 'required',
        //     'pin' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     // adding an extra field 'error'...
        //     $user = User::with('bank')->whereId(auth()->user()->id)->first();
        //     $data['title'] = 'Withdraw';
        //     $data['withdraw'] = Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        //     $bank_name = $user->bank !== null ? $user->bank->name : 'N/A';
        //     $data['account'] = [
        //         'account_no' => $user->account_no,
        //         'account' => $user->account_name . ' - ' . $user->account_no . ' - ' . $bank_name
        //     ];
        //     $data['errors'] = $validator->errors();
        //     return view('user.withdraw', $data);
        // }
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        $set = Setting::first();
        $user = User::with('plan')->find(auth()->user()->id);
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        // $plan = StakePlan::whereHas('user', function ($q) use ($user) {
        //     $q->where('users.id', $user->id);
        // })->whereStatus(1)->first();
        $plan = $user->plan;
        // return $user->plan;
        // if ($plan->min_account_balance_wd > $request->amount) {
        //     return back()->with('error', 'You have requested less than your plan defined payment.');
        // }
        // Amount/ NGN RATE = USDT Amount
        $amount = $request->amount / $set->ngn_rate;
        if ($plan->min_trade_profit_wd > $request->amount) {
            return back()->with('error', 'You have requested less than your plan defined payment.');
        }
        // $last_wd = Withdraw::whereUser_id($user->id)->whereType(1)->latest()->first();
        // if ($last_wd) {
        //     $end = Carbon::parse($last_wd->created_at);
        //     $now = Carbon::now();
        //     $length = $end->diffInDays($now);
        //     if ($length < $plan->min_trade_profit_wd_cycle) {
        //         return back()->with('error', 'You have already requested this payment.');
        //     }
        // }
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
            return redirect()->route('user.stake_wallet.withdraw_history')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function withdraw_history ()
    {
        $stake_withdraws = StakeWithdraw::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.stake_withdraws.history', compact('stake_withdraws'));
    }
}
