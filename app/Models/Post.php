<?php

namespace App\Models;

use App\Traits\BelongsToAttachments;
use App\Traits\BelongsToCategory;
use App\Traits\BelongsToTags;
use App\Traits\BelongsToUser;
use App\Traits\HasManyComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToUser;
    use BelongsToCategory;
    use HasManyComments;
    use BelongsToAttachments;
    use BelongsToTags;

    protected $fillable = [
        'likes',
        'thumbnail_url',
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'description',
        'published',
    ];
}
