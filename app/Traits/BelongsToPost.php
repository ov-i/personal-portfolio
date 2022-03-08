<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToPost
{
    public function posts(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
