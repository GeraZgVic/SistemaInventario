<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentoController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inventory/{id}', [DashboardController::class, 'show'])->name('inventory.show');
    Route::get('/inventory/history/{id}', [DashboardController::class, 'showHistory'])->name('history.show');
    Route::get('/users', [UserController::class, 'index'])->middleware('can:users.index')->name('users.index');
    
    Route::get('/dashboard/documento-excel', [DocumentoController::class, 'export'])->name('documento.excel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
