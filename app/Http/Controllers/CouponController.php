<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = Plan::whereStatus(1)->get();
        $coupons = Coupon::with('plan')->latest()->get();
        $title = 'Generate Coupons';
        return view('admin.coupons.index', compact('plans', 'title', 'coupons'));
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
        // return $request;
        try {
            $qty = $request->quantity;
            $plan = Plan::find($request->plan_id);
            // return $plan;

            $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $now = Carbon::now();
            for ($i = 0; $i < $qty; $i++) {
                $data[] = [
                    'serial' => $plan->code_prefix . substr(str_shuffle($chars), 0, $plan->code_length - 4),
                    'plan_id' => $request->plan_id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            $codes = array();
            foreach ($data as $val) {
                array_push($codes, $val['serial']);
            }
            // return $data;
            Coupon::insert($data);
            Session::flash('success', 'Coupon Codes successfully generated!');
            Session::put('download_link', route('admin.coupons.download'));
            Session::put('codes', json_encode($codes, JSON_PRETTY_PRINT));
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    public function coupons_download()
    {
        // return 'ello';
        $codes = Session::get('codes');
        // return $codes;
        Session::forget(['codes', 'download_link']);
        // File::delete(public_path('/upload/codes/latest_rubic_codes.txt'));
        // File::put(public_path('/upload/codes/latest_rubic_codes.txt'),$codes);
        // return response()->download(public_path('/upload/codes/latest_rubic_codes.txt'));
        return response($codes)
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="latest_rubic_codes.txt',
            ]);
    }
}
