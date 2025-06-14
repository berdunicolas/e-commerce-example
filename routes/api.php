<?php

use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CatalogApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Middleware\EnsureCorrectAuthModel;
use App\Http\Middleware\RejectSessionAuthForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// For Admin Users
Route::middleware(['auth:sanctum', EnsureCorrectAuthModel::class.':web'])->name('api.')->group(function () {
    Route::apiResource('categories', CategoryApiController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    Route::apiResource('products', ProductApiController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

});


// For Businesses
Route::middleware(['auth:sanctum', RejectSessionAuthForApi::class, EnsureCorrectAuthModel::class.':business'])->name('api.')->group(function () {
    Route::get('catalog', [CatalogApiController::class, 'catalog'])->name('catalog');

    Route::controller(CartApiController::class)->group(function () {
        Route::get('cart', 'cart')->name('cart');
        Route::put('cart/items/add', 'addToCart')->name('addToCart');
        Route::delete('cart/items/{item}', 'removeFromCart')->name('removeFromCart');
    });
    
    Route::get('businesses/businessinfo/', function (Request $request) {
        return $request->user();
    })->name('businessinfo');

});