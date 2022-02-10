<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'bio' => 'nullable|min:10',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
