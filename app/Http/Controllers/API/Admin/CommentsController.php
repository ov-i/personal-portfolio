<?php

namespace App\Http\Controllers\API\Admin;

use App\Actions\Comments\CreateComment;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $comments = Comment::query()->get()->only([
           'author',
           'post_id',
           'comment',
           'published',
           'created_at'
        ]);

        if (!count($comments))
            return response()->json(['error' => true, 'comments' => []], 404);

        return response()->json(['error' => false, 'comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CreateComment $createComment
     * @return JsonResponse
     */
    public function store(Request $request, CreateComment $createComment): JsonResponse
    {
        $comment = $createComment($request->all());
        if ($comment instanceof MessageBag)
            return response()->json(['error' => true, 'message' => $comment->getMessages()], 400);

        return response()->json(['error' => false, 'comment' => $comment], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
