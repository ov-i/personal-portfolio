<template>
    <section class="main-content admin-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Nowy wpis</h2>
        </article>

        <article class="save-action flex items-center justify-between pt-6">
            <div></div>
            <button class="add-action-button" @click="createPost({ new_post: post, tags, attachments })">
                Zapisz zmiany
            </button>
        </article>

        <article class="add-new w-full pt-3 flex items-start flex-col xl:flex-row" role="article">
            <!-- post sheet -->
            <section class="post-sheet w-full xl:pr-6">
                <div class="post-sheet-inner mb-3">
                    <input type="text" name="post-title" id="post-title" class="form-input w-full" placeholder="Tytuł wpisu" maxlength="50" v-model="post.title">
                    <p v-if="post.title.length > 0" class="text-xs text-dark-300 font-light italic pt-2 pb-3">
                        slug wpisu:
                        <span class="font-medium text-dark-700">{{ toSlug(post.title) }}</span>
                    </p>
                </div>
                <div class="post-sheet-inner mb-3">
                    <textarea type="text" id="post-description" class="form-textarea w-full resize-none" placeholder="Dodaj krótki opis" maxlength="255" v-model="post.description"></textarea>
                </div>
                <div class="post-sheet-inner">
                    <editor :api-key="mce_apikey" :plugins="mce_plugins" class="w-full h-96" v-model="post.content"/>
                </div>
            </section>

            <!-- post sidebars -->
            <div class="post-sidebars w-full lg:w-10/12 xl:w-5/12 retina:w-4/12 mx-auto xl:mx-0 pt-6 lg:pt-8 xl:pt-0">
                <!-- single sidebar -->
                <div class="post-sidebar">
                    <h3 class="sidebar-heading">Dodaj miniaturkę</h3>
                    <!-- TODO: add modal where admin can see all attachments and select one. Select URL from it from laravel API  -->
                    <div class="action-sidebar pt-3">
                        <input type="text" class="form-input w-full" placeholder="url miniaturki" v-model="post.thumbnail_url">
                    </div>
                </div>

                <!-- single sidebar -->
                <div class="post-sidebar">
                    <h3 class="sidebar-heading">Kategorie</h3>
                    <div class="action-sidebar pt-3">
                        <div class="actions">
                            <div class="action block">
                                <input type="radio" id="programming" value=1 v-model.number="post.category_id"> Programownie
                            </div>
                            <div class="action block">
                                <input type="radio" id="security" value=2 v-model.number="post.category_id"> Bezpieczeństwo
                            </div>
                            <div class="action block">
                                <input type="radio" id="courses" value=3 v-model.number="post.category_id"> Kursy
                            </div>
                            <div class="action block">
                                <input type="radio" id="ittalks" value=4 v-model.number="post.category_id"> ITTalks
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-3">
                            <div></div>
                            <button class="add-action-button ">dodaj</button>
                        </div>
                    </div>
                </div>

                <!-- single sidebar -->
                <div class="post-sidebar">
                    <h3 class="sidebar-heading">Tagi</h3>
                    <div class="action-sidebar pt-3">
                        <div class="actions">
                            <div class="action block">
                                <input type="checkbox" name="tags" id="security_tag" value=1 v-model="tags"> tech
                            </div>
                            <div class="action block">
                                <input type="checkbox" name="tags" id="programming_tag" value=2 v-model="tags"> programowanie
                            </div>
                            <div class="action block">
                                <input type="checkbox" name="tags" id="blog_tag" value=3 v-model="tags"> ITTalks
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-3">
                            <div></div>
                            <button class="add-action-button ">dodaj</button>
                        </div>
                    </div>
                </div>

                <div class="post-sidebar">
                    <h3 class="sidebar-heading">załączniki</h3>
                    <div class="action-sidebar pt-3">
                        <input type="file" @change="event => changeFile(event)" multiple>

                        <div class="flex items-center justify-between pt-3">
                            <div></div>
                            <button class="add-action-button ">dodaj</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</template>

<script>
import Editor from "@tinymce/tinymce-vue"
import { Icon } from "@iconify/vue"
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Posts",
    components: {
        Icon,
        'editor': Editor
    },
    data: () => ({
        post: {
            thumbnail_url: '',
            category_id: '1',
            title: '',
            slug: '',
            description: '',
            content: '',
            published: false,
        },
        tags: [],
        attachments: []
    }),
    methods: {
        toSlug(str) {
            str = str.replace(/^\s+|\s+$/g, '');

            // Make the string lowercase
            str = str.toLowerCase();

            // Remove accents, swap ñ for n, etc
            let from = "ĄÁÄÂÀÃÅČÇĆĎĘÉĚËÈÊẼĔȆÍÌÎÏŃŇÑÓÓÖÒÔÕØŘŔŠŚŤÚŮÜÙÛÝŸŽąáäâàãåčçćďéěëèêẽĕȇęłíìîïńňñóöòôõøðřŕšśťúůüùûýÿžżźþÞĐđßÆa·/_,:;<>";
            let to   = "AAAAAAACCCDEEEEEEEEEIIIINNNOOOOOOORRSSTUUUUUYYZaaaaaaacccdeeeeeeeeeliiiinnnooooooorrsstuuuuuyyzzzbBDdBAa--------";
            for (let i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            // Remove invalid chars
            str = str.replace(/[^a-z0-9 -]/g, '')
                // Collapse whitespace and replace by -
                .replace(/\s+/g, '-')
                // Collapse dashes
                .replace(/-+/g, '-');

            return str;
        },

        /**
         * Watches for files buffer changes
         * @param event
         * @returns {boolean}
         */
        changeFile(event) {
            let files = event.target.files || event.dataTransfer.files;
            if (!files.length)
                return false;

            // TODO: implement saving attachments to posts
            // console.log()
        },
    },
    watch: {
        'post.title'(newVal, oldVal) {
            this.post.slug = this.toSlug(newVal)
        }
    },
    setup() {
        const mce_plugins = [
            `autolink lists link image charmap print preview hr anchor pagebreak,
            searchreplace wordcount visualblocks visualchars code fullscreen,
            insertdatetime media nonbreaking save table directionality,
            emoticons template paste textpattern`
        ]

        return { mce_plugins, ...mapActions(['createPost']) }
    },
    computed: {
        ...mapGetters(['mce_apikey'])
    }
}
</script>

<style scoped>
.add-action-button {
    @apply bg-blog-accent rounded-md shadow-md uppercase text-white text-sm
    font-medium hover:bg-blog-accent-lighten transition duration-200 ease-linear p-3;
}

.post-sidebar {
    @apply bg-white rounded-md shadow-md p-4 mb-7;
}

.sidebar-heading {
    @apply font-medium text-base retina:text-2xl lg:text-lg leading-6 tracking-wide border-b border-dirty-white pb-2;
}
</style>
