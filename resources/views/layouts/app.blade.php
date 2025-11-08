<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title') - Daftar Film Favorit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container">
    <a class="navbar-brand text-danger fw-bold" href="{{ auth()->check() && auth()->user()->role === 'user' ? route('user.home') : url('/')}} ">🎥 MyFlix</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        @auth
            @if(auth()->user()->role === 'admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('films.index') }}">Kelola Film</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('genres.index') }}">Kelola Genre</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Beranda</a></li>
            @endif
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf
                    <button class="btn btn-link nav-link text-danger">Logout</button>
                </form>
            </li>
        @else
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <div>{{ $err }}</div>
            @endforeach
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
