@extends('layouts.app')
@include('include.scripts')
@section('content')


<div class="container adopciones">
    <div class="row text-center">
        <div class="col">  
            <h1>14 mascotas disponibles para adopción</h1>
        </div>
    </div>
    <div class="filtro-container">
        <div class="row">
            <div class="col">
                Ordenar por:
            </div>
            <div class="col">
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre">
            </div>

        </div><br>
        <div class="row">
            <div class="col">
                <label for="tamaño">Tamaño:</label>
                <select name="tamaño" id="tamaño">
                    <option value="tamaño">tamaño</option>
                    <option value="mediano">mediano</option>
                    <option value="pequeño">pequeño</option>
                    <option value="grande">grande</option>
                </select>
            </div>
            <div class="col">
                <label for="raza">Raza:</label>
                <select name="raza" id="raza">
                    <option value="raza">raza</option>
                    <option value="shitzu">shitzu</option>
                    <option value="bulldog">bulldog</option>
                    <option value="labrador">labrador</option>
                </select>
            </div>
            <div class="col">
                <label for="edad">Edad:</label>
                <select name="edad" id="edad">
                    <option value="edad">edad</option>
                    <option value="pequeño">pequeño</option>
                    <option value="mediano">mediano</option>
                    <option value="grande">grande</option>
                </select>
            </div>
        </div>

    </div>
    <div class="pets">
        @include('pets.pets')
    </div>
</div>

@endsection