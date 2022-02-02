<template>
    <article aria-label="about me heading" id="about-me-heading">
        <h2 class="about-heading">
            <span class="about-header">{{ header }}</span>
            <span class="about-title">
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
    .about-heading {
        @apply relative text-center z-10 font-semibold;
    }

    .about-header {
        @apply opacity-20 uppercase text-dark-100 md:text-8xl text-7xl;
    }

    .about-title {
        @apply absolute capitalize z-20 text-dark-700 top-1/2 left-1/2 md:text-3xl
            text-xl transform -translate-x-1/2 -translate-y-1/2 opacity-90 font-semibold;
    }
</style>
