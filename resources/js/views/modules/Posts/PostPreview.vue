<template>
<!--    <section class="w-full font-primary">-->
<!--        <div class="posts-heading pb-10 text-xl text-blog-dirty-white">-->
<!--            <a href="{{ route('blog.index') }}" class="flex items-center hover:text-blog-accent transition duration-200 ease-linear">-->
<!--                <span class="iconify pr-2 text-2xl" data-icon="akar-icons:arrow-back"></span>-->
<!--                <h2 class="font-normal">Wróć do wpisów</h2>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="post-wrapper">-->
<!--            <article class="post pb-7 first:pt-0 pt-10 last:border-none border-b border-background-accent">-->
<!--                <div class="posts-thumbnail pb-7">-->
<!--                    <img src="{{ $post->thumbnail_url }}" alt="thumbnail">-->
<!--                </div>-->
<!--                <div class="post-title">-->
<!--                    <h1 class="post-title-header">-->
<!--                        {{ $post->title }}-->
<!--                    </h1>-->
<!--                </div>-->
<!--                <div class="post-info flex flex-row font-light italic text-sm items-center">-->
<!--                    <div class="author md:mr-2 mr-1">-->
<!--                        @foreach($post->user()->get() as $author)-->
<!--                        @if($author->toggle_nick_display)-->
<!--                        <span>{{ $author->nick }}</span>-->
<!--                        @else()-->
<!--                        <span>{{ $author->firstname . ' ' . $author->lastname }}</span>-->
<!--                        @endif-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                    <div class="created_at md:mr-2 mr-1">-->
<!--                        <span>-->
<!--                            {{ date('m', strtotime($post->created_at)) }}.-->
<!--                            {{ date('d', strtotime($post->created_at)) }}.-->
<!--                            {{ date('Y', strtotime($post->created_at)) }}r.-->
<!--                        </span>-->
<!--                    </div>-->
<!--                    <div class="tags">-->
<!--                        @foreach($post->tags()->get()->take(2) as $tag)-->
<!--                        <span class="font-light italic text-xs">#{{ $tag->name }}</span>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="post-body">-->
<!--                    <div class="call-to-action pt-5 flex flex-row items-center">-->
<!--                        <div class="action">-->
<!--                            <div class="inner-action flex items-center flex-row mx-2">-->
<!--                                <span class="iconify text-2xl" data-icon="fa-regular:comment"></span>-->
<!--                                <p class="counter ml-1 font-light italic font-primary text-sm">-->
<!--                                    {{ $comments->count() }}-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="action">-->
<!--                            <div class="inner-action flex items-center flex-row mx-2">-->
<!--                                <span class="iconify text-2xl" data-icon="flat-color-icons:like"></span>-->
<!--                                <p class="counter ml-1 font-light italic font-primary text-sm">-->
<!--                                    {{ $post->likes }}-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="action">-->
<!--                            <div class="inner-action flex items-center flex-row mx-2">-->
<!--                                <span class="iconify text-2xl" data-icon="ci:share-outline"></span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="post-content py-3 md:py-5">-->
<!--                        {!! $post->content !!}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </article>-->
<!--        </div>-->
<!--    </section>-->
</template>

<script>
export default {
    name: "PostPreview"
}
</script>

<style scoped>

</style>
