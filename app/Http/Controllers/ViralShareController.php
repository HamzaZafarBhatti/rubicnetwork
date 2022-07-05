<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Plan;
use App\Models\Post;
use App\Models\PostUser;
use App\Models\Setting;
use App\Models\User;
use App\Models\ViralShareConvert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViralShareController extends Controller
{
    //
    public function index()
    {
        $post = Post::where('status', 1)->whereDate('post_date', Carbon::now())->first();
        return view('user.viral_shares.index', compact('post'));
    }

    public function earn($id)
    {
        $user = auth()->user();
        $user = User::with('plan')->find($user->id);
        $user->update(['viral_share_earning' => $user->viral_share_earning + $user->plan->viral_share_bonus]);
        PostUser::create([
            'user_id' => $user->id,
            'post_id' => $id,
            'bonus' => $user->plan->viral_share_bonus
        ]);
        return redirect()->route('user.viral_shares.history')->with('success', "You have successfully earned from today's VIRAL SHARE. You can now go back to your dashboard to continue to earn from other social activities which RubicNetwork offers.");
        // $data['is_shared'] = false;
        // if (auth()->user()) {
        //     $user_shared_post = Post::whereHas('users', function ($q) {
        //         $q->where('users.id', auth()->user()->id);
        //     })->where('id', $id)->first();
        //     $data['is_shared'] = $user_shared_post !== null ? true : false;
        // }
        // $data['post'] = Post::find($id);
        // $html = view('front.partial_single_post', $data)->render();
        // return json_encode(array('status' => '1', 'html_text' => $html));
    }

    public function history()
    {
        $shares = PostUser::with('post')->where('user_id', auth()->user()->id)->get();
        // return $shares;
        return view('user.viral_shares.history', compact('shares'));
    }

    public function convert()
    {
        $converts = ViralShareConvert::with('user')->where('user_id', auth()->user()->id)->get();
        return view('user.viral_shares.convert', compact('converts'));
    }

    public function do_convert(Request $request)
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
        if(!$set->viral_share_transfer) {
            return back()->with('error', 'You cannot transfer viral share Profit to Rubic Wallet!');
        }
        if($request->amount > $user->viral_share_earning) {
            return back()->with('error', 'You viral share profit balance is less than the requested amount!');
        }
        $now = Carbon::now();
        $start = Carbon::parse($set->viral_share_transfer_start);
        $end = Carbon::parse($set->viral_share_transfer_end);
        if(($start > $now) || ($end < $now)) {
            return back()->with('error', 'You  can only transfer Viral Share Profit to Rubic Wallet from '.$start->format('l jS \\of F Y h:i:s A').' to '.$end->format('l jS \\of F Y h:i:s A'));
        }
        $res = ViralShareConvert::create([
            'user_id' => $user->id,
            'amount' => $request->amount
        ]);
        if($res) {
            $user->update([
                'rubic_wallet' => $user->rubic_wallet + $request->amount,
                'viral_share_earning' => $user->viral_share_earning - $request->amount
            ]);
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Viral Share Earnings Transfer',
                'msg' => 'You transferred NGN' . $request->amount . ' from your Viral Share Earnings to your Rubic Wallet',
                'is_read' => 0
            ]);
            return redirect()->route('user.viral_shares.convert')->with('success', 'Viral Share profit is converted to Rubic Wallet');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
