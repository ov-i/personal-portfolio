@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')
    <!-- section about me -->
    <section class="main-content main-section md:py-20 px-3" aria-label="section about me" id="about-me">
        <!-- about me heading -->
        <SectionHeader title="poznaj mnie" header="o mnie"></SectionHeader>

        <!-- about me content -->
        <section aria-label="main content" id="about-me" role="contentinfo" class="pt-12">
            <div class="about-me-wrapper flex flex-col justify-evenly items-center md:items-start md:grid md:grid-flow-col md:grid-col-2 py-5 md:py-5">
                <article class="md:w-11/12 2xl:w-11/12 retina:w-11/12">
                    <h2 class="font-medium text-lg md:text-2xl 2xl:text-3xl retinax2:text-4xl">
                        Jestem
                        <span class="text-accent font-semibold">Bartosz Pazdur</span>,
                        Web Developer.
                    </h2>
                    <p class="font-normal leading-7 md:leading-8 tracking-wide text-sm md:text-base text-justify pt-6">
                        {{ $about_me->about_work }}
                    </p>
                    <p class="font-normal leading-7 md:leading-8 tracking-wide text-sm md:text-base text-justify pt-6">
                        {{ $about_me->about_interest }}
                    </p>
                </article>

                <!-- about me info -->
                <article class="mt-10 md:mt-0 w-2/3 md:w-full mx-auto text-center md:text-left">
                    <div class="info">
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Imię i nazwisko:
                                <span class="font-normal">Bartosz Pazdur</span>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Email:
                                <a href="mailto: {{ $about_me->email }}" class="text-accent font-semibold hover:text-accent-darken transition duration-200 ease-in">
                                    {{ $about_me->email }}
                                </a>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Wiek:
                                <span class="font-normal">{{ date('Y') - 1998 }}</span>
                            </p>
                        </div>
                        <!-- single info -->
                        <div class="single-info">
                            <p class="font-medium text-sm md:text-base">
                                Kraj:
                                <span class="font-normal">Polska</span>
                            </p>
                        </div>
                        <!-- info action -->
                        <div class="info-action border-none pt-8">
                            <a href="{{ route('home.download') }}" class="single-info-button">
                                <span class="iconify mr-2 text-center" data-icon="el:download-alt"></span>
                                Ściągnij CV
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <article class="showing-off">
                @foreach($testimonials as $testimonial)
                <div class="single-off">
                    <h3 class="value">{{ $testimonial->value }}</h3>
                    <p class="name">{{ $testimonial->name }}</p>
                </div>
                @endforeach
            </article>
        </section>
    </section>

    <!-- section projects -->
    <section aria-label="Moje projekty" id="projects" class="main-section bg-background-accent py-1 md:py-20">
        <SectionHeader title="czym się zajmuję" header="projekty"></SectionHeader>

        <!-- projects -->
        <article class="projects main-content pb-3 md:pb-0">

            @foreach($projects as $project)
                <!-- single project -->
                <div class="project bg-white p-4 rounded-md shadow-md mb-3 md:mb-0">
                    <span class="px-2 py-1 text-sm text-white rounded-full bg-accent">{{ $project->language }}</span>
                    <div class="project-info flex justify-between items-center border-b border-dirty-white pt-4">
                        <!-- project title -->
                        <div class="project-title font-primary">
                            <a href="#" class="decoration-0">
                                <h3 class="heading">{{ $project->project_name }}</h3>
                            </a>
                        </div>
                        <!-- project socials -->
                        <div class="project-socials flex justify-around items-center">
                            <div class="social">
                                <a href="{{ $project->repository_url }}">
                                    <span class="iconify" data-icon="akar-icons:github-fill"></span>
                                </a>
                            </div>
                            <div class="social ml-3">
                                <a href="{{ $project->website_url }}">
                                    <span class="iconify" data-icon="whh:website"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- project description -->
                    <div class="project-description pt-4 pb-5">
                        <p class="font-normal text-justify  text-dark-100">
                            {{ $project->description }}
                        </p>
                    </div>
                    <div class="call-to-action flex justify-between items-center">
                        <div></div>
                        <a class="see-more" href="#">Zobacz więcej</a>
                    </div>
                </div>
            @endforeach
        </article>
    </section>

    <!-- section blog -->
    <section class="main-section py-14 md:py-20" id="blog">
        <Sectionheader title="wpisy z bloga" header="mój blog"></Sectionheader>
        <!-- posts -->
        <article class="main-content section-blog py-14 flex justify-evenly flex-col md:grid md:grid-cols-2 capitalize md:gap-7 md:gap-y-8 posts items-end justify-end md:w-7/12 lg:w-6/12 xl:w-5/12 retina:w-4/12 retinax2:w-3/12">
            @foreach($categories as $category)
                <!-- single post -->
                <a class="blog-category cursor-pointer" href="{{ route('blog.category_posts', ['category' => $category->id]) }}">
                    <span class="uppercase font-primary font-semibold lg:text-xl">
                        {{ $category->name }}
                    </span>
                </a>
           @endforeach
        </article>
    </section>
@endsection
