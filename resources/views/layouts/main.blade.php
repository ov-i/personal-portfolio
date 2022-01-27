<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bartosz Pazdur | @yield('title')</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app" class="app" v-cloak role="application">
    {{-- Main header of application --}}
    <header
        class="app-header bg-hero-background h-screen bg-fixed bg-center material-padding"
        aria-label="Treść nagłówkowa strony"
        role="presentation">

        {{-- Main navigation of application --}}
        <nav class="app-nav flex justify-between items-center" role="navigation">
            <section class="nav-brand" aria-label="Nazwa strony" role="region">
                <a class="font-primary font-medium text-white text-xl decoration-0 tracking-normal">
                    Bartosz Pazdur
                </a>
            </section>
            {{-- navigation items --}}
            <section class="navigation-list" role="navigation">
                <ul role="list" class="list-none">
                    <li role="listitem" class="inline-block font-primary font-regular text-white pr-3">start</li>
                    <li role="listitem" class="inline-block font-primary font-regular text-white pr-3">o mnie</li>
                    <li role="listitem" class="inline-block font-primary font-regular text-white pr-3">projekty</li>
                    <li role="listitem" class="inline-block font-primary font-regular text-white">blog</li>
                </ul>
            </section>
        </nav>
    </header>

    @yield('content')
</div>

<!-- custom scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
