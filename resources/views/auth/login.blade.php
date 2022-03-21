@extends('layouts.auth')

@section('title', 'Panel logowania')

@section('content')
    <section class="login-panel w-11/12 sm:w-9/12 md:w-8/12 lg:w-7/12 xl:w-7/12 2xl:w-6/12 retina:w-7/12 retinax2:w-6/12 bg-white shadow-md rounded-md p-5">
        <div class="back-button flex items-center text-sm text-dark-300 font-light mb-3 hover:text-dark-700 duration-200 ease-in-out cursor-pointer">
            <span class="iconify" data-icon="akar-icons:arrow-back"></span>
            <a href="{{ route('blog.index') }}" class="ml-2">Powrót do bloga</a>
        </div>
        <h3 class="font-medium text-2xl text-dark-700 border-b border-dirty-white">Logowanie do panelu</h3>
        <div class="form-panel w-full mx-auto">
            <form action="{{ route('auth.authenticate') }}" method="post">
                @csrf

                <!-- single group -->
                <div class="font-group pt-5 w-full">
                    <label for="email" id="emailLabel" class="text-dark-300 font-medium text-sm">
                        Adres email
                    </label>
                    <input
                        class="form-input transition duration-200 ease-linear focus:rounded-lg block w-full"
                        type="email"
                        name="email"
                        id="email"
                        autofocus
                        autocomplete="email"
                        value="{{ old('email') }}"/>
                </div>

                <!-- single group -->
                <div class="font-group w-full py-3">
                    <label for="password" id="passwordLabel" class="text-dark-300 font-medium text-sm">
                        Hasło
                    </label>
                    <div class="input-with-icon relative">
                        <div class="icon absolute top-1/2 right-2 -translate-y-1/2 text-2xl" v-if="passwordShown" @click="togglePasswordShown()">
                            <span class="iconify" data-icon="akar-icons:eye"></span>
                        </div>
                        <div class="icon absolute top-1/2 right-2 -translate-y-1/2 text-2xl" v-else @click="togglePasswordShown()">
                            <span class="iconify" data-icon="akar-icons:eye-closed" @click="togglePasswordShown()"></span>
                        </div>

                        <input
                            class="form-input block w-full transition duration-200 ease-linear focus:rounded-lg"
                            :type="passwordShown ? 'text' : 'password'"
                            name="password"
                            id="password"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="remember-me">
                        <input type="checkbox" name="remember" id="remember-me">
                        Zapamiętaj mnie
                    </label>
                </div>

                <button type="submit" class="w-full mt-5 p-3 text-white bg-blog-accent hover:bg-blog-accent-lighten duration-200 ease-linear rounded-md hover:shadow-md uppercase font-medium text-sm">
                    Zaloguj się
                </button>

                <hr class="w-full block mt-5 mx-auto">
                <div class="form-helper mt-3">
                    <a href="" class="text-sm text-blog-accent font-light hover:font-medium duration-150 ease-in-out block mb-2">Zapomniałem hasła</a>
                    <a href="" class="text-sm text-blog-accent font-light hover:font-medium duration-150 ease-in-out block">Nie masz konta?</a>
                </div>
            </form>
        </div>
    </section>

@endsection
