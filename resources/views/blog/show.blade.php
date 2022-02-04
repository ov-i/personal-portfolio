@extends('layouts.blog')

@section('title', 'Podgląd wpisu')

@section('content')
    <section class="post w-5/12 mx-auto font-primary">
        <h1 class="text-2xl font-primary font-medium">{{ $single->title }}</h1>
        <p class="font-sm font-light italic">{!! $single->content !!}</p>
    </section>
@endsection
