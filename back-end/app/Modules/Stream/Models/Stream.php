<?php

namespace App\Modules\Stream\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Stream extends Model
{
    /** @var string[]  */
    protected $fillable = ['name', 'description', 'link', 'preview', 'start_time', 'end_time', 'status', 'author_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'stream_tag');
    }
}
