<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    /**
     * returns posts data
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $posts = Post::query()
            ->orderBy('id')
            ->where('published', '=', true)
            ->paginate(10);
        $categories = Category::query()->get();
        $tags = Tag::query()->get();

        return view('blog.index', compact([
            'posts',
            'categories',
            'tags',
        ]));
    }

    public function show(Post $post)
    {
        $categories = Category::query()->get();
        $tags = Tag::query()->get();

        $comments = $post->comments()->where('published', '=', true)->get();

        return view('blog.show', compact([
            'post',
            'categories',
            'tags',
            'comments',
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
