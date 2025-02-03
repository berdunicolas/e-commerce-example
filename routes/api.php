<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;


Route::name('api.')->group(function () {
    Route::apiResource('categories', CategoryApiController::class)->middleware(['auth:sanctum'])->only(['index', 'store', 'show', 'update', 'destroy']);
    Route::apiResource('products', ProductApiController::class)->middleware(['auth:sanctum'])->only(['index', 'store', 'show', 'update', 'destroy']);
});