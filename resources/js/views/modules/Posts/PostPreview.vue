<template>
    <section class="admin-content main-content p-6 font-primary">
        <div class="posts-heading pb-10 text-xl">
            <router-link :to="{name: 'Posts'}" class="flex items-center text-blog-accent transition duration-200 ease-linear">
                <Icon class="pr-2 text-2xl" icon="akar-icons:arrow-back" />
                <h2 class="font-normal">Wróć do wpisów</h2>
            </router-link>
        </div>
        <div class="show-preview w-full pt-3 flex items-start flex-col xl:flex-row">
            <div class="post-sheet w-full 2xl:w-9/12 xl:pr-6">
                <div class="post-wrapper" v-if="post && post.post">
                    <article class="post pb-7 first:pt-0 pt-10 last:border-none border-b border-background-accent">
                        <div class="posts-thumbnail pb-7" v-if="post.post">
                            <img :src="post.post.thumbnail_url" alt="thumbnail">
                        </div>
                        <div class="post-title">
                            <h1 class="post-title-header">
                                {{ post.post.title }}
                            </h1>
                        </div>
                        <div class="post-info flex flex-row font-light italic text-sm items-center">
                            <div class="author md:mr-2 mr-1" v-if="post.author">
                                <span v-if="post.author.toggle_nick_display">{{ post.author.nick }}</span>
                                <span v-else>{{ post.author.firstname + ' ' + post.author.lastname }}</span>
                            </div>
                            <div class="created_at md:mr-2 mr-1">
                                <span>{{ new Date(post.post.created_at).toLocaleString() }}</span>
                            </div>
                            <div class="tags" v-if="post.tags.length > 0">
                            <span class="font-light italic text-xs" v-for="tag in post.tags.slice(0, 2)">
                                #{{ tag.name }}
                            </span>
                            </div>
                        </div>
                        <div class="post-body" id="post-body">
                            <div id="post-content" class="post-content py-3 md:py-5" v-html="post.post.content"></div>
                        </div>
                    </article>
                </div>
                <div class="flex items-center justify-center" v-else>
                    <h1 class="text-center text-3xl">Nie odnaleziono posta</h1>
                </div>
            </div>

            <!-- post sidebars -->
            <div class="post-sidebars w-full lg:w-10/12 xl:w-5/12 retina:w-4/12 mx-auto xl:mx-0 pt-6 lg:pt-8 xl:pt-0">
                <!-- single sidebar -->
                <div class="post-sidebar" v-if="post.post">
                    <h3 class="text-3xl font-medium text-blog-accent pb-2 border-b border-dirty-white">Dostępna akcja</h3>
                    <div class="action mt-4">
                        <button v-if="post.post.published" class="p-3 bg-blog-accent text-white font-medium text-sm rounded-sm">Zdejmij</button>
                        <button v-else class="p-3 bg-blog-accent text-white font-medium text-sm rounded-sm">Opublikuj</button>
                    </div>
                    <!-- TODO: add modal where admin can see all attachments and select one. Select URL from it from laravel API  -->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapGetters} from "vuex";
import {Icon} from "@iconify/vue";

export default {
    name: "PostPreview",
    components: {
        Icon,
    },
    computed: {
        post() {
            return { ...this.getPost }
        },

        ...mapGetters({
            getPost: 'post'
        })
    }
}
</script>

<style>
.post-title-header {
    @apply text-3xl font-medium text-dark-200 hover:text-blog-accent transition duration-200 ease-linear;
}

/* post content styles */
.post-body .post-content > p {
    @apply leading-8 tracking-widest font-normal text-dark-200 text-sm pt-4 pb-4 text-justify md:text-left px-2 md:px-0 break-words;
}

.post-body .post-content > img {
    @apply rounded-sm py-5 md:py-7;
}

.post-body .post-content p > a {
    @apply text-accent hover:text-blog-accent-lighten transition duration-200 ease-linear;
}

.post-body .post-content h1 {
    @apply text-2xl pt-5;
}

.post-body .post-content h2 {
    @apply text-2xl pt-3;
}

.post-sidebar {
    @apply bg-white rounded-md shadow-md p-4 mb-7;
}

.sidebar-heading {
    @apply font-medium text-base retina:text-2xl lg:text-lg leading-6 tracking-wide border-b border-dirty-white pb-2;
}
</style>
