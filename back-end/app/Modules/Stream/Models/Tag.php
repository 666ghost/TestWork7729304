<?php

namespace App\Modules\Stream\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @var string[]  */
    protected $fillable = ['name'];

    /**
     * @return BelongsToMany
     */
    public function stream(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class, 'stream_tag');
    }
}
