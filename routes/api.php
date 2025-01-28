<?php

use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryApiController::class, 'index']);