  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Amor con Patas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">NO-KILL 2025</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ADOPTAR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">HISTORIA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FORMAS DE DONAR</a>
          </li>
        </ul>
        <span class="navbar-text">
            @auth
            <p>Welcome <b>{{ Auth::user()->name }}</b></p>
            <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
            @endauth
            @guest
            <a class="btn btn-primary" href="{{ route('login') }}">Iniciar sessión</a>
            <a class="btn btn-info" href="{{ route('register') }}">Registrarse</a>
            @endguest
        </span>
      </div>
    </div>
  </nav>