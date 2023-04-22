<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class UniqueUserUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // dd('¡???');
        // Revisa si la URL ya existe para el usuario actual
        $url = Auth::user()->urls()->firstWhere('url', $value);
        if ($url) {
            $fail('the :attribute already exists.');
        }
    }
}
