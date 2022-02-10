<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'email',
            'password' => 'min:8'
        ];
    }
}
