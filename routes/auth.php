<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\ConfirmPassword;
use App\Livewire\Auth\TwoFactorChallenge;
use App\Livewire\Actions\Logout;

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');

    Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');

    // Rute khusus untuk tantangan 2FA
    Route::get('two-factor-challenge', TwoFactorChallenge::class)->name('two-factor.login');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', VerifyEmail::class)->name('verification.notice');
    Route::get('confirm-password', ConfirmPassword::class)->name('password.confirm');

    // Logout bisa menggunakan method post untuk keamanan CSRF
    Route::post('logout', Logout::class)->name('logout');
});
