<?php

use App\Http\Controllers\Auth\TelegramController;
use App\Http\Controllers\Auth\TelegramLoginController;
use Illuminate\Support\Facades\Route;
use Micromagicman\TelegramWebApp\Http\WebAppDataValidationMiddleware;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(WebAppDataValidationMiddleware::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(WebAppDataValidationMiddleware::class);


Route::get('/oauth/telegram', [TelegramLoginController::class, 'showLoginPage'])->name('login.telegram');
Route::post('/oauth/telegram', [TelegramLoginController::class, 'handleTelegramLogin'])->name('login.telegram.handle');

Route::get('/rating', function () {
    return view('rating.index');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/achivments', function () {
    return view('achivments.index');
});
