@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')
    <img src="{{ $attachment->source }}" alt="{{ $attachment->name }}" title="{{ $attachment->name }}">
    <form action="{{ route('home.store_file') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="attachment" id="attachment">
        <button type="submit" class="font-body font-medium rounded shadow-sm bg-primary-accent p-2">
            Wyślij
        </button>
    </form>
@endsection
