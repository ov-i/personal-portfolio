<template>
    <div>
        <div class="counter bg-white rounded-md shadow-md flex flex-col items-center justify-evenly px-5 py-7 font-primary">
            <h3 class="font-medium text-dark-700 text-4xl">{{ number }}</h3>
            <p class="font-light italic text-dark-200">{{ content }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminCounter",
    props: ['number', 'content']
}
</script>

<style scoped>

</style>
