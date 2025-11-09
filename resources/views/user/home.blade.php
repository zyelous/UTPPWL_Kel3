@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container py-4 netflix-container">

    {{-- ================= FEATURED ================= --}}
    <h2 class="netflix-title">🎬 FEATURED</h2>
    <div class="film-grid">
        @forelse($featured as $film)
            <div class="film-card">
                <div class="badge-featured">FEATURED</div>
                <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/300x450?text=No+Poster' }}" 
                     alt="{{ $film->title }}">
                <div class="film-info">
                    <h5 class="film-title">{{ $film->title }}</h5>
                    <p class="film-meta">
                        🎭 {{ $film->genre->name ?? '-' }} <br>
                        ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                    </p>
                    <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada film featured.</p>
        @endforelse
    </div>

    {{-- ================= ALL FILM ================= --}}
    <div class="mt-5">
        <h2 class="netflix-title">📅 ALL FILM </h2>
        <div class="film-grid">
            @forelse($latest as $film)
                <div class="film-card">
                    <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/300x450?text=No+Poster' }}" 
                         alt="{{ $film->title }}">
                    <div class="film-info">
                        <h5 class="film-title">{{ $film->title }} ({{ $film->year }})</h5>
                        <p class="film-meta">
                            🎭 {{ $film->genre->name ?? '-' }} <br>
                            ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                        </p>
                        <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada film terbaru.</p>
            @endforelse
        </div>
    </div>

    {{-- ================= FILM ACTION ================= --}}
    <div class="mt-5">
        <h2 class="netflix-title">💥 FILM ACTION</h2>
        <div class="film-grid">
            @forelse($action as $film)
                <div class="film-card">
                    <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/300x450?text=No+Poster' }}" 
                         alt="{{ $film->title }}">
                    <div class="film-info">
                        <h5 class="film-title">{{ $film->title }}</h5>
                        <p class="film-meta">
                            🎭 {{ $film->genre->name ?? '-' }} <br>
                            ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                        </p>
                        <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada film action.</p>
            @endforelse
        </div>
    </div>

    {{-- ================= FILM HOROR ================= --}}
    <div class="mt-5">
        <h2 class="netflix-title">👻 FILM HORROR</h2>
        <div class="film-grid">
            @forelse($horror as $film)
                <div class="film-card">
                    <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/300x450?text=No+Poster' }}" 
                         alt="{{ $film->title }}">
                    <div class="film-info">
                        <h5 class="film-title">{{ $film->title }}</h5>
                        <p class="film-meta">
                            🎭 {{ $film->genre->name ?? '-' }} <br>
                            ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                        </p>
                        <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada film horror.</p>
            @endforelse
        </div>
    </div>


</div>
@endsection
