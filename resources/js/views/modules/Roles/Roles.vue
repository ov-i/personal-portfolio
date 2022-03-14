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

        <div class="roles w-full mt-3">
            <div class="container flex justify-center mx-auto w-full">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table>
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        ID
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Name
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Email
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Created_at
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Delete
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            1
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Jon doe
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">jhondoe@example.com</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            2021-1-12
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Roles"
}
</script>

<style scoped>
.add-action .add-action-button {
    @apply bg-blog-accent rounded-md shadow-md uppercase text-white text-sm
    font-medium hover:bg-blog-accent-lighten transition duration-200 ease-linear p-3;
}
</style>
