<template>
    <div>
        <div class="action-item py-2 first:mt-3 h-3/4"  v-for="item in items" :key="item.id">
            <router-link :to="item.href" class="block p-2 text-center">
                <span class="link-wrap flex flex-row items-center text-center">
                    <Icon :icon="item.icon" class="text-3xl retina:text-4xl self-start pr-2"></Icon>
                    {{ item.name }}
                </span>
            </router-link>
        </div>
        <div class="divider"></div>
    </div>
</template>

<script>
import { items } from './items'
import { Icon } from "@iconify/vue";

export default {
    name: "SidebarItem",
    components: {
        Icon
    },
    setup() {
        return { items }
    }
}
</script>

<style scoped>

</style>
