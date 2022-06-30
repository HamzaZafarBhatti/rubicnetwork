<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExtractionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndirectReferralController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentProofController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PyschemeController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StakeCouponController;
use App\Http\Controllers\StakePlanController;
use App\Http\Controllers\StakeReferralController;
use App\Http\Controllers\StakeWithdrawController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ViralShareController;
use App\Http\Controllers\WalletAddressController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WithdrawController;
use App\Models\UserStakePlan;
use Illuminate\Support\Facades\Route;
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

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
// Auth::routes();
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
Route::post('/pin_verification', [FrontendController::class, 'confirm_code'])->name('front.confirm_code');
Route::get('/cookies_policy', [FrontendController::class, 'cookies_policy'])->name('front.cookies_policy');
Route::get('/contact_us', [FrontendController::class, 'contact_us'])->name('front.contact_us');
Route::get('/top_earners', [FrontendController::class, 'top_earners'])->name('front.top_earners');
Route::get('/payment_proof', [FrontendController::class, 'payment_proof'])->name('front.payment_proof');
Route::get('/faq', [FrontendController::class, 'faq'])->name('front.faq');
Route::get('/pin_dispatchers', [FrontendController::class, 'pin_dispatchers'])->name('front.pin_dispatchers');
Route::get('/disclaimer', [FrontendController::class, 'disclaimer'])->name('front.disclaimer');
Route::get('/sponsored_post', [FrontendController::class, 'sponsored_post'])->name('front.sponsored_post');
Route::get('/sponsored_post/{id}/{slug}', [FrontendController::class, 'article'])->name('front.single.post');
Route::post('/send_email', [FrontendController::class, 'send_email'])->name('front.send_email');

Route::get('/test/email', [FrontendController::class, 'test_email']);

