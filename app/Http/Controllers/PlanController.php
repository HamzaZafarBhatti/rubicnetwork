<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Plans';
        $plans = Plan::all();
        return view('admin.plans.index', compact('title', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Create plan';
        return view('admin.plans.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        if(strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }
        
        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $image_name = $filename;
        }

        $res = Plan::create([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'amount' => $request->amount,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'hashrate' => $request->hashrate,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'fb_share_amount' => $request->fb_share_amount,
            'indirect_ref_com' => $request->indirect_ref_com,
            'min_trade_profit_wd' => $request->min_trade_profit_wd,
            'min_trade_profit_wd_cycle' => $request->min_trade_profit_wd_cycle,
            'min_account_balance_wd' => $request->min_account_balance_wd,
            'min_account_balance_wd_cycle' => $request->min_account_balance_wd_cycle,
            'min_ref_earn_wd' => $request->min_ref_earn_wd,
            'min_ref_earn_wd_cycle' => $request->min_ref_earn_wd_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
            'convert_rate' => $request->convert_rate,
            'active_period' => $request->active_period,
            'extraction_plan_time' => $request->extraction_plan_time,
        ]);
        if ($res) {
            return redirect()->route('admin.plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
        $title = $plan->name;
        return view('admin.plans.edit', compact('title', 'plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
        // return $request;
        if(strlen($request->code_prefix) > 4) {
            return back()->with('alert', 'Prefix can only be 4 characters');
        }
        
        if (empty($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $image_name = $plan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $plan->image);
            $image_name = $filename;
        }
        $res = $plan->update([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'amount' => $request->amount,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'hashrate' => $request->hashrate,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'fb_share_amount' => $request->fb_share_amount,
            'indirect_ref_com' => $request->indirect_ref_com,
            'min_trade_profit_wd' => $request->min_trade_profit_wd,
            'min_trade_profit_wd_cycle' => $request->min_trade_profit_wd_cycle,
            'min_account_balance_wd' => $request->min_account_balance_wd,
            'min_account_balance_wd_cycle' => $request->min_account_balance_wd_cycle,
            'min_ref_earn_wd' => $request->min_ref_earn_wd,
            'min_ref_earn_wd_cycle' => $request->min_ref_earn_wd_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
            'convert_rate' => $request->convert_rate,
            'active_period' => $request->active_period,
            'extraction_plan_time' => $request->extraction_plan_time,
        ]);
        if ($res) {
            return redirect()->route('admin.plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
        $res =  $plan->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }
}
