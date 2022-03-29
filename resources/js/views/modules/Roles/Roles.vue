<template>
    <!-- roles main section -->
    <section class="main-content admin-content roles-section p-8 font-primary">
        <!-- admin heading -->

        <article class="admin-content-wrapper border-b border-dirty-white pb-3 admin-heading flex justify-between items-center">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">
                Dostępne role
            </h2>
            <section class="add-action">
                <button class="add-action-button" @click="showCreateModal()">
                    Dodaj rolę
                </button>
            </section>
        </article>
        <section class="roles-wrapper pt-7" role="banner">
            <table class="w-full shadow-md" v-if="rolesFetch().length">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-xs text-white bg-blog-accent">
                            ID
                        </th>
                        <th class="px-6 py-4 text-xs text-white bg-blog-accent">
                            Name
                        </th>
                        <th class="px-6 py-4 text-xs text-white bg-blog-accent">
                            Akcja
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white text-center">
                    <tr class="whitespace-nowrap" v-for="(role, index) in rolesFetch()" :key="role.id">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ role.id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <p>{{ role.name }}</p>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="text-blog-accent hover:text-blog-accent-lighten transition duration-200 ease-linear font-medium" @click="deleteRole({id: index, roleId: role.id})">
                                usuń
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3 class="text-blog-accent text-3xl font-medium text-center" v-else>Brak danych</h3>
        </section>
    </section>
    <div class="bg-dark-300 opacity-90 h-screen w-screen absolute top-0 left-0 z-10" v-if="roleModal" @click="hideRoleModal()"></div>
    <section class="create-modal absolute top-1/3 left-1/2 shadow-md p-3 rounded-md bg-white z-20" v-if="roleModal">
        <h3 class="font-medium text-lg text-blog-accent border-b border-dirty-white pb-2">Nazwa roli</h3>

        <form role="form">
            <input type="text" class="form-input mb-4" v-model="role.name" autofocus required>
            <button
                class="p-3 rounded-sm shadow-md bg-blog-accent font-medium uppercase text-sm block text-white"
                @click.prevent="createRole(role); hideRoleModal()">
                Zapisz
            </button>
        </form>
    </section>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import {Icon} from "@iconify/vue/dist/iconify";

export default {
    name: "Roles",
    components: {Icon},
    data: () => ({
       roleModal: false,
       role: {
           name: ''
       }
    }),
    computed: {
        ...mapGetters({
            roles: 'getRoles'
        })
    },
    methods: {
        ...mapActions({
            createRole: 'createRole',
            deleteRole: 'deleteRole',
        }),

        /**
         *
         * @return {array<{id: number, name: string}>}
         */
        rolesFetch() {
            return this.roles
        },

        showCreateModal() {
            this.roleModal = true
        },

        hideRoleModal() {
            this.roleModal = false
        }
    }
}
</script>

<style scoped>
.add-action .add-action-button {
    @apply bg-blog-accent rounded-md shadow-md uppercase text-white text-sm
    font-medium hover:bg-blog-accent-lighten transition duration-200 ease-linear p-3;
}

.icon {
    @apply cursor-pointer duration-300 transition ease-in-out;
}
</style>
