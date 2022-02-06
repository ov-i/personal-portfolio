@extends('layouts.blog')

@section('title', 'Blog')

@section('content')
    <section class="md:w-10/12 w-full font-primary flex flex-row md:flex-col justify-evenly md:justify-between items-center md:items-start pt-20">
        <div class="post-wrapper">
            @foreach($posts as $post)
                <article class="post py-10 border-b border-background-accent">
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

        {{ $posts->links() }}
    </section>
@endsection
