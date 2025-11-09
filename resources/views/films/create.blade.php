@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Film Baru</h2>

    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul Film --}}
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" placeholder="Masukkan judul film" required>
        </div>

        {{-- Tahun Rilis --}}
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" placeholder="Contoh: 2024" required>
        </div>

        {{-- Tanggal Rilis --}}
        <div class="mb-3">
            <label class="form-label">Tanggal Rilis</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>

        {{-- Rating Film --}}
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" step="0.1" placeholder="Contoh: 8.5" required>
        </div>

        {{-- Genre Film --}}
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select" required>
                <option value="">-- Pilih Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Featured Film (Film Unggulan) --}}
        <div class="mb-3">
            <label class="form-label">Jadikan Film Unggulan?</label>
            <select name="is_featured" class="form-select" required>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
        </div>

        {{-- Upload Poster --}}
        <div class="mb-3">
            <label class="form-label">Poster Film</label>
            <input type="file" name="poster" class="form-control" accept="image/*" required>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
