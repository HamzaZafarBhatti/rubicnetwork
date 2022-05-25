<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Social;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Coupons;
use App\Models\Page;
use App\Models\Design;
use App\Models\About;
use App\Models\Earners;
use App\Models\Vendors;
use App\Models\Review;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use App\Models\Services;
use App\Models\Gateway;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Session;
use Image;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                $currency = Currency::whereStatus(1)->first();
                if (empty($user->image)) {
                    $cast = "react.jpg";
                } else {
                    $cast = $user->image;
                }
                $profit = $data['profit'] = Profits::whereUser_id(auth()->user()->id)->where('status', 0)->latest('id')->first();
                // Log::info(json_encode($profit));
                if($profit) {
                    $end_date = date_create($profit->end_date);
                    $ndate = date_format($end_date, "Y-m-d H:i:s");
                    if (Carbon::now() > $ndate) {
                        // Log::info('if');
                        // return 'if';
                        // $profit->status == 1;
                        $profit->update(['status' => 1]);
                        if ($profit->status == 1) {
                            // Log::info('if2');
                            $user->balance = $user->balance + $profit->profit;
                            $user->save();
                            $profit->status = 2;
                            $profit->save();
                        }
                    }
                }

                $view->with('user', $user);
                $view->with('cast', $cast);
                $view->with('currency', $currency);
                $user_plan = Plans::whereHas('user', function ($q) {
                    $q->where('users.id', Auth::user()->id);
                })->whereStatus(1)->first();
                $view->with('user_plan', $user_plan);
                $view->with('user_proof', Auth::user()->show_popup);

                if($user){
                    $expires_on = Carbon::now()->diffInSeconds(Carbon::parse($user->activated_at)->addMonths($user_plan->active_period), false);
                    // $view->with('expires_on', $expires_on);
    
                    if($expires_on < 0) {
                        $user->is_expired = 1;
                        $user->save();
                    }
                }
            }
        });
        $data['set'] = Settings::first();
        $data['blog'] = Blog::whereStatus(1)->get();
        $data['logo'] = Logo::first();
        $data['social'] = Social::all();
        $data['faq'] = Faq::all();
        $data['cat'] = Category::all();
        $data['pages'] = Page::whereStatus(1)->get();
        $data['ui'] = Design::first();
        $data['about'] = About::first();
        $data['vendors'] = Vendors::all();
        $data['earners'] = Earners::all();
        $data['coupons'] = Coupons::all();
        $data['trending'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['posts'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['currency'] = Currency::whereStatus(1)->first();
        $data['review'] = Review::whereStatus(1)->get();
        $data['service'] = Services::all();
        $data['gateway'] = Gateway::whereStatus(1)->get();
        $data['plan'] = Plans::whereStatus(1)->get();


        view::share($data);
    }
}
