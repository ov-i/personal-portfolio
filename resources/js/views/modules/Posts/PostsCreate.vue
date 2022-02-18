<template>
    <section class="main-content admin-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Nowy wpis</h2>
        </article>

        <article class="save-action flex items-center justify-between">
            <div></div>
            <button class="add-action-button">
                Zapisz zmiany
            </button>
        </article>

        <article class="add-new w-full pt-10 flex items-start md:flex-row " role="article">
            <section class="post-sheet w-full pr-4">
                <div class="post-sheet-inner">
                    <editor :api-key="mce_apikey" :plugins="mce_plugins" class="w-full h-96"/>
                </div>
            </section>
            <div class="post-sidebars w-full md:w-4/12">
                <!-- single sidebar -->
                <div class="post-sidebar">
                    <h3 class="sidebar-heading">Dodaj miniaturkę</h3>
                    <!-- TODO: add modal where admin can see all attachments and select one. Select URL from it from laravel API  -->
                    <div class="action-sidebar pt-3">
                        <input type="text" class="form-input w-full" placeholder="url miniaturki">

                        <div class="flex items-center justify-between pt-3">
                            <div></div>
                            <button class="add-action-button ">dodaj</button>
                        </div>
                    </div>
                </div>

                <!-- single sidebar -->
                <div class="post-sidebar">
                    <h3 class="sidebar-heading">Kategorie</h3>
                    <div class="action-sidebar pt-3">
                        <div class="actions">
                            <div class="action block">
                                <input type="radio" name="category" id="programming" value="1"> Programownie
                            </div>
                            <div class="action block">
                                <input type="radio" name="category" id="security" value="2"> Bezpieczeństwo
                            </div>
                            <div class="action block">
                                <input type="radio" name="category" id="courses" value="3"> Kursy
                            </div>
                            <div class="action block">
                                <input type="radio" name="category" id="ittalks" value="4"> ITTalks
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
                                <input type="checkbox" name="category" id="programming_tag" value="1"> programowanie
                            </div>
                            <div class="action block">
                                <input type="checkbox" name="category" id="tech_tag" value="2"> tech
                            </div>
                            <div class="action block">
                                <input type="checkbox" name="category" id="blog_tag" value="3"> blog
                            </div>
                            <div class="action block">
                                <input type="checkbox" name="category" id="education" value="4"> rozwój
                            </div>
                        </div>

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
import {mapGetters} from "vuex";

export default {
    name: "Posts",
    components: {
        Icon,
        'editor': Editor
    },
    setup() {
        const mce_plugins = [
            `autolink lists link image charmap print preview hr anchor pagebreak,
            searchreplace wordcount visualblocks visualchars code fullscreen,
            insertdatetime media nonbreaking save table directionality,
            emoticons template paste textpattern`
        ]

        return { mce_plugins }
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
    @apply font-medium text-2xl leading-6 tracking-wide border-b border-dirty-white pb-2;
}
</style>
