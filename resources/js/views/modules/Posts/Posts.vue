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
            <article class="add-action w-full flex justify-between items-start lg:items-center pt-6 pb-3" role="article">
                <div class="flex flex-col lg:flex-row items-start">
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

            <article class="search-wrapper" role="article" aria-label="search toolbar">
                <input type="text" class="form-input w-full" placeholder="szukaj postów" @input="filterSearch()" v-model="search_input">
            </article>

            <article class="posts w-full mt-6">
                <h3 class="font-medium text-2xl text-center text-dark-300" v-if="no_data">Brak danych</h3>
                <!-- single post -->
                <div class="post" v-for="(post, index) in posts" :key="post.id">
                    <div class="post-wrapper" v-if="post.slug">
                        <!-- post info -->
                        <div class="post-info">
                            <span class="created-at font-light italic text-dark-200">
                                {{ dateLocale(post.created_at) }}
                                <i v-if="postCategory(post.category_id)">
                                    {{ postCategory(post.category_id) }}
                                </i>
                            </span>
                            <h3 class="post-title pt-2 pb-4" v-if="post.published">
                                <a
                                    :href="`/blog/wpisy/${post.slug}`"
                                    class="post-title-link"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                    {{ post.title }}
                                </a>
                            </h3>
                            <h3 class="post-title pt-2 pb-4" v-if="!post.published">
                                <router-link
                                    :to="{name: 'PostPreview', params: {id: post.id}}"
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
                                <router-link :to="{name: 'PostPreview', params: {id: post.id}}" class="icon" @click="fetchPost(post)">
                                    <Icon icon="akar-icons:eye" class="text-dark-700"></Icon>
                                </router-link>

                                <div class="icon">
                                    <Icon icon="akar-icons:edit" />
                                </div>

                                <div class="icon hover:text-blue-600" title="opublikuj" v-if="!post.published" @click="publishPost(post)">
                                    <Icon icon="ic:outline-done" />
                                </div>

                                <div class="icon hover:text-red" title="zdejmij" v-else @click="unPublishPost(post)">
                                    <Icon icon="bi:x-lg" />
                                </div>

                                <div class="icon hover:text-red-darken" title="usuń" @click="deletePost({id: index, post: post})">
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
import {mapActions, mapGetters} from 'vuex'
import { Icon } from '@iconify/vue';

export default {
    name: 'Posts',
    components: {
        Icon,
    },
    data: () => ({
        group_published: 'wszystkie',
        group_by_date: 'wszystkie',
        group_by_categories: 'wszystkie',
        no_data: false,
        search_input: '',
    }),
    methods: {
        ...mapActions({
            fetchPosts: 'fetchPosts',
            fetchPost: 'fetchPost',
            publishPost: 'publishPost',
            unPublishPost: 'unPublishPost',
            deletePost: 'deletePost',
        }),

        /**
         * fetches posts by published or not
         * @return {Promise<void>}
         */
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

        /**
         * sorts by data
         * @return {number}
         */
        sortByDate() {
            let posts = this.posts
            this.$store.commit('FETCH_POSTS', posts.sort((prev, next) => {
                if(this.group_by_date === 'najnowsze' && prev.created_at >= next.created_at)
                    return -1
                else if (this.group_by_date === 'najstarsze' && prev.created_at <= next.created_at)
                    return -1
            }))
        },

        /**
         * groups posts with passed categories
         * @returns {Promise<void>}
         */
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
        },

        /**
         * gets relationship between post and category
         * @param post_category_id {number}
         * @returns {null | string}
         */
        postCategory(post_category_id) {
            const post_category = this.categories.find(category => category.id === post_category_id)
            if (!post_category)
                return null

            return post_category.name;
        },
        /**
         * filters posts with input
         * @return {Promise<void>}
         */
        async filterSearch() {
            await this.fetchPosts()

            const results = this.posts.filter(post => post.title.toLowerCase().indexOf(this.search_input.toLowerCase()) !== -1)
            !results.length ? this.no_data = true : this.no_data = false

            this.$store.commit('FETCH_POSTS', results)
        },

        /**
         * transforms passed date to Date string localeString
         * @param date {Date}
         * @return {string}
         */
        dateLocale(date) {
            return new Date(date).toLocaleString()
        },
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

.icon {
    @apply preview-post cursor-pointer duration-300 transition ease-in-out;
}
</style>
