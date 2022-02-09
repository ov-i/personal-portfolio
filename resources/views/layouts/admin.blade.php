<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Cześć! Jestem Bartosz Pazdur. Na codzień pracuję oraz rozwijam się na
    stanowisku full stack web developera. Moją główną specjalizacja jest JavaScript w połączeniu z środowiskiem
    uruchomieniowym NodeJS. W warstwie wizualnej pracują z wykorzystaniem frameworka Vue w wersji 3 bądź drugiej,
    w zależnośći od specyfikacji projektu. Chcesz wiedzieć więcej? Zapraszam na https://github.com/BrittleHeart">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="portfolio, bartosz, pazdur, overmind, brittle heart, bartosz pazdur, github
    Vue, Laravel, SEO, full stack, full, stack, zzmwruda, zzmwruda.pl, overblitz, web, developer, bartoszpazdur.pl,
    staysecure, facebook, #staysecure">

    <meta name="language" content="pl-pl">

    <meta name="og:title" content="Bartosz Pazdur Portfolio">
    <meta name="og:description" content="Cześć! Jestem Bartosz Pazdur. Na codzień pracuję oraz rozwijam się na
    stanowisku full stack web developera. Moją główną specjalizacja jest JavaScript w połączeniu z środowiskiem
    uruchomieniowym NodeJS.">
    <meta name="og:image" content="{{ asset('img/background.jpg') }}">

    <title>Bartosz Pazdur | @yield('title')</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Roboto+Condensed&display=swap" rel="stylesheet">

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="antialiased bg-admin-dirt-white overflow-y-hidden">
    <div id="admin" class="app" role="application" v-cloak aria-label="application main wrapper">
        <App></App>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
