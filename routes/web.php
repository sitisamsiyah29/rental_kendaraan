<?php

use App\Http\Controllers\Admin\AdminCabangController;
use App\Http\Controllers\Admin\AdminKendaraanController;
use App\Http\Controllers\Admin\AdminPenggunaController;
use App\Http\Controllers\Admin\AdminPenyewaanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/pesan/{id}', [PenyewaanController::class, 'pesan'])->name('pesan.kendaraan');
    Route::get('/sewaan-saya', [PenyewaanController::class, 'index']);

    Route::middleware('cek-akses:1')->group(function () {
        Route::resource('admin/cabang', AdminCabangController::class);
        Route::resource('admin/kendaraan', AdminKendaraanController::class);
        Route::resource('admin/pengguna', AdminPenggunaController::class);
        Route::resource('admin/penyewaan', AdminPenyewaanController::class);
        Route::get('admin/berjalan', [AdminPenyewaanController::class, 'berjalan'])->name('berjalan');
        Route::get('admin/riwayat', [AdminPenyewaanController::class, 'riwayat'])->name('riwayat');
        Route::put('admin/berjalan/{id}', [AdminPenyewaanController::class, 'selesaikan'])->name('selesaikan');
    });
});
