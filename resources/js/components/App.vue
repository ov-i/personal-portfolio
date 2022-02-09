<template>
    <section class="admin-panel">
        <nav class="admin-nav fixed mb-20 p-4 bg-white shadow-md w-full" role="navigation" aria-label="navigation">
            <div class="nav-toggler">
                <Icon icon="la:bars" class="iconify text-4xl z-20" data-icon="la:bars"></Icon>
            </div>
        </nav>
        <div class="admin-panel-wrapper flex items-center">
            <div class="navigation-panel w-full md:w-4/12 bg-blog-accent h-screen">

            </div>
            <div class="administration-panel"></div>
        </div>
    </section>
</template>

<script>
import { Icon } from '@iconify/vue2'

export default {
    name: "App.vue",
    components: {
        Icon,
    }
}
</script>

<style scoped>

</style>
