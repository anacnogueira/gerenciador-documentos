<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginForm');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/username', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::put('/profile/username', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

    Route::resource('/documentos', App\Http\Controllers\DocumentController::class);
});



