<?php

use App\Http\Controllers\LoginController;

Route::group(
    [
        'prefix'        => 'login',
        'namespace'     => 'login',
        'as'            => 'login.',
        'middleware' => ['web']
    ],
    function () {
        //LOGIN
        Route::get('', [LoginController::class, 'index'])->name('login');
        Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('proses');
        Route::post('/reload-captcha', [LoginController::class, 'refreshCaptcha'])->name('refresh_captcha');
    }
);
