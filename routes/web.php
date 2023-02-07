<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('user', UserController::class);
});

Route::get('voucher/cetak-voucher', [VoucherController::class, 'cetakVoucher']);
Route::post('voucher/cetak-voucher-banyak', [VoucherController::class, 'cetakVoucherBanyak']);
Route::get('voucher/view-voucher/{id}', [VoucherController::class, 'viewVoucher']);
Route::post('voucher/transaksi', [VoucherController::class, 'transaksi'])->name('voucher.transaksi');
