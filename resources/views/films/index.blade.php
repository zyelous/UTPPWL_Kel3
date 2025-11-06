@extends('layouts.app')
@section('title', 'Daftar Film')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Film</h3>
    <a href="{{ route('films.create') }}" class="btn btn-primary">+ Tambah Film</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($films as $film)
        <tr>
            <td>{{ \Illuminate\Support\Facades\Crypt::decryptString($film->title) }}</td>
            <td>{{ $film->genre->name }}</td>
            <td>{{ $film->year }}</td>
            <td>{{ $film->rating }}</td>
            <td>
                <form action="{{ route('films.destroy', $film->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus film ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
