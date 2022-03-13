@extends('layouts.blog')

@section('title', 'Blog')

@section('content')
    <section class="w-full font-primary">
        <div class="posts-heading pb-10 text-xl text-blog-dirty-white">
            <h2 class="font-normal">Wszystkie wpisy</h2>
        </div>
        <div class="post-wrapper">
            @foreach($posts as $post)
                <article class="post pb-7 first:pt-0 pt-10 last:border-none border-b border-background-accent">
                    <div class="post-title">
                        <h1 class="post-title-header">
                            <a href="{{ route('blog.show', ['post' => $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </h1>
                    </div>
                    <div class="post-info flex flex-row font-light italic text-sm items-center">
                        <div class="author md:mr-2 mr-1">
                            @foreach($post->user()->get() as $author)
                                @if($author->toggle_nick_display)
                                    <span>{{ $author->nick }}</span>
                                @else()
                                    <span>{{ $author->firstname . ' ' . $author->lastname }}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="created_at md:mr-2 mr-1">
                            <span>
                                {{ date('m', strtotime($post->created_at)) }}.
                                {{ date('d', strtotime($post->created_at)) }}.
                                {{ date('Y', strtotime($post->created_at)) }}r.
                            </span>
                        </div>
                        <div class="category">
                            <span class="font-light italic text-xs md:text-base">
                                {{ $post->category()->first()->name }}
                            </span>
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="call-to-action pt-8 flex flex-row items-center">
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="fa-regular:comment"></span>
                                    <p class="counter ml-1 font-light italic font-primary text-sm">
                                        {{ $post->comments()->get()->count() }}
                                    </p>
                                </div>
                            </div>
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="flat-color-icons:like"></span>
                                    <p class="counter ml-1 font-light italic font-primary text-sm">
                                        {{ $post->likes }}
                                    </p>
                                </div>
                            </div>
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="ci:share-outline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="post-description">
                            <p class="leading-8 tracking-widest font-regular text-dark-200 text-sm pt-4 text-justify">
                                {{ $post->description }}
                            </p>
                        </div>

                        <div class="read-more pt-7">
                            <a href="{{ route('blog.show', ['post' => $post->slug]) }}" class="text-accent-darken font-medium">
                                Czytaj artykuł &raquo;
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        {{ $posts->links() }}
    </section>
@endsection
