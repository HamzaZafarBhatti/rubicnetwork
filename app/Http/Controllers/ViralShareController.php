<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
}
