<?php

namespace App\Actions\Roles;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class CreateRole
{
    /**
     * creates new role
     *
     * @param  array  $data
     * @return MessageBag|Role
     */
    public function __invoke(array $data): MessageBag|Role
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'unique:roles', 'max:45', 'min:3'],
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return Role::create([
            ...$data,
        ]);
    }
}
