<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingCardController;

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

Route::get('/all-wedding', function () {
    try {
         DB::connection()->getPdo();
         $cards = DB::select("SELECT * FROM wedding_cards;");
         dd($cards);

    } catch (\Exception $e) {
        return "Lỗi kết nối: " . $e->getMessage();
    }
});


// Route điều hướng user đến thiệp cưới dựa vào key
Route::get('/weddings/{key}', [WeddingCardController::class, 'showWeddingCard']);
// Hiển thị form chỉnh sửa dữ liệu
Route::get('/edit/{id}', [WeddingCardController::class, 'edit'])->name('wedding.edit');
// Cập nhật dữ liệu thiệp cưới
Route::post('/update/{id}', [WeddingCardController::class, 'update'])->name('wedding.update');


Route::get('/wedding', [WeddingCardController::class, 'index']); // Lấy danh sách
Route::get('/wedding-cards', [WeddingCardController::class, 'index']); // Lấy danh sách
Route::post('/wedding-cards', [WeddingCardController::class, 'store']); // Thêm mới
Route::get('/wedding-cards/{id}', [WeddingCardController::class, 'show']); // Lấy chi tiết
Route::put('/wedding-cards/{id}', [WeddingCardController::class, 'update']); // Cập nhật
Route::delete('/wedding-cards/{id}', [WeddingCardController::class, 'destroy']); // Xóa
Route::get('/create', [WeddingCardController::class, 'create'])->name('wedding.create');
Route::post('/wedding-cards/store', [WeddingCardController::class, 'store'])->name('wedding.store');
