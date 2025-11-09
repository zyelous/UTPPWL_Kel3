@extends('layouts.app')

@section('content')
<div class="container py-5 text-white">
    <h2 class="mb-4 fw-bold">Film Genre: {{ $genre->name }}</h2>

    @if($film->count() > 0)
        <div class="row row-cols-2 row-cols-md-4 g-4">
            @foreach($film as $film)
                <div class="col">
                    <div class="card bg-dark text-white border-0 shadow-sm" style="transition: 0.3s;">
                        <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top" alt="{{ $film->judul }}">
                        <div class="film-info">
                        <h5 class="film-title">{{ $film->title }}</h5>
                        <p class="film-meta">
                            🎭 {{ $film->genre->name ?? '-' }} <br>
                            ⭐ {{ $film->rating }} | 📅 {{ $film->year }}
                        </p>
                        <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <h5>Tidak ada film dalam genre ini.</h5>
        </div>
    @endif
</div>
@endsection
