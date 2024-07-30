<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        $productId = $request->route('product');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($productId),
            ],
            'description' => 'required|string',
            'short_description' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg',
        ];
    }
}
