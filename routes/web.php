<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('barang', barangController::class);
Route::resource('transaksi', transaksiController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);