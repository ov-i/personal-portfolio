<?php

namespace App\Models;

use App\Traits\HasManyPosts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasManyPosts;

    protected $fillable = [
        'name'
    ];
}
