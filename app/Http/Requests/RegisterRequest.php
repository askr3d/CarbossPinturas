<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name',
            'email'=> 'required|unique:users,email',
            'password'=> 'required|min:3',
            'password_confirmation'=> 'required|same:password',
        ];
    }
}
