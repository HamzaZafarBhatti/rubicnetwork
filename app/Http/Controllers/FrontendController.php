<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
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
        return view('front.faq');
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
        return view('front.sponsored_post');
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
}
