<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request, Post $post, Tag $tag)
    {
        $inputValue = $request->input('search');

        $result = $post->where('title', 'like', '%'.$inputValue.'%')->get();
        if (count($result) === 0) {
            return back()->with('notfound', 'Nie znaleziono wpisu: '.$inputValue);
        }

        $tags_posts = $tag->posts()->paginate(10);
        $categories = Category::get();
        $tags = Tag::get();

        return view('blog.search', compact([
            'tags_posts',
            'tag',
            'tags',
            'categories',
            'result',
        ]));
    }
}
