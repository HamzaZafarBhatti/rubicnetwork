<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\GeneralEmail;
use App\Models\Etemplate;
use App\Models\Faq;
use App\Models\Post;
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
        return view('front.about_us');
    }
    public function rubic_staking()
    {
        return view('front.rubic_staking');
    }
    public function rubic_network()
    {
        return view('front.rubic_network');
    }
    public function terms_condition()
    {
        return view('front.terms_condition');
    }
    public function privacy_policy()
    {
        return view('front.privacy_policy');
    }
    public function pin_verification()
    {
        return view('front.pin_verification');
    }
    public function cookies_policy()
    {
        return view('front.cookies_policy');
    }
    public function contact_us()
    {
        return view('front.contact_us');
    }
    public function send_email(Request $request)
    {
        $temp = Etemplate::first();
        $name = $request->from_first_name.' '.$request->from_last_name;
        // Mail::to($temp->esender)->send(new ContactEmail($request->from_email, $name, $request->msg, $request->subject));
        Mail::to('hamza0952454@gmail.com')->send(new ContactEmail($request->from_email, $name, $request->msg, $request->subject));
        return back()->with('success', 'Email has been sent!');
    }
    public function top_earners()
    {
        return view('front.top_earners');
    }
    public function payment_proof()
    {
        return view('front.payment_proof');
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
        return view('front.disclaimer');
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
}
