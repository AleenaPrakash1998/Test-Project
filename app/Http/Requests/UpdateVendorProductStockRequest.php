<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorProductStockRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
        ];
    }
}
