<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Post;
use App\Models\PostUser;
use App\Models\User;
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
}
