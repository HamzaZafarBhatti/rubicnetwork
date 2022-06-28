<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Setting;
use App\Models\StakeCoupon;
use App\Models\StakeEarningConvert;
use App\Models\StakePlan;
use App\Models\StakeReferral;
use App\Models\User;
use App\Models\UserStakePlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use PayKassaSCI;

class StakePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Stake Plans';
        $plans = StakePlan::all();
        return view('admin.stake_plans.index', compact('title', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Create Stake Plan';
        return view('admin.stake_plans.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        if (strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }

        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'stake_plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $image_name = $filename;
        }

        $res = StakePlan::create([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'amount' => $request->amount,
            'return_capital' => $request->return_capital,
            'stake_profit_transfer' => $request->stake_profit_transfer,
            'stake_profit_transfer_cycle' => $request->stake_profit_transfer_cycle,
            'stake_wallet_wd' => $request->stake_wallet_wd,
            'stake_wallet_wd_cycle' => $request->stake_wallet_wd_cycle,
            'ref_earning_transfer' => $request->ref_earning_transfer,
            'ref_earning_transfer_cycle' => $request->ref_earning_transfer_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
        ]);
        if ($res) {
            return redirect()->route('admin.stake_plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Stake Plan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function show(StakePlan $stakePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function edit(StakePlan $stakePlan)
    {
        //
        $title = $stakePlan->name;
        return view('admin.stake_plans.edit', compact('title', 'stakePlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StakePlan $stakePlan)
    {
        //
        // return $request;
        if (strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }

        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = $stakePlan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'stake_plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $stakePlan->image);
            $image_name = $filename;
        }
        $res = $stakePlan->update([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'amount' => $request->amount,
            'return_capital' => $request->return_capital,
            'stake_profit_transfer' => $request->stake_profit_transfer,
            'stake_profit_transfer_cycle' => $request->stake_profit_transfer_cycle,
            'stake_wallet_wd' => $request->stake_wallet_wd,
            'stake_wallet_wd_cycle' => $request->stake_wallet_wd_cycle,
            'ref_earning_transfer' => $request->ref_earning_transfer,
            'ref_earning_transfer_cycle' => $request->ref_earning_transfer_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
        ]);
        if ($res) {
            return redirect()->route('admin.stake_plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(StakePlan $stakePlan)
    {
        //
        $res =  $stakePlan->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function history()
    {
        $plans = UserStakePlan::with('stake_plan', 'stake_coupon')->where('user_id', auth()->user()->id)->get();
        $user_stake_profit = auth()->user()->stake_profit;
        return view('user.stake_plans.history', compact('plans', 'user_stake_profit'));
    }
    public function activate()
    {
        $plans = StakePlan::where('status', 1)->get();
        return view('user.stake_plans.activate', compact('plans'));
    }
    public function do_activate_coupon(Request $request, StakePlan $stakePlan)
    {
        // return $stakePlan;
        // return $request;
        $stake_coupon = StakeCoupon::whereSerial($request->stake_activation_code)->first();
        // return json_encode($stake_coupon);
        if (!$stake_coupon) {
            return back()->with('alert', 'Stake Activation code is invalid');
        }
        if ($stake_coupon->status) {
            return back()->with('alert', 'Stake Activation code is already used');
        }
        $user = User::with('parent')->whereId(auth()->user()->id)->first();
        // return $user;
        // $bonus = $stakePlan->percent * $stakePlan->amount / 100;
        UserStakePlan::create([
            'user_id' => $user->id,
            'stake_plan_id' => $stakePlan->id,
            'status' => 1,
            'stake_coupon_id' => $stake_coupon->id,
            'stake_profit' => 0,
            'next_update_time' => Carbon::now()->addDay(),
            // 'next_update_time' => Carbon::now()->addMinute(),
            // 'start_time' => Carbon::now(),
            // 'complete_time' => Carbon::now()->addDays($stakePlan->duration)
            // 'remaining_days' => 29
            'remaining_days' => $stakePlan->duration
        ]);
        if (!$user->parent->isEmpty()) {
            $parent = User::find($user->parent[0]->id);
            $stake_ref_bonus = $stakePlan->amount * $stakePlan->ref_percent / 100;
            $stake_ref_earning = $parent->stake_ref_earning + $stake_ref_bonus;
            StakeReferral::create([
                'referral_id' => $user->id,
                'referee_id' => $parent->id,
                'referee_stake_ref_earning' => $parent->stake_ref_earning,
                'bonus' => $stake_ref_bonus,
            ]);
            $parent->update(['stake_ref_earning' => $stake_ref_earning]);
        }
        $stake_coupon->update(['status' => 1]);
        Notification::create([
            'user_id' => $user->id,
            'title' => 'RUBIC STAKE ACTIVATION SUCCESSFUL',
            'msg' => 'You have successfully activated a RUBIC STAKE PLAN',
            'is_read' => 0
        ]);
        return redirect()->route('user.stake_plans.history');
    }

    public function do_activate_tether(StakePlan $stakePlan)
    {
        require_once('app/paykassa/paykassa_sci.class.php'); //the plug-in class to work with SCI, you can download it at the link

        $setting = Setting::first();
        $paykassa_merchant_id = env('MERCHANT_ID');                 // the ID of the merchant
        $paykassa_merchant_password = env('MERCHANT_PASS');     // merchant password
        $test = false;                                              // False test mode - off, True - Enabled


        $user = User::with('parent')->whereId(auth()->user()->id)->first();
        // return $user;
        if(!$user->tether_network) {
            return back()->with('error', 'Please set your Tether USDT Wallet Address and Network before attempting to Activate STAKE PLAN');
        }
        $amount = $stakePlan->amount / $setting->ngn_rate;
        $system = $user->tether_network;
        $currency = 'USDT';
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $order_id = substr(str_shuffle($data), 0, 16);
        $comment = 'User activating Rubic Stake Plan!';


        $paykassa = new PayKassaSCI(
            $paykassa_merchant_id,
            $paykassa_merchant_password,
            $test
        );
        // return json_encode($paykassa);

        $system_id = [
            "bitcoin" => 11, // supported currencies BTC    
            "ethereum" => 12, // supported currencies ETH    
            "litecoin" => 14, // supported currencies LTC    
            "dogecoin" => 15, // supported currencies DOGE    
            "dash" => 16, // supported currencies DASH    
            "bitcoincash" => 18, // supported currencies BCH    
            "zcash" => 19, // supported currencies ZEC    
            "ripple" => 22, // supported currencies XRP    
            "tron" => 27, // supported currencies TRX    
            "stellar" => 28, // supported currencies XLM    
            "binancecoin" => 29, // supported currencies BNB    
            "trc" => 30, // supported currencies USDT    
            "bep" => 31, // supported currencies USDT, BUSD, USDC, ADA, EOS, BTC, ETH, DOGE    
            "erc" => 32, // supported currencies USDT    
        ];

        $res = $paykassa->sci_create_order_get_data(
            $amount,    // required parameter the payment amount example: 1.0433
            $currency,  // mandatory parameter, currency, example: BTC
            $order_id,  // mandatory parameter, the unique numeric identifier of the payment in your system, example: 150800
            $comment,   // mandatory parameter, text commentary of payment example: service Order #150800
            $system_id[$system] // a required parameter, for example: 12 - Ethereum
        );
        // return json_encode($res);

        if ($res['error']) {        // $res['error'] - true if the error
            return $res['message'];   // $res['message'] - the text of the error message
            // actions in case of an error
        } else {
            $invoice = $res['data']['invoice'];     // The operation number in the system Paykassa.pro
            $order_id = $res['data']['order_id'];   // The order in the merchant
            $wallet = $res['data']['wallet'];       // Address for payment
            $amount = $res['data']['amount'];       // The amount to be paid may change if the Board is translated into a client
            $system = $res['data']['system'];       // A system in which the billed
            $url = $res['data']['url'];             // The link to proceed for payment
            $tag = $res['data']['tag'];             // Tag to indicate the translation to ripple

            UserStakePlan::create([
                'user_id' => $user->id,
                'stake_plan_id' => $stakePlan->id,
                'status' => 1,
                'stake_profit' => 0,
                'next_update_time' => Carbon::now()->addDay(),
                // 'next_update_time' => Carbon::now()->addMinute(),
                // 'remaining_days' => 10
                'remaining_days' => $stakePlan->duration
            ]);
            if (!$user->parent->isEmpty()) {
                $parent = User::find($user->parent[0]->id);
                $stake_ref_bonus = $stakePlan->amount * $stakePlan->ref_percent / 100;
                $stake_ref_earning = $parent->stake_ref_earning + $stake_ref_bonus;
                StakeReferral::create([
                    'referral_id' => $user->id,
                    'referee_id' => $parent->id,
                    'referee_stake_ref_earning' => $parent->stake_ref_earning,
                    'bonus' => $stake_ref_bonus,
                ]);
                $parent->update(['stake_ref_earning' => $stake_ref_earning]);
            }
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE ACTIVATION SUCCESSFUL',
                'msg' => 'You have successfully activated a RUBIC STAKE PLAN',
                'is_read' => 0
            ]);

            return redirect($url);
        }
    }

    public function convert(Request $request)
    {
        $converts = StakeEarningConvert::with('user')->get();
        return view('user.stake_plans.convert', compact('converts'));
    }

    public function do_convert(Request $request)
    {
        // return $request;
        $user = User::with('completed_stake_plans')->find(auth()->user()->id);
        $pin = implode('', $request->pins);
        if ($pin === '000000') {
            return back()->with('error', 'You cannot use the default PIN 000000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($pin !== $user->pin) {
            return back()->with('error', 'Pin is not same.');
        }
        $user_stake_profit = $user->stake_profit;
        if ($request->amount >= $user_stake_profit) {
            return back()->with('error', 'Your Stake profit balance is less than the requested amount!');
        }
        $min_stake_profit_transfer = $user->completed_stake_plans->min('stake_profit_transfer');
        if ($min_stake_profit_transfer > $request->amount) {
            return back()->with('error', 'You have requested less amount to transfer to Stake Wallet');
        }
        $res = StakeEarningConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if ($res) {
            $user->update([
                'rubic_stake_wallet' => $user->rubic_stake_wallet + $request->amount,
                'stake_profit' => $user->stake_profit - $request->amount
            ]);
            Notification::create([
                'user_id' => $user->id,
                'title' => 'RUBIC STAKE PROFIT Transfer to STAKE WALLET',
                'msg' => 'You transferred NGN' . $request->amount . ' from your RUBIC STAKE PROFIT to your Rubic STAKE WALLET',
                'is_read' => 0
            ]);
            return redirect()->route('user.stake_referrals.convert')->with('success', 'Stake Referral profit is converted to Rubic Wallet Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
