<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
<div id="app" class="app relative" v-cloak role="application">
    <!-- header section -->
    <header aria-label="banner" role="banner" class="header-wrapper" id="primary-heading">

        <!-- nav section -->
        <nav class="navigation-wrapper" id="primary-navigation" aria-label="navigation" role="navigation">
            <!-- application brand -->
            <div class="">
                <a href="#" class="font-medium text-2xl md:text-3xl text-white" role="link">
                    Bartosz Pazdur
                </a>
            </div>

            <!-- nav toggle -->
            <div class="text-dark md:hidden" id="show-nav-button">
                <span class="iconify text-3xl" data-icon="clarity:bars-line"></span>
            </div>

            <!-- nav list -->
            <div class="nav-shown hidden md:block text-center" id="nav-list">
                <!-- closing button -->
                <div class="closing-button" role="button" id="close-nav">
                    <span class="iconify border-2 border-white" data-icon="clarity:times-line"></span>
                </div>

                <!-- nav items -->
                <ul class="nav-items" id="nav-list" role="list">
                    <li class="nav-item" role="listitem">
                        <a href="#" class="nav-link" role="link" aria-labelledby="navigation link">
                            start
                        </a>
                    </li>
                    <li class="nav-item" role="listitem">
                        <a href="#" class="nav-link" role="link" aria-labelledby="navigation link">
                            o mnie
                        </a>
                    </li>
                    <li class="nav-item" role="listitem">
                        <a href="#" class="nav-link" role="link" aria-labelledby="navigation link">
                            projekty
                        </a>
                    </li>
                    <li class="nav-item" role="listitem">
                        <a href="#" class="nav-link" role="link" aria-labelledby="navigation link">
                            blog
                        </a>
                    </li>
                </ul>
            </div>

            <!-- social icons -->
            <div class="socials hidden">
                <!-- single icon -->
                <div class="social" role="group">
                    <span class="iconify" data-icon="akar-icons:facebook-fill"></span>
                </div>

                <!-- single icon -->
                <div class="social" role="group">
                    <span class="iconify" data-icon="akar-icons:github-fill"></span>
                </div>

                <!-- single icon -->
                <div class="social" role="group">
                    <span class="iconify" data-icon="akar-icons:linkedin-fill"></span>
                </div>
            </div>
        </nav>

        <!-- jumbotron section -->
        <section class="header-jumbotron w-screen md:w-auto" id="header-jumbotron" role="presentation">
            <!-- jumbotron wrapper -->
            <article class="jumbotron-wrapper" id="jumbotron-wrapper">
                <!-- jumbotron name -->
                <h1 class="jumbotron-name">
                    Bartosz Pazdur
                </h1>
                <!-- jumbotron profession -->
                <p class="jumbotron-profession">
                    Web Developer
                </p>
                <!-- jumbotron motto -->
                <p class="jumbotron-motto">
                    "admit, think, improve."
                </p>
            </article>
        </section>
    </header>

    <!-- main content -->
    <main class="w-2/4 mx-auto py-20 md:py-24" id="main-content" aria-label="Główna treść" role="main">
        @yield('content')
    </main>

    <!-- footer section -->
    <footer class="footer-section" id="footer-section" aria-label="footer section">
        <!-- footer primary section -->
        <section class="footer-primary">
            <!-- single footer widget -->
            <div class="widget footer-info">
                <h3>Mapa strony</h3>
                <div class="footer-list">
                    <ul>
                        <li>
                            <a href="#">start</a>
                        </li>
                        <li>
                            <a href="#">o mnie</a>
                        </li>
                        <li>
                            <a href="#">projekty</a>
                        </li>
                        <li>
                            <a href="#">blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget footer-info">
                <h3>Ostatnie posty</h3>
                <div class="footer-list">
                    <ul>
                        <li>Jak działają hasła maskowane?</li>
                        <li>Manadżery haseł</li>
                        <li>Uwierzytelnianie dwuskładnikowe</li>
                    </ul>
                </div>
            </div>
            <div class="widget footer-info">
                <h3>Dostępne kategorie</h3>
                <div class="footer-list">
                    <ul>
                        <li>Bezpieczeństwo</li>
                        <li>Programowanie</li>
                        <li>ITTalks</li>
                        <li>kursy</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="footer-secondary">
            <div class="copyright">
                Bartosz Pazdur &copy; {{ date('Y') }}
            </div>
        </section>
    </footer>
</div>

<!-- custom scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
