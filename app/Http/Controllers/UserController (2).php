<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\Bank;
use App\Models\Blog;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\DataOperator;
use App\Models\DataWithdraw;
use App\Models\Plans;
use App\Models\Gateway;
use App\Models\Deposits;
use App\Models\Withdraw;
use App\Models\Withdrawm;
use App\Models\Profits;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Referral;
use App\Models\Earning;
use App\Models\Etemplate;
use App\Models\PaymentProof;
use App\Models\Transfer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Image;




class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['val'] = Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->limit(1)->first();
        $data['profit'] = Profits::whereUser_id(Auth::user()->id)->orderBy('id', 'DESC')->limit(5)->get();
        $data['ticket_replies'] = Ticket::with(['latest_replies' => function ($query) {
            $query->where('is_seen', 0);
        }])->where('user_id', auth::user()->id)->where('status', 0)->get();
        // $data['user_proof'] = auth()->user()->show_popup;
        // return $data['user_proof'];
        return view('user.index', $data);
    }

    public function referral()
    {
        $data['title'] = 'Referral';
        $data['referral'] = Referral::with('user')->whereRef_id(Auth::user()->id)->get();
        // foreach ($data['referral'] as $key => $value) {
        //     $value->indirect_referrals = Referral::with('user')->whereRef_id($value->user_id)->get();
        // }
        $data['earning'] = Earning::whereReferral(Auth::user()->id)->get();
        return view('user.referral', $data);
    }

    public function ticket()
    {
        $data['title'] = 'Tickets';
        $data['ticket'] = Ticket::whereUser_id(Auth::user()->id)->get();
        return view('user.ticket', $data);
    }

    public function plans()
    {
        $data['title'] = 'GoldMint Coin Mining';
        // $data['plan'] = Plans::whereStatus(1)->orderBy('min_deposit', 'DESC')->get();
        $data['profit'] = Profits::whereUser_id(auth()->user()->id)->orderBy('id', 'DESC')->get();
        $data['latest_mine'] = Profits::whereUser_id(auth()->user()->id)->where('status', 0)->latest('id')->first();
        return view('user.plans', $data);
    }

    public function fund()
    {
        $data['title'] = 'Fund account';
        $data['gateways'] = Gateway::whereStatus(1)->orderBy('id', 'DESC')->get();
        $data['deposits'] = Deposits::whereUser_id(Auth::user()->id)->latest()->get();
        return view('user.fund', $data);
    }

    public function share()
    {
        $data['title'] = 'Transfer';
        $data['share'] = Transfer::where('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $set = $data['set'] = Settings::first();
        $data['transfer_fee'] = $set->transfer_fee;
        return view('user.share', $data);
    }

    public function sharesubmit(Request $request)
    {
        $set = $data['set'] = Settings::first();
        $user = $data['user'] = User::with(['transfers' => function ($query) {
            $query->whereMonth('created_at', Carbon::now()->month);
        }])->find(Auth::user()->id);
        // return $user->transfers[];
        $kex = User::whereUsername($request->username)->get();
        if (!empty($user->transfers)) {
            $this_month_amount = $user->transfers->sum('amount');
            if (($this_month_amount + $request->amount) > $set->max_transfer) {
                return back()->with('alert', 'You can only share NGN 1000.');
            }
        }
        if ($request->amount > $set->max_transfer) {
            return back()->with('alert', 'You can only share NGN 1000.');
        }
        // if() {
        //     return back()->with('alert', 'You can only share NGN 1000.');
        // }
        $amount = $request->amount - ($request->amount * $set->transfer_fee / 100);
        // return $amount;
        if (count($kex) > 0) {
            if ($user->balance > $request->amount || $user->balance == $request->amount) {
                $receiver = User::whereUsername($request->username)->first();
                if ($user->pin == $request->pin) {
                    if ($user->id != $receiver->id) {
                        $sav['sender_id'] = Auth::user()->id;
                        $sav['receiver_id'] = $receiver->id;
                        $sav['amount'] = $amount;
                        $sav['ref_id'] = str_random(16);
                        Transfer::create($sav);
                        $user->balance = $user->balance - $request->amount;
                        $user->save();
                        $receiver->balance = $receiver->balance + $amount;
                        $receiver->save();
                        return back()->with('success', 'Transaction successful.');
                    } else {
                        return back()->with('alert', 'Invalid username.');
                    }
                } else {
                    return back()->with('alert', 'Invalid pin.');
                }
            } else {
                return back()->with('alert', 'Insufficent balance.');
            }
        } else {
            return back()->with('alert', 'Invalid username.');
        }
    }

    public function changePassword()
    {
        $data['title'] = "Security";
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $set = Settings::first();
        $user = User::find(Auth::user()->id);
        if ($user->fa_status) {
            $secret = $user->googlefa_secret;
        } else {
            $secret = $g->generateSecret();
        }
        // return $secret;
        $site = $set->site_name;
        $data['secret'] = $secret;
        $data['image'] = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($user->email, $secret, $site);
        return view('user.password', $data);
    }

    public function changePin()
    {
        $data['title'] = "Change Pin";
        return view('user.pin', $data);
    }

    public function profile()
    {
        $data['title'] = "Profile";
        $data['banks'] = Bank::whereStatus(1)->get();
        $data['data_operators'] = DataOperator::whereStatus(1)->get();
        return view('user.profile', $data);
    }

    public function Replyticket($id)
    {
        $data['ticket'] = $ticket = Ticket::find($id);
        $data['title'] = '#' . $ticket->ticket_id;
        $data['reply'] = Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('user.reply-ticket', $data);
    }

    public function message_seen(Request $request)
    {
        $replies = Reply::whereTicket_id($request->ticket_id)->get();
        foreach ($replies as $reply) {
            $reply->is_seen = 1;
            $reply->save();
        }
        return 1;
    }

    public function change_email(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        $res = $user->save();
        if ($res) {
            return json_encode(['status' => true]);
        } else {
            return json_encode(['status' => false]);
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = rand(100000, 999999);
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, 'Your Verification Code is ' . $code);

            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('user.dashboard');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }

    public function Destroyticket($id)
    {
        $data = Ticket::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function submitticket(Request $request)
    {
        $user = $data['user'] = User::find(Auth::user()->id);
        $sav['user_id'] = Auth::user()->id;
        $sav['subject'] = $request->subject;
        $sav['priority'] = $request->category;
        $sav['message'] = $request->details;
        $sav['ticket_id'] = round(microtime(true));
        $sav['status'] = 0;
        Ticket::create($sav);
        return back()->with('success', 'Ticket Submitted Successfully.');
    }

    public function submitreply(Request $request)
    {
        $sav['reply'] = $request->details;
        $sav['ticket_id'] = $request->id;
        $sav['status'] = 1;
        Reply::create($sav);
        $data = Ticket::whereTicket_id($request->id)->first();
        $data->status = 0;
        $data->save();
        return back()->with('success', 'Message sent!.');
    }


    public function data_withdraw()
    {
        $user = User::with('data_operator')->whereId(auth()->user()->id)->first();
        $data['title'] = 'Data Withdraw';
        $data['data_withdraw'] = DataWithdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data_operator_name = $user->data_operator !== null ? $user->data_operator->name : 'N/A';
        $data['account'] = [
            'account_no' => $user->phone_number,
            'account' => $user->phone_number . ' - ' . $data_operator_name
        ];
        return view('user.data_withdraw', $data);
    }

    public function getCouponCode()
    {
        $set = Settings::first();
        if ($set->is_testing) {
            return back()->with('alert', 'You cannot access this page.');
        }
        $user = User::with('bank')->whereId(auth()->user()->id)->first();
        $data['title'] = 'GET ACTIVATION CODE';
        $data['coupons'] = Coupons::with('user')->whereUser_id($user->id)->latest()->get();
        return view('user.getcouponcode', $data);
    }

    public function getCouponCodesubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pin' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $data['title'] = 'GET ACTIVATION CODE';
            $data['coupons'] = Coupons::with('user')->whereUser_id($user->id)->latest()->get();
            $data['errors'] = $validator->errors();
            return view('user.getcouponcode', $data);
        }
        if ($request->pin === '0000') {
            return back()->with('alert', 'You cannot use the default PIN 0000 to perform transactions, please go to the Account Security Page to have your PIN RESET.');
        }
        if ($request->pin !== $user->pin) {
            return back()->with('alert', 'Pin is not same.');
        }
        $set = Settings::first();
        if ($set->coupon_code_rate > $user->balance) {
            return back()->with('alert', 'Your mine balance is less than the fee.');
        }
        $plan = Plans::whereHas('user', function ($q) use ($user) {
            $q->where('users.id', $user->id);
        })->whereStatus(1)->first();
        if ($plan->id != 10) {
            return back()->with('alert', 'ACTIVATION CODE generation can only be done by PANGOLIN PLAN Users. Kindly UPGRADE your account to the PANGOLIN PLAN.');
        }
        $this_month_coupons = Coupons::whereUser_id($user->id)->whereMonth('created_at', Carbon::now()->month)->count();
        if ($this_month_coupons >= $set->monthly_coupon_limit) {
            return back()->with('alert', 'You can only create generate ' . $set->monthly_coupon_limit . ' Activation Code once in month.');
        }
        $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $now = Carbon::now();
        $plan = Plans::find(6);
        $data = [
            'serial' => $plan->code_prefix . substr(str_shuffle($chars), 0, $plan->code_length - 4),
            'plan_id' => $plan->id,
            'status' => 'active',
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now
        ];
        Coupons::insert($data);
        $user->balance -= $set->coupon_code_rate;
        $user->save();
        Session::flash('success', 'Activation PIN Code successfully generated!');
        return redirect()->route('user.get_coupon_code');
    }


    public function userDataUpdate($id)
    {
        $data = Deposits::wheresecret($id)->first();
        if ($data->status == 0) {
            $currency = Currency::whereStatus(1)->first();
            $data['status'] = 1;
            $data->update();
            $user = User::find($data->user_id);
            $user['balance'] = $user->balance + $data->btc_amo;
            $user->update();
            $txt = $data->btc_amo . 'BTC Deposited Successfully Via ' . $data->gateway->name;
            return redirect()->route('user.fund')->with('success', 'Payment was successful!');
        } else {
            return redirect()->route('user.fund')->with('alert', 'Already verified!');
        }
    }

    public function fundsubmit(Request $request)
    {
        $gate = Gateway::where('id', $request->gateway)->first();
        $user = User::find(Auth::user()->id);
        if ($gate->minamo <= $request->amount && $gate->maxamo >= $request->amount) {
            $charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
            $usdamo = ($request->amount + $charge) / $gate->rate;
            $usdamo = round($usdamo, 2);
            $trx = round(microtime(true));
            $depo['user_id'] = Auth::id();
            $depo['gateway_id'] = $gate->id;
            $depo['amount'] = $request->amount + $charge;
            $depo['charge'] = $charge;
            $depo['usd'] = round($usdamo, 2);
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = str_random(16);
            $depo['secret'] = str_random(8);
            $depo['try'] = 0;
            $depo['status'] = 0;
            Deposits::create($depo);
            Session::put('Track', $depo['trx']);
            return redirect()->route('user.preview');
        } else {
            return back()->with('alert', 'Please Follow Deposit Limit');
        }
    }

    public function depositpreview()
    {
        $track = Session::get('Track');
        $data['title'] = 'Deposit Preview';
        $data['gate'] = Deposits::where('status', 0)->where('trx', $track)->first();
        return view('user.preview', $data);
    }

    public function calculate(Request $request)
    {
        $plan = Plans::find($request->plan_id);
        $duration = $plan->duration . ' ' . $plan->period;
        $profit = $request->amount * ($plan->percent / 100) * castrotime($duration);
        if ($request->amount > $plan->min_deposit || $request->amount == $plan->min_deposit) {
            if ($request->amount < $plan->amount  || $request->amount == $plan->amount) {
                return back()->with('success', $profit . 'BTC');
            } else {
                return back()->with('alert', 'value is greater than maximum deposit');
            }
        } else {
            return back()->with('alert', 'value is less than minimum deposit');
        }
    }

    public function buy(Request $request)
    {
        $plan = $data['plan'] = Plans::Where('id', $request->plan)->first();
        $user = User::find(Auth::user()->id);
        $set = Settings::find(1);
        if ($user->balance > $request->amount || $user->balance == $request->amount) {
            if ($request->amount > $plan->min_deposit || $request->amount == $plan->min_deposit) {
                if ($request->amount < $plan->amount  || $request->amount == $plan->amount) {
                    $sav['user_id'] = Auth::user()->id;
                    $sav['plan_id'] = $request->plan;
                    $sav['amount'] = $request->amount;
                    $sav['profit'] = 0;
                    $sav['status'] = 1;
                    $sav['end_date'] = 0;
                    $sav['date'] = Carbon::now();
                    $sav['trx'] = str_random(16);
                    Profits::create($sav);
                    $a = $user->balance - $request->amount;
                    $user->balance = $a;
                    $user->save();
                    if ($set->referral == 1) {
                        $kex = Referral::whereUser_id(Auth::user()->id)->get();
                        if (count($kex) > 0) {
                            $ref_amount = ($request->amount * $plan->ref_percent) / 100;
                            $key = Referral::whereUser_id(Auth::user()->id)->first();
                            $user_update = User::whereId($key->ref_id)->first();
                            $user_update->ref_bonus = $user_update->ref_bonus + $ref_amount;
                            $user_update->save();
                            $ref['user_id'] = Auth::user()->id;
                            $ref['referral'] = $key->ref_id;
                            $ref['amount'] = $ref_amount;
                            Earning::create($ref);
                        }
                    }
                    return back()->with('success', 'Plan was successfully purchased, scroll down to watch your daily earnings');
                } else {
                    return back()->with('alert', 'value is greater than maximum deposit');
                }
            } else {
                return back()->with('alert', 'value is less than minimum deposit');
            }
        } else {
            return back()->with('alert', 'Insufficient Funds, please fund your account');
        }
    }


    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {
                if ($request->password == $request->password_confirmation) {
                    $password = Hash::make($request->password);
                    $user->password = $password;
                    $user->save();
                    return back()->with('success', 'Password Changed Successfully.');
                } else {
                    return back()->with('alert', 'New Password Does Not Match.');
                }
            } else {
                return back()->with('alert', 'Current Password Not Match.');
            }
        } catch (\PDOException $e) {
            return back()->with('alert', $e->getMessage());
        }
    }

    public function do_reactivate_account(Request $request)
    {
        $coupon_code = Coupons::with('plan')->where('serial', $request->coupon)->first();
        if (!$coupon_code) {
            Session::flash('error', 'COUPON CODE INVALID');
            return redirect()->route('reactivate_account');
        }
        if ($coupon_code->status == 'inactive') {
            Session::flash('error', 'COUPON CODE used');
            return redirect()->route('reactivate_account');
        }
        $user = User::findOrFail(Auth::user()->id);
        $direct_upline = Referral::where('user_id', $user->id)->first();
        if ($direct_upline) {
            return 'if';
            $main = User::with('parent_reference')->whereId($direct_upline->id)->first();
            // return $coupon_code->plan->id;
            // return $main;
            // if ($coupon_code->plan->id === 10) {
            //     $main->is_selfcashout = $main->is_selfcashout + 1;
            // }
            $ref_bonus = $main->ref_bonus + ($coupon_code->plan->upgrade * $coupon_code->plan->ref_percent / 100);
            $main->ref_bonus = $ref_bonus;
            $main->save();
            if (!$main->parent_reference->isEmpty()) {
                $parent = User::find($main->parent_reference[0]->id);
                $ref_bonus = $parent->ref_bonus + ($coupon_code->plan->upgrade * $coupon_code->plan->indirect_ref_com / 100);
                $parent->ref_bonus = $ref_bonus;
                $parent->save();
            }
        }
        // return $coupon_code;
        $user->coupon = $request->coupon;
        $user->is_expired = 0;
        $user->activated_at = date('Y-m-d');
        $user->save();
        $coupon_code->update(['status' => 'inactive']);
        Session::flash('success', 'Plan upgraded Successfully.');
        return redirect()->route('reactivate_account');
    }

    public function submit2fa(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret = $request->vv;
        if ($request->type == 0) {
            $check = $g->checkcode($secret, $request->code, 3);
            // return json_encode($check);
            if ($check) {
                $user->fa_status = 0;
                $user->googlefa_secret = null;
                $user->save();
                return back()->with('success', '2fa disabled.');
            } else {
                return back()->with('alert', 'Invalid code.');
            }
        } else {
            $check = $g->checkcode($secret, $request->code, 3);
            if ($check) {
                $user->fa_status = 1;
                $user->googlefa_secret = $request->vv;
                $user->save();
                return back()->with('success', '2fa enabled.');
            } else {
                return back()->with('alert', 'Invalid code.');
            }
        }
    }

    public function reactivate_account()
    {
        $data['title'] = 'Reactivate Account';
        return view('user.reactivate_account', $data);
    }

    public function resolve_account_number(Request $request)
    {
        $response = resolve_account_number($request->account_number, $request->bank_id);
        // return $response->data->account_name;
        if ($response->data) {
            return json_encode([
                'status' => 1,
                'name' => $response->data->account_name
            ]);
        } else {
            return json_encode([
                'status' => 0,
            ]);
        }
    }
    public function test()
    {
        return 'tst';
    }
}
