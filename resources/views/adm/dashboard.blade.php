<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('include.styles')
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --xanthous: #e3b23cff;
        --taupe: #463f3aff;
        --light-green: #91f5adff;
        --white: #ffffffff;
        --vermilion: #dd403aff;
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: var(--xanthous);
        --first-color-light: var(--taupe);
        --white-color: var(--white);
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: var(--first-color);
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--vermilion);

        
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--vermilion)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--vermilion)
    }

    .height-100 {
        height: 100vh
    }

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }
</style>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='nav_icon'> <img src="{{ asset('assets/logo.png')}}" style="max-width:1.5rem" alt=""></i>
                    <span class="nav_logo-name">Amor con patas</span>
                </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link">
                        <i class="fa-solid fa-user"></i>
                        <span class="nav_name fw-bold m-2"> {{Session::get('usuariologin')['name'] }}</span>
                    </a>
                </div>
                <hr>
                <div class="nav_list">
                    <a href="principal" class="nav_link active" > 
                        <i class="fa-solid fa-chart-line"></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>
                    <a href="#" class="nav_link" onclick="jsUserList('principal')"> 
                        <i class="fa-solid fa-users"></i>
                        <span class="nav_name">Users</span> 
                    </a>
                    <a href="#" class="nav_link" onclick="jugadoreslist('principal')"> 
                        <i class="fa-solid fa-futbol"></i>
                        <span class="nav_name">Jugadores</span> 
                    </a>
                    <a href="#" class="nav_link" onclick="jsListarMascota('principal')"> 
                        <i class="fa-solid fa-paw"></i> 
                        <span class="nav_name" >Mascotas</span> 
                    </a>

                    <a class="nav_link" href="home">
                        <i class='bx bx-home nav_icon'></i>
                        <span class="nav_name">Vista Publica</span> 
                    </a>
                    <hr>
                </div>

                <br>

                <div class="nav_list">
                    <a  class="nav_link" href="#"  onclick="cerrarSesion()" > 
                        <i class='bx bx-log-out nav_icon'></i> 
                        <span class="nav_name">Cerrar Sesión</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" >
        @yield('content')
    </div>
    <!--Container Main end-->
   
</body>
@include('include.scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>