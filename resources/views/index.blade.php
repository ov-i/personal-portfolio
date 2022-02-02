@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')
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
                    Jestem również pracownikiem w przedsiębiorstwie Encode IT Rafał Jaseniuk na stanowisku Full Stack
                    Web Developera.
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
@endsection
