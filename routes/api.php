<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MasukController;
use App\Http\Controllers\Api\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::post('/transaksi', [TransaksiController::class, 'transaksi']);
Route::post('cek-saldo', [TransaksiController::class, 'cekSaldo']);
Route::get('history', [TransaksiController::class, 'history']);
Route::post('masuk', [MasukController::class, 'index']);
