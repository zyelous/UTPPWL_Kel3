@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container py-5 text-white">
    <h2 class="text-center mb-4 fw-bold" style="font-size: 2rem;">Genre Film</h2>

    <div class="d-flex flex-wrap justify-content-center gap-3">
        @foreach($genre as $genre)
            <div class="p-3 bg-dark text-white rounded-3 genre-card shadow-sm" 
                 style="width: 180px; text-align: center; transition: 0.3s;">
                <!-- Ubah href agar link mengarah ke route genre.show -->
                <a href="{{ route('user.genre.show', $genre->name) }}" 
                   class="text-white text-decoration-none fw-semibold">
                    {{ $genre->name }}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection