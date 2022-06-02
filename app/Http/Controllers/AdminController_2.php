<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // $data['totalusers'] = User::count();
        // $data['blockedusers'] = User::whereStatus(1)->count();
        // $data['activeusers'] = User::whereStatus(0)->count();
        // $data['totalticket'] = Ticket::count();
        // $data['openticket'] = Ticket::whereStatus(0)->count();
        // $data['closedticket'] = Ticket::whereStatus(1)->count();
        // $data['totalreview'] = Review::count();
        // $data['pubreview'] = Review::whereStatus(1)->count();
        // $data['unpubreview'] = Review::whereStatus(0)->count();
        // $data['totaldeposit'] = Deposits::count();
        // $data['approveddep'] = Deposits::whereStatus(1)->count();
        // $data['declineddep'] = Deposits::whereStatus(2)->count();
        // $data['pendingdep'] = Deposits::whereStatus(0)->count();
        // $data['totalwd'] = Withdraw::count();
        // $data['approvedwd'] = Withdraw::whereStatus(1)->count();
        // $data['declinedwd'] = Withdraw::whereStatus(2)->count();
        // $data['pendingwd'] = Withdraw::whereStatus(0)->count();
        // $data['totalplan'] = Plans::count();
        // $data['appplan'] = Plans::whereStatus(1)->count();
        // $data['penplan'] = Plans::whereStatus(0)->count();
        // $data['totalprofit'] = Profits::count();
        // $data['appprofit'] = Profits::whereStatus(1)->count();
        // $data['penprofit'] = Profits::whereStatus(0)->count();
        // $data['messages'] = Contact::count();
        return view('admin.dashboard');
    }
}
