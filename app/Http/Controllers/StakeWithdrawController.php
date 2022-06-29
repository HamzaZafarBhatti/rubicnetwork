<?php

namespace App\Http\Controllers;

use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\StakePlan;
use App\Models\StakeWithdraw;
use App\Models\TopEarner;
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

    public function do_withdraw_to_tether(Request $request)
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
            $user->update(['rubic_stake_wallet' => $user->rubic_stake_wallet - $request->amount]);
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of $' . $amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE WALLET WITHDRAWAL - PENDING - USD' . $amount,
                'msg' => 'You have successfully placed a Withdrawal Request from your RUBIC STAKE WALLET. Kindly wait to get paid.',
                'is_read' => 0
            ]);
            return redirect()->route('user.stake_wallet.withdraw_history_tether')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function withdraw_history_tether()
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

    public function do_withdraw_to_bank(Request $request)
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
            $user->update(['rubic_stake_wallet' => $user->rubic_stake_wallet - $request->amount]);
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'We are currently reviewing your withdrawal request of ₦' . $amount . '. Thanks for working with us.', 'Withdraw Request currently being Processed'));
            }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE WALLET WITHDRAWAL - PENDING - USD' . $amount,
                'msg' => 'You have successfully placed a Withdrawal Request from your RUBIC STAKE WALLET. Kindly wait to get paid.',
                'is_read' => 0
            ]);
            return redirect()->route('user.stake_wallet.withdraw_history_bank')->with('success', 'Withdrawal Request has been submitted, you will be updated shortly.');
        } else {
            return back()->with('error', 'Insufficent balance.');
        }
    }

    public function withdraw_history_bank()
    {
        $stake_withdraws = StakeWithdraw::with('user')->whereUserId(auth()->user()->id)->get();
        return view('user.stake_withdraws.history', compact('stake_withdraws'));
    }

    public function withdraw_log()
    {
        $data['title'] = 'Rubic Stake Wallet Withdraw logs';
        $data['withdraw'] = StakeWithdraw::with('user')->latest('id')->get();
        return view('admin.stake_withdrawal.index', $data);
    }

    public function withdraw_approve($id)
    {
        $data = StakeWithdraw::findOrFail($id);
        // return $data;
        $user = User::find($data->user_id);
        $set = Setting::first();
        // return $data;
        // $user->show_popup = 1;
        // $user->save();
        if ($data->withdraw_to == 'bank') {
            $currency = '₦';
            $amount = $data->amount;
        } else {
            $currency = '$';
            $amount = $data->amount * $set->ngn_rate;
        }
        $res = $data->update(['status' => '1']);
        $earner = TopEarner::where('user_id', $data->user_id)->where('type', 0)->first();
        if (!$earner) {
            $earn_data = [
                'user_id' => $user->id,
                'name' => $user->name,
                'amount' => $amount,
                'status' => 1,
                'type' => 0
            ];
            // return 'if';
            $earner = TopEarner::create($earn_data);
        } else {
            // return 'hello';
            $earner->amount += $amount;
            $earner->update(['amount' => $earner->amount]);
        }
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ' . $currency . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved', 1));
        }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE WALLET WITHDRAWAL - SUCCESSFUL - ' . $currency . $data->amount,
                'msg' => 'Your Withdrawal Request from your RUBIC STAKE WALLET has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
            return redirect()->route('admin.stake_wallet.withdraw_log')->with('success', 'Request was Successfully approved!');
        } else {
            return redirect()->route('admin.stake_wallet.withdraw_log')->with('alert', 'Problem With Approving Request');
        }
    }

    public function withdraw_approved()
    {
        $data['title'] = 'Approved Rubic Wallet Withdraw';
        $data['withdraw'] = StakeWithdraw::with('user')->whereStatus('1')->latest('id')->get();
        return view('admin.stake_withdrawal.approved', $data);
    }

    public function withdraw_approve_multi(Request $request)
    {
        // return $request;
        $set = Setting::first();
        foreach ($request->ids as $id) {
            $data = StakeWithdraw::findOrFail($id);
            $user = User::find($data->user_id);
            // $user->show_popup = 1;
            // $user->save();
            if ($data->withdraw_to == 'bank') {
                $currency = '₦';
                $amount = $data->amount;
            } else {
                $currency = '$';
                $amount = $data->amount * $set->ngn_rate;
            }
            $res = $data->update(['status' => '1']);
            $earner = TopEarner::where('user_id', $data->user_id)->where('type', 0)->first();
            if (!$earner) {
                $earn_data = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'amount' => $amount,
                    'status' => 1,
                    'type' => 0
                ];
                // return 'if';
                $earner = TopEarner::create($earn_data);
            } else {
                // return 'hello';
                $earner->amount += $amount;
                $earner->update(['amount' => $earner->amount]);
            }
            // return 'out';
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ' . $currency . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE WALLET WITHDRAWAL - SUCCESSFUL - ' . $currency . $data->amount,
                'msg' => 'Your Withdrawal Request from your RUBIC STAKE WALLET has been APPROVED. Kindly POST your Payment Credit ALERT!',
                'is_read' => 0
            ]);
        }
        return 1;
    }

    public function withdraw_unpaid()
    {
        $data['title'] = 'Unpaid Rubic Wallet Withdraw';
        $data['withdraw'] = StakeWithdraw::with('user')->whereStatus('0')->latest('id')->get();
        return view('admin.stake_withdrawal.unpaid', $data);
    }

    public function withdraw_delete($id)
    {
        $data = StakeWithdraw::findOrFail($id);
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
        $data = StakeWithdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Setting::first();
        $currency = $data->withdraw_to == 'bank' ? '₦' : '$';
        $res = $data->update(['status' => '2']);
        $user->update(['rubic_wallet' => $user->rubic_wallet + $data->amount]);
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ' . $currency . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        }
        if ($res) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE WALLET WITHDRAWAL - DECLINED - ' . $currency . $data->amount,
                'msg' => 'Your Withdrawal Request from your RUBIC STAKE WALLET has been DECLINED - Please update your Bank account and try again or contact Rubic Network Support.',
                'is_read' => 0
            ]);
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }

    public function withdraw_declined()
    {
        $data['title'] = 'Declined Withdraw';
        $data['withdraw'] = StakeWithdraw::with('user')->whereStatus('2')->latest('id')->get();
        return view('admin.stake_withdrawal.declined', $data);
    }
}
