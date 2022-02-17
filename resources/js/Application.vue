<template>
    <section class="admin-panel">
        <div class="admin-panel-wrapper flex items-start relative">
            <div class="navigation-panel">
                <div class="actions flex flex-col items-center relative">
                    <sidebar-item-wrapper />
                </div>
            </div>
            <div class="administration-panel w-full overflow-y-scroll h-screen">
                <router-view></router-view>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions } from "vuex";
import { Icon } from '@iconify/vue'
import SidebarItemWrapper from "./components/SidebarItems/SidebarItemWrapper";

export default {
    name: "Application",
    components: {
        Icon,
        SidebarItemWrapper,
    },
    setup() {
        return { ...mapActions(['fetchUsers']) }
    },
    async created() {
        await this.fetchUsers()
    }
}
</script>

<style scoped>
.admin-panel .admin-panel-wrapper .navigation-panel {
    @apply w-full retinax2:w-2/12 lg:w-3/12 md:w-5/12 bg-blog-accent
        h-screen mr-4 absolute left-0 top-0 md:relative hidden md:block;
}
</style>
