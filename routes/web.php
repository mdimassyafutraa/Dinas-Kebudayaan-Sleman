<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FasilitasController;
use App\Http\Controllers\admin\JadwalController;
use App\Http\Controllers\admin\KontakController;
use App\Http\Controllers\admin\PeminjamanController;
use App\Http\Controllers\admin\PeraturanController;
use App\Http\Controllers\SOPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auths
Route::get('login', [AuthController::class, 'index'])->name('formLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('store-peminjaman', [HomeController::class, 'storePeminjaman'])->name('storePeminjaman');



// Admin

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Peminjaman
    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::patch('/verifikasi-peminjaman/{id}', [PeminjamanController::class, 'verifikasi'])->name('verifikasi');
    Route::patch('/batalkan-verifikasi-peminjaman/{id}', [PeminjamanController::class, 'batalkanVerifikasi'])->name('batalkan.verifikasi.peminjaman');
    Route::delete('/hapus-peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('hapus.peminjaman');


    // Jadwal
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');

    // Fasilitas
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
    Route::post('fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::delete('fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');


    // Peraturan
    Route::get('peraturan', [PeraturanController::class, 'index'])->name('peraturan');
    Route::post('peraturan', [PeraturanController::class, 'store'])->name('peraturan.store');
    Route::delete('peraturan/{id}', [PeraturanController::class, 'destroy'])->name('peraturan.destroy');

    // Kontak
    Route::get('kontak', [KontakController::class, 'index'])->name('kontak');
    Route::post('kontak', [KontakController::class, 'store'])->name('kontak.store');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});
