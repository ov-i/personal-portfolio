@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')
    <!-- section about me -->
    <section class="main-content main-section md:py-20 px-3" aria-label="section about me" id="about-me">
        <!-- about me heading -->
        <SectionHeader title="poznaj mnie" header="o mnie"></SectionHeader>

        <!-- about me content -->
        <section aria-label="main content" id="about-me-content" role="contentinfo" class="pt-12">
            <div class="about-me-wrapper flex flex-col justify-evenly items-center md:items-start md:grid md:grid-flow-col md:grid-col-2">
                <article class="md:w-11/12 2xl:w-11/12 retina:w-11/12">
                    <h2 class="font-medium text-lg md:text-2xl 2xl:text-3xl retinax2:text-4xl">
                        Jestem
                        <span class="text-accent font-semibold">Bartosz Pazdur</span>,
                        Web Developer.
                    </h2>
                    <p class="font-normal leading-7 md:leading-8 tracking-wide text-sm md:text-base text-justify pt-6">
                        Na co dzień tworzę, oraz rozwijam nowe projekty z wykorzystaniem nowoczesnych technologii.
                        Jestem również pracownikiem w przedsiębiorstwie Encode IT Rafał Jaseniuk na stanowisku Full Stack
                        Web Developera.
                    </p>
                    <p class="font-normal leading-7 md:leading-8 tracking-wide text-sm md:text-base text-justify pt-6">
                        Poza pracą jako programista, interesuję się elektroniką w odniesieniu do budowy robotów
                        z wykorzystaniem Arduino UNO, zabawą z RasberryPi i tym podobnych.
                    </p>
                </article>

                <!-- about me info -->
                <article class="mt-10 md:mt-0 w-2/3 md:w-full mx-auto text-center">
                    <div class="info">
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Imię i nazwiska
                                <span class="font-normal">Bartosz Pazdur</span>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Email
                                <a href="mailto: b.pazdur@yahoo.com" class="text-accent font-semibold">
                                    b.pazdur@yahoo.com
                                </a>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Wiek
                                <span class="font-normal">{{ date('Y') - 1998 }}</span>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Kraj
                                <span class="font-normal">Polska</span>
                            </p>
                        </div>
                        <!-- info action -->
                        <div class="info-action border-none pt-8">
                            <button class="single-info-button">
                                <span class="iconify mr-2 text-center" data-icon="el:download-alt"></span>
                                Ściągnij CV
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <article class="showing-off mb-20 md:mb-0 mt-12 md:mt-20 w-full flex justify-evenly md:justify-between items-center flex-col md:flex-row text-center">
                <div class="single-off border-b py-4 md:py-0 md:py-0 md:pr-6 border-dark-50 md:w-full md:border-b-0 md:border-r">
                    <h3 class="font-medium text-5xl md:text-5xl">6</h3>
                    <p class="tracking-wide pt-2 font-medium text-sm ">Lat doświadczenia</p>
                </div>
                <div class="single-off border-b py-4 md:py-0 md:py-0 border-dark-50 md:w-full md:border-b-0 md:border-r">
                    <h3 class="font-medium text-5xl md:text-5xl">30</h3>
                    <p class="tracking-wide pt-2 font-medium text-sm">Zadowolonych klientów</p>
                </div>
                <div class="single-off py-4 md:py-0 md:w-full">
                    <h3 class="font-medium text-5xl md:text-5xl pl-6">100+</h3>
                    <p class="tracking-wide pt-2 font-medium text-sm">Stworzonych projektów</p>
                </div>
            </article>
        </section>
    </section>

    <!-- section projects -->
    <section aria-label="Moje projekty" id="project-section" class="main-section bg-background-accent py-1 md:py-20">
        <SectionHeader title="czym się zajmuję" header="projekty"></SectionHeader>

        <!-- projects -->
        <article class="projects main-content pb-3 md:pb-0">
            <!-- single project -->
            <div class="project bg-white p-4 rounded-md shadow-md mb-3 md:mb-0">
                <span class="px-2 py-1 text-sm text-white rounded-full bg-accent">javascipt</span>
                <div class="project-info flex justify-between items-center border-b border-dirty-white pt-4">
                    <!-- project title -->
                    <div class="project-title font-primary">
                        <a href="#" class="decoration-0">
                            <h3 class="heading">Projekt CRM</h3>
                        </a>
                    </div>
                    <!-- project socials -->
                    <div class="project-socials flex justify-around items-center">
                        <div class="social">
                            <span class="iconify" data-icon="akar-icons:github-fill"></span>
                        </div>
                        <div class="social ml-3">
                            <span class="iconify" data-icon="whh:website"></span>
                        </div>
                    </div>
                </div>
                <!-- project description -->
                <div class="project-description pt-4 pb-5">
                    <p class="font-normal text-justify  text-dark-100">
                        Projekt koncentrujący się na stworzeniu systemu CRM do
                        użytku własnego w celu prowadzenia kursów z zakresu programowania.
                    </p>
                </div>
                <div class="call-to-action flex justify-between items-center">
                    <div></div>
                    <a class="see-more" href="#">Zobacz więcej</a>
                </div>
            </div>
        </article>
    </section>

    <!-- section blog -->
    <section class="main-section py-14 md:py-20">
        <Sectionheader title="wpisy z bloga" header="mój blog"></Sectionheader>
        <!-- posts -->
        <article class="main-content py-14 flex justify-evenly flex-col md:grid md:grid-cols-2 md:gap-7 md:gap-y-8 posts items-end justify-end md:w-7/12 lg:w-6/12 xl:w-5/12 retina:w-4/12 retinax2:w-3/12">
            <!-- single post -->
            <div class="mx-auto bg-accent-darken w-tile h-tile my-5 md:my-0 flex justify-center items-center rounded-md shadow-md text-white text-center transition duration-200 ease-linear hover:shadow-2xl">
                <span class="uppercase font-primary font-semibold lg:text-xl">
                    Bezpieczeństwo
                </span>
            </div>
            <!-- single post -->
            <div class="mx-auto bg-red w-tile h-tile my-10 md:my-0 flex justify-center items-center rounded-md shadow-md text-white text-center transition duration-200 ease-linear hover:shadow-2xl">
                <span class="uppercase font-primary font-semibold lg:text-xl">
                    Programowanie
                </span>
            </div>
            <!-- single post -->
            <div class="mx-auto bg-accent-darken md:bg-red w-tile h-tile my-10 md:my-0 flex justify-center items-center rounded-md shadow-md text-white text-center transition duration-200 ease-linear hover:shadow-2xl">
                <span class="uppercase font-primary font-semibold lg:text-xl">
                    ITTalks
                </span>
            </div>
            <!-- single post -->
            <div class="mx-auto bg-red md:bg-accent-darken  w-tile h-tile my-10 md:my-0 flex justify-center items-center rounded-md shadow-md text-white text-center transition duration-200 ease-linear hover:shadow-2xl">
                <span class="uppercase font-primary font-semibold lg:text-xl">
                    kursy
                </span>
            </div>
        </article>
    </section>
@endsection
