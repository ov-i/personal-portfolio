<template>
    <section class="admin-panel">
        <nav class="admin-nav p-4 bg-white shadow-md w-full" role="navigation" aria-label="navigation">
            <div class="nav-toggler">
                <Icon icon="la:bars" class="iconify text-4xl z-20" />
            </div>
        </nav>
        <div class="admin-panel-wrapper flex items-start relative">
            <div class="navigation-panel w-full retina:w-1/12 md:w-4/12 bg-blog-accent h-screen mr-4 absolute left-0 top-0 md:relative hidden md:block">
                <div class="actions flex flex-col items-center">
                    <SidebarItemWrapper />
                </div>
            </div>
            <div class="administration-panel">
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
