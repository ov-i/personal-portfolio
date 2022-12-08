<?php

namespace App\Http\Controllers;

use App\Actions\Comments\CreateComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CreateComment  $createComment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateComment $createComment)
    {
        $comment = $createComment($request->all());
        if ($comment instanceof MessageBag) {
            return response()->json(['error' => true, 'message' => $comment->getMessages()], 400);
        }

        if ((new AuthController())->isAdmin()) {
            Session::flash('success', 'Dodano nowy komentarz!');
        } else {
            Session::flash('success', 'Twój komentarz musi zostać zaakceptowany!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
