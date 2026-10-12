<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan halaman Welcome/Landing Page saat website pertama kali dibuka di URL utama ('/')
Route::get('/', function () {
    return view('welcome'); // Memanggil file view welcome.blade.php
});

// Rute Khusus User / Peserta (Setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Rute User melihat Daftar Skema & Data Peserta miliknya sendiri
    Route::get('/user/skema', [UserDashboardController::class, 'skemaIndex'])->name('user.skema');
    Route::get('/user/peserta', [UserDashboardController::class, 'pesertaIndex'])->name('user.peserta');

    // Rute Edit Profil User
    Route::get('/user/profile/edit', [UserDashboardController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile/update', [UserDashboardController::class, 'update'])->name('user.profile.update');
});

// Rute Khusus Admin (Hanya bisa diakses jika sudah login DAN berstatus sebagai admin)
Route::middleware(['auth', 'admin'])->group(function () {
    // Route untuk menampilkan halaman Dashboard utama admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk profil bawaan sistem (jika dibutuhkan admin)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Route untuk CRUD (Create, Read, Update, Delete) data Skema & Peserta (Hanya Admin)
    Route::resource('skema', SkemaController::class);
    Route::resource('peserta', PesertaController::class);
});

// Memuat route bawaan Laravel (login, register, dll)
require __DIR__.'/auth.php';
