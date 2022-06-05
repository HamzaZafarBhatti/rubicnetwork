<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Design;
use App\Models\Logo;
use App\Models\Profits;
use App\Models\Setting;
use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
                // $profit = /* $data['profit'] = */ Profits::whereUser_id($user->id)->where('status', 0)->latest('id')->first();
                // Log::info(json_encode($profit));
                // if($profit) {
                //     $end_date = date_create($profit->end_date);
                //     $ndate = date_format($end_date, "Y-m-d H:i:s");
                //     if (Carbon::now() > $ndate) {
                //         $profit->update(['status' => 1]);
                //         if ($profit->status == 1) {
                //             // Log::info('if2');
                //             $user->balance = $user->balance + $profit->profit;
                //             $user->save();
                //             $profit->status = 2;
                //             $profit->save();
                //         }
                //     }
                // }

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
        $data['cat'] = Category::all();
        $data['ui'] = Design::first();
        $data['logo'] = Logo::first();
        // $data['coupons'] = Coupon::all();
        $data['currency'] = Currency::whereStatus(1)->first();

        View::share($data);
    }
    
    protected function loadhelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
