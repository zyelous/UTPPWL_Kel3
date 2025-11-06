@extends('layouts.app')
@section('title', 'Tambah Film')
@section('content')
<h3>Tambah Film Baru</h3>
<form method="POST" action="{{ route('films.store') }}">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tahun</label>
        <input type="number" name="year" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Rating</label>
        <input type="number" name="rating" step="0.1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Genre</label>
        <select name="genre_id" class="form-control" required>
            <option value="">-- Pilih Genre --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
