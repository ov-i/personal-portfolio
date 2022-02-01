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
<body>
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
            <div class="socials hidden md:flex justify-between items-center">
                <!-- single icon -->
                <div class="social md:inline-block p-3 text-white text-lg">
                    <span class="iconify" data-icon="akar-icons:facebook-fill"></span>
                </div>

                <!-- single icon -->
                <div class="social md:inline-block p-3 text-white text-lg">
                    <span class="iconify" data-icon="akar-icons:github-fill"></span>
                </div>

                <!-- single icon -->
                <div class="social md:inline-block p-3 text-white text-lg">
                    <span class="iconify" data-icon="akar-icons:linkedin-fill"></span>
                </div>
            </div>
        </nav>
        <section class="header-jumbotron" id="header-jumbotron">
            <article class="jumbotron-wrapper" id="jumbotron-wrapper">
                <p class="">Bartosz Pazdur</p>
                <h1>Web Developer</h1>
                <span>"admin, think, improve."</span>
            </article>
        </section>
    </header>

    <!-- main content -->
    <main id="main-content" aria-label="Główna treść" role="main">
        <!-- section about me -->
        <section class="font-primary" aria-label="sekcja o mnie">
            <!-- about me heading -->
            <article aria-label="o mnie nagłówek" id="about-me-heading">
                <h2>O mnie</h2>
                <span>Poznaj mnie</span>
                <div class="divider w-8 p-1 bg-accent"></div>
            </article>

            <!-- about me content -->
            <section aria-label="Treść główna sekcji o mnie" id="about-me-content" role="contentinfo">
                <article>
                    <h2 class="font-medium">
                        Jestem
                        <span class="text-accent font-semibold">Bartosz Pazdur</span>,
                        Web Developer
                    </h2>
                    <p class="font-normal">
                        Na co dzień tworzę, oraz rozwijam nowe projekty z wykorzystaniem nowoczesnych technologii.
                        Jestem również pracownikiem w przedsiębiorstwie Encode IT Rafał Jaseniuk na stanowisku Full Stack Web Developera.
                    </p>
                    <p class="font-normal">
                        Poza pracą jako programista, interesuję się elektroniką w odniesieniu do budowy robotów
                        z wykorzystaniem Arduino UNO, zabawą z RasberryPi i tym podobnych.
                    </p>
                </article>
                <article>
                    <div class="info">
                        <div class="single-info">
                            <p class="font-medium">
                                Imię i nazwisko:
                                <span class="font-normal">Bartosz Pazdur</span>
                            </p>
                        </div>
                        <div class="single-info">
                            <p class="font-medium">
                                Email:
                                <span class="text-accent">b.pazdur@yahoo.com</span>
                            </p>
                        </div>
                        <div class="single-info">
                            <p class="font-medium">
                                Wiek:
                                <span class="font-normal">{{ date('Y') - 1998 }}</span>
                            </p>
                        </div>
                        <div class="single-info">
                            <p class="font-medium">
                                Krja
                                <span class="font-normal">Polska</span>
                            </p>
                        </div>
                        <div class="single-info">
                            <button>Ściągnij CV</button>
                        </div>
                    </div>
                </article>
            </section>
        </section>

        <!-- section projects -->
        <section aria-label="Moje projekty" id="project-section">
            <article>
                <h2 class="uppercase">projekty</h2>
                <span>Czym się zajmuję?</span>
                <div class="divider w-8 p-1 bg-accent"></div>
            </article>
            <!-- projects -->
            <article class="projects">

                <!-- single project -->
                <div class="project">
                    <span>javascipt</span>
                    <div class="project-info">
                        <div class="project-title font-primary">
                            <h3 class="heading">Projekt CRM</h3>
                        </div>
                        <div class="project-socials">
                            <div class="social">
                                <span class="iconify" data-icon="akar-icons:github-fill"></span>
                            </div>
                            <div class="social">
                                <span class="iconify" data-icon="whh:website"></span>
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <p>
                            Projekt koncentrujący się na stworzeniu systemu CRM do
                            użytku własnego w celu prowadzenia kursów z zakresu programowania.
                        </p>
                    </div>
                    <a href="#">Zobacz więcej</a>
                </div>
                <!-- single project -->
                <div class="project">
                    <span>javascipt</span>
                    <div class="project-info">
                        <div class="project-title font-primary">
                            <h3 class="heading">Projekt CRM</h3>
                        </div>
                        <div class="project-socials">
                            <div class="social">
                                <span class="iconify" data-icon="akar-icons:github-fill"></span>
                            </div>
                            <div class="social">
                                <span class="iconify" data-icon="whh:website"></span>
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <p>
                            Projekt koncentrujący się na stworzeniu systemu CRM do
                            użytku własnego w celu prowadzenia kursów z zakresu programowania.
                        </p>
                    </div>
                    <a href="#">Zobacz więcej</a>
                </div>
                <!-- single project -->
                <div class="project">
                    <span>javascipt</span>
                    <div class="project-info">
                        <div class="project-title font-primary">
                            <h3 class="heading">Projekt CRM</h3>
                        </div>
                        <div class="project-socials">
                            <div class="social">
                                <span class="iconify" data-icon="akar-icons:github-fill"></span>
                            </div>
                            <div class="social">
                                <span class="iconify" data-icon="whh:website"></span>
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <p>
                            Projekt koncentrujący się na stworzeniu systemu CRM do
                            użytku własnego w celu prowadzenia kursów z zakresu programowania.
                        </p>
                    </div>
                    <a href="#">Zobacz więcej</a>
                </div>
                <!-- single project -->
                <div class="project">
                    <span>javascipt</span>
                    <div class="project-info">
                        <div class="project-title font-primary">
                            <h3 class="heading">Projekt CRM</h3>
                        </div>
                        <div class="project-socials">
                            <div class="social">
                                <span class="iconify" data-icon="akar-icons:github-fill"></span>
                            </div>
                            <div class="social">
                                <span class="iconify" data-icon="whh:website"></span>
                            </div>
                        </div>
                    </div>
                    <div class="project-description">
                        <p>
                            Projekt koncentrujący się na stworzeniu systemu CRM do
                            użytku własnego w celu prowadzenia kursów z zakresu programowania.
                        </p>
                    </div>
                    <a href="#">Zobacz więcej</a>
                </div>
            </article>
        </section>

        <!-- section blog -->
        <section>
            <article>
                <h2 class="uppercase">mój blog</h2>
                <span>Wpisy z bloga</span>
                <div class="divider w-8 p-1 bg-accent"></div>
            </article>
            <!-- posts -->
            <article class="posts">
                <!-- single post -->
                <div class="post">
                    <span class="uppercase font-primary font-semibold">
                        Bezpieczeństwo
                    </span>
                </div>
                <!-- single post -->
                <div class="post">
                    <span class="uppercase font-primary font-semibold">
                        Programowanie
                    </span>
                </div>
                <!-- single post -->
                <div class="post">
                    <span class="uppercase font-primary font-semibold">
                        ITTalks
                    </span>
                </div>
                <!-- single post -->
                <div class="post">
                    <span class="uppercase font-primary font-semibold">
                        kursy
                    </span>
                </div>
            </article>
        </section>
    </main>

    <footer class="" id="">
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
