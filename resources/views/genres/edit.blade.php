@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Genre</h2>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
