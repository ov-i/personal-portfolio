<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Wszystkie wpisy</h2>
        </article>

        <div class="users w-full mt-10 h-72 overflow-scroll">
        </div>
    </section>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'

export default {
    name: 'Posts',
    components: {
        'editor': Editor
    },
    setup() {
        const mce_plugins = [
            `autolink lists link image charmap print preview hr anchor pagebreak,
            searchreplace wordcount visualblocks visualchars code fullscreen,
            insertdatetime media nonbreaking save table directionality,
            emoticons template paste textpattern color_cols color_map`
        ]

        return { mce_plugins }
    }
}
</script>

<style scoped>

</style>
