<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\QuotePublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes (Sitio Web Público Sellafugas.cl)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public quotation calculator & submission
Route::post('/cotizar', [QuotePublicController::class, 'store'])->name('quote.public.store');
Route::post('/cotizar/calcular', [QuotePublicController::class, 'calculate'])->name('quote.public.calculate');

// Public certificate PDF view/download route (accessible by clients via shared link)
Route::get('/certificates/{certificate}/pdf', [CertificateController::class, 'downloadPdf'])->name('certificates.pdf');

/*
|--------------------------------------------------------------------------
| Guest Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/set-password/{token}', [UserController::class, 'showSetPasswordForm'])->name('password.set.form');
    Route::post('/set-password', [UserController::class, 'updateSetPassword'])->name('password.set.update');
});

/*
|--------------------------------------------------------------------------
| Authenticated Management Software Routes (Sistema Interno)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return redirect()->route('certificates.index');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Certificate & Quotation management
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::get('/certificates/import', [CertificateController::class, 'showImportForm'])->name('certificates.import.form');
    Route::post('/certificates/import', [CertificateController::class, 'processImport'])->name('certificates.import.process');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');

    // Parameter routes
    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');
    Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');

    // Admin Only: Convert Quotation to Official SEC Certificate
    Route::post('/certificates/{certificate}/convert', [CertificateController::class, 'convertToCertificate'])->name('certificates.convert');

    // Admin only routes (Solo Domingo Isain / Administradores)
    Route::middleware(['App\Http\Middleware\RoleMiddleware:admin'])->group(function () {
        Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
        Route::post('/users/{user}/welcome-email', [UserController::class, 'sendWelcomeMail'])->name('users.welcome-email');
        Route::resource('users', UserController::class);
    });
});
