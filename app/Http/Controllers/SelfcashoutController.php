<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\User;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\Earners;
use App\Models\Etemplate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SelfcashoutController extends Controller
{



    public function selfcashoutlog()
    {
        $data['title'] = 'Self Cashout logs';
        $data['selfcashout'] = DB::table('self_cashout_history')->join('users', 'users.id', '=', 'self_cashout_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->select('self_cashout_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('self_cashout_history.id', 'DESC')->get();
        return view('admin.selfcashout.index', $data);
    }


    public function selfcashoutapproved()
    {
        $data['title'] = 'Approved Self Cashout';
        $data['selfcashout'] = DB::table('self_cashout_history')->join('users', 'users.id', '=', 'self_cashout_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('self_cashout_history.status', 1)->select('self_cashout_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('self_cashout_history.id', 'DESC')->get();
        return view('admin.selfcashout.approved', $data);
    }

    public function selfcashoutunpaid()
    {
        $data['title'] = 'Unpaid Self Cashout';
        $data['selfcashout'] = DB::table('self_cashout_history')->join('users', 'users.id', '=', 'self_cashout_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('self_cashout_history.status', 0)->select('self_cashout_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('self_cashout_history.id', 'DESC')->get();
        return view('admin.selfcashout.unpaid', $data);
    }

    public function selfcashoutdeclined()
    {
        $data['title'] = 'Declined Self Cashout';
        $data['selfcashout'] = DB::table('self_cashout_history')->join('users', 'users.id', '=', 'self_cashout_history.user_id')
            ->join('banks', 'banks.id', '=', 'users.bank_id')->where('self_cashout_history.status', 2)->select('self_cashout_history.*', 'banks.name as bank_name', 'users.name as user_name')->orderBy('self_cashout_history.id', 'DESC')->get();
        return view('admin.selfcashout.declined', $data);
    }

    public function DestroySelfcashout($id)
    {
        $data = DB::table('self_cashout_history')->find($id);
        if ($data->status == 0) {
            return back()->with('alert', 'You cannot delete an unpaid selfcashout request');
        } else {
            $res =  DB::table('self_cashout_history')->whereId($id)->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }
    }

    public function approve($id)
    {
        $data = DB::table('self_cashout_history')->find($id);
        $user = User::find($data->user_id);
        $user->show_popup = 1;
        $user->save();
        $set = Settings::first();
        $res = DB::table('self_cashout_history')->whereId($id)->update(['status'=>1]);
        // return 'out';
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Self Cashout request of ₦' . substr($data->amount, 0, 9) . ' has been approved. Thanks for choosing us.', 'Self Cashout Request has been approved', 1));
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
        foreach($request->ids as $id) {
            $data = DB::table('self_cashout_history')->find($id);
            $user = User::find($data->user_id);
            $user->show_popup = 1;
            $user->save();
            $set = Settings::first();
            DB::table('self_cashout_history')->whereId($id)->update(['status'=>1]);
            // return 'out';
            if ($set->email_notify == 1) {
                $temp = Etemplate::first();
                Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Self Cashout request of ₦' . substr($data->amount, 0, 9) . ' has been approved. Thanks for choosing us.', 'Self Cashout Request has been approved', 1));
            }
        }
        return 1;
    }

    public function decline($id)
    {
        $data = DB::table('self_cashout_history')->find($id);
        $user = User::find($data->user_id);
        $set = Settings::first();
        $res = DB::table('self_cashout_history')->whereId($id)->update(['status'=>2]);
        $user->balance = $user->balance + $data->amount;
        $user->save();
        if ($set->email_notify == 1) {
            $temp = Etemplate::first();
            Mail::to($user->email)->send(new GeneralEmail($temp->esender, $user->username, 'Self Cashout request of ₦' . substr($data->amount, 0, 9) . ' has been declined. Thanks for choosing us.', 'Self Cashout Request has been declined', 1));
        }
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }
}
