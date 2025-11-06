@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="card mx-auto" style="max-width:400px;">
    <div class="card-body">
        <h4 class="text-center mb-3">Login</h4>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Masuk</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="/register">Daftar</a></p>
    </div>
</div>
@endsection
