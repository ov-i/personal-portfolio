<?php

namespace App\Actions\Users;

use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteUser
{
    public function __invoke(User $user): void
    {
        try {
            $user->delete();
        } catch (NotFoundHttpException $notfound) {
            throw new NotFoundHttpException($notfound->getMessage());
        }
    }
}
