<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateVendorRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        $vendorId = $request->route('vendor');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($vendorId),
            ],
            'password' => ['nullable', 'string', 'min:8'],
            'confirm_password' => [
                'nullable',
                'string',
                'min:8',
                'same:password',
            ],
        ];
    }
}
