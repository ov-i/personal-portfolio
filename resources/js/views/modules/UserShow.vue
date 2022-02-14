<template>
    <section class="admin-content main-content p-6 font-primary">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Informacje o użytkowniku overmind</h2>
        </article>
    </section>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    name: "UserShow",
    methods: {
        ...mapActions(['fetchUserData'])
    },
    async created() {
        const { id } = this.$route.params
        if(isNaN(id) || id === undefined)
            return console.log('id jest puste. Użyj innej metody')

        await this.fetchUserData(id);
    }
}
</script>

<style scoped>

</style>
