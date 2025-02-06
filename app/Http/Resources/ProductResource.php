<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'unit' => $this->unit,
            'stock_alert' => $this->stock_alert_threshold,
            'category' => new CategoryResource($this->category),
            'url_item' => route('products.show', $this->id),
            'api_url_item' => route('api.products.show', $this->id),
            'image_url' => $this->getMediaUrl(),
        ];
    }
}
