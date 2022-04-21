<template>
    <div v-for="comment in comments">
        <div class="comment py-4 border-b border-dirty-white first:pt-5 last:border-none font-primary" role="note">
            <div class="comment-info">
                <h3 class="text-base font-medium text-dark-200">{{ comment.author }}</h3>
                <p class="font-light italic text-dark-200 text-sm">{{ comment.created_at }}</p>
            </div>
            <div class="comment-content py-4 font-normal text-dark-200 leading-7 tracking-widest text-dark-3 text-sm">
                {{ comment.comment }}
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "FetchComments",
    computed: {
        ...mapGetters({
            comments: 'getComments'
        })
    }
}
</script>

<style scoped>

</style>
