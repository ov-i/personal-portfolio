<template>
    <section class="admin-content main-content p-6 font-primary">
        <div class="admin-content-wrapper">
            <article class="admin-heading">
                <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Użytkownicy</h2>
            </article>

            <article class="filters w-full mt-3" role="article">
                <div class="filter-banned">
                    <label for="banned">Dostęp</label>
                    <select name="banned" id="banned" class="block" v-model="access" @change="sortByBanned">
                        <option selected disabled>--wybierz opcje--</option>
                        <option value="default">wszystkich</option>
                        <option value="true">zablokowany</option>
                        <option value="false">odblokowany</option>
                    </select>
                </div>
                <div class="filter-name mt-5">
                    <input type="text" class="form-input w-full" placeholder="Znajdź użytkownika" v-model="filterValue" @input="filterUsers">
                </div>
            </article>
        </div>

        <h3 class="font-medium text-2xl text-dark-300 text-center mt-2" v-if="noData">Brak danych</h3>

        <section class="admin-content-wrapper" v-else>
            <div class="users w-full mt-10 h-full rounded-md shadow-md" v-if="getUsers.length > 0">
                <table class="users-table w-full text-left border border-dark-20 bg-white shadow-md relative">
                    <thead class=" py-5">
                        <tr class="bg-blog-accent text-white">
                            <th class="py-5 px-4 flex items-center cursor-pointer" @click="sortAlphabetically">
                                nazwa
                                <div class="icon" v-if="!sortedAlphabetically">
                                    <Icon icon="bi:arrow-down" />
                                </div>
                                <div class="icon" v-else>
                                    <Icon icon="bi:arrow-up" />
                                </div>
                            </th>
                            <th class="py-5 px-4">imię</th>
                            <th class="py-5 px-4">nazwisko</th>
                            <th class="py-5 px-4">zablokowany</th>
                            <th class="py-5 px-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(user, index) in getUsers"
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
                                        :to="{name: 'UserEdit', params: {id: user.id}}"
                                        class="bg-accent-darken flex block mx-auto rounded-md text-white p-2 items-center hover:bg-accent transition duration-200 ease-linear">
                                            <Icon icon="akar-icons:edit" class="text-xl"></Icon>
                                    </router-link>
                                    <button class="bg-red flex block mx-auto rounded-md text-white p-2 items-center hover:bg-red-darken transition duration-200 ease-linear" @click="deleteUser({ id: index, user_id: user.id })">
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
import { mapActions, mapGetters } from 'vuex'

export default {
    name: "Users",
    data: () => ({
       access: 'default',
       filterValue: '',
       noData: false,
       sortedAlphabetically: false
    }),
    methods: {
        ...mapActions(['deleteUser', 'fetchUsers']),
        async filterUsers() {
            await this.fetchUsers()

            const results = this.getUsers.filter(user => user.nick.toLowerCase().indexOf(this.filterValue.toLowerCase()) !== -1)
            !results.length ? this.noData = true : this.noData = false

            this.$store.commit('FETCH_USERS', results)
        },
        async sortAlphabetically() {
            const users = this.getUsers

            if(this.sortedAlphabetically) {
                await this.fetchUsers()
                this.sortedAlphabetically = false
                return
            }

            this.$store.commit('FETCH_USERS', users.sort((firstUser, secondUser) => {
                this.sortedAlphabetically = true
                return firstUser.nick < secondUser.nick ? -1 : 1
            }))
        },
        async sortByBanned() {
            await this.fetchUsers()
            const users = this.getUsers

            if (this.access === 'default') {
                await this.fetchUsers()
            } else if (this.access === 'true') {
                const results = users.filter(user => user.banned)
                if (!results.length)
                    return

                this.$store.commit('FETCH_USERS', results)
            } else {
                const results = users.filter(user => !user.banned)
                if (!results.length)
                    return

                this.$store.commit('FETCH_USERS', results)
            }
        }
    },
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
