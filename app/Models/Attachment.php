<?php

namespace App\Models;

use App\Traits\BelongsToPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToPost;

    protected $fillable = [
        'post_id',
        'name',
        'source',
        'mimetype',
        'file_size',
    ];
}
