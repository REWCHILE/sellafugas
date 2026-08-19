<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes for SellafuGas® Mobile App (Flutter)
|--------------------------------------------------------------------------
*/

// Public Auth routes
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth & Profile
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/me', [AuthController::class, 'me'])->name('api.me');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('api.profile.update');

    // Dashboard Metrics
    Route::get('/dashboard/metrics', [DashboardController::class, 'metrics'])->name('api.dashboard.metrics');

    // Certificates & Quotations
    Route::get('/certificates/defaults', [CertificateController::class, 'defaults'])->name('api.certificates.defaults');
    Route::get('/certificates', [CertificateController::class, 'index'])->name('api.certificates.index');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('api.certificates.store');
    Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('api.certificates.show');
    Route::post('/certificates/{id}', [CertificateController::class, 'update'])->name('api.certificates.update');
    Route::post('/certificates/{id}/convert', [CertificateController::class, 'convert'])->name('api.certificates.convert');
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])->name('api.certificates.destroy');

    // User / Technician Management (Admin only)
    Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
    Route::post('/users', [UserController::class, 'store'])->name('api.users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('api.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');
});
