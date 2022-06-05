<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Profits;
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
        // $profit = Profits::whereUser_id(auth()->user()->id)->orderBy('id', 'DESC')->get();
        $latest_mine = Profits::whereUser_id(auth()->user()->id)->where('status', 0)->latest('id')->first();
        return view('user.extraction.page', compact('latest_mine'));
    }

    public function extractions_start()
    {
        $user = auth()->user();
        $plan = Plan::find($user->plan_id);
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $random_string = substr(str_shuffle($data), 0, 16);
        $profit = Profits::where('user_id', $user->id)->where('status', 0)->latest()->first();
        // return $profit;
        if ($user->plan_id != null && $user->plan_id != 0 && empty($profit)) {
            $profit = new Profits();
            $profit->user_id = $user->id;
            $profit->plan_id = $user->plan_id;
            $profit->amount = $user->balance;
            $profit->status = 0;
            $profit->trx = $random_string;
            $profit->end_date = Carbon::now()->addHours($plan->extraction_plan_time);
            // $profit->end_date = Carbon::now()->addSeconds(5);
            $profit->profit = $plan->percent * $plan->upgrade / 100 * $plan->extraction_plan_time;
            $profit->date = Carbon::now();
            $profit->save();
            return array('status' => '1');
        }
        return array('status' => '0');
    }

    public function extractions_end()
    {
        $user = User::find(auth()->user()->id);
        // return $user;
        $profit = Profits::whereUser_id($user->id)->where('status', 0)->latest('id')->first();
        if($profit) {
            $end_date = date_create($profit->end_date);
            $ndate = date_format($end_date, "Y-m-d H:i:s");
            // return json_encode([Carbon::now(), $ndate]);
            if (Carbon::now()->addSecond() > $ndate) {
                $profit->update(['status' => 1]);
                if ($profit->status == 1) {
                    // Log::info('if2');
                    $user->balance = $user->balance + $profit->profit;
                    $user->save();
                    $profit->status = 2;
                    $profit->save();
                }
                return array('status' => '2');
            }
            return array('status' => '1');
        }
        return array('status' => '0');
    }
}
