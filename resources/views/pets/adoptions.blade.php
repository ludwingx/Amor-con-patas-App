@extends('layouts.app')
@include('include.scripts')
@section('content')


<div class="container adopciones">
    <div class="row text-center">
        <div class="col">  
            <h1>14 mascotas disponibles para adopción</h1>
        </div>
    </div>
   
    <div class="pets">
        @include('pets.pets')
    </div>
</div>

@endsection