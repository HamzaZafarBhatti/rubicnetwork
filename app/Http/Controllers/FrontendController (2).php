<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Earners;
use App\Models\Review;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Contact;
use App\Models\Coupons;
use App\Models\PaymentProof;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{

    public function __construct()
    {
    }


    public function index()
    {
        $data['title'] = "Home";
        $users = User::latest()->take(5)->get();
        foreach ($users as $user) {
            $coupon = Coupons::with('plan')->where('serial', $user->coupon)->first();
            $user->plan = $coupon ? $coupon->plan->name : 'N/A';
        }
        $data['registrations'] = $users;
        $data['withdraws'] = Withdraw::with('user')->whereStatus(1)->latest()->take(5)->get();
        $self_cashouts = DB::table('self_cashout_history')->whereStatus(1)->latest()->take(5)->get();
        foreach ($self_cashouts as $cashout) {
            $cashout->user = User::whereId($cashout->user_id)->first();
        }
        $data['self_cashouts'] = $self_cashouts;
        return view('front.index', $data);
    }

    public function topearners()
    {
        $data['title'] = "Top Earners";
        $data['topearners'] = Earners::orderBy('amount', 'DESC')->take(50)->get();
        return view('front.topearners', $data);
    }

    public function coupon()
    {
        $data['title'] = "Activation PIN Code Dispatchers";
        return view('front.coupon', $data);
    }


    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);
        $sav['full_name'] = $request->name;
        $sav['email'] = $request->email;
        $sav['mobile'] = $request->mobile;
        $sav['message'] = $request->message;
        $sav['seen'] = 0;
        Contact::create($sav);
        return back()->with('success', ' Message was successfully sent!');
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $macCount = Subscriber::where('email', $request->email)->count();
        if ($macCount > 0) {
            return back()->with('alert', 'This Email Already Exist !!');
        } else {
            Subscriber::create($request->all());
            return back()->with('success', ' Subscribe Successfully!');
        }
    }

    public function do_verify_pin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            Session::flash('error', 'Please enter the ACTIVATION PIN CODE');
            return redirect()->route('verify_pin');
        }
        $coupon = Coupons::with('plan')->where('serial', $request->coupon)->first();
        if (!$coupon) {
            Session::flash('error', 'ACTIVATION PIN CODE INVALID');
            return redirect()->route('verify_pin');
        }
        if ($coupon->status == 'inactive') {
            // adding an extra field 'error'...
            $user = User::with(['parent_reference' => function ($query) {
                $query->where('is_direct', '1');
            }])->where('coupon', $request->coupon)->first();
            // return $user;
            if($user) {
                $user->coupon = $coupon;
            }
            // Session::flash('warning', 'ACTIVATION PIN code is already used by user "' . $user->username . '"');
            $data['title'] = "Verify pin";
            $data['verify_pin_user'] = $user;
            // return $user;
            return view('front.verify_pin', $data);
            // return redirect()->route('verify_pin');
        } else {
            Session::flash('success', 'ACTIVATION PIN code is valid and can be used');
            return redirect()->route('verify_pin');
        }
    }
}
