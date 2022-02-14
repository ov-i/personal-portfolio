<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Użytkownicy</h2>
        </article>

        <div class="users w-full mt-10 h-96 overflow-scroll">
            <table class="users-table w-full text-left border border-dark-20 bg-white shadow-md">
                <thead>
                    <tr>
                        <th class="p-3">nazwa</th>
                        <th class="p-3">imię</th>
                        <th class="p-3">nazwisko</th>
                        <th class="p-3">zablokowany</th>
                        <th class="p-3">role</th>
                        <th class="p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in getUsers.users" :key="user.id">
                        <td class="p-3">{{ user.nick }}</td>
                        <td class="p-3">{{ user.firstname }}</td>
                        <td class="p-3">{{ user.lastname }}</td>
                        <td class="p-3">{{ user.banned ? 'tak' : 'nie' }}</td>
                        <td class="p-3">['admin', 'user']</td>
                        <td class="p-3 flex items-center">
                            <router-link :to="{name: 'UserEdit', params: {id: user.id}}" class="bg-accent-darken flex block mx-auto rounded-md text-white p-2 items-center">
                                <Icon icon="akar-icons:edit" class="text-xl"></Icon>
                            </router-link>
                            <button class="bg-red flex block mx-auto rounded-md text-white p-2 items-center">
                                <Icon icon="fluent:delete-20-regular" class="text-xl"></Icon>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script>
import { Icon } from '@iconify/vue'
import { computed } from 'vue'
import { mapGetters } from 'vuex'

export default {
    name: "Users",
    components: {
        Icon,
    },
    computed: {
        ...mapGetters(['getUsers']),
    },
}
</script>

<style scoped>

</style>
