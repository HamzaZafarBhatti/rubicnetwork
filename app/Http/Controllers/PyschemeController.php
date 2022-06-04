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

    public function Plans()
    {
        $data['title'] = 'Plans';
        $data['plan'] = Plans::all();
        return view('admin.py-scheme.plans', $data);
    }

    public function Create()
    {
        $data['title'] = 'Create plan';
        return view('admin.py-scheme.create', $data);
    }

    public function Store(Request $request)
    {
        $data['name'] = $request->name;
        $data['percent'] = $request->percent;
        $data['min_deposit'] = $request->min_amount;
        $data['amount'] = $request->max_amount;
        $data['duration'] = $request->duration;
        $data['upgrade'] = $request->upgrade;
        $data['period'] = $request->period;
        $data['ref_percent'] = $request->ref_percent;
        $data['status'] = $request->status;
        $data['hashrate'] = $request->hashrate;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.jpg';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
        }
        $res = Plans::create($data);
        if ($res) {
            return redirect()->route('admin.py.plans')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    }

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

    public function Destroy($id)
    {
        $data = Profits::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function PlanDestroy($id)
    {
        $data = Plans::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }

    public function Edit($id)
    {
        $plan = $data['plan'] = Plans::findOrFail($id);
        $data['title'] = $plan->name;
        return view('admin.py-scheme.edit', $data);
    }

    public function Update(Request $request)
    {
        // return $request;
        if(strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }
        $data = Plans::findOrFail($request->id);
        $data->name = $request->name;
        $data->percent = $request->percent;
        // $data->min_deposit = $request->min_amount;
        // $data->amount = $request->max_amount;
        $data->duration = $request->duration;
        $data->period = $request->period;
        $data->upgrade = $request->upgrade;
        $data->ref_percent = $request->ref_percent;
        $data->hashrate = $request->hashrate;
        $data->fb_share_amount = $request->fb_share_amount;
        $data->indirect_ref_com = $request->indirect_ref_com;
        $data->min_trade_profit_wd = $request->min_trade_profit_wd;
        $data->min_trade_profit_wd_cycle = $request->min_trade_profit_wd_cycle;
        $data->min_account_balance_wd = $request->min_account_balance_wd;
        $data->min_account_balance_wd_cycle = $request->min_account_balance_wd_cycle;
        $data->min_ref_earn_wd = $request->min_ref_earn_wd;
        $data->code_prefix = $request->code_prefix;
        $data->code_length = $request->code_length;
        $data->convert_rate = $request->convert_rate;
        $data->active_period = $request->active_period;
        $data->min_ref_earn_wd_cycle = $request->min_ref_earn_wd_cycle;
        $data->extraction_plan_time = $request->extraction_plan_time;
        if (empty($request->status)) {
            $data->status = 0;
        } else {
            $data->status = $request->status;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $data->image);
            $data['image'] = $filename;
        }
        $res = $data->save();
        if ($res) {
            return redirect()->route('admin.py.plans')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'An error occured');
        }
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
