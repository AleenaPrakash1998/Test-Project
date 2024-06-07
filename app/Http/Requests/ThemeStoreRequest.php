<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string'|'max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png',
            'menu_name' => 'required',
            'text_heading' => 'required|string',
            'text_title' => 'required|string',
            'text_body' => 'required|string',
            'button_primary' => 'required|string',
            'button_secondary' => 'required|string',
            'dashboard' => 'required|string',
            'menu' => 'required|string',
            'navabar' => 'required|string',
            'is_default' => 'required|boolean',
        ];
    }
}
