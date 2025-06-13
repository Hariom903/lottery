<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\PriceaddController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\handle;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotteriesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Policies\PoliciesController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\SingupController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TicketConttroler;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth::routes([
//     'verity'=> true,
// ]);
// Route::get('admin/login', function () {
//     return view('admin.login');
// })->name('login');
Route::middleware('guest')->group(function () {
Route::get('/google/callback', [AuthenticationController::class, 'googleCallback'])->name('google.callback');
Route::get('/google', [AuthenticationController::class, 'googleRedirect'])->name('google');
Route::get('/signup',[SingupController::class,'signupform'])->name('signup.form');
Route::post('/signup',[SingupController::class,'signup'])->name('signup');
Route::get('/login',[SingupController::class,'loginform'])->name('user.login');
Route::post('/login',[SingupController::class,'login'])->name('user.login');
});

Route::prefix('admin/')->group(function () {
    Route::middleware(['admin'])->group(function () {

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('lottery', [AdminController::class, 'lottery'])->name('lottery');
        Route::post('lottery/store', [AdminController::class, 'lotteryStore'])->name('lottery.store');
        Route::get('lottery/{tid}',[AdminController::class,'show'])->name('lottery.show');
        Route::post('lottery/price',[AdminController::class, 'pricestore'])->name('lottery.prizes.store');
        Route::get('addprice',[PriceaddController::class,'index'])->name('price.add');
        Route::post('addprice',[PriceaddController::class,'store'])->name('price.add.store');
        Route::post('winnernumber',[PriceaddController::class,'winnernumber'])->name('winnernumber');
    });

    Route::get('login',[AdminController::class,'login'])->name('login');
    Route::post('login',[AdminController::class,'loginPost']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

});


Route::get('/',[HomeController::class, 'index'])->name('home');


Route::middleware(['Authuser'])->group(function () {
    Route::get('/logout', [SingupController::class, 'logout'])->name('logout');
    Route::post('/cards',[TicketConttroler::class,'store'])->name('cards.store');
    Route::get('/cards/{tid}',[TicketConttroler::class,'index']);
    Route::get('/mytickets',[UserController::class,'myTickets'])->name('mytickets');
    Route::post('/change-password',[PasswordController::class,'changePassword'])->name('change.password');



    Route::post('/notifications/clear',[NotificationController::class ,'Delete'])->name('notifications.clear');
     Route::post('/notifications/mark-all-read',[NotificationController::class,'MarkAsRead'])->name('notifications.markAllRead');

     Route::get('/lottery',[LotteriesController::class,'index'])->name('lotteries.index');

     Route::post('payment/success', [RazorpayController::class, 'payment'])->name('payment.success');



});

Route::get('/ramram',[handle::class,'handlePayment']);
//contct us
Route::get('/contact-us',[ContactController::class,'contactUs'])->name('contact.us');
Route::post('/contact-us',[ContactController::class,'contactSubmit'])->name('contact.us.store');

//  policies routets
Route::get('/terms-of-use',[PoliciesController::class,'termsOfuse'])->name('terms.of.use');
Route::get('/privacy-notice',[PoliciesController::class,'privacyNotice'])->name('privacy.notice');
// Cookie Policy
Route::get('/cookie-policy',[PoliciesController::class,'cookiePolicy'])->name('cookie.policy');







