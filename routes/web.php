<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;

// Guest auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return redirect()->route('certificates.index');
    });

    // Certificate management
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');
    Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');
    Route::get('/certificates/{certificate}/pdf', [CertificateController::class, 'downloadPdf'])->name('certificates.pdf');

    // Admin only routes
    Route::middleware(['App\Http\Middleware\RoleMiddleware:admin'])->group(function () {
        Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
        Route::resource('users', UserController::class);
    });
});
