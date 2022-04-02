@extends('layouts.blog')

@section('title', 'Blog')

@section('content')
    <section class="w-full font-primary">
        <div class="posts-heading pb-10 text-xl text-blog-dirty-white">
            <a href="{{ route('blog.index') }}" class="flex items-center hover:text-blog-accent transition duration-200 ease-linear">
                <span class="iconify pr-2 text-2xl" data-icon="akar-icons:arrow-back"></span>
                <h2 class="font-normal">Wróć do wpisów</h2>
            </a>
        </div>
        <div class="post-wrapper">
            <article class="post pb-7 first:pt-0 pt-10 last:border-none border-b border-background-accent">
                <div class="posts-thumbnail pb-7">
                    <img src="{{ $post->thumbnail_url }}" alt="thumbnail">
                </div>
                <div class="post-title">
                    <h1 class="post-title-header">
                        {{ $post->title }}
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
                    <div class="call-to-action pt-5 flex flex-row items-center">
                        <div class="action">
                            <div class="inner-action flex items-center flex-row mx-2">
                                <span class="iconify text-2xl" data-icon="fa-regular:comment"></span>
                                <p class="counter ml-1 font-light italic font-primary text-sm">
                                    {{ $comments->count() }}
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
                    <div class="post-content py-3 md:py-5">
                        {!! $post->content !!}
                    </div>
                </div>
            </article>
        </div>
        <article class="comments pb-20 md:pb-0" role="article">
            <div class="comments-heading pb-4">
                <h2 class="comments-header text-2xl">Dyskusja ({{ $comments->count() }})</h2>
            </div>
            @foreach($comments as $comment)
            <div class="comment py-4 border-b border-dirty-white first:pt-5 last:border-none font-primary" role="note">
                <div class="comment-info">
                    <h3 class="text-base font-medium text-dark-200">{{ $comment->author }}</h3>
                    <p class="font-light italic text-dark-200 text-sm">{{ $comment->created_at }}</p>
                </div>
                <div class="comment-content py-4 font-normal text-dark-200 leading-7 tracking-widest text-dark-3 text-sm">
                    {{ $comment->comment }}
                </div>
            </div>
            @endforeach

            @auth
                <div class="comment-form pt-10 pb-0 md:pb-10">
                    <comment-post />
                </div>

            @else
                <div class="user-not-signed py-12">
                    <a href="" class="login-route">
                        Dołącz do dyskusji
                    </a>
                </div>
            @endauth
        </article>

        <div class="post-tags w-10/12 retina:w-7/12 mb-4 mt-7">
            <h3 class="text-2xl font-medium border-b">tagi</h3>
            @foreach($post->tags()->get() as $tag)
                <div class="flex items-center flex-wrap mt-2">
                    <div class="p-2 mr-3 my-2 rounded-md bg-blured-blog-accent flex items-center justify-center text-white">
                        <span class="text-sm font-medium">#{{ $tag->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
<script>
    import CommentPost from "../../js/components/CommentPost";
    export default {
        components: {CommentPost}
    }
</script>
