<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Public routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Admin routes
Route::middleware(['web'])->group(function () {
    Route::get('/admin/dashboard', [PortfolioController::class, 'dashboard'])->name('portfolio.dashboard');
    Route::get('/admin/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/admin/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/admin/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/admin/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/admin/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
});
