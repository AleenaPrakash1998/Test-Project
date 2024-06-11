<?php

namespace App\Http\Requests;

use App\Models\Theme;
use App\Rules\ColorCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThemeUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('theme');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Theme::class)->ignore($this->route('theme')),
            ],
            'logo' => ['required', 'file', 'mimes:png,jpg,jpeg,gif'],
            'banner_image' => ['required', 'file', 'mimes:png,jpg,jpeg,gif'],
            'menu_name' => ['required', 'array'],
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
