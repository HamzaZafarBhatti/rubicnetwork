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

    public function mark_read($id)
    {
        $noti = Notification::whereId($id)->first();
        $res = $noti->update(['is_read' => 1]);
        if($res) {
            return back()->with('success', 'The Notification is read!');
        } else {
            return back()->with('error', 'Error! Something went wrong');
        }
    }
}
