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
}
