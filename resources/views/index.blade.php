@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')
    <img src="{{ asset('attachments/matebook.png') }}" alt="">
    <form action="{{ route('home.store_file') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="attachment" id="attachment">
        <button type="submit" class="font-body font-medium rounded shadow-sm bg-primary-accent p-2">
            Wyślij
        </button>
    </form>
@endsection
