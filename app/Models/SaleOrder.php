<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = [
        'uuid',
        'customer_id',
        'total_price',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(SaleOrderItem::class);
    }


    public function updateTotal(){
        if($this->status !== 'IN_CART') return 0;

        $total = 0;

        foreach($this->orderItems as $item){
            $item->updatePrice();
            $item->refresh();

            $total += $item->price;
        }

        if($this->total_price !== $total){
            $this->total_price = $total; 
    
            $this->save();
            $this->refresh();
        }
    }
}
