<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Design;
use App\Models\Extraction;
use App\Models\Logo;
use App\Models\Profits;
use App\Models\Setting;
use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                // $currency = Currency::whereStatus(1)->first();
                // if (empty($user->image)) {
                //     $cast = "react.jpg";
                // } else {
                //     $cast = $user->image;
                // }
                $extraction = Extraction::whereUserId(auth()->user()->id)->where('status', 0)->latest('id')->first();
                if ($extraction) {
                    $end_date = Carbon::parse($extraction->end_datetime)->format("Y-m-d H:i:s");
                    if (Carbon::now() > $end_date) {
                        $extraction->update(['status' => 1]);
                        if ($extraction->status == 1) {
                            // Log::info('if2');
                            $user->update(['extraction_balance' => $user->extraction_balance + $extraction->profit]);
                            $extraction->update(['status' => 2]);
                        }
                    }
                }

                // $view->with('user', $user);
                // $view->with('cast', $cast);
                // $view->with('currency', $currency);
                // $user_plan = Plans::whereHas('user', function ($q) {
                //     $q->where('users.id', Auth::user()->id);
                // })->whereStatus(1)->first();
                // $view->with('user_plan', $user_plan);
                // $view->with('user_proof', Auth::user()->show_popup);

                // if($user){
                //     $expires_on = Carbon::now()->diffInSeconds(Carbon::parse($user->activated_at)->addMonths($user_plan->active_period), false);
                //     // $view->with('expires_on', $expires_on);

                //     if($expires_on < 0) {
                //         $user->is_expired = 1;
                //         $user->save();
                //     }
                // }
            }
        });
        // $data['setting'] = Setting::first();
        $data['set'] = Settings::first();
        // $data['cat'] = Category::all();
        $data['ui'] = Design::first();
        $data['logo'] = Logo::first();
        // $data['coupons'] = Coupon::all();
        $data['currency'] = Currency::whereStatus(1)->first();

        View::share($data);
    }

    protected function loadhelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
