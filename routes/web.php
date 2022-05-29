<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Language Translation
Route::get('index/{locale}', [HomeController::class, 'lang']);

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/about_us', [FrontendController::class, 'about_us'])->name('front.about_us');
Route::get('/rubic_staking', [FrontendController::class, 'rubic_staking'])->name('front.rubic_staking');
Route::get('/rubic_network', [FrontendController::class, 'rubic_network'])->name('front.rubic_network');
Route::get('/terms_condition', [FrontendController::class, 'terms_condition'])->name('front.terms_condition');
Route::get('/privacy_policy', [FrontendController::class, 'privacy_policy'])->name('front.privacy_policy');
Route::get('/pin_verification', [FrontendController::class, 'pin_verification'])->name('front.pin_verification');
Route::get('/cookies_policy', [FrontendController::class, 'cookies_policy'])->name('front.cookies_policy');
Route::get('/contact_us', [FrontendController::class, 'contact_us'])->name('front.contact_us');
Route::get('/top_earners', [FrontendController::class, 'top_earners'])->name('front.top_earners');
Route::get('/payment_proof', [FrontendController::class, 'payment_proof'])->name('front.payment_proof');
Route::get('/faq', [FrontendController::class, 'faq'])->name('front.faq');
Route::get('/pin_dispatchers', [FrontendController::class, 'pin_dispatchers'])->name('front.pin_dispatchers');
Route::get('/disclaimer', [FrontendController::class, 'disclaimer'])->name('front.disclaimer');
Route::get('/sponsored_post', [FrontendController::class, 'sponsored_post'])->name('front.sponsored_post');

//User Dashboard
Route::prefix('user')->middleware('auth:web')->name('user.')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

//Update User Details
Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

//User Admin
Route::prefix('rubicnetworkadministration')->name('admin.')->group(function () {
    Route::get('/', [AdminLoginController::class, 'login'])->name('login');
    Route::post('/', [AdminLoginController::class, 'do_login'])->name('do_login');

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('/settings', SettingController::class);
    });
});
