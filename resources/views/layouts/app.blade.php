<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Daftar Film Favorit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/films">🎬 Film Favorit</a>
        <div>
            @auth
                <a href="/films" class="btn btn-outline-light btn-sm">Film</a>
                @if(auth()->user()->role === 'admin')
                    <a href="/genres" class="btn btn-outline-warning btn-sm">Genre</a>
                @endif
                <form action="/logout" method="POST" class="d-inline">@csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            @endauth
            @guest
                <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
            @endguest
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
