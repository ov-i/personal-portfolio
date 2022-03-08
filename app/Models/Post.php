<?php

namespace App\Models;

use App\Traits\BelongsToCategory;
use App\Traits\BelongsToComments;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToUser;
    use BelongsToCategory;
    use BelongsToComments;

    protected $fillable = [
        'likes',
        'thumbnail_url',
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'description',
        'published'
    ];

    public function attachments(): BelongsToMany
    {
        return $this
            ->belongsToMany(Attachment::class, 'attachments_posts', 'post_id', 'attachment_id')
            ->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this
            ->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id')
            ->withTimestamps();
    }
}
