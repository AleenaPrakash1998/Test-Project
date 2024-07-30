<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
