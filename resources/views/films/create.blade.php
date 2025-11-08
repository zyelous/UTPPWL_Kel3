@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Film Baru</h2>

    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" step="0.1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select" required>
                <option value="">-- Pilih Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

         
    <div class="mb-3">
        <label class="form-label">Poster Film</label>
        <input type="file" name="poster" class="form-control" accept="image/*">
    </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
