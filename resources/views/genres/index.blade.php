@extends('layouts.app')
@section('title', 'Daftar Genre')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Genre</h3>
    <a href="{{ route('genres.create') }}" class="btn btn-primary">+ Tambah Genre</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr><th>Nama Genre</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
        <tr>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus genre ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
