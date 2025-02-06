<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'code' => ['required', 'string', 'max:20', 'unique:products,code'],
            'name' => ['required', 'string', 'max:100', 'unique:products,name'],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'stock' => ['required', 'numeric', 'between:0,99999999.99'],
            'unit' => ['required', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'stock_alert_threshold' => ['required', 'numeric', 'between:0,99999999.99'],
            'image' => 'nullable|file|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated();
        $validated['description'] = $validated['description'] ?? '';
        return $validated;        
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'errors' => $validator->errors()
        ], 422));
    }
}
