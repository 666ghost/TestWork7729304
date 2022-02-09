<?php

namespace App\Modules\Stream\Entities;

use App\Entities\ModelEntity;
use App\Modules\Stream\Models\Tag;

class TagEntity extends ModelEntity
{

    protected function model(): string
    {
        return Tag::class;
    }
}
