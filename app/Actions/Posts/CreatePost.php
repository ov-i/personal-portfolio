<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreatePost
{
    public function __invoke(Request $request, array $data): Post
    {
        $validator = Validator::make($data, [
            'thumbnail_url' => ['required', 'url'],
            'user_id' => ['exists:users', 'required', 'integer'],
            'category_id' => ['exists:categories', 'required', 'integer'],
            'title' => ['required', 'unique:posts', 'min:10', 'max:50', 'string'],
            'slug' => ['required', 'alpha_dash'],
            'description' => ['required', 'string', 'min:20', 'max:255'],
            'content' => ['required', 'string', 'min:50', 'max:10000'],
            'published' => ['boolean']
        ]);

        if ($validator->fails())
            response()->json(['error' => true, 'message' => $validator->errors()], 400);

        $tags = $request['tags'] ?? null;
        $attachments = $request['attachments'] ?? null;

        $post = Post::create($data);
        if ($tags !== null) {
            $post_tags = $post->tags()->sync($tags);

            response()->json(['error' => false, 'post' => $post, 'tags' => $post_tags], 201);
        }

        if ($attachments !== null) {
            $post_attachments = $post->attachments()->sync($attachments);

            response()->json(['error' => false, 'post' => $post, 'attachments' => $post_attachments], 201);
        }

        response()->json(['error' => false, 'post' => $post]);
    }
}
