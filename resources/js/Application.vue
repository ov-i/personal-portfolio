<template>
    <section class="admin-panel">
        <nav class="admin-nav p-4 bg-white shadow-md w-full flex items-center justify-around" role="navigation" aria-label="navigation">
            <div class="nav-toggler">
                <Icon icon="la:bars" class="iconify text-4xl z-20" />
            </div>
            <div class="logout">
                <router-link to="/logout" class="block text-dark-200">
                    <div class="flex items-center hover:text-blog-accent transition duration-200 ease-linear">
                        <Icon icon="cil:account-logout" class="text-2xl pr-2"></Icon>
                        Wyloguj się
                    </div>
                </router-link>
            </div>
        </nav>
        <div class="admin-panel-wrapper flex items-start relative">
            <div class="navigation-panel w-full retina:w-1/12 md:w-2/12 bg-blog-accent h-screen mr-4 absolute left-0 top-0 md:relative hidden md:block">
                <div class="actions flex flex-col items-center relative">
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