//User Dashboard
Route::name('user.')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'do_register'])->name('do_register');
    Route::get('/onboarding/{username}', [RegisterController::class, 'onboarding'])->name('onboarding');
    Route::post('/onboarding', [RegisterController::class, 'do_onboarding'])->name('do_onboarding');
    Route::get('/user/verify_email', [UserController::class, 'verify_email'])->name('verify_email');
    Route::get('/user/resend_code', [UserController::class, 'resend_code'])->name('resend_code');
    Route::post('/user/verify_email', [UserController::class, 'do_verify_email'])->name('do_verify_email');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'do_login'])->name('do_login');
    Route::prefix('user')->middleware(['auth:web', 'checkStatus'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('profile/edit', 'profile_edit')->name('profile_edit');
            Route::post('profile/update_basic', 'profile_update_basic')->name('profile.update_basic');
            Route::post('profile/update_avatar', 'profile_update_avatar')->name('profile.update_avatar');
            Route::post('profile/update_bank', 'profile_update_bank')->name('profile.update_bank');
            Route::get('profile/set_pin', 'profile_set_pin')->name('profile.set_pin');
            Route::post('profile/update_pin', 'profile_update_pin')->name('profile.update_pin');
            Route::get('profile/change_pin/{pin}', 'profile_change_pin')->name('profile.change_pin');
            Route::post('profile/update_tether_address', 'profile_update_tether_address')->name('profile.update_tether_address');
            Route::get('plan/upgrade', 'upgrade_plan')->name('plan.upgrade');
            Route::post('plan/upgrade', 'do_upgrade_plan')->name('plan.do_upgrade');
        });
        Route::resource('login_logs', LoginLogController::class);
        Route::resource('payment_proofs', PaymentProofController::class)->only('create', 'store');
        //Extraction
        Route::controller(ExtractionController::class)->group(function () {
            Route::get('/extractions/page', 'extractions_page')->name('extractions.page');
            Route::get('/extractions/start', 'extractions_start')->name('extractions.start');
            Route::get('/extractions/thankyou', 'extractions_thankyou')->name('extractions.thankyou');
            Route::get('/extractions/history', 'extractions_history')->name('extractions.history');
            Route::get('/extractions/convert', 'extractions_convert')->name('extractions.convert');
            Route::post('/extractions/do_convert', 'extractions_do_convert')->name('extractions.do_convert');
        });
        //Referral
        Route::controller(ReferralController::class)->group(function () {
            Route::get('/referrals', 'index')->name('referrals.index');
            Route::get('/referrals/earning/history', 'earning_history')->name('referrals.earning_history');
            Route::get('/referrals/convert', 'convert')->name('referrals.convert');
            Route::post('/referrals/do_convert', 'do_convert')->name('referrals.do_convert');
        });
        //Indirect Referral
        Route::controller(IndirectReferralController::class)->group(function () {
            Route::get('/indirect_referrals', 'index')->name('indirect_referrals.index');
            Route::get('/indirect_referrals/earning/history', 'earning_history')->name('indirect_referrals.earning_history');
            Route::get('/indirect_referrals/convert', 'convert')->name('indirect_referrals.convert');
            Route::post('/indirect_referrals/do_convert', 'do_convert')->name('indirect_referrals.do_convert');
        });
        //Viral Share
        Route::controller(ViralShareController::class)->group(function () {
            Route::get('/viral_shares', 'index')->name('viral_shares.index');
            Route::get('/viral_shares/{id}/earn', 'earn')->name('viral_shares.earn');
            Route::get('/viral_shares/history', 'history')->name('viral_shares.history');
            Route::get('/viral_shares/convert', 'convert')->name('viral_shares.convert');
            Route::post('/viral_shares/do_convert', 'do_convert')->name('viral_shares.do_convert');
        });
        //Rubic Wallet
        Route::controller(WithdrawController::class)->group(function () {
            Route::get('/wallet/withdraw', 'wallet_withdraw')->name('wallet.withdraw');
            Route::post('/wallet/withdraw', 'wallet_do_withdraw')->name('wallet.do_withdraw');
            Route::get('/wallet/withdraw_history', 'wallet_withdraw_history')->name('wallet.withdraw_history');
        });
        //Stake Plan
        Route::controller(StakePlanController::class)->group(function () {
            Route::get('stake_plans/activate', 'activate')->name('stake_plans.activate');
            Route::get('stake_plans/{stakePlan}/do_activate_tether', 'do_activate_tether')->name('stake_plans.do_activate_tether');
            Route::post('stake_plans/{stakePlan}/do_activate_coupon', 'do_activate_coupon')->name('stake_plans.do_activate_coupon');
            Route::get('stake_plans/{userStakePlan}/confirm_payment', 'confirm_payment')->name('stake_plans.confirm_payment');
            Route::post('stake_plans/do_confirm_payment', 'do_confirm_payment')->name('stake_plans.do_confirm_payment');
            Route::get('stake_plans/history', 'history')->name('stake_plans.history');
            Route::get('stake_plans/convert', 'convert')->name('stake_plans.convert');
            Route::post('stake_plans/do_convert', 'do_convert')->name('stake_plans.do_convert');
        });
        //Stake Referral
        Route::controller(StakeReferralController::class)->group(function () {
            Route::get('stake_referrals/earning_history', 'earning_history')->name('stake_referrals.earning_history');
            Route::get('stake_referrals/convert', 'convert')->name('stake_referrals.convert');
            Route::post('stake_referrals/do_convert', 'do_convert')->name('stake_referrals.do_convert');
        });
        //Rubic Stake Wallet
        Route::controller(StakeWithdrawController::class)->group(function () {
            //tether
            Route::get('/stake_wallet/withdraw_to_tether', 'withdraw_to_tether')->name('stake_wallet.withdraw_to_tether');
            Route::post('/stake_wallet/withdraw_to_tether', 'do_withdraw_to_tether')->name('stake_wallet.do_withdraw_to_tether');
            Route::get('/stake_wallet/withdraw_history_tether', 'withdraw_history_tether')->name('stake_wallet.withdraw_history_tether');
            //bank
            Route::get('/stake_wallet/withdraw_to_bank', 'withdraw_to_bank')->name('stake_wallet.withdraw_to_bank');
            Route::post('/stake_wallet/withdraw_to_bank', 'do_withdraw_to_bank')->name('stake_wallet.do_withdraw_to_bank');
            Route::get('/stake_wallet/withdraw_history_bank', 'withdraw_history_bank')->name('stake_wallet.withdraw_history_bank');
        });
        //Notifications
        Route::controller(NotificationController::class)->group(function () {
            Route::get('notifications', 'user_notifications')->name('notifications.index');
            Route::get('notifications/{id}/mark_read', 'mark_read')->name('notifications.mark_read');
        });
    });
});


