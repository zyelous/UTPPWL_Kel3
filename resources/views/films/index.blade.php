@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Film</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('films.create') }}" class="btn btn-primary mb-3">+ Tambah Film</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Rating</th>
                <th>Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->year }}</td>
                    <td>{{ $film->rating }}</td>
                    <td>{{ $film->genre->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus film ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
