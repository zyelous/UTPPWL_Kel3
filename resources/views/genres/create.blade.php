@extends('layouts.app')
@section('title', 'Tambah Genre')
@section('content')
<h3>Tambah Genre Baru</h3>
<form method="POST" action="{{ route('genres.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Genre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection
