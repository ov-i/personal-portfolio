<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Użytkownicy</h2>
        </article>

        <div class="users w-full mt-10 h-72 overflow-scroll">
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
                    <tr>
                        <td class="p-3">overmind</td>
                        <td class="p-3">Bartosz</td>
                        <td class="p-3">Pazdur</td>
                        <td class="p-3">nie</td>
                        <td class="p-3">['admin', 'user']</td>
                        <td class="p-3 flex items-center">
                            <button class="bg-accent-darken flex block mx-auto rounded-md text-white p-2 items-center">
                                <Icon icon="akar-icons:edit" class="text-xl"></Icon>
                            </button>
                            <button class="bg-red flex block mx-auto rounded-md text-white p-2 items-center">
                                <Icon icon="fluent:delete-20-regular" class="text-xl"></Icon>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-3">króliczek</td>
                        <td class="p-3">Aleksandra</td>
                        <td class="p-3">Piąta</td>
                        <td class="p-3">nie</td>
                        <td class="p-3">['admin', 'user']</td>
                        <td class="p-3 flex items-center">
                            <button class="bg-accent-darken flex block mx-auto rounded-md text-white p-2 items-center">
                                <Icon icon="akar-icons:edit" class="text-xl"></Icon>
                            </button>
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
import { mapActions } from 'vuex'

export default {
    name: "Users",
    components: {
        Icon,
    },
    setup() {
        return {
            ...mapActions([
                'fetchUsers'
            ])
        }
    },
    async created() {
        await this.fetchUsers()
    }
}
</script>

<style scoped>

</style>
