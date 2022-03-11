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
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate \Http\Response
     */
    public function show(Post $post)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Post  $post
     * @return JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        return response()->json(['error' => false, 'message' => 'Ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
