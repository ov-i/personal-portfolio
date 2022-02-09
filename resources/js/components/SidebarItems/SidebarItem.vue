<template>
    <div>
        <div class="action-item py-3"  v-for="item in items" :key="item.id">
            <router-link :to="item.href" class="bg-white text-dark rounded-md block p-3">
                <Icon :icon="item.icon" class="text-3xl"></Icon>
            </router-link>
        </div>
    </div>
</template>

<script>
import { items } from './items'
import { Icon } from "@iconify/vue2";

export default {
    name: "SidebarItem",
    components: {
        Icon,
    },
    data: () => ({
        items,
    })
}
</script>

<style scoped>

</style>
