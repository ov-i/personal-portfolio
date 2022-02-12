<template>
    <section class="admin-content p-6 font-primary main-content">
        <!-- admin heading -->
        <article class="admin-heading">
            <h2 class="admin-header font-semibold text-dark-200 text-2xl" role="heading">Hej, Admin</h2>
        </article>

        <!-- admin-counter -->
        <article class="admin-counter pt-7">
            <div class="counters grid grid-rows-3 md:grid-cols-3 md:grid-rows-none items-center w-full md:justify-between gap-10">
                <admin-counter number="30" content="użytkowników" />
                <admin-counter number="120" content="wpisów" />
                <admin-counter number="45" content="komentarzy" />
            </div>
        </article>

        <!-- admin-action -->
        <article class="admin-action pt-10 grid grid-cols-2 gap-10 items-start">
            <!-- comments approve -->
            <div class="comments-approve bg-white rounded-md shadow-md p-4 w-full mr-3">
                <h3 class="text-dark-200 text-lg font-semibold pb-2 border-b border-dirty-white">Zatwierdź komentarze</h3>

                <div class="comments h-72 overflow-scroll">
                    <!-- single comment -->
                    <div class="comment py-4">
                        <div class="comment-author">
                            <p class="text-lg font-medium text-dark-200">Bartosz Pazdur</p>
                            <span class="block font-light italic text-sm text-dark-100">
                                31.12.2022 12:30:00
                            </span>
                        </div>
                        <div class="comment-content font-normal tracking-widest text-xs italic leading-6 text-dark-200 pt-2 text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Amet animi aspernatur beatae delectus eius quae quos repellat tenetur ut, vel.
                        </div>
                        <div class="confirm-action flex items-center justify-between pt-4">
                            <div></div>
                            <button class="confirm-comment text-blog-accent font-normal text-sm  p-2 rounded-sm hover:text-blog-accent duration-200 ease-linear">zatwierdź</button>
                        </div>
                    </div>
                    <!-- single comment -->
                    <div class="comment py-4">
                        <div class="comment-author">
                            <p class="text-lg font-medium text-dark-200">Bartosz Pazdur</p>
                            <span class="block font-light italic text-sm text-dark-100">
                                31.12.2022 12:30:00
                            </span>
                        </div>
                        <div class="comment-content font-normal tracking-widest text-xs italic leading-6 text-dark-200 pt-2 text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Amet animi aspernatur beatae delectus eius quae quos repellat tenetur ut, vel.
                        </div>
                        <div class="confirm-action flex items-center justify-between pt-4">
                            <div></div>
                            <button class="confirm-comment text-blog-accent font-normal text-sm  p-2 rounded-sm hover:text-blog-accent duration-200 ease-linear">zatwierdź</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest-users bg-white shadow-md rounded-md w-full p-4">
                <h3 class="text-dark-200 text-lg font-semibold pb-2 border-b border-dirty-white">Ostatni użytkownicy</h3>

                <div class="users h-72 overflow-scroll w-full pt-3">
                    <div class="user flex flex-row items-start">
                        <div class="user-avatar">
                            <img src="https://unsplash.it/200/200" alt="user avatar" class="rounded-full user-img">
                        </div>
                        <div class="user-info ml-3">
                            <p class="font-normal tracking-widest text-base leading-6 text-dark-200">Bartosz Pazdur</p>
                            <span class="block font-light italic text-sm text-dark-100">12.03.2022 12:34:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</template>

<script>
import AdminCounter from "../components/AdminCounter";

export default {
    name: "Home",
    components: {
        AdminCounter,
    }
}
</script>

<style scoped>

</style>
