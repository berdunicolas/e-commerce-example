<?php

use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryApiController::class)->middleware(['auth:sanctum'])->only(['index', 'store', 'show', 'update', 'destroy']);