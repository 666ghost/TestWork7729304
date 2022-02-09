<?php

namespace App\Modules\User\Entities;

use App\Entities\ModelEntity;
use App\Modules\User\Models\Role;

class RoleEntity extends ModelEntity
{

    protected function model(): string
    {
        return Role::class;
    }
}
