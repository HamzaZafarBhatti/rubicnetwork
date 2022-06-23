<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function user_notifications()
    {
        $noti = Notification::whereUserId(auth()->user()->id)->get();
        return view('user.notifications', compact('noti'));
    }
}
