<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'verify' => true,
]);
Route::inertia('login', 'Auth/Login')->name('login');
Route::inertia('register', 'Auth/Register')->name('register');
Route::inertia('password/reset', 'Auth/RequestResetPassword')->name('password.request');
Route::inertia('password/confirm', 'Auth/ConfirmPassword')->name('password.confirm');
Route::inertia('email/verify', 'Auth/VerifyEmailNotice')->name('verification.notice');

Route::redirect('/', '/admin/dashboard');

Route::prefix('admin')->middleware('auth', 'verified', 'password.confirm')->group(function () {
    Route::inertia('/dashboard', 'Dashboard');
    Route::inertia('/about', 'About');
    Route::resource('users', 'UserController');
});
