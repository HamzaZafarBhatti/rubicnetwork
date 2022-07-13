<?php

namespace App\Http\Controllers;

use App\Models\StakeCoupon;
use App\Models\StakePlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class StakeCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = StakePlan::whereStatus(1)->get();
        $coupons = StakeCoupon::with('plan')->latest()->get();
        // return $coupons;
        $title = 'Generate Stake Coupons';
        return view('admin.stake_coupons.index', compact('plans', 'title', 'coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {
            $qty = $request->quantity;
            $plan = StakePlan::find($request->stake_plan_id);
            // return $plan;

            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $now = Carbon::now();
            for ($i = 0; $i < $qty; $i++) {
                $data[] = [
                    'serial' => $plan->code_prefix . substr(str_shuffle($chars), 0, $plan->code_length - 4),
                    'stake_plan_id' => $request->stake_plan_id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            $codes = array();
            foreach ($data as $val) {
                array_push($codes, $val['serial']);
            }
            // return $data;
            StakeCoupon::insert($data);
            Session::flash('success', 'Stake Coupon Codes successfully generated!');
            Session::put('download_link_stake', 'admin.stake_coupons.download');
            Session::put('stake_codes', json_encode($codes, JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
        return redirect()->route('admin.stake_coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StakeCoupon  $stakeCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(StakeCoupon $stakeCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StakeCoupon  $stakeCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(StakeCoupon $stakeCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StakeCoupon  $stakeCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StakeCoupon $stakeCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StakeCoupon  $stakeCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(StakeCoupon $stakeCoupon)
    {
        //
    }

    public function stake_coupons_download()
    {
        $codes = Session::get('stake_codes');
        // return public_path('/upload/codes/latest_stake_codes.txt');
        Session::forget(['stake_codes', 'download_link_stake']);
        // File::delete(public_path('/upload/codes/latest_stake_codes.txt'));
        // File::put(public_path('/upload/codes/latest_stake_codes.txt'),$codes);
        // return response()->download(public_path('/upload/codes/latest_stake_codes.txt'));
        return response($codes)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Security-Policy' => 'default-src "self"',
                'Content-Disposition' => 'attachment; filename="latest_stake_codes.txt',
            ]);
    }
}
