<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginForm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

