<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Models\Product;
use Illuminate\Http\Response;

class CatalogApiController extends Controller
{
    public function catalog()
    {
        return response()->json(CatalogResource::collection(Product::all()), Response::HTTP_OK);
    }
}