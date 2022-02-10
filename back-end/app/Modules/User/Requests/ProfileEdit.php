<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEdit extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'current_confirmation' => 'current_password:sanctum'
        ];
    }
}
