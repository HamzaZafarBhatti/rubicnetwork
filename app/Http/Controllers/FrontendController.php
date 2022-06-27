<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\GeneralEmail;
use App\Models\About;
use App\Models\Coupon;
use App\Models\Etemplate;
use App\Models\Faq;
use App\Models\PaymentProof;
use App\Models\Post;
use App\Models\StakeCoupon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('front.index');
    }
    public function about_us()
    {
        $about = About::findOrFail(1);
        $about_us = $about->about;
        return view('front.about_us', compact('about_us'));
    }
    public function rubic_staking()
    {
        $about = About::findOrFail(1);
        $rubic_staking = $about->rubic_staking;
        return view('front.rubic_staking', compact('rubic_staking'));
    }
    public function rubic_network()
    {
        $about = About::findOrFail(1);
        $rubic_network = $about->rubic_network;
        return view('front.rubic_network', compact('rubic_network'));
    }
    public function terms_condition()
    {
        $about = About::findOrFail(1);
        $term = $about->terms;
        return view('front.terms_condition', compact('term'));
    }
    public function privacy_policy()
    {
        $about = About::findOrFail(1);
        $privacy = $about->privacy_policy;
        return view('front.privacy_policy', compact('privacy'));
    }
    public function pin_verification()
    {
        return view('front.pin_verification');
    }
    public function cookies_policy()
    {
        $about = About::findOrFail(1);
        $cookie_policy = $about->cookie_policy;
        return view('front.cookies_policy', compact('cookie_policy'));
    }
    public function contact_us()
    {
        return view('front.contact_us');
    }
    public function send_email(Request $request)
    {
        $temp = Etemplate::first();
        $name = $request->from_first_name . ' ' . $request->from_last_name;
        Mail::to($temp->esender)->send(new ContactEmail($request->from_email, $name, $request->msg, $request->subject));
        // Mail::to('hamza0952454@gmail.com')->send(new ContactEmail($request->from_email, $name, $request->msg, $request->subject));
        return back()->with('success', 'Email has been sent!');
    }
    public function top_earners()
    {
        return view('front.top_earners');
    }
    public function payment_proof()
    {
        $proofs = PaymentProof::with('user')->where('status', '1')->latest()->simplePaginate(10);
        return view('front.payment_proof', compact('proofs'));
    }
    public function faq()
    {
        $faqs = Faq::latest()->get();
        return view('front.faq', compact('faqs'));
    }
    public function pin_dispatchers()
    {
        return view('front.pin_dispatchers');
    }
    public function disclaimer()
    {
        $about = About::findOrFail(1);
        $disclaimer = $about->disclaimer;
        return view('front.disclaimer', compact('disclaimer'));
    }
    public function sponsored_post()
    {
        $posts = Post::where('status', 1)->get();
        $popular_posts = Post::where('status', 1)->orderBy('created_at', 'desc')->orderBy('views', 'desc')->limit(3)->get();
        return view('front.sponsored_post', compact('posts', 'popular_posts'));
    }
    public function article($id)
    {
        // return auth()->user();
        $post = $data['post'] = Post::with('category')->whereId($id)->first();
        $post->update(['views' => $post->views + 1]);
        $data['title'] = $data['post']->title;
        $data['is_shared'] = true;
        if (auth()->user()) {
            $user_shared_post = Post::whereHas('users', function ($q) {
                $q->where('users.id', auth()->user()->id);
            })->where('id', $id)->first();
            $data['is_shared'] = $user_shared_post !== null ? true : false;
        }
        return view('front.single_post', $data);
    }

    public function test_email()
    {
        $verification_code = rand(100000, 999999);
        $text = "Your Email Verification Code Is: $verification_code";
        // send_email($user->email, $user->name, 'Email verification', $text);
        $temp = Etemplate::first();
        Mail::to('hamza0952454@gmail.com')->send(new GeneralEmail($temp->esender, 'Hamza Bhatti', $text, 'Email verification'));
    }

    public function confirm_code(Request $request)
    {
        // return $request;
        if (!$request->type) {
            return back()->with('error', 'Code Type is not selected! Please select one.');
        }
        $type = $request->type;
        $username = 'N/A';
        $name = 'N/A';
        $referral = 'N/A';
        if ($type == 'network') {
            $coupon = Coupon::with('plan', 'user')->where('serial', $request->code)->first();
            if (!$coupon) {
                return redirect()->route('verify_pin')->with('error', 'INVALID NETWORK CODE');
            }
            if ($coupon->user) {
                $user = User::with('parent')->find($coupon->user->id);
                // return $user;
                $username = $user->username;
                $name = $user->name;
                if (!$user->parent->isEmpty()) {
                    $parent = User::find($user->parent[0]->id);
                    $referral = $parent->username;
                }
            }
        } else {
            $coupon = StakeCoupon::with('plan', 'user_stake_plan')->where('serial', $request->code)->first();
            // return $coupon;
            if (!$coupon) {
                return redirect()->route('verify_pin')->with('error', 'INVALID STAKE CODE');
            }
            if ($coupon->user_stake_plan) {
                $user = User::with('parent')->find($coupon->user_stake_plan->user_id);
                // return $user;
                $username = $user->username;
                $name = $user->name;
                if (!$user->parent->isEmpty()) {
                    $parent = User::find($user->parent[0]->id);
                    $referral = $parent->username;
                }
            }
        }
        if ($coupon->status) {
            $data = [
                'status' => 'Disabled',
                'username' => $username,
                'name' => $name,
                'date_used' => Carbon::parse($coupon->updated_at)->toFormattedDateString(),
                'plan' => $coupon->plan->name,
                'referral' => $referral
            ];
            $html_text = "<h6>STATUS: <small>" . $data['status'] . "</small></h6><h6>USERNAME: <small>" . $data['username'] . "</small></h6><h6>NAME: <small>" . $data['name'] . "</small></h6><h6>DATE USED: <small>" . $data['date_used'] . "</small></h6><h6>PLAN: <small>" . $data['plan'] . "</small></h6><h6>REFERRAL: <small>" . $data['referral'] . "</small></h6>";
            return redirect()->route('front.pin_verification')->with('coupon_details', $html_text);
        } else {
            return redirect()->route('front.pin_verification')->with('success', 'ACTIVATION PIN code is valid and can be used');
        }
    }
}
