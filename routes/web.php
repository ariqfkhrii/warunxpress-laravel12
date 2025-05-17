<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('/')->group(function () {
    Route::get('', [ProductController::class, 'index']);
});
