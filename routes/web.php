<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('/')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('products.index');
});

Route::prefix('products')->group(function() {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{product}', [ProductController::class, 'show'])
        ->where('product', '[0-9]+')
        ->name('products.show');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])
        ->where('product', '[0-9]+')
        ->name('products.destroy');
});