<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <div v-if="getFetchErrors.status === 404">
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center" v-if="getFetchErrors">
                {{ getFetchErrors.message }}
            </h1>
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center" v-else>
                Problem z przetwarzaniem danych
            </h1>
        </div>

        <section class="admin-content-wrapper h-screen" v-else>
            <!-- admin heading -->
            <article class="admin-heading">
                <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">
                    Wszystkie wpisy
                </h2>
            </article>

            <!-- TODO: Add filter / group by controls -->

            <article class="posts w-full mt-6" v-if="posts">
                <!-- single post -->
                <div class="post" v-for="post in posts" :key="post.id">
                    <div class="post-wrapper" v-if="post.slug">
                        <!-- post info -->
                        <div class="post-info">
                            <span class="created-at font-light italic text-dark-200">
                                {{ new Date(post.created_at).toLocaleString() }}
                            </span>
                            <h3 class="post-title pt-2 pb-4">
                                <router-link
                                    :to="{name: 'PostShow', params: {slug: post.slug}}"
                                    class="post-title-link">
                                    {{ post.title }}
                                </router-link>
                            </h3>
                            <p class="post-description">
                                {{ post.description }}
                            </p>
                        </div>
                        <div class="post-actions">
                            <div class="icons flex items-center">
                                <div class="icon preview-post">
                                    <Icon icon="akar-icons:eye" />
                                </div>

                                <div class="icon preview-post">
                                    <Icon icon="akar-icons:edit" />
                                </div>

                                <div class="icon preview-post" v-if="post.published">
                                    <Icon icon="ic:outline-done" />
                                </div>

                                <div class="icon preview-post" v-else>
                                    <Icon icon="bi:x-lg" />
                                </div>

                                <div class="icon preview-post">
                                    <Icon icon="akar-icons:trash-can" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </section>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'
import { mapGetters } from 'vuex'
import { Icon } from '@iconify/vue';

export default {
    name: 'Posts',
    components: {
        Icon,
        'editor': Editor,
    },
    setup() {
        const mce_plugins = [
            `autolink lists link image charmap print preview hr anchor pagebreak,
            searchreplace wordcount visualblocks visualchars code fullscreen,
            insertdatetime media nonbreaking save table directionality,
            emoticons template paste textpattern color_cols color_map`
        ]

        return { mce_plugins }
    },
    computed: {
        ...mapGetters(['getFetchErrors', 'posts']),
    },
}
</script>

<style scoped>
.posts .post .post-wrapper {
    @apply h-full w-full border-b border-dirty-white justify-between
    last:border-none py-7 flex items-start flex-col-reverse lg:flex-row border-l-green-500;
}

.preview-post {
    @apply text-2xl px-1 first:pl-0 lg:first:pl-2 pb-5 lg:pb-0;
}

.post-title-link {
    @apply text-2xl font-medium tracking-widest leading-6
    text-blog-accent hover:text-blog-accent-lighten duration-200 ease-linear;
}

.post-description {
    @apply text-sm font-normal italic text-dark-200 w-full
    lg:w-11/12 xl:w-10/12 tracking-widest leading-6 text-justify xl:text-left;
}
</style>
