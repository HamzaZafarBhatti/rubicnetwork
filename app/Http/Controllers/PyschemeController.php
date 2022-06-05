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

    public function generate_coupons()
    {
        $plans = Plans::all();
        $coupons = Coupons::with('plan')->latest()->get();
        $title = 'Generate Coupons';
        return view('admin.py-scheme.generate_coupons', compact('plans', 'title', 'coupons'));
    }

    public function do_generate_coupons(Request $request)
    {
        // return $request;
        try {
            $qty = $request->quantity;
            $plan = Plans::find($request->plan_id);
            // return $plan;

            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $now = Carbon::now();
            for ($i = 0; $i < $qty; $i++) {
                $data[] = [
                    'serial' => $plan->code_prefix.substr(str_shuffle($chars), 0, $plan->code_length - 4),
                    'plan_id' => $request->plan_id,
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            $codes = array();
            foreach ($data as $val) {
                array_push($codes, $val['serial']);
            }
            // return $codes;
            Coupons::insert($data);
            Session::flash('success', 'Coupon Codes successfully generated!');
            Session::put('download_link', 'admin.plan.download_codes');
            Session::put('codes', json_encode($codes, JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
        return redirect()->route('admin.plan.generate_coupons');
    }
    public function download_codes(Request $request)
    {
        // return $request;
        $codes = Session::get('codes');
        Session::forget(['codes', 'download_link']);
        return response($codes)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="latest_codes.txt',
            ]);
    }
}
