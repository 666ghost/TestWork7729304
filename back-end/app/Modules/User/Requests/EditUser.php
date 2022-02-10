<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'roles' => 'required|array',
            'roles.*' => 'numeric|exists:roles,id'
        ];
    }
}
