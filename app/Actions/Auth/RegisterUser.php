<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class RegisterUser
{
    /**
     * creates new user
     *
     * @param array $data
     * @return Authenticatable|MessageBag|User
     * @throws QueryException
     */
    public function __invoke(array $data): Authenticatable|MessageBag|User
    {
        $validator = Validator::make($data, [
            'nick' => ['string', 'min:3', 'max:255', 'required'],
            'email' => ['email', 'unique:users', 'required', 'min:5', 'max:255'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        if ($validator->fails())
            return $validator->errors();

        $nick = htmlspecialchars($data['nick']);
        $email = htmlspecialchars($data['email']);

        try {
            $user =  User::create([
                'nick' => $nick,
                'email' => $email,
                'password' => Hash::make($data['password'])
            ]);

            return $user;
        } catch (QueryException $exception) {
            throw new QueryException($exception->getSql(), $exception->getBindings(), $exception->getPrevious());
        }
    }
}
