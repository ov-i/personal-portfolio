<template>
    <article aria-label="about me heading" id="about-me-heading">
        <h2 class="relative text-center z-10 font-semibold">
            <span class="opacity-20 uppercase text-dark-100 md:text-9xl text-7xl">{{ header }}</span>
            <span class="absolute capitalize z-20 text-dark-700 top-1/2 left-1/2 md:text-4xl text-3xl transform -translate-x-1/2 -translate-y-1/2 opacity-90 font-semibold">
                {{ title }}
                <div class="divider w-1/4 p-0.5 mt-2 bg-accent mx-auto"></div>
            </span>
        </h2>
    </article>
</template>

<script>
export default {
    name: "SectionHeader",
    props: {
        title: {
            type: String,
            required: true
        },
        header: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
