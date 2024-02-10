<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Amor con Patas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">NO-KILL 2025</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">ADOPTAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">HISTORIA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">FORMAS DE DONAR</a>
                </li>
            </ul>
            <div class="buttons ms-auto d-flex justify-content-end">
                @auth
                <p>Welcome <b>{{ Auth::user()->name }}</b></p>
                <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                <a class="btn btn-primary" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
                @endguest
            </div>
        </div>
    </div>
  </nav>
  