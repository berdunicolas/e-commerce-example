<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:500'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'stock' => ['required', 'numeric', 'between:0,99999999.99'],
            'unit' => ['required', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'stock_alert_threshold' => ['required', 'numeric', 'between:0,99999999.99'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated();
        $validated['description'] = $validated['description'] ?? '';
        return $validated;        
    }
}
