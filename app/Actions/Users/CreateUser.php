<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public function __invoke(array $data): User
    {
        return User::create([
            ...$data,
            'password' => Hash::make($data['password'])
        ]);
    }
}
