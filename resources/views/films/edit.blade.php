@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Film</h2>

    <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul Film --}}
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $film->title }}" required>
        </div>

        {{-- Tahun Rilis --}}
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ $film->year }}" required>
        </div>

        {{-- Tanggal Rilis --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Rilis</label>
            <input type="date" name="release_date" class="form-control"
                value="{{ $film->release_date ? \Carbon\Carbon::parse($film->release_date)->format('Y-m-d') : '' }}"
                required>
        </div>

        {{-- Rating Film --}}
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" step="0.1" value="{{ $film->rating }}" required>
        </div>

        {{-- Genre Film --}}
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $film->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Film Unggulan --}}
        <div class="mb-3">
            <label class="form-label">Jadikan Film Unggulan?</label>
            <select name="is_featured" class="form-select" required>
                <option value="0" {{ !$film->is_featured ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ $film->is_featured ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        {{-- Poster Film --}}
        <div class="mb-3">
            <label class="form-label">Poster Film</label>
            <input type="file" name="poster" class="form-control" accept="image/*">
            @if($film->poster)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $film->poster) }}" width="120" class="rounded shadow">
                </div>
            @endif
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
