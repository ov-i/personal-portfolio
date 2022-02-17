<template>
    <div>
        <div class="counter">
            <h3 class="font-medium text-dark-700 text-4xl xl:text-5xl">{{ number }}</h3>
            <p class="font-light italic text-dark-200 xl:text-lg">{{ content }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AdminCounter',
    props: ['number', 'content']
}
</script>

<style scoped>
.counter {
    @apply bg-white rounded-md shadow-md w-11/12 mx-auto md:w-full
    flex flex-col items-center justify-evenly px-5 py-7 font-primary;
}
</style>
