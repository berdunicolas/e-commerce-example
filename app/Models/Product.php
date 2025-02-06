<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasMedia;

    protected bool $allowsMultipleMedia = false;

    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'stock',
        'unit',
        'discount',
        'category_id',
        'stock_alert_threshold',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventoryLogs()
    {
        return $this->hasMany(InventoryLogs::class);
    }
}
