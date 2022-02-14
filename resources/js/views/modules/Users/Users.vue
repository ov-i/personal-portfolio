<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <div v-if="getFetchErrors.status === 404">
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center">
                {{ getFetchErrors.message }}
            </h1>
        </div>

        <section class="admin-content-wrapper" v-else>
            <article class="admin-heading">
                <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Użytkownicy</h2>
            </article>

            <div class="users w-full mt-10 h-96 overflow-scroll rounded-md shadow-md">
                <table class="users-table w-full text-left border border-dark-20 bg-white shadow-md relative" v-if="getUsers.length > 0">
                    <thead class=" py-5">
                        <tr class="bg-blog-accent text-white">
                            <th class="py-5 px-4">nazwa</th>
                            <th class="py-5 px-4">imię</th>
                            <th class="py-5 px-4">nazwisko</th>
                            <th class="py-5 px-4">zablokowany</th>
                            <th class="py-5 px-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="user in getUsers"
                            :key="user.id"
                            :class="{'bg-red-darken text-white': user.banned}"
                            class="border cursor-pointer border-dirty-white hover:bg-blog-accent-lighten hover:text-white transition duration-200 ease-linear">
                                <td class="p-3">{{ user.nick }}</td>
                                <td class="p-3">{{ user.firstname }}</td>
                                <td class="p-3">{{ user.lastname }}</td>
                                <td class="p-3">
                                    {{ user.banned ? 'tak' : 'nie' }}
                                </td>
                                <td class="p-3 flex items-center">
                                    <router-link
                                        :to="{name: 'UserShow', params: {id: user.id}}"
                                        class="bg-dirty-white text-dark-300 flex block mx-auto rounded-md text-white p-2 items-center">
                                            <Icon icon="akar-icons:eye" class="text-xl"/>
                                    </router-link>
                                    <router-link
                                        :to="{name: 'UserEdit', params: {id: user.id}}"
                                        class="bg-accent-darken flex block mx-auto rounded-md text-white p-2 items-center">
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
    </section>
</template>

<script>
import { Icon } from '@iconify/vue'
import { mapGetters } from 'vuex'

export default {
    name: "Users",
    components: {
        Icon,
    },
    computed: {
        ...mapGetters(['getUsers', 'getFetchErrors']),
    },
}
</script>

<style scoped>

</style>
