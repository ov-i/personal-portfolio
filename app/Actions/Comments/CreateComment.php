<?php

namespace App\Actions\Comments;

use App\Http\Controllers\AuthController;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class CreateComment
{
    public function __invoke(array $data): Comment | MessageBag
    {
        $validator = Validator::make($data, [
            'author' => ['required', 'min: 3', 'max; 255', 'string'],
            'post_id' => ['required', 'exists:posts,id', 'number'],
            'comment' => ['required', 'min:10', 'max:300', 'string'],
        ]);

        if ($validator->fails())
            return $validator->errors();

        return Comment::create([
            ...$data,
            'published' => (new AuthController())->isAdmin()
        ]);
    }
}
