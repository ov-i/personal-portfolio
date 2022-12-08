<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class CreatePost
{
    /**
     * Creates new post with $data passed
     *
     * @description If tags or attachments were not passed in request, create just pure post
     *
     * @param  array  $data
     * @return Post| MessageBag | array
     */
    public function __invoke(array $data): Model|MessageBag|array
    {
        $validator = Validator::make($data, [
            'likes' => ['integer'],
            'thumbnail_url' => ['required', 'url'],
            'user_id' => ['exists:users,id', 'required', 'integer'],
            'category_id' => ['exists:categories,id', 'required', 'integer'],
            'title' => ['required', 'unique:posts', 'min:10', 'max:50', 'string'],
            'slug' => ['required', 'alpha_dash'],
            'description' => ['required', 'string', 'min:20', 'max:255'],
            'content' => ['required', 'string', 'min:50', 'max:10000'],
            'published' => ['boolean'],
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $tags = $data['tags'] ?? null;
        $attachments = $data['attachments'] ?? null;

        $post = Post::query()->create($data);

        if ($tags !== null) {
            $post_tags = $post->tags()->sync($tags);

            return ['post' => $post, 'tags' => $post_tags['attached']];
        }

        if ($attachments !== null) {
            $post_attachments = $post->attachments()->sync($attachments);

            return ['post' => $post, 'attachments' => $post_attachments['attached']];
        }

        return $post;
    }
}
