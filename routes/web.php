<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('/')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('products.index');
});

Route::prefix('products')->group(function() {
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});