<template>
    <!-- roles main section -->
    <section class="main-content admin-content roles-section p-8 font-primary">
        <!-- admin heading -->

        <article class="admin-content-wrapper border-b border-dirty-white pb-3 admin-heading flex justify-between items-center">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">
                Dostępne role
            </h2>
            <section class="add-action">
                <router-link to="" class="add-action-button">
                    Dodaj rolę
                </router-link>
            </section>
        </article>
        <section class="roles-wrapper pt-7" role="banner">
            <table class="w-full shadow-md" v-if="rolesFetch">
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
                    <tr class="whitespace-nowrap" v-for="role in rolesFetch()" :key="role.id">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ role.id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                <p>{{ role.name }}</p>
                            </div>
                        </td>
                        <td class="text-center">
                            <button>usuń</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
</template>

<script>
import {mapGetters} from "vuex";
import {Icon} from "@iconify/vue/dist/iconify";

export default {
    name: "Roles",
    components: {Icon},
    computed: {
        ...mapGetters({
            roles: 'getRoles'
        })
    },
    methods: {
        rolesFetch() {
            const { roles } = this.roles
            return roles
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
