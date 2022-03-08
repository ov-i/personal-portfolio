<?php

namespace App\Traits;

use App\Models\Post;

trait BelongsToPosts
{
    public function posts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this
            ->belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id')
            ->withTimestamps();
    }
}
