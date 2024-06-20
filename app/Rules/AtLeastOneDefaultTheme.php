<?php

namespace App\Rules;

use App\Models\Theme;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AtLeastOneDefaultTheme implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $numberOfDefaults = Theme::query()
            ->where('is_default', true)
            ->count();

        if ($numberOfDefaults === 1 && !$value) {
            $fail('Cannot change default status. At least one theme must remain as default.');
        }
    }
}
