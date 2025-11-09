@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="film-card">
                <img src="{{ $film->poster ? asset('storage/' . $film->poster) : 'https://via.placeholder.com/400x600?text=No+Poster' }}" alt="{{ $film->title }}">
            </div>
        </div>

        <div class="col-md-8 text-white">
            <h1 class="mb-2">{{ $film->title }} <small class="text-muted">({{ $film->year }})</small></h1>
            <p class="mb-1">🎭 <strong>Genre:</strong> {{ $film->genre->name ?? '-' }}</p>
            <p class="mb-1">⭐ <strong>Rating:</strong> {{ $film->rating }}</p>
            <p class="mb-1">📅 <strong>Tanggal Rilis:</strong> {{ $film->release_date ? \Carbon\Carbon::parse($film->release_date)->format('d M Y') : ($film->year ?? '-') }}</p>

            <hr style="border-color: rgba(255,255,255,0.06)">

            <h5>Sinopsis</h5>
            <p class="text-muted">
                {{ $film->synopsis ?? 'Belum ada sinopsis untuk film ini.' }}
            </p>

            <div class="mt-4">
                <!-- contoh link ke pemutar / halaman tonton (bisa diganti) -->
                <a href="#" class="btn-watch-now">Tonton Sekarang</a>
                <a href="{{ route('user.home') }}" class="btn btn-secondary ms-2">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection