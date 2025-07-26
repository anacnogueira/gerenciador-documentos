<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginForm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/username', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/user', [App\Http\Controllers\UserController::class, 'profile'])->name('users.update');


Route::resource('/documentos', App\Http\Controllers\DocumentController::class);

