@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Listado de Usuarios</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul>
                @foreach($usuarios as $usuario)
                    <li>{{$usuario->id}} - {{ $usuario->name }} - {{ $usuario->email }} - {{$usuario->estado}} - {{$usuario->password}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
