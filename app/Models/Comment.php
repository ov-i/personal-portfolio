<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToUser;
    use BelongsToPost;

    protected $fillable = [
        'author',
        'post_id',
        'comment',
        'published'
    ];
}