//User Admin
Route::prefix('rubicnetworkadministration')->name('admin.')->group(function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name('loginForm');
    Route::post('/', [AdminLoginController::class, 'authenticate'])->name('login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('settings', SettingController::class);
        Route::resource('banks', BankController::class);
        Route::resource('plans', PlanController::class);
        Route::get('stake_plans/pending', [StakePlanController::class, 'pending'])->name('stake_plans.pending');
        Route::get('stake_plans/log', [StakePlanController::class, 'user_stake_plan_log'])->name('stake_plans.log');
        Route::get('stake_plans/completed', [StakePlanController::class, 'completed'])->name('stake_plans.completed');
        Route::get('stake_plans/activated', [StakePlanController::class, 'activated'])->name('stake_plans.activated');
        Route::get('stake_plans/do_activate/{id}', [StakePlanController::class, 'do_activate'])->name('stake_plans.do_activate');
        Route::get('stake_plans/do_cancel/{id}', [StakePlanController::class, 'do_cancel'])->name('stake_plans.do_cancel');
        Route::resource('stake_plans', StakePlanController::class);
        Route::resource('coupons', CouponController::class);
        Route::get('/coupons/download', [CouponController::class, 'coupons_download'])->name('coupons.download');
        Route::resource('stake_coupons', StakeCouponController::class);
        Route::get('/stake_coupons/download', [StakeCouponController::class, 'stake_coupons_download'])->name('stake_coupons.download');
        Route::resource('blog_categories', CategoryPostController::class);
        Route::resource('blogs', PostController::class);
        Route::get('blogs/unpublish/{id}', [PostController::class, 'unpublish'])->name('blogs.unpublish');
        Route::get('blogs/publish/{id}', [PostController::class, 'publish'])->name('blogs.publish');
        Route::resource('vendors', VendorController::class)->only('index', 'store', 'update', 'destroy');
        Route::resource('wallet_addresses', WalletAddressController::class)->only('index', 'store', 'edit', 'update', 'destroy');
        //Rubic Wallet Withdraw
        Route::prefix('rubic_wallet')->name('wallet.')->controller(WithdrawController::class)->group(function () {
            Route::get('withdraw_log', 'withdraw_log')->name('withdraw_log');
            Route::get('withdraw_approved', 'withdraw_approved')->name('withdraw_approved');
            Route::get('withdraw_declined', 'withdraw_declined')->name('withdraw_declined');
            Route::get('withdraw_unpaid', 'withdraw_unpaid')->name('withdraw_unpaid');
            Route::get('withdraw_delete/{id}', 'withdraw_delete')->name('withdraw_delete');
            Route::get('withdraw_approve/{id}', 'withdraw_approve')->name('withdraw_approve');
            Route::post('withdraw_approve_multi', 'withdraw_approve_multi')->name('withdraw_approve_multi');
            Route::get('withdraw_decline/{id}', 'withdraw_decline')->name('withdraw_decline');
        });
        //Rubic Stake Wallet Withdraw
        Route::prefix('rubic_stake_wallet')->name('stake_wallet.')->controller(StakeWithdrawController::class)->group(function () {
            Route::get('withdraw_log', 'withdraw_log')->name('withdraw_log');
            Route::get('withdraw_approved', 'withdraw_approved')->name('withdraw_approved');
            Route::get('withdraw_declined', 'withdraw_declined')->name('withdraw_declined');
            Route::get('withdraw_unpaid', 'withdraw_unpaid')->name('withdraw_unpaid');
            Route::get('withdraw_delete/{id}', 'withdraw_delete')->name('withdraw_delete');
            Route::get('withdraw_approve/{id}', 'withdraw_approve')->name('withdraw_approve');
            Route::post('withdraw_approve_multi', 'withdraw_approve_multi')->name('withdraw_approve_multi');
            Route::get('withdraw_decline/{id}', 'withdraw_decline')->name('withdraw_decline');
        });
        //Web Pages
        Route::resource('faqs', FaqController::class);
        Route::prefix('web_pages')->name('web.')->controller(WebController::class)->group(function () {
            Route::get('terms', 'terms')->name('terms');
            Route::post('update_terms', 'update_terms')->name('update_terms');
            Route::get('privacy_policy', 'privacy_policy')->name('privacy_policy');
            Route::post('update_privacy_policy', 'update_privacy_policy')->name('update_privacy_policy');
            Route::get('about_us', 'about_us')->name('about_us');
            Route::post('update_about_us', 'update_about_us')->name('update_about_us');
            Route::get('rubic_network', 'rubic_network')->name('rubic_network');
            Route::post('update_rubic_network', 'update_rubic_network')->name('update_rubic_network');
            Route::get('rubic_staking', 'rubic_staking')->name('rubic_staking');
            Route::post('update_rubic_staking', 'update_rubic_staking')->name('update_rubic_staking');
            Route::get('cookie_policy', 'cookie_policy')->name('cookie_policy');
            Route::post('update_cookie_policy', 'update_cookie_policy')->name('update_cookie_policy');
            Route::get('disclaimer', 'disclaimer')->name('disclaimer');
            Route::post('update_disclaimer', 'update_disclaimer')->name('update_disclaimer');
            Route::get('notice', 'notice')->name('notice');
            Route::post('update_notice', 'update_notice')->name('update_notice');
        });
        //Payment Proof
        Route::prefix('payment_proofs')->name('payment_proofs.')->controller(PaymentProofController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/pending', 'pending')->name('pending');
            Route::get('/approved', 'approved')->name('approved');
            Route::get('/declined', 'declined')->name('declined');
            Route::get('/decline/{id}', 'decline')->name('decline');
            Route::get('/approve/{id}', 'approve')->name('approve');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::post('/approve_multi', 'approve_multi')->name('approve_multi');
        });
        //Admin Contoller
        Route::controller(AdminController::class)->group(function () {
            Route::get('users', 'users')->name('users');
        });
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    //User controller
    // Route::get('users', [AdminController::class, 'Users'])->name('admin.users');
    Route::get('messages', [AdminController::class, 'Messages'])->name('admin.message');
    Route::get('unblock-user/{id}', [AdminController::class, 'Unblockuser'])->name('user.unblock');
    Route::get('block-user/{id}', [AdminController::class, 'Blockuser'])->name('user.block');
    Route::get('manage-user/{id}', [AdminController::class, 'Manageuser'])->name('user.manage');
    Route::get('user/delete/{id}', [AdminController::class, 'Destroyuser'])->name('user.delete');
    Route::get('email/{id}/{name}', [AdminController::class, 'Email'])->name('user.email');
    Route::post('email_send', [AdminController::class, 'Sendemail'])->name('user.email.send');
    Route::get('promo', [AdminController::class, 'Promo'])->name('user.promo');
    Route::post('promo', [AdminController::class, 'Sendpromo'])->name('user.promo.send');
    Route::get('message/delete/{id}', [AdminController::class, 'Destroymessage'])->name('message.delete');
    Route::get('ticket', [AdminController::class, 'Ticket'])->name('admin.ticket');
    Route::get('ticket/delete/{id}', [AdminController::class, 'Destroyticket'])->name('ticket.delete');
    Route::get('close-ticket/delete/{id}', [AdminController::class, 'Closeticket'])->name('ticket.close');
    Route::get('manage-ticket/{id}', [AdminController::class, 'Manageticket'])->name('ticket.manage');
    Route::post('reply-ticket', [AdminController::class, 'Replyticket'])->name('ticket.reply');
    Route::post('profile-update', [AdminController::class, 'Profileupdate']);
    Route::post('profile-update-pin', [AdminController::class, 'Profileupdatepin']);
    Route::post('update_bank_details', [AdminController::class, 'UpdateBankDetails']);
    Route::get('approve-kyc/{id}', [AdminController::class, 'Approvekyc'])->name('admin.approve.kyc');
    Route::get('reject-kyc/{id}', [AdminController::class, 'Rejectkyc'])->name('admin.reject.kyc');

    //Web controller
    Route::post('social-links/update', [WebController::class, 'UpdateSocial'])->name('social-links.update');
    Route::get('social-links', [WebController::class, 'sociallinks'])->name('social-links');
    
    Route::get('coupons', [WebController::class, 'coupons'])->name('admin.coupons');
    // Route::post('/createcoupons', [WebController::class, 'CreateCoupons']);
    // Route::get('coupons/delete/{id}', [WebController::class, 'DestroyCoupons'])->name('coupons.delete');
    // Route::post('coupons/update', [WebController::class, 'UpdateCoupons'])->name('coupons.update');


    // Route::post('/createservice', [WebController::class, 'CreateService']);
    // Route::post('service/update', [WebController::class, 'UpdateService'])->name('service.update');
    // Route::get('service/delete/{id}', [WebController::class, 'DestroyService'])->name('service.delete');
    Route::get('service', [WebController::class, 'services'])->name('admin.service');

    // Route::post('/createpage', [WebController::class, 'CreatePage']);
    // Route::post('page/update', [WebController::class, 'UpdatePage'])->name('page.update');
    // Route::get('page/delete/{id}', [WebController::class, 'DestroyPage'])->name('page.delete');
    Route::get('page', [WebController::class, 'page'])->name('admin.page');
    // Route::get('/unpage/{id}', [WebController::class, 'unpage'])->name('page.unpublish');
    // Route::get('/ppage/{id}', [WebController::class, 'ppage'])->name('page.publish');

    // Route::post('/createreview', [WebController::class, 'CreateReview']);
    // Route::post('review/update', [WebController::class, 'UpdateReview'])->name('review.update');
    // Route::get('review/edit/{id}', [WebController::class, 'EditReview'])->name('review.edit');
    // Route::get('review/delete/{id}', [WebController::class, 'DestroyReview'])->name('review.delete');
    Route::get('review', [WebController::class, 'review'])->name('admin.review');
    // Route::get('/unreview/{id}', [WebController::class, 'unreview'])->name('review.unpublish');
    // Route::get('/preview/{id}', [WebController::class, 'preview'])->name('review.publish');

    Route::get('currency', [WebController::class, 'currency'])->name('admin.currency');
    Route::get('pcurrency/{id}', [WebController::class, 'pcurrency'])->name('blog.publish');

    Route::get('logo', [WebController::class, 'logo'])->name('admin.logo');
    Route::post('updatelogo', [WebController::class, 'UpdateLogo']);
    Route::post('updatefavicon', [WebController::class, 'UpdateFavicon']);

    Route::get('home-page', [WebController::class, 'homepage'])->name('homepage');
    Route::post('home-page/update', [WebController::class, 'Updatehomepage'])->name('homepage.update');
    Route::post('section1/update', [WebController::class, 'section1']);
    Route::post('section2/update', [WebController::class, 'section2']);
    Route::post('section3/update', [WebController::class, 'section3']);
    Route::post('section4/update', [WebController::class, 'section4']);

    //Deposit controller
    Route::get('deposit-log', [DepositController::class, 'depositlog'])->name('admin.deposit.log');
    Route::get('deposit-method', [DepositController::class, 'depositmethod'])->name('admin.deposit.method');
    Route::post('storegateway', [DepositController::class, 'store']);
    Route::get('deposit-approved', [DepositController::class, 'depositapproved'])->name('admin.deposit.approved');
    Route::get('deposit-pending', [DepositController::class, 'depositpending'])->name('admin.deposit.pending');
    Route::get('deposit-declined', [DepositController::class, 'depositdeclined'])->name('admin.deposit.declined');
    Route::get('deposit/delete/{id}', [DepositController::class, 'DestroyDeposit'])->name('deposit.delete');
    Route::get('approvedeposit/{id}', [DepositController::class, 'approve'])->name('deposit.approve');
    Route::get('declinedeposit/{id}', [DepositController::class, 'decline'])->name('deposit.decline');

    //Py scheme controller
    Route::get('py-completed', [PyschemeController::class, 'Completed'])->name('admin.py.completed');
    Route::get('py-pending', [PyschemeController::class, 'Pending'])->name('admin.py.pending');

    //Setting controller
    Route::get('email', [SettingController::class, 'Email'])->name('admin.email');
    Route::post('email', [SettingController::class, 'EmailUpdate'])->name('admin.email.update');
    Route::get('sms', [SettingController::class, 'Sms'])->name('admin.sms');
    Route::post('sms', [SettingController::class, 'SmsUpdate'])->name('admin.sms.update');
    Route::get('account', [SettingController::class, 'Account'])->name('admin.account');
    Route::post('account', [SettingController::class, 'AccountUpdate'])->name('admin.account.update');

    //Transfer controller
    Route::get('transfers', [TransferController::class, 'Transfers'])->name('admin.transfers');
    Route::get('referrals', [TransferController::class, 'Referrals'])->name('admin.referrals');

});
