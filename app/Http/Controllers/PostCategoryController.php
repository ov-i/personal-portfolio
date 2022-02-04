<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Category $category)
    {
        $posts = new Post();
        $post = $posts->find(1);
        $tags = $post->tags()->count();
        dd($tags);

//        $posts = $category
//            ->posts()
//            ->where('published', '=', 1)
//            ->get();
//
//        if (count($posts) === 0)
//            return view('blog.index')->with('no_content', 'Nie odnaleziono postów o podanej kategorii');
//
//        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Post $post, $slug)
    {
        $single = Post::where('slug', '=', $slug)->first();

        return view('blog.show', compact([
            'single',
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
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
