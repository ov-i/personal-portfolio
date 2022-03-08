<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToUsers
{
    public function users(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'users_roles', 'user_id', 'role_id')
            ->withTimestamps();
    }
}
