<?php

namespace App\Modules\Stream\Entities;

use App\Entities\ModelEntity;
use App\Modules\Stream\Models\Stream;

class StreamEntity extends ModelEntity
{

    protected function model(): string
    {
        return Stream::class;
    }
}
