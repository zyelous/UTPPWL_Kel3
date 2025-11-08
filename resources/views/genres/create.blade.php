@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Genre Baru</h2>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Genre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
