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
                    <th class="p-3">autor</th>
                    <th class="p-3">kategoria</th>
                    <th class="p-3">tytuł</th>
                    <th class="p-3">zablokowany</th>
                    <th class="p-3">role</th>
                    <th class="p-3"></th>
                </tr>
                </thead>
            </table>
        </div>
    </section>
</template>

<script>
export default {
    name: "Posts"
}
</script>

<style scoped>

</style>
