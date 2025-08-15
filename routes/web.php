<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VoucherController;

// Mostrar formulario para revisar cupón
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/revisarcupon', [ClienteController::class, 'create'])
        ->name('cliente.create');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('dashboard', function () {
            return Inertia::render('dashboard');
        })->name('dashboard');
    });
    // Mostrar formulario de voucher
    // Route::get('/voucher', function () {
    //     return Inertia::render('voucher');
    // })->name('voucher');
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');


    // Guardar voucher
    Route::post('/voucher', [VoucherController::class, 'store'])
        ->name('voucher.store');
});

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
