<?php

namespace App\Actions\Users;

use App\Models\User;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function response;

class ShowUser
{
    public function __invoke(int $id): User
    {
        $user = null;

        try {
            $user = User::find($id);
        } catch (NotFoundHttpException $notfound) {
            response($notfound->getMessage(), 404);
        } catch (InternalErrorException $internalErrorException) {
            response($internalErrorException->getMessage(), 500);
        }

        return $user;
    }
}
