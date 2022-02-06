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
<body class="antialiased">

    <div id="app" class="app" role="application" aria-label="application main wrapper">
        <header aria-label="banner" role="banner" class="" id="primary-heading">

            <!-- nav section -->
            <nav class="navigation-wrapper bg-blog-accent text-white" id="primary-navigation" aria-label="navigation" role="navigation">
                <!-- application brand -->
                <div class="">
                    <a href="#" class="font-medium text-2xl md:text-3xl" role="link">
                        Bartosz Pazdur
                    </a>
                </div>

                <!-- nav toggle -->
                <div class="text-dark md:hidden" id="show-nav-button">
                    <span class="iconify text-3xl" data-icon="clarity:bars-line"></span>
                </div>

                <!-- nav list -->
                <div class="nav-shown text-white hidden md:block text-center" id="nav-list">
                    <!-- closing button -->
                    <div class="closing-button" role="button" id="close-nav">
                        <span class="iconify border-2 border-white" data-icon="clarity:times-line"></span>
                    </div>

                    <!-- nav items -->
                    <ul class="nav-items" id="nav-list" role="list">
                        <li class="nav-item" role="listitem">
                            <a href="/" class="nav-link" role="link" aria-labelledby="navigation link">
                                start
                            </a>
                        </li>
                        <li class="nav-item" role="listitem">
                            <a href="#about-me" class="nav-link" role="link" aria-labelledby="navigation link">
                                o mnie
                            </a>
                        </li>
                        <li class="nav-item" role="listitem">
                            <a href="#projects" class="nav-link" role="link" aria-labelledby="navigation link">
                                projekty
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="main-content" role="main">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
