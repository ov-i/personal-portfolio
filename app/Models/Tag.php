<?php

namespace App\Models;

use App\Traits\BelongsToPosts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use BelongsToPosts;

    protected $fillable = [
      'name'
    ];
}
