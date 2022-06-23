<?php

namespace App\Http\Controllers;

use App\Models\Extraction;
use App\Models\ExtractionConvert;
use App\Models\ExtractionWithdrawal;
use App\Models\Notification;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExtractionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function extractions_page()
    {
        $latest_mine = Extraction::whereUser_id(auth()->user()->id)->where('status', 0)->latest('id')->first();
        return view('user.extraction.page', compact('latest_mine'));
    }

    public function extractions_start()
    {
        $user = auth()->user();
        $plan = Plan::find($user->plan_id);
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $random_string = substr(str_shuffle($data), 0, 16);
        $extraction = Extraction::where('user_id', $user->id)->where('status', 0)->latest()->first();
        // return $extraction;
        if (!$extraction) {
            $extraction = Extraction::create([
                'user_id' => $user->id,
                'plan_id' => $user->plan_id,
                'amount' => $user->extraction_balance,
                'trx' => $random_string,
                'end_datetime' => Carbon::now()->addHours($plan->extraction_plan_time),
                // 'end_datetime' => Carbon::now()->addSeconds(10),
                'profit' => $plan->percent * $plan->upgrade / 100,
                'start_datetime' => Carbon::now()
            ]);
            return array('status' => '1');
        }
        return array('status' => '0');
    }

    public function extractions_thankyou()
    {
        return view('user.extraction.thank_you');
    }

    public function extractions_history()
    {
        $extractions = Extraction::with('user', 'plan')->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
        // return $extractions;
        return view('user.extraction.history', compact('extractions'));
    }

    public function extractions_convert()
    {
        $converts = ExtractionConvert::with('user')->get();
        return view('user.extraction.convert', compact('converts'));
    }

    public function extractions_do_convert(Request $request)
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
        if (!$set->extraction_transfer) {
            return back()->with('error', 'You cannot transfer Extraction Profit to Rubic Wallet!');
        }
        if ($request->amount > $user->extraction_balance) {
            return back()->with('error', 'You extraction profit balance is less than the requested amount!');
        }
        $now = Carbon::now();
        $start = Carbon::parse($set->extraction_transfer_start);
        $end = Carbon::parse($set->extraction_transfer_end);
        if (($start > $now) || ($end < $now)) {
            return back()->with('error', 'You can only transfer Extraction Profit to Rubic Wallet from ' . $start->format('l jS \\of F Y h:i:s A') . ' to ' . $end->format('l jS \\of F Y h:i:s A'));
        }
        $res = ExtractionConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if ($res) {
            $user->update([
                'rubic_wallet' => $user->rubic_wallet + $request->amount,
                'extraction_balance' => $user->extraction_balance - $request->amount
            ]);
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Extraction Balance Transfer',
                'msg' => 'You transferred NGN' . $request->amount . ' from your Extraction Balance to your Rubic Wallet',
                'is_read' => 0
            ]);
            return redirect()->route('user.extractions.convert')->with('success', 'Extraction balance is converted to Rubic Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
