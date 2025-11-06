@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="card mx-auto" style="max-width:400px;">
    <div class="card-body">
        <h4 class="text-center mb-3">Register</h4>
        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success w-100">Daftar</button>
        </form>
        <p class="mt-3 text-center">Sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>
@endsection
