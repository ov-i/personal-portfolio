<template>
    <div class="comment-form-inner relative">
        <textarea
            name="new_comment"
            id="comment" rows="7"
            class="form-textarea w-full block rounded-sm shadow-md text-sm tracking-widest"
            placeholder="Co Ci chodzi po głowie?"
            @input="increaseCounter()"
            v-model="comment"
            maxlength="300"
        ></textarea>
        <p class="counter text-xs font-normal text-dark-200 md:absolute md:bottom-2 md:right-2 z-20 text-right md:text-left pt-2 md:pt-0" :class="{'text-red': commentLength >= 300}">
            Liczba słów: {{ commentLength }}/300
        </p>
    </div>
    <div class="call-to-action md:flex md:justify-between md:items-center">
        <div></div>
        <button :disabled="comment.length === 0" class="comment-btn">
            skomentuj
        </button>
    </div>
</template>

<script>
export default {
    name: "CommentPost",
    data: () => ({
       comment: '',
       commentLength: 0
    }),
    methods: {
        increaseCounter() {
            if (!this.comment.trim().length)
                this.commentLength = 0

            this.commentLength = this.comment.trim().length
        }
    }
}
</script>

<style scoped>

</style>
