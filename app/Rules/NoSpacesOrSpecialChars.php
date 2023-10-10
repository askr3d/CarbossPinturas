<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class NoSpacesOrSpecialChars implements Rule
{
    public function passes($attribute, $value)
    {
        // Verificar que no haya espacios o caracteres especiales
        return !preg_match('/\s/', $value) && preg_match('/^[a-zA-Z0-9]+$/', $value);
    }

    public function message()
    {
        return 'El campo :attribute no debe contener espacios ni caracteres especiales.';
    }
}
