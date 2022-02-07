@extends('layouts.blog')

@section('title', 'Blog')

@section('content')
    <div class="font-primary flex flex-col md:flex-row items-start justify-evenly md:justify-between pt-10 md:pt-14 px-3 md:px-0">
        <section class="w-full font-primary">
            <div class="posts-heading pb-10 text-xl text-blog-dirty-white">
                <span class="iconify" data-icon="akar-icons:arrow-back"></span>
                <h2 class="font-normal">Wróć do wpisw</h2>
            </div>
            <div class="post-wrapper">
                <article class="post pb-7 first:pt-0 pt-10 last:border-none border-b border-background-accent">
                    <div class="post-title">
                        <a href="{{ route('blog.show', ['post' => $post->id]) }}">
                            <h1 class="post-title-header">
                                {{ $post->title }}
                            </h1>
                        </a>
                    </div>
                    <div class="post-info flex flex-row font-light italic text-sm items-center">
                        <div class="author md:mr-2 mr-1">
                            @foreach($post->users()->get() as $author)
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
                        <div class="tags">
                            @foreach($post->tags()->get()->take(2) as $tag)
                                <span class="font-light italic text-xs">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="call-to-action pt-8 flex flex-row items-center">
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="fa-regular:comment"></span>
                                    <p class="counter ml-1 font-light italic font-primary text-sm">14</p>
                                </div>
                            </div>
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="flat-color-icons:like"></span>
                                    <p class="counter ml-1 font-light italic font-primary text-sm">22</p>
                                </div>
                            </div>
                            <div class="action">
                                <div class="inner-action flex items-center flex-row mx-2">
                                    <span class="iconify text-2xl" data-icon="ci:share-outline"></span>
                                    <p class="counter ml- font-light italic font-primary text-sm">3</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-content py-7">
                            {!! $post->content !!}
                        </div>
                    </div>
                </article>
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
@endsection
