<?php

namespace App\Http\Controllers;

use App\Models\Extraction;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;

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
        return !$extraction;
        if ($user->plan_id != null && $user->plan_id != 0 && !$extraction) {
            $extraction = Extraction::create([
                'user_id' => $user->id,
                'plan_id' => $user->plan_id,
                'amount' => $user->extraction_balance,
                'trx' => $random_string,
                // 'end_datetime' => Carbon::now()->addHours($plan->extraction_plan_time),
                'end_datetime' => Carbon::now()->addSeconds(15),
                'profit' => $plan->percent * $plan->upgrade / 100,
                'start_datetime' => Carbon::now()
            ]);
            return array('status' => '1');
        }
        return array('status' => '0');
    }

    public function extractions_end()
    {
        $user = User::find(auth()->user()->id);
        // return $user;
        $extraction = Extraction::whereUserId($user->id)->where('status', 0)->latest('id')->first();
        if ($extraction) {
            $end_date = date_create($extraction->end_date);
            $ndate = date_format($end_date, "Y-m-d H:i:s");
            // return json_encode([Carbon::now(), $ndate]);
            if (Carbon::now()->addSecond() > $ndate) {
                $extraction->update(['status' => 1]);
                if ($extraction->status == 1) {
                    // Log::info('if2');
                    $user->update(['extraction_balance' => $user->extraction_balance + $extraction->profit]);
                    $extraction->update(['status' => 2]);
                }
                return array('status' => '2');
            }
            return array('status' => '1');
        }
        return array('status' => '0');
    }

    public function extractions_history()
    {
        $extractions = Extraction::with('user', 'plan')->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
        // return $extractions;
        return view('user.extraction.history', compact('extractions'));
    }
}
