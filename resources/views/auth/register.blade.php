@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="d-flex justify-content-center">
  <div class="card p-4" style="width:380px;background:#111;color:#fff;">
    <h4 class="text-center text-danger mb-3">Daftar</h4>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control bg-dark text-white" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control bg-dark text-white" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control bg-dark text-white" required>
      </div>
      <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control bg-dark text-white" required>
      </div>
      <button class="btn btn-danger w-100">Daftar</button>
      <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </form>
  </div>
</div>
@endsection
