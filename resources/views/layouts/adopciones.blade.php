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
            <div class="col-6">
                Ordenar por:
            </div>
            <div class="col-6">
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre">
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="card">
            
        </div>
    </div>
</div>

@endsection