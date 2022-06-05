<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;


class PyschemeController extends Controller
{

    public function Pending()
    {
        $data['title'] = 'Pending investment';
        $data['profit'] = Profits::whereStatus(1)->orderBy('date', 'DESC')->get();
        return view('admin.py-scheme.pending', $data);
    }

    public function Completed()
    {
        $data['title'] = 'Completed investment';
        $data['profit'] = Profits::whereStatus(2)->latest()->get();
        return view('admin.py-scheme.completed', $data);
    }

}
