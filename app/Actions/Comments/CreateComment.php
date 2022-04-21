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
            'post_id' => ['required', 'exists:posts,id', 'numeric'],
            'comment' => ['required', 'min:10', 'max:300', 'string'],
        ]);

        if ($validator->fails())
        return $validator->errors();
        
        $saveAuthorAs = $this->getAuthor();
        return Comment::create([
            'author' => $saveAuthorAs,
            'post_id' => $data['post_id'],
            'comment' => $data['comment'],
            'published' => (new AuthController())->isAdmin()
        ]);
    }

    /**
     * gets the author nick if user did not passed his firstname or lastname
     * 
     * @return string
     */
    private function getAuthor() 
    {
        if (auth()->user()->toggle_nick_display)
            return auth()->user()->nick;
        else
            return auth()->user()->firstname . ' ' . auth()->user()->lastname;
    }
}
