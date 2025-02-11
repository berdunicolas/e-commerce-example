<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Middleware\EnsureCorrectAuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', EnsureCorrectAuthModel::class.':web'])->name('api.')->group(function () {
    Route::apiResource('categories', CategoryApiController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    Route::apiResource('products', ProductApiController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

});


Route::middleware(['auth:sanctum', EnsureCorrectAuthModel::class.':business'])->name('api.')->group(function () {
    Route::get('catalog')->name('catalog');
    
    Route::get('businesses/businessinfo/', function (Request $request) {
        return $request->user();
    })->name('businessinfo');

});