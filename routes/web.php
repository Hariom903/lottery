<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingupController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TicketConttroler;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Route::get('admin/login', function () {
//     return view('admin.login');
// })->name('login');

Route::prefix('admin/')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('lottery', [AdminController::class, 'lottery'])->name('lottery');
        Route::post('lottery/store', [AdminController::class, 'lotteryStore'])->name('lottery.store');
    });
    Route::get('login',[AdminController::class,'login'])->name('login');
    Route::post('login',[AdminController::class,'loginPost']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

});

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/signup',[SingupController::class,'signupform'])->name('signup.form');
Route::post('/signup',[SingupController::class,'signup'])->name('signup');
Route::get('/login',[SingupController::class,'loginform'])->name('user.login');
Route::post('/login',[SingupController::class,'login'])->name('user.login');


Route::middleware(['Authuser'])->group(function () {
    Route::get('/logout', [SingupController::class, 'logout'])->name('logout');
    Route::get('/cards/{tid}',[TicketConttroler::class,'index']);
    Route::post('/cards',[TicketConttroler::class,'store'])->name('cards.store');
    Route::get('/mytickets',[UserController::class,'myTickets'])->name('mytickets');


   Route::controller(StripePaymentController::class)->group(function(){

    Route::post('stripe', 'stripePost')->name('stripe.post');
});
});
