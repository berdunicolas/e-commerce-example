<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\SaleOrderItem;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CartApiController extends Controller
{

    public function cart() {
        
        $uuid = Cookie::get('cart');

        $cart = SaleOrder::where('uuid', $uuid)->first();

        if($cart !== null){
            $cart->updateTotal();

            return response()->json(new CartResource($cart), Response::HTTP_OK);
        }
        
        return response()->json(CartResource::collection([]), Response::HTTP_OK);
    }

    public function addToCart(AddToCartRequest $addToCartRequest) {

        $data = $addToCartRequest->validated();
        try {
            $data['uuid'] = Cookie::get('cart');

            $cart = SaleOrder::where('status', 'IN_CART')->where('uuid', $data['uuid'])->firstOr(function () {
                $data['uuid'] = Str::uuid();

                return SaleOrder::create([
                    'uuid' => $data['uuid'],
                    'status' => 'IN_CART',
                    'total_price' => 0,
                ]);
            });

            $product = Product::find($data['item_id']);

            SaleOrderItem::updateOrCreate(
                [ 'sale_order_id' => $cart->id, 'product_id' => $product->id, ],
                [ 'quantity' => $data['quantity'], 'price' => $product->price ]
            );

            $cart->refresh();
            $cart->updateTotal();

            Cookie::queue('cart', $cart->uuid, 60 * 24 * 7);

            return response()->json(['message' => 'Added to cart'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error adding item to cart'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function removeFromCart($item) {
        try {
            $uuid = Cookie::get('cart');

            $cart = SaleOrder::where('uuid', $uuid)->first();
    
            if($cart !== null){
                $item = $cart->orderItems()->where('product_id', $item)->first();
    
                $item->delete();
                $cart->updateTotal();
            }    
    
            return response()->noContent(Response::HTTP_OK);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error deleting product'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}