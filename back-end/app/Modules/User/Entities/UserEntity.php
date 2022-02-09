<?php

namespace App\Modules\User\Entities;

use App\Entities\ModelEntity;
use App\Modules\User\Models\User;

class UserEntity extends ModelEntity
{

    protected function model(): string
    {
        return User::class;
    }
}
