<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyPosts
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
