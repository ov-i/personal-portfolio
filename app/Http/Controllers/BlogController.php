<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $categories = Category::get();
        $tags = Tag::get();

        return view('blog.index', compact([
            'posts',
            'categories',
            'tags'
        ]));
    }

    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }
}
