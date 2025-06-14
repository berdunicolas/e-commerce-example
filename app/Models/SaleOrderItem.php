<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleOrderItem extends Model
{
    protected $fillable = [
        'sale_order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function updatePrice() {
        if($this->price !== $this->product->price) {
            $this->price = $this->product->price;
            $this->save();
        }
    }
}