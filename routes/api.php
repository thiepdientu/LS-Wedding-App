<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TodoTaskController;


Route::get('/account/ping', function () {
    return response()->json(['pong' => true]);
});

Route::post('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/register', [AccountController::class, 'store'])->name('account.store');
Route::get('/getListWedding/{key}', [WeddingCardController::class, 'getListWedding'])->name('wedding.getlist');

Route::get('/response/{key}', [ResponseController::class, 'getListResponse'])->name('wedding.getResponse'); // get list respon by weddingId
Route::get('/responseForMail/{key}', [ResponseController::class, 'getListResponseForMail'])->name('wedding.getResponseMail'); // get list respon by email
Route::post('/response/create', [ResponseController::class, 'store'])->name('response.store'); // api tạo response
Route::post('/response/update/{id}', [ResponseController::class, 'update'])->name('response.update'); // api update response

Route::post('/task/create', [TodoTaskController::class, 'store'])->name('task.store'); // api tạo task
Route::post('/task/update/{key}', [TodoTaskController::class, 'update'])->name('task.update'); // api update task
Route::get('/task/{key}', [TodoTaskController::class, 'getListTaskForMail'])->name('wedding.getTaskMail'); // api get task by mail