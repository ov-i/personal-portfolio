<template>
    <div v-for="tag in tags" class="flex items-center flex-wrap">
        <div class="p-2 mr-3 my-2 rounded-md bg-dark-300 flex items-center justify-center text-white">
            <span class="text-sm font-light">#{{ tag.name }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "TagItem",
    props: {
        tags: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
