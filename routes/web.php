<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', \App\Livewire\Dashboard::class)->middleware(['auth', 'verified', SetLocale::class])->name('dashboard');
Route::get('/dashboard/referrals', \App\Livewire\ReferralDashboard::class)->name('referrals');
Route::get('/r/{ref}', [\App\Http\Controllers\ReferralController::class, 'setReferral'])->name('referral');


Route::get('/assessment', \App\Livewire\Assessment::class)->middleware(['auth', 'verified', SetLocale::class])->name('assessment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(SetLocale::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware(SetLocale::class)->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(SetLocale::class)->name('profile.destroy');
});

Route::get('/booking', \App\Livewire\BookingEngine::class)->middleware(SetLocale::class)->name('booking');
Route::post('/stripe/', [\App\Http\Controllers\StripePaymentController::class, 'process'])->name('stripe.process');

Route::view('/privacy', 'privacy')->middleware(['auth', 'verified', SetLocale::class])->name('privacy');
Route::view('/cookie', 'cookie')->middleware(['auth', 'verified', SetLocale::class])->name('cookie');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
