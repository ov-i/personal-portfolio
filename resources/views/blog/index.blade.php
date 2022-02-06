@extends('layouts.blog')

@section('title', 'Blog')

@section('content')
    <div class="font-primary flex flex-col md:flex-row items-start justify-evenly md:justify-between pt-10 md:pt-14 px-3 md:px-0">
        <section class="w-full font-primary">
            <div class="posts-heading pb-10 text-xl text-blog-dirty-white">
                <h2 class="font-normal">Wszystkie wpisy</h2>
            </div>
            <div class="post-wrapper">
                @foreach($posts as $post)
                    <article class="post pb-10 first:pt-0 pt-10 last:border-none border-b border-background-accent">
                        @foreach($post->tags()->get() as $tag)
                            <div>
                                <p class="font-light italic">{{ $tag->name }}</p>
                            </div>
                        @endforeach
                        <a href="">
                            <h1 class="text-3xl font-medium">{{ $post->title }}</h1>
                        </a>
                        @foreach($post->users()->get() as $author)
                            @if($author->toggle_nick_display)
                                <span>{{ $author->nick }}</span>
                            @else()
                                <span>{{ $author->firstname . ' ' . $author->lastname }}</span>
                            @endif
                        @endforeach
                        <p class="font-light italic">{{ $post->description }}</p>
                    </article>
                @endforeach
            </div>

        </section>
        <section class="sidebars w-1/2 md:pl-32 mx-auto">
            <!-- all categories -->
            <div class="sidebar pb-14">
                <h3 class="font-normal text-lg text-dark-200 leading-8 pb-3 md:text-xl tracking-wide">Wszystkie kategorie</h3>
                <ul>
                    @foreach($categories as $category)
                        <li class="font-light italic text-base text-dark-150 leading-7">
                            <a href="">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar pb-14">
                <h3 class="font-normal text-lg text-dark-200 leading-8 pb-3 md:text-xl tracking-wide">Wszystkie tagi</h3>
                <ul>
                    @foreach($tags as $tag)
                        <li class="font-light italic text-base text-dark-150 leading-7">
                            <a href="">
                                #{{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="sidebar pb-14">
                <h3 class="font-normal text-lg text-dark-200 leading-8 pb-3 md:text-xl tracking-wide">Topowi autorzy</h3>
                <ul>
                    <li class="font-light italic text-base text-dark-150 leading-7">
                        <a href="">
                            overmind
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
        {{ $posts->links() }}
@endsection
