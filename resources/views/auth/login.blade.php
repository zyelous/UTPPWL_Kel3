@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="d-flex justify-content-center">
  <div class="card p-4" style="width:380px;background:#111;color:#fff;">
    <h4 class="text-center text-danger mb-3">Masuk</h4>

    {{-- 🔔 Notifikasi Error --}}
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control bg-dark text-white" value="{{ old('email') }}" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control bg-dark text-white" required>
      </div>
      <button class="btn btn-danger w-100">Masuk</button>
      <p class="mt-3 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </form>
  </div>
</div>
@endsection
