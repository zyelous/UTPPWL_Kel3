<nav class="navbar navbar-expand-lg navbar-dark netflix-nav fixed-top">
    <div class="container-fluid">
        
        <a class="navbar-brand netflix-logo" href="{{ url('/') }}">
            <span style="color:#e50914; font-weight:700;">FILM</span><span style="color:white;">FLIX</span>
        </a>

       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

       
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 netflix-menu">
                <li class="nav-item"><a class="nav-link" href="#">Movies</a></li>
                <li class="nav-item"><a class="nav-link" href="#">TV Series</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('genres.index') }}">Genre</a></li>
            </ul>

            <form class="d-flex netflix-search" role="search">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            @auth
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
