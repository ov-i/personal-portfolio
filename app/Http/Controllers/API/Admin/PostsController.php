<?php

namespace App\Http\Controllers\API\Admin;

use App\Actions\Posts\CreatePost;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = Post::get();
        if (count($posts) === 0)
            return response()->json(['error' => true, 'posts' => []], 404);

        return response()->json(['error' => false, 'posts' => $posts], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CreatePost $createPost
     * @return JsonResponse
     */
    public function store(Request $request, CreatePost $createPost): JsonResponse
    {
        $post = $createPost($request->all());
        if ($post instanceof MessageBag)
            return response()->json(['error' => true, 'message' => $post], 400);

        return response()->json(['error' => false, 'post' => $post], 201);
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return JsonResponse \Http\Response
     */
    public function show(Post $post): JsonResponse
    {
        if (!$post->id)
            return response()->json(['error' => true, 'message' => "Could not find post with id = {$post->id}"]);

        return response()->json(['error' => false, 'post' => $post]);
    }

    /**
     * Publishes post
     * @param Post $post
     * @return JsonResponse
     */
    public function publishPost(Post $post): JsonResponse
    {
        if ($post->published)
            return response()->json(['error' => true, 'message' => 'Could not publish already published post'], 400);

        $post->published = true;
        $post->save();

        return response()->json(['error' => false], 200);
    }

    /**
     * UnPublishes post
     * @param Post $post
     * @return JsonResponse
     */
    public function unPublishPost(Post $post): JsonResponse
    {
        if (!$post->published)
            return response()->json(['error' => true, 'message' => 'Could not unPublish already unPublished post'], 400);

        $post->published = false;
        $post->save();

        return response()->json(['error' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        return response()->json(['error' => false, 'message' => 'Ok']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        if (!$post->id)
            return response()->json(['error' => true, 'message' => 'Could not delete un-existing post']);

        $post->delete();
        return response()->json(['error' => false]);
    }
}
