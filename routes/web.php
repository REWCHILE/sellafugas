<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\QuotePublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PublicLandingController;

/*
|--------------------------------------------------------------------------
| Public Routes (Sitio Web Público Sellafugas.cl)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 9 Specialized SEO Landing Pages (High-Conversion Google Ads & Organic SEO)
Route::get('/fugas-de-gas', [PublicLandingController::class, 'fugasGas'])->name('landing.fugas-gas');
Route::get('/gasfiter-sec', [PublicLandingController::class, 'gasfiterSec'])->name('landing.gasfiter-sec');
Route::get('/gas-trazador', [PublicLandingController::class, 'gasTrazador'])->name('landing.gas-trazador');
Route::get('/fugas-de-agua', [PublicLandingController::class, 'fugasAgua'])->name('landing.fugas-agua');
Route::get('/fugas-piscinas', [PublicLandingController::class, 'fugasPiscinas'])->name('landing.fugas-piscinas');
Route::get('/sello-rojo-sec', [PublicLandingController::class, 'selloRojo'])->name('landing.sello-rojo');
Route::get('/deteccion-fugas-sin-romper', [PublicLandingController::class, 'deteccionSinRomper'])->name('landing.deteccion-sin-romper');
Route::get('/reparacion-calefont-sec', [PublicLandingController::class, 'reparacionCalefont'])->name('landing.reparacion-calefont');
Route::get('/certificados-sec-gas', [PublicLandingController::class, 'certificadosSec'])->name('landing.certificados-sec');
Route::get('/prodoral', [PublicLandingController::class, 'prodoral'])->name('landing.prodoral');
Route::get('/nosotros', [PublicLandingController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PublicLandingController::class, 'contacto'])->name('contacto');

// AI Agentic Discovery (llmstxt.org specification)
Route::get('/llms.txt', function () {
    $path = public_path('llms.txt');
    if (file_exists($path)) {
        return response(file_get_contents($path), 200, [
            'Content-Type' => 'text/plain; charset=utf-8',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
    return response("# SellafuGas\n> Reparación de Fugas de Gas Sin Romper\n", 200, ['Content-Type' => 'text/plain; charset=utf-8']);
});

// Public quotation calculator & submission
Route::post('/cotizar', [QuotePublicController::class, 'store'])->name('quote.public.store');
Route::post('/cotizar/calcular', [QuotePublicController::class, 'calculate'])->name('quote.public.calculate');

// Public certificate PDF view/download route (accessible by clients via shared link)
Route::get('/certificates/{certificate}/pdf', [CertificateController::class, 'downloadPdf'])->name('certificates.pdf');

/*
|--------------------------------------------------------------------------
| SEO 301 Permanent Redirects (Legacy URLs indexed on Google)
|--------------------------------------------------------------------------
*/
Route::redirect('/sellafugas', '/', 301);
Route::redirect('/cotizador', '/#cotizador', 301);
Route::redirect('/sellafugas-de-gas', '/fugas-de-gas', 301);
Route::redirect('/tecnico-en-fugas-de-gas', '/gasfiter-sec', 301);
Route::redirect('/sellado-de-fugas-de-gas-con-prodoral-reparamos-sin-romper-sellafugas-domingo-isaingasfiter-certificado-autorizado-sec', '/prodoral', 301);
Route::redirect('/sellado-de-fugas-de-gas-con-prodoral-reparamos-sin-romper-sellafugas-domingo-isain-gasfiter-certificado-autorizado-sec-region-metropolitana', '/fugas-de-gas', 301);
Route::redirect('/sellado-de-fugas-de-gas-con-prodoral-reparamos-sin-romper-sellafugas-domingo-isain-gasfiter-certificado-autorizado-sec-chicureo', '/gasfiter-sec', 301);
Route::redirect('/wp-content/uploads/2023/06/marca-registrada-SellafuGas-Domingo-Isain.pdf', '/registro_instalgaschile.pdf', 301);

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
