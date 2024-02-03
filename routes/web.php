<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', [SessionsController::class, 'index'])->name('home');

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('explore/{majorCategory}/{minorCategory?}/{style?}', [ProductsController::class, 'show'])
    ->where('majorCategory', '[A-Za-z0-9-]+')
    ->where('minorCategory', '[A-Za-z0-9-]+')
    ->name('products.show');

Route::get('shop/{majorCategory}/product/{productName}', [ProductsController::class, 'showSingle'])
    ->where('majorCategory', '[A-Za-z0-9-]+')
    ->name('products.showSingle');

Route::get('shop/{majorCategory}/{minorCategory?}/{style?}', [ProductsController::class, 'showWithFilters'])
    ->where('majorCategory', '[A-Za-z0-9-]+')
    ->where('minorCategory', '[A-Za-z0-9-]+')
    ->name('products.showWithFilters');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/account', [AccountController::class, 'create']);
    Route::post('/logout', [SessionsController::class, 'destroy']);
    Route::post('/products', [ProductsController::class, 'store']);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
