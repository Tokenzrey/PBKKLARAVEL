<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekSesi;
use App\Http\Controllers\PeminjamanController;
use App\Http\Middleware\CekUserAdminStatus;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sandbox/button', function () {
    return view('sandbox.button');
});

Route::get('/sandbox/link', function () {
    return view('sandbox.link');
});

Route::get('/sandbox/typography', function () {
    return view('sandbox.typography');
});

Route::get('/sandbox/table', function () {
    return view('sandbox.table');
});

Route::get('/sandbox/modal', function () {
    return view('sandbox.modal');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware(CekSesi::class)->name('peminjaman.index');
Route::post('/peminjaman/create', [PeminjamanController::class, 'store'])->middleware(CekSesi::class)->name('peminjaman.store');
Route::get('/datapeminjaman', [PeminjamanController::class, 'history_peminjaman_user'])->middleware(CekSesi::class)->name('peminjaman.user-data');
Route::get('/datapeminjaman/admin', [PeminjamanController::class, 'history_data_peminjaman'])->middleware(CekSesi::class, CekUserAdminStatus::class)->name('peminjaman.admin-data');
Route::post('/peminjaman/update', [PeminjamanController::class, 'update'])->middleware(CekSesi::class)->name('peminjaman.update');
Route::delete('/datapeminjaman/{id}', [PeminjamanController::class, 'destroy_history'])->middleware(CekSesi::class)->name('peminjaman.destroy');

require __DIR__.'/auth.php';
