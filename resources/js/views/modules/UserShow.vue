<template>
    <section class="admin-content main-content p-6 font-primary">
        <div v-if="getFetchErrors.status === 404">
            <h1 class="text-5xl uppercase text-dark-700 font-medium pt-2 text-center">
                {{ getFetchErrors.message }}
            </h1>
        </div>

        <!-- admin heading -->
        <section class="admin-content-wrapper" v-else>
            <article class="admin-heading" v-if="user">
                <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">
                    Użytkownik {{ user.nick }}
                </h2>
            </article>
        </section>
    </section>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
    name: "UserShow",
    methods: {
        ...mapActions(['fetchUserData'])
    },
    computed: {
        ...mapGetters({
            user: 'getUser',
            getFetchErrors: 'getFetchErrors'
        })
    },
    async created() {
        const { id } = this.$route.params
        if(!id)
            return console.log('id jest puste. Użyj innej metody')

        await this.fetchUserData(id)
    }
}
</script>

<style scoped>

</style>
