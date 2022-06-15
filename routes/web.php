<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DataOperatorController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExtractionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndirectReferralController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\PaymentProofController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PyschemeController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SelfcashoutController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StakeCouponController;
use App\Http\Controllers\StakePlanController;
use App\Http\Controllers\StakeReferralController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViralShareController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WithdrawController;
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
Route::get('/cookies_policy', [FrontendController::class, 'cookies_policy'])->name('front.cookies_policy');
Route::get('/contact_us', [FrontendController::class, 'contact_us'])->name('front.contact_us');
Route::get('/top_earners', [FrontendController::class, 'top_earners'])->name('front.top_earners');
Route::get('/payment_proof', [FrontendController::class, 'payment_proof'])->name('front.payment_proof');
Route::get('/faq', [FrontendController::class, 'faq'])->name('front.faq');
Route::get('/pin_dispatchers', [FrontendController::class, 'pin_dispatchers'])->name('front.pin_dispatchers');
Route::get('/disclaimer', [FrontendController::class, 'disclaimer'])->name('front.disclaimer');
Route::get('/sponsored_post', [FrontendController::class, 'sponsored_post'])->name('front.sponsored_post');
Route::get('/sponsored_post/{id}/{slug}', [FrontendController::class, 'article'])->name('front.single.post');

//User Dashboard
Route::name('user.')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'do_register'])->name('do_register');
    Route::get('/onboarding/{username}', [RegisterController::class, 'onboarding'])->name('onboarding');
    Route::post('/onboarding', [RegisterController::class, 'do_onboarding'])->name('do_onboarding');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'do_login'])->name('do_login');
    Route::prefix('user')->middleware('auth:web')->group(function () {
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('profile/edit', [UserController::class, 'profile_edit'])->name('profile_edit');
        Route::post('profile/update_basic', [UserController::class, 'profile_update_basic'])->name('profile.update_basic');
        Route::post('profile/update_avatar', [UserController::class, 'profile_update_avatar'])->name('profile.update_avatar');
        Route::post('profile/update_bank', [UserController::class, 'profile_update_bank'])->name('profile.update_bank');
        Route::get('profile/set_pin', [UserController::class, 'profile_set_pin'])->name('profile.set_pin');
        Route::post('profile/update_pin', [UserController::class, 'profile_update_pin'])->name('profile.update_pin');
        Route::post('profile/update_tether_address', [UserController::class, 'profile_update_tether_address'])->name('profile.update_tether_address');
        Route::resource('login_logs', LoginLogController::class);
        //Extraction
        Route::get('/extractions/page', [ExtractionController::class, 'extractions_page'])->name('extractions.page');
        Route::get('/extractions/start', [ExtractionController::class, 'extractions_start'])->name('extractions.start');
        Route::get('/extractions/thankyou', [ExtractionController::class, 'extractions_thankyou'])->name('extractions.thankyou');
        Route::get('/extractions/history', [ExtractionController::class, 'extractions_history'])->name('extractions.history');
        Route::get('/extractions/convert', [ExtractionController::class, 'extractions_convert'])->name('extractions.convert');
        //Referral
        Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals.index');
        Route::get('/referrals/earning/history', [ReferralController::class, 'earning_history'])->name('referrals.earning_history');
        Route::get('/referrals/convert', [ReferralController::class, 'convert'])->name('referrals.convert');
        //Indirect Referral
        Route::get('/indirect_referrals', [IndirectReferralController::class, 'index'])->name('indirect_referrals.index');
        Route::get('/indirect_referrals/earning/history', [IndirectReferralController::class, 'earning_history'])->name('indirect_referrals.earning_history');
        Route::get('/indirect_referrals/convert', [IndirectReferralController::class, 'convert'])->name('indirect_referrals.convert');
        //Viral Share
        Route::get('/viral_shares', [ViralShareController::class, 'index'])->name('viral_shares.index');
        Route::get('/viral_shares/{id}/earn', [ViralShareController::class, 'earn'])->name('viral_shares.earn');
        Route::get('/viral_shares/history', [ViralShareController::class, 'history'])->name('viral_shares.history');
        Route::get('/viral_shares/convert', [ViralShareController::class, 'convert'])->name('viral_shares.convert');
        //Stake Plan
        Route::get('stake_plans/activate', [StakePlanController::class, 'activate'])->name('stake_plans.activate');
        Route::get('stake_plans/{stakePlan}/do_activate_tether', [StakePlanController::class, 'do_activate_tether'])->name('stake_plans.do_activate_tether');
        Route::post('stake_plans/{stakePlan}/do_activate_coupon', [StakePlanController::class, 'do_activate_coupon'])->name('stake_plans.do_activate_coupon');
        Route::get('stake_plans/history', [StakePlanController::class, 'history'])->name('stake_plans.history');
        //Stake Referral
        Route::get('stake_referrals/earning_history', [StakeReferralController::class, 'earning_history'])->name('stake_referrals.earning_history');
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
        Route::resource('stake_plans', StakePlanController::class);
        Route::resource('coupons', CouponController::class);
        Route::get('/coupons/download', [CouponController::class, 'coupons_download'])->name('coupons.download');
        Route::resource('stake_coupons', StakeCouponController::class);
        Route::get('/stake_coupons/download', [StakeCouponController::class, 'stake_coupons_download'])->name('stake_coupons.download');
        Route::resource('blog_categories', CategoryPostController::class);
        Route::resource('blogs', PostController::class);
        Route::get('blogs/unpublish/{id}', [PostController::class, 'unpublish'])->name('blogs.unpublish');
        Route::get('blogs/publish/{id}', [PostController::class, 'publish'])->name('blogs.publish');
    });
});


// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/', 'AdminLoginController@index')->name('admin.loginForm');
//     Route::post('/', 'AdminLoginController@authenticate')->name('admin.login');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    // Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    // Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    //Web controller
    Route::post('social-links/update', [WebController::class, 'UpdateSocial'])->name('social-links.update');
    Route::get('social-links', [WebController::class, 'sociallinks'])->name('social-links');

    Route::post('about-us/update', [WebController::class, 'UpdateAbout'])->name('about-us.update');
    Route::get('about-us', [WebController::class, 'aboutus'])->name('about-us');

    Route::post('privacy-policy/update', [WebController::class, 'UpdatePrivacy'])->name('privacy-policy.update');
    Route::get('privacy-policy', [WebController::class, 'privacypolicy'])->name('privacy-policy');

    Route::post('terms/update', [WebController::class, 'UpdateTerms'])->name('terms.update');
    Route::get('terms', [WebController::class, 'terms'])->name('admin.terms');

    Route::post('/createvendors', [WebController::class, 'CreateVendors']);
    //Route::post('/vendors', [WebController::class, 'Vendors']);   
    Route::get('coupons', [WebController::class, 'coupons'])->name('admin.coupons');
    Route::post('/createfaq', [WebController::class, 'CreateFaq']);
    Route::post('faq/update', [WebController::class, 'UpdateFaq'])->name('faq.update');
    Route::get('faq/delete/{id}', [WebController::class, 'DestroyFaq'])->name('faq.delete');
    Route::get('faq', [WebController::class, 'faq'])->name('admin.faq');
    Route::post('vendors/update', [WebController::class, 'UpdateVendors'])->name('vendors.update');
    Route::post('vendors/delete/{id}', [WebController::class, 'DestroyVendors'])->name('vendors.delete');
    Route::get('vendors', [WebController::class, 'vendors'])->name('admin.vendors');
    Route::post('/createcoupons', [WebController::class, 'CreateCoupons']);
    Route::get('coupons/delete/{id}', [WebController::class, 'DestroyCoupons'])->name('coupons.delete');
    Route::post('coupons/update', [WebController::class, 'UpdateCoupons'])->name('coupons.update');


    Route::post('/createservice', [WebController::class, 'CreateService']);
    Route::post('service/update', [WebController::class, 'UpdateService'])->name('service.update');
    Route::get('service/delete/{id}', [WebController::class, 'DestroyService'])->name('service.delete');
    Route::get('service', [WebController::class, 'services'])->name('admin.service');

    Route::post('/createpage', [WebController::class, 'CreatePage']);
    Route::post('page/update', [WebController::class, 'UpdatePage'])->name('page.update');
    Route::get('page/delete/{id}', [WebController::class, 'DestroyPage'])->name('page.delete');
    Route::get('page', [WebController::class, 'page'])->name('admin.page');
    Route::get('/unpage/{id}', [WebController::class, 'unpage'])->name('page.unpublish');
    Route::get('/ppage/{id}', [WebController::class, 'ppage'])->name('page.publish');

    Route::post('/createreview', [WebController::class, 'CreateReview']);
    Route::post('review/update', [WebController::class, 'UpdateReview'])->name('review.update');
    Route::get('review/edit/{id}', [WebController::class, 'EditReview'])->name('review.edit');
    Route::get('review/delete/{id}', [WebController::class, 'DestroyReview'])->name('review.delete');
    Route::get('review', [WebController::class, 'review'])->name('admin.review');
    Route::get('/unreview/{id}', [WebController::class, 'unreview'])->name('review.unpublish');
    Route::get('/preview/{id}', [WebController::class, 'preview'])->name('review.publish');

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

    //Withdrawal controller
    Route::get('withdraw-log', [WithdrawController::class, 'withdrawlog'])->name('admin.withdraw.log');
    Route::get('withdraw-approved', [WithdrawController::class, 'withdrawapproved'])->name('admin.withdraw.approved');
    Route::get('withdraw-declined', [WithdrawController::class, 'withdrawdeclined'])->name('admin.withdraw.declined');
    Route::get('withdraw-unpaid', [WithdrawController::class, 'withdrawunpaid'])->name('admin.withdraw.unpaid');
    Route::get('withdraw/delete/{id}', [WithdrawController::class, 'DestroyWithdrawal'])->name('withdraw.delete');
    Route::get('approvewithdraw/{id}', [WithdrawController::class, 'approve'])->name('withdraw.approve');
    Route::post('withdraw-approve-multi', [WithdrawController::class, 'approve_multi'])->name('admin.withdraw.approve_multi');
    Route::post('approvewithdrawmine', [WithdrawController::class, 'approvemine'])->name('withdraw.approvemine');
    Route::get('declinewithdraw/{id}', [WithdrawController::class, 'decline'])->name('withdraw.declined');
    //Selfcashout controller
    Route::get('selfcashout-log', [SelfcashoutController::class, 'selfcashoutlog'])->name('admin.selfcashout.log');
    Route::get('selfcashout-approved', [SelfcashoutController::class, 'selfcashoutapproved'])->name('admin.selfcashout.approved');
    Route::get('selfcashout-declined', [SelfcashoutController::class, 'selfcashoutdeclined'])->name('admin.selfcashout.declined');
    Route::get('selfcashout-unpaid', [SelfcashoutController::class, 'selfcashoutunpaid'])->name('admin.selfcashout.unpaid');
    Route::get('selfcashout/delete/{id}', [SelfcashoutController::class, 'DestroySelfcashout'])->name('selfcashout.delete');
    Route::get('approveselfcashout/{id}', [SelfcashoutController::class, 'approve'])->name('selfcashout.approve');
    Route::post('selfcashout-approve-multi', [SelfcashoutController::class, 'approve_multi'])->name('admin.selfcashout.approve_multi');
    Route::get('declineselfcashout/{id}', [SelfcashoutController::class, 'decline'])->name('selfcashout.declined');
    //Payment Proof controller
    Route::get('paymentproof-log', [PaymentProofController::class, 'paymentprooflog'])->name('admin.paymentproof.log');
    Route::get('paymentproof-approved', [PaymentProofController::class, 'paymentproofapproved'])->name('admin.paymentproof.approved');
    Route::get('paymentproof-declined', [PaymentProofController::class, 'paymentproofdeclined'])->name('admin.paymentproof.declined');
    Route::get('paymentproof-pending', [PaymentProofController::class, 'paymentproofpending'])->name('admin.paymentproof.pending');
    Route::get('paymentproof/delete/{id}', [PaymentProofController::class, 'DestroyPaymentProof'])->name('paymentproof.delete');
    Route::get('approvepaymentproof/{id}', [PaymentProofController::class, 'approve'])->name('paymentproof.approve');
    Route::post('paymentproof-approve-multi', [PaymentProofController::class, 'approve_multi'])->name('admin.paymentproof.approve_multi');
    Route::get('declinepaymentproof/{id}', [PaymentProofController::class, 'decline'])->name('paymentproof.declined');

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
    // Route::get('settings', [SettingController::class, 'Settings'])->name('admin.setting');
    // Route::post('settings', [SettingController::class, 'SettingsUpdate'])->name('admin.settings.update');
    Route::get('email', [SettingController::class, 'Email'])->name('admin.email');
    Route::post('email', [SettingController::class, 'EmailUpdate'])->name('admin.email.update');
    Route::get('sms', [SettingController::class, 'Sms'])->name('admin.sms');
    Route::post('sms', [SettingController::class, 'SmsUpdate'])->name('admin.sms.update');
    Route::get('account', [SettingController::class, 'Account'])->name('admin.account');
    Route::post('account', [SettingController::class, 'AccountUpdate'])->name('admin.account.update');

    //Transfer controller
    Route::get('transfers', [TransferController::class, 'Transfers'])->name('admin.transfers');
    Route::get('referrals', [TransferController::class, 'Referrals'])->name('admin.referrals');

    //User controller
    Route::get('users', [AdminController::class, 'Users'])->name('admin.users');
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
});
