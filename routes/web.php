<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekSesi;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');

});

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware(CekSesi::class)->name('peminjaman.index');

require __DIR__.'/auth.php';
