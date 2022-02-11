<template>
    <section class="admin-panel">
        <div class="admin-panel-wrapper flex items-start relative">
            <div class="navigation-panel w-full retina:w-1/12 md:w-3/12 bg-blog-accent h-screen mr-4 absolute left-0 top-0 md:relative hidden md:block">
                <div class="actions flex flex-col items-center relative">
                    <SidebarItemWrapper />
                </div>
            </div>
            <div class="administration-panel w-full">
                <router-view></router-view>
            </div>
        </div>
    </section>
</template>

<script>
import { Icon } from '@iconify/vue2'
import SidebarItemWrapper from "./components/SidebarItems/SidebarItemWrapper";

export default {
    name: "Application",
    components: {
        Icon,
        SidebarItemWrapper,
    }
}
</script>

<style scoped>

</style>
