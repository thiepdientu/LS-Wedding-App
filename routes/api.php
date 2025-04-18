<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;


Route::get('/account/ping', function () {
    return response()->json(['pong' => true]);
});

Route::post('/account/login', [AccountController::class, 'login'])->name('account.login');