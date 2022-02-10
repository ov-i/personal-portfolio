<template>
    <div>
        <div class="action-item py-3"  v-for="item in items" :key="item.id">
            <router-link :to="item.href" class="block p-3">
                <span class="link-wrap flex flex-row items-center">
                    <Icon :icon="item.icon" class="text-3xl self-start"></Icon>
                    {{ item.name }}
                </span>
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
