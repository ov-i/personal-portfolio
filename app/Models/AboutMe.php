<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $table = 'about_me';

    protected $fillable = [
        'about_work',
        'about_interest',
        'email',
        'cv_url',
    ];
}
