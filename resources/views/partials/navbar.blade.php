<nav class="navbar navbar-expand-lg navbar-dark netflix-nav fixed-top">
    <div class="container-fluid">

        {{-- Logo --}}
        <a class="navbar-brand netflix-logo" href="{{ url('/') }}">
            <span style="color:#e50914; font-weight:700;">FILM</span><span style="color:white;">FLIX</span>
        </a>

        {{-- Tombol hamburger (untuk tampilan mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu utama --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 netflix-menu">
                @auth
                    {{-- Jika role admin --}}
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('films.index') }}">Film</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('genres.index') }}">Genre</a></li>
                    @endif

                    {{-- Jika role user --}}
                    @if(Auth::user()->role === 'user')
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Film</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.genre') }}">Genre</a></li>
                    @endif
                @endauth
            </ul>

            {{-- Search Bar --}}
            <form class="d-flex netflix-search" role="search">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            {{-- Auth Button --}}
            @auth
                <span class="text-white ms-3">Hi, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light ms-3">Login</a>
                <a href="{{ route('register') }}" class="btn btn-danger ms-2">Register</a>
            @endauth
        </div>
    </div>
</nav>
