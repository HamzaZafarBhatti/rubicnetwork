<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\DataWithdraw;
use App\Models\Deposits;
use App\Models\Earners;
use App\Models\Etemplate;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{



    public function withdrawlog()
    {
        $data['title'] = 'Withdraw logs';
        $data['withdraw'] = DB::table('w_history')->join('users', 'users.id', '=', 'w_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->select('w_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('w_history.id', 'DESC')->get();
        return view('admin.withdrawal.index', $data);
    }


    public function withdrawapproved()
    {
        $data['title'] = 'Approved Withdraw';
        $data['withdraw'] = DB::table('w_history')->join('users', 'users.id', '=', 'w_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('w_history.status', 1)->select('w_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('w_history.id', 'DESC')->get();
        // $data['withdraw'] = Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.approved', $data);
    }

    public function withdrawunpaid()
    {
        $data['title'] = 'Unpaid Withdraw';
        $data['withdraw'] = DB::table('w_history')->join('users', 'users.id', '=', 'w_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('w_history.status', 0)->select('w_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('w_history.id', 'DESC')->get();
        // $data['withdraw'] = Withdraw::whereStatus(0)->orderBy('id', 'DESC')->get();
        // return $data['withdraw'];
        return view('admin.withdrawal.unpaid', $data);
    }

    public function withdrawdeclined()
    {
        $data['title'] = 'Declined Withdraw';
        $data['withdraw'] = DB::table('w_history')->join('users', 'users.id', '=', 'w_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('w_history.status', 2)->select('w_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('w_history.id', 'DESC')->get();
        // $data['withdraw'] = Withdraw::whereStatus(2)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.declined', $data);
    }

    public function DestroyWithdrawal($id)
    {
        $data = Withdraw::findOrFail($id);
        if ($data->status == 0) {
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

    public function approve($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Settings::first();
        $currency = Currency::whereStatus(1)->first();
        $data->status = 1;
        // return $data;
        $user->show_popup = 1;
        $user->save();
        $res = $data->save();
        if ($data->type == 3) {
            $earner = Earners::where('user_id', $data->user_id)->first();
            $earn_data = [
                'user_id' => $user->id,
                'name' => $user->name,
                'amount' => $data->amount,
                'status' => 'active'
            ];
            if (!$earner) {
                // return 'if';
                $earner = Earners::create($earn_data);
            } else {
                // return 'hello';
                $earner->amount += $data->amount;
                $earner->update(['amount' => $earner->amount]);
            }
        }
        // return 'out';
        if ($set->email_notify == 1) {
            // send_email(
            //     $user->email, 
            //     $user->username, 
            //     'Withdraw Request has been approved', 
            //     'Withdrawal request of ₦'.substr($data->amount,0,9).' has been approved<br>Thanks for choosing us.'
            // );
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }

    public function approve_multi(Request $request)
    {
        // return $request;
        $set = Settings::first();
        foreach ($request->ids as $id) {
            $data = Withdraw::findOrFail($id);
            $user = User::find($data->user_id);
            $user->show_popup = 1;
            $user->save();
            $data->status = 1;
            // return $data;
            $res = $data->save();
            if ($data->type == 3) {
                $earner = Earners::where('user_id', $data->user_id)->first();
                $earn_data = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'amount' => $data->amount,
                    'status' => 'active'
                ];
                if (!$earner) {
                    // return 'if';
                    $earner = Earners::create($earn_data);
                } else {
                    // return 'hello';
                    $earner->amount += $data->amount;
                    $earner->update(['amount' => $earner->amount]);
                }
            }
            // return 'out';
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            }
        }
        return 1;
    }

    public function approvemine(Request $request)
    {
        // return $request;
        $data = Withdraw::findOrFail($request->id);
        $user = User::find($data->user_id);
        // return $user;
        $user->show_popup = 1;
        $user->save();
        $set = Settings::first();
        if ($request->payment == 1) {
            $payment_value = $request->payment_value;
            if ($payment_value > $data->amount) {
                return back()->with('alert', 'The withdrawal amount is less than your input amount!');
            }
            $remainder_amount = $data->amount - $payment_value;
            $user->balance += $remainder_amount;
            $user->save();
            $data->amount = $payment_value;
        }
        $data->status = 1;
        // return $data;
        $res = $data->save();
        // return 'out';
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }

    public function decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Settings::first();
        $currency = Currency::whereStatus(1)->first();
        $data->status = 2;
        $res = $data->save();
        if ($data->type == 1) {
            $user->profit = $user->profit + $data->amount;
            $user->save();
        } elseif ($data->type == 2) {
            $user->balance = $user->balance + $data->amount;
            $user->save();
        } elseif ($data->type == 3) {
            $user->ref_bonus = $user->ref_bonus + $data->amount;
            $user->save();
        }
        if ($set->email_notify == 1) {
            // send_email(
            //     $user->email, 
            //     $user->username, 
            //     'Withdraw Request has been declined', 
            //     'Withdrawal request of ₦'.substr($data->amount,0,9).' has been declined<br>Thanks for working with us.'
            // );
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }
    public function data_withdrawlog()
    {
        $data['title'] = 'Data Withdraw logs';
        $data['withdraw'] = DataWithdraw::with('user', 'data_operator')->latest('id')->get();
        return view('admin.data_withdrawal.index', $data);
    }


    public function data_withdrawapproved()
    {
        $data['title'] = 'Approved Data Withdraws';
        $data['withdraw'] = DataWithdraw::with('user', 'data_operator')->whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.data_withdrawal.approved', $data);
    }

    public function data_withdrawunpaid()
    {
        $data['title'] = 'Unpaid Data Withdraw';
        $data['withdraw'] = DataWithdraw::with('user', 'data_operator')->whereStatus(0)->latest('id')->get();
        return view('admin.data_withdrawal.unpaid', $data);
    }

    public function data_withdrawdeclined()
    {
        $data['title'] = 'Declined Data Withdraw';
        $data['withdraw'] = DataWithdraw::with('user', 'data_operator')->whereStatus(2)->orderBy('id', 'DESC')->get();
        return view('admin.data_withdrawal.declined', $data);
    }

    public function DestroyDataWithdrawal($id)
    {
        $data = DataWithdraw::findOrFail($id);
        if ($data->status == 0) {
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

    public function dataapprove($id)
    {
        $data = DataWithdraw::findOrFail($id);
        // return $data;
        $user = User::find($data->user_id);
        $user->show_popup = 1;
        $user->save();
        $set = Settings::first();
        $data->status = 1;
        // return $data;
        $res = $data->save();
        // return 'out';
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Data Withdrawal request of MB' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }

    public function dataapprove_multi(Request $request)
    {
        // return $request;
        $set = Settings::first();
        foreach ($request->ids as $id) {
            $data = Withdraw::findOrFail($id);
            $user = User::find($data->user_id);
            $user->show_popup = 1;
            $user->save();
            $data->status = 1;
            // return $data;
            $res = $data->save();
            if ($data->type == 3) {
                $earner = Earners::where('user_id', $data->user_id)->first();
                $earn_data = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'amount' => $data->amount,
                    'status' => 'active'
                ];
                if (!$earner) {
                    // return 'if';
                    $earner = Earners::create($earn_data);
                } else {
                    // return 'hello';
                    $earner->amount += $data->amount;
                    $earner->update(['amount' => $earner->amount]);
                }
            }
            // return 'out';
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
            }
        }
        return 1;
    }

    public function dataapprovemine(Request $request)
    {
        // return $request;
        $data = Withdraw::findOrFail($request->id);
        $user = User::find($data->user_id);
        $user->show_popup = 1;
        $user->save();
        // return $user;
        $set = Settings::first();
        if ($request->payment == 1) {
            $payment_value = $request->payment_value;
            if ($payment_value > $data->amount) {
                return back()->with('alert', 'The withdrawal amount is less than your input amount!');
            }
            $remainder_amount = $data->amount - $payment_value;
            $user->balance += $remainder_amount;
            $user->save();
            $data->amount = $payment_value;
        }
        $data->status = 1;
        // return $data;
        $res = $data->save();
        // return 'out';
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' has been approved<br>Thanks for working with us.', 'Withdraw Request has been approved'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }

    public function datadecline($id)
    {
        // return $id;
        $data = DataWithdraw::findOrFail($id);
        $user = User::find($data->user_id);
        $set = Settings::first();
        $data->status = 2;
        $res = $data->save();
        $user->profit = $user->profit + $data->amount;
        $user->save();
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Data Withdrawal request of MB' . substr($data->amount, 0, 9) . ' has been declined<br>Thanks for working with us.', 'Withdraw Request has been declined'));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }
}
