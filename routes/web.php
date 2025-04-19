<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;
use App\Http\Controllers\TodoTaskController;
use App\Http\Controllers\ResponseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        $cards = DB::select("SELECT * FROM wedding_cards;");
        return "Kết nối MySQL thành công!";
    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});

Route::get('admin/all-wedding', function () {
    try {
         DB::connection()->getPdo();
         $cards = DB::select("SELECT * FROM wedding_cards;");
         return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $cards
        ], 200);

    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});

Route::get('admin/all-task', function () {
    try {
         DB::connection()->getPdo();
         $task = DB::select("SELECT * FROM todo_tasks;");
         return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $task
        ], 200);

    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});

Route::get('admin/all-response', function () {
    try {
         DB::connection()->getPdo();
         $response = DB::select("SELECT * FROM responses;");
         return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $response
        ], 200);

    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});

Route::get('/getListWedding/{key}', [WeddingCardController::class, 'getListWedding']);


// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/wedding-cards/{id}', [WeddingCardController::class, 'show']); // Lấy chi tiết
// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/weddingInvite/{key}', [WeddingCardController::class, 'showWeddingCardByName']);
// Hiển thị form chỉnh sửa dữ liệu
Route::get('admin/edit/{id}', [WeddingCardController::class, 'edit'])->name('wedding.edit');
// Hiển thị form chỉnh sửa dữ liệu theo tên
Route::get('admin/editByName/{id}', [WeddingCardController::class, 'editByName'])->name('wedding.edit');
// Cập nhật dữ liệu thiệp cưới
Route::post('/update/{id}', [WeddingCardController::class, 'update'])->name('wedding.update');
Route::get('admin/create', [WeddingCardController::class, 'create'])->name('wedding.create');
Route::post('/wedding-cards/store', [WeddingCardController::class, 'store'])->name('wedding.store');
// Route điều hướng user đến template thiệp
Route::get('/template/{key}', [WeddingCardController::class, 'showTemplate']);

// api

Route::get('admin/all-account', function () {
    try {
         DB::connection()->getPdo();
         $cards = DB::select("SELECT * FROM accounts;");
         return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $cards
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'code' => 0,
            'message' => $e->getMessage(),
    
        ], 201);
    }
});

Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
Route::post('/account/create', [AccountController::class, 'store'])->name('account.store');
Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');

Route::get('/task/create', [TodoTaskController::class, 'create'])->name('task.create');
Route::get('/task/edit/{id}', [TodoTaskController::class, 'edit'])->name('task.edit');
// Route::post('/task/create', [TodoTaskController::class, 'store'])->name('task.store');
// Route::post('/task/update/{key}', [TodoTaskController::class, 'update'])->name('task.update');

Route::get('/response/create', [ResponseController::class, 'create'])->name('response.create');
Route::get('/response/edit/{id}', [ResponseController::class, 'edit'])->name('response.edit');
// Route::post('/response/create', [ResponseController::class, 'store'])->name('response.store');
// Route::post('/response/update/{id}', [ResponseController::class, 'update'])->name('response.update');
