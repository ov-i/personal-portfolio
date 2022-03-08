<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToRoles
{
    public function roles(): BelongsToMany
    {
        return $this
            ->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id')
            ->withTimestamps();
    }
}
