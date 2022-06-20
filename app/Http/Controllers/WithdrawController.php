<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function withdraw_log()
    {
        $data['title'] = 'Rubic Wallet Withdraw logs';
        $data['withdraw'] = Withdraw::with('user')->latest('id')->get();
        return view('admin.withdrawal.index', $data);
    }

    public function withdraw_approve($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        // return $data;
        // $user->show_popup = 1;
        // $user->save();
        $res = $data->update(['status' => '1']);
        // if ($data->type == 3) {
        //     $earner = Earners::where('user_id', $data->user_id)->first();
        //     $earn_data = [
        //         'user_id' => $user->id,
        //         'name' => $user->name,
        //         'amount' => $data->amount,
        //         'status' => 'active'
        //     ];
        //     if (!$earner) {
        //         // return 'if';
        //         $earner = Earners::create($earn_data);
        //     } else {
        //         // return 'hello';
        //         $earner->amount += $data->amount;
        //         $earner->update(['amount' => $earner->amount]);
        //     }
        // }
        // return 'out';
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved', 1));
        }
        if ($res) {
            return redirect()->route('admin.wallet.withdraw_log')->with('success', 'Request was Successfully approved!');
        } else {
            return redirect()->route('admin.wallet.withdraw_log')->with('alert', 'Problem With Approving Request');
        }
    }

    public function withdraw_approved()
    {
        $data['title'] = 'Approved Rubic Wallet Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereStatus('1')->latest('id')->get();
        // $data['withdraw'] = Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.approved', $data);
    }

    public function withdraw_approve_multi(Request $request)
    {
        // return $request;
        $set = Setting::first();
        foreach ($request->ids as $id) {
            $data = Withdraw::findOrFail($id);
            $user = User::find($data->user_id);
            // $user->show_popup = 1;
            // $user->save();
            $res = $data->update(['status' => '1']);
            // return 'out';
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            }
        }
        return 1;
    }

    public function withdraw_unpaid()
    {
        $data['title'] = 'Unpaid Rubic Wallet Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereStatus('0')->latest('id')->get();
        return view('admin.withdrawal.unpaid', $data);
    }

    public function withdraw_delete($id)
    {
        $data = Withdraw::findOrFail($id);
        // return json_encode($data->status == '0');
        if ($data->status == '0') {
            return back()->with('alert', 'You cannot delete an unpaid withdraw request');
        } else {
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }
    }

    public function withdraw_decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        $res = $data->update(['status' => '2']);
        $user->update(['rubic_wallet' => $user->rubic_wallet + $data->amount]);
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }

    public function withdraw_declined()
    {
        $data['title'] = 'Declined Withdraw';
        $data['withdraw'] = Withdraw::with('user')->whereStatus('2')->latest('id')->get();
        return view('admin.withdrawal.declined', $data);
    }
}
