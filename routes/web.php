<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/complaint', [HomeController::class, 'storeComplaint'])->name('complaint.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        if ($role === 'petugas_gizi') return redirect()->route('gizi.dashboard');
        if ($role === 'petugas_pengaduan') return redirect()->route('pengaduan.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('schools', SchoolController::class);

        // Monitoring Routes (Read-Only)
        Route::get('/monitoring/menus', [\App\Http\Controllers\Admin\MonitoringController::class, 'menus'])->name('monitoring.menus');
        Route::get('/monitoring/complaints', [\App\Http\Controllers\Admin\MonitoringController::class, 'complaints'])->name('monitoring.complaints');
    });

    Route::middleware(['role:petugas_gizi'])->prefix('gizi')->name('gizi.')->group(function () {
        Route::get('/dashboard', function () {
            return view('gizi.dashboard');
        })->name('dashboard');

        Route::resource('menus', \App\Http\Controllers\Gizi\MenuController::class);
    });

    Route::middleware(['role:petugas_pengaduan'])->prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/dashboard', function () {
            return view('pengaduan.dashboard');
        })->name('dashboard');

        Route::resource('complaints', \App\Http\Controllers\Pengaduan\ComplaintController::class)->only(['index', 'edit', 'update', 'destroy']);
    });
});

require __DIR__ . '/auth.php';
