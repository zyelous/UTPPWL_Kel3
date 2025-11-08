@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">🎬 Film Favorit Kamu</h2>

    <div class="row">
        @foreach($films as $film)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    @if($film->poster)
                        <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top" alt="{{ $film->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x450?text=No+Poster" class="card-img-top" alt="No Poster">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-text">
                            🎭 {{ $film->genre->name ?? '-' }} <br>
                            ⭐ {{ $film->rating }} <br>
                            📅 {{ $film->year }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
