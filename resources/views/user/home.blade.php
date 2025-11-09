@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp

@section('content')
{{-- ================= STYLES ================= --}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<div class="container py-4 netflix-container">
    <div class="swiper mySwiper mb-5">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/banner4.jpg') }}" alt="Banner 1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/banner2.jpg') }}" alt="Banner 2">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/banner3.jpeg') }}" alt="Banner 3">
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <h2 class="netflix-title">FEATURED</h2>
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
                    <p class="synopsis">{{ Str::limit($film->synopsis, 100) }}</p>
                    <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada film featured.</p>
        @endforelse
    </div>


    <div class="mt-5">
        <h2 class="netflix-title">ALL FILM</h2>
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

    <div class="mt-5">
        <h2 class="netflix-title">FILM ACTION</h2>
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

    <div class="mt-5">
        <h2 class="netflix-title">FILM HORROR</h2>
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

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{ asset('js/slider.js') }}"></script>
@endsection
