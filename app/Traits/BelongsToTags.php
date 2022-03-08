<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToTags
{
    public function tags(): BelongsToMany
    {
        return $this
            ->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id')
            ->withTimestamps();
    }
}
