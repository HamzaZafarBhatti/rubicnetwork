<?php

namespace App\Http\Controllers;

use App\Models\StakePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class StakePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Stake Plans';
        $plans = StakePlan::all();
        return view('admin.stake_plans.index', compact('title', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Create Stake Plan';
        return view('admin.stake_plans.create', compact('title'));
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
            $filename = 'stake_plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $image_name = $filename;
        }

        $res = StakePlan::create([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'min_deposit' => $request->min_deposit,
            'max_deposit' => $request->max_deposit,
            'return_capital' => $request->return_capital,
            'stake_profit_transfer' => $request->stake_profit_transfer,
            'stake_profit_transfer_cycle' => $request->stake_profit_transfer_cycle,
            'stake_wallet_wd' => $request->stake_wallet_wd,
            'stake_wallet_wd_cycle' => $request->stake_wallet_wd_cycle,
            'ref_earning_transfer' => $request->ref_earning_transfer,
            'ref_earning_transfer_cycle' => $request->ref_earning_transfer_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
        ]);
        if ($res) {
            return redirect()->route('admin.stake_plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Stake Plan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function show(StakePlan $stakePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function edit(StakePlan $stakePlan)
    {
        //
        $title = $stakePlan->name;
        return view('admin.stake_plans.edit', compact('title', 'plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StakePlan $stakePlan)
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
        $image_name = $stakePlan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'stake_plan_' . time() . '.png';
            $location = 'asset/images/' . $filename;
            Image::make($image)->save($location);
            $path = './asset/images/';
            File::delete($path . $stakePlan->image);
            $image_name = $filename;
        }
        $res = $stakePlan->update([
            'name' => $request->name,
            'percent' => $request->percent,
            'duration' => $request->duration,
            'period' => $request->period,
            'status' => $status,
            'ref_percent' => $request->ref_percent,
            'image' => $image_name,
            'upgrade' => $request->upgrade,
            'min_deposit' => $request->min_deposit,
            'max_deposit' => $request->max_deposit,
            'return_capital' => $request->return_capital,
            'stake_profit_transfer' => $request->stake_profit_transfer,
            'stake_profit_transfer_cycle' => $request->stake_profit_transfer_cycle,
            'stake_wallet_wd' => $request->stake_wallet_wd,
            'stake_wallet_wd_cycle' => $request->stake_wallet_wd_cycle,
            'ref_earning_transfer' => $request->ref_earning_transfer,
            'ref_earning_transfer_cycle' => $request->ref_earning_transfer_cycle,
            'code_prefix' => $request->code_prefix,
            'code_length' => $request->code_length,
        ]);
        if ($res) {
            return redirect()->route('admin.stake_plans.index')->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StakePlan  $stakePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(StakePlan $stakePlan)
    {
        //
        $res =  $stakePlan->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }
}
