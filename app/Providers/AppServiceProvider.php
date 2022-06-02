<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Coupons;
use App\Models\Currency;
use App\Models\Design;
use App\Models\Logo;
use App\Models\Setting;
use App\Models\Settings;
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
        // $data['setting'] = Setting::first();
        $data['set'] = Settings::first();
        $data['cat'] = Category::all();
        $data['ui'] = Design::first();
        $data['logo'] = Logo::first();
        $data['coupons'] = Coupons::all();
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
