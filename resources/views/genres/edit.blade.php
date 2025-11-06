@extends('layouts.app')
@section('title', 'Edit Genre')
@section('content')
<h3>Edit Genre</h3>
<form method="POST" action="{{ route('genres.update', $genre->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Genre</label>
        <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
    </div>
    <button class="btn btn-warning">Perbarui</button>
</form>
@endsection
