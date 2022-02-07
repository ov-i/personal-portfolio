<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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
            'tags',
        ]));
    }

    public function show(Post $post)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $comments = $post->comments()->get();

        return view('blog.show', compact([
            'post',
            'categories',
            'tags',
            'comments'
        ]));
    }

    public function categories(Category $category)
    {
        $categories_posts = $category->posts()->paginate(10);
        $categories = Category::get();
        $tags = Tag::get();

        return view('blog.categories', compact([
            'category',
            'categories_posts',
            'categories',
            'tags',
        ]));
    }

    public function tags(Tag $tag)
    {
        $posts = Post::get();
        $tags_posts = $tag->posts()->paginate(10);
        $categories = Category::get();
        $tags = Tag::get();

        return view('blog.tags', compact([
            'tag',
            'tags_posts',
            'categories',
            'tags',
        ]));
    }
}
