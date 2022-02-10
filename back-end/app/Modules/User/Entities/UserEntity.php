<?php

namespace App\Modules\User\Entities;

use App\Entities\ModelEntity;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;


class UserEntity extends ModelEntity
{

    /**
     * @return string
     */
    protected function model(): string
    {
        return User::class;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return User::create([
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'bio' => $data['bio'] ?? null,
                                'password' => Hash::make($data['password']),
                            ]);
    }
}
