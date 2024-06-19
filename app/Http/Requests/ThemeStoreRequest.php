<?php

namespace App\Http\Requests;

use App\Rules\ColorCode;
use Illuminate\Foundation\Http\FormRequest;

class ThemeStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:themes,name'],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'banner_image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'menu_name' => ['required'],
            'menu_name.*' => ['string'],
            'text_heading' => ['required', 'string', new ColorCode],
            'text_title' => ['required', 'string', new ColorCode],
            'text_body' => ['required', 'string', new ColorCode],
            'button_primary' => ['required', 'string', new ColorCode],
            'button_secondary' => ['required', 'string', new ColorCode],
            'dashboard' => ['required', 'string', new ColorCode],
            'menu' => ['required', 'string', new ColorCode],
            'navbar' => ['required', 'string', new ColorCode],
            'is_default' => ['nullable', 'boolean'],
        ];
    }
}
