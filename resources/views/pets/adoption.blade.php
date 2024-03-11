@section('Cargadato')
<div class="container">
    <br>
    <br>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    @include('include.styles')
</head>
<body class="bodyAdoption">

<div class="container formAdoptionContainer">
    <div class="row text-center">
        <div class="col">
            <h1>
                Formulario de adopcion
            </h1>
        </div>

    </div>
    
    <br>
    <div class="row  justify-content-evenly ">
        <div class="col-5 justify-content-">
                <div class="form">
                    <h3>Ingresa tus datos:</h3>

                        @csrf
                        <input type="hidden"  value="{{ $mascota->id }}" id="idPet">
                        {{-- <span>{{ $mascota->id }}</span> --}}
                        <input type="hidden"  value="{{ Session::get('usuariologin')['id'] }}" id="idUser">
                        {{-- <span>{{Session::get('usuariologin')['id'] }} </span> --}}
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellidos:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ci">CI:</label>
                                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Carnet de identidad">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="age">Edad:</label>
                                    <input type="number" id="age" class="form-control" placeholder="Edad" >
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="email">Correo Electronico:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono:</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                            <label for="city">Ciudad:</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" >
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Ubica tu domicilio">
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-lg btn-block mt-3" onclick="adopt('principal')">Adoptar</button>
                            </div>
                        </div>

                </div>
        </div>
        <div class="col-5 petCol">
            <H5>Usted esta adoptando a:</H1>
            <img class="imgPet" src=" {{ asset($mascota->imagen_path) }}" alt=" {{ $mascota->name }}">
            <span class="fw-bold petName">{{ $mascota->name }},  </span>
            <span class="petAge" >{{ $mascota->age }}</span>
        </div>
    </div>
    </div>
</div>
@include('include.scripts')
</body>
</html>

@endsection