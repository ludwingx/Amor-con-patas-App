<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img class="logoNavbar" src="assets/logo.png" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" aria-current="page" href="home">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">NO-KILL 2025</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">HISTORIA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">FORMAS DE DONAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="userslist">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="adopciones">ADOPCIONES</a>
                </li>
            </ul>
            @if (Session::has('usuariologin'))
                <span class="me-2 fw-bold">Bienvenido, </span>
                <span class="me-3 fw-bold usernameText ">{{Session::get('usuariologin')['name'] }}</span>
                <a class="btn btn-primary" onclick="cerrarSesion()" >Cerrar Sesión</a>
            @else
            <div class="buttons ms-auto d-flex justify-content-end">
                <a class="btn btn-primary" href="login" >Iniciar sesión</a>
                <a class="btn btn-primary" href="registro">Registrarse</a>
            </div>
            @endif

        </div>
    </div>
  </nav>
  