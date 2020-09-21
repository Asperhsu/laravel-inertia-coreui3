<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::inertia('/dashboard', 'Dashboard');
Route::inertia('/about', 'About');
Route::resource('users', 'UserController');
