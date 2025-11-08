@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container py-4 netflix-container">
    <h2 class="netflix-title">🎬 Film Pilihan Kamu</h2>

    <div class="film-grid">
        @foreach($films as $film)
            <div class="film-card">
                <div class="badge-featured">FEATURED</div>

                @if($film->poster)
                    <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}">
                @else
                    <img src="https://via.placeholder.com/300x450?text=No+Poster" alt="No Poster">
                @endif

                <div class="film-info">
                    <h5 class="film-title">{{ $film->title }}</h5>
                    <p class="film-meta">
                        🎭 {{ $film->genre->name ?? '-' }}<br>
                        ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                    </p>

                    <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
