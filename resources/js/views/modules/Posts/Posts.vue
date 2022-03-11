<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <div v-if="getFetchErrors.status === 404" class="mb-6">
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center" v-if="getFetchErrors">
                {{ getFetchErrors.message }}
            </h1>
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center" v-else>
                Brak danych
            </h1>
        </div>

        <!-- admin heading -->
        <article class=" admin-content-wrapper admin-heading flex justify-between items-center">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">
                Wszystkie wpisy
            </h2>
            <section class="add-action" v-if="getFetchErrors.status === 404">
                <router-link :to="{name: 'PostCreate'}" class="add-action-button">
                    Dodaj nowy
                </router-link>
            </section>
        </article>

        <section class="admin-content-wrapper h-screen" v-if="!getFetchErrors.status">
            <article class="add-action w-full flex justify-between items-center pt-6 pb-3" role="article">
                <div class="flex flex-col md:flex-row items-start">
                    <label for="group-published" class="block mb-4 md:mr-4" v-if="categories.length">
                        Według kategorii <br>
                        <select v-model="group_by_categories" id="group-by-categories" @change="groupCategories()" class="text-lg">
                            <option value="wszystkie" selected>-- wszystkie --</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </label>
                    <label for="group-published" class="block mb-4 md:mr-4" v-if="posts.length > 1">
                        Według daty <br>
                        <select v-model="group_by_date" id="group-by" @change="sortByDate()" class="text-lg">
                            <option value="wszystkie" selected disabled>-- wszystkie --</option>
                            <option value="najnowsze">najnowsze</option>
                            <option value="najstarsze">najstarsze</option>
                        </select>
                    </label>
                    <label for="group-published" class="block">
                        Według stanu <br>
                        <select v-model="group_published" id="group-published" @change="fetchByGroupPublished()" class="text-lg">
                            <option value="wszystkie" selected disabled>-- wszystkie --</option>
                            <option value="opublikowane">opublikowane</option>
                            <option value="nieopublikowane">nieopublikowane</option>
                        </select>
                    </label>
                </div>
                <router-link :to="{name: 'PostCreate'}" class="add-action-button">
                    Dodaj nowy
                </router-link>
            </article>

            <article class="posts w-full mt-6">
                <h3 class="font-medium text-2xl text-center text-dark-300" v-if="no_data">Brak danych</h3>
                <!-- single post -->
                <div class="post" v-for="(post, index) in posts" :key="post.id">
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

                                <div class="icon preview-post cursor-pointer" v-if="!post.published" @click="publishPost(post)">
                                    <Icon icon="ic:outline-done" />
                                </div>

                                <div class="icon preview-post cursor-pointer" v-else @click="unPublishPost(post)">
                                    <Icon icon="bi:x-lg" />
                                </div>

                                <div class="icon preview-post cursor-pointer" @click="deletePost({id: index, post: post})">
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
import {mapActions, mapGetters} from 'vuex'
import { Icon } from '@iconify/vue';

export default {
    name: 'Posts',
    components: {
        Icon,
        'editor': Editor,
    },
    data: () => ({
        group_published: 'wszystkie',
        group_by_date: 'wszystkie',
        group_by_categories: 'wszystkie',
        no_data: false
    }),
    methods: {
        async fetchByGroupPublished() {
            this.group_by_date = 'wszystkie'
            await this.fetchPosts()
            let posts = this.posts
            let filtered = null;

            if (this.group_published === 'opublikowane'
                &&
                (this.group_by_categories !== 'wszystkie' && this.group_by_categories !== null))
            {
                this.$store.commit('FETCH_POSTS', posts)
                filtered = posts.filter(post => post.published && post.category_id === parseInt(this.group_by_categories))
                this.$store.commit('FETCH_POSTS', filtered)
            } else if(this.group_published === 'nieopublikowane'
                &&
                (this.group_by_categories !== 'wszystkie' && this.group_by_categories !== null))
            {

                this.$store.commit('FETCH_POSTS', posts)
                filtered = posts.filter(post => !post.published && post.category_id === parseInt(this.group_by_categories))
                this.$store.commit('FETCH_POSTS', filtered)
            } else if(this.group_published === 'opublikowane' && this.group_by_categories === 'wszystkie' )
            {
                this.$store.commit('FETCH_POSTS', posts)
                filtered = posts.filter(post => post.published)
                this.$store.commit('FETCH_POSTS', filtered)
            } else {
                this.$store.commit('FETCH_POSTS', posts)
                filtered = posts.filter(post => !post.published)
                this.$store.commit('FETCH_POSTS', filtered)
            }

            this.no_data = !filtered.length || !filtered;
        },
        sortByDate() {
            let posts = this.posts
            this.$store.commit('FETCH_POSTS', posts.sort((prev, next) => {
                if(this.group_by_date === 'najnowsze' && prev.created_at >= next.created_at)
                    return -1
                else if (this.group_by_date === 'najstarsze' && prev.created_at <= next.created_at)
                    return -1
            }))
        },
        async groupCategories() {
            this.group_published = 'wszystkie'
            await this.fetchPosts()
            let posts = this.posts
            this.$store.commit('FETCH_POSTS', posts)

            if (this.group_by_categories === 'wszystkie') {
                this.$store.commit('FETCH_POSTS', posts)
                return
            }

            const filtered = posts.filter(post => post.category_id === parseInt(this.group_by_categories))
            this.no_data = !filtered.length || !filtered;

            this.$store.commit('FETCH_POSTS', filtered)
        }
    },
    setup() {
        const mce_plugins = [
            `autolink lists link image charmap print preview hr anchor pagebreak,
            searchreplace wordcount visualblocks visualchars code fullscreen,
            insertdatetime media nonbreaking save table directionality,
            emoticons template paste textpattern color_cols color_map`
        ]

        return {
            mce_plugins,
            ...mapActions({
                fetchPosts: 'fetchPosts',
                publishPost: 'publishPost',
                unPublishPost: 'unPublishPost',
                deletePost: 'deletePost',
            })
        }
    },
    computed: {
        ...mapGetters({
            getFetchErrors: 'getFetchErrors',
            posts: 'posts',
            categories: 'getCategories'
        }),
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

.add-action .add-action-button {
    @apply bg-blog-accent rounded-md shadow-md uppercase text-white text-sm
    font-medium hover:bg-blog-accent-lighten transition duration-200 ease-linear p-3;
}
</style>
